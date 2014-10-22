<?php
/**
 * The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
 */

get_header(); ?>

	<?php
	//vars for area
	$cltareas = get_the_terms($post->ID, 'cltarea');
	if(count($cltareas) > 1){
		 foreach($cltareas as $area){
			if($area->parent == 0){
				$prefectureId = $area -> term_id;
				$prefectureName = $area -> name;
			}else{
				$municipalityId = $area -> term_id;
				$municipalityName = $area -> name;
			}
		}
		$args = array(
			"post_type" => "area",
			"name" => $prefectureName
		);
		$prefecture = query_posts($args);
		wp_reset_query();
	}else{
		foreach($cltareas as $area){
			$prefectureId = $area -> term_id;
			$prefectureName = $area -> name;
		}
	}

	//vars 
	$applicableAreas = get_the_terms($post->ID, 'applicablearea');
	if(count($cltareas) > 1){
		foreach($applicableAreas as $applicable) $service = $applicable->name;
		switch ($service) {
			case '対象内':
				$text = '<span class="block">対象エリア</span>';
				break;
			case '地域料金':
				$text = '<span class="block">地域料金が</span><span class="block">かかるエリア</span>';
				break;
			default:
				$text = '<span class="block">対象外</span>';
				break;
		}
	}else{
		if($prefectureName == "東京都" || $prefectureName == "大阪府") $text = "全地域";
		else $text = "一部地域";
	}

	//vars for voices
	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02"); 

	?>

	<div class="container">

		<div class="ninecol col">

			<header class="contents">
				<nav class="catNavi">
					<ul>
						<li><a href="<?php echo getPostType($post, "link"); ?>"><?php echo getPostType($post, "label"); ?></a></li>
						<?php if(count($cltareas) > 1) echo '<li><a href="'.get_permalink($prefecture[0]->ID).'">'.$prefecture[0]->post_title.'</a></li>'; ?>
						<li><?php the_title(); ?></li>
					</ul>
				</nav>
				<h2><span class="title block"><?php the_title(); ?>のエコ回収</span></h2>
			<!--header--></header>

			<section id="municipalities" class="contents">
				<div class="msg">
					<h3 class="explains">
						<?php
						if(count($cltareas) > 1){
							echo '<span class="block">'.$post->post_title.'は</span>'.$text.'<span class="block">です!</span>';
						}else{
							echo '<span class="block">'.$prefectureName.'は</span><span class="block">'.$text.'</span><span class="block">対応可能です!</span>';
						}?>
					</h3>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/staff_img_yanashima.jpg" />
				</div>
				<div id="mapIndex">
					<span class="applicable">対応可能エリア</span>
					<span class="addtional">地域料金がかかるエリア</span>
					<span class="disable">対応外</span>
				</div>
				<div id="mapArea">
					<?php
					if(count($cltareas) > 1){
						echo get_attached_img($prefecture[0]->ID, "areaInfo01", "", "map");
					}else{
						echo get_attached_img($post->ID, "areaInfo01", "", "map");
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
							foreach($cltareas as $cltarea) $prefecture = $cltarea->term_id;
							$args = array(
								"posts_per_page" => -1,
								"post_type" => "area",
								"order_by" => "date",
								"order" => ASC,
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
			<!--#municipalities .contents--></section>

			<!--<section id="now" class="contents">
				<h3>最近「<?php
				if(count($cltareas) > 1) echo $prefectureName." ".$post->post_title;
				else echo $prefectureName;
				?>」でエコ回収された品物</h3>
				<ul class="listEcokaishu">
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img01.jpg" alt="" />
						<h4>Apple iPad(16G)</h4>
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
						
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img02.jpg" alt="" />
						<h4>コムサスーツケースコムサスーツケース</h4>
						
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img03.jpg" alt="" />
						<h4>FUJIGEN ウクレレ</h4>
						
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
					<li>
						<img src="<?php echo bloginfo("template_url");?>/assets/img/area/img04.jpg" alt="" />
						<h4>PS3</h4>
						<dl>
							<dt>エコ回収日</dt><dd class="date">2014年10月6日</dd>
							<dt>エコ回収地域</dt><dd class="location">東京都世田谷区</dd>
						</dl>
					</li>
				</ul>
			<!--#now .contents</section>-->

			<section id="voices" class="contents">
				<?php if(!$voiceTitles): ?>
					<?php echo $post->post_content; ?>
				<?php else:?>
					<h3><?php
				if(count($cltareas) > 1) echo $prefectureName." ".$post->post_title;
				else echo $prefectureName;
				?>でエコ回収を利用した「お客様からの声」</h3>
					<dl class="listVoices">
					<?php for($i=0; $i<count($voiceTitles); $i++){
						echo "<dt>".$voiceTitles[$i]."</dt>";
						echo "<dd>".$voiceContents[$i]."</dd>";
					}?>
					</dl>
				<?php endif; ?>
			<!--#voices .contents--></section>

			<section id="shortcuts" class="contents">
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
			<!--#shortcuts .contents--></section>

		<!--ninecol--></div>

		<aside class="threecol col last sidebar">

			<div class="bnrBtn">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			</div>

			<?php

			//recent articles in the same area
			if(count($cltareas) > 1){
				$areaName = $prefecture[0]->post_title;
				$postNotIn = array($prefecture[0]->ID);
			}else{
				$areaName = $post->post_title;
				$postNotIn = array($post->ID);
			}
			$args = array(
				"order_by" => "date",
				"order" => ASC,
				"post_type" => "area",
				"posts_per_page" => -1,
				"cltarea" => $prefectureName,
				"post__not_in" => $postNotIn
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="listItems"><h3>'.$areaName.'内の対応エリア一覧</h3><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
			}


			$args = array(
				"post_type" => "items",
				"posts_per_page" => -1
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="listItems"><h3>物品別エコ回収実績</h3><ul>';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
				wp_reset_query();
			}?>

		</aside>

	</div>

<?php get_footer(); ?>
