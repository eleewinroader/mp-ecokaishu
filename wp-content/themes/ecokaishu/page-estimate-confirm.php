<?php
/**
 * The main template file.
 *
 * Template name: メールで見積依頼の内容確認
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
 */

include(TEMPLATEPATH.'/estimate-post.php');

/*
$errormsg = array();
if(!$estmtCstmPrefecture) $errormsg['estmtCstmPrefecture'] = "お住まいの県をご入力ください";
if(!$cstmMncplt) $errormsg['cstmMncplt'] = "お住まいの市区町村をご入力ください";
if(!$estmtCstmResidence) $errormsg['estmtCstmResidence'] = "住居形態をご入力ください";
if(!$estmtCstmElvt) $errormsg['estmtCstmElvt'] = "エレベーターがあるかどうか選択してください";
if(!$estmtCstmFloor) $errormsg['estmtCstmFloor'] = "荷物がある階数を選択してください";
if(!$estmtCstmPkar) $errormsg['estmtCstmPkar'] = "トラックを止めるスペースがあるかどうか選択してください";
if(!$estmtCstmName) $errormsg['estmtCstmName'] = "お名前をご入力ください";
if(!$estmtCstmEmail) $errormsg['estmtCstmEmail'] = "メールアドレスをご入力ください";
if(!$estmtCstmPhone) $errormsg['estmtCstmPhone'] = "電話番号をご入力ください";
if(!$estmtItem) $errormsg['estmtItem'] = "エコ回収対象品をご入力ください";
if(!$replyWay) $errormsg['replyWay'] = "エコランドからのご連絡方法を選択してください";
if(!$agreeLaw) $errormsg['agreeLaw'] = "プライバシーポリシーに同意してください";*/

include (TEMPLATEPATH . '/header-form.php');

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
		$actions = get_permalink(get_page_by_path('estimate/confirm', OBJECT));
		$submits = "見積内容を確認する";
		echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
	}else{ //エラーメッセージが無い場合
		$disabled = ' disabled';
		$actions = array(get_permalink(get_page_by_path('estimate', OBJECT)), get_permalink(get_page_by_path('estimate/thanks', OBJECT)));
		$submits = array("依頼内容を修正する", "この内容で見積を依頼する");
		echo '<div class="fullwidthForm" id="confirm">';
		include(TEMPLATEPATH.'/estimate-form.php');		
		echo '<ul class="formBtns">';
		for($i=0; $i<count($actions); $i++){
			echo '<li><form action="'.$actions[$i].'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
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

<script src="//easy-entry.jp/ffconf/ffconf_5000_0137_0229.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=1" charset="utf-8" type="text/javascript"></script>

</body>
</html>