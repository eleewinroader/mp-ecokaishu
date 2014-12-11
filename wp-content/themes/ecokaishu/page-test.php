<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

get_header(); ?>
	
	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">
				<li><a href="<?php echo get_post_type_archive_link('voices'); ?>">お客様の声</a></li>
				<li><?php the_title(); ?></li>
			</ul>
		</nav>
		<h2><?php the_title(); ?>のお客様の声一覧</h2>
	</header>

	<div class="contents">
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>


	<?php
print_r($posts);
	//該当のアイテム格納
	$dates = wp_get_post_terms($post->ID, 'date');
	foreach($dates as $date){
		if($date->parent != 0) $month = $date;
		else $year = $date;
	}?>

	<div class="content">
		<ul class="monthNav">
		<?php
		$prevMonth = $month->name - 1;
		$prevMonthTerm = get_term_by('name', $prevMonth, 'date');
		$nextMonth = $month->name + 1;
		$nextMonthTerm = get_term_by('name', $nextMonth, 'date');
		$monthNav = array($prevMonthTerm, $nextMonthTerm);
		$monthNavClass = array('prevMonth', 'nextMonth');
		for($i=0; $i<count($monthNav); $i++){
			$args = array(		
				'post_type' => 'voices',
				'post_status' => 'publish',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'date',
						'field' => 'id',
						'terms' => array($year->term_id),
					),
					array(
						'taxonomy' => 'date',
						'field' => 'name',
						'terms' => array($monthNav[$i]->name),
					),
				),
			);
			$prevnext = query_posts($args);
			foreach($prevnext as $link){
				echo '<li class="'.$monthNavClass[$i].'"><a href="'.get_permalink($link->ID).'"">'.$link->post_title.'</a></li>';
			}
		}?>
		</ul>
	</div>

	<?php
	//該当のアイテム回収実績のquery配列
	$args = array(
		'post_type' => 'works',
		'post_status' => array('publish', 'pending'),
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'date',
				'field' => 'id',
				'terms' => array($year->term_id),
			),
			array(
				'taxonomy' => 'date',
				'field' => 'id',
				'terms' => array($month->term_id),
			)
		),
	);

	$voices = array('worksInfo17', 'worksInfo19');
	$answerskind = array('worksInfo40', 'worksInfo41');
	$answerscf = array('受付スタッフ', '回収スタッフ');

	for($i=0; $i<count($voices); $i++):

		$colletingWorks = query_posts(array_merge(array(
			'posts_per_page' => -1,
			'meta_query' => array(
				array('key' => $voices[$i])
			)
		), $args));

		if($colletingWorks): ?>

			<section class="contents">
				<h3><?php echo $answerscf[$i]; ?>について</h3>
				<div class="content">
					<ul class="cstmVoices">
						<?php foreach($colletingWorks as $colletingWork): ?>
							<li>
								<dl class="cstm">
									<dt><?php echo workArea($colletingWork).' / '.workCstmInfo($colletingWork); ?></dt>
									<dd><?php print_r(get_post_meta($colletingWork->ID, $voices[$i], true)); ?></dd>
								</dl>
								<?php if(get_post_meta($colletingWork->ID, $answerskind[$i], true)): ?>
									<dl class="ecoland">
										<dt><?php echo $answerscf[$i]; ?>からのご返答</dt>
										<dd><?php echo get_post_meta($colletingWork->ID, $answerskind[$i], true); ?></dd>
									</dl>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
	
	<?php endif; endfor; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>