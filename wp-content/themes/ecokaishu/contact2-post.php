<?php
/*
* @package Montser Platform
*/



$quesKind = $_POST["quesKind"]; 
$afUserID = $_POST["afUserID"];
$afUserName = $_POST["afUserName"];
$afUserPhone = $_POST["afUserPhone"];

if(is_array($_POST["afUserCltDate"])) $afUserCltDate = $_POST["afUserCltDate"];
else $afUserCltDate = explode("\t", $_POST["afUserCltDate"]);
$agreeLaw = $_POST["agreeLaw"];

if($_GET['pr_code']) $pr_code = $_GET['pr_code'];
if($_POST['pr_code']) $pr_code = $_POST['pr_code'];

?>