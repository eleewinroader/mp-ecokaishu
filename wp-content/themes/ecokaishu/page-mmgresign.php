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

	<div class="fullwidthForm">

		<?php
		$actions = get_permalink(get_page_by_path('mmgresign/temp', OBJECT));
		$submits = "メルマガの仮解除をする";
		echo '<form action="'.$actions.'" method="post" name="form" id="mailmag" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/mmgregist-form.php');
		echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
		?>

	</div>
</article>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>