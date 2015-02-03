<?php
	get_header();

		$navPage .= '
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
					<a href="'.get_permalink($post->ID).'" itemprop="url">
						<span itemprop="title">'.get_the_title().'</span>
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
				<div class="twelvecol col last">
					<h2><?php echo get_the_title(); ?></h2>
				</div>
			</div>
		<!--.headerPage--></header>

		<?php
			$authors = get_the_terms($post->ID, "author"); // get author taxonomy of the post
			foreach($authors as $author) 
				$staffId = $author->name; // get login account of author
			$staff = get_user_by("login", $staffId); // get user info by login account
			$staffImage = get_user_meta($staff->id, "profileimg", TRUE); // get profile image meta
		?>		
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				"posts_per_page" => 2,
			    "post_type" => "staffwords",
			    "author" => "cap-".$staffId,
			    'paged' => $paged,
			);
			$words = query_posts($args); // get posts of staffwords posted by the staff
			$count_item = count($words);
			$index = 1;
		?>
		

		<section class="staffDetail">
			<div class="container">
				<div class="staffInfo contents">
					<div class="twelvecol col last">
						<h3>田野實 温代 <span>たのみ あつよ</span></h3>
						<div class="al_c">
							<div class="circleTrimming"><img src="<?php echo $staffImage; ?>" class="staffimg" /></div>
							<p>入社2年目 / コンシェルジュ</p>
						</div>
					</div>
				</div>
				<div class="staffDiary contents">
					<div class="twelvecol col last"><h3>田野實 温代の一言日記</h3></div>
					<div class="diary">			
						
						<?php foreach($words as $word): ?>
							<div class="sixcol col <?php echo $index==$count_item?"last":""?>">
								<div class="item">
									<?php echo $word->post_content; ?>
								</div>
							</div>
							<?php $index++;?>
						<?php endforeach;?>

					</div>	
					<a href="" class="seemore" id="seemore">もっと見る</a>			
				</div>
			</div><!--.container-->
		</section><!--.staffDetail-->

	<?php get_footer(); ?>


