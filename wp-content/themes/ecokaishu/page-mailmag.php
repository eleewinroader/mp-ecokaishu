<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

include(TEMPLATEPATH.'/mailmag-post.php');

get_header(); ?>

	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">
				<li><?php the_title(); ?></li>
			</ul>
		</nav>
		<h2><?php the_title(); ?></h2>
	</header>

	<div class="fullwidthForm" id="contact">

	<?php
	$actions = get_permalink(get_page_by_path('mailmag/thanks', OBJECT));
	$submits = "登録内容を確認する";
	echo '<form action="'.$actions.'" method="post" name="form" id="mailmag" enctype="multipart/form-data">';
	include(TEMPLATEPATH.'/mailmag-form.php');
	echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
	?>

	<p class="al_c"><a href="<?php echo get_permalink(get_page_by_path('delete', OBJECT)); ?>">メルマガ解除したい方はこちら</a></p>


	</div>

</article>
</div>

<?php get_footer(); ?>