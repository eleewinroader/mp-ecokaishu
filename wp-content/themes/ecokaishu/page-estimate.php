<?php
/*
*
* Template name: かんたん見積フォーム
*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

include(TEMPLATEPATH.'/estimate-post.php');
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

		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('estimate/confirm', OBJECT));
		$submits = "見積内容を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate-form.php');
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