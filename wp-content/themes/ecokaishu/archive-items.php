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
	$terms = get_terms('cltitems', array("orderby"=> ID));
	$postType = get_post_type_object(get_post_type());
	?>

	<div class="container">

		<h2><?php post_type_archive_title(); ?></h2>

		<!--<section id="now" class="contents">
			<div class="twelvecol col last">
				<h3>ただ今、エコ回収されている品物</h3>
			</div>
			<ul class="listEcokaishu">
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img01.jpg" alt="" />
					<h4>Apple iPad(16G)</h4>
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
					</dl>
					
				</li>
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img02.jpg" alt="" />
					<h4>コムサスーツケースコムサスーツケース</h4>
					
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
					</dl>
				</li>
				<li class="threecol col">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img03.jpg" alt="" />
					<h4>FUJIGEN ウクレレ</h4>
					
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
					</dl>
				</li>
				<li class="threecol col last">
					<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img04.jpg" alt="" />
					<h4>PS3</h4>
					
					<dl>
						<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
						<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
					</dl>
				</li>
			</ul>
		</section>-->

		<section class="listItems contents">
			<div class="twelvecol col last">
				<h3>物品別のエコ回収実績を確認する</h3>
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

	</div>
	

<?php get_footer(); ?>