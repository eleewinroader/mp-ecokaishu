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
					<li><a href="#priceDetails"><span class="block">料金の出し方</span><span class="here">こちら</span></a></li>
					<li><a href="#simulations"><span class="block">みんなの見積は</span><span class="here">こちら</span></a></li>
				</ul>
			</div>
		<!-- .intro .summary--></div>

		<section class="contents priceDetails" id="priceDetails">

			<div class="twelvecol col last">
				<h3>料金の出し方</h3>
				<p class="footnote">
					<small>※すべて税込価額です。</small>
				</p>
			</div>

			<ul class="priceEx">
				<li class="twocol col">
					<p class="title">基本料金</p>
					<span class="icon-shipping"></span>
					<p><span class="price">3,240</span></p>
				</li>
				<li class="twocol col">
					<p class="title">物品ごとの料金</p>
					<span class="icon-box2"></span>
					<p><span class="priceIndex">洗濯機</span><span class="price">4,320</span></p>
					<p><span class="priceIndex">ソファ</span><span class="price">3,240</span></p>
				</li>
				<li class="twocol col">
					<p class="title">特殊作業料金</p>
					<span class="icon-tools"></span>
					<p><span class="priceIndex m0_r">階段の運び出し</span><span class="price block">1,080</span></p>
				</li>
				<li class="twocol col">
					<p class="title">オプション料金</p>
					<span class="icon-tags"></span>
				</li>
				<li class="fourcol col last">
					<p class="title">合計料金</p>
					<p><span class="price">11,880</span></p>
				</li>
			<!--priceEx--></ul>

			<section class="tabContents" id="basicCharges">
				<div class="linkMenu twelvecol col last">
					<h4><a href="#basicCharges">基本料金</a></h4>
					<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
					<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
				</div>
				<div class="twelvecol col last listCharge">
					<table>
						<tbody>
							<tr>
								<th><h5>基本料金</h5></th>
								<td>1回のエコ回収にお伺いするにあたり頂戴している料金です。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th><h5>地域料金</h5></th>
								<td>一部の対応エリア訪問の際に頂戴している料金です。</td>
								<td>4,320円</td>
							</tr>
						</tbody>
					</table>
				</div>
			<!--#basicCharges--></section>

			<section class="tabContents" id="itemCharges">
				<div class="linkMenu twelvecol col last">
					<div class="tab"><a href="#basicCharges">基本料金</a></div>
					<h4><a href="#itemCharges">物品ごとの料金</a></h4>
					<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
				</div>
				<div class="twelvecol col last">
					<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。<sup>※1</sup></p>
					<p class="footnote">
						<small>※1 金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</small>
					</p>
				</div>
				<div id="electricApp" class="itemChargesDetails">
					<div class="twelvecol col last">
						<h5>各家電・パソコンのサイズ別料金</h5>
					</div>
					<div class="fourcol col rankCharge">
						<span class="icon-tv2"></span>
						<h6>テレビ</h6>
						<table>
							<tbody>
								<tr>
									<th>20インチ以下</th>
									<td>Fランク</td>
									<td>3,240円</td>
								</tr>
								<tr>
									<th>21-25インチ</th>
									<td>Gランク</td>
									<td>4,320円</td>
								</tr>
								<tr>
									<th>26-30インチ</th>
									<td>Hランク</td>
									<td>5,940円</td>
								</tr>
								<tr>
									<th>31インチ以上</th>
									<td>Iランク</td>
									<td>7,560円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol TV-->
					<div class="fourcol col rankCharge">
						<span class="icon-refrigerator"></span>
						<h6>冷蔵庫<sup>※1</sup></h6>
						<table>
							<tbody>
								<tr>
									<th>100リットル未満</th>
									<td>Gランク</td>
									<td>4,320円</td>
								</tr>
								<tr>
									<th>200リットル未満</th>
									<td>Hランク</td>
									<td>5,940円</td>
								</tr>
								<tr>
									<th>400リットル未満</th>
									<td>Iランク</td>
									<td>7,560円</td>
								</tr>
								<tr>
									<th>500リットル未満</th>
									<td>Jランク</td>
									<td>9,720円</td>
								</tr>
								<tr>
									<th>500リットル以上</th>
									<td>Kランク</td>
									<td>12,960円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol refrigerate-->
					<div class="fourcol col rankCharge last">
						<span class="icon-laptop"></span>
						<h6>パソコン</h6>
						<table>
							<tbody>
								<tr>
									<th>デスクトップ本体</th>
									<td>Bランク</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th>ノートパソコン</th>
									<td>Bランク</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th>一体型パソコン</th>
									<td>Dランク</td>
									<td>2,160円</td>
								</tr>
								<tr>
									<th>モニタ(液晶/ブラウン管)</th>
									<td>Cランク</td>
									<td>1,620円</td>
								</tr>
								<tr>
									<th>マウス・キーボード</th>
									<td>Aランク</td>
									<td>540円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol laptop-->
					<div class="fourcol col rankCharge">
						<span class="icon-airconditioner"></span>
						<h6>エアコン</h6>
						<table>
							<tbody>
								<tr>
									<th>窓用エアコン</th>
									<td>Fランク</td>
									<td>3,240円</td>
								</tr>
								<tr>
									<th>エアコン(室外機付)</th>
									<td>Hランク</td>
									<td>5,940円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol air airconditioner-->
					<div class="fourcol col rankCharge">
						<span class="icon-washingmachine"></span>
						<h6>洗濯機</h6>
						<table>
							<tbody>
								<tr>
									<th>洗濯機 8.0㎏以下</th>
									<td>Gランク</td>
									<td>4,320円</td>
								</tr>
								<tr>
									<th>ドラム式洗濯乾燥機</th>
									<td>Hランク</td>
									<td>5,940円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol washingmachine-->
					<div class="fourcol col rankCharge last">
						<span class="icon-clothesdryer"></span>
						<h6>衣類乾燥機</h6>
						<table>
							<tbody>
								<tr>
									<th>全サイズ</th>
									<td>Fランク</td>
									<td>3,240円</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--fourcol clothesdryer-->
					<div class="twelvecol col last">
						<p class="footnote">
							<small>※1 すべて冷凍含サイズです。</small>
						</p>
					</div>
				</div><!--#itemCharges #electricApp-->

				<div id="itemRank" class="itemChargesDetails">
					<div class="twelvecol col last">
						<h5>各品物別ランク料金</h5>
					</div>
					<div class="threecol col rankCharge">
						<h6>A ランク 540円</h6>
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
									<td colspan="2" class="itemEx">炊飯器、ミキサー、オーブントースター、サッカーボール、ビデオカメラ等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>B ランク 1,080円</h6>
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
									<td colspan="2" class="itemEx">加湿器、縦型掃除機、ダイニングチェア、ノートパソコン、パソコン本体、布団、ガステーブル(2口)、ＤＶＤプレーヤー、ギター等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>C ランク 1,620円</h6>
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
									<td colspan="2" class="itemEx">カラーBOX(3段)、姿見、空気清浄器、スキー板等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge last">
						<h6>D ランク 2,160円</h6>
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
									<td colspan="2" class="itemEx">デスクチェア、こたつ、電子レンジ、ミニコンポ、一体型パソコン等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>E ランク 2,700円</h6>
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
									<td colspan="2" class="itemEx">家庭用複合機、ホットカーペット、レッグマジック、ステッパー等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>F ランク 3,240円</h6>
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
									<td colspan="2" class="itemEx">レンジ台、オイルヒーター、電子キーボード等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>G ランク 4,320円</h6>
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
									<td colspan="2" class="itemEx">自転車、ダイニングセット(二人用)、エアロバイク等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge last">
						<h6>H ランク 5,940円</h6>
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
									<td colspan="2" class="itemEx">A3レーザープリンタ、ウッドカーペット等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>I ランク 7,560円</h6>
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
									<td colspan="2" class="itemEx">足踏みミシン、ダイニングセット(四人用)、白黒業務用コピー機</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>J ランク 9,720円</h6>
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
									<td colspan="2" class="itemEx">エレクトーン、大型マッサージ機等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col rankCharge">
						<h6>K ランク 12,960円</h6>
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
									<td colspan="2" class="itemEx">電子ピアノ、介護ベッド等</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="threecol col last"></div>
				</div><!--#itemCharges #itemRank-->
			<!--#itemCharges--></section>

			<section class="tabContents" id="spworksCharges">
				<div class="linkMenu twelvecol col last">
					<div class="tab"><a href="#basicCharges">基本料金</a></div>
					<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
					<h4><a href="#spworksCharges">特殊作業料金</a></h4>
					<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
				</div>
				<div class="twelvecol col last listCharge">
					<p>エコ回収をするうえで必要な作業に対して頂戴する料金です。お客様自身で作業を行って頂ければ料金は頂戴致しません。</p>
					<table>
						<tbody>
							<tr>
								<th><h5>外階段作業</h5><sup>※1 ※2</sup></th>
								<td>集合住宅の共有スペースや戸建の屋外に設置されている階段を利用して行う作業です。</td>
								<td>540円/階</td>
							</tr>
							<tr>
								<th><h5>内階段作業</h5><sup>※1 ※2</sup></th>
								<td>戸建、メゾネットなど室内にある階段を利用して行う作業です。</td>
								<td>2,160円/階</td>
							</tr>
							<tr>
								<th><h5>解体作業</h5><sup>※1</sup></th>
								<td>ベッドフレームや大型クローゼットなどの解体を行います。10分1,080円が目安となります。 </td>
								<td>1,080円/10分</td>
							</tr>
							<tr>
								<th><h5>吊り下ろし作業</h5><sup>※1</sup></th>
								<td>お部屋の中の階段を通らない大型家具などをベランダや窓から外に運び出す作業です。</td>
								<td>11,880 / 円</td>
							</tr>
							<tr>
								<th><h5>養生作業</h5></th>
								<td>集合住宅の共有スペース(エレベーター周りやエントランスなど)を保護するためにプラスチックのシートを壁や床に貼る作業です。作業量により、料金が変動致します。お住まいの集合住宅によっては、数点のお運び出しの場合もこちらの作業が必要になりますので、事前にご確認ください。</td>
								<td>1,080円～</td>
							</tr>
							<tr>
								<th><h5>エアコン取り外し工事</h5></th>
								<td>お住まいに設置されているエアコンの室内機と室外機を取り外す工事です。室外機の設置場所や設置方法(床置き、天井吊りなど)により料金が異なります。</td>
								<td>9,720円/台～</td>
							</tr>
						</tbody>
					</table>
					<div class="footnote">
						<p>
							<small>※1 お品物ごとに作業料金が適用されます。</small>
							<small>※2 料金ランクがFランク以上のお品物のみが適用対象になります。</small>
							<small>※3 お品物ごとに作業料金が適用されます。</small>
						</p>
					</div>
				</div>
			<!--#spworksCharges--></section>

			<section class="tabContents" id="optionsCharges">
				<div class="linkMenu twelvecol col last">
					<div class="tab"><a href="#basicCharges">基本料金</a></div>
					<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
					<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					<h4><a href="#optionsCharges">オプション料金</a></h4>
				</div>
				<div class="twelvecol col last listCharge">
					<p>お客様のご希望により自由に選択して頂けるサービスの料金です。</p>
					<table>
						<tbody>
							<tr>
								<th><h5>時間帯指定サービス</h5><sup>※1</sup></th>
								<td colspan="2">3時間枠でお時間帯をご指定頂けます。(お時間枠：9～12時、11～14時、13～16時、15～18時)</td>
								<td>1,080円</td>
							</tr>
							<tr>
								<th><h5>当日集荷サービス</h5><sup>※2</sup></th>
								<td colspan="2">受付日当日にお伺いさせて頂くサービスです。</td>
								<td>2,160円</td>
							</tr>
							<tr>
								<th><h5>夜間指定サービス</h5></th>
								<td colspan="2">18時～20時の間でお伺いさせて頂くサービスです。</td>
								<td>3,240円</td>
							</tr>
							<tr>
								<th><h5>レディースサービス</h5><sup>※3</sup></th>
								<td colspan="2">女性スタッフによるお伺いをお約束致します。</td>
								<td>1,080円</td>
							</tr>
							<tr>
								<th rowspan="2"><h5>目の前あんしんデータ消去サービス</h5><sup>※4</sup></th>
								<td rowspan="2">お客様の目の前でパソコンからハードディスクを取り出し、物理的に破壊するサービスです。  </td>
								<td class="split">デスクトップ本体</td>
								<td>2,160円</td>
							</tr>
							<tr>
								<td class="split">ノートPC / 一体型PC</td>
								<td> 4,320円</td>
							</tr>
						</tbody>
					</table>
					<div class="footnote">
						<p>
							<small>※1 ご指定がない場合はご訪問前日の18～21時の間にお伺い予定時間を3時間枠でご連絡致します。</small>
							<small>※2 ご予約状況により、承ることができない可能性もございますので、あらかじめご了承ください。</small>
							<small>※3 女性1名、男性1名でのお伺いになります。 女性のお客様対象のサービスです。</small>
							<small>※4 こちらのサービスをご希望されない場合はセンターに持ち帰ってデータ消去を行います。</small>
						</p>
					</div>
				</div>
			<!--#optionsCharges--></section>

		<!--#priceDetails--></section>

		<section class="contents" id="simulations">

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
			<!-- #familyA simulations --></section>

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
			<!-- #familyB simulations --></section>

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
			<!-- #familyC simulations --></section>

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
			<!-- #familyD simulations --></section>

		<!--#simulations--></section>

	<!-- .container --></div>

<?php get_footer(); ?>