<?php
/**
 * The main template file.
* @package Montser Platform
 */
get_header(); ?>

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
						<a href="<?php echo get_permalink($post->ID) ?>" itemprop="url">
							<span itemprop="title"><?php the_title(); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="sixcol col">
				<h2><span class="block"><?php echo the_title(); ?></h2>
			</div>
			<div class="sixcol col last al_r listSns">
				<ul>
					<li id="shareFacebook"><a href=""><span class="label">facebook</span></a></li>
					<li id="shareTwitter"><a href=""><span class="label">twitter</span></a></li>
					<li id="shareGoogle"><a href=""><span class="label">Google+</span></a></li>
				</ul>
			</div>
		</div>
	<!--.headerPage--></header>

	<div class="container">


	<div class="twelvecol col last">
		<div class="liquidLayout">

	<?php
	$kinds = array("年末の大掃除", "引越し");
	$cats = array();
	$terms = get_terms( 'category', 'orderby=count&hide_empty=0');
	foreach($terms as $term){
		if(in_array($term->name, $kinds)) array_push($cats, $term->term_id);
	}
	$args = array(
		"order" => DESC,
		"orderby" => DATE,
		"category__in" => $cats,
		"post_type" => "post"
	);
	$articles = query_posts($args);
	foreach($articles as $article): ?>

		<section class="item">
			
			<div class="itemContents">
				<a href="<?php echo get_permalink($article->ID);?>">
					<h3><?php echo $article->post_title; ?></h3>
					<?php echo get_attached_img($article->ID, "kijitasuInfo03", "", "", "medium", "", ""); ?>
					<?php echo mb_substr(strip_tags($article->post_content), 0, 30); ?>...<span id="more">more</span>
				</a>
				<footer class="listItems">
					<ul>
						<?php
						$cats = get_the_terms($article->ID, "category");
						foreach($cats as $cat){
							$catLink = get_category_link($cat->term_id);
							$catName = $cat->name;
							echo '<li><a href="'.$catLink.'"">'.$catName.'</a></li>';
						}
						$cltitems = wp_get_post_terms($article->ID, 'cltitems');
						$cltareas = wp_get_post_terms($article->ID, 'cltarea');
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
			</div>
		</section>

	<?php endforeach; ?>
	
		</div>
	</div>

<?php get_footer(); ?>'

