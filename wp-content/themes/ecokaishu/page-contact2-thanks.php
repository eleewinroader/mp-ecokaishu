<?php
/*
*
* Template name: お問い合わせ受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include (TEMPLATEPATH . '/contact2-post.php');

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = "af";
	$post_title = cmsTitle($post_type, $submitdate, $pr_code);

	$insertpost = array(
		'post_status' => 'draft',
		'post_title' => $post_title,
		'post_type' => $post_type
	);
	$insert_id = wp_insert_post($insertpost);

	//DB挿入
	if($insert_id){

		//カスタムフィールド情報挿入
		//cf　１番無くなった
		add_post_meta($insert_id, 'afInfo01', $afUserID);
		add_post_meta($insert_id, 'afInfo02', $afUserName);
		add_post_meta($insert_id, 'afInfo03', $afUserPhone);
		add_post_meta($insert_id, 'afInfo04', $afUserCltDate);

		//タクソノミー挿入	
		wp_set_object_terms($insert_id, $quesKind, 'qstcat', $append = true);

		$cstmEmail = "e_lee@winroader.co.jp";
		//受付メール送信
		$contactValues = array(
			'quesKind' => $quesKind,
			'afUserID' => $afUserID,
			'afUserName' => $afUserName,
			'afUserPhone' => $afUserPhone,
			'afUserCltDate' => $afUserCltDate,
			'post_title' => $post_title
		);
		contact2_ntfct($cstmEmail, $contactValues);		
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

<script src="//easy-entry.jp/ffconf/ffconf_5000_0138_0230.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=100" charset="utf-8" type="text/javascript"></script>

</body>
</html>