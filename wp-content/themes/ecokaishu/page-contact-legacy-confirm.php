<?php
/*
*
* Template name: レガシー用お問い合わせ内容確認
*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
*/
 
include (TEMPLATEPATH . '/contact-post.php');
include (TEMPLATEPATH . '/header-legacy.php');

?>

	<div class="fullwidthForm" id="contact">

		<h2><?php the_title(); ?></h2>

		<?php
		if($errormsg){ //エラーメッセージがある場合
			$disabled = '';
			$actions = get_permalink(get_page_by_path('contact-legacy/confirm', OBJECT));
			$submits = "お問い合わせ内容を確認する";
			echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="" enctype="multipart/form-data">';
			include(TEMPLATEPATH.'/contact-form.php');
			echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
		}else{ //エラーメッセージが無い場合
			$disabled = ' disabled';
			$actions = array(get_permalink(get_page_by_path('contact-legacy', OBJECT)), get_permalink(get_page_by_path('contact-legacy/thanks', OBJECT)));
			$submits = array("内容を修正する", "この内容で送信する");
			echo '<div class="fullwidthForm" id="confirm">';
			include(TEMPLATEPATH.'/contact-form.php');
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

	
	</div>

</article>
</div>

<?php include (TEMPLATEPATH . '/footer-legacy.php'); ?>