<?php
/**
 * The main template file.
* @package Montser Platform
 */

get_header();

	//calling
	$postType = get_post_type_object(get_post_type());
	$cltItems = get_the_terms($post->ID, 'cltitems');


	if(get_the_terms($post->ID, "itemranks")){
		$ranks = get_the_terms($post->ID, "itemranks");
	}else{
		$ranks = get_terms("itemranks");
	}


	if(get_the_terms($post->ID, "spworks")){
		$spworks = get_the_terms($post->ID, "spworks");
	}else{
		$spworks = get_terms("spworks");
	}

	if(get_the_terms($post->ID, "options")){
		$options = get_the_terms($post->ID, "options");
	}else{
		$options = get_terms("options");
	}

	$itemRanks = getMetaArr($post, "itemsInfo02");
	$itemIndexs = getMetaArr($post, "itemsInfo03");
	$itemSizes = getMetaArr($post, "itemsInfo04");

	//vars of post type
	$postTypeName = $postType->name;
	$postTypeLabel = $postType->label;
	$postTypeUrl = get_post_type_archive_link($postTypeName);

	//vars
	$relatedItemIds = array();
	$relatedItemNames = array();
	$pageTitle = get_the_title($post->ID); //page title



	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02");
	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.$postTypeUrl.'" itemprop="url">
					<span itemprop="title">'.$postTypeLabel.'</span>
				</a>
			</div>';

	if(count($cltItems) > 1){ //vars for a single item page

		//get taxs
		 foreach($cltItems as $cltItem){
			if($cltItem->parent == 0){
				//$cltItemCatId = $cltItem -> term_id; //cat tax id of a single item
				$cltItemCatName = $cltItem -> name; //cat name of a single item
			}else{
				array_push($relatedItemIds, $cltItem -> term_id); // tax ids of a single item
				array_push($relatedItemNames, $cltItem -> term_name); // tax names of a single item
			}
		}

		//get a cat page
		$args = array(
			"post_type" => $postTypeName,
			"name" => $cltItemCatName
		);
		$cltItemCat = query_posts($args);
		if($cltItemCat){ // if a cat page exists
			$cltItemCatId = $cltItemCat[0]->ID;
			$cltItemCatUrl = get_permalink($cltItemCatId); //cat url of a single item
			$navPage .= '
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="'.$cltItemCatUrl.'" itemprop="url">
							<span itemprop="title">'.$cltItemCatName.'</span>
						</a>
					</div>';
		}
		wp_reset_query();

	}else{ // vars for a cat page

		//get a page
		$cltItemCatId = $post->ID;
		$cltItemCatName = $post->post_title;

	}

	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.get_permalink($post->ID).'" itemprop="url">
					<span itemprop="title">'.$pageTitle.'</span>
				</a>
			</div>';
	?>

	<div class="headerPage">
		<nav class="navPage">
			<div class="container">
				<div class="twelvecol col last">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="<?php echo siteInfo("rootUrl"); ?>" itemprop="url">
							<span itemprop="title"><?php echo bloginfo("site_name"); ?>TOP</span>
						</a>
					</div>
					<?php echo $navPage; ?>
				</div>
			</div>
		</nav>
	<!--.headerPage--></div>

	<div class="container">

		<div id="lpIntro">
			<div class="twelvecol col last">
				<h2>
					<span class="sub"><?php echo $pageTitle; ?>で不用品回収をお考えの方へ</span>
					<span class="main"><span class="block">エコランドに</span><span class="block">お任せください</span></span>
				</h2>
			</div>
			<div class="fourcol col points">
				<span class="icon-moneybag"></span>
				<p class="titlePoint">明確な料金体系</p>
				<p class="subTitlePoint">1点からでもオトクにお伺い！</p>
				<p>エコランドのエコ回収は料金がお品物ごとに決まっています。1点からでもお引取可能なので、パック料金より断然お得！</p>
				<p class="subTitlePoint">買取も同時に対応</p>
				<p>家電・家具などはお買取も行っておりますので複数の業者に頼む手間が省けます！<sup><a href="#reasonAppe1">※1</a></sup></p>
			</div>
			<div class="fourcol col points">
				<span class="icon-settings"></span>
				<p class="titlePoint">事前見積&スピード対応</p>
				<p class="subTitlePoint">ネット/電話で事前見積</p>
				<p>「受付の対応が良かった」がエコランドを選んだ理由【第3位】<sup><a href="#reasonAppe2">※2</a></sup>！コンシェルジュ(受付スタッフ)が事前にネット/お電話で丁寧にお見積させて頂きます。</p>
				<p class="subTitlePoint">プロに運び出しもお任せ</p>
				<p>お部屋の中からの運び出しからお任せください。大きいモノや重たいモノでもプロのスタッフがスピーディーに運び出します。</p>
			</div>
			<div class="fourcol col points last">
				<span class="icon-files"></span>
				<p class="titlePoint">安心の実績</p>
				<p class="subTitlePoint">大手企業との提携が信頼の証</p>
				<p>お引取後までしっかり責任を負うエコランドの仕組みが認められ、たくさんの企業様と提携させて頂いています。</p>
				<p class="subTitlePoint">有名メディアにも多数掲載</p>
				<p>エコ回収のリユース・リサイクルの仕組みやお片づけサービスはこれまで多数のメディアに取り上げられています。</p>
			</div>
			<div class="twelvecol col last">
				<p class="footnote">
					<small id="reasonAppe1">※1 使用年数やメーカーにより、お買取できないお品物もございます。</small>
					<small id="reasonAppe2">※2 2014年のお客様アンケート集計結果より。</small>
				</p>
			</div>
		<!--.lpIntro--></div>

		<section class="contents priceDetails" id="lpPriceDetails">
			<div class="twelvecol col last titleSection">
				<h3>明確な料金体系</h3>
				<p class="footnote al_c">
					<small>※すべて税込価額です。</small>
				</p>
			<!--.titleSection--></div>
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
			<section class="contentsPrice" id="basicCharges">
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
			<section class="contentsPrice" id="itemCharges">
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
			<section class="contentsPrice" id="spworksCharges">
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
						</p>
					</div>
				</div>
			<!--#spworksCharges--></section>
			<section class="contentsPrice" id="optionsCharges">
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
		<!--#lpPriceDetails--></section>

		<section class="contents purchaseDetails" id="lpPurchase">
			<div class="twelvecol col last titleSection">
				<h3>買取について</h3>
				<p class="txtNote">製造年(使用年数)、メーカー名(ブランド名)、型番などをお教え頂ければメール/お電話で買取の目安金額がご案内できます。<br />最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</p>
			<!--.titleSection--></div>
			<div class="threecol col contentsPurchase">
				<h4 class="catTitle">家電</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>ＴＶ、冷蔵庫、洗濯機、電子レンジ、掃除機、炊飯器、ガステーブル、ブルーレイ/DVDレコーダー、ミニコンポなど</dd>
					<dt>査定ポイント</dt>
					<dd>製造年(5年以内が買取対象)、付属品の有無、商品の状態(キズ・汚れなど)、動作状況</dd>
				</dl>
			<!--contentsPurchase--></div>
			<div class="threecol col contentsPurchase">
				<h4 class="catTitle">家具</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>ブランド家具</dd>
					<dt>査定ポイント</dt>
					<dd>ブランド、使用年数(5年以内が買取対象、ソファは2年以内)、サイズ(幅・奥行・高さの和が450㎝以上は対象外)</dd>
				</dl>
			<!--contentsPurchase--></div>
			<div class="threecol col contentsPurchase">
				<h4 class="catTitle">楽器</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>エレクトーン、電子ピアノ、ギター、キーボード、ベースなど</dd>
					<dt>査定ポイント</dt>
					<dd>メーカー名、製造年、型番</dd>
				</dl>
			<!--contentsPurchase--></div>
			<div class="threecol col contentsPurchase last">
				<h4 class="catTitle">パソコン</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>デスクトップ本体、液晶モニタ、ノートパソコン</dd>
					<dt>査定ポイント</dt>
					<dd>初期化できるもの、OS、型番</dd>
				</dl>
			<!--contentsPurchase--></div>
			<div class="twelvecol col last">
				<p class="footnote"><small>※お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</small></p>
			</div>
		<!-- #lpPurchase --></section>

		<section class="contents" id="lpQuality">
			<div class="twelvecol col last titleSection">
				<h3>事前見積&スピード対応</h3>
			<!--.titleSection--></div>
			<div class="strongPointDetail">
				<div class="sixcol col">
					<h4>ネット/ 電話で事前見積</h4>
					<p>
						エコ回収のお見積はサイト上のお問い合わせフォームから、またはお電話でご案内できます。<br />
						コンシェルジュ(受付スタッフ)が親切・丁寧にご案内致しますので、<br />
						初めての方も安心してご連絡ください。
					</p>
				</div>
				<!--<div class="threecol col last circleTrimming">
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" />
				</div>-->
				<!--<div class="threecol col circleTrimming">
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" />
				</div>	-->
				<div class="sixcol col last">
					<h4>プロに運び出しもお任せ</h4>
					<p>
						<span class="block">エコ回収にお伺いするスタッフは経験豊富な運び出しのプロ！</span>
						<span class="block">大きなモノや重たいモノも迅速な作業で安全に運び出します。</span>
					</p>
				</div>
			<!--.strongPointDetail--></div>
			<div class="listStaff twelvecol col">
				<h4>私たちがまいります</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_kurahashi.jpg" alt="" /></div>
						<span class="block">倉橋 瑛子</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_shinki.jpg" alt="" /></div>
						<span class="block">新木 千晴</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg" alt="" /></div>
						<span class="block">田野實 温代</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tsutsumiya.jpg" alt="" /></div>
							<span class="block">堤谷 美里</span>
						</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_iwasaki.jpg" alt="" /></div>
						<span class="block">岩崎 愛華</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_oki.jpg" alt="" /></div>
						<span class="block">隠岐 めぐみ</span>
					</div>
				</div>
			<!--.listStaff--></div>
			<div class="listStaff twelvecol col last">
				<h4>私たちがうかがいます</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_miyazaki.jpg" alt="" /></div>
						<span class="block">宮崎 美穂</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yanashima.jpg" alt="" /></div>
						<span class="block">梁島 さゆり</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_goto.jpg" alt="" /></div>
						<span class="block">後藤 拓</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_m.jpg" alt="" /></div>
						<span class="block">星 祐太</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamashita.jpg" alt="" /></div>
						<span class="block">山下 恭平</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_kaneko.jpg" alt="" /></div>
						<span class="block">金子 拓矢</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sasaki.jpg" alt="" /></div>
						<span class="block">佐々木 健</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sato.jpg" alt="" /></div>
						<span class="block">佐藤 一樹</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_f.jpg" alt="" /></div>
						<span class="block">星 奈緒美</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamamoto.jpg" alt="" /></div>
						<span class="block">山本 紘亮</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_oomori.jpg" alt="" /></div>
						<span class="block">大森 太一</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sanada.jpg" alt="" /></div>
						<span class="block">眞田 清道</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_okamura.jpg" alt="" /></div>
						<span class="block">岡村 駿太</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_iwashima.jpg" alt="" /></div>
						<span class="block">岩島 正明</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_tokura.jpg" alt="" /></div>
						<span class="block">十倉 淳</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_shimura.jpg" alt="" /></div>
						<span class="block">志村 昭</span>
					</div>
					<div class="staff">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_murooka.jpg" alt="" /></div>
						<span class="block">室岡 誠</span>
					</div>

				</div>
			<!--.listStaff--></div>
		<!-- #lpQuality --></section>

		<section class="contents" id="lpAchivements">
			<div class="twelvecol col last titleSection">
				<h3>安心の実績</h3>
			<!--.titleSection--></div>
			<div class="contentsAchivements">
				<div class="twelvecol col last">
					<h4>大手企業との提携が信頼の証</h4>
					<p>明確な料金体系やエコ回収後までしっかり責任を持ってリユース・リサイクルを行う仕組みに共感して頂き、<br />エコランドは60社以上の優良企業様と提携・協力をさせて頂いております。</p>
				</div>
				<ul class="listColl">
					<li class="fourcol col listColLogo"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listColl_logo_01.gif" alt="東急ベル" /></li>
					<li class="fourcol col listColLogo"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listColl_logo_02.gif" alt="Duck!ダック引越センター" /></li>
					<li class="fourcol col listColLogo last"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listColl_logo_03.jpg" alt="_プラウドオーナーズ" /></li>
				</ul>
			<!--.contentsAchivements--></div>
			<div class="contentsAchivements">
				<div class="twelvecol col last">
					<h4>有名メディアにも多数掲載</h4>
					<p>エコランドのエコ回収やお片づけサービスはこれまで多くのメディアに取り上げられました。</p>
				</div>
				<div id="listMedia" class="owl-carousel owl-theme">
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_01.jpg" alt="" /></div>
						<h5>理念と経営 <span class="block small">2014年01月10日</span></h5>
						<p>2014年1月10日、「理念と経営2月号」の特集にエコランドを運営する株式会社ウインローダーについて掲載して頂きました！</p>
					</div>
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_02.jpg" alt="" /></div>
						<h5>日経ウーマン <span class="block small">2013年08月05日</span></h5>
						<p>2013年8月5日発行の日経ウーマン別冊に、エコランドの整理収納アドバイザー星が登場致しました！</p>
					</div>
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_03.jpg" alt="" /></div>
						<h5>サンキュ！<span class="block small">2013年05月01日</span></h5>
						<p>2013年5月1日発売の「サンキュ！6月号」に、エコランドのお片づけサービスが掲載されました！</p>
					</div>
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_04.jpg" alt="" /></div>
						<h5>ガイアの夜明け <span class="block small">2011年12月20日</span></h5>
						<p>2011年12月20日、エコランドのお片づけサービスについてガイアの夜明けで紹介して頂きました！</p>
					</div>
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_05.jpg" alt="" /></div>
						<h5>トコトンハテナ <span class="block small">2010年1月24日</span></h5>
						<p>2010年1月24日放送の、テレビ東京【トコトンハテナ】もりちえみさんが年末のエコ回収に密着取材！</p>
					</div>
					<div class="media">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpAchivement_listMedia_img_06.jpg"></div>
						<h5>東京カワイイ☆ＴＶ <span class="block small">2010年1月23日</span></h5>
						<p>1月23日・30日放送のNHK【東京カワイイ☆TV】に俳優の沢村一樹さん・歌手のBENIさんがエコランドに!</p>
					</div>
				</div>
			<!--.contentsAchivements--></div>
		<!-- #llpAchivements --></section>

		<section class="contents" id="lpFlow">
			<div class="twelvecol col last titleSection">
				<h3> ご利用の流れ</h3>
			<!--.titleSection--></div>
			<ul class="listFlow">
				<li class="threecol col">
					<span class="icon-number"></span>
					<h4>見積もり依頼</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpFlow_img_01.jpg" alt="" />
					<p>HPで、詳しく料金がわかります。そのままお申し込みもできます。お急ぎの方はコールセンターまでお電話ください。きちんとご料金を案内します。</p>
					<p><a href="<?php echo bloginfo("template_url"); ?>/assets/pdf/%E9%9B%86%E8%8D%B7%E8%A6%8B%E7%A9%8D.pdf" target="_blank">集荷見積書の例</a></p>
				</li>
				<li class="threecol col">
					<span class="icon-number2"></span>
					<h4>集荷</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpFlow_img_02.jpg" alt="" />
					<p>到着前にお電話で確認のうえ、お伺いします。お部屋を傷つけないよう、てきぱきとまとめて運びだします。</p>
				</li>
				<li class="threecol col">
					<span class="icon-number3"></span>
					<h4>お支払い</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpFlow_img_03.jpg" alt="" />
					<p>作業終了後、現金またはクレジットカードにてご清算いただきます。お見積額から料金が変わることはありません。</p>
				</li>
				<li class="threecol col last">
					<span class="icon-number4"></span>
					<h4>エコオク</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpFlow_img_04.jpg" alt="" />
					<p>エコ回収はすべて独自オークション「エコオク」にその場で出品します。落札額の半額がキャッシュバックされるので、お財布に優しい！そして、とってもエコです。</p>
				</li>
			<!--.listFlow--></ul>
			<div class="twelvecol col last">
				<div class="contentsCheck">
					<span class="check">CHECK</span>
					<h4>お申し込みの前に確認ください‼︎</h4>
					<ul>
						<li>不用品がたくさん(20点以上)ある場合はお見積にお伺いします。</li>
						<li>出張見積はお伺いできない地域もございます。詳しくはお問い合わせください。</li>
						<li>出張見積は無料です。</li>
					</ul>
				<div>
			<!--.contentsCheck--></div>
		<!-- #lpFlow --></section>

		<?php
		$append = array("アンティーク家具", "ベッド", "掃除機", "書籍", "枕", "洗濯機", "照明", "パソコン", "パソコン周辺機器");
		$pageTitle = in_array($pageTitle, $append) ? $pageTitle."類" : $pageTitle;
		$args = array(
			"post_type" => "voices",
			"tax_query" => array(
				"relation" => "and",
				array(
					"taxonomy" => "voicekinds",
					"field" => "slug",
					"terms" => array("review")
				),
				array(
					"taxonomy" => "cltitems",
					"field" => "slug",
					"terms" => array($pageTitle)
				)
			)
		);
		$args1 = array_merge($args, array("posts_per_page" => 1));
		$newVoice =  query_posts($args1);
			if($newVoice){
				echo <<<EOF
				<section class="contents" id="lpVoices">
					<div class="twelvecol col last titleSection">
						<h3>お客様の声</h3>
					<!--.titleSection--></div>
EOF;

				foreach($newVoice as $voice){
					$name = getCustomerName($voice);
					$sex = getCustomerSex($voice);
					$age = getCustomerAge($voice);
					$area = getCustomerAreas($voice, TRUE);
					$items = getCustomerItems($voice, TRUE, "li");
					$date = get_the_date("Y-m-d", $voice->ID);
					$starts = getCustomerStarts($voice,"li");
					$features = getCustomerFeatures($voice, "li");
					$review03 = get_post_meta($voice->ID, "voiceInfo17", TRUE);
					$review03Score = get_post_meta($voice->ID, "voiceInfo16", TRUE);
					$review03ScoreIndex = getCustomerReview($post, $review03Score);
					echo <<<EOF
					<div class="fivecol col customerProfile" id="voiceNew">
						<h4>{$name}<span class="small">様より</span></h4>
						<span class="new">NEW</span>
						<dl>
							<dt class="hide">性別・年代</dt><dd class="name">{$sex} / {$age}</dd>
							<dt class="hide">回収エリア</dt><dd class="place">{$area}</dd>
						</dl>
						<h5 class="info index">エコ回収をご利用になったきっかけ</h5>
						<ul>{$starts}</ul>
						<h5 class="info index">エコランドをお選びになった理由</h5>
						<ul>{$features}</ul>
						<h5 class="items index">エコ回収したアイテム</h5>
						<ul>{$items}</ul>
						<h5 class="comments index">エコ回収サービス全体について評価してください。</h5>
						<p class="rating-foreground star star{$review03Score}">
							<meta itemprop="rating" content="{$review03Score}" />
						</p>
						<p class="m1_t" >{$review03}</p>
						<p class="footnote"><small>{$date}投稿</small></p>
					<!--.customerProfile--></div>
EOF;
				}

				$args2 = array_merge($args, array("offset" => -1));
				$voices =  query_posts($args2);
				echo <<<EOF
					<div class="sevencol col last">
EOF;
				if($voices){
					echo <<<EOF
						<ul class="archiveList">
EOF;
					foreach($voices as $voice){
						$name = getCustomerName($voice);
						$sex = getCustomerSex($voice);
						$age = getCustomerAge($voice);
						$area = getCustomerAreas($voice);
						$date = date("m/d", strtotime(getCustomerDate($voice)));
						$items = getCustomerItems($voice);
						$link = get_permalink($voice->ID);
						echo <<<EOF
							<li>
								<a href="{$link}">
									<h4>{$name}様</h4>
									<p>
										<span class="itemInfo customer">{$sex} / {$age}</span>
										<span class="itemInfo place">{$area}</span>
										<span class="itemInfo items">{$items}</span>
									</p>
									<p class="rating-foreground star star{$review03Score}"><meta itemprop="rating" content="{$review03Score}" /></p>
								</a>
							</li>
EOF;
					}
					if($voices) echo "</ul>";
			}
			echo "</div><!-- #lpVoices--></section>";
		}?>

		<?php
		$args = array(
			"post_type" => "faq",
			"posts_per_page" => -1,
			"qstcat" => $post->post_title,
			"order" => ASC,
			"orderby" => DATE,
		);
		$faqs = query_posts($args);
		if($faqs): ?>
			<section class="contents" id="lpFaq">
				<div class="twelvecol col last titleSection">
					<h3>よくある質問</h3>
				<!--.titleSection--></div>
				<div class="twelvecol col last">
					<dl class="listFaq">
					<?php foreach($faqs as $faq): ?>
						<dt><?php echo $faq->post_title; ?></dt>
						<dd><?php echo $faq->post_content; ?></dd>
					<?php endforeach; wp_reset_query();?>
					</dl>
				<!--.listFaq--></div>
			<!-- #lpFaq --></section>
		<?php endif; ?>

		<section class="contents" id="lpWords">
			<div class="twelvecol col last">
				<?php if($post->post_content): ?>
					<div class="titleSection">
						<h3><?php echo $pageTitle; ?>の処分をお考えの皆様へ</h3>
					<!--.titleSection--></div>
					<?php echo $post->post_content; ?>
				<?php endif; ?>
				
				<?php if($voiceTitles): ?>
					<div class="titleSection">
						<h3>口コミ</h3>
					</div>
					<dl class="listWords">
					<?php for($i=0; $i<count($voiceTitles); $i++){
						echo "<dt>".$voiceTitles[$i]."</dt>";
						echo "<dd>".$voiceContents[$i]."</dd>";
					}?>
					</dl>
				<?php endif; ?>
			</div>
		<!-- #lpVoices--></section>

	<!--.container--></div>

<?php get_footer(); ?>
