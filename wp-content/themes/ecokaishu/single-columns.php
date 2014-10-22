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
	$terms = get_the_terms($post->ID, 'cltitems');
	if($terms){
		foreach($terms as $term){
			if($term->parent == 0){
				$parentItemTag = $term->slug;
				$parentItemName = $term->name;
				$parentItemId = $term->term_id;
			}
		}
	}
	$postType = get_post_type_object(get_post_type());
	$postTypes = get_post_types(array("_builtin" => FALSE));

	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02"); 
	?>

	<div class="container">

		<div class="ninecol col">

			<header class="contents">
				<nav class="catNavi">
					<ul>
						<li><a href="<?php echo getPostType($post, "link"); ?>"><?php echo getPostType($post, "label"); ?></a></li>
						<li><?php the_title(); ?></li>
					</ul>
				</nav>
				<h2><span class="title block"><?php the_title(); ?>のエコ回収</span></h2>
			<!--header--></header>

			<?php
			if(campCode($post)){ 
				$childrenClass = campCode($post, "children");
				$pr_code = substr($childrenClass, 7, 11);
				$pr_code = str_replace("-", "_", $pr_code);
				$param = "?pr_code=".$pr_code; 
				if($pr_code == "4_00") $ycoll = "2-1";
			}
			$title = $post->post_title;
			$telNum = telNum();
			$template_url = get_bloginfo("template_url");
			$site_url = siteInfo("rootUrl");

$string = <<< EOF
			<section class="contact contents">
				<h3><span class="block">{$title}でお困りのことがあれば、</span><span class="block">エコランドにご相談ください！</span></h3>
				<div class="msg">
					<div class="explains">
						<span class="block"><span class="block">いらなくなった</span>{$title}は</span>
						<span class="block">お任せください!</span>
					</div>
					<div id="ecolin"><img src="{$template_url}/assets/img/base/staff_img_shinki.jpg" /></div>
				<!--.msg--></div>
				<div class="box" id="tel">
					<a href="tel:0120530{$telNum}" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});">
						<span class="label block">お急ぎの方はお電話で</span>
						<div class="action">
							<span class="icon-phone"></span>
							<span>0120-530-{$telNum}</span>
						</div>
					</a>
				</div>
				<div class="box" id="mail">
					<a href="{$site_url}/estimate{$ycoll}/{$pr_code}">
						<span class="label block">24時間受付中</span>
						<div class="action">
							<span class="icon-mail4"></span>
							<span>メールで見積依頼</span>
						</div>
					</a>
				</div>
				<p id="openingHour">
					<span class="date">営業時間</span>
					<span class="date">平･土 9:00-22:00</span><span class="date">日･祝 9:00-20:00</span>
				</p>
			<!--.contact .contents--></section>
EOF;
echo $string;
?>
			

			<!--<section id="now" class="contents">
				<h3>最近エコ回収された<?php echo $post->post_title; ?></h3>
				<ul class="listEcokaishu">
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img01.jpg" alt="" />
						<h4>Apple iPad(16G)</h4>
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
						
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img02.jpg" alt="" />
						<h4>コムサスーツケースコムサスーツケース</h4>
						
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img03.jpg" alt="" />
						<h4>FUJIGEN ウクレレ</h4>
						
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img04.jpg" alt="" />
						<h4>PS3</h4>
						
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
				</ul>
			#now .contents</section>-->

			<?php
			$args = array(
				"post_type" => "faq",
				"posts_per_page" => -1,
				"qstcat" => $post->post_title,
				"order" => ASC,
				"orderby" => DATE,
			);
			$faqs = query_posts($args);
			if($faqs): ?>
				<section class="contents" id="intro">
					<h3><?php the_title(); ?>のエコ回収について「よくある質問」</h3>
					<dl class="listFaq">
					<?php foreach($faqs as $faq): ?>
						<dt><?php echo $faq->post_title; ?></dt>
						<dd><?php echo $faq->post_content; ?></dd>
					<?php endforeach; wp_reset_query();?>
					</dl>
				<!--.contents--></section>
			<?php endif; ?>

			<?php 
			$priceExam = get_post_meta($post->ID, "itemsInfo01", TRUE);
			if($priceExam): ?>
				<section class="contents priceExam" id="<?php echo "family".$post->ID; ?>">
					<h3><?php the_title(); ?>の「エコ回収料金」事例</h3>
					<?php echo $priceExam; ?>
					<p class="footnote"><small>
					※ 金額表示はすべて税込価格となります<br />
					※ 特殊作業は、お客様希望がなくても、作業上必ず必要になることもありますので、ご了承ください。
					</small></p>
				<!--.priceExam .contents--></section>
			<?php endif; ?>

			<section id="voices" class="contents">
				<?php if(count($voiceTitles) == 0): ?>
					<?php echo $post->post_content; ?>
				<?php else:?>
					<h3><?php the_title(); ?>のエコ回収を利用した「お客様からの声」</h3>
					<dl class="listVoices">
					<?php for($i=0; $i<count($voiceTitles); $i++){
						echo "<dt>".$voiceTitles[$i]."</dt>";
						echo "<dd>".$voiceContents[$i]."</dd>";
					}?>
					</dl>
				<?php endif; ?>
			<!--#voices .contents--></section>

			<section id="shortcuts" class="contents">
				<div class="twelvecol col last">
					<h3>エコ回収についてもっと詳しく知る</h3>
				</div>
				<ul class="listShortcuts">
					<li>
						<a href="<?php echo get_post_type_archive_link("price"); ?>">
							<span class="block">明朗な料金体系が</span>
							<span class="block">エコ回収の特徴</span>
							<span class="block index"><span class="icon-calculate"></span>料金案内</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("flow"); ?>">
							<span class="block">エコ回収依頼から</span>
							<span class="block">当日のエコ回収まで</span>
							<span class="block index"><span class="icon-flow-tree"></span>ご利用の流れ</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("staff"); ?>">
							<span class="block">お客様のお困りことに</span>
							<span class="block">誠実・丁寧な仕事を</span>
							<span class="block index"><span class="icon-users"></span>STAFF紹介</span>
						</a>
					</li>
				</ul>
			<!--#shortcuts .contents--></section>

			<?php echo $string; ?>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">
			
			<div class="listBtn" id="area">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-search"></span>
					<span class="icon-map3"></span>
					<p><span class="block">対応エリアの</span><span class="block">確認はこちら</span></p>
				</a>
			<!--#area--></div>

			<div class="bnrBtn">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			</div>

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind">
					<ul>
					<?php foreach($convSales  as $convSale): ?>
						<li class="item">
							<a href="<?php echo $convSale->link; ?>" class="itemContents">
								<span class="icon-bullhorn"></span>
								<p class="info">
									<span class="block"><?php echo $convSale->month."月".$convSale->day."日"; ?></span><span class="block"><?php echo $convSale->area; ?></span>
								</p>
								<p class="off">割引CHECK</p>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php

			//recent articles in the same area
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"term" => $parentItemTag
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="listItems"><h3>物品別エコ回収実績</h3><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
				wp_reset_query();
			}?>

		</aside>

	<!--.container--></div>

<?php get_footer(); ?>'
