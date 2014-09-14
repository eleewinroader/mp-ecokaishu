<?php
/*
*
* Template name: レガシー用お問い合わせ受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include (TEMPLATEPATH . '/contact-post.php');

	if(!$_POST["coupon"]) $coupon = '受け取らない'; //クーポン登録取得
	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = 'faq';
	$post_title = cmsTitle($post_type, $submitdate, $pr_code);

	$insertpost = array(
		'post_status' => 'pending',
		'post_title' => $post_title,
		'post_content' => $cstmContents,
		'comment_status' => 'closed',
		'post_type' => $post_type
	);
	$insert_id = wp_insert_post($insertpost);

	//DB挿入
	if($insert_id){

		//カスタムフィールド情報挿入
		//cf　１番無くなった
		add_post_meta($insert_id, 'contactInfo2', $cstmName);
		add_post_meta($insert_id, 'contactInfo10', $cstmPron);
		add_post_meta($insert_id, 'contactInfo3', $cstmType);
		add_post_meta($insert_id, 'contactInfo4', $cstmEmail);
		add_post_meta($insert_id, 'contactInfo5', $cstmPhoneNum);
		add_post_meta($insert_id, 'contactInfo6', $replyWay);
		add_post_meta($insert_id, 'contactInfo7', $coupon);
		add_post_meta($insert_id, 'contactInfo8', $userAgent);
		add_post_meta($insert_id, 'contactInfo9', $siteCode);

		//タクソノミー挿入	
		wp_set_object_terms($insert_id, $quesKind, 'qstcat', $append = true);

		//ユーザー登録
		if($coupon == '受け取る' && !$couponUsed){
			$email = $wpdb->escape($cstmEmail);
			$user = array(
				'user_email' => $email,
				'user_login' => $email,
				'user_pass' => '0000'
			);
			$status = wp_insert_user($user);
			$couponPub = date("ymd", time()); //送信タイム
			if(is_wp_error($status)){
				$user = get_user_by("email", $cstmEmail);
				$user = $user->ID;				
				$couponNum = "NE".$couponPub."-".sprintf("%06d", $user);
			}else{
				$couponNum = "NE".$couponPub."-".sprintf("%06d", $status);
			}
		}

		//受付メール送信
		$contactValues = array(
			'quesKind' => $quesKind,
			'cstmName' => $cstmName,
			'cstmPron' => $cstmPron,
			'cstmType' => $cstmType,
			'cstmEmail' => $cstmEmail,
			'cstmPhoneNum' => $cstmPhoneNum,
			'cstmContents' => $cstmContents,
			'replyWay' => $replyWay,
			'couponNum' => $couponNum,
			'post_title' => $post_title
		);
		contact_ntfct($cstmEmail, $contactValues);

	}

}else{

	$error = 1;

}

include (TEMPLATEPATH . '/header-legacy.php');
wp_reset_query(); wp_reset_postdata();

	if(have_posts()): while(have_posts()): the_post();
	
		if($error){
			$title = get_post_meta($post->ID, "thanksCf1", TRUE);
			$content = get_post_meta($post->ID, "thanksCf2", TRUE);
		}else{
			$title = get_post_meta($post->ID, "thanksCf3", TRUE);
			$content = get_post_meta($post->ID, "thanksCf4", TRUE);
		}?>

	<div class="fullwidthForm" id="contact">

		<h2><?php the_title(); ?></h2>

		<div class="contents" id="thanks">
			<div class="content">
				<p><?php echo $content; ?></p>
				<?php echo telBnr(); ?>
			</div>
		</div>		

	<?php endwhile; endif; ?>

</article>
</div>



<?php include (TEMPLATEPATH . '/footer-legacy.php'); ?>