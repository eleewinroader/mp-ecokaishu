<?php
/*
*
* Template name: かんたん見積依頼受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

if($_POST){

	global $wpdb, $user_ID;

	include(TEMPLATEPATH.'/estimate-post.php');

	if(!$_POST["coupon"]) $coupon = '受け取らない'; //メルマガ登録取得
	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("mdH", time()); //送信タイム
	$post_type = 'estimationrequest';
	$post_title = cmsTitle($post_type, $submitdate, $pr_code);

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
		$cpiItems = implode(",", $cpiItems);

		add_post_meta($insert_id, 'estmtInfo1', $cstmPrefecture);
		add_post_meta($insert_id, 'estmtInfo2', $cstmMncplt);
		add_post_meta($insert_id, 'estmtInfo3', $cstmResidence);
		add_post_meta($insert_id, 'estmtInfo11', $cstmRsdcEtc);
		add_post_meta($insert_id, 'estmtInfo4', $cstmElvt);
		add_post_meta($insert_id, 'estmtInfo6', $cstmFloor);
		add_post_meta($insert_id, 'estmtInfo7', $cstmName);
		add_post_meta($insert_id, 'estmtInfo5', $cstmPron);
		add_post_meta($insert_id, 'estmtInfo8', $cstmType);
		add_post_meta($insert_id, 'estmtInfo9', $cstmEmail);
		add_post_meta($insert_id, 'estmtInfo10', $cstmPhoneNum);
		add_post_meta($insert_id, 'estmtInfo13', $cpiItems);
		add_post_meta($insert_id, 'estmtInfo14', $cltDay0);
		add_post_meta($insert_id, 'estmtInfo15', $cltDay1);
		add_post_meta($insert_id, 'estmtInfo16', $cltDay2);
		add_post_meta($insert_id, 'estmtInfo18', $replyWay);
		add_post_meta($insert_id, 'estmtInfo20', $userAgent);
		add_post_meta($insert_id, 'estmtInfo21', $siteCode);

		//ユーザー登録
		if(($coupon == '受け取る' && !$couponUsed) || $quiz){
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
				add_post_meta($insert_id, 'estmtInfo22', $couponNum);
			}else{
				$couponNum = "NE".$couponPub."-".sprintf("%06d", $status);
				add_post_meta($insert_id, 'estmtInfo22', $couponNum);
			}
		}

		$estimateValues = array(
			'cstmPrefecture' => $cstmPrefecture,
			'cstmMncplt' => $cstmMncplt,
			'cstmResidence' => $cstmResidence,
			'cstmRsdcEtc' => $cstmRsdcEtc,
			'cstmElvt' => $cstmElvt,
			'cstmFloor' => $cstmFloor,
			'cstmName' => $cstmName,
			'cstmPron' => $cstmPron,
			'cstmType' => $cstmType,
			'cstmPhoneNum' => $cstmPhoneNum,
			'cstmContents' => $cstmContents,
			'cpiItems' => $cpiItems,
			'cltDay0' => $cltDay0,
			'cltDay1' => $cltDay1,
			'cltDay2' => $cltDay2,
			'cltTime' => $cltTime,
			'replyWay' => $replyWay,
			'quiz' => $quiz,
			'couponNum' => $couponNum,
			'post_title' => $post_title
		);

		//受付お知らせメール
		estimate_ntfct($cstmEmail, $estimateValues);

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