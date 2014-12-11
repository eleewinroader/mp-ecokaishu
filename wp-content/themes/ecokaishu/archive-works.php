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
				<li>エコ回収・買取の実績</li>
			</ul>
		</nav>
		<h2>
			<?php
			$post_type = get_post_type_object( get_query_var( 'post_type' ));
			echo $post_type->label;
			?>
		</h2>
	</header>
	<div class="content">
		<p>エコランドの【エコ回収】は、<br />お客様から約317,000個の使わなくなったモノを扱った実績を持つ、人と地球にやさしいサービスです。<br />
ここでは、これまでにエコ回収した品物・地域ごとの実績をすべて掲載しています</p>
		<img src="<?php echo siteInfo('rootUrl'); ?>/img/kaishu/area_img_01.gif" alt="" class="al_c" />
	</div>

	<?php
	$args = array(
		'posts_per_page' => -1,
		'order' => ASC,
		'orderby' => 'title',
		'post_type' => 'items'
	);
	$cltitems = query_posts($args);
	if($cltitems): ?>
		<section class="contents">
			<h3>回収・買取をお考え中の品目は何ですか？</h3>
			<div class="content">
				<ul class="cstmCalendar">
					<?php foreach($cltitems as $cltitem){
						echo '<li><a href="'.get_permalink($cltitem->ID).'">'.$cltitem->post_title.'のエコ回収・買取</a></li>';
					}?>						
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<section class="contents">
		<h3>お住まい地域のエコ回収の実績を確認してください！</h3>
		<div class="content">
			<ul class="cstmCalendar">
			<?php
			$terms = get_terms('cltarea', array("parent"=>0));
			foreach($terms as $term){
				echo '<li><a href="'.get_term_link($term, 'cltarea').'">'.$term->name.'のエコ回収・買取</a></li>';
			}?>

			</ul>
		</div>
	</section>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>