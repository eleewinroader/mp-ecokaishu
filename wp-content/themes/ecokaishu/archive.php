<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
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
	
	<div class="container">

	<div class="contents">

		<div class="achiveIndex">
			<div class="twocol col">日付</div>
			<div class="sevencol col">トピック</div>
			<div class="threecol col last">カテゴリ</div>
		</div>

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
						<div class="twocol col al_c date"><?php echo get_the_date(); ?></div>
						<div class="sevencol col title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></div>
						<div class="threecol col last cats">
							<?php
							$tags = wp_get_post_terms($post->ID, 'post_tag');
							if($tags){
								$arr = $tags;
								foreach($tags as $tag){
									echo ''.$tag->name;
									if(next($arr)) echo ', ';
								}
							}?>
						</div>
						
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif ?>

		</div>

		<div class="twelvecol col last contents al_c">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>

	</div>

<?php get_footer(); ?>