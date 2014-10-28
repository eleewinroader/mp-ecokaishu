<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$brow = IEbrowserVer();
if($brow == "msie ie6" || $brow == "msie ie7" || $brow == "msie ie8"){
	echo '<meta http-equiv="refresh" content="0; url=http://www.eco-kaishu.jp/legacy">';
}?>
<title></title>
<link href="<?php echo bloginfo("stylesheet_url"); ?>" rel="stylesheet" type="text/css" media="all" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script.min.js"></script>
<script>
	//GA
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-42854141-2', 'auto');
	ga('send', 'pageview');
</script>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. 'inc/tags/ga_common.php'); ?>
<?php wp_head(); ?>
</head>
<body>

	<?php
	//page class & h1
	if(is_single()){
		if(get_post_type() == "notices"){
			$pageType = "post";
			$featureType = "notices";
		}elseif(get_post_type() == "area"){

			$cltareas = get_the_terms($post->ID, 'cltarea');
			if(count($cltareas) > 1){
				 foreach($cltareas as $area){
				 	
					if($area->parent == 0){
						$prefectureId = $area -> term_id;
						$prefectureName = $area -> name;
					}else{
						$municipalityId = $area -> term_id;
						$municipalityName = $area -> name;
					}
				}

				$h1 = $prefectureName." ".$municipalityName."で不用品回収・処分を考えているならエコ回収";
				wp_reset_query();
			}else{
				foreach($cltareas as $area){


					$prefectureId = $area -> term_id;
					$prefectureName = $area -> name;
					$h1 = $prefectureName."で不用品回収・処分を考えているならエコ回収";
				}
			}

			$pageType = "post";
			$parentClass = " columns";
			$featureType = get_post_type();

		}elseif(get_post_type() == "items"){

			$cltitems = get_the_terms($post->ID, 'cltitems');
			if(count($cltitems) > 1){
				 foreach($cltitems as $item){
					if($item->parent == 0){
						$itemCatId = $item -> term_id;
						$itemCatName = $item -> name;
					}else{
						$itemId = $item -> term_id;
						$itemName = $item -> name;
					}
				}
				$args = array(
					"post_type" => "area",
					"name" => $itemCatName
				);
				$itemCat = query_posts($args);
				$h1 = $itemName."の処分・廃棄を考えているならエコ回収";
				wp_reset_query();

			}else{
				foreach($cltitems as $item){
					$itemCatId = $item -> term_id;
					$itemCatName = $item -> name;
					$h1 = $itemCatName."の処分・廃棄を考えているならエコ回収";
				}
			}
			$pageType = "post";
			$parentClass = " columns";
			$featureType = get_post_type();

		}elseif(get_post_type() == "campaign"){
			$pageType = "campaign";
			if(campCode($post)){ 
				$parentClass = " ".campCode($post, "parent", " ");
				$childrenClass = campCode($post, "children", " ");
			}else{
				$parentClass = NULL;
				$childrenClass = NULL;
			}
		}else{

			$cat = get_the_category(); 
			$pageType = "post";
			$parentClass = " columns";
			$featureType = $cat[0]->slug;

			$h1var = get_post_meta($post->ID, "contentsInfo04", true);
			$seoTitle = get_post_meta($post->ID, _aioseop_title, true);
			if($h1var) $h1 = $h1var;
			elseif($seoTitle) $h1 = $seoTitle;
			else $h1 = $cat[0]->name."｜".$post->post_title;

		}
	}elseif(is_post_type_archive()){
		$postTypeObj = get_post_type_object(get_post_type());
		$label = $postTypeObj->labels->name;

		$pageType = "archive";
		$featureType = get_post_type();

		if(get_post_type() == "area"){
			$parentClass = " columns";
			$h1 = "東京・神奈川・千葉・埼玉・大阪・兵庫で不用品をゴミにしない【エコ回収】";
		}elseif(get_post_type() == "items"){
			$parentClass = " columns";
			$h1 = "家電、家具、冷蔵庫、テレビなどの処分をお考えるのなら不用品をゴミにしない【エコ回収】";
		}else{
			$metaInfo01 = getPage("イントロ", "h1");
			if($metaInfo01) $h1 = $metaInfo01;
			else $h1 = getPostType($post, "label");
		}

	}elseif(is_archive()){
		if(is_category()){
			$tax_slug = "category";
			$id = get_query_var('cat');
		}else if(is_tag()){
			$tax_slug = "post_tag";
			$id = get_query_var('tag_id');
		}else if(is_tax()){
			$tax_slug = get_query_var('taxonomy');
			$term_slug = get_query_var('term');
			$term = get_term_by("slug",$term_slug,$tax_slug);
			$id = $term->term_id;
		}
		$term = get_term($id, $tax_slug);
		$h1 = $term->name.'と「不用品回収」をまつわるお役立ち情報';
		$pageType = "archive";
	}elseif(is_home()){
		$pageType = "archive";
		$featureType = "home";
		$h1 = "不用品回収に頼む前に〜あなたのいらないモノが誰かのほしいモノに";
	}?>

	
	<header class="header" id="siteHeader">
		<div id="headerInfo">
			<div class="container">
				<h1 class="eightcol col"><?php if($h1) echo $h1; else bloginfo("site_name"); ?></h1>
				<div class="fourcol col last navGlobal">
					<ul>
					<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>"><span class="label">エコランド</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlOkataduke"); ?>"><span class="label">お片づけ</span></a></li>
					<li class="currSite"><a href="<?php echo siteInfo("siteUrlEcokaishu"); ?>"><span class="label">エコ回収</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlEcoauc"); ?>"><span class="label">エコオク</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlRshop"); ?>"><span class="label">リサイクルショップ</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>"><span class="label">会員登録</span></a></li>
					</ul>
				</div>
			</div>
		<!--#headerInfo--></div>
		<nav id="headerFixed">
			<div class="container">
				<div class="threecol col" id="siteName">
					<a href="<?php echo siteInfo("rootUrl"); ?>">エコ回収</a>
				</div>
				<div class="ninecol col last" id="siteMenu">
					<div class="showBigger" id="contMenu">
						<ul id="localNavi">
							<li id="navHome"><a href="<?php echo siteInfo("rootUrl"); ?>/">HOME</a></li>
							<li id="navFeatures" class="hasSub">
								<div data-sub="lnEcokaishu" class="showLnSubmenu">エコ回収とは</div>
								<ul class="lnSubMenu" id="lnEcokaishu">
									<li><a href="<?php echo get_post_type_archive_link("ecokaishu"); ?>">エコ回収について</a></li>
									<li><a href="<?php echo get_post_type_archive_link("problems"); ?>">お悩みの方へ</a></li>
									<li><a href="<?php echo get_post_type_archive_link("items"); ?>">アイテム別口コミ・実績</a></li>
								</ul>
							</li>
							<li id="navDetails" class="hasSub">
								<div data-sub="lnService" class="showLnSubmenu">サービス案内</div>
								<ul class="lnSubMenu" id="lnService">
									<li><a href="<?php echo get_post_type_archive_link("flow"); ?>">ご利用の流れ</a></li>
									<li><a href="<?php echo get_post_type_archive_link("price"); ?>">料金案内</a></li>
									<li><a href="<?php echo get_post_type_archive_link("faq"); ?>#faq1">エコ回収できるモノ/ できないモノ</a></li>
									<li><a href="<?php echo get_post_type_archive_link("faq"); ?>#faq3">買取について</a></li>
									<li><a href="<?php echo get_post_type_archive_link("area"); ?>">対応エリア</a></li>
									<li><a href="<?php echo get_post_type_archive_link("faq"); ?>">よくある質問</a></li>
								</ul>

							</li>
							<li id="navAbout" class="hasSub">
								<div data-sub="lnAbout" class="showLnSubmenu">私たちについて</div>
								<ul class="lnSubMenu" id="lnAbout">
									<li><a href="<?php echo get_post_type_archive_link("staff"); ?>#concierge">私たちが承ります</a></li>
									<li><a href="<?php echo get_post_type_archive_link("staff"); ?>#collecting">私たちが伺います</a></li>
									<li><a href="<?php echo get_post_type_archive_link("about"); ?>">運営企業</a></li></li>
								</ul>
							</li>
							<li id="navConcierge"><a href="<?php echo get_post_type_archive_link("concierge"); ?>">お問い合わせ</a></li>
						</ul>
					</div>
					<div class="showSmaller" data-panel="panelMenu" data-content="contMenu" id="menuBtn" style="top:27px;"><span class="icon-menu2"></span></div>
				</div>

				<div class="panelCont" id="panelMenu"></div>
				<!--.panelCont-->
				
			<!--.container .header--></div> 

		<!--.headerFixed--></nav>
	<!--.header--></header>

	<article class="<?php echo $pageType.$parentClass;?>" id="<?php echo $featureType.$childrenClass; ?>">
	
	<?php echo $pr_code; ?>
