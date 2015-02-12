<?php
/**
 * The main template file.
* @package Montser Platform
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

	//vars of meta
	$contentsTitles = getMetaArr($post, "contentsInfo01");
	$contents = getMetaArr($post, "contentsInfo02");
	$contentsImgs = getMetaImgArr($post, "contentsInfo03");

	$kijitasuInfo01 = get_post_meta($post->ID, "kijitasuInfo01", TRUE);
	$kijitasuInfo02 = get_post_meta($post->ID, "kijitasuInfo02", TRUE);
	$kijitasuInfo03 = get_post_meta($post->ID, "kijitasuInfo03", TRUE);
	$kijitasuInfo04 = get_post_meta($post->ID, "kijitasuInfo04", TRUE);
	$kijitasuInfo05 = get_post_meta($post->ID, "kijitasuInfo05", TRUE);
	$kijitasuInfo06 = get_post_meta($post->ID, "kijitasuInfo06", TRUE);
	$kijitasuInfo07 = get_post_meta($post->ID, "kijitasuInfo07", TRUE);

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
						<a href="<?php echo $catUrl; ?>" itemprop="url">
							<span itemprop="title"><?php echo $catName; ?></span>
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
			<div class="twelvecol col last">
				<h2><span class="block"><?php echo the_title(); ?></h2>
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

			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php if($kijitasuInfo01): ?>

					<figure class="figure">
						<?php echo get_attached_img($post->ID, "kijitasuInfo03", "", "", "thumbnail", "", ""); ?>
						<figcaption><?php echo $kijitasuInfo01; ?></figcaption>
						<?php the_content(); ?>
						<?php echo $kijitasuInfo02; ?>
						<div class="clear"></div>
						<dl>
							<dt>調査地域</dt><dd><?php echo $kijitasuInfo04; ?></dd>
							<dt>調査対象</dt><dd><?php echo $kijitasuInfo05; ?></dd>
							<dt>調査期間</dt><dd><?php echo $kijitasuInfo06."-".$kijitasuInfo07; ?></dd>
						</dl>
					</figure>
					<div class="clear"></div>

				<?php else: ?>
					<?php the_content(); ?>
				<?php endif; ?>
			<?php endwhile; endif; ?>

			<?php for($i=0; $i<count($contentsTitles); $i++){
				echo '<section class="contents"><h3>'.$contentsTitles[$i].'</h3>';
				print_r($contentsImgs[$i]);
				if($contentsImgs[$i]) echo '<div class="alignright contentsImg">'.$contentsImgs[$i]."</div>";
				echo $contents[$i].'</section>';
			}

			$cltitems = wp_get_post_terms($post->ID, 'cltitems');
			$cltareas = wp_get_post_terms($post->ID, 'cltarea');
			if(!empty($cltitems) && !empty($cltareas)): ?>
				<footer class="listItems contents">
					<h3>関連タグ</h3>
					<ul>
					<?php
					if($cltitems){
						foreach($cltitems as $cltitem){
							echo '<li><a href="'.get_term_link($cltitem).'">'.$cltitem->name.'</a></li>';
						}
					}
					if($cltareas){
						foreach($cltareas as $cltarea){
							echo '<li><a href="'.get_term_link($cltarea).'">'.$cltarea->name.'</a></li>';
						}
					}?>
					</ul>
				</footer>
			<?php endif; ?>

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

