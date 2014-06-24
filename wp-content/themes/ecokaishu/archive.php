<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/

get_header(); ?>

	<header>
		<nav id="sitepath"><?php if(function_exists( 'bread_crumb' ) ) bread_crumb(array('home_label' => 'エコランドNEWS')); ?></nav>
		<h2>
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
	</header>
	
	<?php
	global $wp_query;
	if(get_post_type() == 'media'){
		$meta_key = 'mediaInfo02';
		$orderby = 'meta_value';
		$order = 'DESC';
	}
	query_posts(array_merge(
			array(
			'post_type' => array('post', 'ecoauc-fund-report', 'media', 'pressrelease', 'events'),
			'meta_key' => $meta_key,
			'orderby' => $orderby,
			'order' => $order
		),
   		$wp_query->query
	));
	if(have_posts()): ?>
	<ul class="postsArchive content">
	<?php while(have_posts()): the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>" class="postsArchiveLink">
				<?php if(view_first_image_src()): ?>
					<div class="postsArchiveImg">
						<img src="<?php echo view_first_image_src(); ?>" />
					</div>
				<?php endif; ?>
				<div class="postsArchiveDetails">
					<h3><?php the_title(); ?></h3>
					<p>
						<?php
						echo mb_substr(strip_tags($post->post_content), 0, 100);
						if($post->post_content) echo '...';
						?>
						<span class="more-link">続きを読む</span>
					</p>
					<ul class="postDetails">
						<?php
						if(get_post_type() == 'media'){
							echo '<li><span class="icon-bullhorn" aria-hidden="true"></span>'.get_post_meta($post->ID, 'mediaInfo02', 'single').'掲載</li>';
						}elseif(get_post_type() == 'events'){
echo '<li><span class="icon-bullhorn" aria-hidden="true"></span>開催日 : '.get_post_meta($post->ID, 'eventInfo03', 'single').'</li>';
echo '<li><span class="icon-location" aria-hidden="true"></span>開催場所 : '.get_post_meta($post->ID, 'eventInfo01', 'single').'</li>';
						}
						$tags = wp_get_post_terms($post->ID, 'post_tag');
						if($tags){
							echo '<li><span class="icon-tags" aria-hidden="true"></span>';
							$arr = $tags;
							foreach($tags as $tag){
								echo ''.$tag->name;
								if(next($arr)) echo ', ';
							}
							echo '</li>';
						}?>						
						</ul>
				</div>
			</a>
		</li>

	<?php endwhile; ?>
</ul>
<?php endif ?>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>