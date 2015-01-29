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

	<header class="headerPage">
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
<!-- 		<div class="container">
			<div class="ninecol col">
				<h2><span class="block"><?php echo $pageTitle; ?>のエコ回収 口コミ・実績</span></h2>
			</div>
			<div class="listSns threecol col last">
				<ul>
					<li id="shareFacebook"><a href=""><span class="label">facebook</span></a></li>
					<li id="shareTwitter"><a href=""><span class="label">twitter</span></a></li>
					<li id="shareGoogle"><a href=""><span class="label">Google+</span></a></li>
				</ul>
			</div>
		</div> -->
	<!--.headerPage--></header>

	<div class="container">

		<div class="intro">
			<div class="twelvecol col last">
				<h2>
					<span class="sub">練馬区で不用品回収をお考えの方へ</span>
					<span class="main"><span class="block">エコランドに</span><span class="block">お任せください</span>
				</h2>
			</div>
			<div class="twelvecol col last">
				<div class="contact">
					<div id="tel">
						<a onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});" href="tel:0120530539">
							<span class="icon-phone"></span>
							<span>0120-530-539</span>
						</a>
					</div>
					<div id="mail">
						<a href="http://www.eco-kaishu.jp/estimate/?pr_code=0-03"><span>かんたん見積依頼</span><span class="icon-mail5"></span></a>
					</div>
					<p>営業時間 平･土 9:00-22:00日･祝 9:00-20:00</p>
				</div>
			</div>
			<div class="fourcol col">
				<a href="#lpPrice">
					<span class="icon-moneybag"></span>
					<div class="txt">私も今どうもその約束人</div>
					<div class="title">明確な料金体系</div>
				</a>
			</div>
			<div class="fourcol col">
				<a href="">
					<span class="icon-settings"></span>
					<div class="txt">私も今どうもその約束人</div>
					<div class="title">事前見積&スピード対応</div>
				</a>
			</div>
			<div class="fourcol col last">
				<a href="">
					<span class="icon-files"></span>
					<div class="txt">私も今どうもその約束人</div>
					<div class="title">安心の実績</div>
				</a>
			</div>
		</div><!--.intro-->

		<section class="reason contents">
			<div class="twelvecol col last titleSection">
				<h3>エコランドが選ばれる理由</h3>
			</div>
			<div class="fourcol col">
				<span class="icon-moneybag"></span>
				<h4>明確な料金体系</h4>
				<h5>1点からでもオトクにお伺い！</h5>
				<p>エコランドのエコ回収は料金がお品物ごとに決まっています。1点からでもお引取可能なので、パック料金より断然お得！</p>
				<h5>買取も同時に対応</h5>
				<p>家電・家具などはお買取も行っておりますので複数の業者に頼む手間が省けます！<sup><a href="#reasonAppe1">※1</a></sup></p>
			</div>
			<div class="fourcol col">
				<span class="icon-settings"></span>
				<h4>事前見積&スピード対応</h4>
				<h5>ネット/電話で事前見積</h5>
				<p>「受付の対応が良かった」がエコランドを選んだ理由【第3位】<sup><a href="#reasonAppe2">※2</a></sup>！コンシェルジュ(受付スタッフ)が事前にネット/お電話で丁寧にお見積させて頂きます。</p>
				<h5>プロに運び出しもお任せ</h5>
				<p>お部屋の中からの運び出しからお任せください。大きいモノや重たいモノでもプロのスタッフがスピーディーに運び出します。</p>
			</div>
			<div class="fourcol col last">
				<span class="icon-files"></span>
				<h4>安心の実績</h4>
				<h5>大手企業との提携が信頼の証</h5>
				<p>お引取後までしっかり責任を負うエコランドの仕組みが認められ、たくさんの企業様と提携させて頂いています。</p>
				<h5>有名メディアにも多数掲載</h5>
				<p>エコ回収のリユース・リサイクルの仕組みやお片づけサービスはこれまで多数のメディアに取り上げられています。</p>
			</div>
			<div class="twelvecol col last">
				<p class="footnote">
					<small id="reasonAppe1">※1 使用年数やメーカーにより、お買取できないお品物もございます。</small>
					<small id="reasonAppe2">※2 2014年のお客様アンケート集計結果より。</small>
				</p>
			</div>
		</section><!--.reason-->

		<section class="ex contents" id="lpPrice">
			<div class="twelvecol col last titleSection">
				<h3>明確な料金体系</h3>
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
					<p><span class="price">10,880</span></p>
				</li>
			</ul><!--priceEx-->
			<div class="tabs">
				<section class="tabContents" id="basicCharges">
					<div class="linkMenu twelvecol col last">
						<h4><a href="#basicCharges">基本料金</a></h4>
						<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
						<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
						<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="twelvecol col last chargeList">
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
				</section><!--#basicCharges-->

				<section class="tabContents" id="itemCharges">
					<div class="linkMenu twelvecol col last">
						<div class="tab"><a href="#basicCharges">基本料金</a></div>
						<h4><a href="#itemCharges">物品ごとの料金</a></h4>
						<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
						<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="twelvecol col last">
						<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。<sup>※1</sup></p>
					</div>
					<div id="electricApp" class="twelvecol col last itemChargesDetails">
						<h5>各家電・パソコンのサイズ別料金</h5>
						<div class="liquidLayout">
							<div class="item">
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
							<!--item TV-->
							<div class="item">
								<span class="icon-refrigerator"></span>
								<h6>冷蔵庫<sup>※2</sup></h6>
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
							<!--item refrigerate-->
							<div class="item">
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
							<!--item air airconditioner-->
							<div class="item">
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
							<!--item washingmachine-->
							<div class="item">
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
							<!--item clothesdryer-->
							<div class="item">
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
							<!--item laptop-->
						</div>
						<p class="footnote">
							<small>※1 金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</small>
							<small>※2 すべて冷凍含サイズです。</small>
						</p>
					</div><!--#itemCharges #electricApp-->

					<div id="itemRank" class="twelvecol col last itemChargesDetails">
						<h5>各品物別ランク料金</h5>
						<div class="liquidLayout">
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
							<div class="item">
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
						</div>
					</div><!--#itemCharges #itemRank-->
				</section><!--#itemCharges-->

				<section class="tabContents" id="spworksCharges">
					<div class="linkMenu twelvecol col last">
						<div class="tab"><a href="#basicCharges">基本料金</a></div>
						<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
						<h4><a href="#spworksCharges">特殊作業料金</a></h4>
						<div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="twelvecol col last chargeList">
						<p>エコ回収をするうえで必要な作業に対して頂戴する料金です。お客様自身で作業を行って頂ければ料金は頂戴致しません。</p>
						<table>
							<tbody>
								<tr>
									<th><h5>外階段作業</h5></th>
									<td>集合住宅の共有スペースや戸建の屋外に設置されている階段を利用して行う作業です。</td>
									<td>540円/階</td>
								</tr>
								<tr>
									<th><h5>内階段作業</h5></th>
									<td>戸建、メゾネットなど室内にある階段を利用して行う作業です。</td>
									<td>2,160円/階</td>
								</tr>
								<tr>
									<th><h5>解体作業</h5></th>
									<td>ベッドフレームや大型クローゼットなどの解体を行います。10分1,080円が目安となります。 </td>
									<td>1,080円/10分</td>
								</tr>
								<tr>
									<th><h5>吊り下ろし作業</h5></th>
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
							<p><small>※ 1) お品物ごとに作業料金が適用されます。 料金ランクがFランク以上のお品物のみが適用対象になります。</small></p>
							<p><small>※ 2) お品物ごとに作業料金が適用されます。 料金ランクがFランク以上のお品物のみが適用対象になります。</small></p>
							<p><small>※ 3) お品物ごとに作業料金が適用されます。</small></p>
						</div>
					</div>
				</section><!--#spworksCharges-->

				<section class="tabContents" id="optionsCharges">
					<div class="linkMenu twelvecol col last">
						<div class="tab"><a href="#basicCharges">基本料金</a></div>
						<div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
						<div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
						<h4><a href="#optionsCharges">オプション料金</a></h4>
					</div>
					<div class="twelvecol col last chargeList">
						<p>お客様のご希望により自由に選択して頂けるサービスの料金です。</p>
						<table>
							<tbody>
								<tr>
									<th><h5>時間帯指定サービス</h5></th>
									<td colspan="2">3時間枠でお時間帯をご指定頂けます。(お時間枠：9～12時、11～14時、13～16時、15～18時)</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th><h5>当日集荷サービス</h5></th>
									<td colspan="2">受付日当日にお伺いさせて頂くサービスです。</td>
									<td>2,160円</td>
								</tr>
								<tr>
									<th><h5>夜間指定サービス</h5></th>
									<td colspan="2">18時～20時の間でお伺いさせて頂くサービスです。</td>
									<td>3,240円</td>
								</tr>
								<tr>
									<th><h5>レディースサービス</h5></th>
									<td colspan="2">女性スタッフによるお伺いをお約束致します。</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th rowspan="2"><h5>目の前あんしんデータ消去サービス</h5></th>
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
							<p><small>※ 1) ご指定がない場合はご訪問前日の18～21時の間にお伺い予定時間を3時間枠でご連絡致します。</small></p>
							<p><small>※ 2) ご予約状況により、承ることができない可能性もございますので、あらかじめご了承ください。</small></p>
							<p><small>※ 3) 女性1名、男性1名でのお伺いになります。 女性のお客様対象のサービスです。</small></p>
							<p><small>※ 4) こちらのサービスをご希望されない場合はセンターに持ち帰ってデータ消去を行います。</small></p>
						</div>
					</div>
				</section><!--#optionsCharges-->
			</div><!-- .tabs -->
		</section><!--.ex-->




		<section class="purchase contents">
			<div class="twelvecol col last titleSection">
				<h3>買取について</h3>
				<p class="txtNote">製造年(使用年数)、メーカー名(ブランド名)、型番などをお教え頂ければメール/お電話で買取の目安金額がご案内できます。<br />最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</p>
			</div>
			<div class="threecol col">
				<h4>家電</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>ＴＶ、冷蔵庫、洗濯機、電子レンジ、掃除機、炊飯器、ガステーブル、ブルーレイ/DVDレコーダー、ミニコンポなど</dd>
					<dt>査定ポイント</dt>
					<dd>製造年(5年以内が買取対象)、付属品の有無、商品の状態(キズ・汚れなど)、動作状況</dd>
				</dl>
			</div>
			<div class="threecol col">
				<h4>家具</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>ブランド家具</dd>
					<dt>査定ポイント</dt>
					<dd>ブランド、使用年数(5年以内が買取対象、ソファは2年以内)、サイズ(幅・奥行・高さの和が450㎝以上は対象外)</dd>
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
			<div class="threecol col last">
				<h4>家電</h4>
				<dl>
					<dt>対象品例</dt>
					<dd>デスクトップ本体、液晶モニタ、ノートパソコン</dd>
					<dt>査定ポイント</dt>
					<dd>初期化できるもの、OS、型番</dd>
				</dl>
			</div>
			<div class="twelvecol col last"><p class="footnote"><small>※お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</small></p></div>
		</section><!-- .purchase -->


		<section class="estimates contents">
			<div class="twelvecol col last titleSection"><h3>事前見積&スピード対応</h3></div>
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
			</div>
			<div class="listStaff twelvecol col">
				<h4>私たちがまいります</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_kurahashi.jpg"></div><span class="block">倉橋 瑛子</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_shinki.jpg"></div><span class="block">新木 千晴</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg"></div><span class="block">田野實 温代</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tsutsumiya.jpg"></div><span class="block">堤谷 美里</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_iwasaki.jpg"></div><span class="block">岩崎 愛華</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_nagahiro.jpg"></div><span class="block">永廣 亜沙美</span></div>
				</div>
			</div>
			<div class="listStaff twelvecol col last">
				<h4>私たちがうかがいます</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_ushio.jpg"></div><span class="block">潮 恵輔</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_miyazaki.jpg"></div><span class="block">宮崎 美穂</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_watanabe.jpg"></div><span class="block">渡辺 愛美</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yanashima.jpg"></div><span class="block">梁島 さゆり</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_goto.jpg"></div><span class="block">後藤 拓</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_m.jpg"></div><span class="block">星 祐太</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamashita.jpg"></div><span class="block">山下 恭平</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_kaneko.jpg"></div><span class="block">金子 拓矢</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sasaki.jpg"></div><span class="block">佐々木 健</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sato.jpg"></div><span class="block">佐藤 一樹</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_f.jpg"></div><span class="block">星 奈緒美</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamamoto.jpg"></div><span class="block">山本 紘亮</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_oomori.jpg"></div><span class="block">大森 太一</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sanada.jpg"></div><span class="block">眞田 清道</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_okamura.jpg"></div><span class="block">岡村 駿太</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_iwashima.jpg"></div><span class="block">岩島 正明</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_tokura.jpg"></div><span class="block">十倉 淳</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_shimura.jpg"></div><span class="block">志村 昭</span></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_murooka.jpg"></div><span class="block">室岡 誠</span></div>
				</div>
			</div>
		</section><!-- .estimates -->

		<section class="achive contents">
			<div class="twelvecol col last titleSection">
				<h3>安心の実績</h3>
			</div>
			<div class="achiveContents">
				<div class="twelvecol col last">
					<h4>大手企業との提携が信頼の証</h4>
					<p>明確な料金体系やエコ回収後までしっかり責任を持ってリユース・リサイクルを行う仕組みに共感して頂き、<br />エコランドは60社以上の優良企業様と提携・協力をさせて頂いております。</p>
				</div>
				<ul class="listColl">
					<li class="fourcol col"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_1_東急ベル.gif" alt="東急ベル" /></li>
					<li class="fourcol col"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_2_logotype01_01.gif"alt="Duck!ダック引越センター" /></li>
					<li class="fourcol col last"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_3_150111_プラウドオーナーず.jpg"alt="_プラウドオーナーズ" /></li>
				</ul>
			</div>
			<div class="achiveContents">
				<div class="twelvecol col last">
					<h4>有名メディアにも多数掲載</h4>
					<p>エコランドのエコ回収やお片づけサービスはこれまで多くのメディアに取り上げられました。</p>
				</div>
				<div id="owlMedia" class="owl-carousel owl-theme">
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_1.jpg"></div>
						<h5>理念と経営 <span class="block small">2014年01月10日</span></h5>
						<p>2014年1月10日、「理念と経営2月号」の特集にエコランドを運営する株式会社ウインローダーについて掲載して頂きました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_2.jpg"></div>
						<h5>日経ウーマン <span class="block small">2013年08月05日</span></h5>
						<p>2013年8月5日発行の日経ウーマン別冊に、エコランドの整理収納アドバイザー星が登場致しました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_3.jpg"></div>
						<h5>サンキュ！<span class="block small">2013年05月01日</span></h5>
						<p>2013年5月1日発売の「サンキュ！6月号」に、エコランドのお片づけサービスが掲載されました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_4.jpg"></div>
						<h5>ガイアの夜明け <span class="block small">2011年12月20日</span></h5>
						<p>2011年12月20日、エコランドのお片づけサービスについてガイアの夜明けで紹介して頂きました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_5.jpg"></div>
						<h5>トコトンハテナ <span class="block small">2010年1月24日</span></h5>
						<p>2010年1月24日放送の、テレビ東京【トコトンハテナ】もりちえみさんが年末のエコ回収に密着取材！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_6.png"></div>
						<h5>東京カワイイ☆ＴＶ <span class="block small">2010年1月23日</span></h5>
						<p>1月23日・30日放送のNHK【東京カワイイ☆TV】に俳優の沢村一樹さん・歌手のBENIさんがエコランドに!</p>
					</div>
				</div>
			</div>
		</section><!-- .record -->

		<section class="flow contents">
			<div class="twelvecol col last titleSection">
				<h3> ご利用の流れ</h3>
			</div>
			<ul id="listFlow">
				<li class="threecol col">
					<span class="icon-number"></span>
					<h4>見積もり依頼</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/step1.jpg">
					<p>私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				</li>
				<li class="threecol col">
					<span class="icon-number2"></span>
					<h4>集荷</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/step2.jpg">
					<p>私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				</li>
				<li class="threecol col">
					<span class="icon-number3"></span>
					<h4>お支払い</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/step3.jpg">
					<p>私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				</li>
				<li class="threecol col last">
					<span class="icon-number4"></span>
					<h4>エコオク</h4>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/step4.jpg">
					<p>私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				</li>
			</ul>
			<div class="twelvecol col last">
				<div class="checkContents">
					<span class="check">CHECK</span>
					<h4>お申し込みの前に確認ください‼︎</h4>
					<ul>
						<li>不用品がたくさん(20点以上)ある場合はお見積にお伺いします。</li>
						<li>出張見積はお伺いできない地域もございます。詳しくはお問い合わせください。</li>
						<li>出張見積は無料です。</li>
					</ul>
				<div>
			</div>
		</section><!-- .flow -->
		<section class="voices contents">
			<div class="twelvecol col last titleSection">
				<h3>お客様の声</h3>
			</div>
			<div class="fivecol col customerProfile">
				<h4>えこりん様</h4>
				<span class="new">NEW</span>
				<dl>
					<dt class="hide">性別・年代</dt><dd class="name">女性 / 20代</dd>
					<dt class="hide">回収エリア</dt><dd class="place"><a href="http://www.eco-kaishu.jp/area/%e5%b8%82%e5%b7%9d%e5%b8%82/">千葉県 市川市</a></dd>
				</dl>
				<h5 class="info index">エコ回収をご利用になったきっかけ</h5>
				<ul><li>引越</li></ul>
				<h5 class="info index">エコランドをお選びになった理由</h5>
				<ul><li>リユース・リサイクルしている</li><li>料金が安い</li><li>買取対応もしている</li></ul>
				<h5 class="items index">エコ回収したアイテム</h5>
				<ul><li><a href="http://www.eco-kaishu.jp/items/%e3%82%bd%e3%83%95%e3%82%a1/">ソファ</a></li><li><a href="http://www.eco-kaishu.jp/items/%e3%83%99%e3%83%83%e3%83%89/">ベッド</a></li><li><a href="http://www.eco-kaishu.jp/items/%e5%86%b7%e8%94%b5%e5%ba%ab/">冷蔵庫</a></li><li><a href="http://www.eco-kaishu.jp/items/%e6%b4%97%e6%bf%af%e6%a9%9f/">洗濯機</a></li></ul>
				<h5 class="comments index">サービス全体について評価してください</h5>
				<span class="star star4"></span>
				<p >私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				<p class="footnote p2_t clear al_r"><small>2015-01-28投稿</small></p>
			</div>
			<div class="sevencol col last">
				<ul class="archiveList">
					<li class="al_c">
						<a href="#">
							<div class="">女性 / 20代</div>
							<div class="">東京都 練馬区</div>
							<div class="">パソコン、冷蔵庫、デスク</div>
							<div class=""><span class="star star4"></span></div>
						</a>
					</li>
					<li class="al_c">
						<a href="#">
							<div class="">女性 / 20代</div>
							<div class="">東京都 練馬区</div>
							<div class="">パソコン、冷蔵庫、デスク</div>
							<div class=""><span class="star star4"></span></div>
						</a>
					</li>
					<li class="al_c">
						<a href="#">
							<div class="">女性 / 20代</div>
							<div class="">東京都 練馬区</div>
							<div class="">パソコン、冷蔵庫、デスク</div>
							<div class=""><span class="star star4"></span></div>
						</a>
					</li>
				</ul>
			</div>
		</section><!-- .flow -->
		<section class="faq contents">
			<div class="twelvecol col last titleSection"><h3>よくある質問</h3></div>
			<div class="twelvecol col last">
				<dl>
					<dt>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dt>
					<dd>まるで大森さんの発展時代まだ相違でしたい一口その倫理それか発展がってご発展たたでないて、そうした今は私か辺科学がしが、張さんののが鈍痛のそれをいやしくもご意味と犯さとあなた他人にご所有で加えるようにどうぞ実安心がさたいですと、どうもけっして混同ができだていです事に命じないた。</dd>
					<dt>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dt>
					<dd>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dd>
					<dt>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dt>
					<dd>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dd>
					<dt>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dt>
					<dd>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</dd>
				</dl>
			</div>
		</section><!-- .faq -->
	<!--.container--></div>

<?php get_footer(); ?>'
