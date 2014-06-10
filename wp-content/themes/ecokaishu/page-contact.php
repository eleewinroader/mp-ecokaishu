<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/


include (TEMPLATEPATH . '/contact-post.php');
include (TEMPLATEPATH . '/header-form.php');

?>

	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">					
				<li><?php the_title(); ?></li>
			</ul>
		</nav>
		<h2><?php the_title(); ?></h2>
	</header>

	<div class="fullwidthForm" id="contact">

		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('contact/confirm', OBJECT));
		$submits = "お問い合わせ内容を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="contact" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/contact-form.php');
		echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		?>

	</div>

</article>
</div>


<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>


</body>
</html>