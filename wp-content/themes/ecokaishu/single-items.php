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
	//vars
	$terms = get_the_terms($post->ID, 'cltitems');
	foreach($terms as $term){
		if($term->parent == 0){
			$parentItemTag = $term->slug;
			$parentItemName = $term->name;
			$parentItemId = $term->term_id;
		}
	}
	$postType = get_post_type_object(get_post_type());
	$postTypes = get_post_types(array("_builtin" => FALSE));

	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02"); 
	?>

	<div class="container">

		<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<div class="ninecol col">
				<div class="contents">

				<header>
					<nav class="catNavi">
						<ul>
							<li><a href="<?php echo getPostType($post, "link"); ?>"><?php echo getPostType($post, "label"); ?></a></li>
							<li><?php the_title(); ?></li>
						</ul>
					</nav>
					<h2><span class="title block"><?php the_title(); ?>のエコ回収</span></h2>
				</header>
				<?php
				$args = array(
					"post_type" => "faq",
					"posts_per_page" => -1,
					"qstcat" => $post->post_title
				);
				$faqs = query_posts($args);
				if($faqs): ?>
					<section class="achiveContents">
						<h3><?php the_title(); ?>のエコ回収について「よくある質問」</h3>
						<dl class="listFaq">
						<?php foreach($faqs as $faq): ?>
							<dt><?php echo $faq->post_title; ?></dt>
							<dd><?php echo $faq->post_content; ?></dd>
						<?php endforeach; wp_reset_query();?>
						</dl>
					</section>
				<?php endif; ?>

				<section id="voices" class="achiveContents">
					<?php if(!$voiceTitles): ?>
						<?php the_content();?>
					<?php else:?>
						<h3><?php the_title(); ?>のエコ回収を利用した「お客様からの声」</h3>
						<dl>
						<?php for($i=0; $i<count($voiceTitles); $i++){
							echo "<dt>".$voiceTitles[$i]."</dt>";
							echo "<dd>".$voiceContents[$i]."</dd>";
						}?>
						</dl>
					<?php endif; ?>
				</section>

				</div>
			</div>

		<?php endwhile; endif; ?>

		<aside class="threecol col last sidebar">

			<!--<div class="listBtn" id="faq">
				<a href="<?php echo get_post_type_archive_link("faq"); ?>"><span class="b pink big">よくある質問</span>はこちら</a>
			</div>-->

			<div class="bnrBtn">
				<a href="<?php echo get_post_type_archive_link("problems"); ?>"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/ecokaishu_bnr_problems_640x640.gif" alt="お悩みの方へページへ" /></a>
			</div>

			<?php
			$convSales = convSale();
			if($convSales): ?>
				<div class="behind">
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
				</div>
			<?php endif; ?>
			<?php

			//recent articles in the same area
			$args = array(
				"post_type" => $postType->name,
				"posts_per_page" => -1,
				"term" => $parentItemTag
			);
			$posts = query_posts($args);
			if($posts){
				echo '<div class="listItems"><h3>物品別エコ回収実績</h3><ul class="">';
				foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				echo '</ul></div>';
				wp_reset_query();
			}?>

		</aside>

	</div>

<?php get_footer(); ?>'
