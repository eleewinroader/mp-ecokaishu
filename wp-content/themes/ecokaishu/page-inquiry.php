<?php
/*
*
* Template name: アンケートフォーム
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

include(TEMPLATEPATH.'/inquiry-post.php');
include (TEMPLATEPATH . '/header-form.php');
$chaKey = $_POST["pswd"];
?>

	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">					
				<li><?php the_title(); ?></li>
			</ul>
		</nav>
		<h2><?php the_title(); ?></h2>
	</header>

	<?php if($chaKey == "ecowin"): ?>
		<div class="fullwidthForm">
			<?php
			the_content();
			$actions = get_permalink(get_page_by_path('inquiry/confirm', OBJECT));
			$submits = "アンケートの内容を確認する";
			echo '<form action="'.$actions.'" method="post" name="form" id="inquiry" enctype="multipart/form-data">';
			include(TEMPLATEPATH.'/inquiry-form.php');
			echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
			?>
		</div>
	<?php else: ?>
		<div class="fullwidthForm" id="anketoForm">
				<p class="errormsg">チャレンジキーが正しくありません。</p>
				<?php
				$actions = get_permalink(get_page_by_path('inquiry', OBJECT));
				$submits = "アンケートに答える";
				echo '<div class="form"><form action="'.$actions.'" method="post" name="form" id="inquiry" enctype="multipart/form-data">';
				echo '<p id="challengeKey"><span class="icon-key-2 pink" aria-hidden="true"></span><span class="label">チャレンジキー</span><input name="pswd" type="password" /></p>';
				echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></form></div>';
				?>
			<p><a href="<?php echo home_url(); ?>/anketo/">前のページに戻る</a></p>
		</div>
	<?php endif; ?>

</article>
</div>

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>


</body>
</html>