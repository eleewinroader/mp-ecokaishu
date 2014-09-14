<?php
/*
*
* Template name: アンケートの受付完了
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
*/

if($_POST){

	require_once(ABSPATH . WPINC . '/registration.php');

	global $wpdb, $user_ID;
	include(TEMPLATEPATH.'/inquiry-post.php');

	if(!$_POST["coupon"]) $coupon = '受け取らない'; //メルマガ登録取得
	$userAgent = $_SERVER['HTTP_USER_AGENT']; //ユーザーエージェント
	date_default_timezone_set('Asia/Tokyo');
	$submitdate = date("Ymd", time()); //送信タイム
	$post_type = 'works';
	$post_title = cmsTitle($post_type, $submitdate);


	//ユーザー登録
	if($coupon == '受け取る'){
		$email = $wpdb->escape($cstmEmail);
		$user = array(
			'user_email' => $email,
			'user_login' => $email,
			'user_pass' => '0000',
			'role' => 'customer'
		);
		$couponPub = date("ymd", time()); //送信タイム
		$status = wp_insert_user($user);

		if(is_wp_error($status)){
			$user = get_user_by("email", $email);
			$user = $user->ID;
			$args = array(
				'ID' => $user,
				'role' => "customer", 
			);
			$user = wp_update_user($args);
			$couponNum = "RE".$couponPub."-".sprintf("%06d", $user);
		}else{
			$user = $status;
			$couponNum = "RE".$couponPub."-".sprintf("%06d", $user);
		}

		update_user_meta($user, 'name', $cstmName);
		update_user_meta($user, 'cstmPron', $cstmPron);
		update_user_meta($user, 'phone', $cstmPhoneNum);
		update_user_meta($user, 'prefecture', $cstmPrefecture);
		update_user_meta($user, 'municipality', $cstmMncplt);
		update_user_meta($user, 'birthday', $cstmBD);
		update_user_meta($user, 'sex', $cstmSex);
		update_user_meta($user, 'marrige', $cstmMrg);
		update_user_meta($user, 'residence', $cstmResType);
		update_user_meta($user, 'job', $cstmJob);
	}

	$insertpost = array(
		'post_status' => 'pending',
		'post_title' => $post_title,
		'post_author' => $user,
		'comment_status' => 'closed',
		'post_type' => 'works',
	);
	$insert_id = wp_insert_post($insertpost);

	if($insert_id){

		$cltdItems = implode(",", $cltdItem);
		$cue = implode(",", $cue);
		$from = implode(",", $from);
		$cause = implode(",", $cause);
		$cttedCor = implode(",", $cttedCor);
		$notAplyCor = implode(",", $notAplyCor);
		$notAplyOrg = implode(",", $notAplyOrg);
		$notCttOrg = implode(",", $notCttOrg);
		$cstmInt = implode(",", $cstmInt);

		update_user_meta($user, 'topics', $cstmInt);

		//顧客情報タクソノミー挿入
		$objPrefecture = wp_set_object_terms($insert_id, $cstmPrefecture, 'cltarea', $append = true);
		$objMncplt = wp_set_object_terms($insert_id, $cstmMncplt, 'cltarea', $append = true);
		if(!is_wp_error($objPrefecture) && !is_wp_error($objMncplt)){
			$args = array(
				'posts_per_page' => -1,
				'name' => $cstmMncplt,
				'post_type' => 'area'
			);
			$itemPosts = query_posts($args);
			if(!$itemPosts){
				$insertItem = array_merge(array(
					'post_status' => 'publish',
					'post_title' => $cstmMncplt,
					'comment_status' => 'closed'
				), $args);
				$itemPost = wp_insert_post($insertItem);
				wp_set_object_terms($itemPost, $cstmPrefecture, 'cltarea', $append = true);
				wp_set_object_terms($itemPost, $cstmMncplt, 'cltarea', $append = true);
			}
		}
		wp_set_object_terms($insert_id, $cstmAge, 'cstminfo', $append = true);	
		wp_set_object_terms($insert_id, $cstmSex, 'cstminfo', $append = true);
		wp_set_object_terms($insert_id, $cstmMrg, 'cstminfo', $append = true);
		wp_set_object_terms($insert_id, $cstmResType, 'cstminfo', $append = true);
		wp_set_object_terms($insert_id, $cstmJob, 'cstminfo', $append = true);

		//日付タクソノミー挿入 &　記事作成
		$today = getdate();
		$year = (string) $today["year"];
		$month = (string) $today["mon"];
		$monthname = $year.'-'.$month;
		$yearId = wp_set_object_terms($insert_id, $year, 'date', $append = true);
		$monthId = wp_set_object_terms($insert_id, $monthname, 'date', $append = true);
		if(!term_exists($monthId, 'date')) wp_update_term($monthId[0], 'date', array('name' => $month, 'parent' => $yearId[0]));
		if(!is_wp_error($yearId) && !is_wp_error($monthId)){
			$voicename = $year."年".$month."月";
			$args = array(
				'posts_per_page' => -1,
				'name' => $voicename,
				'post_type' => 'voices'
			);
			$voicePosts = query_posts($args);
			if(!$voicePosts){
				$insertVoice = array_merge(array(
					'post_status' => 'publish',
					'post_title' => $voicename,
					'comment_status' => 'closed'
				), $args);
				$voicePost = wp_insert_post($insertVoice);
				wp_set_object_terms($voicePost, $year, 'date', $append = true);
				wp_set_object_terms($voicePost, $monthname, 'date', $append = true);
			}
		}

		//回収品目タクソノミー挿入
		foreach($cltdItem as $var){
			if($var != "その他"){
				wp_set_object_terms($insert_id, $var, 'cltitems', $append = true);
				$args = array(
					'posts_per_page' => -1,
					'name' => $var,
					'post_type' => 'items'
				);
				$itemPosts = query_posts($args);
				if(!$itemPosts){
					$insertItem = array_merge(array(
						'post_status' => 'publish',
						'post_title' => $var,
						'comment_status' => 'closed'
					), $args);
					$itemPost = wp_insert_post($insertItem);
					wp_set_object_terms($itemPost, $var, 'cltitems', $append = true);
				}				
			}
		}

		//利用オプションタクソノミー挿入
		foreach($option as $svc){
			wp_set_object_terms($insert_id, $svc, 'services', $append = true);
		}


		//年代計算
		$str = str_replace("/","", $cstmBD);
		$age = intval((date('Ymd') - $str) / 10000);
		$era = substr($age, 0, 1);
		$era = $era."0代";

		//カスタムフィールド挿入
		add_post_meta($insert_id, 'worksInfo01', $cstmName);
		add_post_meta($insert_id, 'worksInfo36', $cstmType);
		add_post_meta($insert_id, 'worksInfo02', $cstmPron);
		add_post_meta($insert_id, 'worksInfo03', $cstmPhoneNum);
		add_post_meta($insert_id, 'worksInfo37', $cstmEmail);
		add_post_meta($insert_id, 'worksInfo04', $era);
		add_post_meta($insert_id, 'worksInfo05', $cstmJobEtc);
		add_post_meta($insert_id, 'worksInfo06', $coupon);
		add_post_meta($insert_id, 'worksInfo07', $cue);
		add_post_meta($insert_id, 'worksInfo08', $cueEtc);
		add_post_meta($insert_id, 'worksInfo09', $from);
		add_post_meta($insert_id, 'worksInfo44', $searchEtc);
		add_post_meta($insert_id, 'worksInfo10', $fromEtc);
		add_post_meta($insert_id, 'worksInfo11', $cause);
		add_post_meta($insert_id, 'worksInfo12', $causeEtc);
		add_post_meta($insert_id, 'worksInfo13', $causeFirst);
		add_post_meta($insert_id, 'worksInfo14', $causeSecond);
		add_post_meta($insert_id, 'worksInfo15', $causeThird);
		add_post_meta($insert_id, 'worksInfo16', $voiceCC);
		add_post_meta($insert_id, 'worksInfo17', $voiceCCCmt);
		add_post_meta($insert_id, 'worksInfo18', $voiceCS);
		add_post_meta($insert_id, 'worksInfo19', $voiceCSCmt);
		add_post_meta($insert_id, 'worksInfo20', $voiceCost);
		add_post_meta($insert_id, 'worksInfo21', $voiceCostCmt);
		add_post_meta($insert_id, 'worksInfo22', $voiceHP);
		add_post_meta($insert_id, 'worksInfo23', $voiceHPCmt);
		add_post_meta($insert_id, 'worksInfo24', $voiceEtcSvc);
		add_post_meta($insert_id, 'worksInfo25', $voiceEtc);
		add_post_meta($insert_id, 'worksInfo26', $cttCor);
		add_post_meta($insert_id, 'worksInfo27', $cttedCor);
		add_post_meta($insert_id, 'worksInfo28', $cttedCorEtc);
		add_post_meta($insert_id, 'worksInfo29', $notAplyCor);
		add_post_meta($insert_id, 'worksInfo30', $notAplyCorEtc);
		add_post_meta($insert_id, 'worksInfo31', $cttOrg);
		add_post_meta($insert_id, 'worksInfo32', $notAplyOrg);
		add_post_meta($insert_id, 'worksInfo33', $notAplyOrgEtc);
		add_post_meta($insert_id, 'worksInfo34', $notCttOrg);
		add_post_meta($insert_id, 'worksInfo35', $notCttOrgEtc);
		add_post_meta($insert_id, 'worksInfo38', $cltditemEtc);
		add_post_meta($insert_id, 'worksInfo39', $userAgent);
		//40, 41番使用不可
		add_post_meta($insert_id, 'worksInfo42', $cstmInt);
		add_post_meta($insert_id, 'worksInfo43', $cstmIntEtc);

		//受付お知らせメール送信
		$inquryValues = array(
			'cstmName' => $cstmName,
			'post_title' => $post_title,
			'couponNum' => $couponNum,
			'cltdItems' => $cltdItems,
			'cltdItemEtc' => $cltdItemEtc,
			'svc' => $svc,
			'cue' => $cue,
			'cueEtc' => $cueEtc,
			'from' => $from,
			'searchEtc' => $searchEtc,
			'fromEtc' => $fromEtc,
			'cause' => $cause,
			'causeEtc' => $causeEtc,
			'causeFirst' => $causeFirst,
			'causeSecond' => $causeSecond,
			'causeThird' => $causeThird,
			'voiceCC' => $voiceCC,
			'voiceCCCmt' => $voiceCCCmt,
			'voiceCS' => $voiceCS,
			'voiceCSCmt' => $voiceCSCmt,
			'voiceCost' => $voiceCost,
			'voiceCostCmt' => $voiceCostCmt,
			'voiceHP' => $voiceHP,
			'voiceHPCmt' => $voiceHPCmt,
			'voiceEtc' => $voiceEtc,
			'voiceEtcSvc' => $voiceEtcSvc,
			'cttCor' => $cttCor,
			'cttedCor' => $cttedCor,
			'cttedCorEtc' => $cttedCorEtc,
			'notAplyCor' => $notAplyCor,
			'notAplyCorEtc' => $notAplyCorEtc,
			'cttOrg' => $cttOrg,
			'notAplyOrg' => $notAplyOrg,
			'notAplyOrgEtc' => $notAplyOrgEtc,
			'notCttOrg' => $notCttOrg,
			'notCttOrgEtc' => $notCttOrgEtc,
			'useragent' => $useragent,
			'couponNum' => $couponNum
		);
		inquiry_ntfct($cstmEmail, $inquryValues);
		inquiry_ntfct_isd($inquryValues);

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

		<?php echo telBnr(); ?>

	<?php endwhile; endif; ?>


</article>
</div>

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


<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>

<script src="//easy-entry.jp/ffconf/ffconf_5000_0141_0233.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=100" charset="utf-8" type="text/javascript"></script>

</body>
</html>
