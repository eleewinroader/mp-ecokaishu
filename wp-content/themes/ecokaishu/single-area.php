<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
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
	//print_r($applicableAreas);
	$navPage = '<li><a href="'.$postTypeUrl.'">'.$postTypeLabel.'</a></li>';
	
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
			$navPage .= '<li><a href="'.$cltAreaUrl.'">'.$cltAreaName.'</a></li>';
		}
		wp_reset_query();

		//vars for area
		foreach($applicableAreas as $applicable) $service = $applicable->name;
		switch ($service) {
			case '対象内':
				$text = '<span class="block">対象エリア</span>';
				break;
			case '地域料金':
				$text = '<span class="block">地域料金が</span><span class="block">かかるエリア</span>';
				break;
			case 'サービス休止':
				$text = '<span class="block">サービス</span><span class="block">一時休止中</span>';
				break;
			default:
				$text = '<span class="block">対象外</span>';
				break;
		}
		$areaPageTitle = $cltAreaName." ".$pageTitle;

	}else{ // vars for a cat page

		//get a page
		$cltAreaId = $post->ID;
		$cltAreaName = $post->post_title;
		$areaPageTitle = $pageTitle;

		//vars for area
		if($cltAreaName == "東京都") $text = '<span class="block">全地域</span><span class="block">対応可能です!</span>';
		elseif( $cltAreaName == "兵庫県" || $cltAreaName == "大阪府") $text = '<span class="block">サービス</span><span class="block">一時休止中です!</span>';
		else $text = '<span class="block">一部地域</span><span class="block">対応可能です!</span>';

	}

	$navPage .= '<li>'.$pageTitle.'</li>';
	?>

	<header class="headerPage">
		<nav class="navPage">
			<div class="container">
				<ul class="twelvecol col last">
					<li><a href="<?php echo siteInfo("rootUrl"); ?>"><?php echo bloginfo("site_name"); ?>TOP</a></li><?php echo $navPage; ?>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="ninecol col">
				<h2><?php echo $areaPageTitle; ?>のエコ回収 口コミ・実績</h2>
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

	<div class="container">

		<div class="ninecol col">

			<div class="contents" id="municipalities">
				<div class="msg">
					<p class="explains">
						<?php
						if(count($cltAreas) > 1){
							echo '<span class="block">'.$pageTitle.'は</span>'.$text.'<span class="block">です!</span>';
						}else{
							echo '<span class="block">'.$areaPageTitle.'は</span>'.$text;
						}?>
					</p>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/staff_img_yanashima.jpg" alt="" />
				</div>
				<div id="mapIndex">
					<span class="applicable">対象エリア</span>
					<span class="addtional">地域料金(4,200円)がかかるエリア</span>
					<span class="disable">対象外</span>
				</div>
				<div id="mapArea">
					<?php
					if(count($cltAreas) > 1){
						echo get_attached_img($cltAreaId, "areaInfo01", "", "map");
					}else{
						echo get_attached_img($cltAreaId, "areaInfo01", "", "map");
						$able = get_term_by("name", "対象内", "applicablearea");
						$conditional = get_term_by("name", "地域料金", "applicablearea");
						$disable = get_term_by("name", "対象外", "applicablearea");
						$taxs = array($able, $conditional, $disable);
						$labels = array(
							"対応エリア一覧", 
							"地域料金がかかるエリア一覧<sup>(※1)</sup>", 
							"対応外エリア<sup>(※2)</sup>"
						);
						for($i=0; $i<3; $i++){
							foreach($cltAreas as $cltarea) $prefecture = $cltarea->term_id;
							$args = array(
								"posts_per_page" => -1,
								"post_type" => "area",
								"order_by" => "date",
								"order" => ASC,
								"post__not_in" => array($cltAreaId),
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'cltarea',
										'field' => 'id',
										'terms' => array($prefecture)
									),
									array(
										'taxonomy' => 'applicablearea',
										'field' => 'id',
										'terms' => array($taxs[$i]->term_id)
									)
								)
							);
							$municipalities = query_posts($args);
							if($municipalities){
								echo '<h4>'.$labels[$i].'</h4><ul class="listArea">';
								foreach($municipalities as $municipality){
									if($i<2) echo '<li><a href="'.get_permalink($municipality->ID).'">';
									echo $municipality->post_title;
									if($i<2) echo '</a></li>';
								}
								echo "</ul>"; 
							}
						}
						echo '
						<p class="footnote">
							<small>※1 地域料金として別途4,200円が発生いたします。</small><br />
							<small>※ 対象外エリアでも可能な可能な限り調整をいたしますので、お気軽に電話・メールにてご相談くださいませ。</small>
						</p>';
					}?>
				</div>
			<!--#municipalities .contents--></div>

			<?php
			if(campCode($post)){ 
				$childrenClass = campCode($post, "children");
				$pr_code = substr($childrenClass, 7, 11);
				$pr_code = str_replace("-", "_", $pr_code);
				$param = "?pr_code=".$pr_code; 
				if($pr_code == "4_00") $ycoll = "2-1";
			}
			$telNum = telNum();
			$template_url = get_bloginfo("template_url");
			$site_url = siteInfo("rootUrl");
$string = <<< EOF
			<div class="contact contents">
				<div class="box" id="tel">
					<a href="tel:0120530{$telNum}" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});">
						<p class="label block">お急ぎの方はお電話で</p>
						<p class="action">
							<span class="icon-phone"></span>
							<span>0120-530-{$telNum}</span>
						</p>
					</a>
				</div>
				<div class="box" id="mail">
					<a href="{$site_url}/estimate{$ycoll}/{$pr_code}">
						<p class="label block">24時間受付中</p>
						<p class="action">
							<span class="icon-mail4"></span>
							<span>メールで見積依頼</span>
						</p>
					</a>
				</div>
				<p id="openingHour">
					<span class="date">営業時間</span>
					<span class="date">平･土 9:00-22:00</span><span class="date">日･祝 9:00-20:00</span>
				</p>
			<!--コンシェルジュへ--></div>
EOF;
echo $string; ?>

			<section class="contents">
				<?php if(count($voiceTitles) == 0): ?>
					<?php echo $post->post_content; ?>
				<?php else:?>
					<h3><?php the_title(); ?>でエコ回収を利用した「お客様からの声」</h3>
					<dl class="listVoices">
					<?php for($i=0; $i<count($voiceTitles); $i++){
						echo "<dt>".$voiceTitles[$i]."</dt>";
						echo "<dd>".$voiceContents[$i]."</dd>";
					}?>
					</dl>
				<?php endif; ?>
			<!--口コミ--></section>

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

			<?php echo $string; ?>

		<!--.ninecol--></div>

		<aside class="threecol col last sidebar">

			<div class="bnrBtn contents">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			<!--.contents--></div>

			<?php
			//item pages in the same cat
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postTypeName,
				"posts_per_page" => -1,
				"cltarea" => $cltAreaName,
				"post__not_in" => array($cltAreaId)
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>'.$cltAreaName.'内のエリア一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}

			//popular area cats
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
			}

			//prefecture cats
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"catkinds" => "大カテゴリ"
			);
			$posts = query_posts($args);
			if($posts){
				echo '<section class="listItems contents">
				<h2>対応都道府県一覧</h2><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul>
				<!--.contents--></section>';
				wp_reset_query();
			}?>

		<!--.sidebar--></aside>

	<!--.container--></div>

<?php get_footer(); ?>'
