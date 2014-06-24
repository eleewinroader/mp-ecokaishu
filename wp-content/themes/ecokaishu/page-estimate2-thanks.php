<?php
/*
*
* Template name: かんたん見積依頼2-1受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include(TEMPLATEPATH.'/estimate2-post.php');

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = 'ycoll';
	$post_title = cmsTitle($post_type, $submitdate, $pr_code);

	//ユーザー登録
	$email = $wpdb->escape($cstmEmail);
	$user = array(
		'user_email' => $email,
		'user_login' => $email,
		'user_pass' => '0000'
	);
	$status = wp_insert_user($user);

	//DB挿入
	$insertpost = array(
		'post_status' => 'pending',
		'post_title' => $post_title,
		'post_content' => $cstmContents,
		'comment_status' => 'closed',
		'post_type' => $post_type
	);
	$insert_id = wp_insert_post($insertpost);

	if($insert_id){

		//カスタムフィールド挿入

		add_post_meta($insert_id, 'yCollInfo6', $cstmName);
		add_post_meta($insert_id, 'yCollInfo7', $cstmType);
		add_post_meta($insert_id, 'yCollInfo8', $cstmPron);
		add_post_meta($insert_id, 'yCollInfo9', $cstmEmail);
		add_post_meta($insert_id, 'yCollInfo15', $userAgent);
		add_post_meta($insert_id, 'yCollInfo16', $siteCode);

		$yCollValues = array(
			'cstmName' => $cstmName,
			'cstmPron' => $cstmPron,
			'cstmType' => $cstmType,
			'cstmEmail' => $cstmEmail,
			'cstmContents' => $cstmContents,
			'cltDay0' => $cltDay0,
			'cltDay1' => $cltDay1,
			'cltDay2' => $cltDay2,
			'post_title' => $post_title
		);

		//受付お知らせメール
		yColl_ntfct2($cstmEmail, $yCollValues);

	}

}else{

	$error = 1;

}

include (TEMPLATEPATH . '/header-form.php');
wp_reset_query();

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
			<div class="content"><p><?php echo $content; ?></p></div>
		</div>

	<?php endwhile; endif; ?>

</article>
</div>

<script type="text/javascript">
	(function () {
		var tagjs = document.createElement("script");
		var s = document.getElementsByTagName("script")[0];
		tagjs.async = true;
		tagjs.src = "//s.yjtag.jp/tag.js#site=5qzqEGf";
		s.parentNode.insertBefore(tagjs, s);
	}());
</script>
<noscript>
	<iframe src="//b.yjtag.jp/iframe?c=5qzqEGf" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

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