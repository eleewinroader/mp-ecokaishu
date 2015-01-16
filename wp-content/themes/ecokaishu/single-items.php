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
		<div class="container">
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
		</div>
	<!--.headerPage--></header>

<?php

function getPrice($var, $tax = FALSE){
	$page = get_page_by_title($var, OBJECT, "price");
	$amount = get_post_meta($page->ID, "priceInfo01", TRUE);
	$amount = $tax ? taxin($amount) : $amount;
	$unit = get_post_meta($page->ID, "priceInfo05", TRUE);
	$price = array("amount" => $amount, "unit" => $unit);
	return $price;
}

function getItemPriceArr($key, $var, $tax = FALSE){

	$args = array(
		"post_type" => "price",
		$key => $var
	);
	$posts = query_posts($args);	
	if($posts){

		foreach($posts as $post){

			$amounts = getMetaArr($post, "priceInfo01");
			$indexs = getMetaArr($post, "priceInfo07");
			$size = get_post_meta($post->ID, "priceInfo02", TRUE);
			$weight = get_post_meta($post->ID, "priceInfo03", TRUE);
			$examples = get_post_meta($post->ID, "priceInfo04", TRUE);
			$contents = get_post_meta($post->ID, "priceInfo06", TRUE);
			$price = array(
				"name" => $post->post_title,
				"amount" => $amounts,
				"index" => $indexs,
				"unit" => $unit,
				"size" => $size,
				"weight" => $weight,
				"examples" => $examples,
				"contents" => $contents
			);
		}
		return $price;
	}else{
		return FALSE;
	}

}


$basicPrice = getPrice("基本料金")["amount"];
$basicUnit = getPrice("基本料金")["unit"];
$areaPrice = getPrice("地域料金")["amount"];
$areaUnit = getPrice("地域料金")["unit"];


if(get_the_terms($post->ID, "itemranks")){
	$indexRank = current($ranks);
	$key = array_search($indexRank->name, $itemRanks);
	$itemIndex1 = $itemIndexs[$key].$itemSizes[$key];
	$itemPrice1 = getItemPriceArr("itemranks", $indexRank->slug)["amount"][0];
	
}else{
	$itemIndex1 = "洗濯機";
	$itemPrice1 = getPrice("Gランク")["amount"];
	$itemIndex2 = "冷蔵庫";
	$itemPrice2 .= getPrice("Iランク")["amount"];
}

echo taxin($basicPrice);
echo taxin($areaPrice);
echo $itemIndex1;
echo taxin($itemPrice1);
echo $itemIndex2;
echo taxin($itemPrice2);

?>
<br />
<?php

$sum = $basicPrice + $itemPrice1 + $itemPrice2;
echo taxin($sum);
?>

<br />
<?php

if($ranks){
	$i = 0;
	foreach($ranks as $rank){
		echo "<h4>".getItemPriceArr("itemranks", $rank->slug)["name"]."</h4>";
		echo getItemPriceArr("itemranks", $rank->slug)["size"];
		echo getItemPriceArr("itemranks", $rank->slug)["weight"];
		echo getItemPriceArr("itemranks", $rank->slug)["examples"];

		$amounts = getItemPriceArr("itemranks", $rank->slug)["amount"];
		$indexs = getItemPriceArr("itemranks", $rank->slug)["index"];
		$units = getItemPriceArr("itemranks", $rank->slug)["unit"];

		echo $itemIndexs[$i].$itemSizes[$i];
		for($k=0; $k<count($amounts); $k++){
			echo taxin($amounts[$k]).$units[$k];
		}
		echo "<br />";
		$i++;
	}
}


foreach($spworks as $spwork){
	echo "<h4>".getItemPriceArr("spworks", $spwork->slug)["name"]."</h4>";
	echo getItemPriceArr("spworks", $spwork->slug)["contents"];

	$amounts = getItemPriceArr("spworks", $spwork->slug)["amount"];
	$indexs = getItemPriceArr("spworks", $spwork->slug)["index"];

	for($i=0; $i<count($amounts); $i++){
		echo $indexs[$i]." ".$amounts[$i];
	}

	echo "<br />";
}
foreach($options as $option){

	echo "<h4>".getItemPriceArr("options", $option->slug)["name"]."</h4>";
	echo getItemPriceArr("options", $option->slug)["contents"];

	$amounts = getItemPriceArr("options", $option->slug)["amount"];
	$indexs = getItemPriceArr("options", $option->slug)["index"];

	for($i=0; $i<count($amounts); $i++){
		echo $indexs[$i]." ".$amounts[$i];
	}
	echo "<br />";
} ?>














	<div class="container">

		<div class="ninecol col">

			<div class="contents contactBnr" id="top">
				<?php
				$msg = '<span class="block">いらなくなった</span>'.$post->post_title.'は</span><span class="block">お任せください!</span>';
				 echo contactBnr($msg);
				 ?>
			</div>

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
				<section class="contents">
					<h3><?php the_title(); ?>のエコ回収について「よくある質問」</h3>
					<dl class="listFaq">
					<?php foreach($faqs as $faq): ?>
						<dt><?php echo $faq->post_title; ?></dt>
						<dd><?php echo $faq->post_content; ?></dd>
					<?php endforeach; wp_reset_query();?>
					</dl>
				<!--よくある質問--></section>
			<?php endif; ?>

			<?php 
			$priceExam = get_post_meta($post->ID, "itemsInfo01", TRUE);
			if($priceExam): ?>
				<section class="contents priceExam" id="<?php echo "family".$post->ID; ?>">
					<h3><?php the_title(); ?>の「エコ回収料金」事例</h3>
					<?php echo $priceExam; ?>
					<p class="footnote"><small>
					※ 金額表示はすべて税込価格となります。<br />
					※ 特殊作業は、お客様希望がなくても、作業上必ず必要になることもありますので、ご了承ください。
					</small></p>
				<!--「エコ回収料金」事例--></section>
			<?php endif; ?>


<?php

function getItemPrices($i){
	switch ($i) {
		case '0':
			$info = array(
				"price" => 500,
				"size" => 50,
				"weight" => 1,
				"ex" => "炊飯器、ミキサー、オーブントースター、サッカーボール、ビデオカメラ等"
			);
			break;
		case '1':
			$info = array(
				"price" => 1000,
				"size" => 90,
				"weight" => 2,
				"ex" => "加湿器、縦型掃除機、ダイニングチェア、ノートパソコン、パソコン本体、布団、ガステーブル(2口)、ＤＶＤプレーヤー、ギター等"
			);
			break;
		case '2':
			$info = array(
				"price" => 1500,
				"size" => 150,
				"weight" => 5,
				"ex" => "カラーBOX(3段)、姿見、空気清浄器、スキー板等"
			);
			break;
		case '3':
			$info = array(
				"price" => 2000,
				"size" => 180,
				"weight" => 10,
				"ex" => "デスクチェア、こたつ、電子レンジ、ミニコンポ、一体型パソコン等"
			);
			break;
		case '4':
			$info = array(
				"price" => 2500,
				"size" => 210,
				"weight" => 15,
				"ex" => "家庭用複合機、ホットカーペット、レッグマジック、ステッパー等"
			);
			break;
		case '5':
			$info = array(
				"price" => 3000,
				"size" => 270,
				"weight" => 20,
				"ex" => "レンジ台、オイルヒーター、電子キーボード等"
			);
			break;
		case '6':
			$info = array(
				"price" => 4000,
				"size" => 300,
				"weight" => 30,
				"ex" => "自転車、ダイニングセット(二人用)、エアロバイク等"
			);
			break;
		case '7':
			$info = array(
				"price" => 5500,
				"size" => 360,
				"weight" => 40,
				"ex" => "A3レーザープリンタ、ウッドカーペット等"
			);
			break;
		case '8':
			$info = array(
				"price" => 7000,
				"size" => 400,
				"weight" => 50,
				"ex" => "足踏みミシン、ダイニングセット(四人用)、白黒業務用コピー機"
			);
			break;
		case '9':
			$info = array(
				"price" => 9000,
				"size" => 450,
				"weight" => 60,
				"ex" => "エレクトーン、大型マッサージ機等"
			);
			break;
		case '10':
			$info = array(
				"price" => 12000,
				"size" => 500,
				"weight" => 70,
				"ex" => "電子ピアノ、介護ベッド等"
			);
			break;
		
		default:
			# code...
			break;
	}
	return $info;
}

function getItemWorks($i){
	switch ($i) {
		case '0':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		case '1':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		case '2':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		case '3':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		case '4':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		case '5':
			$info = array(
				"name" => "外階段作業",
				"desc" => "作業内容",
				"price" => 500,
				"unit" => "円/階"
			);
			break;
		
		default:
			# code...
			break;
	}
	return $info;
}




?>



			<section class="contents voices">
			<h3><?php the_title(); ?>でエコ回収を利用した「お客様からの声」</h3>
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
			foreach($newVoice as $voice){
				$name = getCustomerName($voice);
				$sex = getCustomerSex($voice);
				$age = getCustomerAge($voice);
				$area = getCustomerAreas($voice, TRUE);
				$items = getCustomerItems($voice, TRUE, "dd");
				$date = getCustomerDate($voice);
				$starts = getCustomerStarts($voice,"dd");
				$features = getCustomerFeatures($voice, "dd");
				$review03 = get_post_meta($voice->ID, "voiceInfo17", TRUE);
				$review03Score = get_post_meta($voice->ID, "voiceInfo16", TRUE);
				$review03ScoreIndex = getCustomerReview($post, $review03Score);

				echo <<<EOF
				
				<div class="customerProfile">
					<div class="customerComments">
						<h4>{$name}<span class="small">様より</span></h4>
						<h5>エコ回収サービス全体について評価してください。</h5>
						<span class="rating-foreground star star{$review03Score}"> 
							<meta itemprop="rating" content="{$review03Score}" /> 
							<span class="index">{$review03ScoreIndex}</span>
						</span> 
						{$review03}
					</div>
					<div class="customerInfo last">
						<dl>
							<dt class="hide">性別・年代</dt><dd class="name">{$sex} / {$age}</dd>
							<dt class="hide">回収エリア</dt><dd class="place">{$area}</dd>
							<dt class="hide">回収日時</dt><dd class="date"><time datetime="{$date}">{$date}回収</time></dd>
							<dt class="infoIndex">エコ回収をご利用になったきっかけ</dt> 
							{$starts}
							<dt class="infoIndex">エコランドをお選びになった理由</dt>
							{$features}
							<dt class="infoIndex">エコ回収したアイテム</dt>
							{$items}
						</dl>
					</div>
				<!--customerProfile--></div>
EOF;
			}


			$args2 = array_merge($args, array("offset" => -1));
			$voices =  query_posts($args2);
			if($voices){
				echo <<<EOF
					<div class="archiveIndex">
						<div class="onecol col">回収日</div>
						<div class="twocol col">性別 / 年代</div>
						<div class="twocol col">回収エリア</div>
						<div class="fourcol col">回収アイテム</div>
						<div class="threecol col last">評価</div>
					</div>
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
							<li class=" al_c">
								<a href="{$link}">
									<div class="onecol col">{$date} </div>
									<div class="twocol col">{$sex} / {$age}</div>
									<div class="twocol col">{$area}</div>
									<div class="fourcol col al_l">{$items}</div>
									<div class="threecol col last">
										<span class="rating-foreground star star{$review03Score}"> 
											<meta itemprop="rating" content="{$review03Score}" /> 
										</span> 
									</div>
								</a>
							</li>
EOF;
				}
				if($voices) echo "</ul>";
			}?>

				<?php if(count($voiceTitles) == 0): ?>
					<?php echo $post->post_content; ?>
				<?php else:?>
					<dl class="listVoices">
					<?php for($i=0; $i<count($voiceTitles); $i++){
						echo "<dt>".$voiceTitles[$i]."</dt>";
						echo "<dd>".$voiceContents[$i]."</dd>";
					}?>
					</dl>
				<?php endif; ?>
			<!--口コミ--></section>

			<?php
			//related items
			if(count($cltItems) > 1){
				$args = array(
					"posts_per_page" => -1,
					"post_type" => "items",
					"order_by" => "date",
					"order" => ASC,
					"post__not_in" => array($post->ID),
					"tax_query" => array(
						array(
							'taxonomy' => 'cltitems',
							'field' => 'id',
							'terms' => $relatedItemIds
						)
					)
				);
				$relatedItems = query_posts($args);
				if($relatedItems){ ?>
					<section class="contents listItems">
						<h3>関連アイテム一覧</h3>
						<ul>
							<?php foreach($relatedItems as $relatedItem): ?>
							<li><a href="<?php echo get_permalink($relatedItem->ID); ?>"><?php echo $relatedItem->post_title; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<!--関連アイテム--></section>
					<?php
				}
			}?>

			<section class="contents">
				<div class="twelvecol col last">
					<h3>エコ回収についてもっと詳しく知る</h3>
				</div>
				<ul class="listShortcuts">
					<li>
						<a href="<?php echo get_post_type_archive_link("price"); ?>">
							<span class="block">明朗な料金体系が</span>
							<span class="block">エコ回収の特徴</span>
							<span class="block index"><span class="icon-calculate"></span>料金案内</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("flow"); ?>">
							<span class="block">エコ回収依頼から</span>
							<span class="block">当日のエコ回収まで</span>
							<span class="block index"><span class="icon-flow-tree"></span>ご利用の流れ</span>
						</a>
					</li>
					<li>
						<a href="<?php echo get_post_type_archive_link("staff"); ?>">
							<span class="block">お客様のお困りことに</span>
							<span class="block">誠実・丁寧な仕事を</span>
							<span class="block index"><span class="icon-users"></span>STAFF紹介</span>
						</a>
					</li>
				</ul>
			<!--エコ回収サービスについて--></section>


			<div class="contents contactBnr" id="bottom">
				<? echo contactBnr(); ?>
			</div>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">

			<?php
			//item pages in the same cat
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postTypeName,
				"posts_per_page" => -1,
				"cltitems" => $cltItemCatName,
				"post__not_in" => array($cltItemCatId)
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>同じカテゴリ内のアイテム一覧</h2><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular item cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気アイテム一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular item cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => "area",
				"posts_per_page" => -1,
				"catkinds" => "人気"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>人気エリア一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>
			
			<div class="bnrBtn contents" id="area">
				<a href="<?php echo get_post_type_archive_link("area"); ?>">
					<span class="icon-search"></span>
					<span class="icon-map3"></span>
					<p><span class="block">対応エリアの</span><span class="block">確認はこちら</span></p>
				</a>
			<!--.contents--></div>

			<div class="bnrBtn contents">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			<!--.contents--></div>	

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind contents">
					<ul>
					<?php foreach($convSales  as $convSale): ?>
						<li class="item">
							<a href="<?php echo $convSale->link; ?>" class="itemContents">
								<span class="icon-bullhorn"></span>
								<p class="info">
									<span class="block"><?php echo $convSale->month."月".$convSale->day."日"; ?></span><span class="block"><?php echo $convSale->area; ?></span>
								</p>
								<p class="off">割引CHECK</p>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				<!--.contents--></div>
			<?php endif;

			//related contents page
			$args = array(
				"order_by" => "date",
				"order" => DESC,
				"post_type" =>"post",
				"posts_per_page" => 10,
				"cltitems" => $cltItemCatName
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listPosts contents">
				<h2>関連記事一覧</h2><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>

		<!--.sidebar--></aside>

	<!--.container--></div>

<?php get_footer(); ?>'
