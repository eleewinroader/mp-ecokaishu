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
				<p><span class="block">創業64年の物流会社、ウインローダー。</span>
				<span class="block">日本に循環型物流を構築すべく、</span>
				<span class="block">日々取り組んでいます。</span></p>
			<!-- .intro .summary--></div>

			<!--<div class="intro"><?php echo getPage("イントロ", "contents"); ?></div>
			<?php echo getPage("エコ回収の流れ", "contents"); ?>-->
		<!--#intro --></div>

		<div class="contents">
		<section id="greetings">
			<div class="twelvecol last">
				<h3>代表者からのメッセージ</h3>
			</div>
			<div class="eightcol col">
				<p>今の日本の廃棄物処理は、ゴミ焼却処理に伴うダイオキシンの発生、不法投棄、最終処分場の逼迫など 様々な問題が山積しています。地球レベルでの環境問題への対応と資源の再利用が声高に叫ばれるように なってきている今、 棄物の再使用・再生・減量をする活動、すなわち「循環型社会」への移行活動が求められているのです。</p>
				<p>日本は戦後、資源が乏しいにも関わらず、「大量生産」、「大量消費」、「大量廃棄」を 繰り返すなかで劇的な経済発展を遂げてきました。今こそ「地球人」の一員として 環境を見つめ直す時期なのです。 日本で本当の「ゼロエミッション」、「資源循環のシステム」が築ければ 他の国々に発信することが出来るのではないかと考えています。</p>
				<p>こういった想いの下、私たちは皆さんのリサイクルのお手伝いをしたいと考え、お客様に 利用してもらいやすいエコサービスを提供しています。そして、ゼロエミッションの実現を私たちがやってみよう！と思っています。そんな思いから日本をエコランドにしたい！と考えるようになりました。</p>
				<p>私たちが取り組んでいるサービスにはエコ回収（お片づけ・回収・買取）、Re-use（エコオク/ リサイクルショップ）、Re-cycle（ZEC）、Re-arise （リアライズ）といったものが あります。 どれだけ再生・再利用を進めようと分別等を行っても現在では限界があります。ただをゼロにしたい！という強い、強い想いがあります。</p>
				<p>「Re-arise」という、廃材に新たなデザインを加えてエコでおしゃれなインテリアに再生する という試みもしています。 ゴミゼロの夢に向かって、様々な新サービスに取り組みたいと考えております。</p>
			</div>
			<div class="fourcol col last" id="ceoProfile">
				<h4>株式会社ウインローダー<span class="block">代表取締役社長 高嶋 民仁</span></h4>
				<dl class="listDefi">
					<dt>1996年</dt><dd>慶応義塾大学 法学部政治学科卒業</dd>
					<dt>1999年</dt><dd>株式会社ウインローダー 取締役 環境事業部長に就任</dd><dd>東京都臨時清掃職員を経験</dd>
					<dt>2000年</dt><dd>米国の廃棄物処理企業にてインターンシップを行う</dd><dd>慶応義塾大学大学院 経営管理研究科入学</dd>
					<dt>2001年</dt><dd>PPR研究会(廃棄物を取り上げている学術研究会)設立に寄与</dd><dd>有限会社リサイクルリンク設立 代表取締役社長</dd>
					<dt>2009年</dt><dd>株式会社ウインローダー 代表取締役社長に就任</dd>
				</dl>
				<!--<img src="<?php echo siteInfo("rootUrl"); ?>/img/<?php echo pageCode(); ?>/ceo.jpg" alt="" id="presImg" width="460px" />-->
			</div>
		<!-- #greetings --></section>
		</div>

		<div class="contents" id="outline">
			<section class="sixcol col">
				<h3>企業概要</h3>
				<dl class="listDefi">
					<dt>商号</dt>
					<dd>株式会社ウインローダー <a href="http://www.winroader.co.jp/" rel="nofollow">コーポレートサイトへ</a></dd>
					<dt>所在地</dt>
					<dd>本社:東京都杉並区上荻2-37-7<br />TEL 03-3390-2161/FAX 03-3301-0481</dd>
					<dt>設　立</dt><dd>昭和25年1月</dd>
					<dt>資本金</dt><dd>5,000万円</dd>
					<dt>役員構成</dt><dd>代表取締役会長 高嶋 民雄/代表取締役社長 高嶋 民仁</dd>
					<dt>支店</dt><dd>東村山センター/昭島センター/西多摩支店/目黒支店</dd>
					<dt>従業員数</dt><dd>149名(平成25年3月現在)</dd>
					<dt>営業種目</dt><dd>一般貨物自動車運送事業/倉庫業/荷造梱包業/家電家具配送設置業/古物の売買業/産業廃棄物収集運搬および処理業/廃品回収リサイクル業/古物商</dd>
					<dt>許認可</dt>
						<dd>
							<dl class="listDefi">
								<dt>産業廃棄物収集運搬</dt>
								<dd>東京都(1310062315号)/神奈川県(1402062315号)/埼玉県(1102062315号)/千葉県(1200062315号)/茨城県(00801062315号)横浜市(5600062315号)/川崎市(5700062315号v/横須賀市(5802062315号)/ 相模原市(09800062315号)/さいたま市(10100062315号)/川越市(10300062315号)/千葉市(5500062315号)/船橋市(1040062315号)</dd>
								<dt>産業廃棄物積替保管</dt>
								<dd>東京都(1310062315号)</dd>
								<dt>産業廃棄物処分</dt>
								<dd>東京都(1310062315号)</dd>
								<dt>古物商</dt>
								<dd>東京都(304438900432号)/神奈川県(452740006573号)</dd>
							</dl>
						</dd>
					</tr>
					<dt>出願中の特許</dt><dd>特願2007-262892号/特願2008-70178号</dd>
					<dt>登録商標</dt><dd>第4889016号/5261337号/5208350号/5152337号/5182861号</dd>
					<dt>保有車輪</dt><dd>大型トラック11台/4tトラック27台/2tトラック52台/1tワゴン・軽自動車8台/フォークリフト14台 (平成25年6月現在)</dd>
					<dt>取引金融機関</dt><dd>三菱東京UFJ銀行/りそな銀行/商工組合中央金庫/日本政策金融公庫</dd>
					<dt>加盟組合</dt><dd>社団法人東京都トラック協会/東京自動車交通共済協同組合</dd>
					<dt>関連会社</dt><dd>株式会社高島商事/株式会社フコク(品川地区)/株式会社NTSロジ(東久留米地区)/株式会社三村運送(渋谷地区)/山手運輸株式会社(神奈川地区)</dd>
				</dl>
			</section>
			<section class="sixcol col last" id="history">
				<h3>ウインローダーのあゆみ</h3>
				<dl>
					<dt>1950</dt>
					<dd>「荻窪小型運送株式会社」として発足</dd>
					<dt>1968</dt><dd>「荻窪高島運送株式会社」に改称</dd>
					<dt>1976</dt><dd>首都圏システム輸送協同組合に加盟／「高島運送株式会社」に改称</dd>
					<dt>1979</dt><dd>初代社長急逝に伴い髙嶋民雄社長に就任</dd>x
					<dt>1984</dt><dd>本社ビル完成</dd>
					<dt>1986</dt><dd>大手路線会社とオンライン化実施／資本金3,000万円に増資</dd>
					<dt>1989</dt><dd>創業40周年CI導入／社名を「株式会社ウインローダー」に改称</dd>
					<dt>1990</dt><dd>葛西物流センター開設</dd>
					<dt>1992</dt><dd>資本金4,000万円に増資／多摩支店拡張改装／新本社ビル完成</dd>
					<dt>1993</dt><dd>西多摩支店新倉庫開設／資本金5,000万円に増資</dd>
					<dt>2001</dt><dd>ISO14001認証取得（本社）／粗大ゴミ収集・運搬・リサイクル・リユース事業参入</dd>
					<dt>2002</dt><dd>ISKコンサルタントによる3Sの実践開始／事業部制導入（輸送、倉庫、エコ事業部）／企画開発課開設／粗大ゴミ受付センター受託／インターン生受入開始</dd>かせオークション」サービスにて提携／海外インターン生受入開始</dd>-->
					<dt>2004</dt><dd>人事課創設／新商品エコランド投入</dd>
					<dt>2005</dt><dd>人事課を人財開発課に組織名称変更／Re-ariseプロジェクト発足／神奈川支店開設／ゼロエミッションセンター設立</dd>
					<dt>2006</dt><dd>ISO14001認証取得（全社）</dd>
					<dt>2007</dt><dd>昭島センター開設／リサイクルショップ開設／中間処理場開設／リユースオークションサービス「エコオク」開設</dd>
					<dt>2008</dt><dd>横浜支店開設</dd>
					<dt>2009</dt><dd>高島民仁 三代目社長に就任／目黒支店開設／Pマーク取得／グッドデザイン賞受賞</dd>
					<dt>2010</dt><dd>ロハスデザイン大賞の「コト」部門で大賞を受賞／本社オフィスリニューアル／営業部創設／エコオクチャリティオークションスタート／東日本大震災に伴う復旧・復興支援活動スタート</dd>
					<dt>2011</dt><dd>昭島センターでのチャリティフリーマーケット開催／物流課と西多摩支店を統合、物流事業部創設／正社員による仙台でのボランティア活動／夢☆感課・昭島センターを物流事業部東村山と統合／ガイアの夜明け出演／コーポレートマネジメント室・広報採用室・エコランド企画室創設</dd>
				</dl>
			</section>
		<!-- #outline --></div>

	<!-- .container--></div>

<?php get_footer(); ?>
