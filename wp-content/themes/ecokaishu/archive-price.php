<?php
/*
* @package Montser Platform
*/

get_header( );

$basicCharge = getPrice("基本料金", "金額")[0];
$basicEx = getPrice("基本料金", "内容");
$areaCharge = getPrice("地域料金", "金額")[0];
$areaEx = getPrice("地域料金", "内容");
$itemRanks = get_terms("itemranks", array("hide_empty" => FALSE));
$spWorks = get_terms("spworks", array("orderby"=>"id", "order"=> "ASC", "hide_empty" => FALSE));
$options = get_terms("options", array("orderby"=>"id", "order"=> "ASC", "hide_empty" => FALSE));

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

			<?php
			$itemCharge00 = getPrice("Fランク", "金額")[0];
			$itemLabel00 = "洗濯機";
			$itemCharge01 = getPrice("Gランク", "金額")[0];
			$itemLabel01 = "ソファ";
			$spWorkCharge00 = getPrice("外階段作業", "金額")[0];
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
						<span class="price"><?php echo  taxIn($itemCharge00); ?></span>
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
						<span class="price"><?php echo taxIn($basicCharge + $itemCharge0 + $itemCharge01 + $spWorkCharge00); ?></span>
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
					$items = array("テレビ", "冷蔵庫", "パソコン", "エアコン", "洗濯機", "衣類乾燥機");
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
											<th><?php echo getMetaArr($page, "itemsInfo03")[$l]; ?></th>
											<td><?php echo getMetaArr($page, "itemsInfo02")[$l]; ?></td>
											<td><?php echo getMetaArr($page, "itemsInfo04")[$l]; ?></td>
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
							<h6><?php echo $itemRank->name." ".taxIn(getPrice($itemRank->name, "金額")[0]).getPrice($itemRank->name, "単位"); ?></h6>
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
									<td><?php echo taxIn(getPrice($spWork->name, "金額")[0]).getPrice($spWork->name, "単位"); ?></td>
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
										<td class="split"><?php echo getPrice($option->name, "項目")[0]; ?></td>
										<td><?php echo taxIn(getPrice($option->name, "金額")[0]).getPrice($option->name, "単位"); ?></td>
									</tr>
									<tr>
										<td class="split"><?php echo getPrice($option->name, "項目")[1]; ?></td>
										<td><?php echo taxIn(getPrice($option->name, "金額")[1]).getPrice($option->name, "単位"); ?></td>
									</tr>
								<?php else: ?>
									<tr>
										<th><h5><?php echo $option->name ?></h5></th>
										<td colspan="2"><?php echo getPrice($option->name, "内容"); ?></td>
										<td><?php echo taxIn(getPrice($option->name, "金額")[0]).getPrice($option->name, "単位"); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
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