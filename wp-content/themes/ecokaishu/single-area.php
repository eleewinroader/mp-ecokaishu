<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
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
				$text = "<b>エコ回収サービス対象内</b>のエリアです。お部屋のいらなくなったモノについて何でもご相談ください。";
				break;
			case '別途地域料金':
				$text = "<b>別途地域料金</b>として4,200円が発生いたします。ご不明な点など、お気軽に電話・メールにてご相談くださいませ。";
				break;
			default:
				$text = "<b>エコ回収サービス対象外</b>のエリアですが、可能な限り調整をいたしますので、お気軽に電話・メールにてご相談くださいませ。";
				break;
		}
	}

	//vars for voices
	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02"); 

	?>

	<div class="container">

			<div class="ninecol col">
				<div class="contents">

				<header>
					<nav class="catNavi">
						<ul>
							<li><a href="<?php echo getPostType($post, "link"); ?>"><?php echo getPostType($post, "label"); ?></a></li>
							<?php if(count($cltareas) > 1) echo '<li><a href="'.get_permalink($prefecture[0]->ID).'">'.$prefecture[0]->post_title.'</a></li>'; ?>
							<li><?php the_title(); ?></li>
						</ul>
					</nav>
					<h2><span class="title block"><?php the_title(); ?>のエコ回収</span></h2>
				</header>

				<div class="municipalities">

					<?php
					if(count($cltareas) > 1){
						echo '<p class="explains">'.$prefecture[0]->post_title.' '.$post->post_title.'は'.$text.'</p>';
						echo '<img src="'.get_bloginfo("template_url").'/assets/img/base/staff_img_yanashima.png" alt="" id="staff" />';  
						echo get_attached_img($prefecture[0]->ID, "areaInfo01", "", "map");
					}else{
						echo "<h3>対応エリア一覧</h3>";
						echo get_attached_img($post->ID, "areaInfo01");
						echo "<table>";
						$able = get_term_by("name", "対象内", "applicablearea");
						$conditional = get_term_by("name", "別途地域料金", "applicablearea");
						$disable = get_term_by("name", "対象外", "applicablearea");
						$taxs = array($able, $conditional, $disable);
						$labels = array(
							"対応エリア", 
							"地域料金がかかるエリア<sup>(※1)</sup>", 
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
								echo "<tr><th>".$labels[$i]."</th><td>";
								foreach($municipalities as $municipality){
									if($i<2) echo '<a href="'.get_permalink($municipality->ID).'">';
									echo $municipality->post_title;
									if($i<2) echo '</a>';
								}
								echo "</td></tr>"; 
							}
						}
						echo '</table>
						<p class="footnote">
							<small>※1 別途地域料金として4,200円が発生いたします。</small><br />
							<small>※2 対象外エリアでも可能な可能な限り調整をいたしますので、お気軽に電話・メールにてご相談くださいませ。</small>
						</p>';
					}?>
					
				</div>

				<section id="voices" class="achiveContents">
					<?php if(!$voiceTitles): ?>
						<?php the_content();?>
					<?php else:?>
						<h3><?php the_title(); ?>でエコ回収を利用した「お客様からの声」</h3>
						<dl>
						<?php for($i=0; $i<count($voiceTitles); $i++){
							echo "<dt>".$voiceTitles[$i]."</dt>";
							echo "<dd>".$voiceContents[$i]."</dd>";
						}?>
						</dl>
					<?php endif; ?>
				</section>

				<?php
				$args = array(
					"post_type" => "faq",
					"posts_per_page" => -1,
					"qstcat" => "対象エリア"
				);
				$faqs = query_posts($args);
				if($faqs): ?>
					<section class="achiveContents">
						<h3>エコ回収の対象エリアについて「よくある質問」</h3>
						<dl class="listFaq">
						<?php foreach($faqs as $faq): ?>
							<dt><?php echo $faq->post_title; ?></dt>
							<dd><?php echo $faq->post_content; ?></dd>
						<?php endforeach; wp_reset_query();?>
						</dl>
					</section>
				<?php endif; ?>
					

				</div>
			</div>

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
