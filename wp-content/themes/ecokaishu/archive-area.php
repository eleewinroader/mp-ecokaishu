<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
 */

get_header(); ?>

	<?php
	//vars
	$terms = array("東京都", "神奈川県", "埼玉県", "千葉県", "大阪府", "兵庫県"); 
	$postType = get_post_type_object(get_post_type());
	?>
	
	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php echo $postType->labels->name; ?></li>
				</ul>
			</div>
		</nav>
		<h2><?php post_type_archive_title(); ?></h2>
	<!-- .headerPage --></header>

	<div class="container">

		<div class="contents">
			<section class="sixcol col listItems">
				<h3>人気エリアから口コミ・実績を確認する</h3>
				<ul>
				<?php
				$args = array(
					"order" => ASC,
					"orderby" => DATE,
					"post_type" => "area",
					"posts_per_page" => -1,
					"catkinds" => "人気"
				);
				$posts = query_posts($args);
				if($posts){
					foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
				}?>
				</ul>
			</section>
			<section class="sixcol col last listItems">
				<h3>都道府県から口コミ・実績を確認する</h3>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "area",
						"posts_per_page" => -1,
						"catkinds" => "大カテゴリ"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			</section>
		<!--.contents--></div>

		<div class="contents">
			<section>
				<div class="twelvecol col last"><h3 class="m0_b">対応エリア一覧</h3></div>
				<?php
				$i = 1;
				foreach($terms as $term){
					$lists = array();
					$args = array(
						"orderby" => "DATE",
						"order" => ASC,
						"post_type" => $postType->name,
						"cltarea" => $term,
						"posts_per_page" => -1
					);
					$posts = query_posts($args);
					if($i % 3 == 0) $last = " last"; else $last = "";
					if($posts){
						echo '<div class="fourcol col listArea'.$last.'">';
						foreach($posts as $post){
							if($post->post_title != $term){
								$li = '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
								array_push($lists, $li);
							}else{
								$prefectureID = $post->ID;
								$prefectureName = $post->post_title;
								$prefectureUrl = get_permalink($post->ID); 
							}
						}
						echo '<h4><a href="'.$prefectureUrl.'">'.$prefectureName.'</a></h4>';
						echo get_attached_img($prefecture->ID, "areaInfo01", "", "map");
						echo '<ul>';
						foreach($lists as $li) echo $li;
						echo '</ul></div>';
					}
					$i++;
				}?>
			</section>
		<!--.contents--></div>

		<div class="contents">
			<section id="faq" class="sixcol col listPosts">
				<h3>対応エリアに関するよくある質問</h3>
				<a href="<?php echo get_post_type_archive_link("faq"); ?>" class="toAchive">一覧を見る</a>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "faq",
						"posts_per_page" => -1,
						"qstcat" => "対象エリア"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			</section>
			<section id="shortcuts" class="sixcol col last">
				<h3>エコ回収にサービスについて</h3>
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