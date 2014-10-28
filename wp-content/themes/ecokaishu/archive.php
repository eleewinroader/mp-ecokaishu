<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/

get_header(); ?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php single_cat_title( '', true ); ?></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last">
				<?php if (is_day()){
					printf( __('日別アーカイブ: %s'),　get_the_date());
				}elseif(is_month()){
					printf( __('月別アーカイブ: %s'), get_the_date('Y年n月'));
				}elseif(is_year()){
					printf( __('年別アーカイブ: %s'), get_the_date('Y年'));
				}elseif(is_post_type_archive()){
					$post_type = get_post_type_object( get_query_var( 'post_type' ));
					echo $post_type->label;
				}elseif(is_category() || is_tag()){
					single_term_title('', true);
				}else{
					the_title();
				}?>
			</h2>
		</div>
	<!--.headerPage--></header>
	
	<div class="container">

		<div class="contents">
			<div class="achiveIndex">
				<div class="sevencol col">トピック</div>
				<div class="threecol col">関連タグ</div>
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
							<div class="threecol col cats">
								<?php
								$tags = wp_get_post_terms($post->ID, 'post_tag');
								if($tags){
									$arr = $tags;
									foreach($tags as $tag){
										echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
										if(next($arr)) echo ', ';
									}
								}?>
							</div>
							<div class="twocol col al_c date last"><?php echo get_the_modified_date(); ?></div>
						</li>
					<?php endwhile; ?>
				<!--.achiveList--></ul>
			<?php endif ?>
		</div>

		<div class="twelvecol col last al_c">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		<!--.pageNavi--></div>

	<!--.container--></div>

<?php get_footer(); ?>