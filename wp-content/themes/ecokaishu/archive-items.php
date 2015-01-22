<?php
/**
 * The main template file.
* @package Montser Platform
 */

get_header();

	//vars
	$postType = get_post_type_object(get_post_type());
	?>
	
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
	<!--.headerPage--></header>

	<div class="container">
		<div class="blockItems">
			<div class="intro twelvecol col">
				<h2><span>練馬区で不用品回収をお考えの方へ</span>エコランドにお任せください</h2>
				<div class="contact">
					<div id="tel">
						<a onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});" href="tel:0120530539">
							<span class="icon-phone"></span>
							<span>0120-530-539</span>
						</a>
					</div>
					<div id="mail">
						<a href="http://www.eco-kaishu.jp/estimate/?pr_code=0-03">メールで見積依頼</a>
					</div>
					<p>営業時間 平･土 9:00-22:00日･祝 9:00-20:00</p>
				</div>
				<div class="lstIntro">
					<div class="fourcol col">
						<span class="icon-moneybag"></span>
						<div class="txtIntro">私も今どうもその約束人</div>
						<div class="title">明確な料金体系</div>
					</div>
					<div class="fourcol col">
						<span class="icon-settings"></span>
						<div class="txtIntro">私も今どうもその約束人</div>
						<div class="title">事前見積&スピード対応</div>
					</div>
					<div class="fourcol col">
						<span class="icon-files"></span>
						<div class="txtIntro">私も今どうもその約束人</div>
						<div class="title">安心の実績</div>
					</div>
				</div>
			</div><!--.intro-->
			<div class="reason twelvecol col">
				<h3>エコランドが選ばれる理由</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				<div class="lstReason">
					<div class="fourcol col">
						<span class="icon-moneybag"></span>
						<h4>明確な料金体系</h4>
						<h5>1点からでもオトクにお伺い！</h5>
						<p>エコランドのエコ回収は料金がお品物ごとに<br />決まっています。1点からでもお引取可能なので、<br />パック料金より断然お得！</p>
						<h5>買取も同時に対応</h5>
						<p>家電・家具などはお買取も行っておりますので<br />複数の業者に頼む手間が省けます！※1)</p>
					</div>
					<div class="fourcol col">
						<span class="icon-settings"></span>
						<h4>事前見積&スピード対応</h4>
						<h5>ネット/電話で事前見積</h5>
						<p>「受付の対応が良かった」がエコランドを選んだ理由<br />【第3位】※2)！コンシェルジュ（受付スタッフ）が<br />事前にネット/お電話で丁寧にお見積させて頂きます。</p>
						<h5>プロに運び出しもお任せ</h5>
						<p>お部屋の中からの運び出しからお任せください。<br />大きいモノや重たいモノでもプロのスタッフが<br />スピーディーに運び出します。</p>
					</div>
					<div class="fourcol col">
						<span class="icon-files"></span>
						<h4>安心の実績</h4>
						<h5>大手企業との提携が信頼の証</h5>
						<p>お引取後までしっかり責任を負う<br />エコランドの仕組みが認められ、<br />たくさんの企業様と提携させて頂いています。</p>
						<h5>有名メディアにも多数掲載</h5>
						<p>エコ回収のリユース・リサイクルの<br />仕組みやお片づけサービスは<br />これまで多数のメディアに取り上げられています。</p>
					</div>
				</div>
				<p class="footnote">
					<small>※ 1)使用年数やメーカーにより、お買取できないお品物もございます。</small>
					<small>※ 2)2014年のお客様アンケート集計結果より。</small>
				</p>
			</div><!--.reason-->
			<div class="ex twelvecol col">
				<h3>明確な料金体系</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				<ul>
					<li class="twocol col">
						<h4>基本料金</h4>
						<span class="icon-shipping"></span>
						<p><span class="price">3,240</span></p>
					</li>
					<li class="twocol col">
						<h4>物品ごとの料金</h4>
						<span class="icon-box2"></span>
						<p><span class="priceIndex">洗濯機</span><span class="price">4,320</span></p>
						<p><span class="priceIndex">ソファ</span><span class="price">3,240</span></p>
					</li>
					<li class="twocol col">
						<h4>特殊作業料金</h4>
						<span class="icon-tools"></span>
						<p><span class="priceIndex m0_r">階段の運び出し</span><span class="price block">1,080</span></p>
					</li>
					<li class="twocol col">
						<h4>買取料金</h4>
						<span class="icon-tags"></span>
						<p><span class="priceIndex">オプション</p>
					</li>
					<li class="fourcol col last">
						<h4>合計料金</h4>
						<p><span class="price">10,880</span></p>
					</li>
				</ul>
			</div><!--.ex-->
			<div class="tabs twelvecol col">
				<section class="contents" id="basicCharges">
					<div class="linkMenu">
					    <h3><a href="#basicCharges" class="active">基本料金</a></h3>
					    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
					    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<table>
						<tbody>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。地域料金が必要なエリアの確認はこちら <span>逃がさない</span></td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
				</section><!--#basicCharges-->

				<section class="contents" id="itemCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <h3><a href="#itemCharges" class="active">品物ごとの料金</a></h3>
					    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="container">
						<div class="twelvecol col last">
							<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />
								棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。</p>
							<p>※金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</p>
						</div>

						<section id="electricApp">
							<div class="twelvecol col last"><h4>各家電・パソコンのサイズ別料金</h4></div>
							<div class="liquidLayout">
								<div class="item">
									<span class="icon-tv2"></span>
									<h5>テレビ</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--item TV-->
								<div class="item">
									<span class="icon-refrigerator"></span>
									<h5>冷蔵庫</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--item refrigerate-->
								<div class="item">
									<span class="icon-airconditioner"></span>
									<h5>エアコン</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--item air conditioner-->
								<div class="item">
									<span class="icon-clothesdryer"></span>
									<h5>テレビ</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--item clothes dryer-->
								<div class="item">
									<span class="icon-washingmachine"></span>
									<h5>衣類乾燥機</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--item washing machine-->
								<div class="item">
									<span class="icon-laptop"></span>
									<h5>エアコン</h5>
									<table>
										<tbody>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
											<tr>
												<th>20インチ以下</th>
												<td>3,240円</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!--item PC-->
						</section><!--#itemCharges #electricApp-->

						<section id="itemRank">
							<div class="twelvecol col last"><h4>各品物のランク別料金</h4></div>						
							<div class="liquidLayout">
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">サッカーボール、ビデオカメラ、毛布等ダイニングチェア、</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">サッカーボール、ビデオカメラ、毛布等ダイニングチェア、ノートパソコン、パソコン本体等サッカーボール、ビデオカメラ</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">サッカーボール、ビデオカメラ、毛布等ダイニングチェア、ノートパソコン、パソコン本体等サッカーボール、ビデオカメラ</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">、ノートパソコン、パソコン本体等サッカーボール、ビデオカメラ</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">サッカーボール、ビデオカメラ、毛布等ダイニングチェア、ノートパソコン、パソコン本体等サッカーボール、ビデオカメラ</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="item">
									<h5>A ランク <br />540円</h5>
									<table>
										<tbody>
											<tr>
												<th>縦・横・奥行の合計</th>
												<td>50cm以下</td>
											</tr>
											<tr>
												<th>重さ</th>
												<td>1kg以下</td>
											</tr>
											<tr>
												<th colspan="2">サッカーボール、ビデオカメラ、毛布等ダイニングチェア、ノートパソコン、パソコン本体等サッカーボール、ビデオカメラ</th>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</section><!--#itemCharges #itemRank-->
					</div><!--#itemCharges .container-->
				</section><!--#itemCharges-->

				<section class="contents" id="spworksCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
					    <h3><a href="#spworksCharges" class="active">特殊作業料金</a></h3>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<table>
						<tbody>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。地域料金が必要なエリアの確認はこちら <span>逃がさない</span></td>
								<td>4,320円</td>
							</tr>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。地域料金が必要なエリアの確認はこちら <span>逃がさない</span></td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
				</section><!--#spworksCharges-->

				<section class="contents" id="optionsCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
					    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					    <h3><a href="#optionsCharges" class="active">オプション料金</a></h3>
					</div>
					<table>
						<tbody>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。地域料金が必要なエリアの確認はこちら <span>逃がさない</span></td>
								<td>4,320円</td>
							</tr>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。地域料金が必要なエリアの確認はこちら <span>逃がさない</span></td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
				</section><!--#optionsCharges-->
			</div><!-- .tabs -->
			<div class="purchase twelvecol col">
				<h3>買取について</h3>
				<p class="txtNote">製造年（使用年数）、メーカー名（ブランド名）、型番などをお教え頂ければメール/お電話で買取の目安金額がご案内できます。<br />最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</p>
				<div class="lstPurchase">
					<div class="threecol col">
						<h4>家電</h4>
						<dl>
							<dt>対象品例</dt>
							<dd>ＴＶ、冷蔵庫、洗濯機、電子レンジ、掃除機、炊飯器、ガステーブル、ブルーレイ/DVDレコーダー、ミニコンポなど</dd>
							<dt>査定ポイント</dt>
							<dd>製造年（5年以内が買取対象）、付属品の有無、商品の状態（キズ・汚れなど）、動作状況</dd>
						</dl>
					</div>	
					<div class="threecol col">
						<h4>家具</h4>
						<dl>
							<dt>対象品例</dt>
							<dd>ブランド家具</dd>
							<dt>査定ポイント</dt>
							<dd>ブランド、使用年数（5年以内が買取対象、ソファは2年以内）、サイズ（幅・奥行・高さの和が450㎝以上は対象外）</dd>
						</dl>
					</div>	
					<div class="threecol col">
						<h4>家電</h4>
						<dl>
							<dt>対象品例</dt>
							<dd>エレクトーン、電子ピアノ、ギター、キーボード、ベースなど</dd>
							<dt>査定ポイント</dt>
							<dd>メーカー名、製造年、型番</dd>
						</dl>
					</div>	
					<div class="threecol col">
						<h4>家電</h4>
						<dl>
							<dt>対象品例</dt>
							<dd>デスクトップ本体、液晶モニタ、ノートパソコン</dd>
							<dt>査定ポイント</dt>
							<dd>初期化できるもの、OS、型番</dd>
						</dl>
					</div>	
				</div>
				<p class="footnote"><small>※お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</small></p>
			</div><!-- .purchase -->
		</div>	<!-- .blockItems -->

		<div class="contents">
			<section class="sixcol col listItems">
				<h3>人気アイテムから口コミ・実績を確認</h3>
				<ul>
				<?php
				$args = array(
					"order" => ASC,
					"orderby" => DATE,
					"post_type" => "items",
					"posts_per_page" => -1,
					"catkinds" => "人気"
				);
				$posts = query_posts($args);
				if($posts){
					foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
				}?>
				</ul>
			<!--.listItems--></section>
			<section class="sixcol col last listItems">
				<h3>カテゴリから口コミ・実績を確認</h3>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "items",
						"posts_per_page" => -1,
						"catkinds" => "大カテゴリ"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			<!--.listItems--></section>
		<!--.contents--></div>

		<div class="contents">
			<section class="listItems">
				<div class="twelvecol col last">
					<h3>エコ回収アイテム一覧</h3>
					<ul>
						<?php
						$args = array(
							"order" => ASC,
							"orderby" => DATE,
							"post_type" => "items",
							"posts_per_page" => -1
						);
						$posts = query_posts($args);
						if($posts){
							foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
						}?>
					</ul>
				</div>
			</section>
		<!--.contents--></div>

		<div class="contents">
			<section id="faq" class="sixcol col listPosts">
				<h3>エコ回収品関するよくある質問</h3>
				<a href="<?php echo get_post_type_archive_link("faq"); ?>" class="toarchive">一覧を見る</a>
				<ul><?php
					$args = array(
						"order" => ASC,
						"orderby" => DATE,
						"post_type" => "faq",
						"posts_per_page" => -1,
						"qstcat" => "エコ回収品について"
					);
					$posts = query_posts($args);
					if($posts){
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';	
					}?>
				</ul>
			<!--よくある質問--></section>
			<section id="shortcuts" class="sixcol col last">
				<h3>エコ回収についてもっと詳しく知る</h3>
				<ul class="listShortcuts">
					<li>
						<a href="<?php echo get_post_type_archive_link("price"); ?>">
							<span class="block">明朗な料金体系がエコ回収の特徴</span>
							<span class="block index"><span class="icon-calculate"></span>料金案内</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("flow"); ?>">
							<span class="block">エコ回収依頼から当日のエコ回収まで</span>
							<span class="block index"><span class="icon-flow-tree"></span>ご利用の流れ</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("staff"); ?>">
							<span class="block">お客様のお困りことに誠実・丁寧な仕事を</span>
							<span class="block index"><span class="icon-users"></span>STAFF紹介</span>
						</a>
					</li>
				</ul>
			</section>
		<!--.contents--></div>

	<!--.container--></div>

<?php get_footer(); ?>