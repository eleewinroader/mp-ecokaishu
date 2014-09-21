<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 1.0
*/
get_header( ); ?>

	<h2>不用品回収の前に「エコ回収」</h2>

	<div class="container">

		<div class="twelvecol col last">
		<div class="liquidLayout">

			<div class="item" id="sliderCampaignNews">

				<section>
					<h3>ただ今進行中のキャンペーン</h3>
					<div id="owl-slide" class="owl-carousel owl-theme">
						<?php
						$args = array(
							"post_type" => "campaign",
							"campaignstatus" => "open"
						);
						$posts = query_posts($args);
						foreach($posts as $post): ?>
							<div id="<?php echo campCode($post, "children"); ?>">
								<a class="mainVisual" href="<?php echo get_permalink($post->ID); ?>">
									<div class="campVisual">
										<h4><?php echo $post->post_title; ?></h4>
										<?php echo $post->post_content; ?>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					<!-- #owl-slide--></div>
				</section>

				<section id="news">
					<h3>お知らせ</h3>
					<ul>
						<?php
						$args = array(
							"post_type" => "notices",
							"posts_per_page" => 5
						);
						$posts = query_posts($args);
						foreach($posts as $post){
							$li = "<li><a href=".get_permalink($post->ID)."><time datetime=".$post->post_date.">".get_the_date("y.m.d")."</time>";
							$tags = get_the_tags(); 
							if ($tags) foreach($tags as $tag) $li .= '<span class="tag">'.$tag->name.'</span>';
							$li .= '<span class="newsTxt">'.$post->post_title.'</span></a></li>';
							echo $li;
						}?>
					</ul>
					<div class="clear"></div>
				</section>

			<!-- #sliderCampaignNews--></div>

			<section id="indexs" class="item">
				<h3>メニュー</h3>
				<ul class="listBtn">
					<li>
						<a href="<?php echo siteInfo("rootUrl"); ?>/estimate/" id="estimate">
							<span class="icon-shipping"></span>
							<span class="indexTitle"><span class="block">かんたん</span><span class="block">見積依頼</span></span>
						</a>
					</li>
					<li>
						<a href="<?php echo siteInfo("rootUrl"); ?>/contact/" id="contact">
							<span class="icon-question2"></span>
							<span class="indexTitle">お問い合わせ</span>
						</a>
					</li>
					<li>
						<a href="tel:0120530<?php echo telNum(); ?>" id="tel" onclick="ga('send', 'event', 'tel', '発信', 'TOP', 1, {'nonInteraction': 1});">
							<span class="icon-phone"></span>
							<span class="indexTitle">0120<span class="block">530-<?php echo telNum(); ?></span></span>
						</a>
					</li>
				</ul>
			<!--#indexs--></section>

			<div class="bnr" id="problems">

				<div class="item">
					<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
				</div>

				<div class="item">
					<a href="<?php echo get_permalink(4141); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/campaign/0000/03_bnr_640x260.gif" alt="早割ページへ" /></a>
				</div>

			</div>

		<!--<aside class="item" id="shortcuts">
			<h3>エコランドにご相談してください!</h3>
			<ul class="listBtn">
				<li>
					<a href="<?php echo siteInfo("rootUrl"); ?>/estimate/" id="estimate">
						<span class="icon-shipping"></span>
						<span class="indexTitle"><span class="block">かんたん</span><span class="block">見積依頼</span></span>
					</a>
				</li>
				<li>
					<a href="<?php echo siteInfo("rootUrl"); ?>/contact/" id="contact">
						<span class="icon-question2"></span>
						<span class="indexTitle">お問い合わせ</span>
					</a>
				</li>
				<li>
					<a href="tel:0120530<?php echo telNum(); ?>" id="tel" onclick="ga('send', 'event', 'tel', '発信', 'TOP', 1, {'nonInteraction': 1});">
						<span class="icon-phone"></span>
						<span class="indexTitle">0120<span class="block">530-<?php echo telNum(); ?></span></span>
					</a>
				</li>
			</ul>
		<!-- #shorcuts</aside>-->

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<section class="behind">
					<h3>ただ今の「訳あり」割引</h3>
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
				</section>
			<?php endif; ?>

			<section id="reservCalendar" class="item">
				<div id="contentsCalendar" class="itemContents">
					<h3>予約状況</h3>
					<ul>
						<li><span class="icon-happy"></span>予約可</li>
						<li><span class="icon-sad"></span>やや混雑</li>
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
					$day   = substr($ymd, 6, 2); 
					$month = sprintf("%01d", $month);
					$day   = sprintf("%01d", $day);

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
							$t = $n2.".".$k2;

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

			<section class="item" id="faq">
				<div class="itemContents">
					<h3>よくある質問</h3>
					<ul>
					<?php
					$terms = array(
						"エコ回収品について",
						"エコ回収できるモノ/できないモノ",
						"エコ回収作業について",
						"お申し込みについて",
						"料金について"
					);
					for($i=0; $i<count($terms); $i++) echo '<li><a href="'.get_post_type_archive_link("faq").'#faq'.$i.'"><span class="txt"> '.$terms[$i].'</span></a></li>';
					?>
					</ul>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/home/icon_faq.png" alt="" id="faqIcon" />
				</div>
			<!--#faq--></section>
			
			<section class="item voices">
				<h3><span class="voicesTag">受付STAFFについて</span><span class="voicesInfo">神奈川県 20代 男性 </span></h3>
				<p class="voicesContents"><strong>荷物量の説明等を１回で適切に理解</strong>してもらえたことや<strong>買い取りやリサイクルの仕組みを分かり易く説明</strong>してくれたこと、<strong>電話をかける時間帯への配慮や気遣い</strong>ががあったことよかったです。</p>
			</section>
			<section class="item voices">
				<h3><span class="voicesTag">受付STAFFについて</span><span class="voicesInfo">千葉県 30代 女性 </span></h3>
				<p class="voicesContents">いわゆるコールセンターなどのマニュアル的な感じでなく、<strong>人柄のよいかんじ</strong>が伝わってきました。とても<strong>安心</strong>できたし、<strong>親しみ</strong>がもてました。</p>
			</section>
			<section class="item voices">
				<h3><span class="voicesTag">集荷STAFFについて</span><span class="voicesInfo">千葉県 30代 女性 </span></h3>
				<p class="voicesContents">とても、<strong>感じのよい明るさ</strong>と<strong>清潔な印象</strong>のスタッフさんでした。なんだか、<strong>お仕事への誇り</strong>も感じられました。きっとよい会社なのだろうな〜と想像させる方でした。エコランドさんにお願いしてよかった！と心から思いました。</p>
			</section>
			<section class="item voices">
				<h3><span class="voicesTag">集荷STAFFについて</span><span class="voicesInfo">東京都 40代 男性</span></h3>
				<p class="voicesContents"> <strong>女性の方も来てくれた</strong>ので、<strgon>安心</strgon>できました。妻は女性の方が一人でも来てくれたほうが、安心できるらしい。いろいろと女性ならではの、気配りができるからだと言っています。</p>
			</section>

			<!--<section class="item" id="news">
				<div class="itemContents">
					<h3>新着情報&お知らせ</h3>
					<ul class="news">
					<?php
					$args = array(
						"posts_per_page" => 5,
						"post_type" => array("notices"),
					);
					$posts = query_posts($args);
					foreach($posts as $post){
						$li = "<li><a href=".get_permalink($post->ID)."><time datetime=".$post->post_date.">".get_the_date("y.m.d")."</time>";
						$tags = get_the_tags(); 
						if ($tags) foreach($tags as $tag) $li .= '<span class="tag">'.$tag->name.'</span>';
						$li .= '<span class="newsTxt">'.$post->post_title.'</span></a></li>';
						echo $li;
					}?>
					</ul>
				</div>
			<!--#news</section>-->

			<div class="item webservices" id="movie">
				<div class="movie-container">
				<iframe width="1140" height="641" src="//www.youtube.com/embed/wbIak1kRaKg" frameborder="0" allowfullscreen></iframe>
				 #movie .movie-container</div>
			<!--youtube--></div>

			<div class="item webservices" id="twitter">
				<a class="twitter-timeline" href="https://twitter.com/eco_land" data-widget-id="476567348233506816">@eco_land からのツイート</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<!--twitter--></div>

			<div class="item webservices" id="facebook">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fecoland.jp&amp;width=420&amp;height=400&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=true&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:400px;" allowtransparency="true"></iframe>
			<!--facebook--></div>

		<!-- .liquidLayout--></div>
		</div>

	<!-- .container--></div>

<?php get_footer(); ?>
