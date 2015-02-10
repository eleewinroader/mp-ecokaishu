<?php
$authors = get_the_terms($post->ID, "author"); // get author taxonomy of the post
foreach($authors as $author) {
	$staffId = $author->name; // get login account of author
}

$staff = get_user_by("login", $staffId); // get user info by login account
$staffImage = get_user_meta($staff->id, "profileimg", TRUE); // get profile image meta
$enterYear = get_user_meta($staff->id, "enteryear", TRUE); 
$belongs = get_user_meta($staff->id, "belongs", TRUE); 

if(!@$_POST['paged']):?>
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
		<!-- <div class="container">
			<div class="twelvecol col last">
				<h2><?php echo get_the_title(); ?></h2>
			</div>
		</div> -->
	<!--.headerPage--></header>

	<?php
		$args = array(
			"posts_per_page" => 10,
			"post_type" => "staffwords",
			"authors" => $staffId,
		);
		$words = query_posts($args); // get posts of staffwords posted by the staff
		$count_item = count($words);
		$index = 1;
	?>
	

	<section class="staffDetail">
		<div class="container">
			<div class="staffInfo contents">
				<div class="twelvecol col last">
					<h3><?php echo get_the_title(); ?> <span>たのみ あつよ</span></h3>
					<div class="al_c">
						<div class="circleTrimming"><img src="<?php echo $staffImage; ?>" class="staffimg" /></div>
						<p><?php echo $enterYear; ?> 年入社 / <?php echo $belongs; ?></p>
					</div>
				</div>
			</div>
			<div class="staffDiary contents">
				<div class="twelvecol col last"><h3>田野實 温代の一言日記</h3></div>

				<?php if ( have_posts() ) : ?>
					<div class="items">	
						
						<?php foreach($words as $word): ?>
							<div class="item sixcol col <?php echo $index==$count_item?"last":""?>">
								<div class="cnt">
									<?php echo $word->post_content; ?>
								</div>
							</div>
							<?php $index++;?>
						<?php endforeach;?>

					</div>	
					<a href="javascript:void(0)" class="seemore" id="seemore">もっと見る</a>	
				<?php else : ?>
					<div class="noItems">No posts available now</div>
				<?php endif; ?>		
			</div>
		</div><!--.container-->
	</section><!--.staffDetail-->

	<?php get_footer(); ?>

	<script type="text/javascript">

	function Staff(){
		this.page = 2;
	}
	Staff.prototype.loadPage = function(){
		var mySelf = this;
		$('#seemore').click(function(){
			$.ajax({
				url: '<?php echo get_permalink(); ?>',
				type: "post",
				data: {paged:mySelf.page},
				dataType: "html",
				success: function(data) {
				 $('.staffDiary .items .clear').before(data);
				 mySelf.page += 1;
				}
			});
		});
	}

	$(document).ready(function() {
		var staffObj = new Staff();
		staffObj.loadPage();
	});

	</script>

<?php else: ?>

	<?php

		$paged = (int) $_POST['paged'];
		$args = array(
			"posts_per_page" => 10,
		    "post_type" => "staffwords",
		    "authors" => $staffId,
			'paged' => $paged,
		);
		$words = query_posts($args); // get posts of staffwords posted by the staff
		$count_item = count($words);
		$index = 1;
	?>

	<?php foreach($words as $word): ?>
		<div class="item sixcol col <?php echo $index==$count_item?"last":""?>">
			<div class="cnt">
				<?php echo $word->post_content; ?>
			</div>
		</div>
		<?php $index++;?>
	<?php endforeach;?>
<?php endif;?>


