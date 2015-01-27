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
			<div class="twelvecol col last"><h2><span>練馬区で不用品回収をお考えの方へ</span>エコランドにお任せください</h2></div>
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
				<span class="icon-moneybag"></span>
				<div class="txt">私も今どうもその約束人</div>
				<div class="title">明確な料金体系</div>
			</div>
			<div class="fourcol col">
				<span class="icon-settings"></span>
				<div class="txt">私も今どうもその約束人</div>
				<div class="title">事前見積&スピード対応</div>
			</div>
			<div class="fourcol col last">
				<span class="icon-files"></span>
				<div class="txt">私も今どうもその約束人</div>
				<div class="title">安心の実績</div>
			</div>
		</div><!--.intro-->
		<section class="reason contents">
			<div class="twelvecol col last">
				<h3>エコランドが選ばれる理由</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
			</div>
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
			<div class="fourcol col last">
				<span class="icon-files"></span>
				<h4>安心の実績</h4>
				<h5>大手企業との提携が信頼の証</h5>
				<p>お引取後までしっかり責任を負う<br />エコランドの仕組みが認められ、<br />たくさんの企業様と提携させて頂いています。</p>
				<h5>有名メディアにも多数掲載</h5>
				<p>エコ回収のリユース・リサイクルの<br />仕組みやお片づけサービスは<br />これまで多数のメディアに取り上げられています。</p>
			</div>
			<div class="twelvecol col last">
				<p class="footnote">
					<small>※ 1)使用年数やメーカーにより、お買取できないお品物もございます。</small>
					<small>※ 2)2014年のお客様アンケート集計結果より。</small>
				</p>
			</div>
		</section><!--.reason-->
		<section class="ex contents">
			<div class="twelvecol col last">
				<h3>明確な料金体系</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
			</div>
			<ul>
				<li class="twocol col">
					<div class="title">基本料金</div>
					<span class="icon-shipping"></span>
					<p><span class="price">3,240</span></p>
				</li>
				<li class="twocol col">
					<div class="title">物品ごとの料金</div>
					<span class="icon-box2"></span>
					<p><span class="priceIndex">洗濯機</span><span class="price">4,320</span></p>
					<p><span class="priceIndex">ソファ</span><span class="price">3,240</span></p>
				</li>
				<li class="twocol col">
					<div class="title">特殊作業料金</div>
					<span class="icon-tools"></span>
					<p><span class="priceIndex m0_r">階段の運び出し</span><span class="price block">1,080</span></p>
				</li>
				<li class="twocol col">
					<div class="title">買取料金</div>
					<span class="icon-tags"></span>
					<p><span class="priceIndex">オプション</p>
				</li>
				<li class="fourcol col last">
					<div class="title">合計料金</div>
					<p><span class="price">10,880</span></p>
				</li>
			</ul>
			<div class="tabs">
				<section class="contents" id="basicCharges">
					<div class="linkMenu">
					    <h4><a href="#basicCharges" class="active">基本料金</a></h4>
					    <div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
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
				</section><!--#basicCharges-->

				<section class="contents" id="itemCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <h4><a href="#itemCharges" class="active">物品ごとの料金</a></h4>
					    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>			
					<div class="twelvecol col">
						<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。</p>
						<p class="appendix"><small>※金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</small></p>
					</div>

					<div id="electricApp" class="twelvecol col">
						<h5>各家電・パソコンのサイズ別料金</h5>
						<div class="liquidLayout">
							<div class="item">
								<span class="icon-tv2"></span>
								<h6>テレビ</h6>
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
								<h6>冷蔵庫*1</h6>
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
								<h6>エアコン</h6>
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
								<h6>衣類乾燥機</h6>
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
								<h6>洗濯機</h6>
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
								<h6>パソコン</h6>
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
					</div><!--#itemCharges #electricApp-->

					<div id="itemRank" class="twelvecol col last">
						<h5>各品物別ランク料金</h5>					
						<div class="liquidLayout">
							<div class="item">
								<h6>A ランク <br />540円</h6>
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
								<h6>B ランク <br />1,080円</h6>
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
								<h6>C ランク <br />1,620円</h6>
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
								<h6>D ランク <br />2,160円</h6>
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
								<h6>E ランク <br />2,700円</h6>
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
								<h6>F ランク <br />3,240円</h6>
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
								<h6>G ランク <br />4,320円</h6>
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
								<h6>H ランク <br />5,940円</h6>
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
								<h6>I ランク <br />7,560円</h6>
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
								<h6>J ランク <br />9,720円</h6>
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
								<h6>K ランク <br />12,960円</h6>
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
					</div><!--#itemCharges #itemRank-->
				</section><!--#itemCharges-->

				<section class="contents" id="spworksCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
					    <h4><a href="#spworksCharges" class="active">特殊作業料金</a></h4>
					    <div class="tab"><a href="#optionsCharges">オプション料金</a></div>
					</div>
					<div class="twelvecol col last">
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

				<section class="contents" id="optionsCharges">
					<div class="linkMenu">
					    <div class="tab"><a href="#basicCharges">基本料金</a></div>
					    <div class="tab"><a href="#itemCharges">物品ごとの料金</a></div>
					    <div class="tab"><a href="#spworksCharges">特殊作業料金</a></div>
					    <h4><a href="#optionsCharges" class="active">オプション料金</a></h4>
					</div>
					<div class="twelvecol col last">
						<p>お客様のご希望により自由に選択して頂けるサービスの料金です。</p>
						<table>
							<tbody>
								<tr>
									<th><h5>時間帯指定サービス</h5></th>
									<td>3時間枠でお時間帯をご指定頂けます。(お時間枠：9～12時、11～14時、13～16時、15～18時)</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th><h5>当日集荷サービス</h5></th>
									<td>受付日当日にお伺いさせて頂くサービスです。</td>
									<td>2,160円</td>
								</tr>
								<tr>
									<th><h5>夜間指定サービス</h5></th>
									<td>18時～20時の間でお伺いさせて頂くサービスです。</td>
									<td>3,240円</td>
								</tr>
								<tr>
									<th><h5>レディースサービス</h5></th>
									<td>女性スタッフによるお伺いをお約束致します。</td>
									<td>1,080円</td>
								</tr>
								<tr>
									<th><h5>目の前あんしんデータ消去サービス</h5></th>
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
				</section><!--#optionsCharges-->
			</div><!-- .tabs -->
		</section><!--.ex-->
		<section class="purchase contents">
			<div class="twelvecol col last">
				<h3>買取について</h3>
				<p class="txtNote">製造年（使用年数）、メーカー名（ブランド名）、型番などをお教え頂ければメール/お電話で買取の目安金額がご案内できます。<br />最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</p>
			</div>
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
			<div class="twelvecol col last"><h3>事前見積&スピード対応</h3></div>
			<div class="strongPointDetail">	
				<div class="ninecol col">
					<h4>ネット/ 電話で事前見積</h4>
					<p>
						エコ回収のお見積はサイト上のお問い合わせフォームから、<br />
						またはお電話でご案内できます。<br />
						コンシェルジュ（受付スタッフ）が親切・丁寧に<br />
						ご案内致しますので、<br />
						初めての方も安心してご連絡ください。
					</p>
				</div>
				<div class="threecol col last circleTrimming">
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" />
				</div>
			</div>
			<div class="strongPointDetail">
				<div class="threecol col circleTrimming">
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" />
				</div>	
				<div class="ninecol col last">
					<h4>プロに運び出しもお任せ</h4>
					<p>
						エコ回収にお伺いするスタッフは<br />
						経験豊富な運び出しのプロ大きなモノや重たいモノも<br />
						迅速な作業で安全に運び出します
					</p>
				</div>				
			</div>				
			<div class="lstStaff twelvecol col">
				<h4>私たちがまいります</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_kurahashi.jpg"></div><h5>倉橋 瑛子</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_shinki.jpg"></div><h5>新木 千晴</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg"></div><h5>田野實 温代</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tsutsumiya.jpg"></div><h5>堤谷 美里</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_iwasaki.jpg"></div><h5>岩崎 愛華</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_nagahiro.jpg"></div><h5>永廣 亜沙美</h5></div>
				</div>
			</div>
			<div class="lstStaff twelvecol col last">
				<h4>私たちがうかがいます</h4>
				<div class="owl-carousel owl-theme owl">
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_ushio.jpg"></div><h5>潮 恵輔</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_miyazaki.jpg"></div><h5>宮崎 美穂</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_watanabe.jpg"></div><h5>渡辺 愛美</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yanashima.jpg"></div><h5>梁島 さゆり</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_goto.jpg"></div><h5>後藤 拓</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_m.jpg"></div><h5>星 祐太</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamashita.jpg"></div><h5>山下 恭平</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_kaneko.jpg"></div><h5>金子 拓矢</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sasaki.jpg"></div><h5>佐々木 健</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sato.jpg"></div><h5>佐藤 一樹</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_hoshi_f.jpg"></div><h5>星 奈緒美</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_yamamoto.jpg"></div><h5>山本 紘亮</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_oomori.jpg"></div><h5>大森 太一</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_sanada.jpg"></div><h5>眞田 清道</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_okamura.jpg"></div><h5>岡村 駿太</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_iwashima.jpg"></div><h5>岩島 正明</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_tokura.jpg"></div><h5>十倉 淳</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_shimura.jpg"></div><h5>志村 昭</h5></div>
					<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/clt_img_murooka.jpg"></div><h5>室岡 誠</h5></div>
				</div>
			</div>
		</section><!-- .estimates -->
		<section class="record contents">
			<div class="twelvecol col">
				<h3>安心の実績</h3>
				<div class="al_c">
					<h4>大手企業との提携が信頼の証</h4>
					<p>明確な料金体系やエコ回収後までしっかり責任を持ってリユース・リサイクルを行う仕組みに共感して頂き、<br />エコランドは60社以上の優良企業様と提携・協力をさせて頂いております。</p>
					<p>
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_1_東急ベル.gif" />
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_2_logotype01_01.gif" />
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/G_3_150111_プラウドオーナーず.jpg" />
					</p>
					<h4>有名メディアにも多数掲載</h4>
					<p>エコランドのエコ回収やお片づけサービスはこれまで多くのメディアに取り上げられました。</p>
				</div>
			</div>
			<div class="twelvecol col last">
				<div id="owlMedia" class="owl-carousel owl-theme">
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_1.jpg"></div>
						<h4>理念と経営 <span>2014年01月10日</span></h4>
						<p>2014年1月10日、「理念と経営2月号」の特集にエコランドを運営する株式会社ウインローダーについて掲載して頂きました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_2.jpg"></div>
						<h4>日経ウーマン <span>2013年08月05日</span></h4>
						<p>2013年8月5日発行の日経ウーマン別冊に、エコランドの整理収納アドバイザー星が登場致しました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_3.jpg"></div>
						<h4>サンキュ！<span>2013年05月01日</span></h4>
						<p>2013年5月1日発売の「サンキュ！6月号」に、エコランドのお片づけサービスが掲載されました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_4.jpg"></div>
						<h4>ガイアの夜明け <span>2011年12月20日</span></h4>
						<p>2011年12月20日、エコランドのお片づけサービスについてガイアの夜明けで紹介して頂きました！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_5.jpg"></div>
						<h4>トコトンハテナ <span>2010年1月24日</span></h4>
						<p>2010年1月24日放送の、テレビ東京【トコトンハテナ】もりちえみさんが年末のエコ回収に密着取材！</p>
					</div>
					<div class="item">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/150126_6.png"></div>
						<h4>東京カワイイ☆ＴＶ <span>2010年1月23日</span></h4>
						<p>1月23日・30日放送のNHK【東京カワイイ☆TV】に俳優の沢村一樹さん・歌手のBENIさんがエコランドに!</p>
					</div>
				</div>
			</div>
		</section><!-- .record -->
		<section class="flow contents">
			<div class="twelvecol col last">
				<h3> ご利用の流れ</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
			</div>
			<ul>
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
				<div class="txtContent al_c">
					<span class="check">CHECK</span>
					<h4>お申し込みの前に確認ください‼︎</h4>
					<table class="wth">
						<tbody>
							<tr>
								<td>不用品がたくさん（20点以上）ある場合はお見積にお伺いします。</td>
							</tr>
							<tr>
								<td>出張見積はお伺いできない地域もございます。詳しくはお問い合わせください。</td>
							</tr>
							<tr>
								<td>出張見積は無料です。</td>
							</tr>
						</tbody>
					</table>
				<div>
			</div>
		</section><!-- .flow -->
		<section class="voices contents">
			<div class="twelvecol col last">
				<h3>お客様の声</h3>
				<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
			</div>
			<div class="fivecol col">
				<h4>えこりん様</h4>
				<span class="new">NEW</span>
				<dl>
					<dt><span class="icon-user"></span></dt>
					<dd class="last">
						<span>男性 / 20代</span><span>2015-01-01 回収</span><a href="#">東京都　千代田区</a>
					</dd>
					<dt><span class="icon-tag"></span></dt>
					<dd class="last">
						<span>エコ回収ご利用になったきっかけ</span><br /><span>片付け</span>
					</dd>
					<dt><span class="icon-tag"></span></dt>
					<dd class="last">
						<span>エコランドをお選びになった理由</span><br /><span>メールで見積もりできる明確な料金が事前にわかる運び出ししてもらえる</span>
					</dd>
					<dt><span class="icon-download4"></span></dt>
					<dd class="last">
						<span>エコ回収したアイテム</span><br /><a href="#">ソファ</a><a href="#">ベッド</a>
					</dd>
				</dl>
				<div class="star"></div>
				<p>私も今どうもその約束人に対してものの所へ出ならた。<br />どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
				<p class="al_r">2015-01-15 投稿</p>
			</div>
			<div class="sevencol col last">
				<ul class="archiveList">
					<li class="al_c">
						<a href="#">
							<div class="twocol col">2014-01-03</div>
							<div class="twocol col">女性 / 20代</div>
							<div class="twocol col">東京都 練馬区</div>
							<div class="threecol col">パソコン、冷蔵庫、デスク</div>
							<div class="threecol col last"><span class="star"></span> <span class="icon-arrow-right3"></span></div>
						</a>
					</li>
					<li class="al_c">
						<a href="#">
							<div class="twocol col">2014-01-03</div>
							<div class="twocol col">女性 / 20代</div>
							<div class="twocol col">東京都 練馬区</div>
							<div class="threecol col">パソコン、冷蔵庫、デスク</div>
							<div class="threecol col last"><span class="star"></span> <span class="icon-arrow-right3"></span></div>
						</a>
					</li>
					<li class="al_c">
						<a href="#">
							<div class="twocol col">2014-01-03</div>
							<div class="twocol col">女性 / 20代</div>
							<div class="twocol col">東京都 練馬区</div>
							<div class="threecol col">パソコン、冷蔵庫、デスク</div>
							<div class="threecol col last"><span class="star"></span> <span class="icon-arrow-right3"></span></div>
						</a>
					</li>
				</ul>
			</div>
		</section><!-- .flow -->
		<section class="faq contents">
			<div class="twelvecol col last"><h3>よくある質問</h3></div>
			<div class="twelvecol col last">
				<dl>
					<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
					<dd><span class="icon-checkmark4"></span><strong>まるで大森さんの発展時代まだ相違でしたい一口その倫理それか発展がってご発展たたでないて、そうした今は私か辺科学がしが、張さんののが鈍痛のそれをいやしくもご意味と犯さとあなた他人にご所有で加えるようにどうぞ実安心がさたいですと、どうもけっして混同ができだていです事に命じないた。</strong></dd>
					<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
					<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
					<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
					<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
					<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
					<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
				</dl>
			</div>
		</section><!-- .faq -->
	<!--.container--></div>

<?php get_footer(); ?>'
