<?php
/*
*
* Template name: お問い合わせ受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include (TEMPLATEPATH . '/contact-post.php');

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = "contactform";
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

<script language="Javascript" type="text/javascript">
<!--
/* <![CDATA[*/
var account_id="1OsEOoQOLDXC8XxH8jBf"; 
var transaction_id = "";
var amount = "";
if (location.protocol == "https:") { var protocol = "https:"} else { var protocol = "http:" }
document.write("<img width=1 height=1 border=0 src='" + protocol + "//b90.yahoo.co.jp/c?account_id=" + account_id + "&transaction_id=" + transaction_id + "&amount=" + amount + "'>");
/* ]]>*/
//-->
</script>

<!-- Google Code for &#12456;&#12467;&#22238;&#21454;CV&#12479;&#12464; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[*/
var google_conversion_id = 974830453;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "ewxYCOv_2QkQ9fbq0AM";
var google_remarketing_only = false;
/* ]]>*/
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974830453/?label=ewxYCOv_2QkQ9fbq0AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>


</body>
</html>