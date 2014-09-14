<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
*/

get_header(); ?>

	<header>
		<nav id="sitepath"><?php if(function_exists( 'bread_crumb' ) ) bread_crumb(array('home_label' => 'エコランドNEWS')); ?></nav>
		<h2><?php the_title(); ?></h2>
	</header>
	trsyrsy
	<?php
	global $more; $more=false;
	if(have_posts()): while(have_posts()): the_post(); ?>
		<section class="contents">
			<header>
				<h3><?php the_title(); ?></h3>	
			</header>
			<div class="content">
				<?php the_content('続きを読む'); ?>
				<footer>								
					<ul>
						<li><span class="icon-folder-open" aria-hidden="true"></span>カテゴリー<?php the_category(' '); ?></li>
						<li><span class="icon-user" aria-hidden="true"></span>作成社<?php the_author(); ?> </li>
						<li><span class="icon-clock" aria-hidden="true"></span>投稿日<?php echo get_the_date('Y年n月j日'); ?></li>
						<?php if(get_the_tag_list()): ?>
							<li><span class="icon-tags" aria-hidden="true"></span>タグ<?php the_tags('', ', ', ''); ?> </li>
						<?php endif; ?>
					</ul>
				</footer>
			</div>

		</section>
	<?php endwhile; endif ?>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>