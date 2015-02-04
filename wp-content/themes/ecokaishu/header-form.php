<?php
/*
* ヘッダー
*/
//日本時間設定
date_default_timezone_set("Asia/Tokyo");

//csvファイル
$csv = "meta_".siteCode().".csv";

//フォームリンク
if($_GET){
	$pr_code = $_GET['pr_code'];
	if($pr_code) $prCode = "?pr_code=".$pr_code;
}else{
	$prCode = "";
}
$contactForm = siteInfo('siteUrlEcokaishu').'/contact/'.$prCode;
$estmtForm = siteInfo('siteUrlEcokaishu').'/estimate/'.$prCode;

?>
<!doctype html>
<!--[if IE 7 ]> <html lang="jp" class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="jp" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="jp" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="jp"><!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$brow = IEbrowserVer();
if($brow == "msie ie6" || $brow == "msie ie7" || $brow == "msie ie8"){
	echo '<meta http-equiv="refresh" content="0; url=https://www.eco-kaishu.jp/contact-legacy/">';
}?>
<title></title>
<link rel="author" href="https://plus.google.com/116236726085502236125" />
<meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
<link href="<?php echo bloginfo("template_url"); ?>/assets/css/common.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo bloginfo("template_url"); ?>/assets/css/fullwidth.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo bloginfo("template_url"); ?>/assets/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/hot-sneaks/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/development-bundle/ui/i18n/jquery.ui.datepicker-ja.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/base.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/responsiveslides.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/placeholders.min.js"></script>
<script type="text/javascript" src="https://www.eco-kaishu.jp/js/jquery.addInputArea.4.6.js"></script>
<!--[if lte IE 8]><script type="text/javascript" src="'.siteInfo('rootUrl').'/js/html5shiv.js"></script><![endif]-->
<!--[if lte IE 7]><script type="text/javascript" src="'.siteInfo('rootUrl').'/js/lte-ie7.js"></script><![endif]-->
<?php wp_head(); ?>

<script type="text/javascript">

	//スマホアドレスバー非表示
	window.scrollTo(0,1);

	<?php
	if($refererUrl[0] == "http://www.eco-land.jp/lp_c.html") echo 'var link = "'.siteInfo('siteUrlEcoland').'/lp_c.html"';
	else echo 'var link = "'.siteInfo('rootUrl').'"';
	?>

	//WP用パン屑調整
	$(function(){
		$(".bread_crumb").prepend('<li><a href="'+link+'">エコ回収TOP</a></li>');
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
</head>

<body class="fullwidth" id="<?php echo pageCode(); ?>">

<div class="row">
<div class="container">
<!-- end header -->

<div class="main" id="fullwidth">

	<article class="contents">