<?php
/*
*
* Template name: かんたん見積フォーム
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/


include(TEMPLATEPATH.'/estimate2-1-post.php');
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

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; endif; ?>

	<div class="fullwidthForm" id="estimate">

		<div class="contents">
		<div class="content" id="estmtIntro">
		<img src="<?php echo siteInfo("rootUrl"); ?>/img/kaishu/estmt/intro_camp2<?php if(is_smartphone()) echo "_s"; ?>.gif" alt="" /></div></div>

		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('estimate2-1/confirm', OBJECT));
		$submits = "サービス申込を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate2-1-form.php');
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