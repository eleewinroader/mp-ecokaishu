<?php
/*
*
* Template name: クーポン未使用者専用内容確認
*
* @package Montser Platform
*/

include (TEMPLATEPATH . '/coupon-post.php');
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
		$actions = get_permalink(get_page_by_path('coupon/confirm', OBJECT));
		$submits = "アンケートの内容を確認する";
		echo '<div class="fullwidthForm"><form action="'.$actions.'" method="post" name="form" id="coupon" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/coupon-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form></div>';
	}else{ //エラーメッセージが無い場合
		$disabled = ' disabled';
		$actions = array(get_permalink(get_page_by_path('coupon', OBJECT)), get_permalink(get_page_by_path('coupon/thanks', OBJECT)));
		$submits = array("内容を修正する", "この内容で送信する");
		echo '<div class="fullwidthForm" id="confirm">';
		include(TEMPLATEPATH.'/coupon-form.php');
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


</body>
</html>