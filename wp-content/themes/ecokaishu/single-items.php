<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

get_header(); ?>

	<?php
	//vars
	$terms = get_the_terms($post->ID, 'cltitems');
	foreach($terms as $term){
		if($term->parent == 0){
			$parentItemTag = $term->slug;
			$parentItemName = $term->name;
			$parentItemId = $term->term_id;
		}
	}
	$postType = get_post_type_object(get_post_type());
	$postTypes = get_post_types(array("_builtin" => FALSE));

	?>

	<div class="container">

		<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<div class="ninecol col">
				<div class="contents">

				<header>
					<div class="cat">
						<a href="<?php echo getPostType($post, "link"); ?>"><?php echo getPostType($post, "label"); ?></a>
						<?php the_title(); ?>
					</div>
					<h2><span class="title block"><?php the_title(); ?>のエコ回収実績</span></h2>
				</header>

				<?php the_content(); ?>
					

				</div>
			</div>

		<?php endwhile; endif; ?>

		<aside class="threecol col last sidebar">

			<?php

			//recent articles in the same area
			$args = array(
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"term" => $parentItemTag
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="postsList"><h3>物品別エコ回収実績</h3><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
			}

			//area articles
			$areas = get_terms('cltarea');
			if($areas){
				echo '<div class="postsList"><h3>地域別エコ回収実績</h3><ul class="">';
				foreach($areas as $area){
					if($area->parent == 0){
						$parentAreaTag = $area->slug;
						$parentAreaName = $area->name;
						$parentAreaId = $area->term_id;
						echo '<li><a href="'.get_term_link($area).'">'.$parentAreaName.'</a></li>';
					}
				}
				echo '</ul></div>';
			}?>

		</aside>

	</div>

<?php get_footer(); ?>'
