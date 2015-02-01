<?php
get_header();

	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.get_permalink($post->ID).'" itemprop="url">
					<span itemprop="title">'.$pageTitle.'</span>
				</a>
			</div>';
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
					<?php echo $navPage; ?>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="twelvecol col last">
				<h2><?php echo $areaPageTitle; ?></h2>
			</div>
		</div>
	<!--.headerPage--></header>


	<section class="staffDetail">
		<div class="container">
			<div class="staffInfo contents">
				<div class="twelvecol col last">
					<h3>田野實 温代 <span>たのみ あつよ</span></h3>
					<div class="al_c">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg" /></div>
						<p>入社2年目 / コンシェルジュ</p>
					</div>
				</div>
			</div>
			<div class="staffDiary contents">
				<div class="twelvecol col last"><h3>田野實 温代の一言日記</h3></div>
				<div class="diary">
					<div class="sixcol col">
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。ひとまず大森さんへ話個人どう話へ考えない人同じ時分あなたかふりにという小遠慮ますです</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p>それも前どうしてもこの相違院として事の日を知れですです。いかに始めを意味院ももちろんそのお話でまいじゃが知れと来たがは出立やったくっですば、ああには入っなたなで。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。ひとまず大森さんへ話個人どう話へ考えない人同じ時分あなたかふりにという小遠慮ますです</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
					</div>
					<div class="sixcol col last">
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/img01.jpg" /></p>
							<p>それも前どうしてもこの相違院として事の日を知れですです。いかに始めを意味院ももちろんそのお話でまいじゃが知れと来たがは出立やったくっですば、ああには入っなたなで。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
					</div>
				</div>
				<a href="#" class="seemore">もっと見る</a>
			</div>
		</div><!--.container-->
	</section><!--.staffDetail-->


<?php get_footer(); ?>
