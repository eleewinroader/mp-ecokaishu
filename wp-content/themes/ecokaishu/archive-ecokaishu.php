<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/
get_header( ); ?>

		<h2><?php post_type_archive_title(); ?></h2>

		<div class="container intro">
			<div class="twelvecol last">

				<div class="summary">
					<?php echo getPage("イントロ", "contents"); ?>
				<!-- .intro .summary--></div>

				<div id="flowEcokaishu">
					<span class="icon-dot" id="top"></span>
					<ol>
						<li><span class="icon-cube"></span><span class="txt">ご自宅から、いらなくなったモノが出る。</span></li>
						<li><span class="icon-shipping"></span><span class="txt">エコランドのスタッフがトラックでお伺いして、お引取り。</span></li>
						<li><span class="icon-auction"></span><span class="txt">自社のオークションサイト「エコオク」に出品してリユース</span></li>
						<li><span class="icon-tag2"></span><span class="txt">エコオクで落札がなかったモノは自社のリサイクルショップ・海外でリユース</span></li>
						<li><span class="icon-rotate2"></span><span class="txt">リユースができなかったモノは分別して資源としてリサイクル</span></li>
					</ol>
					<span class="icon-dot" id="bottom"></span>
				<!-- .intro #flowEcokaishu--></div>

			</div>
		</div>

		<section class="contents" id="achive2012">
			<div class="container">

				<h3><span class="bg_pink"><?php echo getPage("2012年のエコ回収実績", "title"); ?></h3>
				
				<div id="graph">
					<p id="reuse">Re-use<span class="per">56.37</span><span class="num">46,076</span></p>
					<p id="recycle">Re-cycle<span class="per">43.63</span><span class="num">35,665</span></p>
				<!-- #archive2012 #graph--></div>
				
				<div id="details">
					<div class="sixcol col" id="reuse">
						<h4>
							<span class="normal">2012年エコ回収品81,741点のうち</span><span class="block"><span class="per">56</span>.37%が</span><span class="b">再使用</span>されました<!--<?php echo getPage("56.37%(46,076点)が再使用されました", "title"); ?>-->
						</h4>
						<?php echo getPage("56.37%(46,076点)が再使用されました。", "contents"); ?>
						<ul>
							<li>
								<h5><span class="block">エコオク出品落札</span><span class="block"><span class="per">4.13%</span><span class="num">3,374点</span></span></h5>
								<?php echo getPage("エコオク出品落札", "contents"); ?>
							</li>
							<li>
								<h5><span class="block">国内リユース</span><span class="block"><span class="per">28.77%</span><span class="num">23,516点</span></span></h5>
								<?php echo getPage("国内リユース", "contents"); ?>
							</li>
							<li>
								<h5><span class="block">海外リユース</span><span class="block"><span class="per">23.47%</span><span class="num">19,186点</span></span></h5>
								<?php echo getPage("海外リユース", "contents"); ?>
							</li>
						</ul>
					</div>
					<div class="sixcol col last" id="recycle">
						<h4><span class="normal">2012年エコ回収品81,741点のうち</span><span class="block"><span class="per">43</span>.63%が</span><span class="b">再資源化</span>されました<!--<?php echo getPage("43.63%(35,665点)が再資源化されました", "title"); ?>--></h4>
						<?php echo getPage("43.63%(35,665点)が再資源化されました。", "contents"); ?>
						<ul>
							<li>
								<h5><?php echo getPage("鉄・布・紙など材料としてリサイクル", "title"); ?></h5>
								<?php echo getPage("鉄・布・紙など材料としてリサイクル", "contents"); ?>
							</li>
						</ul>
					</div>
				<!-- #archive2012 #details--></div>

			<!--#archive2012 .container--></div>
		<!--#archive2012--></section>

		<script type="text/javascript">
			$(function(){
				window.addEventListener("load", function(){
					var canvas = d3.select("#graph");
					var width = 300,
					height = 300,
					radius = Math.min(width, height) / 2;
					var svg = canvas.append("svg")
						.attr("width", width)
						.attr("height", height);
					var dataArr = [
						{name: "reuse", score: 56.37},
						{name: "recycle", score: 43.63}
					];
					var colors = ["#009ea1", "#002949"];
					var pie = d3.layout.pie()
						.startAngle(Math.PI* 2)
						.endAngle(0)
						.value(function(d){return d.score}).sort(null);
					var arc = d3.svg.arc().outerRadius(radius - 10);
					svg.selectAll("path")
						.data(pie(dataArr))
						.enter()
						.append("path")
						.attr("d", arc)
						.attr("fill",function(d,i){return colors[i]})
						.attr("transform", "translate(150,150)");
				},false);
			});
		</script>

<?php get_footer(); ?>