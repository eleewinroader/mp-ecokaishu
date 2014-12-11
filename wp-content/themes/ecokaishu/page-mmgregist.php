<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

get_header(); ?>

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

	<section class="fullwidthForm">

		<?php
		$actions = get_permalink(get_page_by_path('mmgregist/temp', OBJECT));
		$submits = "メルマガの仮登録をする";
		echo '<form action="'.$actions.'" method="post" name="form" id="mmgregist" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/mmgregist-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
		?>
		<p class="footnote al_c"><small><span class="icon-checkmark-circle" aria-hidden="true"></span><a href="<?php echo get_permalink(get_page_by_path('mmgresign', OBJECT)); ?>">メルマガ解除はこちら</a></small></p>

	</section>	

</article>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>