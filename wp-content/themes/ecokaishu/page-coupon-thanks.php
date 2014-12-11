<?php
/**
 * The main template file.
 *
 * Template name: クーポン未使用者専用受付完了
* @package Montser Platform
 */



if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include (TEMPLATEPATH . '/coupon-post.php');

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = 'remind';
	$post_title = cmsTitle($post_type, $submitdate, $pr_code);
	$user = get_user_by("email", $cstmEmail);

	$insertpost = array(
		'post_status' => 'pending',
		'post_title' => $post_title,
		'post_content' => $cstmContents,
		'comment_status' => 'closed',
		'post_author' => $user->ID,
		'post_type' => $post_type
	);
	$insert_id = wp_insert_post($insertpost);

	//DB挿入
	if($insert_id){

		//カスタムフィールド情報挿入
		//cf　１番無くなった
		add_post_meta($insert_id, 'couponInfo2', $cstmName);
		add_post_meta($insert_id, 'couponInfo10', $cstmPron);
		add_post_meta($insert_id, 'couponInfo4', $cstmEmail);
		add_post_meta($insert_id, 'couponInfo5', $cstmPhoneNum);
		add_post_meta($insert_id, 'couponInfo6', $replyWay);
		add_post_meta($insert_id, 'couponInfo8', $userAgent);

		//タクソノミー挿入	
		wp_set_object_terms($insert_id, $couponNum, 'couponnum', $append = true);

		//受付メール送信
		$couponValues = array(
			'couponNum' => $couponNum,
			'post_title' => $post_title,
			'cstmName' => $cstmName,
			'cstmPron' => $cstmPron,
			'cstmType' => $cstmType,
			'cstmEmail' => $cstmEmail,
			'cstmPhoneNum' => $cstmPhoneNum,
			'cstmContents' => $cstmContents,
			'replyWay' => $replyWay
		);
		coupon_ntfct($cstmEmail, $couponValues);

	}

}else{

	$error = 1;

}

include (TEMPLATEPATH . '/header-form.php');
wp_reset_query(); wp_reset_postdata();

	if(have_posts()): while(have_posts()): the_post();
	
		if($error){
			$title = get_post_meta($post->ID, "thanksCf1", TRUE);
			$content = get_post_meta($post->ID, "thanksCf2", TRUE);
		}else{
			$title = get_post_meta($post->ID, "thanksCf3", TRUE);
			$content = get_post_meta($post->ID, "thanksCf4", TRUE);
		}?>

		<header>
			<nav id="sitepath">
				<ul class="bread_crumb">
					<li><?php echo $title; ?></li>
				</ul>
			</nav>
			<h2><?php echo $title; ?></h2>
		</header>

		<div class="contents">
			<div class="content">
				<p><?php echo $content; ?></p>
			</div>
		</div>		

	<?php endwhile; endif; ?>

</article>

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>

<!-- Google Code for &#12456;&#12467;&#22238;&#21454;CV&#12479;&#12464; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 974830453;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "ewxYCOv_2QkQ9fbq0AM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974830453/?label=ewxYCOv_2QkQ9fbq0AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>