<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

$cstmPrefecture = $_POST["cstmPrefecture"]; //県取得
$yCollCstmMuni = $_POST["yCollCstmMuni"];//
$cstmResidence = $_POST["cstmResidence"]; //住居形態取得
$cstmRsdcEtc = $_POST["cstmRsdcEtc"]; //住居形態取得
$cstmElvt = $_POST["cstmElvt"]; //エレベーター取得
$cstmFloor = $_POST["cstmFloor"]; //階数習得


$yCollItemArgs = array();
foreach($_POST as $key => $value){
	if(strstr($key, 'yCollItem_cat')) array_push($yCollItemArgs, $key);
}
$yCollItemNum = count($yCollItemArgs);

for($i=0; $i<$yCollItemNum; $i++){
	$catVar = "yCollItem_cat_".$i;
	$$catVar = $_POST[$catVar];
	$brandVar = "yCollItem_brand_".$i;
	$$brandVar = $_POST[$brandVar];
	$widthVar = "yCollItem_width_".$i;
	$$widthVar = $_POST[$widthVar];
	$heightVar = "yCollItem_height_".$i;
	$$heightVar = $_POST[$heightVar];
	$depthVar = "yCollItem_depth_".$i;
	$$depthVar = $_POST[$depthVar];
}


$cstmName = $_POST["cstmName"]; //お名前取得
$cstmPron = $_POST["cstmPron"]; //ふりがな取得
$cstmType = $_POST["cstmType"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmPhoneNum = $_POST["cstmPhoneNum"]; // 電話番号
$cstmContents = $_POST["cstmContents"]; //お問い合わせ内容取得

if(is_array($_POST["cpiItems"])) $cpiItems = $_POST["cpiItems"];
else $cpiItems = explode("\t", $_POST["cpiItems"]);
$cpiItems = array_filter($cpiItems, "strlen"); //キャンペーン対象品取得

$cltDay0 = $_POST["cltDay0"]; //集荷日指定するかしないか習得
$cltDay1 = $_POST["cltDay1"]; //集荷日指定するかしないか習得
$cltDay2 = $_POST["cltDay2"]; //集荷日指定するかしないか習得

$replyWay = $_POST["replyWay"]; //エコランドからのご連絡取得
$coupon = $_POST["coupon"]; //クーポン取得
$couponUsed = $_POST["couponUsed"]; //クーポン使用取得
$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード


if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];
if($_GET['quiz']) $quiz = $_GET['quiz'];
if($_POST['quiz']) $quiz = $_POST['quiz'];

?>