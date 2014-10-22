<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 1.3
* @since MP-Ecokaishu 0.0
*/

get_header(); ?>

	<header>
		<nav id="sitepath"><?php if(function_exists( 'bread_crumb' ) ) bread_crumb(array('home_label' => 'エコランドNEWS')); ?></nav>
		<h2>
			<?php if (is_day()){
				printf( __('日別アーカイブ: %s'),　get_the_date());
			}elseif(is_month()){
				printf( __('月別アーカイブ: %s'), get_the_date('Y年n月'));
			}elseif(is_year()){
				printf( __('年別アーカイブ: %s'), get_the_date('Y年'));
			}elseif(is_post_type_archive()){
				$post_type = get_post_type_object( get_query_var( 'post_type' ));
				echo $post_type->label;
			}elseif(is_category() || is_tag()){
				single_term_title('', true);
			}else{
				the_title();
			}?>
		</h2>
	</header>
	
	<div class="container">

		<div class="contents">
			
			<section class="sliderCampaign" id="achiveCampaign">
					<h3>ただ今進行中のキャンペーン</h3>
					<ul id="owl-slide" class="owl-carousel owl-theme">
						<?php
						$args = array(
							"post_type" => "campaign",
							"campaignstatus" => "open"
						);
						$posts = query_posts($args);
						foreach($posts as $post): ?>
							<li id="<?php echo campCode($post, "children"); ?>">
								<?php if($post->post_title == "早割"):
									$got_manth = date("n", mktime(0, 0, 0, date("n"), date("d")+14, date("Y")));
									$got_day = date("j", mktime(0, 0, 0, date("n"), date("j")+14, date("Y")));?>
									<a class="mainVisual" href="<?php echo get_permalink($post->ID); ?>">
										<div class="campVisual">
											<div id="appealTitle">
												<p><span class="leftTitle">EARLY</span><span class="rightTitle">エコ回収</span></p>
											</div>
											<div id="dates">
												<p><span class="date"><span class="dateIn"><?php echo $got_manth ; ?></span></span><span class="date"><span class="dateIn">月</span></span><span class="date"><span class="dateIn"><?php echo $got_day; ?></span></span><span class="date"><span class="dateIn">日</span></span><span class="date" id="dateAfter"><span class="dateIn">以降</span></span></p>
											</div>
											<div id="discount">
												<p><span class="block">基本料金</span><span class="block mincho off">30%OFF</span></p>
											</div>
										</div>
									</a>
								<?php else: ?>
									<a class="mainVisual" href="<?php echo get_permalink($post->ID); ?>">
										<div class="campVisual">
											<h4><?php echo $post->post_title; ?></h4>
											<?php echo $post->post_content; ?>
										</div>
									</a>
							<?php endif; ?>

							</li>
						<?php endforeach; wp_reset_query(); ?>
					<!-- #owl-slide--></ul>
				</section>
		<!--.contents--></div>

		<div class="contents">
			<section>
				<h3>キャンペーンアーカイブ</h3>
				<div class="achiveIndex">
					<div class="sixcol col">キャンペーン名</div>
					<div class="twocol col">ステータス</div>
					<div class="fourcol col last">キャンペーン終了日</div>
				</div>
				<?php
				global $wp_query;
				query_posts(array_merge(
						array(
						'post_type' => array('post'),
						'orderby' => $orderby,
						'order' => $order,
					),
			   		$wp_query->query
				));
				if(have_posts()): ?>
					<ul class="achiveList">
						<?php while(have_posts()): the_post(); ?>
							<li>
								<div class="sixcol col title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></div>
								<div class="twocol col campaignOpen al_c"><?php
								$tags = get_the_terms($post->ID, "campaignstatus");
								if($tags){
									foreach($tags as $tag) if($tag->name == "open") echo "進行中";
								}else{
									echo "終了";
								}?></div>
								<div class="fourcol col al_c date last"><?php echo get_post_meta($post->ID, "campInfo05", single); ?></div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif ?>
			<!--campaign achive--></section>
		<!--.contents--></div>

		<?php if(function_exists('wp_pagenavi')): ?>
			<div class="twelvecol col last contents al_c">
				<?php wp_pagenavi(); ?>
			<!--.pagenavi .contents--></div>
		<?php endif; ?>

	<!-- .container --></div>

<?php get_footer(); ?>