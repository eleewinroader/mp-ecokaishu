<?php
/*
* @package Montser Platform
*/
get_header( ); ?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<div class="twelvecol col last">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title"><?php echo bloginfo("site_name"); ?>TOP</span>
						</a>
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last">不用品回収の前に「エコ回収」</h2>
		</div>
	<!--.headerPage--></header>

<div class="container">

	<div class="twelvecol col last">

		<div class="liquidLayout">

			<div class="item" id="sliderCampaignNews">

				<div class="sliderCampaign">
					<div id="owl-slide" class="owl-carousel owl-theme">
						<div class="slider">
							<a href="<?php echo get_post_type_archive_link("price"); ?>">
								<img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/slider_01<?php if(is_smartphone()) echo "_s"; ?>.jpg" alt="エコランドは明朗会計" />
							</a>
						</div>
						<div class="slider">
							<a href="<?php echo get_post_type_archive_link("flow"); ?>#ecokaishu">
								<img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/slider_02<?php if(is_smartphone()) echo "_s"; ?>.jpg" alt="安心・丁寧な作業を常に心がけています" />
							</a>
						</div>
						<!--<div class="slider">
							<a href="<?php echo get_post_type_archive_link("concierge"); ?>">
								<img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/slider_03<?php if(is_smartphone()) echo "_s"; ?>.gif" alt="5分で見積完結【新登場】WEB見積" />
							</a>
						</div>-->
						<?php
						$args = array(
							"post_type" => "campaign",
							"campaignstatus" => "open"
						);
						$posts = query_posts($args);
						foreach($posts as $post): ?>
							<div class="slider" id="<?php echo campCode($post, "children"); ?>">
								<?php if($post->post_title == "早割"):
									$got_manth = date("n", mktime(0, 0, 0, date("n"), date("d")+14, date("Y")));
									$got_day = date("j", mktime(0, 0, 0, date("n"), date("j")+14, date("Y")));?>
									<a class="mainVisual" href="<?php echo get_permalink($post->ID); ?>">
										<div class="campVisual">
											<div id="appealTitle">
												<p><span class="leftTitle">EARLY</span><span class="rightTitle">エコ回収</span></p>
											</div>
											<div id="dates">
												<p><span class="date"><span class="dateIn"><?php echo $got_manth ; ?></span></span><span class="date"><span class="dateIn">月</span></span><span class="date"><span class="dateIn"><?php echo $got_day; ?></span></span><span class="date"><span class="dateIn">日</span></span><span class="date" id="dateAfter"><span class="dateIn">以降</span></span></p>
											</div>
											<div id="discount">
												<p><span class="block">基本料金</span><span class="block mincho off">30%OFF</span></p>
											</div>
										</div>
									</a>
								<?php else: ?>
									<a class="mainVisual" href="<?php echo get_permalink($post->ID); ?>">
										<div class="campVisual">
											<?php echo $post->post_content; ?>
										</div>
									</a>
							<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<!-- #owl-slide--></div>
				</div>

				<?php
				function filter_where( $where = '' ) {
					$where .= " AND post_date > '" . date('Y-m-d', strtotime('-14 days')) . "'";
					return $where;
				}
				add_filter( 'posts_where', 'filter_where' );
				$posts = query_posts(array("post_type" => "notices"));
				if($posts): ?>
					<section id="news">
						<h3>お知らせ</h3>
						<?php
						$listId = (count($posts) > 1) ? "newsTicker" : "";
							echo '<ul id="'.$listId.'">';
							foreach($posts as $post){
								$li = "<li><a href=".get_permalink($post->ID)."><time datetime=".$post->post_date.">".get_the_date("y.m.d")."</time>";
								$tags = get_the_tags();
								if ($tags) foreach($tags as $tag) $li .= '<span class="tag">'.$tag->name.'</span>';
								$li .= '<span class="newsTxt">'.$post->post_title.'</span></a></li>';
								echo $li;
							}
						?>
						</ul>
						<div class="clear"></div>
					</section>
				<?php
				endif;
				remove_filter('posts_where', 'filter_where');
				wp_reset_query();
				?>

			<!-- #sliderCampaignNews--></div>

			<div class="bnr" id="problems">
				<div class="item">
					<a href="<?php echo get_post_type_archive_link("voices"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/bnr_voices.jpg" alt="お客様の声ページへ" /></a>
				</div>
				<div class="item">
					<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
				</div>
				<div class="item">
					<a href="<?php echo get_permalink(4141); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/campaign/0000/03_bnr_640x260.gif" alt="早割ページへ" /></a>
				</div>
			<!--#problems--></div>

			<div class="item btn" id="area">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-search"></span>
					<span class="icon-map3"></span>
					<p><span class="block">対応エリアの</span><span class="block">確認はこちら</span></p>
				</a>
			<!--#area--></div>

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind">
					<ul>
					<?php foreach($convSales  as $convSale): ?>
						<li class="item">
							<a href="<?php echo $convSale->link; ?>" class="itemContents">
								<span class="icon-bullhorn"></span>
								<p class="info">
									<span class="block"><?php echo $convSale->month."月".$convSale->day."日"; ?></span><span class="block"><?php echo $convSale->area; ?></span>
								</p>
								<p class="off">割引CHECK</p>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<section id="reservCalendar" class="item">
				<div id="contentsCalendar" class="itemContents">
					<h3>予約状況</h3>
					<ul>
						<li><span class="icon-truck"></span>予約可</li>
						<li><span class="icon-minus22"></span>やや混雑</li>
					</ul>
					<table>
					<thead><tr>
					<?php
					$today = new DateTime();
					$w = $today->format("w");
					$ymd = $today->format("Ymd");

					//年月日に変数で取得
					$year  = substr($ymd, 0, 4);
					$month = substr($ymd, 4, 2);
					$day = substr($ymd, 6, 2);
					$month = sprintf("%01d", $month);
					$day = sprintf("%01d", $day);

					$table = NULL;

					$j = 0;
					for ($a = 1; $a < 3; $a++){
						for($i = $j; $i < 7*$a; $i++){
							$ymd = getNthDay($year, $month, $day, "+".$j." day");
							$iconClass = getReservInfo($ymd);
							$y = substr($ymd, 0, 4);
							$m = substr($ymd, 4, 2);
							$d = substr($ymd, 6, 2);
							$n = sprintf("%02d", $m);
							$k = sprintf("%02d", $d);
							$n2 = sprintf("%01d", $m);
							$k2 = sprintf("%01d", $d);
							$w = getWeekDay($year, $month, $day, "+".$j." day");
							$t = $n2."/".$k2;

							if (isHoliday($y, $n, $i)) $holidayClass = " holiday";
							else $holidayClass = "";

							if($w == "土" || $w == "日") $holidayClass = " holiday";
							else $holidayClass = "";

							if($j < 7){
								$table0 .= '<th class="'.$iconClass.$holidayClass.'">'.$w.'</th>'.PHP_EOL;
								$table1 .= '<th class="'.$iconClass.$holidayClass.'">'.$t.'</th>'.PHP_EOL;
								$table2 .= '<td class="'.$iconClass.$holidayClass.'"></td>'.PHP_EOL;
							}elseif($j >= 8 || $j < 15){
								$table3 .= '<th class="'.$iconClass.$holidayClass.'">'.$t.'</th>'.PHP_EOL;
								$table4 .= '<td class="'.$iconClass.$holidayClass.'"></td>'.PHP_EOL;

							}
							$j++;
						}
					}
					echo $table0;
					echo "</tr></thead><tbody><tr>";
					echo $table1;
					echo "</tr><tr>";
					echo $table2;
					echo "</tr><tr>";
					echo $table3;
					echo "</tr><tr>";
					echo $table4;
					?>
					</tr>
					</tbody>
					</table>
				</div>
			</section>

			<section class="item" id="movie">
				<div class="itemContents">
					<h3><span class="block">5分でわかる</span>エコ回収の流れ</h3>
					<p>安心のエコ回収。当日の流れを動画で体験してみてください。</p>
					<div class="videoWrapper">
						<iframe width="640" height="360" src="//www.youtube.com/embed/bNtnAxpyvaU?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
				 </div>
			<!--movie--></section>

			<section class="item" id="faq">
				<div class="itemContents">
					<h3>よくある質問</h3>
					<ul>
					<?php
					$terms = array(
						"エコ回収品について",
						"エコ回収できるモノ/できないモノ",
						"エコ回収作業について",
						"買取について",
						"お申し込みについて",
						"料金について"
					);
					for($i=0; $i<count($terms); $i++) echo '<li><a href="'.get_post_type_archive_link("faq").'#faq'.$i.'"><span class="txt"> '.$terms[$i].'</span></a></li>';
					?>
					</ul>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/icon_faq.png" alt="" id="faqIcon" />
				</div>
			<!--#faq--></section>

			<section class="item homeVoice">
				<h3><span class="voicesTag">受付STAFFについて</span><span class="voicesInfo">神奈川県 20代 男性 </span></h3>
				<p class="voicesContents"><strong>荷物量の説明等を１回で適切に理解</strong>してもらえたことや<strong>買い取りやリサイクルの仕組みを分かり易く説明</strong>してくれたこと、<strong>電話をかける時間帯への配慮や気遣い</strong>ががあったことよかったです。</p>
			</section>
			<section class="item homeVoice">
				<h3><span class="voicesTag">受付STAFFについて</span><span class="voicesInfo">千葉県 30代 女性 </span></h3>
				<p class="voicesContents">いわゆるコールセンターなどのマニュアル的な感じでなく、<strong>人柄のよいかんじ</strong>が伝わってきました。とても<strong>安心</strong>できたし、<strong>親しみ</strong>がもてました。</p>
			</section>
			<section class="item homeVoice">
				<h3><span class="voicesTag">集荷STAFFについて</span><span class="voicesInfo">千葉県 30代 女性 </span></h3>
				<p class="voicesContents">とても、<strong>感じのよい明るさ</strong>と<strong>清潔な印象</strong>のスタッフさんでした。なんだか、<strong>お仕事への誇り</strong>も感じられました。きっとよい会社なのだろうな〜と想像させる方でした。エコランドさんにお願いしてよかった！と心から思いました。</p>
			</section>
			<section class="item homeVoice">
				<h3><span class="voicesTag">集荷STAFFについて</span><span class="voicesInfo">東京都 40代 男性</span></h3>
				<p class="voicesContents"> <strong>女性の方も来てくれた</strong>ので、<strgon>安心</strgon>できました。妻は女性の方が一人でも来てくれたほうが、安心できるらしい。いろいろと女性ならではの、気配りができるからだと言っています。</p>
			</section>

			<div class="item webservices" id="twitter">
				<a class="twitter-timeline" href="https://twitter.com/eco_land" data-widget-id="476567348233506816">@eco_land からのツイート</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<!--twitter--></div>

			<div class="item webservices" id="facebook">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fecoland.jp&amp;width=420&amp;height=400&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=true&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:400px;" allowtransparency="true"></iframe>
			<!--facebook--></div>

		</div>
	</div>

	<?php
	$args = array(
		"posts_per_page" => 6,
		"post_type" => "staffwords"
	);
	$words = query_posts($args); // get posts of staffwords posted by the staff

	if($words): ?>	
		<div class="twelvecol col last">
			<section class="lstStaff">
				<h3>ただ今、エコ回収スタッフ</h3>
				<div class="liquidLayout">
					<?php foreach($words as $word): ?>
						<?php $staffImage = get_user_meta($word->post_author, "profileimg", TRUE); ?>	
						<dl class="item">
							<dt><a href="#" class="circleTrimming"><img src="<?php echo $staffImage; ?>" /></a></dt>
							<dd>
								<?php echo $word->post_content; ?>
								<small><?php echo $word->post_date; ?></small>
							</dd>
						</dl>
						
					<?php endforeach;?>
				</div>
			</section>
		</div>
	<?php endif; wp_reset_query();?>

	<div class="twelvecol col last m5_b">
		<section>
		<h3>不用品回収の前に一度エコ回収にご相談ください！</h3>
		<p>東京・千葉・埼玉・神奈川でお引越、買い替え、お片づけに伴う不用品回収をご検討中の方は、ぜひエコランドのエコ回収をご利用ください。エコ回収はお品物ごとに料金が決まっているため、事前にお電話やメールで正確なお見積が可能です。また、1点からでもお引取にお伺い致します。不用品がたくさんある場合は無料で出張見積致します。運び出しが大変なタンスやベッドなどの大型家具や洗濯機や冷蔵庫などのリサイクル家電、電子ピアノやエレクトーンなどの楽器もベテランスタッフが迅速に運び出します。個人情報が心配なパソコンは無料でデータ消去致しますので安心してご依頼ください。
エコ回収は一般的な不用品回収と違い、お引き取りした不用品をゴミとして処分せず、オークション出品することでリユース・リサイクルするサービスです。リサイクルショップも運営しているため、家具・家電などは使用年数や型番などによってはお買取も可能です。処分をご検討される前にお気軽にエコランドにお問い合わせください。</p>
		</section>
	</div>

<!-- .container--></div>



<?php get_footer(); ?>
