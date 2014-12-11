<?php
/*
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
						<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" itemprop="url">
							<span itemprop="title"><?php single_term_title("", true); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last">
				<?php if(is_day()){
					printf( __('日別アーカイブ: %s'), get_the_date());
				}elseif(is_month()){
					printf( __('月別アーカイブ: %s'), get_the_date('Y年n月'));
				}elseif(is_year()){
					printf( __('年別アーカイブ: %s'), get_the_date('Y年'));
				}elseif(is_post_type_archive()){
					$post_type = get_post_type_object( get_query_var( 'post_type' ));
					echo $post_type->label;
				}elseif(is_category() || is_tag() || is_tax()){
					single_term_title("", true);
				}else{
					the_title();
				}?>
			</h2>
		</div>
	<!--.headerPage--></header>
	
	<div class="container">
		<div class="twelvecol col last">

		<div class="contents">
			<div class="achiveIndex">
				<div class="sevencol col">トピック</div>
				<div class="threecol col">関連タグ</div>
				<div class="twocol col last">投稿日</div>
			<!--archiveIndex--></div>

			<?php if(have_posts()): ?>
				<ul class="achiveList">
				<?php while(have_posts()): the_post(); ?>
					<li>
						<div class="sevencol col title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></div>
						<div class="threecol col cats">
							<?php
							$tags = wp_get_post_terms($post->ID);
							if($tags){
								$arr = $tags;
								foreach($tags as $tag){
									echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
									if(next($arr)) echo ', ';
								}
							}?>
						</div>
						<div class="twocol col al_c date last"><?php echo get_the_date(); ?></div>
					</li>
				<?php endwhile; ?>
				<!--.achiveList--></ul>
			<?php endif; ?>

			

		</div>

		<?php if(function_exists('wp_pagenavi')): ?>
			<div class="contents al_c">
				<?php wp_pagenavi(); ?>
			<!--.pagenavi .contents--></div>
		<?php endif; ?>

		<!--.col--></div>
	<!-- .container --></div>


<?php get_footer(); ?>