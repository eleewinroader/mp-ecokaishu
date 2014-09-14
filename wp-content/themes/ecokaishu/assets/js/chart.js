// 数値カンマ表示 function　--別になくてもおｋ
//**************************************************************
function addFigure(str) {
	var num = new String(str).replace(/,/g, "");
	while(num != (num = num.replace(/^(-?\d+)(\d{3})/, "$1,$2")));
	return num;
}

// variable settings
//**************************************************************

// color settings
var green = "#009ea1";
var pink = "#e2318c";
var yellow = "#fccb00";
var orange = "#f15b29";
var darkBlue = "#002949";
var darkGray = "#444848";
var gray = "#f0f0f0";
var black = "#000000";
var white = "#ffffff";
var red = "#CD0300";
var blue = "#04278B";
var twitter = "#55acee";
var facebook = "#3b5998";

// text value settings
var goodsVal = 10000; // 000,000品
var peopleVal = 10000; // 000,000人

var femaleVal = 30; // 女性00%
var maleVal = 60; // 男性00%
var personVal = 70; // 個人00%
var companyVal = 100; // 法人00%
var tokyoVal = 40; // 東京00%

// Line chart value settings
var lineVal1 = 10;
var lineVal2 = 20;
var lineVal3 = 30;
var lineVal4 = 40;
var lineVal5 = 50;
var lineVal6 = 60;
var lineVal7 = 70;

// Doughnut chart value settings
// 1
var doughnut1Val1 = 30;
var doughnut1Val2 = 70;
// 2
var doughnut2Val1 = 40;
var doughnut2Val2 = 60;
// 3
var doughnut3Val1 = 50;
var doughnut3Val2 = 50;
// 4
var doughnut4Val1 = 60;
var doughnut4Val2 = 40;
// 5
var doughnut5Val1 = 70;
var doughnut5Val2 = 30;



// value number showing

document.getElementById("goodsVal").innerHTML = addFigure(goodsVal);
document.getElementById("peopleVal").innerHTML = addFigure(peopleVal);

document.getElementById("femaleVal").innerHTML = femaleVal;
document.getElementById("userFemale").style.width = femaleVal + "%";

document.getElementById("maleVal").innerHTML = maleVal;
document.getElementById("userMale").style.width = maleVal + "%";

document.getElementById("personVal").innerHTML = personVal;
document.getElementById("house1").style.width = personVal + "%";

document.getElementById("companyVal").innerHTML = companyVal;
document.getElementById("house2").style.width = companyVal + "%";

document.getElementById("tokyoVal").innerHTML = tokyoVal;




// rumdum --後に削除
var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

//**********************************************************************
// Line chart
//**********************************************************************
var lineChartData = {
	labels : ["2008","2009","2010","2011","2012","2013","2014"],
	datasets : [
		{
			label: "My First dataset",
			// - 線下部の色
			fillColor : "rgba(0,0,0,0.1)",
			// - 線の色
			strokeColor : green,
			// - 点の色
			pointColor : "rgba(0,158,161,1)",
			// - 点の外周の色
			pointStrokeColor : green,
			// - 点 hoverの色
			pointHighlightFill : pink,
			// - 点 hover外周の色
			pointHighlightStroke : "rgba(220,220,220,1)",

			data : [lineVal1,lineVal2,lineVal3,lineVal4,lineVal5,lineVal6,lineVal7]
		}
	]
}

// option
var optionLine = {


	// Boolean - アニメーションの有無
	animation : true,
	// Number - アニメーションの早さ(大きいほど遅い)
	animationSteps : 60,
	// Function - Will fire on animation progression.
	//onAnimationProgress: function(){},
	// Function - アニメーション終了時の処理
	onAnimationComplete : null,
	// String - Animation easing effect
	/*
	linear, easeInQuad, easeOutQuad, easeInOutQuad, easeInCubic, easeOutCubic,
	easeInOutCubic, easeInQuart, easeOutQuart, easeInOutQuart, easeInQuint,
	easeOutQuint, easeInOutQuint, easeInSine, easeOutSine, easeInOutSine,
	easeInExpo, easeOutExpo, easeInOutExpo, easeInCirc, easeOutCirc, easeInOutCirc,
	easeInElastic, easeOutElastic, easeInOutElastic, easeInBack, easeOutBack,
	easeInOutBack, easeInBounce, easeOutBounce, easeInOutBounce
	*/
	animationEasing: "easeOutQuart",

	// Boolean - If we should show the scale at all
	showScale: true,


	//Boolean - 縦軸の目盛りの上書き許可
	scaleOverride : false,
	//** ↑がtrueの場合 **
	//Number - 目盛りの間隔
	scaleSteps : 1,
	//Number - 目盛り区切りの間隔
	scaleStepWidth : 100,
	//Number - 目盛りの最小値
	scaleStartValue : 100,
	//String - 目盛りの線の色 
	//scaleLineColor : "rgba(0,0,0,.1)",
	//Number - 目盛りの線の幅  
	scaleLineWidth : 2,

	//Boolean - 目盛りを表示するかどうか  
	scaleShowLabels : false,


	//String - 目盛りのフォント
	scaleFontFamily : "'Arial'",
	//Number - 目盛りのフォントサイズ 
	scaleFontSize : 20,
	//String - 目盛りのフォントスタイル bold→太字  
	scaleFontStyle : "normal",
	//String - 目盛りのフォントカラー
	scaleFontColor : "#666",


	//Boolean - チャートの背景にグリッドを描画するか
	scaleShowGridLines : true,
	//String - チャート背景のグリッド色
	scaleGridLineColor : "rgba(0,0,0,.05)",
	//Number - チャート背景のグリッドの太さ
	scaleGridLineWidth : 1,


	//Boolean - 線を曲線にするかどうか。falseで折れ線になる
	bezierCurve : false,
	//Boolean - 点を描画するか
	pointDot : true,
	//Number - 点の大きさ
	pointDotRadius : 3,
	//Number - 点の周りの大きさ
	pointDotStrokeWidth : 1,
	//Number - 線の太さ
	datasetStrokeWidth : 3,

	// レスポンシブ対応
	responsive: true

}



//**********************************************************************
// Doughnut chart
//**********************************************************************
// doughnutData1
var doughnutData1 = [
	{
		value: doughnut1Val1,
		color: green,
		highlight: yellow,
		label: "エコ回収"
	},
	{
		value: doughnut2Val1,
		color: "rgba(0,0,0,.3)",
		highlight: yellow,
		label: "粗大ごみ"
	}
];
// doughnutData2
var doughnutData2 = [
	{
		value: doughnut2Val1,
		color: green,
		highlight: yellow,
		label: "エコ回収"
	},
	{
		value: doughnut2Val2,
		color: "rgba(0,0,0,.3)",
		highlight: yellow,
		label: "粗大ごみ"
	}
];
// doughnutData3
var doughnutData3 = [
	{
		value: doughnut3Val1,
		color: green,
		highlight: yellow,
		label: "エコ回収"
	},
	{
		value: doughnut3Val2,
		color: "rgba(0,0,0,.3)",
		highlight: yellow,
		label: "粗大ごみ"
	}
];
// doughnutData4
var doughnutData4 = [
	{
		value: doughnut4Val1,
		color: green,
		highlight: yellow,
		label: "エコ回収"
	},
	{
		value: doughnut4Val2,
		color: "rgba(0,0,0,.3)",
		highlight: yellow,
		label: "粗大ごみ"
	}
];
// doughnutData5
var doughnutData5 = [
	{
		value: doughnut5Val1,
		color: green,
		highlight: yellow,
		label: "エコ回収"
	},
	{
		value: doughnut5Val2,
		color: "rgba(0,0,0,.3)",
		highlight: yellow,
		label: "粗大ごみ"
	}
];

// option
var optionDoughnut = {
	//Boolean - セグメントの枠線の表示
	segmentShowStroke : false,
	//String - セグメントの枠線の色
	//segmentStrokeColor : "#fff",
	//Number - セグメントの枠線の太さ
	//segmentStrokeWidth : 2,
	//Number - 中央の円のカットの大きさ ( パーセント )
	percentageInnerCutout : 70, // This is 0 for Pie charts

	//Boolean - 表示の時のアニメーション
	animation : true,
	//Number - アニメーションの速度 ( ステップ数 )
	animationSteps : 100,
	//String - Animation easing effect
	animationEasing : "easeOutBounce",
	//Boolean - 回転で表示するアニメーションの有無
	animateRotate : true,
	//Boolean - 中央から拡大しながら表示するアニメーションの有無
	animateScale : false,
	// アニメーション終了後に実行する処理
	// animation: false の時にも実行されるようです
	// e.g. onAnimationComplete : function() {alert('complete');}
	onAnimationComplete : null,

	//String - A legend template
	//legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%=segments[i].value%><%}%></li><%}%></ul>"
	legendTemplate : "<%=segments[0].value%>％"

}



//**********************************************************************
// Chart showing
//**********************************************************************
window.onload = function(){

	//jQueryの場合
	//var ctx = $("#chart1").get(0).getContext("2d");
	
	var ctx = []
	ctx[0] = document.getElementById("lineChart").getContext("2d");
	window.myLine = new Chart(ctx[0]).Line(lineChartData, optionLine);

	ctx[1] = document.getElementById("doughnutChart1").getContext("2d");
	window.myDoughnut = new Chart(ctx[1]).Doughnut(doughnutData1, optionDoughnut);
	document.getElementById("doughnutLegend1").innerHTML = myDoughnut.generateLegend();

	ctx[2] = document.getElementById("doughnutChart2").getContext("2d");
	window.myDoughnut = new Chart(ctx[2]).Doughnut(doughnutData2, optionDoughnut);
	document.getElementById("doughnutLegend2").innerHTML = myDoughnut.generateLegend();

	ctx[3] = document.getElementById("doughnutChart3").getContext("2d");
	window.myDoughnut = new Chart(ctx[3]).Doughnut(doughnutData3, optionDoughnut);
	document.getElementById("doughnutLegend3").innerHTML = myDoughnut.generateLegend();

	ctx[4] = document.getElementById("doughnutChart4").getContext("2d");
	window.myDoughnut = new Chart(ctx[4]).Doughnut(doughnutData4, optionDoughnut);
	document.getElementById("doughnutLegend4").innerHTML = myDoughnut.generateLegend();

	ctx[5] = document.getElementById("doughnutChart5").getContext("2d");
	window.myDoughnut = new Chart(ctx[5]).Doughnut(doughnutData5, optionDoughnut);
	document.getElementById("doughnutLegend5").innerHTML = myDoughnut.generateLegend();

}