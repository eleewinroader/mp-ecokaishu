<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

get_header();
$crt_term = $wp_query->queried_object;

	if($crt_term->parent != 0){ //月別アーカイブ ?>

		<header>
			<nav id="sitepath"><?php if(function_exists( 'bread_crumb' ) ) bread_crumb(array('home_label' => 'エコランドNEWS')); ?></nav>
			<h2>
				<?php
				$parent = get_term($crt_term->parent, $crt_term->taxonomy);
				echo '['.$parent->name.$crt_term->name.']お客様の声';
				?>
			</h2>
		</header>

		<?php
		$args = array(
			'get' => 'all',
		);
		$kinds = get_terms('voice_cat', $args);
		foreach($kinds as $kind){
			$args = array(
				'post_type' => 'voicesarchives',
				'post_status' => 'publish',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'voices',
						'field' => 'id',
						'terms' => array($crt_term->term_id),
					),
					array(
						'taxonomy' => 'voice_cat',
						'field' => 'id',
						'terms' => array($kind->term_id),
					)
				),
			);
			$posts = query_posts($args);
			if($posts): ?>
				<div class="contents">
					<h3><?php echo $kind->name; ?></h3>
					<div class="content">
						<ul class="cstmVoices">
							<?php
							foreach($posts as $post):
								$sex = wp_get_post_terms($post->ID, 'user_sex');
								$area = wp_get_post_terms($post->ID, 'user_area');
								$age = wp_get_post_terms($post->ID, 'user_age');
								$feedback = get_post_meta($post->ID, 'voicesInfo01', true); ?>
								<li>
									<dl class="cstm">
										<dt><span class="icon-user" aria-hidden="true"></span>
											<?php echo $area[0]->name; ?>
											<?php echo $age[0]->name; ?>
											<?php echo $sex[0]->name; ?>
										</dt>
										<dd><?php echo $post->post_content; ?></dd>
									</dl>
									<?php if($feedback): ?>
										<dl class="ecoland">
											<dt>エコランドからのご返答</dt>
											<dd><?php echo $feedback; ?></dd>
										</dl>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
			<?php endif;

		}

	}else{ //年別アーカイブ ?>

		<header>
			<nav id="sitepath"><?php if(function_exists( 'bread_crumb' ) ) bread_crumb(array('home_label' => 'エコランドNEWS')); ?></nav>
			<h2>
				<?php
				$parent = get_term($crt_term->parent, $crt_term->taxonomy);
				echo '['.$crt_term->name.']月別お客様の声一覧';
				?>
			</h2>
		</header>

		<?php
		$args = array(
			'child_of' => $crt_term->term_id,
			'get' => 'child_of',
		);
		$months = get_terms('voices', $args);
		if($months): ?>
			<div class="contents">
				<div class="content">
					<p>随時更新中です。</p>
					<ul class="cstmCalendar">
						<?php foreach($months as $month): ?>
							 <li><a href="<?php echo get_term_link($month, 'voices'); ?>"><?php echo $crt_term->name.$month->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php endif;

	}?>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>