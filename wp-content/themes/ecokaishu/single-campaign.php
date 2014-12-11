<?php
/*
* @package Montser Platform
*/

$postType = get_post_type_object(get_post_type());
get_header( );?>
	
	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<div class="twelvecol col last">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title"><?php echo bloginfo("site_name"); ?>TOP</span>
						</a> 
					</div>
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo get_post_type_archive_link($postType->name); ?>" itemprop="url">
							<span itemprop="title"><?php echo $postType->label; ?></span>
						</a> 
					</div>
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo get_permalink($post->ID) ?>" itemprop="url">
							<span itemprop="title"><?php the_title(); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php the_title(); ?></h2>
		</div>
	<!--.headerPage--></header>

		<div class="campIntro">

			<div class="container">
				<div class="twelvecol col last">
					<div class="mainVisual">
						<?php if(have_posts()): while(have_posts()): the_post(); ?>
							<div class="campVisual">
								<?php if(!is_single(4141)): ?>
									<?php the_content(); ?>
								<?php else:
									$got_manth = date("n", mktime(0, 0, 0, date("n"), date("d")+14, date("Y")));
									$got_day   = date("j", mktime(0, 0, 0, date("n"), date("j")+14, date("Y")));
									?>
									<div id="appealTitle">
										<p><span class="leftTitle">EARLY</span><span class="rightTitle">エコ回収</span></p>
									</div>
									<div id="dates">
										<p><span class="date"><span class="dateIn"><?php echo $got_manth ; ?></span></span><span class="date"><span class="dateIn">月</span></span><span class="date"><span class="dateIn"><?php echo $got_day; ?></span></span><span class="date"><span class="dateIn">日</span></span><span class="date" id="dateAfter"><span class="dateIn">以降</span></span></p>
									</div>
									<div id="discount">
										<p><span class="block">基本料金</span><span class="block mincho off">30%OFF</span></p>
									</div>
								<?php endif; ?>
							</div>

						<?php endwhile; endif; ?>
					<!-- .campIntro  .mainVisual--></div>
				<!-- .campIntro  .col--></div>
			<!-- .campIntro  .container--></div>

			<?php if(campCode($post, "children", "") == "camp1407-00"): ?>

				<div id="appealItems">
					<div class="container">
						<div id="timeline" class="sixcol col">
							<a width="100%" data-theme="light" class="twitter-timeline" href="https://twitter.com/hashtag/%E3%82%A8%E3%82%B3%E3%83%A9%E3%83%B3%E3%83%89" data-widget-id="483428412866830337" data-chrome="noborders transparent" data-related="eco_land">#エコランド Tweets</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
						<div class="sixcol col last" id="welcome">
							<div id="btns">
								<p><span class="block">まだエコランド会員でない方は</span><span class="block">こちらから登録(無料)できます！</span></p>
								<a href="">エコランド会員とは？</a>
							</div>
							<img src="<?php echo get_bloginfo("template_url"); ?>/assets/img/campaign/1407/00_welcome_icon.png" alt="" id="ecolin" />
						</div>
					<!-- #appealItems .container--></div>
				<!-- #appealItems--></div>

			<?php endif; ?>

			<?php
			if(is_single(4068)):
			$convSales = convSale();
			if($convSales): ?>
				<section class="contents" id="convenience">
					<div class="container">
						<h3>割引対象地域と日付</h3>
						<ol>
							<?php
							$i = 1;
							$count = count($convSales);
							$col = 12 / $count;
							foreach($convSales  as $convSale):
								if($i == ($count)) $last = " last"; ?>
								<li class="case col <?php echo numToStr($col)."col".$last; ?>">
									<div class="info">
										<h4>
											<span class="block"><?php echo $convSale->area; ?></span>
											<span class="block"><?php echo $convSale->month."月".$convSale->day."日"; ?></span>
										</h4>
										<?php echo $convSale->details; ?>
									</div>
								</li>
								<?php $i++; ?>
							<?php endforeach; ?>
						</ol>
					<!--#convenience .container --></div>
				<!--#convenience --></section>
			<?php endif; endif; ?>

			<?php 
			$tags = get_the_terms($post->ID, "campaignstatus");
			if(!$tags){
				$campArchiveLink = get_post_type_archive_link("campaign"); 
				$endstring = <<<EOF
<div class="contents end">
	<div class="container">
	<div class="twelvecol col last">
	</div>
		<p>本キャンペーンは<span class="yellow">大好評につき終了</span>いたしました。</p>
		<p>多くのご利用をいただき、誠にありがとうございました。</p>
		<p>ただいま進行中の<a href="{$campArchiveLink}" class="link">キャンペーン一覧</a></p>
	</div>
</div>
EOF;
				echo $endstring;
			}?>

			<?php
			$campInfo01 = get_post_meta($post->ID, "campInfo01", TRUE);
			$campInfo02 = get_post_meta($post->ID, "campInfo02", TRUE);
			$campInfo03 = get_post_meta($post->ID, "campInfo03", TRUE);
			$campInfo04 = get_post_meta($post->ID, "campInfo04", TRUE);
			$campInfo05 = get_post_meta($post->ID, "campInfo05", TRUE);
			if(!$convSales){
				$campInfo06 = get_post_meta($post->ID, "campInfo06", TRUE);
			}else{
				$campInfo06 .= "<p>";
				foreach($convSales  as $convSale){
					$campInfo06 .= '<span class="block">'.$convSale->area."にお住まいの方で、".$convSale->month."月".$convSale->day."日にエコ回収をご依頼していただいた方</span>";
				}
				$campInfo06 .= "</p>";
			}
			$campInfo07 = get_post_meta($post->ID, "campInfo07", TRUE);
			$campInfo08 = get_post_meta($post->ID, "campInfo08", TRUE);
			echo '<section class="contents details"><div class="container"><div class="twelvecol col last">';
			echo "<h3>".get_the_title($post->ID)."のご案内</h3>";
			if($campInfo03) echo '<div class="expl">'.$campInfo03.'</div>';
			echo "<table><tbody>";
			if($campInfo02) echo "<tr><th>キャンペーン名</th><td>".$campInfo02."</td></tr>";
			if($campInfo04){
				echo "<tr><th>期間</th><td>".$campInfo04;
				if($campInfo05) echo "~".$campInfo05;
				echo "</td></tr>";
			}
			if($campInfo06) echo "<tr><th>対象</th><td>".$campInfo06."</td></tr>";
			if($campInfo07) echo "<tr><th>内容</th><td>".$campInfo07.'<div class="clear"></div></td></tr>';
			echo "</tbody></table>";
			if($campInfo08) echo '<div class="footnote">'.$campInfo08.'</div>';
			echo "</div></div></section>";
			?>
			<!-- .campIntro #details -->

		<!-- .campIntro --></div>

		<?php
		
		$campFlowInfo01 = getMetaArr($post, "campFlowInfo01");
		$campFlowInfo02 = getMetaArr($post, "campFlowInfo02");

		$length = count($campFlowInfo01);
		if($length > 1): 

			$num = 12 / $length;

			switch ($num) {
				case '3':
					$class = "threecol";
					break;
				case '4':
					$class = "fourcol";
					break;
				default:
					$class = "";
					break;
			}?>

			<section class="contents campFlow" >
				<div class="obj"><span>FLOW</span></div>
				<div class="container">
				<div class="twelvecol col last">
					<h3>申込から引取までの流れ</h3>
					<p class="al_c">WEBからお申し込みをするだけで、その後はエコランドの専門スタッフに全部お任せください！</p>
				</div>
				<ul class="twelvecol col last">
				<?php
				for($i=0; $i<$length; $i++){
					$args = array(
						"post_type" => "flow",
						"page_id" => $campFlowInfo01[$i]
					);
					$flows = query_posts($args);
					foreach($flows as $flow){
						$j = 0;
						$flowInfo01 = getMetaArr($flow, "flowInfo01");
						$flowInfo03 = getMetaArr($flow, "flowInfo03");
						$flowInfo04 = getMetaArr($flow, "flowInfo04");
						echo '<li class="'.$class.'">';
						echo '<span class="'.$flowInfo04[$j].' icon"></span>';
						echo '<p class="title">'.$flowInfo01[$j].'</p>';
						echo '<p class="txt">'.$flowInfo03[$j].'</p>';
						echo '</li>';
						$j++;
					}
				}?>
				</ul>
				</div>
			<!-- .flow --></section>
		<?php endif; ?>

		<?php
		$args = array(
			"post_type" => "voices",
			"order" => ASC,
			"orderby" => date,
			"tax_query" => array(
				array(
					"taxonomy" => "campcode",
					"field" => "slug",
					"terms" => campCode($post),
				)
			)
		);
		$voices = query_posts($args);
		if($voices): ?>
			<section class="contents voices">
				<div class="obj"><span>VOICES</span></div>
				<div class="container">
				<h3>お客様から嬉しい声</h3>
				<p class="al_c">「<?php echo get_the_title($post->ID); ?>」を利用したお客様からうれしい声が届いています！</p>
				<?php
				foreach($voices as $voice):

					//get cstm info
					$name = get_post_meta($voice->ID, "voiceInfo06", TRUE);
					$cstmImg = get_post_meta($voice->ID, "voiceInfo01");
					$cstmsexs = get_the_terms($voice->ID, 'cstmsex');
					foreach($cstmsexs as $cstmsex) $sex = $cstmsex->name;
					$cltareas = get_the_terms($voice->ID, 'cltarea');
					foreach($cltareas as $cltarea){
						if($cltarea->parent == 0) $pref = $cltarea->name;
						else $city = $cltarea->name;
					}
					$cstmages = get_the_terms($voice->ID, 'cstmage');
					foreach($cstmages as $cstmage) $age = $cstmage->name; ?>

					<section class="voice">
						<header class="twelvecol col last">
							<h4><?php echo get_post_meta($voice->ID, "voiceInfo08", TRUE);  ?></h4>
							<p class="al_c"><?php echo $name."様 / ".$pref.$city."在住・".$sex."・".$age; ?> </p>
							<p class="al_c">対象品：<?php echo get_post_meta($voice->ID, "voiceInfo07", TRUE); ?></p>
						</header>
						<?php if($cstmImg): ?>		
						<div class="threecol col flRight al_r">
							<div class="img">
								<?php echo get_attached_img($voice->ID, "voiceInfo01"); ?>
							</div>
						</div>
						<div class="ninecol col last">
						<?php else: ?>
						<div class="twelvecol col last">
						<?php endif; ?>
							<h5>お申し込みになったきっかけは何ですか？</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo02", TRUE); ?>
							<h5>当サービスのよかった点は何ですか？</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo03", TRUE); ?>
							<h5>利用してみたご感想を聞かせてください。</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo04", TRUE); ?>
							<h5>他に要望や改善点があれば教えてください。</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo05", TRUE); ?>
						</div>
					</section>

				<?php endforeach; ?>
				</div>
			<!-- .voices --></section>
		<?php endif; ?>

		<?php echo $endstring; ?>

		<aside class="contents contactBnr">
			<div class="container">
				<div class="twelvecol col last">
					<h3 class="al_l"><?php the_title(); ?>の申込・問合せはお気軽にどうぞ!</h3>
					<?php echo contactBnr(TRUE); ?>
				</div>
			</div>
		</aside>


<?php get_footer(); ?>