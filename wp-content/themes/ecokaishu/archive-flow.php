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
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" itemprop="url">
							<span itemprop="title"><?php post_type_archive_title(); ?></span>
						</a> 
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h2 class="twelvecol col last"><?php post_type_archive_title(); ?></h2>
		</div>
	<!--.headerPage--></header>

	<div class="container">



		<div class="twelvecol col last" id="intro">
			<div class="summary">
				<div class="container">
					<!--<?php echo getPage("イントロ", "contents"); ?>-->
					<p><span class="block">使わなくなった家電や家具などを、</span><span class="block">１個からでもエコ回収・買取に伺います。</span><span class="block">ご相談・依頼から集荷まで、</span><span class="block">エコ回収の流れをご案内いたします。</span></p>
				</div>
			<!-- .intro .summary--></div>
		<!-- .intro --></div>


		<div class="tabIndex">
			<ul>
				<li class="tabBtn" data-tab="concierge"><span class="block">相談･依頼の流れは</span><span class="here">こちら</span></li>
				<li class="tabBtn" data-tab="ecokaishu"><span class="block">集荷の流れは</span><span class="here">こちら</span></li>
			</ul>
		</div>

		<div class="tabs">

			<div class="tabCont" id="concierge">

				<div class="twelvecol col last al_c">
					<h3>ご依頼・依頼までの流れ</h3>
				</div>

				<section class="contents">
					<div class="twelvecol col last">
						<h4>ご依頼の完了まで確認する事項</h4>
					</div>
					<ol class="listFlow">
						<?php
						$arrs = array("お伺い先確認", "品物確認", "買取確認", "建物確認", "金額提示", "予約希望日時確認", "お客様情報確認", "商品、合計金額再確認");
						for($i=0; $i<count($arrs); $i++){
							if(($i+1) % 4 == 0) $last = " last";
							else $last = "";
							$module = get_page_by_title($arrs[$i], OBJECT, "flow");
							$flowInfo01 = getMetaArr($module, "flowInfo01");
							$flowInfo03 = getMetaArr($module, "flowInfo03");
							$flowInfo04 = getMetaArr($module, "flowInfo04");
							?>
							<li class="threecol col <?php echo $last; ?>">
								<h5><?php echo $flowInfo01[0]; ?></h5>
								<span class="<?php echo $flowInfo04[0]; ?>"></span>
								<?php echo $flowInfo03[0]; ?>
							</li>
						<?php } ?>
					</ol>
				<!--concierge ecokaishu--></section>

				<section class="contents">
					<h4>依頼の前に注意ください！</h4>
					<ul class="listCheck">
						<li>お預かりしたお品物はリユースのため、エコオクというオークションサイトに出品致します。</li>
						<li>お品物追加がある場合は2日前までにご連絡お願い致します。</li>
						<li>お支払いはエコ回収当日現金でお願いしております。</li>
						<li>領収書はお支払いの後、その場でメールにてお送り致します。</li>
						<li>エコ回収当日ご本人様確認を行います。運転免許証や保険証などのご用意をお願い致します。</li>
					</ul>
				<!--concierge listcheck--></section>

			<!--#concierge--></div>

			<div class="tabCont" id="ecokaishu">

				<div class="twelvecol col last al_c visual">
					<h3>5分でわかるエコ回収の流れ</h3>
					<div class="videoWrapper">
					<iframe width="640" height="360" src="//www.youtube.com/embed/bNtnAxpyvaU?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>

				<section class="eightcol col contents">
					<h3>エコ回収当日の流れ</h3>
					<ol class="listFlow" id="ecokaishu">
						<li>
							<h4>事前連絡</h4>
							<p>当日は2度お伺いスタッフからお電話があります。1回目はお伺い予定時間枠(時間指定でご予約頂いた3時間枠、もしくは前日ご案内した3時間枠)の前、２回目は到着の約15分前です。いきなりの訪問は致しませんので、パジャマのままでも、トイレに入っていても安心です。</p>
						</li>
						<li>
							<h4>訪問</h4>
							<p>お伺いしたら、ご挨拶の後、名刺のお渡しがあります。どんなスタッフが引き取ったのか、後からでも確認できるので安心です。</p>
						</li>
						<li>
							<h4>料金確認</h4>
							<p>まずお引取りする品物を確認します。買い取り希望のお品物は、買取査定も同時に行います。内容確認と買取査定が終わったら、最終的な料金をご案内します。</p>
							<p class="footnote"><small>※ 買取希望品の説明書、付属品などがございましたら、一緒にご準備下さい。</small></p>
							<div class="appendix tip">
								<h5>エコ回収がお得にご利用できるコツ</h5>
								<p>エコランド会員様になって頂くと、割引が適応できます。</p>
								<h6>会員登録がお済みの方</h6>
								<p>お申し込み時に、基本料金1,080円割引が適応できます。</p>
								<h6>お申し込み後で、会員登録がお済みでない方</h6>
								<p>お伺い日までに会員登録を済ませ、作業スタート前にマイページをご提示下さい。その場で基本料金から1,080円割引致します。</p>
								<p class="footnote"><small>※ 作業スタート前にご提示頂いた方のみ適応しておりますので、必ずお伺いまでに登録をお済ませ下さい。</small></p>
								<ul class="btns"><li><a href="<?php echo siteInfo("ecolandUrl"); ?>" rel="nofollow" target="_blank">新規会員登録はこちらから</a></li></ul>
							</div>
						</li>
						<li>
							<h4>サービスの案内</h4>
							<p>お客様からエコ回収したお品物は、リユースを目的に、独自のオークションサイト「エコオク」に出品します。そのために、スタッフから3つのご案内がございます。</p>
							<h5>1. エコランド仕組み及びサービスの案内</h5>
							<p>エコランドの仕組みと一緒に、エコオク出品後の流れや、落札確認方法なども、ご案内します。</p>
							<ul class="btns"><li><a href="<?php echo get_post_type_archive_link("ecokaishu"); ?>">エコランドの詳しい仕組みはこちら</a></li></ul>
							<h5>2. 免許証や保険証でご本人様確認</h5>
							<p>古物営業法上、盗品の売買防止のため、本人確認が義務付けられております。生年月日(西暦)、記号番号、ご職業を控えさせて頂きますので、ご了承下さい。</p>
							<div id="listID">
								<h6>ご本人確認に使用できる書類</h6>
								<p>運転免許証 / 国民健康保険被保険者証 / 印鑑証明書ならびに書面に実印押印してもらう / 住民票 / 住民票の記載事項証明書 / 戸籍の謄本若しくは抄本 / パスポート / 官公庁発行書類等で顔写真が貼付されているもの / 学生証 / 住民基本台帳カード(Bタイプ)</p>
							</div>
							<h5>3. エコオク出品に関する規約へ同意</h5>
							<p>エコオク出品に関する規約をお読み頂き、サインを頂きます。</p>
							<ul class="btns">
								<li><a href="<?php echo bloginfo("template_url"); ?>/assets/pdf/承諾書兼本人確認書.pdf">承諾書兼本人確認書の例</a></li>
							</ul>
			
						</li>
						<li>
							<h4>作業前確認</h4>
							<p>お品物運び出しのため、ドアを開放し、ストッパーで固定させて頂きます。開放の際には、必ずお声掛けがございます。トラブルを防ぐため、運び出しの前に、室内の傷の確認をさせて頂きます。</p>
						</li>
						<li>
							<h4>撮影・出品・運び出し</h4>
							<p>エコオクへ出品させて頂くため、お品物の写真撮影を行います。撮影した写真は、直接お客様に確認して頂きます。</p>
							<p>エコオク出品後に、丁寧に運び出しを行います。お品物が大型だった場合、お品物自体に養生をさせて頂きます。</p>
						</li>
						<li>
							<h4>決済</h4>
							<p>作業終了後、お支払いをお願い致します。支払方法は現金払いとクレジットカード払い、2種類がございます。</p>
							<h5>現金払い</h5>
							<p>現金払いの場合、おつりは準備がございますので、ぴったりをご準備頂かなくても大丈夫です。支払い後、その場でスタッフの端末から領収書をメールアドレスに送信致します。</p>
							<h5>クレジットカード払い</h5>
							<p>32,400円以上のお支払いの場合、クレジットカード払いが可能です。</p>
							<ul class="btns">
								<li><a href="<?php echo bloginfo("template_url"); ?>/assets/pdf/集荷明細書.pdf">集荷明細書の例</a></li>
								<li><a href="<?php echo bloginfo("template_url"); ?>/assets/pdf/買取明細書.pdf">買取明細書の例</a></li>
								<li><a href="<?php echo bloginfo("template_url"); ?>/assets/pdf/預かり証兼集荷領収書.pdf">預かり証兼集荷領収書の例</a></li>
							</ul>
						</li>
					</ol>
				</section>

				<div class="fourcol col imgs last contents">
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_01.jpg" alt="" />
						<p>訪問前の事前連絡</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_02.jpg" alt="" />
						<p>到着、名刺のお渡し</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_03.jpg" alt="" />
						<p>商品の確認</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_04.jpg" alt="" />
						<p>料金の確認</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_05.jpg" alt="" />
						<p>エコランドの案内</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_06.jpg" alt="" />
						<p>身分証明書の確認</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_07.jpg" alt="" />
						<p>承諾書の確認</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_08.jpg" alt="" />
						<p>エコオク出品のための撮影・出品</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_09.jpg" alt="" />
						<p>運び出し</p>
					</div>
					<div class="img">
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/flow/ecokaishu_img_10.jpg" alt="" />
						<p>決済</p>
					</div>
				</div>

			<!-- #ecokaishu --></div>

		<!-- .tabs--></div>

	<!--.container--></div>

<?php get_footer(); ?>