<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
*/


include (TEMPLATEPATH . '/contact-post.php');
include (TEMPLATEPATH . '/header-legacy.php');

?>

	<div class="fullwidthForm" id="contact">

		<h2><?php the_title(); ?></h2>

		<?php
		$actions = get_permalink(get_page_by_path('contact-legacy/confirm', OBJECT));
		$submits = "お問い合わせ内容を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="contactForm" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/contact-form.php');
		echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		?>

	</div>

</article>
</div>

<?php include (TEMPLATEPATH . '/footer-legacy.php'); ?>