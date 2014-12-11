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
				<li><a href="<?php echo get_post_type_archive_link('works'); ?>">エコ回収実績</a></li>
				<li><?php single_term_title('', true); ?></li>
			</ul>
			<h2><?php single_term_title('', true); ?></h2>
		</nav>
	</header>

	<?php
	$crt_term = $wp_query->queried_object;
	$args = array(
		'posts_per_page' => -1,
		'order' => ASC,
		'orderby' => 'title',
		'post_type' => 'area',
		'tax_query' => array(
			array(
				'taxonomy' => 'cltarea',
				'field' => 'id',
				'terms' => array($crt_term->term_id)
			)
		)
	);
	$municipalities = query_posts($args);
	if($municipalities): ?>
			<div class="content">
				<ul class="cstmCalendar">
					<?php foreach($municipalities as $municipality){
						if($municipality->post_title != $prefName) echo '<li><a href="'.get_permalink($municipality->ID).'">'.$municipality->post_title.'</a></li>';
					}?>						
				</ul>
			</div>
	<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>