<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

$cstmPrefecture = $_POST["cstmPrefecture"]; //県取得
if($_POST["cstmMncplt0"]) $cstmMncplt = $_POST["cstmMncplt0"];
if($_POST["cstmMncplt1"]) $cstmMncplt = $_POST["cstmMncplt1"];
if($_POST["cstmMncplt2"]) $cstmMncplt = $_POST["cstmMncplt2"];
if($_POST["cstmMncplt3"]) $cstmMncplt = $_POST["cstmMncplt3"];
if($_POST["cstmMncplt4"]) $cstmMncplt = $_POST["cstmMncplt4"];
if($_POST["cstmMncplt5"]) $cstmMncplt = $_POST["cstmMncplt5"];
if($_POST["cstmMncplt6"]) $cstmMncplt = $_POST["cstmMncplt6"];//
$cstmResidence = $_POST["cstmResidence"]; //住居形態取得
$cstmRsdcEtc = $_POST["cstmRsdcEtc"]; //住居形態取得
$cstmElvt = $_POST["cstmElvt"]; //エレベーター取得
$cstmFloor = $_POST["cstmFloor"]; //階数習得


$cstmName = $_POST["cstmName"]; //お名前取得
$cstmPron = $_POST["cstmPron"]; //ふりがな取得
$cstmType = $_POST["cstmType"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmPhoneNum = $_POST["cstmPhoneNum"]; // 電話番号
$cstmContents = $_POST["cstmContents"]; //お問い合わせ内容取得

if(is_array($_POST["cpiItems"])) $cpiItems = $_POST["cpiItems"];
else $cpiItems = explode("\t", $_POST["cpiItems"]);
//$cpiItems = array_filter($cpiItems, "strlen"); キャンペーン対象品取得

$cltDay0 = $_POST["cltDay0"]; //集荷日指定するかしないか習得
$cltDay1 = $_POST["cltDay1"]; //集荷日指定するかしないか習得
$cltDay2 = $_POST["cltDay2"]; //集荷日指定するかしないか習得

$replyWay = $_POST["replyWay"]; //エコランドからのご連絡取得
//$coupon = $_POST["coupon"]; クーポン取得
//$couponUsed = $_POST["couponUsed"]; クーポン使用取得
$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード


if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];

?>