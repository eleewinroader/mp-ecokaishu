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
	$terms = get_terms('cltarea', array("orderby"=> ID));
	$postType = get_post_type_object(get_post_type());
	?>

	<div class="container">

		<h2><?php post_type_archive_title(); ?></h2>

		<?php
		foreach($terms as $term){
			if($term->parent == 0){
				$parentAreaTag = $term->slug;
				$parentAreaName = $term->name;
				$parentAreaId = $term->term_id; ?>
				<div class="twocol col postsList">
					<h3><?php print_r($parentAreaName); ?></h3>
					<ul>
					<?php
					$args = array(
						"post_type" => $postType->name,
						"posts_per_page" => -1,
						"cltarea" => $parentAreaTag
					);
					$posts = query_posts($args);
					if($posts) foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
					?>
					</ul>

				</div>
				<?php
			}
		}?>

		<div class="clear"></div>

	</div>


	

<?php get_footer(); ?>