<?php
/*
* @package Montser Platform
*/
get_header( ); ?>

	<?php
	if(campCode($post)){ 
		$childrenClass = campCode($post, "children");
		$pr_code = substr($childrenClass, 7, 11);
		$pr_code = str_replace("-", "_", $pr_code);
		$param = "?pr_code=".$pr_code; 
		if($pr_code == "4_00") $ycoll = "2-1";
	}?>
	
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

		<section class="contents contactBnr">
			<div class="container">
				<div class="twelvecol col last">
					<h3>エコ回収の申込・問合せはお気軽にどうぞ!</h3>
					<?php echo contactBnr(); ?>
				</div>
			</div>
		</section>



		<!--<section class="contents contact">
			<div class="fourcol col">
				<h3>エコランドコンシェルジュご利用案内</h3>
				<p id="openingHour">
					<span class="date">平･土 9:00-22:00</span>
					<span class="date">日･祝 9:00-20:00</span>
				</p>
			</div>
			<div class="fourcol col">
				<a href="tel:0120530<?php echo telNum(); ?>" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});">
					<span class="label block">お急ぎの方はお電話で</span>
					<div class="action">
						<span class="icon-phone"></span>
						<span>0120-530-539</span>
					</div>
				</a>
			</div>
			<div class="fourcol col last">
				<a href="<?php echo siteInfo("rootUrl"); ?>/estimate<?php echo $ycoll; ?>/<?php echo $param; ?>">
					<span class="label block">24時間受付中</span>
					<div class="action">
						<span class="icon-mail4"></span>
						<span>メールで見積依頼</span>
					</div>
				</a>
			</div>
		コンシェルジュご利用の案内</section>-->

		<section class="contents" id="order">
			<div class="twelvecol col last"><h3>新登場！5分で完了、かんたん見積シミュレーション</h3></div>
			<div class="fourcol col" id="features">
				<h4>WEB見積は便利でお得！</h4>
				<ul>
					<li>あっというまの3ステップ</li>
					<li>見積がWEBで完結</li>
					<li>オプション選択も楽々</li>
					<li>そのまま申込みもできる</li>
					<li>会員特典でさらにお得に</li>
				</ul>
				<!--<div id="merits">
					<p><span class="pink b big">100名限定</span>のお試しキャンペーン中！<br />WEB見積からお申込みの方のみ、<span class="big b">基本料金(3,240円)が<span class="b pink big">無料！</span></span></span></p>
				</div>
				<div id="attention">
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/concierge/order_img_01.png" alt="" id="ecolin" />
					<p id="msg" class="big b"><span class="block">100名限定!</span><span class="block">基本料金<span class="big block">無料!!</span></span></p>
				</div>-->
			</div>
			<div class="eightcol col">
				<ol class="steps">
					<li class="step">
						<h4>エコランド会員の方</h4>
						<span class="icon-calculate"></span>
						<p>すでにご登録いただいている方は、エコランド会員MYPAGEにログインしてWEB見積をご利用ください。</p>
						<a href="https://www.eco-land.jp/mypage/login">ログインはこちら</a>
					</li>
					<li class="step">
						<h4>エコランド会員ではない方</h4>
						<span class="icon-signup"></span>
						<p>WEB見積をご利用頂くには会員登録(無料)が必要です。ご登録頂くとオトクな会員特典もご利用頂けます。</p>
						<a href="https://www.eco-land.jp/mypage/entry">会員登録はこちら</a>
					</li>
				</ol>
				<div class="clear"></div>
			</div>
		<!--かんたんシミュレーション--></section>

		<section class="contents" id="orderSteps">
			<div class="twelvecol col last"><h3>WEB見積ご利用の流れ</h3></div>
			<ol class="listFlow">
				<li class="threecol col">
					<h4>建物の条件を入力</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/concierge/orderSteps_img_01.gif" alt="" />
					<p>建物の種類、エレベーターの有無、建物の階数を入力します。</p>
				</li>
				<li class="threecol col">
					<h4>品物の選択・入力</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/concierge/orderSteps_img_02.gif" alt="" />
					<p>品物のカテゴリーを選択して、幅・奥行・高さや数量等の情報を入力します。</p>
				</li>
				<li class="threecol col">
					<h4>オプション選択</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/concierge/orderSteps_img_03.gif" alt="" />
					<p>家具解体や溶解証明等、必要なオプションを選択します。</p>
				</li>
				<li class="threecol col last">
					<h4>料金確認</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/concierge/orderSteps_img_04.gif" alt="" />
					<p>STEP3まで入力できたら、エコ回収時の費用の見積が表示されます。</p>
				</li>
			</ol>
		<!--WEB見積ご利用の流れ--></section>

		<section class="contents" id="helps">
			<div class="sixcol col listPosts" id="faq">
				<h3>よくある質問</h3>
				<a href="<?php echo get_post_type_archive_link("faq"); ?>" class="toAchive">一覧を見る</a>
				<ul class="">
				<?php
				$args = array(
					"post_type" => "faq",
					"qstcat" => "pickup"
				);
				$posts = query_posts($args);
				foreach($posts as $post){
					echo '<li><a href="'.get_post_type_archive_link("faq").'#qst'.$post->ID.'">'.$post->post_title.'</a></li>';
				}?>
				</ul>
			</div>
			<div class="sixcol col listPosts last" id="notices">
				<h3>新着情報</h3>
				<a href="<?php echo get_post_type_archive_link("notices"); ?>" class="toAchive">一覧を見る</a>
				<ul>
				<?php
				$args = array(
					"post_type" => "notices",
					"posts_per_page" => 5
				);
				$posts = query_posts($args);
				foreach($posts as $post){
					echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				}?>
				</ul>
			</div>
		<!--よくある質問--></section>

		<section class="contents" id="services">
			<div class="twelvecol col last"><h3>エコ回収サービス案内</h3></div>
			<ul>
			<li class="twocol col">
				<a href="<?php echo get_post_type_archive_link("ecokaishu"); ?>">
					<span class="icon-ecolandlogo"></span>
					<span class="label">エコ回収とは</span>
				</a>
			</li>
			<li class="twocol col">
				<a href="<?php echo get_post_type_archive_link("flow"); ?>">
					<span class="icon-flow-tree"></span>
					<span class="label">ご利用の流れ</span>
				</a>
			</li>
			<li class="twocol col">
				<a href="<?php echo get_post_type_archive_link("price"); ?>">
					<span class="icon-calculate"></span>
					<span class="label">料金案内</span>
				</a>
			</li>
			<li class="twocol col">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-location"></span>
					<span class="label">対応エリア</span>
				</a>
			</li>
			<li class="twocol col">
				<a href="<?php echo get_post_type_archive_link("staff"); ?>">
					<span class="icon-users"></span>
					<span class="label">STAFF紹介</span>
				</a>
			</li>
			<li class="twocol col last">
				<a href="<?php echo get_post_type_archive_link("about"); ?>">
					<span class="icon-office"></span>
					<span class="label">運営企業</span>
				</a>
			</li>
			</ul>
		<!--サービス案内--></section>

		<section class="contents" id="info">
			<div class="twelvecol col last"><h3>当サイトについて</h3></div>
			<div class="threecol col listPosts">
				<ul>
					<li><a href="<?php echo get_post_type_archive_link("about"); ?>">企業情報</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3252)); ?>">寄付先紹介</a></li>
				</ul>
			</div>
			<div class="threecol col listPosts">
				<ul>
					<li><a href="<?php echo esc_url(get_permalink(3250)); ?>">利用規約</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3248)); ?>">出品禁止商品ガイドライン</a></li>
				</ul>
			</div>
			<div class="threecol col listPosts">
				<ul>
					<li><a href="<?php echo esc_url(get_permalink(3246)); ?>">プライバシーポリシー</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3244)); ?>">個人情報の扱いについて</a></li>
				</ul>
			</div>
			<div class="threecol col last" id="contact">
				<p>ご不明な点やお困りはこちらから</p>
				<a href="<?php echo siteInfo("rootUrl"); ?>/contact">
					<span class="icon-bubbles"></span>
					<span>お問い合わせ</span>
				</a>
			</div>
		<!--当サイトについて--></section>

	<!--.container--></div>

<?php get_footer(); ?>