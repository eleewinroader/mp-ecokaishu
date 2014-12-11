<?php
/*
* レガシー用ヘッダー
*/
//日本時間設定
date_default_timezone_set("Asia/Tokyo");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="author" href="https://plus.google.com/116236726085502236125">
<link rel="alternate" type="application/rss+xml" title="RSS" href="http://www.eco-kaishu.jp/rss.php">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/lp.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/table.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/decoration.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php bloginfo("template_url"); ?>/assets/js/legacy/analytics.js" async></script>
<!--<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/jquery-1.js"></script>-->
<script type="text/javascript" src="<?php echo siteInfo('rootUrl'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/jquery-ui-1.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/base.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/smartRollover.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/jquery.html5form-1.5-min.js"></script>

<!--[if lt IE 9]><script type="text/javascript" src="http://www.eco-kaishu.jp/js/html5shiv.js"></script><![endif]-->
<!--[if lte IE 7]><script type="text/javascript" src="http://www.eco-kaishu.jp/js/lte-ie7.js"></script><![endif]-->
<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix('.png');
</script>
<![endif]-->

<script type="text/javascript">

	$(document).ready(function(){
		//twocol		
		$(".last").after("<div class='clear'></div>");
	});

// 20140808
// 6サイト共通GA

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-53370589-1', 'auto', {
	'name': 'secondTracker',
	'allowLinker': true
});
ga('secondTracker.require', 'linker');
ga('secondTracker.linker:autoLink', ['eco-land.jp','eco-okataduke.jp','eco-kaishu.jp','eco-auc.jp','kaitori-eco.com']);
ga('secondTracker.send','pageview');

// 20141028
// エコ回収GA

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42854141-2', 'auto');
ga('require', 'displayfeatures');
ga('send', 'pageview');
		
</script>
<?php wp_head(); ?>
</head>

<body class="pr" id="legacy">

<div id="wrapper">