<?php
/**
 * The main template file.
* @package Montser Platform
 */

get_header();

	//calling
	$postType = get_post_type_object(get_post_type());
	$cltAreas = get_the_terms($post->ID, 'cltarea');

	//vars of post type
	$postTypeName = $postType->name;
	$postTypeLabel = $postType->label;
	$postTypeUrl = get_post_type_archive_link($postTypeName);

	//vars
	$pageTitle = get_the_title($post->ID); //page title
	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02");
	$applicableAreas = get_the_terms($post->ID, 'applicablearea');
	$basicCharge = getPrice("基本料金", "金額");
	$basicCharge = $basicCharge[0];
	$basicEx = getPrice("基本料金", "内容");
	$basicChargeUnit = getPrice("基本料金", "単位");
	$areaCharge = getPrice("地域料金", "金額");
	$areaCharge = $areaCharge[0];
	$areaEx = getPrice("地域料金", "内容");
	$areaChargeUnit = getPrice("地域料金", "単位");

	$itemRanks = get_terms("itemranks", array("hide_empty" => FALSE));
	$spWorks = get_terms("spworks", array("orderby"=>"id", "order"=> "ASC", "hide_empty" => FALSE));
	$options = get_terms("options", array("orderby"=>"id", "order"=> "ASC", "hide_empty" => FALSE));

	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.$postTypeUrl.'" itemprop="url">
					<span itemprop="title">'.$postTypeLabel.'</span>
				</a>
			</div>';

	if(count($cltAreas) > 1){ //vars for a single item page

		//get taxs
		 foreach($cltAreas as $cltArea){
			if($cltArea->parent == 0){
				$cltAreaName = $cltArea -> name; //cat name of a single item
			}
		}

		//get a cat page
		$args = array(
			"post_type" => $postTypeName,
			"name" => $cltAreaName
		);
		$cltArea = query_posts($args);
		if($cltArea){ // if a cat page exists
			$cltAreaId = $cltArea[0]->ID;
			$cltAreaUrl = get_permalink($cltAreaId); //cat url of a single item
			$navPage .= '
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="'.$cltAreaUrl.'" itemprop="url">
							<span itemprop="title">'.$cltAreaName.'</span>
						</a>
					</div>';
		}
		wp_reset_query();

		//vars for area
		foreach($applicableAreas as $applicable) $service = $applicable->name;
		switch ($service) {
			case '対象内':
				$text = '対象エリア';
				break;
			case '地域料金':
				$text = '地域料金がかかるエリア';
				break;
			case 'サービス休止':
				$text = 'サービス一時休止中';
				break;
			default:
				$text = '対象外';
				break;
		}
		$areaPageTitle = $cltAreaName." ".$pageTitle;

	}else{ // vars for a cat page

		//get a page
		$cltAreaId = $post->ID;
		$cltAreaName = $post->post_title;
		$areaPageTitle = $pageTitle;

		//vars for area
		if($cltAreaName == "東京都") $text = '全地域対応可能です!';
		elseif( $cltAreaName == "兵庫県" || $cltAreaName == "大阪府") $text = "";
		else $text = '一部地域対応可能です!';

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
					<span class="sub"><?php echo $areaPageTitle; ?>で不用品回収をお考えの方へ</span>
					<span class="main"><span class="block">エコランドに</span><span class="block">お任せください</span></span>
				</h2>
				<?php if($cltAreaName == "大阪府" || $cltAreaName == "兵庫県"): ?>
					<p class="warning m5_b">大阪府・兵庫県　エコ回収お伺い 一時休止のお知らせ <a href="http://www.eco-kaishu.jp/?p=5790">詳しくこちら</a></p>
				<?php endif; ?>
			</div>
			<div class="fourcol col points">
				<span class="icon-flashlight2"></span>
				<p class="titlePoint">明確な料金体系</p>
				<p class="subTitlePoint">1点からでもオトクにお伺い！</p>
				<p>エコランドのエコ回収は料金がお品物ごとに決まっています。1点からでもお引取可能なので、パック料金より断然お得！</p>
				<p class="subTitlePoint">買取も同時に対応</p>
				<p>家電・家具などはお買取も行っておりますので複数の業者に頼む手間が省けます！<sup><a href="#reasonAppe1">※1</a></sup></p>
			</div>
			<div class="fourcol col points">
				<span class="icon-headphone"></span>
				<p class="titlePoint">事前見積&スピード対応</p>
				<p class="subTitlePoint">ネット/電話で事前見積</p>
				<p>「受付の対応が良かった」がエコランドを選んだ理由【第3位】<sup><a href="#reasonAppe2">※2</a></sup>！コンシェルジュ(受付スタッフ)が事前にネット/お電話で丁寧にお見積させて頂きます。</p>
				<p class="subTitlePoint">プロに運び出しもお任せ</p>
				<p>お部屋の中からの運び出しからお任せください。大きいモノや重たいモノでもプロのスタッフがスピーディーに運び出します。</p>
			</div>
			<div class="fourcol col points last">
				<span class="icon-people"></span>
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

			<?php
			$itemCharge00 = getPrice("Fランク", "金額");
			$itemCharge00 = $itemCharge00[0];
			$itemLabel00 = "洗濯機";
			$itemCharge01 = getPrice("Gランク", "金額");
			$itemCharge01 = $itemCharge01[0];
			$itemLabel01 = "ソファ";
			$spWorkCharge00 = getPrice("外階段作業", "金額");
			$spWorkCharge00 = $spWorkCharge00[0];
			$spWorkLabel00 = "外階段作業";
			?>

			<ul class="priceEx">
				<li class="twocol col">
					<p class="title">基本料金</p>
					<span class="icon-shipping"></span>
					<p>
						<span class="price"><?php echo taxIn($basicCharge); ?></span>
					</p>
				</li>
				<li class="twocol col">
					<p class="title">物品ごとの料金</p>
					<span class="icon-box2"></span>
					<p>
						<span class="priceIndex"><?php echo $itemLabel00; ?></span>
						<span class="price"><?php echo taxIn($itemCharge00); ?></span>
					</p>
					<p>
						<span class="priceIndex"><?php echo $itemLabel01; ?></span>
						<span class="price"><?php echo  taxIn($itemCharge01); ?></span>
					</p>
				</li>
				<li class="twocol col">
					<p class="title">特殊作業料金</p>
					<span class="icon-tools"></span>
					<p>
						<span class="priceIndex"><?php echo $spWorkLabel00; ?></span>
						<span class="price"><?php echo taxIn($spWorkCharge00); ?></span>
					</p>
				</li>
				<li class="twocol col">
					<p class="title">オプション料金</p>
					<span class="icon-tags"></span>
				</li>
				<li class="fourcol col last">
					<p class="title">合計料金</p>
					<p>
						<span class="price"><?php echo taxIn($basicCharge + $itemCharge00 + $itemCharge01 + $spWorkCharge00); ?></span>
					</p>
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
							<?php if($service == "地域料金"): ?>
								<tr>
									<th><h5>地域料金</h5></th>
									<td>一部の対応エリア訪問の際に頂戴している料金です。</td>
									<td>4,320円</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
					<div class="areaMsg">
						<p class="warning"><?php echo $areaPageTitle; ?>は<span class="b pink"><?php echo $text; ?></span>です</p>
						<img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpPriceDetails_img_01.png" id="areaMsgStaff" />
					</div>
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
					<p>エコ回収の際に必要となるお品物ごとの料金です。電化製品などは一般的なサイズによってあらかじめ料金ランクが決まっています。<br />棚やテーブルなどお品物ごとにサイズが違うモノに関しては幅・奥行・高さの和で料金ランクが決まります。</p>
					<p class="footnote">
						<small>※ 金庫やエレクトーンなど重量のあるモノは重量によって料金ランクが決まります。</small>
					</p>
				</div>
				<div id="electricApp" class="itemChargesDetails">
					<div class="twelvecol col last">
						<h5>各家電・パソコンのサイズ別料金</h5>
					</div>
					<?php
					$items = array("テレビ", "冷蔵庫", "パソコン", "エアコン", "洗濯機");
					$j = 1;

					foreach($items as $item):
						$last = ($j % 3) ? "" : " last";
						$page = get_page_by_title($item, OBJECT, "items"); ?>
						<div class="fourcol col rankCharge<?php echo $last; ?>">
							<span class="<?php echo get_post_meta($page->ID, "itemsInfo06", TRUE); ?>"></span>
							<h6><?php echo $item; ?></h6>
							<?php
							$ranks = get_the_terms($page->ID, "itemranks");?>
							<table>
								<tbody>
									<?php for($l=0; $l<count($ranks); $l++): ?>
										<tr>
											<?php
											$itemsInfo03 = getMetaArr($page, "itemsInfo03");
											$itemsInfo02 = getMetaArr($page, "itemsInfo02");
											$itemsInfo04 = getMetaArr($page, "itemsInfo04");
											?>
											<th><?php echo $itemsInfo03[$l]; ?></th>
											<td><?php echo $itemsInfo02[$l]; ?></td>
											<td><?php echo $itemsInfo04[$l]; ?></td>
										</tr>
									<?php endfor; ?>
								</tbody>
							</table>
							<div class="footnote"><?php echo get_post_meta($page->ID, "itemsInfo05", TRUE); ?></div>
						</div>
					<?php $j++; endforeach; ?>
				</div><!--#itemCharges #electricApp-->

				<div id="itemRank" class="itemChargesDetails">
					<div class="twelvecol col last">
						<h5>各品物別ランク料金</h5>
					</div>
					<?php
					$k = 1;
					foreach($itemRanks as $itemRank):
						$last = ($k % 4 == 0) ? " last" : ""; ?>
						<div class="threecol col rankCharge<?php echo $last; ?>">
							<?php $rankCharge = getPrice($itemRank->name, "金額"); ?>
							<h6><?php echo $itemRank->name." ".taxIn($rankCharge[0]).getPrice($itemRank->name, "単位"); ?></h6>
							<table>
								<tbody>
									<tr>
										<th>縦・横・奥行の合計</th>
										<td><?php echo getPrice($itemRank->name, "サイズ"); ?>cm以下</td>
									</tr>
									<tr>
										<th>重さ</th>
										<td><?php echo getPrice($itemRank->name, "重さ"); ?>kg以下</td>
									</tr>
									<tr>
										<td colspan="2" class="itemEx"><?php echo getPrice($itemRank->name, "例"); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php $k++; endforeach; ?>
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
							<?php foreach($spWorks as $spWork): ?>
								<tr>
									<th><h5><?php echo $spWork->name ?></h5></th>
									<td><?php echo getPrice($spWork->name, "内容"); ?></td>
									<td>
									<?php
									$spWorkCharge = getPrice($spWork->name, "金額");
									echo taxIn($spWorkCharge[0]).getPrice($spWork->name, "単位"); ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
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
							<?php foreach($options as $option): ?>
								<?php if($option->name == "目の前あんしんデータ消去サービス"): ?>
									<tr>
										<th rowspan="2"><h5><?php echo $option->name ?></h5></th>
										<td rowspan="2"><?php echo getPrice($option->name, "内容"); ?></td>
										<td class="split">
											<?php
											$optionIndex = getPrice($option->name, "項目");
											echo $optionIndex[0];
											?>
										</td>
										<td>
											<?php
											$optionCharge = getPrice($option->name, "金額");
											echo taxIn($optionCharge[0]).getPrice($option->name, "単位");
											?>
										</td>
									</tr>
									<tr>
										<td class="split">
											<?php
											$optionIndex = getPrice($option->name, "項目");
											echo $optionIndex[1];
											?>
										</td>
										<td>
											<?php
											$optionCharge = getPrice($option->name, "金額");
											echo taxIn($optionCharge[1]).getPrice($option->name, "単位");
											?>
										</td>
									</tr>
								<?php else: ?>
									<tr>
										<th><h5><?php echo $option->name ?></h5></th>
										<td colspan="2"><?php echo getPrice($option->name, "内容"); ?></td>
										<td>
											<?php
											$optionCharge = getPrice($option->name, "金額");
											echo taxIn($optionCharge[0]).getPrice($option->name, "単位");
											?>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<!--#optionsCharges--></section>

		<!--#priceDetails--></section>

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
					<p class="al_c"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpQuality_img_01.gif" /></p>
					<p>エコ回収のお見積はサイト上のお問い合わせフォームから、またはお電話でご案内できます。コンシェルジュ(受付スタッフ)が親切・丁寧にご案内致しますので、初めての方も安心してご連絡ください。
					</p>
				</div>
				<div class="sixcol col last">
					<h4>プロに運び出しもお任せ</h4>
					<p class="al_c"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/lp/lpQuality_img_02.gif" /></p>
					<p>エコ回収にお伺いするスタッフは経験豊富な運び出しのプロ！大きなモノや重たいモノも迅速な作業で安全に運び出します。</p>
				</div>
			<!--.strongPointDetail--></div>
			<div class="listStaff twelvecol col">
				<h4>私たちが承ります</h4>
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
				<h4>私たちが伺います</h4>
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
					"taxonomy" => "cltarea",
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

		<section class="contents" id="lpFaq">
			<div class="twelvecol col last titleSection">
				<h3>よくある質問</h3>
			<!--.titleSection--></div>
			<div class="twelvecol col last">
				<dl class="listFaq">
					<?php
					$args = array(
						"post_type" => "faq",
						"posts_per_page" => -1,
						"qstcat" => $pageTitle,
						"order" => ASC,
						"orderby" => DATE,
					);
					$faqs = query_posts($args);
					if($faqs): ?>
						<?php foreach($faqs as $faq): ?>
							<dt><?php echo $faq->post_title; ?></dt>
							<dd><?php echo $faq->post_content; ?></dd>
						<?php endforeach; wp_reset_query();?>
					<?php else:

						$args2 = array("qstcat" => "pickup");
						$faqs = query_posts(array_replace($args, $args2)); ?>
						<dl class="listFaq">
						<?php foreach($faqs as $faq): ?>
							<dt><?php echo $faq->post_title; ?></dt>
							<dd><?php echo $faq->post_content; ?></dd>
						<?php endforeach; wp_reset_query();?>
					<?php endif; ?>
				</dl>
			<!--.listFaq--></div>
		<!-- #lpFaq --></section>

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
