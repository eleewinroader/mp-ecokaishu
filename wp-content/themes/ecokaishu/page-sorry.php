<?php
/*
* ヘッダー
*/

//function読み込み
include($_SERVER["DOCUMENT_ROOT"]."/inc/functions.php");
?>

<!doctype html>
<html lang="jp">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" />
<title>エコオクリニューアルに伴うサービス一時停止のお知らせ</title>
<link href='http://fonts.googleapis.com/css?family=Orbitron:400,900' rel='stylesheet' type='text/css'>
<style>
html, body{
	margin: 0;
	width: 100%;
	height: 100%;
	background: rgb(0,158,161); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMwMDllYTEiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjMDBkNmNmIiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L3JhZGlhbEdyYWRpZW50PgogIDxyZWN0IHg9Ii01MCIgeT0iLTUwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-radial-gradient(center, ellipse cover,  rgba(0,158,161,1) 0%, rgba(0,214,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(0,158,161,1)), color-stop(100%,rgba(0,214,207,1))); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(0,158,161,1) 0%,rgba(0,214,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(0,158,161,1) 0%,rgba(0,214,207,1) 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(0,158,161,1) 0%,rgba(0,214,207,1) 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(0,158,161,1) 0%,rgba(0,214,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#009ea1', endColorstr='#00d6cf',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
	font-family: Meiryo, "メイリオ", "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "ＭＳ Ｐゴシック", Verdana, Geneva, Arial, Helvetica;
	color: #ffffff;
	text-shadow: 0 0 1px #007173;
	font-size: 16px;
	line-height: 1.5em;
}
@font-face {
	font-family: 'icomoon';
	src:url('http://www.eco-land.jp/fonts/icomoon.eot');
	src:url('http://www.eco-land.jp/fonts/icomoon.eot?#iefix') format('embedded-opentype'),
		url('http://www.eco-land.jp/fonts/icomoon.woff') format('woff'),
		url('http://www.eco-land.jp/fonts/icomoon.ttf') format('truetype'),
		url('http://www.eco-land.jp/fonts/icomoon.svg#icomoon') format('svg');
	font-weight: normal;
	font-style: normal;
}
[data-icon]:before {
	font-family: 'icomoon';
	content: attr(data-icon);
	speak: none;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.icon-logo, .icon-ecoauc{
	font-family: 'icomoon';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	-webkit-font-smoothing: antialiased;
}
.icon-logo:before{
	content: "\e005";
	font-size: 240px;
	line-height: 200px;
}
.icon-ecoauc:before {
	content: "\e001";
	font-size: 120px;
	line-height: 100px;
}
#msg{
	overflow: hidden;
	width: 100%;
	max-width: 100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	position: absolute;
	top: 10%;
	text-align: center;
	padding: 10px;
}
h1{
	margin: 0;
	font-size: 300%;
	line-height: 1.1em;
	font-family: 'Orbitron', sans-serif;
	font-weight: normal;
}
h2{
	font-size: 160%;
	line-height: 1.1em;
}
.date{
	margin-top: 1.0rem;
	font-size: 200%;
	line-height: 1.1em;
	font-family: 'Orbitron', sans-serif;
}

@media only screen and (min-width: 741px) {
	
	#msg{
		position: relative;
		display: block;
		margin: 0 auto;
		width: 740px;
		max-width: 740px;
	}

}

</style>
</head>
<body>

<div id="msg">
	<span class="icon-logo"></span>
	<h1>UNDER CONSTRUCTION</h1>
	<p class="date">~2014.4.21. 9:00</p class="date">
	<h2>ただ今、メンテナンス中です。</h2>
	<p>システムメンテナンスのため、4月21日（月）9:00（予定）、ウェブサービスを一時停止しております。
ご利用の皆さまにはご迷惑をおかけしますが、今しばらくお待ち下さい。</p>
	<p>ご不便とご迷惑をおかけ致しますが、<br />何とぞご理解とご協力のほどよろしくお願い致します。</p>
</div>


</body>
</html>