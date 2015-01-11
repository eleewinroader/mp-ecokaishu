<?php
/*
* @package Montser Platform
*/

get_header();
$post_type = get_post_type_object( get_query_var( 'post_type' ));
?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<div class="twelvecol col last">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title"><?php echo bloginfo("site_name"); ?>TOP</span>
						</a> 
					</div>
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" itemprop="url">
							<span itemprop="title"><?php post_type_archive_title(); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php echo $post_type->label; ?></h2>
		</div>
	<!--.headerPage--></header>
	
	<div class="container">
		<div class="twelvecol col last">

		<div class="contents">
			<div class="archiveIndex">
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
				<ul class="archiveList">
					<?php while(have_posts()): the_post(); ?>
						<li>
							<div class="sevencol col title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></div>
							<div class="twocol col al_c date last"><?php echo get_the_date(); ?></div>
						</li>
					<?php endwhile; ?>
				<!--.archiveList--></ul>
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