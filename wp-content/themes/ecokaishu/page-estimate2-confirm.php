<?php
/*
*
* Template name: メールで見積依頼2-1の内容確認
*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.1
* @since MP-Ecokaishu 0.0
*/

include(TEMPLATEPATH.'/estimate2-post.php');
include (TEMPLATEPATH . '/header-form.php');

?>

	<header>
		<h2><?php the_title(); ?></h2>
	</header>

	<?php
	if($errormsg){ //エラーメッセージがある場合
		$disabled = '';
		$actions = get_permalink(get_page_by_path('estimate2/confirm', OBJECT));
		$submits = "見積内容を確認する";
		echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate2-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
	}else{ //エラーメッセージが無い場合
		$disabled = ' disabled';
		$actions = array(get_permalink(get_page_by_path('estimate2', OBJECT)), get_permalink(get_page_by_path('estimate2/thanks', OBJECT)));
		$submits = array("申込内容を修正する", "この内容で申し込む");
		echo '<div class="fullwidthForm" id="confirm">';
		include(TEMPLATEPATH.'/estimate2-form.php');		
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

<script src="//easy-entry.jp/ffconf/ffconf_5000_0139_0231.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=1" charset="utf-8" type="text/javascript"></script>

</body>
</html>
