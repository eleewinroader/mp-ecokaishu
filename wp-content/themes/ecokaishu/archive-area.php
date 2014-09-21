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
	$terms = array("東京都", "神奈川県", "埼玉県", "千葉県", "大阪府", "兵庫県"); //get_terms('cltarea', array("orderby"=> ID));
	$postType = get_post_type_object(get_post_type());
	?>

	<div class="container">

		<h2><?php post_type_archive_title(); ?></h2>

		<div style="width: 100%; height: 500px; background: white;"></div>

		<?php
		foreach($terms as $term){?>
				<div class="twocol col listArea">
					<h3><?php  echo $term; ?></h3>
					<ul>
					<?php
					$args = array(
						"orderby" => "DATE",
						"order" => ASC,
						"post_type" => $postType->name,
						"posts_per_page" => -1,
						"cltarea" => $term
					);
					$posts = query_posts($args);
					if($posts) foreach($posts as $post){
						if($post->post_title != $term) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
					}?>
					</ul>

				</div>
				<?php
		}?>

		<div class="clear"></div>

	</div>


	

<?php get_footer(); ?>