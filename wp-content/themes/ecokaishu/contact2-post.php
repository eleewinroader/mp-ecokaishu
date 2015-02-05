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
