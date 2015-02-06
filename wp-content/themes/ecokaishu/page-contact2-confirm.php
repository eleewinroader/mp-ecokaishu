<?php
/**
 * The main template file.
 *
 * Template name: 直接引取りキャンペーン内容確認
* @package Montser Platform
 */

include (TEMPLATEPATH . '/contact2-post.php');

//エラーメッセージ取得
$errormsg = array();
if(!$afUserID) $errormsg['afUserID'] = "お名前をご入力ください";
if(!$afUserName) $errormsg['afUserName'] = "メールアドレスを入力ください";
if(!$afUserPhone) $errormsg['afUserPhone'] = "連絡可能な電話番号をご入力ください";
if(!$afUserCltDate) $errormsg['afUserCltDate'] = "お問い合わせ内容をご入力ください";
if(!$agreeLaw) $errormsg['agreeLaw'] = "プライバシーポリシーに同意してください";

include (TEMPLATEPATH . '/header-form.php');

?>

	<header>
		<h2><?php the_title(); ?></h2>
	</header>

	<?php
	if($errormsg){ //エラーメッセージがある場合
		$disabled = '';
		$actions = get_permalink(get_page_by_path('contact2/confirm', OBJECT));
		$submits = "お問い合わせ内容を確認する";
		echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/contact2-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
	}else{ //エラーメッセージが無い場合
		$disabled = ' disabled';
		$actions = array(get_permalink(get_page_by_path('contact2', OBJECT)), get_permalink(get_page_by_path('contact2/thanks', OBJECT)));
		$submits = array("内容を修正する", "この内容で送信する");
		echo '<div class="fullwidthForm" id="confirm">';
		include(TEMPLATEPATH.'/contact2-form.php');
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

<script src="//easy-entry.jp/ffconf/ffconf_5000_0138_0230.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=1" charset="utf-8" type="text/javascript"></script>

</body>
</html>