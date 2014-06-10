<?php
/*
*
* Template name: かんたん見積フォーム
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/


include(TEMPLATEPATH.'/estimate2-post.php');
include (TEMPLATEPATH . '/header-form.php');

?>

	<header>
		<h2 class="al_c"><?php the_title(); ?></h2>
	</header>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; endif; ?>

	<div class="fullwidthForm" id="estimate">

		<div class="test"></div>

		<div class="contents" id="estmtIntro">
		<div class="content al_c">
			<img src="<?php echo siteInfo("rootUrl"); ?>/img/kaishu/estmt/intro_camp2-1.gif" alt="<step1>WEBで申込：引取商品と希望日を希望！<step2>引取日確定：専門スタッフよりご連絡します！<step3>自宅まで引取：当日自宅まで取りに伺います" />
		</div></div>

		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('estimate2/confirm', OBJECT));
		$submits = "サービス申込を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate2-form.php');
		echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		?>

	</div>

</article>
</div>
	

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>


</body>
</html>