<?php
/*
* @package Montser Platform
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/lp.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/table.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/decoration.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo("template_url"); ?>/assets/css/legacy/add.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php bloginfo("template_url"); ?>/assets/js/legacy/analytics.js" async></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/jquery-1.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/jquery-ui-1.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/base.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/assets/js/legacy/smartRollover.js"></script>

<!--[if lt IE 9]><script type="text/javascript" src="http://www.eco-kaishu.jp/js/html5shiv.js"></script><![endif]-->
<!--[if lte IE 7]><script type="text/javascript" src="http://www.eco-kaishu.jp/js/lte-ie7.js"></script><![endif]-->
<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix('.png');
</script>
<![endif]-->

<script type="text/javascript">

	//スマホアドレスバー非表示
	window.scrollTo(0,1);

	//col
	$(function(){
		$(".last").after("<div class='clear'></div>");
	});
		
</script>
<?php wp_head(); ?>
</head>
<body class="pr">

<?php $campId = 4141; ?>
<div id="wrapper">

	<!--[if lt IE 9]>
	<div id="newbrowser">
		<p>お使いのブラウザーは最新バージョンではありません。セキュリティ上、最新ブラウザ(無料)を使用されることを推奨いたします。</p>
		<ul>
			<li><a href="http://goo.gl/IDmyJ" target="_blank">Google Chrome 最新ブラウザー</a></li>
			<li><a href="http://goo.gl/xmEsDL" target="_blank">Mozillar FireFox 最新ブラウザー</a></li>
	</div>
	<![endif]-->

	<div id="header">
		<div id="header_main">
			<h1>エコ回収でリユース＆リサイクルできた品物<span id="badge" class="png">60万個<span class="block">以上</span></span></h1>
			<a href="tel:0120530065"><span class="header_right"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/tel.jpg" alt="0120-530-065 平・土9:00-22:00/祝・日9:00-20:00" /></span></a>
		</div>
	</div><!-- #header end -->

	<div id="main">

		<div class="mainVisual">
			<div class="container">
				<h2><img src="<?php echo bloginfo("template_url"); ?>/assets/img/legacy/top.gif" alt="" /></h2>
			<!-- .campIntro #mainVisual --></div>
		</div>

		<?php
		$campInfo01 = get_post_meta($campId, "campInfo01", TRUE);
		$campInfo02 = get_post_meta($campId, "campInfo02", TRUE);
		$campInfo03 = get_post_meta($campId, "campInfo03", TRUE);
		$campInfo04 = get_post_meta($campId, "campInfo04", TRUE);
		$campInfo05 = get_post_meta($campId, "campInfo05", TRUE);
		$campInfo06 = get_post_meta($campId, "campInfo06", TRUE);
		$campInfo07 = get_post_meta($campId, "campInfo07", TRUE);
		$campInfo08 = get_post_meta($campId, "campInfo08", TRUE);
		?>
		<div id="camp" class="contents">
			<div class="container">
			<div classs="threecol last" id="expl">
				<h2><?php echo $campInfo02; ?>のご案内</h2>
				<?php if($campInfo03) echo $campInfo03; ?>
				<table id="kyan">
					<tbody>
						<?php
						if($campInfo02) echo "<tr><th>キャンペーン名</th><td>".$campInfo02."</td></tr>";
						if($campInfo04){
							echo "<tr><th>期間</th><td>".$campInfo04;
							if($campInfo05) echo "~".$campInfo05;
							echo "</td></tr>";
						}
						if($campInfo06) echo "<tr><th>対象</th><td>".$campInfo06."</td></tr>";
						if($campInfo07) echo "<tr><th>条件</th><td>".$campInfo07.'<div class="clear"></div></td></tr>';
						?>
					</tbody>
				</table>
			</div>
			<!--<div class="onecol last">
				<div id="campImg"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/intro_img_03.png" class="alignright png" /></div>
			</div>--><div class="clear"></div>
			<?php if($campInfo08) echo '<div class="footnote">'.$campInfo08.'</div>'; ?>
			</div>
		</div><!-- #camp -->

		<div class="contents" id="reasons">
			<div class="container">
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/heart.png" alt="" class="png" /></span>エコ回収が<span class="b pink">選ばれる理由</span></h3>
			<div class="twocol1">
				<h4>不用品を出したのに、ちょっと<br /><span class="b">いいことした気分</span>になる</h4><p class="riyu"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/sono1.png" alt="" class="png" /></p>
				<p>大切にしてきたもう使えなくなった、もったいないけどもう使わなくなった…なんらかの理由であなたが手放したそのモノ、誰かに役に立つかもしれません。<b><span class="green">あなたのいらないモノを誰かのいるモノにつなげる仕組みを運営するエコ回収</span></b>だからこそ提供できるサービスなのです。<strong>不用品回収に出す前に、一度<span class="green b">エコ回収にお問い合わせ</span>ください</strong>。</p>
			</div>
			<div class="twocol1 last">
				<h4><span class="b">創業60年を超える物流企業</span><br />だからあんしんできる！</h4><p class="riyu"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/sono2.png" alt="" class="png" /></p>
				<p>エコランドを運営するのは、<b><span class="green">65年の歴史を持つ物流会社「ウインローダー」</span></b>です。昭和25年に「荻窪小型運送株式会社」として発足したウインローダーはお客様に「モノを運ぶ」だけではなく<strong><span class="green">「圧倒的な安心」を提供するために努力</span>してきました。長い間築き上げてきたお客様との信頼を基に、今日も社員一同はゴミのない社会の輪を日本全国に広げています</strong>。</p>
			</div>
			<div class="clear"></div>
			</div>
		</div><!--#reasons-->
		
		<?php
		$contact = '		
		<div class="contact" id="contactBnr">
			<div class="container">
			<div class="twocol" id="cc">
				<div id="contactMsgImg">
					<p id="contactMsg"><img src="'.get_bloginfo("template_url").'/assets/img/legacy/needs.png" alt="" class="png" /></p>
				</div>
				<a id="campMsgImg" href="#camp">
					<p id="campMsg"><img src="'.get_bloginfo("template_url").'/assets/img/legacy/tokuten_off.png" alt="" class="png" /></p>
				</a>
			</div>
			<div class="twocol last" id="btns">
				<a href="tel:0120530065"><img src="'.get_bloginfo("template_url").'/assets/img/legacy/tel_off.png" class="png" /></a>
				<a href="http://www.eco-kaishu.jp/contact-legacy/"><img src="'.get_bloginfo("template_url").'/assets/img/legacy/toiawase_off.png" class="png" /></a>
				<p class="al_c white" id="openHour"><span class="block">営業時間</span>平･土 9:00-22:00 / 祝･日 9:00-20:00</p>
			</div>
			<div class="clear"></div>
			<img src="'.get_bloginfo("template_url").'/assets/img/legacy/contact_img_01.png" alt="" id="contactImg" class="png" />
			</div>
		</div><!--.contact -->';
		echo $contact;
		?>

		<div class="contents" id="voices">
			<div class="container">				
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/bubbles.png" alt="" class="png" /></span>エコ回収を利用した<span class="b pink">お客様からの喜びの声</span></h3>
			<dl>
				<dt >東京都 20代 女性 K.T様</dt>
				<dd class="dd1">当日エコ回収品が４つ追加になりましたが、臨機応変に対応していただけました。</dd>
				<dt>東京都 20代 男性 テツロウ様</dt>
				<dd class="dd2">時間帯の連絡等、こまめな対応があって、安心でした。</dd>
				<dt>東京都 30代 男性 K.T様</dt>
				<dd class="dd3">機敏で、テキパキと仕事をこなし、次回もお願いしたいと感じた。</dd>
				<dt>東京都 50代 男性 yoyo様</dt>
				<dd class="dd4">礼儀正しく、テキパキこなしていただいた。会社の社員に対する教育のよさが伝わってきた。</dd>
				<dt>東京都 30代 女性 かわりえ様</dt>
				<dd class="dd4">他社には嫌な雰囲気を感じましたが、エコランドの方は笑顔で対応してくれて好印象でした！</dd>
				<dt>東京都 20代 女性 K.K様</dt>
				<dd class="dd5">不規則な仕事をしている為、メールでのやり取りとなりましたが、親切に対応していただき、助かりました。</dd>
			</dl>
			<div id="voicesImg">
				<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/voices_img_01.png" alt="" class="png" />
			</div>
			</div>
		</div><!--#voices -->			

  		<div class="contents" id="flow">
			<div class="container">
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/list.png" alt="" class="png" /></span>エコ回収の<span class="b white">安心・信頼の流れ</span></h3>
			<div id="step">
				<div class="fourcol"><ul>STEP1</ul>
					<h4 class="flowStep">見積依頼</h4>
					<div class="content">
						<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/flow_img_01.jpg" alt="">
						<p class="flow_txt">HPで、詳しく料金がわかります。そのままお申し込みもできます。お急ぎの方はコールセンターまでお電話ください。きちんとご料金を案内します。</p>
					</div>
				</div>
				<span class="next"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/next.png" alt="" class="png" /></span>
				<div class="fourcol">
				<ul>STEP2</ul>
					<h4 class="flowStep">集荷</h4>
					<div class="content">
						<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/flow_img_02.jpg" alt="" class="png" />
						<p class="flow_txt">到着前にお電話で確認のうえ、お伺いします。お部屋を傷つけないよう、てきぱきとまとめて運びだします。</p>
					</div>
				</div>
				<span class="next"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/next.png" alt="" class="png" /></span>
				<div class="fourcol">
				<ul>STEP3</ul>
					<h4 class="flowStep">決済</h4>
					<div class="content">
						<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/flow_img_03.jpg" alt="" class="png" />
						<p class="flow_txt">作業終了後、現金またはクレジットカードにてご清算いただきます。お見積額から料金が変わることはありません。</p>
					</div>
				</div>
				<span class="next"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/next.png" alt="" class="png" /></span>
				<div class="fourcol last">
				<ul>STEP4</ul>
					<h4 class="flowStep">キャッシュバック</h4>
					<div class="content">
						<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/flow_img_04.jpg" alt="" class="png" />
						<p class="flow_txt">エコ回収はすべて独自オークション「エコオク」にその場で出品します。落札額の半額がキャッシュバックされるので、お財布に優しい！そして、とってもエコです。</p>
					</div>
				</div><div class="clear"></div>
				</div>
			</div>
		</div><!--#flow-->

  		<div class="contents" id="cost">
			<div class="container">
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/calculate.png" alt="" class="png" /></span>エコ回収の料金は<span class="b pink">明朗・明確</span></h3>
			<div>
				<div class="onecol">
					<h4>料金計算方法(例)</h4>
				</div>
				<div class="threecol last" id="howto">
					<p id="em">エコ回収の料金は、すべてきちんと決まっています。現地にお伺いした際、<span class="underline green"><strong>不当に料金が変わることはありません！</strong></span></p>
				<div class="content clearfix">
						<div class="eqat1"><p class="box">基本料金<span class="block">3,240円</span></p></div>
						<span class="keisan"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/plus.png" alt="" class="png" /></span>
						<div class="eqat1"><p class="box">物品ごとの料金
							<span class="block">洗濯機4,320<span class="small">円</span></span>
							<span class="block">ソファ3,240<span class="small">円</span></span>
						</p></div>
						<span class="keisan"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/plus.png" alt="" class="png" /></span>
						<div class="eqat1"><p class="box">特殊作業料金<span class="block">階段の運びだし1,080<span class="small">円</span></span></p></div>
						<span class="keisan"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/minus.png" alt="" class="png" /></span>
						<div class="eqat1 minus"><p class="box">買取料金<span class="block">冷蔵庫1,000<span class="small">円</span></span></p></div>
						<span class="keisan"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/equal.png" alt="" class="png" /></span>
					<div class="eqat1 sum"><p class="box">合計料金<br /><span class="per">10,550<span class="small">円</span></span></p></div>
					</div>
				</div>
			</div><!-- #cost way-->
			<div>
				<div class="onecol">
					<h4>料金表</h4>
				</div>
				<div class="threecol last">
					<table id="costTableGnr">
						<thead>
							<tr><th class="table_title">品物ランクと料金</th><th class="table_title">縦・横・奥行の合計</th><th class="table_title">重さ</th><th>目安となる品物</th></tr>
						</thead>
						<tbody>
							<tr><th rowspan="2">Aランク<br />540円</th><td>50cm以下</td><td>1kg以下</td><td>サッカーボール</td></tr>
							<tr class="exmp2"><td colspan="3">列:サッカーボール、ビデオカメラ、毛布等</td></tr>
							<tr><th rowspan="2">Bランク<br />1,080円</th><td>90cm以下</td><td>2kg以下</td><td>ダイニングチェア</td></tr>
							<tr class="exmp2"><td colspan="3">列:ダイニングチェア、ノートパソコン、パソコン本体等</td></tr>
							<tr><th rowspan="2">Cランク<br />1,620円</th><td>150cm以下</td><td>5kg以下</td><td>掃除機</td></tr>
							<tr class="exmp2"><td colspan="3">列:掃除機、カラーBOX(3段)、モニタ(液晶/CRT)</td></tr>
							<tr><th rowspan="2">Dランク<br />2,160円</th><td>180cm以下</td><td>10kg以下</td><td>ちゃぶ台</td></tr>
							<tr class="exmp2"><td colspan="3">列:ちゃぶ台、ダイニングテーブル(2人用)</td></tr>
							<tr><th rowspan="2">Eランク<br />2,700円</th><td>210cm以下</td><td>15kg以下</td><td>&nbsp;</td></tr>
							<tr class="exmp2"><td colspan="3">列:ホットカーペット、ステッパー等</td></tr>
							<tr><th rowspan="2">Fランク<br />3,240円</th><td>270cm以下</td><td>20kg以下</td><td>一人がけソファ</td></tr>
							<tr class="exmp2"><td colspan="3">列:一人がけソファ、衣類乾燥機、ベッドフレーム(シングル)等</td></tr>
							<tr><th rowspan="2">Gランク<br />4,320円</th><td>300cm以下</td><td>30kg以下</td><td>自転車</td></tr>
							<tr class="exmp2"><td colspan="3">列:自転車、二人がけソファ、マットレス(シングル)等</td></tr>
							<tr><th rowspan="2">Hランク<br />5,940円</th><td>360cm以下</td><td>40kg以下</td><td>マットレス(ダブル)</td></tr>
							<tr class="exmp2"><td colspan="3">列:マットレス(ダブル)、三人がけソファ等</td></tr>
							<tr><th rowspan="2">Iランク<br />7,560円</th><td>400cm以下</td><td>50kg以下</td><td>コピーボード</td></tr>
							<tr class="exmp2"><td colspan="3">列:白黒業務用コピー機、足踏みミシン、ロフトベッド等</td></tr>
							<tr><th rowspan="2">Jランク<br />9,720円</th><td>450cm以下</td><td>60kg以下</td><td>エレクトーン</td></tr>
							<tr class="exmp2"><td colspan="3">列:エレクトーン、金庫(60kg以下)等</td></tr>
							<tr><th rowspan="2">Kランク<br />12,960円</th><td>500cm以下</td><td>70kg以下</td><td>電子ピアノ</td></tr>
							<tr class="exmp2"><td colspan="3">列:電子ピアノ、金庫(90kg以下)、原付バイク等</td></tr>
						</tbody>
					</table>
				</div><div class="clear"></div>
			</div><!-- #cost table-->
			<div>
				<div class="onecol">
					<h4>特殊作業料金</h4>
				</div>
				<div class="threecol last">
					<table>
					<thead>
						<tr><th class="table_title">特殊作業の料金</th><th class="table_title">説明</th><th>特殊作業料金</th></tr>
					</thead>
					<tbody>
						<tr>
							<th>タンス・ベッドなど家具の解体</th>
							<td>そのままの形では、お部屋から運び出せない家具の解体にかかる料金です。</td>
							<td class="pink">1,080円</td>
						</tr>
						<tr>
							<th>階段を通る運び出し</th>
							<td class="exmp2">大型の品物を、階段を使ってお運びする際にかかる料金です。</td>
							<td class="pink exmp2">外階段：540 円／階<br />内階段：2,160円／階</td>
						</tr>
						<tr>
							<th>吊り降ろし作業</th>
							<td >玄関を通らない大型の品物を、ベランダなどからつり降ろしする作業にかかる料金です。</td>
							<td class="pink">11,550 円〜</td>
						</tr>
						<tr>
							<th>お部屋の掃き掃除と拭き掃除</th>
							<td class="exmp2">洗剤を使わない場合の、清掃にかかる料金です。</td>
							<td class="pink exmp2">1,080 円／10分</td>
						</tr>
						<tr>
							<th>お時間帯の枠指定</th>
							<td>希望の時間枠にお伺いするための料金です。</td>
							<td class="pink">1,080 円〜<br /><small>※3〜4月、12月はシーズン価格適用日があります</small></td>
						</tr>
						<tr>
							<th>指定時間ぴったりのお伺い</th>
							<td class="exmp2">指定いただいたお時間ぴったりにお伺いするための料金です。</td>
							<td class="pink exmp2">3,240 円〜<br /><small>※3〜4月、12月はシーズン価格適用日があります</small></td>
						</tr>
						<tr>
							<th>地域料金</th>
							<td>下記住所にお伺いする場合に発生する料金です。<br />
								【埼玉県】 吉川市、越谷市、三郷市、八潮市、上尾市<br />
								【神奈川県】 鎌倉市、逗子市、横須賀市、三浦市、葉山町、大和市、相模原市<br />
								【千葉県】 千葉市、習志野市、八千代市、船橋市、鎌ヶ谷市、松戸市、柏市、流山市</td>
							<td class="pink">4,320 円</td>
						</tr>
						<tr>
							<th>PCデータ物理消去</th>
							<td class="exmp2">お客様の目の前で、パソコンに穴を開け、データを消去する作業の料金です。</td>
							<td class="pink exmp2">1,080 円〜</td>
						</tr>
						<tr>
							<th>エアコンの取外し</th>
							<td>セパレート型のエアコンを取り外す作業にかかる料金です。</td>
							<td class="pink">9,720 円</td>
						</tr>
						<tr>
							<th>大型物置の解体</th>
							<td class="exmp2">お庭に設置されている大型の物置の解体料金です。</td>
							<td class="pink exmp2">要出張お見積もり</td>
						</tr>
						<tr>
							<th>家具の移動・AV配線</th>
							<td>家具の移動やAV配線など、日常のお困りごとをサポートする料金です。</td>
							<td class="pink">1,080 円／10分</td>
						</tr>
					</tbody>
				</table>
			</div><!-- #cost etc -->
			<div id="bought">
				<div class="onecol">
					<h4>家具・家電の買取について</h4>
				</div>
				<div class="threecol last">
					<dl>
						<dt><h5>買取りできるモノ・できないモノ</h5></dt>
						<dd class="kaitori">製造から5年以内のAV機器、生活家電、PC、ブランド家具など多くの人が欲しがるものです。お面、ヘルメット、観音像、ラジコン、パーティグッズ、ランプなど、マニアがいるものです。まずはお気軽にお問い合わせ、お持込み下さい。</dd>
						<dt><h5>買取りの基準</h5></dt>
						<dd>
							<table>
								<thead>
									<tr><th class="table_title">カテゴリー</th><th class="table_title">対象品</th><th>査定ポイント</th></tr>
								</thead>
								<tbody>
									<tr>
										<th>家電</th>
										<td>TV、冷蔵庫、洗濯機、エアコン、電子レンジ、ミニコンポ、DVDレコーダー、ポット、炊飯器、掃除機</td>
										<td>製造年式（5年以内）、付属品、キズの有無、動作状況</td>
									</tr>
									<tr>
										<th>パソコン</th>
										<td class="exmp2">デスクトップ、ノートPC、液晶モニター</td>
										<td class="exmp2">OS（7、VistaまたはXP）、キズの有無、動作状況</td>
									</tr>
									<tr>
										<th>家電</th>
										<td>ブランド家具</td>
										<td>買取対象：カリモク60、ハーマンミラー、ヴィトラ、カッシーナ、カルテル、アルフレックス、天童木工、飛騨産業、北海民芸、松本民芸</td>
									</tr>
									<tr>
										<th>楽器</th>
										<td class="exmp2">エレクトーン、電子ピアノ、ギター、キーボード、ベース、サックス、ホルンなど</td>
										<td class="exmp2">メーカー名、製造年式、型式</td>
									</tr>
									<tr>
										<th>ブランド品</th>
										<td>バッグ、アクセサリー、靴、服</td>
										<td><sup>※5</sup></td>
									</tr>
								</tbody>
							</table>
							<p class="footnote">
								<small>
									※１ 上記以外のお品物のご希望は（0120-530-065）までお問合せ下さい。<br />
									※2 付属品の有無によっては買取できない場合があります。<br />
									※3 外面のキズや製品の仕様によって価格は変動する場合があります。<br />
									※4 故障・破損していないものに限ります。<br />
									※5 ブランド品の査定・査定結果の通知・買取代金の振込に関しては株式会社イーレディーにご依頼させていただきます。
								</small>
							</p>
						</dd>
					</dl>
				</div><div class="clear"></div>
				</div>
			</div><!-- #cost #bought-->
			</div>
		</div><!--#cost-->
		
		
		<div class="contents" id="serviceArea">
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map.png" alt="" class="png" /></span>エコ回収の対応エリアは<span class="pink b">全国拡大中</span></h3>
			<div class="container">
			<div class="onecol">
				<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/serviceArea_img_01.gif" alt="" class="png" />
			</div>
			<div class="threecol last">
				<dl class="dfntList">
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />東京都</dt>
				<dd>千代田区、中央区、港区、新宿区、文京区、台東区 、墨田区、江東区、品川区、目黒区、大田区、世田谷区、渋谷区、中野区、杉並区、豊島区、北区、荒川区、板橋区、練馬区、足立区、葛飾区、江戸川区、八王子市、立川市、蔵野市、三鷹市、府中市、昭島市、調布市、町田市、小金井市、日野市、国分寺市、国立市、狛江市、東大和市、武蔵村山市、多摩市、稲城市、小平市、東村山市、西東京市、清瀬市、東久留米市、青梅市、福生市、羽村市、あきる野市、瑞穂町、日の出町、檜原村、奥多摩町</dd>
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />埼玉県</dt><dd>朝霞市、入間市、入間郡三芳町、川口市、狭山市、志木市、草加市、所沢市、戸田市、新座市、鳩ヶ谷市、富士見市、ふじみ野市、和光市、蕨市、さいたま市、<span class="pink">吉川市、越谷市、三郷市、八潮市、上尾市、川越市、日高市、飯能市</span></dd>
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />神奈川県</dt><dd>川崎市、横浜市、<span class="pink">鎌倉市、逗子市、横須賀市、三浦市、葉山町、大和市、相模原市</span></dd>
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />千葉県</dt><dd>市川市、浦安市、<span class="pink">千葉市、習志野市、八千代市、船橋市、鎌ヶ谷市、松戸市、柏市、流山市</span></dd>
			</dl>
			</div>
			<div class="clear"></div>
			<div class="onecol">
				<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/serviceArea_img_03.gif" alt="" class="png" />
			</div>
			<div class="threecol1 last">
				<p class="warning">誠に勝手ながら、2014年11月1日から　大阪府と兵庫県のお伺いを一時休止致します。<br />ご迷惑をお掛けし申し訳ございません。</p>
				<dl class="dfntList clear">
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />大阪府</dt><dd>
				<p>全域</p></dd>
				<dt><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/map_icon.png" alt="" class="png green_map" />兵庫県</dt><dd>
				<p>尼崎市、伊丹市、川西市、宝塚市、西宮市、神戸市、芦屋市</p></dd>
				</dl>
			</div>
			<div class="footnote">
				<p class="small clear">
					※<span class="pink">赤字</span>のエリアは、別途地域料金として4,320円が発生いたします。<br />
					※記載されていないエリアでも可能な限り調整をいたしますので、お気軽に電話・メールにてご相談くださいませ。<br />
					※対応エリアの詳細についてはお電話にてご確認ください。<br />
					※お伺いする場所によっては、別当地域料金が発生いたします。</p>
			</div>
			</div>
		</div><!--#serviceArea-->

		<div class="contents" id="corp">
			<div class="container">
			<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/truck.png" alt="" class="png" /></span>創業64年のウインローダーが<span class="white b">エコ回収を運営</span></h3>
			<table id="companyInfoTable">
				<tbody>
					<tr><th>商　号</th><td>株式会社ウインローダー</td></tr>
					<tr><th>所在地</th><td class="exmp2">本社:東京都杉並区上荻2-37-7<br />TEL 03-3390-2161/FAX 03-3301-0481</td></tr>
					<tr><th>設　立</th><td>昭和25年1月</td></tr>
					<tr><th>資本金</th><td class="exmp2">5,000万円</td></tr>
					<tr><th>役員構成</th><td>代表取締役会長 高嶋 民雄/代表取締役社長 高嶋 民仁</td></tr>
					<tr><th>支店</th><td class="exmp2">東村山センター/昭島センター/西多摩支店/目黒支店</td></tr>
					<tr><th>従業員数</th><td>149名(平成25年3月現在)</td></tr>
					<tr><th>営業種目</th><td class="exmp2">一般貨物自動車運送事業/倉庫業/荷造梱包業/家電家具配送設置業/古物の売買業/産業廃棄物収集運搬および処理業/廃品回収リサイクル業/古物商</td></tr>
					<tr>
						<th>許認可</th>
						<td>
							<dl class="dfntList">
								<dt>産業廃棄物収集運搬</dt>
								<dd>東京都(1310062315号)/神奈川県(1402062315号)/埼玉県(1102062315号)/千葉県(1200062315号)/茨城県(00801062315号)横浜市(5600062315号)/川崎市(5700062315号/横須賀市(5802062315号)/ 相模原市(09800062315号)/さいたま市(10100062315号)/川越市(10300062315号)/千葉市(5500062315号)/船橋市(1040062315号)</dd>
								<dt>産業廃棄物積替保管</dt>
								<dd>東京都(1310062315号)</dd>
								<dt>産業廃棄物処分</dt>
								<dd>東京都(1310062315号)</dd>
								<dt>古物商</dt>
								<dd>東京都(304438900432号)/神奈川県(452740006573号)</dd>
							</dl>
						</td>
					</tr>
					<tr><th>出願中の特許</th><td class="exmp2">特願2007-262892号/特願2008-70178号</td></tr>
					<tr><th>登録商標</th><td>第4889016号/5261337号/5208350号/5152337号/5182861号</td></tr>
					<tr><th>保有車輪</th><td class="exmp2">大型トラック11台/4tトラック27台/2tトラック52台/1tワゴン・軽自動車8台/フォークリフト14台 (平成25年6月現在)</td></tr>
					<tr><th>取引金融機関</th><td>三菱東京UFJ銀行/りそな銀行/商工組合中央金庫/日本政策金融公庫</td></tr>
					<tr><th>加盟組合</th><td class="exmp2">社団法人東京都トラック協会/東京自動車交通共済協同組合</td></tr>
					<tr><th>関連会社</th><td>株式会社高島商事/株式会社フコク(品川地区)/株式会社NTSロジ(東久留米地区)/株式会社三村運送(渋谷地区)/山手運輸株式会社(神奈川地区)</td></tr>
				</tbody>
			</table>
			</div>
		</div><!--#corp-->
		
		<?php echo $contact; ?>
		
		<div class="contents" id="options">
			<div class="container">
				<h3><span class="title-icon"><img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/smiley.png" alt="" class="png" /></span>エコ回収はこんなこともできます！</h3>
				<div class="twocol">
					<h4>当日・翌日のご対応OK!</h4>
					<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/lp_points_img_01.jpg" class="alignright" alt="黄色いノースリーブのエコランドのイメージキャラクターが、翌日と当日と書かれている時計をさしながら、エコランドは当日・翌日の依頼も対応できることをアピールしています。">
					<p class="options_txt">お引越の前日に、「使わなくなる家具の片付けどうしよう！」とお困りの方、エコランドならば、<span class="green b">前日18時までにご予約いただければ、翌日お引き取りに伺います</span>。また、約100台以上のトラックが常時稼働しておりますので、<span class="green b">当日のご依頼もお任せください！</span></p>
					
			</div>
			<div class="twocol last">
				<h4>PCデータ消去サービス</h4>
				<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/lp_points_img_02.jpg" class="alignright" alt="エコランドPCデータの消去サービスの実際の流れがわかる写真が正方形に配置されています。">
				<p  class="options_txt">パソコンを手放す際に心配なのが、個人情報。エコ回収では<span class="green b">PCデータ消去サービスを無料で行っています。</span>物理的に、あるいは多重書き込み式にてデータを完全に消去します。もちろんエコ回収後はリユース＆リサイクルでゴミにしません。</p>
			</div><div class="clear"></div>
			<div class="twocol">
			<h4>50%キャッシュバックのチャンス</h4>
			<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/lp_points_img_03.jpg" class="alignright" alt="黄色に光っている太陽イラストをバックに、エコランドのイメージキャラクターがキャッシュバックのことを強調しています。" />
				<p  class="options_txt">エコ回収品は<span class="green b">独自のオークションに出品し、落札額の50%をキャッシュバックしています。</span><br />
			お財布に優しいだけではなく、まだ使えるのにモッタイナイ、と思っていた品物が、必要とする誰かに渡せるのだから、とってもエコです。</p>
			</div>
			<div class="twocol last">
				<h4>レディースサービスも！</h4>
				<img src="<?php bloginfo("template_url"); ?>/assets/img/legacy/lp_points_img_04.jpg" class="alignright" alt="エコランドの女性スタッフが笑顔でお客様を訪問しています。後ろには男性スタッフも動向しています。">
				<p  class="options_txt">寝起きの時や、洗濯物を干している時に男性がこられるのはちょっとイヤー…大きなモノだから、男性二人できてもらうんだけど、怖くないかしら…女性のスタッフだとホットするんだけどなぁ…。<br />
				そんな貴女の不安をエコランドが解消いたします！<br /><span class="green b">安心の女性スタッフが伺います。</span></p>
			</div><div class="clear"></div>
			</div>
		</div><!--#options-->
	
	</div><!--#main-->

	<div id="footer">
		<p id="copyrights">Copyright© 2014 WINROADER ALL RIGHT RESERVED.</p>
	</div><!--#footer-->

</div>
</body>
</html>