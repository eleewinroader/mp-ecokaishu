<?php
/**
 * The main template file.
* @package Montser Platform
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
						<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" itemprop="url">
							<span itemprop="title"><?php post_type_archive_title(); ?></span>
						</a>
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php post_type_archive_title(); ?></h2>
		</div>
	<!--.headerPage--></header>

	<div class="container">

		<div class="intro">
			<div class="summary">
				<p><span class="block">エコランドは</span><span class="block">買取も同時にできます。</span></p>
			<!-- .intro .summary--></div>
			<ul class="listPoints">
				<li>お電話で買取の目安金額がご案内できます。</li>
				<li>製造年(使用年数)、メーカー名(ブランド名)、型番がわかると、より正確に案内できます。</li>
				<li>最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</li>
				<li>お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</li>
			</ul>
		<!-- .intro --></div>

		<div class="purchaseDetails">
			<section class="threecol col contentsPurchase">
				<h3 class="catTitle">家電</h3>
				<dl>
					<dt>対象品例</dt>
					<dd>ＴＶ、冷蔵庫、洗濯機、電子レンジ、掃除機、炊飯器、ガステーブル、ブルーレイ/DVDレコーダー、ミニコンポなど</dd>
					<dt>査定ポイント</dt>
					<dd>製造年(5年以内が買取対象)、付属品の有無、商品の状態(キズ・汚れなど)、動作状況</dd>
				</dl>
			<!--contentsPurchase--></section>
			<section class="threecol col contentsPurchase">
				<h3 class="catTitle">家具</h3>
				<dl>
					<dt>対象品例</dt>
					<dd>ブランド家具</dd>
					<dt>査定ポイント</dt>
					<dd>ブランド、使用年数(5年以内が買取対象、ソファは2年以内)、サイズ(幅・奥行・高さの和が450㎝以上は対象外)</dd>
				</dl>
			<!--contentsPurchase--></section>
			<section class="threecol col contentsPurchase">
				<h3 class="catTitle">楽器</h3>
				<dl>
					<dt>対象品例</dt>
					<dd>エレクトーン、電子ピアノ、ギター、キーボード、ベースなど</dd>
					<dt>査定ポイント</dt>
					<dd>メーカー名、製造年、型番</dd>
				</dl>
			<!--contentsPurchase--></section>
			<section class="threecol col contentsPurchase last">
				<h3 class="catTitle">パソコン</h3>
				<dl>
					<dt>対象品例</dt>
					<dd>デスクトップ本体、液晶モニタ、ノートパソコン</dd>
					<dt>査定ポイント</dt>
					<dd>初期化できるもの、OS、型番</dd>
				</dl>
			<!--contentsPurchase--></section>
			<div class="twelvecol col last">
				<p class="footnote"><small>※お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</small></p>
			</div>
		<!-- #lpPurchase --></div>

	</div>

<?php get_footer(); ?>

