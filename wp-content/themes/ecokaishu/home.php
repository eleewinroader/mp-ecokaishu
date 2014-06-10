<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/
get_header( ); ?>

	<h2>不用品回収の前に「エコ回収」</h2>

	<div class="container" id="movie">
		<div class="twelvecol col last">
			<div class="movie-container">
				<iframe width="1140" height="641" src="//www.youtube.com/embed/wbIak1kRaKg" frameborder="0" allowfullscreen></iframe>
			<!-- #movie .movie-container--></div>
		</div>
	<!-- #movie --></div>

	<section id="index">
		<div class="container">
			<h3>メニュー</h3>
			<ul>
				<li class="twocol col">
					<a href="<?php echo siteInfo("rootUrl"); ?>/ecokaishu/">
						<span class="icon-ecolandlogo"></span>
						<span class="indexTitle">エコ回収とは</span>
					</a>
				</li>
				<li class="twocol col">
					<a href="<?php echo siteInfo("rootUrl"); ?>/flow/">
						<span class="icon-flow-tree"></span>
						<span class="indexTitle">ご利用の流れ</span>
					</a>
				</li>
				<li class="twocol col">
					<a href="<?php echo siteInfo("rootUrl"); ?>/price/">
						<span class="icon-plus4"></span>
						<span class="indexTitle">料金体系</span>
					</a>
				</li>
				<li class="twocol col">
					<a href="<?php echo siteInfo("rootUrl"); ?>/about/">
						<span class="icon-ecolandjp"></span>
						<span class="indexTitle">運営会社</span>
					</a>
				</li>
				<li class="twocol col">
					<a href="<?php echo siteInfo("rootUrl"); ?>/contact/">
						<span class="icon-question"></span>
						<span class="indexTitle">お問い合わせ</span>
					</a>
				</li>
				<li class="twocol col last">
					<a href="<?php echo siteInfo("rootUrl"); ?>/estimate/">
						<span class="icon-calculate"></span>
						<span class="indexTitle">かんたん見積依頼</span>
					</a>
				</li>
			</ul>
		<!-- #index .container --></div>
	<!-- #index --></section>

	<section id="news">
		<div class="container">
			<div class="twelvecol col last">
				<h3>新着情報&お知らせ</h3>
				<ul class="news">
				<?php
				$args = array(
					"posts_per_page" => 5,
					"post_type" => array("notices"),
				);
				$posts = query_posts($args);
				foreach($posts as $post){
					$li = '<li><a href="'.get_permalink($post->ID).'"><time datetime="'.$post->post_date.'">'.get_the_date("y.m.d").'</time>';
					$tags = get_the_tags(); 
					if ($tags) foreach($tags as $tag) $li .= '<span class="tag">'.$tag->name.'</span>';
					$li .= '<span class="newsTxt">'.$post->post_title.'</span></a></li>';
					echo $li;
				}?>
				</ul>
			</div>
		<!-- #news .container --></div>
	<!-- #news --></section>

<?php get_footer(); ?>