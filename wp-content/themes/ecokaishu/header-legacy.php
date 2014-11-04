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

<?php get_template_part("ga"); ?>
		
</script>
<?php wp_head(); ?>
</head>

<body class="pr" id="legacy">

<div id="wrapper">