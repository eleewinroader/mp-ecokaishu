<?php
/*
*
* Template name: アンケートの内容確認	
*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
*/

include(TEMPLATEPATH.'/inquiry-post.php');
include (TEMPLATEPATH . '/header-form.php');

//エラーメッセージ取得
/*
$errormsg = array();
if(!$item) $errormsg['item'] = "回収したいただいた品目を選択してください。";
if(!$voiceCC) $errormsg['voiceCC'] = "受付スタッフの対応について評価してください";
if(!$voiceCS) $errormsg['voiceCS'] = "回収スタッフの対応について評価してください";
if(!$voiceCost) $errormsg['voiceCost'] = "回収料金について評価してください";
if(!$voiceHP) $errormsg['voiceHP'] = "ホームページについて評価してください";
if(!$cstmName) $errormsg['cstmName'] = "ニックネームをご入力ください";
if(!$nickName) $errormsg['nickName'] = "ニックネームをご入力ください";
if(!$cstmPhone) $errormsg['cstmPhone'] = "電話番号をご入力ください";
if(!$cstmPrefecture) $errormsg['cstmPrefecture'] = "お住まいの県名を選択してください";
if(!$cstmMncplt) $errormsg['cstmMncplt'] = "お住まいの市町村を選択してください";
if(!$cstmEmail) $errormsg['cstmEmail'] = "メールアドレスをご入力ください";
if(!$cstmBD) $errormsg['cstmBD'] = "生年月日をご入力ください";
if(!$cstmSex) $errormsg['cstmSex'] = "性別をご入力ください";
if(!$cstmMrg) $errormsg['cstmMrg'] = "未婚・既婚を選択してください";
if(!$cstmResType) $errormsg['cstmResType'] = "一緒に暮らしている人数を選択してください";
if(!$cstmJob) $errormsg['cstmJob'] = "職業を選択してください";
if(!$agreeLaw) $errormsg['agreeLaw'] = "プライバシーポリシーに同意してください";}*/
?>

	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">					
				<li><?php the_title(); ?></li>
			</ul>
		</nav>
		<h2><?php the_title(); ?></h2>
	</header>

	<?php
	if($errormsg){ //エラーメッセージがある場合
		$disabled = '';
		$actions = get_permalink(get_page_by_path('inquiry/confirm', OBJECT));
		$submits = "アンケートの内容を確認する";
		echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="inquiry" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/inquiry-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
	}else{ //エラーメッセージが無い場合
		$disabled = ' disabled';
		$actions = array(get_permalink(get_page_by_path('inquiry', OBJECT)), get_permalink(get_page_by_path('inquiry/thanks', OBJECT)));
		$submits = array("内容を修正する", "この内容で送信する");
		echo '<div class="fullwidthForm" id="confirm">';
		include(TEMPLATEPATH.'/inquiry-form.php');
		echo '<ul class="formBtns">';
		for($i=0; $i<count($actions); $i++){
			echo '<li><form action="'.$actions[$i].'" method="post" name="form" id="confirm" enctype="multipart/form-data">';
			foreach($_POST as $key => $val){ 
				if(is_array($val)) $val = implode("\t", $val);
				else $val = $val;
				echo '<input type="hidden" name="'.$key.'" value="'.$val.'" />';
			}
			echo '<input type="submit" name="" value="'.$submits[$i].'" id="submit" /></form></li>';
		}
		echo '</ul></div>';
	}?>


</article>
</div>

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>

<script src="//easy-entry.jp/ffconf/ffconf_5000_0141_0233.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=1" charset="utf-8" type="text/javascript"></script>

</body>
</html>
