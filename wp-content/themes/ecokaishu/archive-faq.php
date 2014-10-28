<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/
get_header( ); ?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php post_type_archive_title(); ?></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php post_type_archive_title(); ?></h2>
		</div>
	<!--.headerPage--></header>

	<?php

	$terms = array(
		"エコ回収品について",
		"エコ回収できるモノ/できないモノ",
		"エコ回収作業について",
		"買取について",
		"お申し込みについて",
		"料金について"
	);?>

	<div class="container docs">
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
						$term = get_term_by("name", $terms[$i], "qstcat");
						$args = array(
							"post_type" => "faq",
							"qstcat" => $term->slug,
							"order" => ASC,
							"orderby" => date,
							"posts_per_page" => -1
						);
						$posts = query_posts($args);
						foreach($posts as $post){
							echo '<dt id="qst'.$post->ID.'">'.$post->post_title."</dt>";
							echo '<dd>'.$post->post_content."</dd>";
						}?>
					</dl>
				<!--#faq<?php echo $term->term_id; ?>--></section>
			<?php endfor; ?>

		<!--#faq .twelvecol --></div>
	<!--#faq .container --></div>

<?php get_footer(); ?>