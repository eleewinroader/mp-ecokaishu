<?php
/**
 * The main template file.
* @package Montser Platform
 */

if(is_array($_POST["cltdItem"])) $cltdItem = $_POST["cltdItem"];
else $cltdItem = explode("\t", $_POST["cltdItem"]);
$cltdItem = array_filter($cltdItem, "strlen"); //回収した不用品
$cltdItemEtc = $_POST["cltdItemEtc"]; //回収した不用品その他
if(is_array($_POST["cue"])) $cue = $_POST["cue"];
else $cue = explode("\t", $_POST["cue"]);
$cue = array_filter($cue, "strlen"); //不用品を出そうと思ったきっかけ
$cueEtc = $_POST["cueEtc"]; //不用品を出そうと思ったきっかけのその他
if(is_array($_POST["from"])) $from = $_POST["from"];
else $from = explode("\t", $_POST["from"]);
$from = array_filter($from, "strlen"); //当社のことどうやって知った
$fromEtc =  $_POST["fromEtc"]; //当社のことどうやって知ったその他
$searchEtc = $_POST["searchEtc"]; //２番の理由
if(is_array($_POST["cause"])) $cause = $_POST["cause"];
else $cause = explode("\t", $_POST["cause"]);
$cause = array_filter($cause, "strlen"); //当社を選んだ理由
$causeEtc = $_POST["causeEtc"]; //当社を選んだ理由のその他
$causeFirst = $_POST["causeFirst"]; //１番の理由
$causeSecond = $_POST["causeSecond"]; //２番の理由
$causeThird = $_POST["causeThird"]; //３番の理由
$voiceCC = $_POST["voiceCC"]; //受付スタッフについて
$voiceCCCmt = $_POST["voiceCCCmt"]; //受付スタッフへのコメント
$voiceCS = $_POST["voiceCS"]; //回収スタッフについて
$voiceCSCmt = $_POST["voiceCSCmt"]; //回収スタッフへのコメント
$voiceCost = $_POST["voiceCost"]; //回収料金について
$voiceCostCmt = $_POST["voiceCostCmt"]; //回収料金へのコメント
$voiceHP = $_POST["voiceHP"]; //ホームページについて
$voiceHPCmt = $_POST["voiceHPCmt"]; //ホームページへのコメント
if(is_array($_POST["option"])) $option = $_POST["option"];
else $option = explode("\t", $_POST["option"]);
$option = array_filter($option, "strlen"); //オプション
$voiceEtcSvc = $_POST["voiceEtcSvc"]; //今後どんなサービスについて
$voiceEtc = $_POST["voiceEtc"]; //その他へのコメント

$cttCor = $_POST["cttCor"]; //他社相談したか
if(is_array($_POST["cttedCor"])) $cttedCor = $_POST["cttedCor"];
else $cttedCor = explode("\t", $_POST["cttedCor"]);
$cttedCor = array_filter($cttedCor, "strlen"); //相談した会社
$cttedCorEtc = $_POST["cttedCorEtc"]; //他社相談したか
if(is_array($_POST["notAplyCor"])) $notAplyCor = $_POST["notAplyCor"];
else $notAplyCor = explode("\t", $_POST["notAplyCor"]);
$notAplyCor = array_filter($notAplyCor, "strlen"); //相談した会社を選ばなかった理由
$notAplyCorEtc = $_POST["notAplyCorEtc"]; //相談した会社を選ばなかった理由その他

$cttOrg = $_POST["cttOrg"]; //自治体に相談したか
if(is_array($_POST["notAplyOrg"])) $notAplyOrg = $_POST["notAplyOrg"];
else $notAplyOrg = explode("\t", $_POST["notAplyOrg"]);
$notAplyOrg = array_filter($notAplyOrg, "strlen"); //自治体を選ばなかった理由
$notAplyOrgEtc = $_POST["notAplyOrgEtc"]; //自治体を選ばなかった理由その他
if(is_array($_POST["notCttOrg"])) $notCttOrg = $_POST["notCttOrg"];
else $notCttOrg = explode("\t", $_POST["notCttOrg"]);
$notCttOrg = array_filter($notCttOrg, "strlen"); //自治体を相談しなかった理由
$notCttOrgEtc = $_POST["notCttOrgEtc"]; //自治体を相談しなかった理由その他

$cstmName = $_POST["cstmName"]; //お名前取得
$cstmPron = $_POST["cstmPron"]; //ふりがな取得
$cstmType = $_POST["cstmType"]; //法人取得
$cstmEmail = $_POST["cstmEmail"]; //メールアドレス取得
$cstmPhoneNum = $_POST["cstmPhoneNum"]; // 電話番号
$cstmPrefecture = $_POST["cstmPrefecture"]; //県取得
if($_POST["cstmMncplt0"]) $cstmMncplt = $_POST["cstmMncplt0"];
if($_POST["cstmMncplt1"]) $cstmMncplt = $_POST["cstmMncplt1"];
if($_POST["cstmMncplt2"]) $cstmMncplt = $_POST["cstmMncplt2"];
if($_POST["cstmMncplt3"]) $cstmMncplt = $_POST["cstmMncplt3"];
if($_POST["cstmMncplt4"]) $cstmMncplt = $_POST["cstmMncplt4"];
if($_POST["cstmMncplt5"]) $cstmMncplt = $_POST["cstmMncplt5"];
if($_POST["cstmMncplt6"]) $cstmMncplt = $_POST["cstmMncplt6"];//市区町村取得
$cstmAge = $_POST["cstmAge"]; //年齢
$cstmBD = $_POST["cstmBD"]; //年齢
$cstmSex = $_POST["cstmSex"]; //性別
$cstmMrg = $_POST["cstmMrg"]; //既婚・未婚
$cstmResType = $_POST["cstmResType"]; //家族・住居形態
$cstmJob = $_POST["cstmJob"]; //職業
$cstmJobEtc = $_POST["cstmJobEtc"]; //職業その他
if(is_array($_POST["cstmInt"])) $cstmInt = $_POST["cstmInt"];
else $cstmInt = explode("\t", $_POST["cstmInt"]);
$cstmInt = array_filter($cstmInt, "strlen"); //気になるトピック
$cstmIntEtc = $_POST["cstmIntEtc"]; //気になるトピックその他

$mmgReg = $_POST["mmgReg"]; //メルマガ登録取得
$agreeLaw = $_POST["agreeLaw"]; //プライバシーポリシーに同意するか
$siteCode = $_POST["siteCode"]; //サイトコード
$coupon = $_POST["coupon"]; //クーポン取得
$chaKey = $_POST["pswd"]; //アンケートパスワード


?>