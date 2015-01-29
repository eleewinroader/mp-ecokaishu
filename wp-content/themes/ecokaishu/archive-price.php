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
		<div class="intro twelvecol col last">
			<div class="summary">
				<?php echo getPage("イントロ", "contents"); ?>
			</div>
			<div class="tabIndex">
				<ul>
					<li><a href="#ex"><span class="block">料金の出し方</span><span class="here">こちら</span></a></li>
					<li><a href="#simulations"><span class="block">みんなの見積は</span><span class="here">こちら</span></a></li>
				</ul>
			</div>
		<!-- .intro .summary--></div>
	</div>

	<div id="ex" class="contents">
		<div class="container">
			<div class="twelvecol col last">
				<h3><?php echo getPage("料金の出し方", "title"); ?> <span class="small"></span></h3>
			</div>
			<ul class="tabIndex">
				<li class="twocol col">
					<h4>基本料金</h4>
					<span class="icon-shipping"></span>
					<p><span class="price">3,240</span></p>
				</li>
				<li data-tab="itemPrice" class="twocol col">
					<h4>品物ごとの料金</h4>
					<span class="icon-box2"></span>
					<p><span class="priceIndex">洗濯機</span><span class="price">4,320</span></p>
					<p><span class="priceIndex">ソファ</span><span class="price">3,240</span></p>
				</li>
				<li data-tab="options" class="twocol col">
					<h4>特殊作業料金</h4>
					<span class="icon-tools"></span>
					<p><span class="priceIndex m0_r">外階段作業</span><span class="price block">1,080</span></p>
				</li>
				<li data-tab="purchase" class="twocol col">
					<h4>オプション料金</h4>
					<span class="icon-tags"></span>
					<p><span class="priceIndex">オプション</p>
				</li>
				<li class="fourcol col last">
					<h4>合計料金</h4>
					<p><span class="price">8,640</span></p>
				</li>
			</ul>
			<!--<?php echo getPage("料金系計算の例", "contents"); ?>-->
		</div>
	<!-- .intro #ex--></div>

	<div class="tabs">
		<section class="contents" id="basicCharges">
			<div class="container">
				<div class="linkMenu">
				    <h3><a href="#basicCharges" class="active">基本料金</a></h3>
				    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
				    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
				    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
				</div>
				<div class="twelvecol col last">
					<table>
						<tbody>
							<tr>
								<th>基本料金</th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>地域料金</th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。</td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section><!--#basicCharges-->

		<section class="contents" id="itemCharges">
			<div class="container">
				<div class="linkMenu">
				    <div class="tab"><a href="#basicCharges">基本料金</a></div>
				    <h3><a href="#itemCharges" class="active">品物ごとの料金</a></h3>
				    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
				    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
				</div>			
				<div class="twelvecol col">
					<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />
	棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。</p>
					<p class="appendix"><small>※金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</small></p>
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
										<th>20インチ以下 / F</th>
										<td>3,240円</td>
									</tr>
									<tr>
										<th>21-25インチ / G</th>
										<td>4,320円</td>
									</tr>
									<tr>
										<th>26-30インチ / H</th>
										<td>5,940円</td>
									</tr>
									<tr>
										<th>31インチ以上 / I </th>
										<td>7,560円</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--item TV-->
						<div class="item">
							<span class="icon-refrigerator"></span>
							<h5>冷蔵庫*1</h5>
							<table>
								<tbody>
									<tr>
										<th>100リットル未満 / G</th>
										<td>4,320円</td>
									</tr>
									<tr>
										<th>200リットル未満 / H</th>
										<td>5,940円</td>
									</tr>
									<tr>
										<th>400リットル未満 / I </th>
										<td>7,560円</td>
									</tr>
									<tr>
										<th>500リットル未満 / J</th>
										<td>9,720円</td>
									</tr>
									<tr>
										<th>500リットル以上 / K</th>
										<td>12,960円</td>
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
										<th>窓用エアコン / F</th>
										<td>3,240円</td>
									</tr>
									<tr>
										<th>エアコン(室外機付) / H</th>
										<td>5,940円</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--item air airconditioner-->
						<div class="item">
							<span class="icon-clothesdryer"></span>
							<h5>衣類乾燥機</h5>
							<table>
								<tbody>
									<tr>
										<th>全サイズ / F</th>
										<td>3,240円</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--item clothesdryer-->
						<div class="item">
							<span class="icon-washingmachine"></span>
							<h5>洗濯機</h5>
							<table>
								<tbody>
									<tr>
										<th>洗濯機 8.0㎏以下 / G</th>
										<td>4,320円</td>
									</tr>
									<tr>
										<th>ドラム式洗濯乾燥機 全サイズ / H</th>
										<td>5,940円</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--item washingmachine-->
						<div class="item">
							<span class="icon-laptop"></span>
							<h5>パソコン</h5>
							<table>
								<tbody>
									<tr>
										<th>デスクトップ本体 / B</th>
										<td>1,080円</td>
									</tr>
									<tr>
										<th>ノートパソコン / B</th>
										<td>1,080円</td>
									</tr>
									<tr>
										<th>一体型パソコン / D</th>
										<td>2,160円</td>
									</tr>
									<tr>
										<th>モニタ(液晶/ブラウン管) / C</th>
										<td>1,620円</td>
									</tr>
									<tr>
										<th>マウス・キーボード / A</th>
										<td>540円</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--item laptop-->
					</div>
					<p class="footnote"><small>※ 1) すべて冷凍含サイズです。</small></p>
				</section><!--#itemCharges #electricApp-->

				<section id="itemRank">
					<div class="twelvecol col last"><h4>各品物別ランク料金</h4></div>						
					<div class="liquidLayout">
						<div class="item">
							<h5>A ランク <br />540円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>50㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>1kg以下</td>
									</tr>
									<tr>
										<th colspan="2">炊飯器、ミキサー、オーブントースター、サッカーボール、ビデオカメラ等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>B ランク <br />1,080円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>90㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>2㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">加湿器、縦型掃除機、ダイニングチェア、ノートパソコン、パソコン本体、布団、ガステーブル(2口)、ＤＶＤプレーヤー、ギター等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>C ランク <br />1,620円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>150㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>5㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">カラーBOX(3段)、姿見、空気清浄器、スキー板等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>D ランク <br />2,160円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>180㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>10㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">デスクチェア、こたつ、電子レンジ、ミニコンポ、一体型パソコン等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>E ランク <br />2,700円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>210㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>15㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">家庭用複合機、ホットカーペット、レッグマジック、ステッパー等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>F ランク <br />3,240円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>270㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>20㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">レンジ台、オイルヒーター、電子キーボード等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>G ランク <br />4,320円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>300㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>30㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">自転車、ダイニングセット(二人用)、エアロバイク等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>H ランク <br />5,940円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>360㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>40㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">A3レーザープリンタ、ウッドカーペット等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>I ランク <br />7,560円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>400㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>50㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">足踏みミシン、ダイニングセット(四人用)、白黒業務用コピー機</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>J ランク <br />9,720円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>450㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>60㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">エレクトーン、大型マッサージ機等</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="item">
							<h5>K ランク <br />12,960円</h5>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td>500㎝以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td>70㎏以下</td>
									</tr>
									<tr>
										<th colspan="2">電子ピアノ、介護ベッド等</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>		
				</section><!--#itemCharges #itemRank-->
			</div>
		</section><!--#itemCharges-->

			<section class="contents" id="spworksCharges">
				<div class="container">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
					    <h3><a href="#spworksCharges" class="active">特殊作業料金</a></h3>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="twelvecol col last">
						<p>エコ回収をするうえで必要な作業に対して頂戴する料金です。お客様自身で作業を行って頂ければ料金は頂戴致しません。</p>
						<table>
							<tbody>
								<tr>
									<th>外階段作業 ※1</th>
									<td>集合住宅の共有スペースや戸建の屋外に設置されている階段を利用して行う作業です。</td>
									<td>540円/階</td>
								</tr>
								<tr>
									<th>内階段作業 ※2</th>
									<td>戸建、メゾネットなど室内にある階段を利用して行う作業です。</td>
									<td>2,160円/階</td>
								</tr>
								<tr>
									<th>解体作業 ※3</th>
									<td>ベッドフレームや大型クローゼットなどの解体を行います。10分1,080円が目安となります。 </td>
									<td>1,080円/10分</td>
								</tr>
								<tr>
									<th>吊り下ろし作業 ※3</th>
									<td>お部屋の中の階段を通らない大型家具などをベランダや窓から外に運び出す作業です。</td>
									<td>11,880 / 円</td>
								</tr>
								<tr>
									<th>養生作業</th>
									<td>集合住宅の共有スペース(エレベーター周りやエントランスなど)を保護するためにプラスチックのシートを壁や床に貼る作業です。作業量により、料金が変動致します。お住まいの集合住宅によっては、数点のお運び出しの場合もこちらの作業が必要になりますので、事前にご確認ください。</td>
									<td>1,080円～</td>
								</tr>
								<tr>
									<th>エアコン取り外し工事</th>
									<td>お住まいに設置されているエアコンの室内機と室外機を取り外す工事です。室外機の設置場所や設置方法(床置き、天井吊りなど)により料金が異なります。</td>
									<td>9,720円/台～</td>
								</tr>
							</tbody>
						</table>
						<div class="footnote">
							<p><small>※ 1) お品物ごとに作業料金が適用されます。 料金ランクがFランク以上のお品物のみが適用対象になります。</small></p>
							<p><small>※ 2) お品物ごとに作業料金が適用されます。 料金ランクがFランク以上のお品物のみが適用対象になります。</small></p>
							<p><small>※ 3) お品物ごとに作業料金が適用されます。</small></p>
						</div>
					</div>
				</div>
			</section><!--#itemCharges-->

		<section class="contents" id="optionsCharges">
			<div class="container">
				<div class="linkMenu">
				    <div class="tab"><a href="#basicCharges">基本料金</a></div>
				    <div class="tab"><a href="#itemCharges">品物ごとの料金</a></div>
				    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
				    <h3><a href="#optionsCharges" class="active">オプション料金</a></h3>
				</div>
				<div class="twelvecol col last">
					<p>お客様のご希望により自由に選択して頂けるサービスの料金です。</p>
					<table>
						<tbody>
							<tr>
								<th>時間帯指定サービス</th>
								<td>3時間枠でお時間帯をご指定頂けます。(お時間枠：9～12時、11～14時、13～16時、15～18時)</td>
								<td>1,080円</td>
							</tr>
							<tr>
								<th>当日集荷サービス</th>
								<td>受付日当日にお伺いさせて頂くサービスです。</td>
								<td>2,160円</td>
							</tr>
							<tr>
								<th>夜間指定サービス</th>
								<td>18時～20時の間でお伺いさせて頂くサービスです。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th>レディースサービス</th>
								<td>女性スタッフによるお伺いをお約束致します。</td>
								<td>1,080円</td>
							</tr>
							<tr>
								<th>目の前あんしんデータ消去サービス</th>
								<td>お客様の目の前でパソコンからハードディスクを取り出し、物理的に破壊するサービスです。 デスクトップ本体2,160円 ノートＰＣ・一体型ＰＣ</td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
					<div class="footnote">
						<p><small>※ 1) ご指定がない場合はご訪問前日の18～21時の間にお伺い予定時間を3時間枠でご連絡致します。</small></p>
						<p><small>※ 2) ご予約状況により、承ることができない可能性もございますので、あらかじめご了承ください。</small></p>
						<p><small>※ 3) 女性1名、男性1名でのお伺いになります。 女性のお客様対象のサービスです。</small></p>
						<p><small>※ 4) こちらのサービスをご希望されない場合はセンターに持ち帰ってデータ消去を行います。</small></p>
					</div>
				</div>
			</div>
		</section><!--#optionsCharges-->

	</div><!-- .tabs -->

	<section class="contents" id="simulations">
	<div class="container">

		<div class="twelvecol col last">
			<h3>みんなの見積</h3>
			<p class="footnote"><small>
				※ 金額表示はすべて税込価格となります。<br />
				※ 特殊作業は、お客様希望がなくても、作業上必ず必要になることもありますので、ご了承ください。
			</small></p>
		</div>

		<section class="case" id="familyA">
			<div class="fourcol col introFamily">
				<h4>引越しのAさん家族</h4>
				<div class="imgFamily"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/price/simulations_img_01.gif" alt="" /></div>
				<p>今回、家族で戸建に引越をします。</p>
				<p>学習机などがあり、自分では解体や運び出しができなそうなので、お願いしたいです。モノが多いので、電話よりもネットで見積もり金額を出せたら嬉しいのですが、可能でしょうか？</p>
				<p>どれを手放すか迷っているので、見積書で一点ずつの金額を見ながらどれを手放すか決めたいと思っています。</p>
			</div>
			<div class="eightcol col last">
				<table class="tablePriceExam">
					<thead><tr><th>内容</th><th>個数</th><th>単価</th><th>金額</th></tr></thead>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-shipping"></span>基本料金</th></tr>
						<tr><th>基本料金</th><td>-</td><td>3,240</td><td>3,240</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-box"></span>引取する品物</th></tr>
						<tr><th>冷蔵庫300リットル</th><td>1</td><td>7,560</td><td>7,560</td></tr>
						<tr><th>エアコン室外機付</th><td>1</td><td>5,400</td><td>5,400</td></tr>
						<tr><th>洗濯機ドラム式</th><td>1</td><td>5,940</td><td>5,940</td></tr>
						<tr><th>食器類</th><td>3</td><td>1,080</td><td>3,240</td></tr>
						<tr><th>引き出し付きシングルベッドフレーム</th><td>2</td><td>4,320</td><td>8,640</td></tr>
						<tr><th>シングルマットレス</th><td>2</td><td>4,320</td><td>8,640</td></tr>
						<tr><th>4Pダイニングセット</th><td>1</td><td>7,560</td><td>7,560</td></tr>
						<tr><th>学習机</th><td>1</td><td>3,240</td><td>3,240</td></tr>
						<tr><th>デスクチェア</th><td>2</td><td>1,620</td><td>3,240</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tags"></span>買取する品物</th></tr>
						<tr><th>-</th><td>-</td><td>-</td><td>-</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tools"></span>特殊作業</th></tr>
						<tr><th>エアコンの取外し</th><td>1</td><td>9,720</td><td>9,720</td></tr>
						<tr><th>家具の解体</th><td>2</td><td>1,080</td><td>2,160</td></tr>
						<tr><th>養生作業</th><td>1</td><td>11,880</td><td>11,860</td></tr>
						<tr><th>お時間帯の枠指定(3時間枠)</th><td>1</td><td>1,080</td><td>1,080</td></tr>
					</tbody>
					<tfoot>
						<tr><th colspan="3">合計</th><td>81,520</td></tr>
					</tfoot>
				</table>
			</div>
		<!-- #familyA.simulations --></section>

		<section class="case" id="familyB">
			<div class="fourcol col introFamily">
				<h4>3人掛けソファを買い換えたいBさん</h4>
				<div class="imgFamily"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/price/simulations_img_02.gif" alt="" /></div>
				<p>3人掛けのソファを手放したいのですが、一点だけでもお願いできますか？</p>
				<p>買った時に、ベランダから入れた気がするので、ベランダから降ろすことになりそうです。解体も必要になるかもしれないのですが、いくらでお願いできますか？まだ使えるソファなので、使ってくれる人がいるなら使ってもらいたい。リユースしてもらえますか？</p>
			</div>
			<div class="eightcol col last">
				<table class="tablePriceExam">
					<thead><tr><th>内容</th><th>個数</th><th>単価</th><th>金額</th></tr></thead>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-shipping"></span>基本料金</th></tr>
						<tr><th>基本料金</th><td>-</td><td>3,240</td><td>3,240</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-box"></span>引取する品物</th></tr>
						<tr><th>3Pソファ</th><td>1</td><td>5,940</td><td>5,940</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tags"></span>買取する品物</th></tr>
						<tr><th>-</th><td>-</td><td>-</td><td>-</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tools"></span>特殊作業</th></tr>
						<tr><th>吊り降ろし作業</th><td>1</td><td>11,880</td><td>11,880</td></tr>
						<tr><th>合流作業</th><td>1</td><td>6,480</td><td>6,480</td></tr>
						<tr><th>地域料金</th><td>1</td><td>4,320</td><td>4,320</td></tr>
					</tbody>
					<tfoot>
						<tr><th colspan="3">合計</th><td>31,860</td></tr>
					</tfoot>
				</table>
			</div>
		<!-- #familyB.simulations --></section>

		<section class="case" id="familyC">
			<div class="fourcol col introFamily">
				<h4>急な海外転勤のCさん</h4>
				<div class="imgFamily"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/price/simulations_img_03.gif" alt="" /></div>
				<p>急に転勤が決まり、時間がありません。</p>
				<p>最短でいつ来てくれますか？買取もしてほしいですが、何社にも頼むのは面倒なので、エコランドだけで完結したら嬉しいのですが、可能ですか？早めに引き取ってほしいので、訪問の見積もりせず、電話で買取目安も教えてほしいっす！！</p>
			</div>
			<div class="eightcol col last">
				<table class="tablePriceExam">
					<thead><tr><th>内容</th><th>個数</th><th>単価</th><th>金額</th></tr></thead>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-shipping"></span>基本料金</th></tr>
						<tr><th>基本料金</th><td>-</td><td>3,240</td><td>3,240</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-box"></span>引取する品物</th></tr>
						<tr><th>洗濯機 8.0kg</th><td>1</td><td>4,320</td><td>4,320</td></tr>
						<tr><th>電子レンジ</th><td>1</td><td>2,160</td><td>2,160</td></tr>
						<tr><th>こたつテーブル</th><td>1</td><td>2,160</td><td>2,160</td></tr>
						<tr><th>電気ヒーター</th><td>1</td><td>1,620</td><td>1,620</td></tr>
						<tr><th>カラーボックス</th><td>1</td><td>1,620</td><td>1,620</td></tr>
						<tr><th>衣類</th><td>2</td><td>1,080</td><td>2,160</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tags"></span>買取する品物</th></tr>
						<tr><th>冷蔵庫200L未満2014年製</th><td>1</td><td>-3,000</td><td>-3,000</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tools"></span>特殊作業</th></tr>
						<tr><th>地域料金</th><td>1</td><td>4,320</td><td>4,320</td></tr>
						<tr><th>外階段(集合住宅などの共有階段)</th><td>1</td><td>540</td><td>540</td></tr>
					</tbody>
					<tfoot>
						<tr><th colspan="3">合計</th><td>19,140</td></tr>
					</tfoot>
				</table>
			</div>
		<!-- #familyC.simulations --></section>

		<section class="case" id="familyD">
			<div class="fourcol col introFamily">
				<h4>パソコンを手放したいDさん</h4>
				<div class="imgFamily"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/price/simulations_img_04.gif" alt="" /></div>
				<p>パソコンを手放したいのですが、データ消去もお願いできますか？</p>
				<p>毎日忙しいので時間指定したいし、帰宅に間に合わない可能性があるので、到着の何分前かに連絡がほしいです。依頼するのが初めてなので、どんな方が来るのか分かったら嬉しいです。女性スタッフだともっと安心なのですが、指定なんでできるのでしょうか？</p>
			</div>
			<div class="eightcol col last">
				<table class="tablePriceExam">
					<thead><tr><th>内容</th><th>個数</th><th>単価</th><th>金額</th></tr></thead>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-shipping"></span>基本料金</th></tr>
						<tr><th>基本料金</th><td>-</td><td>3,240</td><td>3,240</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-box"></span>引取する品物</th></tr>
						<tr><th>デスクトップPC本体</th><td>1</td><td>1,080</td><td>1,080</td></tr>
						<tr><th>液晶モニター</th><td>1</td><td>1,620</td><td>1,620</td></tr>
						<tr><th>マウス・キーボード</th><td>1</td><td>540</td><td>540</td></tr>
						<tr><th>A4インクジェットプリンター</th><td>1</td><td>1,620</td><td>1,620</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tags"></span>買取する品物</th></tr>
						<tr><th>-</th><td>-</td><td>-</td><td>-</td></tr>
					</tbody>
					<tbody>
						<tr class="estimateIndex"><th scope="rowgroup" colspan="4"><span class="icon-tools"></span>特殊作業</th></tr>
						<tr><th>目の前あんしんデータ消去</th><td>1</td><td>2,160</td><td>2,160</td></tr>
						<tr><th>レディースサービス</th><td>1</td><td>1,080</td><td>1,080</td></tr>
						<tr><th>夜間指定サービス</th><td>1</td><td>3,240</td><td>3,240</td></tr>
					</tbody>
					<tfoot>
						<tr><th colspan="3">合計</th><td>14,580</td></tr>
					</tfoot>
				</table>
			</div>
		<!-- #familyD.simulations --></section>

	</div>
	</section>


<?php get_footer(); ?>