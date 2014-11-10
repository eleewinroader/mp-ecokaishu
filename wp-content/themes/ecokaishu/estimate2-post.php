<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.1
* @since MP-Ecokaishu 0.0
*/

$cstmName = $_POST["cstmName"]; //お名前取得
$cstmPron = $_POST["cstmPron"]; //ふりがな取得
$cstmType = $_POST["cstmType"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmContents = $_POST["cstmContents"]; //お問い合わせ内容取得

$cltDay0 = $_POST["cltDay0"]; //集荷日指定するかしないか習得
$cltDay1 = $_POST["cltDay1"]; //集荷日指定するかしないか習得
$cltDay2 = $_POST["cltDay2"]; //集荷日指定するかしないか習得

$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード

if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];
if($_GET['quiz']) $quiz = $_GET['quiz'];
if($_POST['quiz']) $quiz = $_POST['quiz'];

?>