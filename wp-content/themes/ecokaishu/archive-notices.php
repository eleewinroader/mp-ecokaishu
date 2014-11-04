<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/

get_header();
$post_type = get_post_type_object( get_query_var( 'post_type' ));
?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php echo $post_type->label; ?></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php echo $post_type->label; ?></h2>
		</div>
	<!--.headerPage--></header>
	
	<div class="container">
		<div class="twelvecol col last">

		<div class="contents">
			<div class="achiveIndex">
				<div class="sevencol col">トピック</div>
				<div class="twocol col last">投稿日</div>
			<!--archiveIndex--></div>

			<?php
			global $wp_query;
			query_posts(array_merge(
					array(
					'post_type' => array('post'),
					'orderby' => $orderby,
					'order' => $order,
				),
		   		$wp_query->query
			));
			if(have_posts()): ?>
				<ul class="achiveList">
					<?php while(have_posts()): the_post(); ?>
						<li>
							<div class="sevencol col title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></div>
							<div class="twocol col al_c date last"><?php echo get_the_date(); ?></div>
						</li>
					<?php endwhile; ?>
				<!--.achiveList--></ul>
			<?php endif ?>
		</div>

		<?php if(function_exists('wp_pagenavi')): ?>
			<div class="contents al_c">
				<?php wp_pagenavi(); ?>
			<!--.pagenavi .contents--></div>
		<?php endif; ?>

		<!--.col--></div>
	<!-- .container --></div>


<?php get_footer(); ?>