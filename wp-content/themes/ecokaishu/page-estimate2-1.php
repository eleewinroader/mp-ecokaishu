<?php
/*
*
* Template name: かんたん見積フォーム
*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
*/


include(TEMPLATEPATH.'/estimate2-1-post.php');
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

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; endif; ?>

	<div class="fullwidthForm" id="estimate">

		<div class="contents">
		<div class="content" id="estmtIntro">
		<img src="<?php echo siteInfo("rootUrl"); ?>/img/kaishu/estmt/intro_camp2<?php if(is_smartphone()) echo "_s"; ?>.gif" alt="" /></div></div>

		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('estimate2-1/confirm', OBJECT));
		$submits = "サービス申込を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="estimate" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/estimate2-1-form.php');
		echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		?>

	</div>

</article>
</div>
	

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>

<script language="Javascript" type="text/javascript">
<!--
/* <![CDATA[ */
var account_id="1OsEOoQOLDXC8XxH8jBf"; 
var transaction_id = "";
var amount = "";
if (location.protocol == "https:") { var protocol = "https:"} else { var protocol = "http:" }
document.write("<img width=1 height=1 border=0 src='" + protocol + "//b90.yahoo.co.jp/c?account_id=" + account_id + "&transaction_id=" + transaction_id + "&amount=" + amount + "'>");
/* ]]> */
//-->
</script>
<!-- Google Code for &#22823;&#22411;&#23478;&#20855;&#28961;&#26009;&#24341;&#21462; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 974830453;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "w-lcCKuViQoQ9fbq0AM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974830453/?label=w-lcCKuViQoQ9fbq0AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script src="//easy-entry.jp/ffconf/ffconf_5000_0140_0232.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2.js" charset="utf-8" type="text/javascript"></script>

</body>
</html>
