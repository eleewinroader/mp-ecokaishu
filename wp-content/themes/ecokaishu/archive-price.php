<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/
get_header( ); ?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><li><?php post_type_archive_title(); ?></li>
				</ul>
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
			<nav>
				<ul>
					<li><a href="#ex"><span class="block">料金の出し方</span><span class="here">こちら</span></a></li>
					<li><a href="#simulations"><span class="block">みんなの見積は</span><span class="here">こちら</span></a></li>
				</ul>
			</nav>
		<!-- .intro .summary--></div>
	</div>

	<div id="ex" class="contents">
		<div class="container">
			<div class="twelvecol col last">
				<h3><?php echo getPage("料金の出し方", "title"); ?> <span class="small"><small>※クリックすると料金の詳細が見れます</small></span></h3>
			</div>
			<ul class="tabIndex">
				<li class="twocol col">
					<h4>基本料金</h4>
					<span class="icon-shipping"></span>
					<p><span class="price">3,240</span></p>
				</li>
				<li data-tab="itemPrice" class="tabBtn twocol col">
					<?php if(is_smartphone()) echo '<a href="#itemPrice">'; ?>
					<h4>物品ごとの料金</h4>
					<span class="icon-box2"></span>
					<p><span class="priceIndex">洗濯機</span><span class="price">4,320</span></p>
					<p><span class="priceIndex">ソファ</span><span class="price">3,240</span></p>
					<?php if(is_smartphone()) echo '</a>'; ?>
				</li>
				<li data-tab="options" class="tabBtn twocol col">
					<?php if(is_smartphone()) echo '<a href="#options">'; ?>
					<h4>特殊作業料金</h4>
					<span class="icon-tools"></span>
					<p><span class="priceIndex m0_r">階段の運び出し</span><span class="price block">1,080</span></p>
					<?php if(is_smartphone()) echo '</a>'; ?>
				</li>
				<li data-tab="purchase" class="tabBtn twocol col">
					<?php if(is_smartphone()) echo '<a href="#purchase">'; ?>
					<h4>買取料金</h4>
					<span class="icon-tags"></span>
					<p><span class="priceIndex">冷蔵庫</span><span class="price">1,000</span></p>
					<?php if(is_smartphone()) echo '</a>'; ?>
				</li>
				<li class="fourcol col last">
					<h4>合計料金</h4>
					<p><span class="price">10,880</span></p>
				</li>
			</ul>
			<!--<?php echo getPage("料金系計算の例", "contents"); ?>-->
		</div>
	<!-- .intro #ex--></div>

	<div class="tabs">

		<section class="contents tabCont" id="itemPrice">
			<div class="container">

				<div class="twelvecol col last">
					<h3><?php echo getPage("物品ごとの料金", "title"); ?></h3>
					<?php echo getPage("物品ごとの料金", "contents"); ?>
				</div>

				<section id="electricApp">
					<div class="twelvecol col last"><h4><?php echo getPage("各家電のサイズ別料金", "title"); ?></h4></div>
					<?php echo getPage("各家電のサイズ別料", "contents"); ?>
				<!--#itemPrice #electricApp--></section>

				<section id="itemRank">
					<div class="twelvecol col last">
						<h4><?php echo getPage("各物品のランク別料金", "title"); ?></h4>
						<?php echo getPage("各物品のランク別料金", "contents"); ?>
					</div>
				<!--#itemPrice #itemRank--></section>

				<section id="guide">
					<div class="twelvecol col last"><h4><?php echo getPage("一部お引取ができないモノがあります。", "title"); ?></h4></div>
					<?php echo getPage("一部お引取ができないモノがあります。", "contents"); ?>
				<!--#itemPrice #guide--></section>

			<!--#itemPrice .container--></div>
		<!--#itemPrice--></section>

		<section class="contents tabCont" id="purchase">
			<div class="container">
				<div class="twelvecol col last">
					<h3><?php echo getPage("買取料金", "title"); ?></h3>
					<?php echo getPage("買取料金", "contents"); ?>
					<h4><?php echo getPage("買取が難しいモノがあります。", "title"); ?></h4>
					<?php echo getPage("買取が難しいモノがあります。", "contents"); ?>
				</div>
			<!--#purchase .container--></div>
		<!--#purchase--></section>

		<section class="contents tabCont" id="options">
			<div class="container">
				<div class="twelvecol col last"><h3><?php echo getPage("特殊作業料金", "title"); ?></h3></div>
				<div class="fourcol col">
					<h4><?php echo getPage("お住まいの地域はエリア内ですか？", "title"); ?></h4>
					<?php echo getPage("お住まいの地域はエリア内ですか？", "contents"); ?>
				</div>
				<div class="fourcol col">
					<h4><?php echo getPage("何階から運び出しますか？", "title"); ?></h4>
					<?php echo getPage("何階から運び出しますか？", "contents"); ?>
				</div>
				<div class="fourcol col last">
					<h4><?php echo getPage("大型の場合は解体などの作業が必要です。", "title"); ?></h4>
					<?php echo getPage("大型の場合は解体などの作業が必要です。", "contents"); ?>
				</div>
				<div class="fourcol col">
					<h4><?php echo getPage("時間指定をご希望ですか？", "title"); ?></h4>
					<?php echo getPage("時間指定をご希望ですか？", "contents"); ?>
				</div>
				<div class="fourcol col">
					<h4><?php echo getPage("養生作業が必要ですか？", "title"); ?></h4>
					<?php echo getPage("養生作業が必要ですか？", "contents"); ?>
				</div>
				<div class="fourcol col last">
					<h4><?php echo getPage("レディースサービスやPCデータ消去サービスはご存知ですか？", "title"); ?></h4>
					<?php echo getPage("レディースサービスやPCデータ消去サービスはご存知ですか？", "contents"); ?>
				</div>
			<!--#check .container--></div>
		<!--#check--></section>

	<!-- .tabs --></div>

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