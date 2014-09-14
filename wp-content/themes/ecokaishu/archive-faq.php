<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
*/
get_header( ); ?>


	<h2><?php post_type_archive_title(); ?></h2>
	<?php
	$terms = array(
		"エコ回収品について",
		"エコ回収できるモノ/できないモノ",
		"エコ回収作業について",
		"お申し込みについて",
		"料金について"
	);?>

	<div class="container">
		<div class="twelvecol col last">

			<div class="intro">
				<ul>
					<?php
					for($i=0; $i<count($terms); $i++){
						echo '<li><a href="#faq'.$i.'"><span class="txt"> '.$terms[$i].'</span></a></li>';
					}?>
				</ul>
			<!-- #faq .intro--></div>

			<?php 	for($i=0; $i<count($terms); $i++): ?>
				<section class="contents" id="faq<?php echo $i; ?>">
					<h3><?php echo $terms[$i]; ?></h3>
					<dl class="listFaq">
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
				<!--#faq<?php echo $term->term_id; ?>--></section>
			<?php endfor; ?>

		<!--#faq .twelvecol --></div>
	<!--#faq .container --></div>

<?php get_footer(); ?>