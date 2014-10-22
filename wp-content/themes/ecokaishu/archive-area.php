<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
 */

get_header(); ?>

	<?php
	//vars
	$terms = array("東京都", "神奈川県", "埼玉県", "千葉県", "大阪府", "兵庫県"); //get_terms('cltarea', array("orderby"=> ID));
	$postType = get_post_type_object(get_post_type());
	?>

	<div class="container">

		<h2><?php post_type_archive_title(); ?></h2>

		<section class="contents">
			<div class="twelvecol col last"><h3 class="m0_b">エコ回収対応エリア一覧</h3></div>
			<?php foreach($terms as $term){?>
				<div class="twocol col listArea">
					<h4><?php  echo $term; ?></h4>
					<ul>
					<?php
					$args = array(
						"orderby" => "DATE",
						"order" => ASC,
						"post_type" => $postType->name,
						"posts_per_page" => -1,
						"cltarea" => $term
					);
					$posts = query_posts($args);
					if($posts) foreach($posts as $post){
						if($post->post_title != $term) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
					}?>
					</ul>

				</div>
				<?php
			}?>
			<div class="clear"></div>
		<!--.contents--></section>

		<!--<section id="now" class="contents">
			<div class="twelvecol col last">
				<h3>ただ今、対応エリアからエコ回収されている品物</h3>
			</div>
			<ul class="listEcokaishu">
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img01.jpg" alt="" />
					<h4>東京都 練馬区</h4>
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収したモノ</dt><dd class="ecokaishuItem">Apple iPad(16G)</dd>
					</dl>
					
				</li>
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img02.jpg" alt="" />
					<h4>東京都 世田谷区</h4>
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収したモノ</dt><dd class="ecokaishuItem">コムサスーツケースコムサスーツケース</dd>
					</dl>
				</li>
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img03.jpg" alt="" />
					<h4>千葉市 花見川区</h4>
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収したモノ</dt><dd class="ecokaishuItem">FUJIGEN ウクレレ</dd>
					</dl>
				</li>
				<li class="threecol col last">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img04.jpg" alt="" />
					<h4>神奈川県 相模原市</h4>
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収したモノ</dt><dd class="ecokaishuItem">PS3</dd>
					</dl>
				</li>
			</ul>
		<!--#now .contents</section>-->

		<section id="shortcuts" class="contents">
			<div class="twelvecol col last">
				<h3>エコ回収についてもっと詳しく知る</h3>
			</div>
			<ul class="listShortcuts">
				<li class="fourcol col price">
					<a href="<?php echo get_post_type_archive_link("price"); ?>">
						<span class="block">明朗な料金体系が</span>
						<span class="block">エコ回収の特徴</span>
						<span class="block index"><span class="icon-calculate"></span>料金案内</span>
					</a>
				</li>
				<li class="fourcol col">
					<a href="<?php echo get_post_type_archive_link("flow"); ?>">
						<span class="block">エコ回収依頼から</span>
						<span class="block">当日のエコ回収まで</span>
						<span class="block index"><span class="icon-flow-tree"></span>ご利用の流れ</span>
					</a>
				</li>
				<li class="fourcol col last">
					<a href="<?php echo get_post_type_archive_link("staff"); ?>">
						<span class="block">お客様のお困りことに</span>
						<span class="block">誠実・丁寧な仕事を</span>
						<span class="block index"><span class="icon-users"></span>STAFF紹介</span>
					</a>
				</li>
			</ul>
		<!--#shortcuts .contents--></section>

	<!--.container--></div>

<?php get_footer(); ?>