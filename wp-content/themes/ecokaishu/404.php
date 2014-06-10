<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

get_header(); ?>

	<h2>お探しのページは存在しません。</h2>

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
				<li><a href="<?php echo siteInfo('rootUrl'); ?>">エコ回収・買取TOPへ</a></li>
				<li><a href="<?php echo siteInfo('siteUrlEcokaishu'); ?>/contact">お問い合わせ</a></li>
			</ul>
		</div>
		</div>
	</div>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php get_footer(); ?>