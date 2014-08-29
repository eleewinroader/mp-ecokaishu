<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/
get_header( ); ?>

	<h2><?php post_type_archive_title(); ?></h2>

	<div class="container intro">
		<div class="twelvecol last">

			<div class="summary">
				<?php echo getPage("イントロ", "contents"); ?>
			<!-- .intro .summary--></div>

			<div id="ex">
				<h3><?php echo getPage("料金系計算の例", "title"); ?></h3>
				<?php echo getPage("料金系計算の例", "contents"); ?>
			<!-- .intro #ex--></div>

		</div>
	<!-- .intro--></div>	

	<section class="contents">
		<div class="container">
			<div class="twelvecol col last">
				<h3><?php echo getPage("基本料金は3,240円です。", "title"); ?></h3>
				<?php echo getPage("基本料金は3,240円です。", "contents"); ?>
			</div>
		</div>
	</section>

	<section class="contents" id="itemPrice">
		<div class="container">

			<div class="twelvecol col last">
				<h3><?php echo getPage("エコ回収してほしいのはどんなモノですか？", "title"); ?></h3>
				<?php echo getPage("エコ回収してほしいのはどんなモノですか？", "contents"); ?>
			</div>

			<section id="electricApp">
				<div class="twelvecol col last"><h4><?php echo getPage("各家電のサイズ別料金", "title"); ?></h4></div>
				<?php echo getPage("各家電のサイズ別料", "contents"); ?>
			<!--#itemPrice #electricApp--></section>

			<section id="itemRank">
				<div class="twelvecol col last">
					<h4><?php echo getPage("各物品のランク別料金", "title"); ?></h4>
					<?php echo getPage("各物品のランク別料金", "contents"); ?>
				</div>
			<!--#itemPrice #itemRank--></section>

			<section id="guide">
				<div class="twelvecol col last"><h4><?php echo getPage("一部お引取ができないモノがあります。", "title"); ?></h4></div>
				<?php echo getPage("一部お引取ができないモノがあります。", "contents"); ?>
			<!--#itemPrice #guide--></section>

		<!--#itemPrice .container--></div>
	<!--#itemPrice--></section>

	<section class="contents" id="purchase">
		<div class="container">
			<div class="twelvecol col last">
				<h3><?php echo getPage("買取希望でしょうか？", "title"); ?></h3>
				<?php echo getPage("買取希望でしょうか？", "contents"); ?>
				<h4><?php echo getPage("買取が難しいモノがあります。", "title"); ?></h4>
				<?php echo getPage("買取が難しいモノがあります。", "contents"); ?>
			</div>
		<!--#purchase .container--></div>
	<!--#purchase--></section>

	<section class="contents">
		<div class="container">
			<div class="twelvecol col last"><h3><?php echo getPage("お申込みの前に確認してください！", "title"); ?></h3></div>
			<div class="fourcol col">
				<h4><?php echo getPage("お住まいの地域はエリア内ですか？", "title"); ?></h4>
				<?php echo getPage("お住まいの地域はエリア内ですか？", "contents"); ?>
			</div>
			<div class="fourcol col">
				<h4><?php echo getPage("何階から運び出しますか？", "title"); ?></h4>
				<?php echo getPage("何階から運び出しますか？", "contents"); ?>
			</div>
			<div class="fourcol col last">
				<h4><?php echo getPage("大型の場合は解体などの作業が必要です。", "title"); ?></h4>
				<?php echo getPage("大型の場合は解体などの作業が必要です。", "contents"); ?>
			</div>
			<div class="fourcol col">
				<h4><?php echo getPage("時間指定をご希望ですか？", "title"); ?></h4>
				<?php echo getPage("時間指定をご希望ですか？", "contents"); ?>
			</div>
			<div class="fourcol col">
				<h4><?php echo getPage("養生作業が必要ですか？", "title"); ?></h4>
				<?php echo getPage("養生作業が必要ですか？", "contents"); ?>
			</div>
			<div class="fourcol col last">
				<h4><?php echo getPage("レディースサービスやPCデータ消去サービスはご存知ですか？", "title"); ?></h4>
				<?php echo getPage("レディースサービスやPCデータ消去サービスはご存知ですか？", "contents"); ?>
			</div>
		<!--#check .container--></div>
	<!--#check--></section>


<?php get_footer(); ?>