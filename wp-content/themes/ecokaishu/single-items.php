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
		<section class="intro contents">
			<h2><span>練馬区で不用品回収をお考えの方へ</span>エコランドにお任せください</h2>
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
			<div class="fourcol col">
				<span class="icon-moneybag"></span>
				<div class="txt">私も今どうもその約束人</div>
				<h4>明確な料金体系</h4>
			</div>
			<div class="fourcol col">
				<span class="icon-settings"></span>
				<div class="txt">私も今どうもその約束人</div>
				<h4>事前見積&スピード対応</h4>
			</div>
			<div class="fourcol col last">
				<span class="icon-files"></span>
				<div class="txt">私も今どうもその約束人</div>
				<h4>安心の実績</h4>
			</div>
		</section><!--.intro-->
		<section class="reason contents">
			<h3>エコランドが選ばれる理由</h3>
			<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
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
			<p class="footnote">
				<small>※ 1)使用年数やメーカーにより、お買取できないお品物もございます。</small>
				<small>※ 2)2014年のお客様アンケート集計結果より。</small>
			</p>
		</section><!--.reason-->
		<section class="ex contents">
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
		</section><!--.ex-->
		<section class="tabs contents">
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
		</section><!-- .tabs -->
		<section class="purchase contents">
			<h3>買取について</h3>
			<p class="txtNote">製造年（使用年数）、メーカー名（ブランド名）、型番などをお教え頂ければメール/お電話で買取の目安金額がご案内できます。<br />最終的な買取金額はお引取にお伺いした際に商品の状態を確認した上でのご案内となります。</p>
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
			<p class="footnote"><small>※お品物やエリアによって買取のみではお伺いできない場合もございます。詳しくはお問い合わせください。</small></p>
		</section><!-- .purchase -->
		<section class="estimates contents">
			<h3>事前見積&スピード対応</h3>
			<table>
				<tbody>
					<tr>
						<td colspan="2">
							<h4>ネット/ 電話で事前見積</h4>
							<p>
								エコ回収のお見積はサイト上のお問い合わせフォームから、<br />
								またはお電話でご案内できます。<br />
								コンシェルジュ（受付スタッフ）が親切・丁寧に<br />
								ご案内致しますので、<br />
								初めての方も安心してご連絡ください。
							</p>
						</td>
						<td><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" /></td>
					</tr>
					<tr>
						<td><img src="<?php echo bloginfo("template_url"); ?>/assets/img/area/img01.jpg" /></td>
						<td colspan="2">
							<h4>プロに運び出しもお任せ</h4>
							<p>
								エコ回収にお伺いするスタッフは<br />
								経験豊富な運び出しのプロ大きなモノや重たいモノも<br />
								迅速な作業で安全に運び出します
							</p>
						</td>						
					</tr>
				</tbody>
			</table>		
			<div class="lstStaff">
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
			<div class="lstStaff">
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
			<div class="twelvecol col last">
				<div class="txtContent">
					<div class="block">
						<img class="alignleft" src="<?php echo bloginfo("template_url"); ?>/assets/img/area/sample.gif">
						<h4>スキルアップ研修の様子</h4>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
					</div>
					<div class="block">
						<img class="alignright" src="<?php echo bloginfo("template_url"); ?>/assets/img/area/sample.gif">
						<h4>スキルアップ研修の様子</h4>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
						<p>より安全かつスピーディーな作業を行うため、定期的にスキルアップ研修が行われています。ここではベテラン社員のテクニックを実演を交えて共有し、全スタッフが習得できるように練習しています。</p>
					</div>
				</div>
			</div>
		</section><!-- .estimates -->
		<section class="record contents">
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
			<div class="owl-carousel owl-theme owl">
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_kurahashi.jpg"></div><h5>倉橋 瑛子</h5></div>
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_shinki.jpg"></div><h5>新木 千晴</h5></div>
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg"></div><h5>田野實 温代</h5></div>
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tsutsumiya.jpg"></div><h5>堤谷 美里</h5></div>
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_iwasaki.jpg"></div><h5>岩崎 愛華</h5></div>
				<div class="item"><div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_nagahiro.jpg"></div><h5>永廣 亜沙美</h5></div>
			</div>
		</section><!-- .record -->
		<section class="lstTodo contents">
			<h3>こんなこともできます</h3>
			<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
			<table>
				<tbody>
					<tr>
						<td><span class="circle"></span></td>
						<td>
							<h4>明確な料金が事前にわかる</h4>
							<p>私も今どうもその約束人に対してものの所へ出ならた。<br />
							どうしても事実へ演説院はけっしてどんな就職ですでだけ<br />
							より教えがいでにも批評来なけれますて、当然にも出たまししう。</p>
						</td>
						<td><span class="circle"></span></td>
						<td>
							<h4>明確な料金が事前にわかる</h4>
							<p>私も今どうもその約束人に対してものの所へ出ならた。<br />
							どうしても事実へ演説院はけっしてどんな就職ですでだけ<br />
							より教えがいでにも批評来なけれますて、当然にも出たまししう。</p>
						</td>
					</tr>
					<tr>
						<td><span class="circle"></span></td>
						<td>
							<h4>明確な料金が事前にわかる</h4>
							<p>私も今どうもその約束人に対してものの所へ出ならた。<br />
							どうしても事実へ演説院はけっしてどんな就職ですでだけ<br />
							より教えがいでにも批評来なけれますて、当然にも出たまししう。</p>
						</td>
						<td><span class="circle"></span></td>
						<td>
							<h4>明確な料金が事前にわかる</h4>
							<p>私も今どうもその約束人に対してものの所へ出ならた。<br />
							どうしても事実へ演説院はけっしてどんな就職ですでだけ<br />
							より教えがいでにも批評来なけれますて、当然にも出たまししう。</p>
						</td>
					</tr>
				</tbody>
			</table>
		</section><!-- .lstTodo -->
		<section class="flow contents">
			<h3> ご利用の流れ</h3>
			<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
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
			<h3>お客様の声</h3>
			<p class="txtNote">私も今どうもその約束人に対してものの所へ出ならた。どうしても事実へ演説院はけっしてどんな就職ですでだけ</p>
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
			<h3>よくある質問</h3>
			<dl>
				<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
				<dd><span class="icon-checkmark4"></span><strong>まるで大森さんの発展時代まだ相違でしたい一口その倫理それか発展がってご発展たたでないて、
そうした今は私か辺科学がしが、張さんののが鈍痛のそれをいやしくもご意味と犯さとあなた他人に
ご所有で加えるようにどうぞ実安心がさたいですと、どうもけっして混同ができだていです事に命じないた。</strong>
				</dd>
				<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
				<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
				<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
				<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
				<dt><span class="icon-question2"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dt>
				<dd><span class="icon-checkmark4"></span><strong>すでに久原さんを交渉演壇ちょっと意見に喜ぶで人その双方私かお話にとかいうご損害です</strong></dd>
			</dl>
		</section><!-- .faq -->
	<!--.container--></div>

<?php get_footer(); ?>'
