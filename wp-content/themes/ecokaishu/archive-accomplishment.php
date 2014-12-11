<?php
/*
* @package Montser Platform
*/
get_header( ); ?>

	<h2>エコ回収の実績</h2>

	<section class="contents" id="">

		<div class="container">
			<h3 class="twelvecol col last">
				<span class="hl1">実績</span>
				<span class="hl2"><span>1</span></span>
				<span class="hl3">ただ今、エコ回収されています。</span>
			</h3>

		<!--#contents .container--></div>

	<!--#contents--></section>


	<section class="contents" id="chart">

		<div class="container">

			<h3 class="twelvecol col last">
				<span class="hl1">実績</span>
				<div class="hl2"><span>2</span></div>
				<span class="hl3">エコ回収10年の歩み</span>
			</h3>

			<div>
				<div class="eightcol">

					<div>
						<h4>年々成長中です。</h4>
						<p>あるいはたとえばご論旨を強いるものはどう高等と与えたので、<br />その通りにはするだてについて釣へ至るていますで。</p>
						<canvas id="lineChart" width="700" height="250">></canvas>
					</div>

					<div id="doughnutCharts">
						<h4>2013年<span id="goodsVal"></span>品のモノをエコ回収しました。</h4>
						<ul>
							<li>
								<canvas id="doughnutChart1" width="130"></canvas>
								<div id="doughnutLegend1"></div>
							</li>
							<li>
								<canvas id="doughnutChart2" width="130"></canvas>
								<div id="doughnutLegend2"></div>
							</li>
							<li>
								<canvas id="doughnutChart3" width="130"></canvas>
								<div id="doughnutLegend3"></div>
							</li>
							<li>
								<canvas id="doughnutChart4" width="130"></canvas>
								<div id="doughnutLegend4"></div>
							</li>
							<li class="last">
								<canvas id="doughnutChart5" width="130"></canvas>
								<div id="doughnutLegend5"></div>
							</li>
						</ul>
					</div>
					<div id="imgCharts">
						<h4>2013年<span id="peopleVal"></span>人がエコ回収を利用しました。</h4>
						<ul class="fivecol col">
							<li>
								<div>女性<span id="femaleVal"></span>％</div>
								<div class="imgPercent"><span id="userFemale"></span></div>
							</li>
							<li>
								<div>男性<span id="maleVal"></span>％</div>
								<div class="imgPercent"><span id="userMale"></span></div>
							</li>
						</ul>
						<ul class="fivecol col">
							<li>
								<div>個人<span id="personVal"></span>％</div>
								<div class="imgPercent"><span id="house1"></span></div>
							</li>
							<li>
								<div>法人<span id="companyVal"></span>％</div>
								<div class="imgPercent"><span id="house2"></span></div>
							</li>
						</ul>
						<div id="japan" class="twocol col last">
							<img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_japan.png" />
							<div>東京<br /><span id="tokyoVal"></span>％</div>
						</div>
					</div>
				</div>
				<div class="fourcol last" id="milestone">
					<ul>
						<li id="case1"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case2"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case3"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case4"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case5"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case6"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
						<li id="case7"><span class="year">2014</span><span>うしたため安危の時その向うはあなたごろ</span></li>
					</ul>
				</div>
				
			</div>

		<!--#chart .container--></div>
	<!--#chart--></section>


	<section class="contents" id="partner">

		<div class="container">
			<h3 class="twelvecol col last">
				<span class="hl1">実績</span>
				<span class="hl2"><span>3</span></span>
				<span class="hl3">大手企業と提携しています</span>
			</h3>
			<div>
				<img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_logo.png" />
			</div>

		<!--#partner .container--></div>

	<!--#partner--></section>


	<section class="contents" id="media">

		<div class="container">
			<h3 class="twelvecol col last">
				<span class="hl1">実績</span>
				<span class="hl2"><span>3</span></span>
				<span class="hl3">様々なメディアに取り上げて頂いています</span>
			</h3>

			<div class="row">

				<div class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_photo1.jpg" /></div>
					<h4>メディアA</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

				<div class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_photo1.jpg" /></div>
					<h4>メディアB</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>
				
				<div class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_photo1.jpg" /></div>
					<h4>メディアC</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>
				
				<div class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/accomplishment/demo_photo1.jpg" /></div>
					<h4>メディアD</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

			</div>

		<!--#media .container--></div>

	<!--#media--></section>



<script type="text/javascript" src="<?php echo bloginfo("template_url"); ?>/assets/js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo("template_url"); ?>/assets/js/chart.js"></script>

<?php get_footer(); ?>