<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/
get_header( ); ?>


	<h2><?php post_type_archive_title(); ?></h2>

	<?php
	$args = array(
		"orderby" => "ID",
		"order" => "ASC"
	);
	$terms = get_terms("qstcat", $args);
	?>

<div id="intro">
	<div class="container">
		<div class="twelvecol col last">
				<ul>
					<?php foreach($terms as $term) echo '<li><a href="#faq'.$term->term_id.'"><span class="txt"> '.$term->name.'</span></a></li>'; ?>
				</ul>
				</div>
			</div>
</div>

	<div class="container">
		<div class="twelvecol col last">

			<?php 	foreach($terms as $term): ?>
				<section class="contents" id="faq<?php echo $term->term_id; ?>">
					<h3><?php echo $term->name; ?></h3>
					<dl>
						<?php
						$args = array(
							"post_type" => "faq",
							"qstcat" => $term->slug,
							"order" => ASC,
							"orderby" => date
						);
						$posts = query_posts($args);
						foreach($posts as $post){
							echo '<dt>'.$post->post_title."</dt>";
							echo '<dd>'.$post->post_content."</dd>";
						}?>
					</dl>
				</section>
			<?php endforeach; ?>

		</div>

	</div>

<?php get_footer(); ?>