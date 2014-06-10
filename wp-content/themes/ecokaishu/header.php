<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
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
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/d3.min.js"></script>
<script type="text/javascript" src="//typesquare.com/accessor/script/typesquare.js?Sx8LHUR5fDo%3D" charset="utf-8"></script>
<?php wp_head(); ?>
</script>
</head>
<body>


	<div class="ecolandNavi">
		<ul class="twelvecol col last">
			<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>"><span>エコランド</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcookataduke"); ?>"><span>エコランドのお片づけサービス</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcohokan"); ?>"><span>お預かり</span></a></li>
			<li id="currSite"><a href="<?php echo siteInfo("siteUrlEcokaishu"); ?>"><span>エコ回収</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcoauc"); ?>"><span>エコオク</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlRshop"); ?>"><span>エコランドのリサイクルショップ</span></a></li>
		</ul>
	<!-- ecolandNavi--></div>

	<div id="fixedHeader">

		<header class="siteHeader">
			<div class="container">
				<div class="twocol col" id="siteName">
					<h1 id="logo"><a href="<?php echo siteInfo("rootUrl"); ?>">エコ回収</a></h1>
				</div>
				<div class="sixcol col" id="siteMenu">
					<div class="showBigger" id="contMenu">
						<ul class="gNavi">
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/ecokaishu/">エコ回収とは</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/flow/">ご利用の流れ</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/price/">料金案内</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/contact/">お問い合わせ</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/estimate/">見積依頼</a></li>
						</ul>
					</div>
					<div class="showSmaller" data-panel="panelMenu" data-content="contMenu" id="menuBtn"><span class="icon-menu2"></span></div>
				</div>
				<div class="fourcol col last" id="tel">
					<div class="showBigger" id="contContact">
						<a href="tel:0120530<?php echo telNum("", pageCode(), ""); ?>" class="telBnr">
							<p id="tap">タップしてお気軽に電話ください!</p>
							<p class="telNum">
								<span class="icon-phone"></span>0120-530-<?php echo telNum("", pageCode(), ""); ?>
							</p>
							<p class="openingHour"><span class="block">平･土 9時-22時</span><span class="block">祝･日 9時-20時</span></p>
						</a>
					</div>
					<div class="showSmaller" data-panel="panelContact" data-content="contContact" id="telBtn"><span class="icon-phone"></span></div>
				</div>
			<!--header .container --></div>
		<!-- header --></header>

		<div class="panelCont" id="panelMenu"></div>
		<div class="panelCont" id="panelContact"></div>
		<!--.panelCont-->

	<!--#fixedHeader--></div>

	<?php
	if(is_single()){
		if(get_post_type() == "notices"){
			$pageType = "post";
			$featureType = "notices";
		}elseif(get_post_type() == "post"){
			$cat = get_the_category(); 
			$pageType = "post";
			$featureType = $cat[0]->cat_name;
		}elseif(get_post_type() == "campaign"){
			$pageType = "campaign";
			if(campCode()){ 
				$parentClass = " ".campCode("parent", ",");
				$childrenClass = " ".campCode("children", " ");
			}else{
				$parentClass = NULL;
				$childrenClass = NULL;
			}
		}
	}elseif(is_post_type_archive()){
		$pageType = "archive";
		$featureType = get_post_type();
	}elseif(is_archive()){
		$pageType = "archive";
	}elseif(is_home()){
		$pageType = "archive";
		$featureType = "home";
	}?>
	<article class="<?php echo $pageType.$parentClass;?>" id="<?php echo $featureType.$childrenClass; ?>">
	
