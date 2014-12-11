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

		<section class="contents ecolandStaff" id="concierge">
			<h3 class="twelvecol col last">
				<!--<span class="hl1">エコランド<br />コンシェルジュ</span>-->
				<span class="hl2"><span>STAFF</span></span>
				<span class="hl3">私たちが承ります</span>
			</h3>
			<ol>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_kurahashi.jpg" /></div>
					<h4>倉橋 瑛子<span class="small">くらはし あきこ</span></h4>
					<p>皆様にお悩みを解決するだけでなく、ぜひ、エコ回収を楽しんで頂きたい！そんな想いで、皆様に笑顔をお届けし続けます！☆</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_shinki.jpg" /></div>
					<h4>新木 千晴<span class="small">しんき ちはる</span></h4>
					<p>お客様をイメージして、しっかりコミュニケーションをとることを大切にしています。使わなくなったモノに関してお困りの際は、お気軽にご相談ください。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg" /></div>
					<h4>田野實 温代<span class="small">たのみ あつよ</span></h4>
					<p>『あ、笑顔が見える…』と思って頂けるまごころ対応を心がけています。目指せ神対応！お電話お待ちしています！</p>
				</li>
				<li class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tsutsumiya.jpg" /></div>
					<h4>堤谷 美里<span class="small">つつみや みさと</span></h4>
					<p>お客様に合ったサービスの提案を心がけています！ご相談のみでもお気軽にお電話下さい♪</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_iwasaki.jpg" /></div>
					<h4>岩崎 愛華<span class="small">いわさき あいか</span></h4>
					<p>お使いにならなくなったものについてのお悩み、なんでもご相談ください。お得に手放したい、誰かに使ってほしい。私が叶えます！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_nagahiro.jpg" /></div>
					<h4>永廣 亜沙美<span class="small">ながひろ あさみ</span></h4>
					<p>安心してご利用して頂けるよう、「かゆいところに手が届く」ご案内を心がけています。ぜひ一度お問い合わせください！</p>
				</li>
			</ol>
			<div class="last"></div>
		<!--#staff--></section>

		<section class="contents ecolandStaff" id="collecting">
			<h3 class="twelvecol col last">
				<span class="hl2"><span>STAFF</span></span>
				<span class="hl3">私たちがお伺いします</span>
			</h3>
			<ol>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_ushio.jpg" /></div>
					<h4>潮 恵輔<span class="small">うしお けいすけ</span></h4>
					<p>常に冷静に、常に真摯に、常に誠実に。ニーズの先を読んで、お客様に喜んで頂けるよう頑張ります！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_miyazaki.jpg" /></div>
					<h4>宮崎 美穂<span class="small">みやざき みほ</span></h4>
					<p>エコランドの大和撫子（を目指してる）、宮崎です。お客様の不安な気持ちを丁寧にほどきながら、作業してまいります！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_watanabe.jpg" /></div>
					<h4>渡辺 愛美<span class="small">わたなべ まなみ</span></h4>
					<p>合言葉はLove and Peace☆いつでもどこでもポジティブで、お客様に笑顔になってもらえるよう頑張っています！！</p>
				</li>
				<li class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yanashima.jpg" /></div>
					<h4>梁島 さゆり<span class="small">やなしま さゆり</span></h4>
					<p>152cmだけどパワフル☆お客様のお役に立てる女性ドライバーを目指し日々頑張ってます！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_goto.jpg" /></div>
					<h4>後藤 拓<span class="small">ごとう ひらく</span></h4>
					<p>正確さとスピード感のある作業で、お客様のお役に立てるように心がけてます。継続は力なり！頑張っていきます。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_m.jpg" /></div>
					<h4>星 祐太<span class="small">ほし ゆうた</span></h4>
					<p>さわやか1番！どんなに重い荷物でも、どんなに大きな荷物でも笑顔で運び出します！もちろん、安全安心サービスで！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamashita.jpg" /></div>
					<h4>山下 恭平<span class="small">やました きょうへい</span></h4>
					<p>安全第一をモットーに日々業務にあたっています！重い物や搬出困難な物、安全かつ丁寧に運びます！</p>
				</li>
				<li class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_kaneko.jpg" /></div>
					<h4>金子 拓矢<span class="small">かねこ たくや</span></h4>
					<p>親しみやすさNo.1！わかりやすく最適なお見積りと料金のご提示には自信あり。ご納得の作業を提供いたします</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sasaki.jpg" /></div>
					<h4>佐々木 健<span class="small">ささき たける</span></h4>
					<p>明るく元気で愉快な男、佐々木です。安心できる技術とご相談しやすい雰囲気で、ご満足頂けるサービスを提供して参ります。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sato.jpg" /></div>
					<h4>佐藤 一樹<span class="small">さとう かずき</span></h4>
					<p>笑顔と元気をモットーに、的確な提案、安全で確実な作業を心がけています！ご質問にも丁寧にお答えいたします。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_f.jpg" /></div>
					<h4>星 奈緒美<span class="small">ほし なおみ</span></h4>
					<p>女性ならではの丁寧で繊細な作業をご提供しています。整理収納でお困りのお客様も、ぜひ一度ご利用下さいませ。</p>
				</li>
				<li class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamamoto.jpg" /></div>
					<h4>山本 紘亮<span class="small">やまもと こうすけ</span></h4>
					<p>お客様のご希望・ご要望を丁寧に聞き出しながら、ご満足いただける確実な作業を提供しています。お任せ下さい。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_oomori.jpg" /></div>
					<h4>大森 太一<span class="small">おおもり たいち</span></h4>
					<p>お困り事がございましたら、ご相談下さい。最後までお付き合いさせて頂きます。皆様の笑顔のために頑張ります！</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sanada.jpg" /></div>
					<h4>眞田 清道<span class="small">さなだ きよみち</span></h4>
					<p>お客様にも、お品物にも、作業にも、すべてのものにLove and Passion！おもてなしの心で、常に最高のサービスを。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_okamura.jpg" /></div>
					<h4>岡村 駿太<span class="small">おかむら しゅんた</span></h4>
					<p>お客様のご希望・ご要望を丁寧に聞き出しながら、ご満足いただける確実な作業を提供しています。お任せ下さい。</p>
				</li>
				<li class="col threecol last">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_iwashima.jpg" /></div>
					<h4>岩島 正明<span class="small">いわしま まさあき</span></h4>
					<p>安心・安全をモットーに作業いたします。お預かりしたお品物にお客様のエコの気持ちを添えて、次のお客様の所へお届けします。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_tokura.jpg" /></div>
					<h4>十倉 淳<span class="small">とくら じゅん</span></h4>
					<p>お客様に安心して頂けるよう、笑顔で丁寧な作業を行います。ぜひエコランドをご利用ください。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_shimura.jpg" /></div>
					<h4>志村 昭<span class="small">しむら あきら</span></h4>
					<p>お客様の笑顔が見たいから。お客様に笑顔になってもらえるような、安心の接客を心がけています。</p>
				</li>
				<li class="col threecol">
					<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_murooka.jpg" /></div>
					<h4>室岡 誠<span class="small">むろおか まこと</span></h4>
				</li>
			</ol>
			<div class="last"></div>
		<!--#staff--></section>


	<!--
	<section class="contents" id="vehicle">

		<div class="container">

			<h3 class="twelvecol col last">
				<span class="hl1">エコランド<br />回収車</span>
				<span class="hl2"><span>VEHICLE</span></span>
				<span class="hl3">私たちのトラック</span>
			</h3>

			<div class="row">

				<li class="col threecol">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo2.jpg" /></div>
					<h4>●●t エコトラック</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

				<li class="col threecol">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo2.jpg" /></div>
					<h4>●●t エコトラック</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>
				
				<li class="col threecol">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo2.jpg" /></div>
					<h4>●●t エコトラック</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>
				
				<li class="col threecol last">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo2.jpg" /></div>
					<h4>●●t エコトラック</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

			</div>
		<!--#vehicle .container--></div>
	<!--#vehicle</section>



	<section class="contents" id="uniform">

		<div class="container">

			<h3 class="twelvecol col last">
				<span class="hl1">エコランド<br />ユニフォーム</span>
				<span class="hl2"><span>UNIFORM</span></span>
				<span class="hl3">私たちのユニフォーム</span>
			</h3>

			<div class="row">

				<li class="col threecol">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo3.png" /></div>
				</div>
				<li class="col threecol">
					<h4>エコフリース</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

				<li class="col threecol">
					<div><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/demo_photo3.png" /></div>
				</div>
				<li class="col threecol last">
					<h4>●●t エコトラック</h4>
					<ul>
						<li>そうしたため安危の時その向うは</li>
						<li>あなたごろで行くんかと木下さん</li>
					</ul>
					<p>あるいはたとえばご論旨を強いるものはどう高等と与えだので、その通りにはするだてについて釣へ至るています</p>
				</div>

			</div>
		<!--#uniform .container</div>
	<!--#uniform</section>-->

<?php get_footer(); ?>