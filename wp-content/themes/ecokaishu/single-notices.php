<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
 */

get_header();

	//vars of post type
	$postType = get_post_type_object(get_post_type());
	$postTypeName = $postType->name;
	$postTypeLabel = $postType->label;
	$postTypeUrl = get_post_type_archive_link($postTypeName);

	//navPage
	$navPage = '<li><a href="'.$postTypeUrl.'">'.$postTypeLabel.'</a></li><li>'.$post->post_title.'</li>';
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
						<a href="<?php echo get_post_type_archive_link($postType->name); ?>" itemprop="url">
							<span itemprop="title"><?php echo $postType->label; ?></span>
						</a> 
					</div>
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo get_permalink($post->ID) ?>" itemprop="url">
							<span itemprop="title"><?php the_title(); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="ninecol col">
				<h2><?php echo the_title(); ?></h2>
			</div>
			<div class="threecol col last">
				<div class="listSns">
					<ul>
						<li id="shareFacebook"><a href=""><span class="label">facebook</span></a></li>
						<li id="shareTwitter"><a href=""><span class="label">twitter</span></a></li>
						<li id="shareGoogle"><a href=""><span class="label">Google+</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	<!--.headerPage--></header>

	<div class="container">

		<div class="ninecol col">

			<div class="contents">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>

			<?php
			$tags = wp_get_post_terms($post->ID, 'post_tag');
			if($tags){
				echo '<div class="contents">';
				$arr = $tags;
				foreach($tags as $tag){
					echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
					if(next($arr)) echo ', ';
				}
				echo '</div>';
			}?>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">

			<?php
			//recent pages in the same cat
			$args = array(
				"order_by" => "date",
				"order" => DESC,
				"post_type" => "notices",
				"posts_per_page" => 5
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listPosts contents">
				<h2>最近のお知らせ</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>
			
			<div class="bnrBtn contents" id="area">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-search"></span>
					<span class="icon-map3"></span>
					<p><span class="block">対応エリアの</span><span class="block">確認はこちら</span></p>
				</a>
			<!--.contents--></div>

			<div class="bnrBtn contents">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			<!--.contents--></div>

			<?php

			//popular item cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => "items",
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気アイテム一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular area
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => "area",
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気エリア一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>
			

		<!--.sidebar--></aside>

	<!--.container--></div>

<?php get_footer(); ?>'

