<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
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
	
	<header class="header" id="siteHeader">

		<div id="headerInfo">
			<div class="container">
				<h1 class="sixcol col">h1 tag</h1>
				<div class="sixcol col last">
					<a href="">エコランド</a>
					<a href="">エコオク</a>
					<a href="">会員登録(無料)</a>
				</div>
			</div>
		</div>

		<nav id="headerFixed">
			<div class="container">
				<div class="threecol col" id="siteName">
					<a href="<?php echo siteInfo("rootUrl"); ?>"><span class="icon-ecolandlogo"></span>エコ回収</a>
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
									<li><a href="<?php echo get_post_type_archive_link("items"); ?>">物品別実績</a></li>
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
</div>

				</nav>





			</div>
		</header>

	<?php
	if(is_single()){
		if(get_post_type() == "notices"){
			$pageType = "post";
			$featureType = "notices";
		}elseif(get_post_type() == "area" || get_post_type() == "items"){
			$pageType = "post";
			$parentClass = " achivements";
			$featureType = get_post_type();
		}elseif(get_post_type() == "post"){
			$cat = get_the_category(); 
			$pageType = "post";
			$featureType = $cat[0]->cat_name;
		}elseif(get_post_type() == "columns"){
			$cat = get_the_category(); 
			$pageType = "post";
			$featureType = $cat[0]->slug;
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
