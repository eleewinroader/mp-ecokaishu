<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
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
<?php wp_head(); ?>
</script>
</head>
<body>

	<div class="globalnavi" id="ecoland">
		<ul class="twelvecol col last">
			<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>"><span>エコランド</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcookataduke"); ?>"><span>エコランドのお片づけサービス</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcohokan"); ?>"><span>お預かり</span></a></li>
			<li id="currSite"><a href="<?php echo siteInfo("siteUrlEcokaishu"); ?>"><span>エコ回収</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcoauc"); ?>"><span>エコオク</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlRshop"); ?>"><span>エコランドのリサイクルショップ</span></a></li>
		</ul>
	<!-- globalnavi--></div>

	<div id="headerFixed">
		<header class="header">
			<div class="container">
				<div class="sixcol col" id="siteName">
					<h1 id="logo"><a href="<?php echo siteInfo("rootUrl"); ?>">エコ回収</a></h1>
				</div>
				<div class="sixcol col last" id="siteMenu">
					<div class="showBigger" id="contMenu">
						<ul>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/ecokaishu/">エコ回収とは</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/flow/">ご利用の流れ</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/price/">料金案内</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/faq/">よくある質問</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/about/">運営会社</a></li>
							<li><a href="https://twitter.com/eco_land"><span class="icon-twitter3"></span><span class="txt">twitter</span></a></li>
							<li><a href="https://www.facebook.com/ecoland.jp"><span class="icon-facebook3"></span><span class="txt">facebook</span></a></li>
						</ul>
					</div>
					<div class="showSmaller" data-panel="panelMenu" data-content="contMenu" id="menuBtn"><span class="icon-menu2"></span></div>
				</div>
			<!--.header .container --></div>
		<!-- .header --></header>

		<div class="panelCont" id="panelMenu"></div>
		<!--.panelCont-->

	<!--#headerFixed--></div>

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
			if(campCode($post)){ 
				$parentClass = " ".campCode($post, "parent", " ");
				$childrenClass = campCode($post, "children", " ");
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
	
	<?php echo $pr_code; ?>
