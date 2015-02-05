<<<<<<< HEAD
<?php
/*
* @package Montser Platform
*/



$quesKind = $_POST["quesKind"]; //お問い合わせサービスその他取得
$cstmName = $_POST["cstmName"]; //お名前取得
$cstmPron = $_POST["cstmPron"]; //ふりがな取得
$cstmType = $_POST["cstmType"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmPhoneNum = $_POST["cstmPhoneNum"]; // 電話番号
$cstmContents = $_POST["cstmContents"]; //お問い合わせ内容取得
$replyWay = $_POST["replyWay"]; //エコランドからのご連絡取得
//$coupon = $_POST["coupon"]; クーポン取得
//$couponUsed = $_POST["couponUsed"]; クーポン使用取得
$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード

if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];

?>
=======
<?php
/*
* @package Montser Platform
*/



$quesKind = $_POST["quesKind"]; //お問い合わせサービスその他取得
$afUserID = $_POST["afUserID"]; //お名前取得
$afUserName = $_POST["afUserName"]; //ふりがな取得
$afUserPhone = $_POST["afUserPhone"]; //法人取得
$afUserCltDate = $_POST["afUserCltDate"]; //メールアドレス取得
$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード

if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];

?>
>>>>>>> 207be51fed207f50de305fbcbfbe383aeaec59f4
