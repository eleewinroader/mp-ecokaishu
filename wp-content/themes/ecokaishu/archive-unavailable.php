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

		<div class="twelvecol col last">
			<div class="summary">
				<p>
					<span class="block">エコランドは再利用できるモノを</span>
					<span class="block">お引取しています。</span>
				</p>
			<!-- .intro .summary--></div>
			<ul class="listSummary">
				<li>再利用できないモノは法律上お引取ができません。</li>
				<li>古いモノでもまだ使用可能であればお引取致します。</li>
				<li>電化製品は壊れていても修理できる可能性がある場合はお引取可能です。</li>
				<li>再利用できないモノの処分については自治体にお問い合わせください。</li>
			</ul>
		<!-- .intro --></div>

		<div class="sixcol col">
			<div class="txtSummary bor">
				<h3>エコ回収できないモノ</h3>
				<dl class="listDefi">
					<dt>可燃ごみ</dt>
					<dd>紙類でも、ごみと混ざり可燃ごみと判断した物は回収できません。</dd>
					<dt>不燃ごみ</dt>
					<dd>乾電池・スプレー缶など</dd>
					<dt>飲食物</dt>
					<dt>液体物</dt>
					<dd>シャンプー・石けんなど</dd>
					<dt>刃物、木刀</dt>
					<dt>個人情報を含むモノ</dt>
					<dd>写真・氏名や住所が書かれたモノ</dd>
					<dt>人の肌に触れて使用するモノ</dt>
					<dd>電気シェーバー・化粧品・体に電気を通すものなど</dd>
					<dt>大型家具で運び出し前に解体が必要な品物で、復元ができないモノ</dt>
					<dd>IKEA大型家具など</dd>
				</dl>
			</div>
		</div>
		<div class="sixcol col last">
			<div class="txtSummary">
				<h3>よくご質問があり、お引取ができないモノ</h3>
				<ul class="listDefi">
					<li>安全装置がすべての口に付いていないガステーブル</li>
					<li>ウォーターベッド</li>
					<li>ウォシュレット</li>
					<li>画面の割れたテレビやモニター</li>
					<li>植物</li>
					<li>土</li>
					<li>転売が禁止されているもの（コンサートチケットなど）</li>
				</ul>
				<p class="footnote"><small>※コンロの火が出る真ん中に、お鍋を置くと凹む突起物があるモノは、安全装置が付いています。</small></p>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

