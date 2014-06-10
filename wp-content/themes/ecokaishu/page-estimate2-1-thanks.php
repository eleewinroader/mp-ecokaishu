<?php
/*
*
* Template name: かんたん見積依頼2受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');
	global $wpdb, $user_ID;

	include(TEMPLATEPATH.'/estimate2-1-post.php');

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = 'ycoll';
	$post_title = cmsTitle($post_type, $submitdate, "2_00");

	//ユーザー登録
	$email = $wpdb->escape($cstmEmail);
	$user = array(
		'user_email' => $email,
		'user_login' => $email,
		'user_pass' => '0000'
	);
	$status = wp_insert_user($user);

	for($i=0; $i<$yCollItemNum; $i++){
		$itemNum = $i+1;
		$post_contents .= '
□引取家具'.$itemNum.'
　品物：'.${"yCollItem_cat_".$i}.'
　ブランド：'.${"yCollItem_brand_".$i}.'
　サイズ(横*縦*奥行)：'.${"yCollItem_width_".$i}.'cm x '.${"yCollItem_height_".$i}.'cm x '.${"yCollItem_depth_".$i}.'cm

';
	}

	//DB挿入
	$insertpost = array(
		'post_status' => 'pending',
		'post_title' => $post_title,
		'post_content' => $post_contents,
		'comment_status' => 'closed',
		'post_type' => $post_type
	);
	$insert_id = wp_insert_post($insertpost);

	if($insert_id){

		//カスタムフィールド挿入

		add_post_meta($insert_id, 'yCollInfo1', $yCollCstmMuni);
		add_post_meta($insert_id, 'yCollInfo2', $cstmResidence);
		add_post_meta($insert_id, 'yCollInfo3', $cstmRsdcEtc);
		add_post_meta($insert_id, 'yCollInfo4', $cstmFloor);
		add_post_meta($insert_id, 'yCollInfo5', $cstmElvt);
		add_post_meta($insert_id, 'yCollInfo6', $cstmName);
		add_post_meta($insert_id, 'yCollInfo8', $cstmPron);
		add_post_meta($insert_id, 'yCollInfo7', $cstmType);
		add_post_meta($insert_id, 'yCollInfo9', $cstmEmail);
		add_post_meta($insert_id, 'yCollInfo10', $cstmPhoneNum);
		add_post_meta($insert_id, 'yCollInfo11', $cltDay0);
		add_post_meta($insert_id, 'yCollInfo12', $cltDay1);
		add_post_meta($insert_id, 'yCollInfo13', $cltDay2);
		add_post_meta($insert_id, 'yCollInfo14', $replyWay);
		add_post_meta($insert_id, 'yCollInfo15', $userAgent);
		add_post_meta($insert_id, 'yCollInfo16', $siteCode);

		$yCollValues = array(
			'yCollCstmMuni' => $yCollCstmMuni,
			'cstmResidence' => $cstmResidence,
			'cstmRsdcEtc' => $cstmRsdcEtc,
			'cstmElvt' => $cstmElvt,
			'cstmFloor' => $cstmFloor,
			'cstmName' => $cstmName,
			'cstmPron' => $cstmPron,
			'cstmType' => $cstmType,
			'cstmPhoneNum' => $cstmPhoneNum,
			'cstmContents' => $post_contents,
			'cltDay0' => $cltDay0,
			'cltDay1' => $cltDay1,
			'cltDay2' => $cltDay2,
			'replyWay' => $replyWay,
			'post_title' => $post_title
		);

		//受付お知らせメール
		yColl_ntfct($cstmEmail, $yCollValues);

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
			<nav id="sitepath">
				<ul class="bread_crumb">
					<li><?php echo $title; ?></li>
				</ul>
			</nav>
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