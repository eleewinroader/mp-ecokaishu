<?php
/**
 * The main template file.
* @package Montser Platform
 */

get_header();

	//calling
	$postType = get_post_type_object(get_post_type());
	$cltItems = get_the_terms($post->ID, 'cltitems');
	
	//vars of post type
	$postTypeName = $postType->name;
	$postTypeLabel = $postType->label;
	$postTypeUrl = get_post_type_archive_link($postTypeName);

	//vars 
	$relatedItemIds = array();
	$relatedItemNames = array();
	$pageTitle = get_the_title($post->ID); //page title
	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02");
	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.$postTypeUrl.'" itemprop="url">
					<span itemprop="title">'.$postTypeLabel.'</span>
				</a> 
			</div>';
	
	if(count($cltItems) > 1){ //vars for a single item page

		//get taxs
		 foreach($cltItems as $cltItem){
			if($cltItem->parent == 0){
				//$cltItemCatId = $cltItem -> term_id; //cat tax id of a single item
				$cltItemCatName = $cltItem -> name; //cat name of a single item
			}else{
				array_push($relatedItemIds, $cltItem -> term_id); // tax ids of a single item
				array_push($relatedItemNames, $cltItem -> term_name); // tax names of a single item
			}
		}

		//get a cat page
		$args = array(
			"post_type" => $postTypeName,
			"name" => $cltItemCatName
		);
		$cltItemCat = query_posts($args);
		if($cltItemCat){ // if a cat page exists
			$cltItemCatId = $cltItemCat[0]->ID;
			$cltItemCatUrl = get_permalink($cltItemCatId); //cat url of a single item
			$navPage .= '
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="'.$cltItemCatUrl.'" itemprop="url">
							<span itemprop="title">'.$cltItemCatName.'</span>
						</a> 
					</div>';
		}
		wp_reset_query();

	}else{ // vars for a cat page

		//get a page
		$cltItemCatId = $post->ID;
		$cltItemCatName = $post->post_title;

	}

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
			<div class="ninecol col">
				<h2><span class="block"><?php echo $pageTitle; ?>のエコ回収 口コミ・実績</span></h2>
			</div>
			<div class="listSns threecol col last">
				<ul>
					<li id="shareFacebook"><a href=""><span class="label">facebook</span></a></li>
					<li id="shareTwitter"><a href=""><span class="label">twitter</span></a></li>
					<li id="shareGoogle"><a href=""><span class="label">Google+</span></a></li>
				</ul>
			</div>
		</div>
	<!--.headerPage--></header>

	<div class="container">

		<div class="ninecol col">

			<div class="contents contactBnr" id="top">
				<?php
				$msg = '<span class="block">いらなくなった</span>'.$post->post_title.'は</span><span class="block">お任せください!</span>';
				 echo contactBnr($msg);
				 ?>
			</div>

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
				<section class="contents">
					<h3><?php the_title(); ?>のエコ回収について「よくある質問」</h3>
					<dl class="listFaq">
					<?php foreach($faqs as $faq): ?>
						<dt><?php echo $faq->post_title; ?></dt>
						<dd><?php echo $faq->post_content; ?></dd>
					<?php endforeach; wp_reset_query();?>
					</dl>
				<!--よくある質問--></section>
			<?php endif; ?>

			<?php 
			$priceExam = get_post_meta($post->ID, "itemsInfo01", TRUE);
			if($priceExam): ?>
				<section class="contents priceExam" id="<?php echo "family".$post->ID; ?>">
					<h3><?php the_title(); ?>の「エコ回収料金」事例</h3>
					<?php echo $priceExam; ?>
					<p class="footnote"><small>
					※ 金額表示はすべて税込価格となります。<br />
					※ 特殊作業は、お客様希望がなくても、作業上必ず必要になることもありますので、ご了承ください。
					</small></p>
				<!--「エコ回収料金」事例--></section>
			<?php endif; ?>

			<section class="contents">
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
			<!--口コミ--></section>

			<?php
			//related items
			if(count($cltItems) > 1){
				$args = array(
					"posts_per_page" => -1,
					"post_type" => "items",
					"order_by" => "date",
					"order" => ASC,
					"post__not_in" => array($post->ID),
					"tax_query" => array(
						array(
							'taxonomy' => 'cltitems',
							'field' => 'id',
							'terms' => $relatedItemIds
						)
					)
				);
				$relatedItems = query_posts($args);
				if($relatedItems){ ?>
					<section class="contents listItems">
						<h3>関連アイテム一覧</h3>
						<ul>
							<?php foreach($relatedItems as $relatedItem): ?>
							<li><a href="<?php echo get_permalink($relatedItem->ID); ?>"><?php echo $relatedItem->post_title; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<!--関連アイテム--></section>
					<?php
				}
			}?>

			<section class="contents">
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
			<!--エコ回収サービスについて--></section>


			<div class="contents contactBnr" id="bottom">
				<? echo contactBnr(); ?>
			</div>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">

			<?php
			//item pages in the same cat
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postTypeName,
				"posts_per_page" => -1,
				"cltitems" => $cltItemCatName,
				"post__not_in" => array($cltItemCatId)
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>同じカテゴリ内のアイテム一覧</h2><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular item cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気アイテム一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular item cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => "area",
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気エリア一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>
			
			<div class="bnrBtn contents" id="area">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-search"></span>
					<span class="icon-map3"></span>
					<p><span class="block">対応エリアの</span><span class="block">確認はこちら</span></p>
				</a>
			<!--.contents--></div>

			<div class="bnrBtn contents">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			<!--.contents--></div>

			<div class="bnrBtn contents">
				<a href="<?php echo get_permalink(5884); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/campaign/1411/00_bnr_640x260.gif" alt="先走り年末大掃除キャンペーンページへ" /></a>
			<!--.contents--></div>

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind contents">
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
				<!--.contents--></div>
			<?php endif;

			//related contents page
			$args = array(
				"order_by" => "date",
				"order" => DESC,
				"post_type" =>"post",
				"posts_per_page" => 10,
				"cltitems" => $cltItemCatName
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listPosts contents">
				<h2>関連記事一覧</h2><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>

		<!--.sidebar--></aside>

	<!--.container--></div>

<?php get_footer(); ?>'
