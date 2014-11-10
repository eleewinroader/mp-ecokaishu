<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.1
* @since MP-Ecokaishu 0.0
 */

get_header();

	//vars
	$postType = get_post_type_object(get_post_type());
	?>
	
	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php echo getPostType($post, "label"); ?></li>
				</ul>
			</div>
		</nav>
		<h2><?php post_type_archive_title(); ?></h2>
	<!--headerPage--></header>

	<div class="container">

		<div class="contents">
			<section class="sixcol col listItems">
				<h3>人気アイテムから口コミ・実績を確認</h3>
				<ul>
				<?php
				$args = array(
					"order" => ASC,
					"orderby" => DATE,
					"post_type" => "items",
					"posts_per_page" => -1,
					"catkinds" => "人気"
				);
				$posts = query_posts($args);
				if($posts){
					foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
				}?>
				</ul>
			<!--.listItems--></section>
			<section class="sixcol col last listItems">
				<h3>カテゴリから口コミ・実績を確認</h3>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "items",
						"posts_per_page" => -1,
						"catkinds" => "大カテゴリ"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			<!--.listItems--></section>
		<!--.contents--></div>

		<div class="contents">
			<section class="listItems">
				<div class="twelvecol col last">
					<h3>エコ回収アイテム一覧</h3>
					<ul>
						<?php
						$args = array(
							"order" => ASC,
							"orderby" => DATE,
							"post_type" => "items",
							"posts_per_page" => -1
						);
						$posts = query_posts($args);
						if($posts){
							foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
						}?>
					</ul>
				</div>
			</section>
		<!--.contents--></div>

		<div class="contents">
			<section id="faq" class="sixcol col listPosts">
				<h3>エコ回収品関するよくある質問</h3>
				<a href="<?php echo get_post_type_archive_link("faq"); ?>" class="toAchive">一覧を見る</a>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "faq",
						"posts_per_page" => -1,
						"qstcat" => "エコ回収品について"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			<!--よくある質問--></section>
			<section id="shortcuts" class="sixcol col last">
				<h3>エコ回収についてもっと詳しく知る</h3>
				<ul class="listShortcuts">
					<li>
						<a href="<?php echo get_post_type_archive_link("price"); ?>">
							<span class="block">明朗な料金体系がエコ回収の特徴</span>
							<span class="block index"><span class="icon-calculate"></span>料金案内</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("flow"); ?>">
							<span class="block">エコ回収依頼から当日のエコ回収まで</span>
							<span class="block index"><span class="icon-flow-tree"></span>ご利用の流れ</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("staff"); ?>">
							<span class="block">お客様のお困りことに誠実・丁寧な仕事を</span>
							<span class="block index"><span class="icon-users"></span>STAFF紹介</span>
						</a>
					</li>
				</ul>
			</section>
		<!--.contents--></div>

	<!--.container--></div>

<?php get_footer(); ?>