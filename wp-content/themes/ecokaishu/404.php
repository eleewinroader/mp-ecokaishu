<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
*/

get_header(); ?>


	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<div class="twelvecol col last">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title"><?php echo bloginfo("site_name"); ?>TOP</span>
						</a> 
					</div>
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title">お探しのページが見つかりません。</span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last">お探しのページが見つかりません。</h2>
		</div>
	<!--.headerPage--></header>

	<div class="contents">
		<div class="container">
		<div class="twelvecol col last">
			<p class="big pink">404 File not found.</p>
			<p>
				URLに間違いがないかもう一度ご確認ください。 <br />
				もしくはページが一時的にアクセスができない状況にあるか、
				移動もしくは削除された可能性があります。
			</p>
			<ul class="cstmCalendar">
				<li><a href="<?php echo siteInfo('rootUrl'); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li>
				<li><a href="<?php echo siteInfo('siteUrlEcokaishu'); ?>/contact">お問い合わせ</a></li>
			</ul>
		</div>
		</div>
	</div>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php get_footer(); ?>