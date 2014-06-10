<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/
get_header( ); ?>

		<div class="campIntro">

			<div class="mainVisual">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="container">
					<div class="twelvecol col last">
						<h2>梅雨のキャンペーン</h2>
						<div class="campVisual">
							<div class="topic"><span class="txt">衣類詰め合せ最大3袋まで無料</span></div>
							<img src="<?php echo bloginfo("template_url"); ?>/assets/img/campaign/1406/mainVisual_icon.png" alt="" id="campVisualImg" />
							<div class="sixcol col">無料</div>
							<div class="sixcol col last">引取</div>
							<div class="raindrop"></div>
						</div>
					</div>
					</div>
					<!--<?php the_content(); ?>
					<!--<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />-->
				<?php endwhile; endif; ?>
			<!-- .campIntro  .mainVisual--></div>

			<?php
			$campInfo01 = get_post_meta($post->ID, "campInfo01", TRUE);
			$campInfo02 = get_post_meta($post->ID, "campInfo02", TRUE);
			$campInfo03 = get_post_meta($post->ID, "campInfo03", TRUE);
			$campInfo04 = get_post_meta($post->ID, "campInfo04", TRUE);
			$campInfo05 = get_post_meta($post->ID, "campInfo05", TRUE);
			$campInfo06 = get_post_meta($post->ID, "campInfo06", TRUE);
			$campInfo07 = get_post_meta($post->ID, "campInfo07", TRUE);
			$campInfo08 = get_post_meta($post->ID, "campInfo08", TRUE);
			echo '<section class="contents details"><div class="container"><div class="twelvecol col last">';
			echo "<h3>".get_the_title($post->ID)."のご案内</h3>";
			if($campInfo03) echo '<div class="expl">'.$campInfo03.'</div>';
			echo "<table><tbody>";
			if($campInfo02) echo "<tr><th>キャンペーン名</th><td>".$campInfo02."</td></tr>";
			if($campInfo04){
				echo "<tr><th>期間</th><td>".$campInfo04;
				if($campInfo05) echo "~".$campInfo05;
				echo "</td></tr>";
			}
			if($campInfo06) echo "<tr><th>対象</th><td>".$campInfo06."</td></tr>";
			if($campInfo07) echo "<tr><th>条件</th><td>".$campInfo07.'<div class="clear"></div></td></tr>';
			echo "</tbody></table>";
			if($campInfo08) echo '<div class="footnote">'.$campInfo08.'</div>';
			echo "</div></div></section>";
			?>
			<!-- .campIntro #details -->

		<!-- .campIntro --></div>

		<?php
		global $wpdb;
		$query = "SELECT meta_id, post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $post->ID ORDER BY meta_id ASC";
		$cf = $wpdb->get_results($query, ARRAY_A);

		$campFlowInfo01 = array();
		$campFlowInfo02 = array();

		foreach( $cf as $row ){
			if($row['meta_key'] == "campFlowInfo01") array_push($campFlowInfo01, $row['meta_value']);
			if($row['meta_key'] == "campFlowInfo02") array_push($campFlowInfo02, $row['meta_value']);
		}

		$length = count($campFlowInfo01);
		if($length > 1): ?>
			<section class="contents campFlow" >
				<div class="obj"><span>FLOW</span></div>
				<div class="container">
				<h3>申込から引取までの流れ</h3>
				<p class="al_c">WEBからお申し込みをするだけで、その後はエコランドの専門スタッフに全部お任せください！</p>
				<ul class="twelvecol col last">
				<?php
				for($i=0; $i<$length; $i++){
					$catId = get_cat_ID("flow");
					$args = array(
						"post_type" => "flow",
						"page_id" => $campFlowInfo01[$i]
					);
					$flows = query_posts($args);
					foreach($flows as $flow){
						$query = "SELECT meta_id,post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $flow->ID ORDER BY meta_id ASC";
						$cf = $wpdb->get_results($query, ARRAY_A);

						$flowInfo01 = array();
						$flowInfo02 = array();
						$flowInfo03 = array();
						$flowInfo04 = array();
						$flowInfo05 = array();

						foreach( $cf as $row ){
							if($row['meta_key'] == "flowInfo01") array_push($flowInfo01, $row['meta_value']);
							if($row['meta_key'] == "flowInfo02") array_push($flowInfo02, $row['meta_value']);
							if($row['meta_key'] == "flowInfo03") array_push($flowInfo03, $row['meta_value']);
							if($row['meta_key'] == "flowInfo04") array_push($flowInfo04, $row['meta_value']);
							if($row['meta_key'] == "flowInfo05") array_push($flowInfo05, $row['meta_value']);
						}
						$key = array_search($campFlowInfo02[$i], $flowInfo01);

						echo '<li class="">';
						echo '<span class="'.$flowInfo04[$key].' icon"></span>';
						echo '<p class="title">'.$flowInfo01[$key].'</p>';
						echo '<p class="txt">'.$flowInfo03[$key].'</p>';
						echo '</li>';
					}
				}?>
				</ul>
				</div>
			<!-- .flow --></section>
		<?php endif; ?>

		<?php
		$args = array(
			"post_type" => "voices",
			"order" => ASC,
			"orderby" => date,
			"tax_query" => array(
				array(
					"taxonomy" => "campcode",
					"field" => "slug",
					"terms" => campCode()

				)
			)
		);
		$voices = query_posts($args);
		if($voices): ?>
			<section class="contents voices">
				<div class="obj"><span>VOICES</span></div>
				<div class="container">
				<h3>お客様から嬉しい声</h3>
				<p class="al_c">「<?php echo get_the_title($post->ID); ?>」を利用したお客様からうれしい声が届いています！</p>
				<?php
				foreach($voices as $voice):

					//get cstm info
					$name = get_post_meta($voice->ID, "voiceInfo06", TRUE);
					$cstmImg = get_post_meta($voice->ID, "voiceInfo01");
					$cstmsexs = get_the_terms($voice->ID, 'cstmsex');
					foreach($cstmsexs as $cstmsex) $sex = $cstmsex->name;
					$cltareas = get_the_terms($voice->ID, 'cltarea');
					foreach($cltareas as $cltarea){
						if($cltarea->parent == 0) $pref = $cltarea->name;
						else $city = $cltarea->name;
					}
					$cstmages = get_the_terms($voice->ID, 'cstmage');
					foreach($cstmages as $cstmage) $age = $cstmage->name; ?>

					<section class="voice">
						<header class="twelvecol col last">
							<h4><?php echo get_post_meta($voice->ID, "voiceInfo08", TRUE);  ?></h4>
							<p class="al_c"><?php echo $name."様 / ".$pref.$city."在住・".$sex."・".$age; ?> </p>
							<p class="al_c">対象品：<?php echo get_post_meta($voice->ID, "voiceInfo07", TRUE); ?></p>
						</header>
						<?php if($cstmImg): ?>		
						<div class="threecol col flRight al_r">
							<div class="img">
								<?php echo get_attached_img($voice->ID, "voiceInfo01"); ?>
							</div>
						</div>
						<div class="ninecol col last">
						<?php else: ?>
						<div class="twelvecol col last">
						<?php endif; ?>
							<h5>お申し込みになったきっかけは何ですか？</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo02", TRUE); ?>
							<h5>当サービスのよかった点は何ですか？</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo03", TRUE); ?>
							<h5>利用してみたご感想を聞かせてください。</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo04", TRUE); ?>
							<h5>他に要望や改善点があれば教えてください。</h5>
							<?php echo get_post_meta($voice->ID, "voiceInfo05", TRUE); ?>
						</div>
					</section>

				<?php endforeach; ?>
				</div>
			<!-- .voices --></section>
		<?php endif; ?>

<?php get_footer(); ?>