<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
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
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyATFqXgLwOisyrnoSCcXnIE2iG_-C9bmHI&sensor=true"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-42854141-2', 'auto');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. 'inc/tags/ga_common.php'); ?>
<?php wp_head(); ?>
</head>
<body onload="initialize();">

	<div class="globalnavi" id="ecoland">
		<ul class="twelvecol col last">
			<li><a href="<?php echo siteInfo("siteUrlEcoland"); ?>" rel="nofollow"><span>エコランド</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcookataduke"); ?>" rel="nofollow"><span>エコランドのお片づけサービス</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcohokan"); ?>" rel="nofollow"><span>お預かり</span></a></li>
			<li id="currSite"><a href="<?php echo siteInfo("siteUrlEcokaishu"); ?>"><span>エコ回収</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlEcoauc"); ?>" rel="nofollow"><span>エコオク</span></a></li>
			<li><a href="<?php echo siteInfo("siteUrlRshop"); ?>" rel="nofollow"><span>エコランドのリサイクルショップ</span></a></li>
		</ul>
	<!-- globalnavi--></div>

	<div id="headerFixed">
		<header class="header">
			<div class="container">
				<div class="threecol col" id="siteName">
					<h1 id="logo"><a href="<?php echo siteInfo("rootUrl"); ?>"><span class="icon-ecolandlogo"></span>エコ回収</a></h1>
				</div>
				<div class="ninecol col last" id="siteMenu">
					<div class="showBigger" id="contMenu">
						<ul>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/">HOME</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/ecokaishu/">エコ回収とは</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/flow/">ご利用の流れ</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/price/">料金案内</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/faq/">よくある質問</a></li>
							<li><a href="<?php echo siteInfo("rootUrl"); ?>/about/">運営会社</a></li>
							<li><a href="https://twitter.com/eco_land" rel="nofollow"><span class="icon-twitter3"></span><span class="txt">twitter</span></a></li>
							<li><a href="https://www.facebook.com/ecoland.jp" rel="nofollow"><span class="icon-facebook3"></span><span class="txt">facebook</span></a></li>
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
		}elseif(get_post_type() == "area" || get_post_type() == "items"){
			$pageType = "post";
			$parentClass = " achivements";
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
		if(get_post_type() == "area" || get_post_type() == "items"){
			$parentClass = " achivements";
		}
	}elseif(is_archive()){
		$pageType = "archive";
	}elseif(is_home()){
		$pageType = "archive";
		$featureType = "home";
	}?>
	<article class="<?php echo $pageType.$parentClass;?>" id="<?php echo $featureType.$childrenClass; ?>">
	
	<?php echo $pr_code; ?>
