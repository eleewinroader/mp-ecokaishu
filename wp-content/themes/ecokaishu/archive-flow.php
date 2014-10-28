<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/
get_header( ); ?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php post_type_archive_title(); ?></li>
				</ul>
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
					<p><span class="block">使わなくなった家電や家具などを、</span><span class="block">１個からでもエコ回収・買取に伺います。</span><span class="block">ご相談・依頼から集荷まで、エコ回収の流れをご案内いたします。</span></p>
				</div>
			<!-- .intro .summary--></div>
		<!-- .intro --></div>

		<div class="threecol col">　</div>
		<div class="sixcol col">
			<ul class="tabIndex sixcol col">
				<li data-tab="concierge" class="tabBtn"><?php if(is_smartphone()) echo '<a href="#concierge">'; ?>ご相談・依頼までの流れ<?php if(is_smartphone()) echo '</a>'; ?></li>
				<li data-tab="ecokaishu" class="tabBtn"><?php if(is_smartphone()) echo '<a href="#ecokaishu">'; ?>エコ回収当日の流れ<?php if(is_smartphone()) echo '</a>'; ?></li>
			</ul>
		</div>
		<div class="threecol col last">　</div>
		<!-- tabIndex-->

		<div class="tabs">

			<div class="tabCont" id="concierge">

				<!--<div class="twelvecol col last al_c visual contents">
					<h3>ご相談・依頼までの流れ</h3>
					<?php echo getPage("受付の流れ", "contents"); ?>
				</div>-->

				<section class="contents">
					<div class="twelvecol col last">
						<h3>ご依頼の完了まで確認する事項</h3>
					</div>
					<ol class="listFlow">
						<!--<?php
						$arrs = array("対応エリア確認", "品物確認");
						for($i=0; $i<count($arrs); $i++){
							$module = get_page_by_title($arrs[$i], OBJECT, "flow");
							$flowInfo01 = getMetaArr($module, "flowInfo01");
							$flowInfo03 = getMetaArr($module, "flowInfo03");
							$flowInfo04 = getMetaArr($module, "flowInfo04");
							?>
							<li class="threecol col">
								<h4><?php echo $flowInfo01[0]; ?></h4>
								<span class="<?php echo $flowInfo04[0]; ?>"></span>
								<?php echo $flowInfo03[0]; ?>
							</li>
						<?php } ?>-->
						<li class="threecol col">
							<h4>お伺い先確認</h4>
							<span class="icon-location"></span>
							<p>お伺い先のエリアはどちらでしょうか。<br />ご訪問可能なエリアかどうか確認させて頂きます。</p>
							<p class="footnote"><small>※エリアによっては地域料金を頂戴します。</small></p>
						</li>
						<li class="threecol col">
							<h4>品物確認</h4>
							<span class="icon-box2"></span>
							<p>どのようなお品物のお引取をご希望ですか。<br />家具はサイズ、家電は容量などを教えた頂ければより正確なお見積が可能です。</p>
						</li>
						<li class="threecol col">
							<h4>買取確認</h4>
							<span class="icon-tags"></span>
							<p>新品で購入されて5年以内のお品物はございますか。<br />家具や家電は年式・メーカー/ブランド・型番によってはお買取対象になります。</p>
						</li>
						<li class="threecol col last">
							<h4>建物確認</h4>
							<span class="icon-home2"></span>
							<p>お住まいは戸建でしょうか、集合住宅でしょうか。何階にお住まいですか。エレベーターはございますか。<br />階段作業の有無によって料金が異なります。</p>
						</li>
						<li class="threecol col">
							<h4>金額提示</h4>
							<span class="icon-calculate"></span>
							<p>合計の料金は〇〇円になります。<br />まずはお時間帯指定のない場合の料金をご案内します。</p>
						</li>
						<li class="threecol col">
							<h4>予約希望日時確認</h4>
							<span class="icon-calendar3"></span>
							<p>お伺いご希望の日時はお決まりですか。<br />もし料金にご納得頂ける場合はご希望の日時にお伺いが可能かどうか、予約状況を確認いたします。</p>
						</li>
						<li class="threecol col">
							<h4>お客様情報確認</h4>
							<span class="icon-profile"></span>
							<p>ご予約を承りますので、まずお名前をフルネームを教えて頂けますでしょうか。<br />お名前(漢字・フルネーム)、ご連絡先、ご訪問先の住所、メールアドレス(PDFが確認できるもの)をお教えください。</p>
						</li>
						<li class="threecol col last">
							<h4>商品、合計金額再確認</h4>
							<span class="icon-checkmark-circle"></span>
							<p>今回ご依頼のお品物は〇、〇、〇で合計金額は〇〇〇円になります。お支払いは当日現金でお願いしております。領収書はその場でメールにてお送り致します。</p>
						</li>
					</ol>
				<!--concierge ecokaishu--></section>

				<section class="contents">
					<h3>依頼の前に注意ください！</h3>
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

				<div class="twelvecol col last al_c visual contents">
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