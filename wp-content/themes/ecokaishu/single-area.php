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
	$cltareas = get_the_terms($post->ID, 'cltarea');
	foreach($cltareas as $cltarea){
		if($cltarea->parent == 0){
			$parentAreaTag = $cltarea->slug;
			$parentAreaName = $cltarea->name;
			$parentAreaId = $cltarea->term_id;
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
				"cltarea" => $parentAreaTag
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="postsList"><h3>'.$parentAreaName.'内のエコ回収実績</h3><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
			}

			//item articles
			$args = array(
				"post_type" => "items",
				"posts_per_page" => -1
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="postsList"><h3>アイテム別エコ回収実績</h3><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
			}?>

		</aside>

	</div>

<?php get_footer(); ?>
