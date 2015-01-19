<?php
/*
* @package Montser Platform
*/

if(is_single()){
	$tempType = "single";
	$metaObj = $post;
}elseif(is_page()){
	$tempType = "single";
	$metaObj = $post;
}elseif(is_post_type_archive()){
	$tempType = "postTypeArchive";
	$metaObj = get_post_type_object(get_post_type());
}elseif(is_archive()){
	$tempType = "archive";
	if(is_category() || is_tag() || is_tax()){
		if(is_category()){
			$tax_slug = "category";
			$id = get_query_var('cat');
		}elseif(is_tag()){
			$tax_slug = "post_tag";
			$id = get_query_var("tag_id");
		}elseif(is_tax()){
			$tax_slug = get_query_var("taxonomy");
			$term_slug = get_query_var("term");
			$term = get_term_by("slug",$term_slug,$tax_slug);
			$id = $term->term_id;
		}
		$metaObj = get_term($id, $tax_slug);
	}else{

	}
}elseif(is_home()){
	$tempType = "home";
}


$h1 = getH1($tempType, $metaObj); ?>
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
<?php
$title = getTitle($tempType, $metaObj);
$description = getDescription($tempType, $metaObj);
$keywords = getKeywords($tempType, $metaObj);
if($title) echo "<title>".$title."</title>"."\n";
else echo "<title></title>\n";
if($description && !is_single()) echo '<meta name="description" itemprop="description" content="'.$description.'" />'."\n";
if($keywords && !is_single()) echo '<meta name="keywords" itemprop="keywords" content="'.$keywords.'" />'."\n";
?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@eco_land" />
<meta name="twitter:creator" content="@eco_land" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:type" content="<?php if(is_home()) echo "website"; else echo "article"; ?>" />
<meta property="og:url" content="<?php echo getCanonicalUrl($tempType, $metaObj); ?>" />
<meta property="og:image" content="<?php echo getArticleImg($tempType, $metaObj); ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo("sitename"); ?>" />
<?php if($description) echo '<meta property="og:description" content="'.$description.'" />'."\n";  ?>
<link href="<?php echo bloginfo("stylesheet_url"); ?>" rel="stylesheet" type="text/css" media="all" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.min.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script.min.js"></script>
<script type="text/javascript">
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/ga_common.php'); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/ga_ecokaishu.php'); ?>
</script>
<?php wp_head(); ?>
</head>
<body>

	<header class="header" id="siteHeader">
		<div id="headerInfo">
			<div class="container">
				<h1 class="eightcol col"><?php if($h1) echo $h1; else bloginfo("site_name"); ?></h1>
				<div class="fourcol col last navGlobal">
					<ul>
					<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>" title="エコランド"><span class="label">エコランド</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlOkataduke"); ?>" title="お片づけ"><span class="label">お片づけ</span></a></li>
					<li class="currSite"><a href="<?php echo siteInfo("siteUrlEcokaishu"); ?>" title="エコ回収"><span class="label">エコ回収</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlEcoauc"); ?>" title="エコオク"><span class="label">エコオク</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlRshop"); ?>" title="リサイクルショップ"><span class="label">リサイクルショップ</span></a></li>
					<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>" title="会員登録"><span class="label">会員登録</span></a></li>
					</ul>
				</div>
			</div>
		<!--#headerInfo--></div>
		<nav id="headerFixed">
			<div class="container">
				<div class="twocol col" id="siteName">
					<a href="<?php echo siteInfo("rootUrl"); ?>">エコ回収</a>
				</div>
				<div class="tencol col last" id="siteMenu">
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


	<article class="<?php echo getArticleClass($tempType, $metaObj);?>"<?php echo getArticleId($tempType, $metaObj); ?>>
