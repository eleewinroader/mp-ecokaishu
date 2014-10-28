<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
 */

get_header();

	//vars of cat
	$cats = get_the_category($post->ID);
	if($cats){
		$catId = $cats[0]->term_id;
		$catName = $cats[0]->name;
		$catSlug = $cats[0]->slug;
		$catUrl = get_category_link($cats[0]->term_id);
	}

	//navPage
	$navPage = '<li><a href="'.$catUrl.'">'.$catName.'</a></li><li>'.$post->post_title.'</li>';

	$contentsTitles = getMetaArr($post, "contentsInfo01");
	$contents = getMetaArr($post, "contentsInfo02"); 
	$contentsImgs = getMetaImgArr($post, "contentsInfo03");
	
	?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><?php echo $navPage; ?>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php echo the_title(); ?></h2>
		</div>
	<!--.headerPage--></header>

	<div class="container">

		<div class="ninecol col">

			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>

			<?php for($i=0; $i<count($contentsTitles); $i++){
				echo "<h3>".$contentsTitles[$i]."</h3>";
				echo '<div class="alignright contentsImg">'.$contentsImgs[$i]."</div>";
				echo $contents[$i];
			}?>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">

			<?php
			//recent pages in the same cat
			if($catSlug != "docs"){
				$args = array(
					"order_by" => "date",
					"order" => ASC,
					"cat" => $catId
				);
				$posts = query_posts($args);
				if($posts){
					echo '<section class="listPosts contents">
					<h2>最近の記事</h2><ul>';
					foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
					echo '</ul>
					<!--最近の記事一覧--></section>';
					wp_reset_query();
				}
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
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind contents">
					<ul>
					<?php foreach($convSales  as $convSale): ?>
						<li class="item">
							<a href="<?php echo $convSale->link; ?>" class="itemContents">
								<span class="icon-bullhorn"></span>
								<p class="info">
									<span class="block"><?php echo $convSale->month."月".$convSale->day."日"; ?></span><span class="block"><?php echo $convSale->area; ?></span>
								</p>
								<p class="off">割引CHECK</p>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				<!--.contents--></div>
			<?php endif;

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
				<!--人気アイテム一覧--></section>';
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
				<!--人気エリア一覧--></section>';
				wp_reset_query();
			}?>
			

		<!--.sidebar--></aside>

	<!--.container--></div>

<?php get_footer(); ?>'

