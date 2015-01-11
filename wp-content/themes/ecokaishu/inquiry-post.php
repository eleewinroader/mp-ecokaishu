<?php
/**
 * The main template file.
* @package Montser Platform
 */


$cstmCltId = $_POST["cstmCltId"];
$cstmCltPass = $_POST["cstmCltPass"];

$cstmName = $_POST["cstmName"]; //お名前取得
$cstmSex = $_POST["cstmSex"]; //性別
$cstmAge = $_POST["cstmAge"]; //年齢

$cltPrefecture = $_POST["cltPrefecture"]; //県取得
if($_POST["cltMncplt0"]) $cltMncplt = $_POST["cltMncplt0"];
if($_POST["cltMncplt1"]) $cltMncplt = $_POST["cltMncplt1"];
if($_POST["cltMncplt2"]) $cltMncplt = $_POST["cltMncplt2"];
if($_POST["cltMncplt3"]) $cltMncplt = $_POST["cltMncplt3"];
if($_POST["cltMncplt4"]) $cltMncplt = $_POST["cltMncplt4"];
if($_POST["cltMncplt5"]) $cltMncplt = $_POST["cltMncplt5"];
if($_POST["cltMncplt6"]) $cltMncplt = $_POST["cltMncplt6"];//市区町村取得

if(is_array($_POST["cltItem"])) $cltItem = $_POST["cltItem"];
else $cltItem = explode("\t", $_POST["cltItem"]);
$cltItem = array_filter($cltItem, "strlen"); //回収した不用品
$cltItemTxt = $_POST["cltItemTxt"]; //回収した不用品その他

if(is_array($_POST["cstmStart"])) $cstmStart = $_POST["cstmStart"];
else $cstmStart = explode("\t", $_POST["cstmStart"]);
$cstmStart = array_filter($cstmStart, "strlen"); //不用品を出そうと思ったきっかけ
$cstmStartTxt = $_POST["cstmStartTxt"]; //不用品を出そうと思ったきっかけのその他

if(is_array($_POST["cstmReason"])) $cstmReason = $_POST["cstmReason"];
else $cstmReason = explode("\t", $_POST["cstmReason"]);
$cstmReason = array_filter($cstmReason, "strlen"); //当社を選んだ理由
$cstmReasonTxt = $_POST["cstmReasonTxt"]; //当社を選んだ理由のその他
$cstmReason1 = $_POST["cstmReason1"]; //１番の理由
$cstmReason2 = $_POST["cstmReason2"]; //２番の理由
$cstmReason3 = $_POST["cstmReason3"]; //３番の理由

$voiceCC = $_POST["voiceCC"]; //受付スタッフについて
$voiceCCCmt = $_POST["voiceCCCmt"]; //受付スタッフへのコメント
$voiceCS = $_POST["voiceCS"]; //回収スタッフについて
$voiceCSCmt = $_POST["voiceCSCmt"]; //回収スタッフへのコメント
$voiceGeneral = $_POST["voiceGeneral"]; //全体について
$voiceGeneralCmt = $_POST["voiceGeneralCmt"]; //全体についてのコメント
$voiceRecommend = $_POST["voiceRecommend"]; //オススメ
$voiceRecommendCmt = $_POST["voiceRecommendCmt"]; //オススメするについてのコメント


$cstmNamePrivate = $_POST["cstmNamePrivate"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmPhoneNum = $_POST["cstmPhoneNum"]; // 電話番号

if($_POST){

	date_default_timezone_set("Asia/Tokyo");
	$submitdate = date("Ymd", time()); //送信タイム
	$post_type = "voices";
	$post_title = cmsTitle($post_type, $submitdate);

	$insertpost = array(
		"post_status" => "pending",
		"post_title" => $post_title,
		"post_author" => 1,
		"comment_status" => "open",
		"post_type" => $post_type,
	);
	$insert_id = wp_insert_post($insertpost);

	if($insert_id){

		wp_set_object_terms($insert_id, "review", "voicekinds", $append = true);

		wp_set_object_terms($insert_id, $cltPrefecture, "cltarea", $append = true);
		wp_set_object_terms($insert_id, $cltMncplt, "cltarea", $append = true);

		foreach($cltItem as $item){
			$append = array("アンティーク家具", "ベッド", "掃除機", "書籍", "枕", "洗濯機", "照明", "パソコン", "パソコン周辺機器");
			$item = in_array($item, $append) ? $item."類" : $item;
			$term = get_term_by("name", $item, "cltitems");
			$parentId = $term->parent;
			$parent = get_term_by("id", $parentId, "cltitems");
			wp_set_object_terms($insert_id, $item, "cltitems", $append = true);
			wp_set_object_terms($insert_id, $parent->name, "cltitems", $append = true);
		}

		foreach($cstmStart as $start){
			if($start != "start3") wp_set_object_terms($insert_id, $start, "starts", $append = true);
		}

		$reasonsTops = array($cstmReason1, $cstmReason2, $cstmReason3);
		foreach($reasonsTops as $reason){
			$term = get_term_by("slug", $reason, "features");
			$parentId = $term->parent;
			$parent = get_term_by("id", $parentId, "features");
			wp_set_object_terms($insert_id, $reason, "features", $append = true);
			wp_set_object_terms($insert_id, $parent->name, "features", $append = true);
		}

		//カスタムフィールド挿入
		add_post_meta($insert_id, "voiceInfo06", $cstmName);
		add_post_meta($insert_id, "voiceInfo23", $cstmCltDate);
		add_post_meta($insert_id, "voiceInfo07", $cstmSex);
		add_post_meta($insert_id, "voiceInfo08", $cstmAge);
		add_post_meta($insert_id, "voiceInfo09", $cltItemTxt);
		add_post_meta($insert_id, "voiceInfo10", $cstmStartTxt);

		foreach($cstmReason as $reason){
			add_post_meta($insert_id, "voiceInfo11", $reason);
		}
		add_post_meta($insert_id, "voiceInfo26", $cstmReason1);
		add_post_meta($insert_id, "voiceInfo27", $cstmReason2);
		add_post_meta($insert_id, "voiceInfo28", $cstmReason3);

		add_post_meta($insert_id, "voiceInfo12", $voiceCC);
		add_post_meta($insert_id, "voiceInfo13", $voiceCCCmt);
		add_post_meta($insert_id, "voiceInfo14", $voiceCS);
		add_post_meta($insert_id, "voiceInfo15", $voiceCSCmt);
		add_post_meta($insert_id, "voiceInfo16", $voiceGeneral);
		add_post_meta($insert_id, "voiceInfo17", $voiceGeneralCmt);
		add_post_meta($insert_id, "voiceInfo18", $voiceRecommend);
		add_post_meta($insert_id, "voiceInfo19", $voiceRecommendCmt);

		add_post_meta($insert_id, "voiceInfo20", $cstmNamePrivate);
		add_post_meta($insert_id, "voiceInfo21", $cstmEmail);
		add_post_meta($insert_id, "voiceInfo22", $cstmPhoneNum);
		add_post_meta($insert_id, "voiceInfo24", $cstmCltId);
		add_post_meta($insert_id, "voiceInfo25", $cstmCltPass);

	}

}?>