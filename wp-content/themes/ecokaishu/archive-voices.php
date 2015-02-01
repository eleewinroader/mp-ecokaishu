<?php
/*
* @package Montser Platform
*/
get_header( );





?>

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

		<div id="intro">
			<p><span class="block">エコランドではエコ回収を実際にご利用頂いたお客様に</span>
			<span class="block">エコ回収サービスやスタッフの満足度評価をお願いしています。</span>
			<span class="block">エコ回収の利用をご検討中の方はぜひお客様の生の声をご確認ください。</span></p>
		</div>

		<div class="contents" id="voicesList">
			<div class="archiveIndex">
				<div class="onecol col">投稿日</div>
				<div class="twocol col">性別/年代</div>
				<div class="twocol col al_l">回収エリア</div>
				<div class="fourcol col al_l">回収アイテム</div>
				<div class="threecol col last">評価</div>
			</div>
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				"post_type" => "voices",
				"voicekinds" => "review",
				"paged" => $paged
			);
			$postsa = new WP_Query($args);
			if($postsa): ?>
				<ul class="archiveList">
					<?php while($postsa->have_posts()): $postsa->the_post(); ?>
						<li class="al_c">
							<a href="<?php echo get_permalink($post->ID); ?>">
								<div class="onecol col">
									<time datetime="<?php echo get_the_date(); ?>">
									<?php echo get_the_date("m/d"); ?>
									</time>
								</div>
								<div class="twocol col"><?php echo getCustomerSex($post); ?> <?php echo getCustomerAge($post); ?></div>
								<div class="twocol col al_l"><?php echo getCustomerAreas($post); ?></div>
								<div class="fourcol col al_l"><?php echo getCustomerItems($post); ?></div>
								<div class="threecol col last">
									<span class="star star<?php echo get_post_meta($post->ID, "voiceInfo16", TRUE); ?>"></span>
								</div>
								<span class="icon icon-arrow-right3"></span>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
		<!--.contents--></div>

		<?php if(function_exists('wp_pagenavi')): ?>
			<div class="contents al_c">
				<?php wp_pagenavi(array("query" => $postsa)); ?>
			<!--.pagenavi .contents--></div>
		<?php endif; wp_reset_postdata(); ?>

		<!--.col--></div>
	<!-- .container --></div>

<?php get_footer(); ?>