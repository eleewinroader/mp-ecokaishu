<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
*/
get_header( ); ?>

	<h2><?php post_type_archive_title(); ?></h2>

	<div class="container intro">
		<div class="twelvecol col last">

			<div class="summary">
				<?php echo getPage("イントロ", "contents"); ?>
			<!-- .intro .summary--></div>

		</div>
	</div>

	<section class="contents" id="trigger">
		<span class="icon-dot" id="top"></span>
		<div class="container">
			<div class="twelvecol col last">
				<h3>使わなくなったモノが出た</h3>
			</div>
		<!--.contents#trigger .container--></div>
	<!--.contents#trigger --></section>

	<section class="contents" id="actions">
		<span class="icon-dot" id="top"></span>
		<div class="container">
			<h3>エコランドに相談してください！</h3>
			<div class="sixcol col">
				<h4><?php echo getPage("どうすればいいかわからない", "title"); ?></h4>
				<div class="content">
					<?php echo getPage("どうすればいいかわからない", "contents"); ?>
				</div>
			</div>
			<div class="sixcol col last">
				<h4><?php echo getPage("見積もってほしい", "title"); ?></h4>
				<div class="content">
					<?php echo getPage("見積もってほしい", "contents"); ?>					
				</div>
			</div>
			<div class="openingHour">平･土 9時-22時 祝･日 9時-20時 </div>
		<!--.contents#actions .container--></div>
	<!--.contents#actions--></section>

	<section class="contents" id="ecokaishuFlow">
		<div class="container">
			<h3><?php echo getPage("エコ回収サービスの流れ", "title"); ?></h3>

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4><?php echo getPage("お伺い日程と時間を決めます。", "title"); ?></h4>
				<div class="content">
					<?php echo getPage("お伺い日程と時間を決めます。", "contents"); ?>
				</div>
			<!--.contents#ecokaishu .col--></section>

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4><?php echo getPage("ご自宅にお伺いし、お引取りします。", "title"); ?></h4>
				<div class="content">
					<?php echo getPage("ご自宅にお伺いし、お引取りします。", "contents"); ?>
					<h5><?php echo getPage("エコオクに出品します。", "title"); ?></h5>
					<?php echo getPage("エコオクに出品します。", "contents"); ?></p>
					<h5><?php echo getPage("お支払い。", "title"); ?></h5>
					<?php echo getPage("お支払い。", "contents"); ?>
				</div>
			<!--.contents#ecokaishu .col--></section>
			

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4><?php echo getPage("エコオク落札キャッシュバックがあります。", "title"); ?></h4>
				<div class="content">
					<?php echo getPage("エコオク落札キャッシュバックがあります。", "contents"); ?>
				</div>
			<!--.contents#ecokaishu .col--></section>
			
		<!--.contents#ecokaishu .container--></div>
	<!--.contents#ecokaishu--></section>

<?php get_footer(); ?>