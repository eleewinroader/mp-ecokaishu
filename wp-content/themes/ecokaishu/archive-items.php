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
	$terms = get_terms('cltitems', array("orderby"=> ID));
	$postType = get_post_type_object(get_post_type());
	?>

	<div class="container">

		<h2><?php post_type_archive_title(); ?></h2>

		<div class="twelvecol col postsList last">
			<h3><?php print_r($parentAreaName); ?></h3>
			<ul>
				<?php
				$args = array(
					"post_type" => "items",
					"posts_per_page" => -1
				);
				$posts = query_posts($args);
				if($posts){
					foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';				
				}?>
			</ul>
		</div>

	</div>
	

<?php get_footer(); ?>