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

		<div class="twelvecol col last" id="intro">
			<div class="summary">
				<p>
					<span class="block">エコランドは再利用できるモノを</span>
					<span class="block">お引取しています。</span>
				</p>
			<!-- .intro .summary--></div>
			<div class="al_c">
				<p>古いモノでもまだ使用可能であればお引取致します。</p>
				<p>電化製品は壊れていても修理できる可能性がある場合はお引取可能です。</p>
				<p>再利用できないモノは法律上お引取ができません。</p>
				<p>再利用できないモノの処分については自治体にお問い合わせください。</p>
			</div>
		<!-- .intro --></div>

		<div class="sixcol col">
			<h3>エコ回収できないモノ</h3>
			<p>可燃ごみ（紙類でも、ごみと混ざり可燃ごみと判断した物は回収できません。）</p>
			<p>不燃ごみ（乾電池・スプレー缶など）</p>
			<p>飲食物</p>
			<p>液体物（シャンプー・石けんなども含まれます。）</p>
			<p>刃物、木刀</p>
			<p>個人情報を含むモノ（写真・氏名や住所が書かれたモノ。）</p>
			<p>人の肌に触れて使用するモノ（電気シェーバー・化粧品・体に電気を通すものなど）</p>
			<p>大型家具で運び出し前に解体が必要な品物で、復元ができないモノ。</p>
			<p>（IKEA大型家具など）</p>
		</div>
		<div class="sixcol col last">
			<h3>よくご質問があり、お引取ができないモノ</h3>
			<p>安全装置がすべての口に付いていないガステーブル</p>
			<p>ウォーターベッド</p>
			<p>ウォシュレット</p>
			<p>画面の割れたテレビやモニター</p>
			<p>植物</p>
			<p>土</p>
			<p>転売が禁止されているもの（コンサートチケットなど）</p>
			<p class="footnote"><small>※コンロの火が出る真ん中に、お鍋を置くと凹む突起物があるモノは、安全装置が付いています。</small></p>
		</div>
	</div>

<?php get_footer(); ?>

