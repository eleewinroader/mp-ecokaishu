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
	foreach($authors as $author) $staffId = $author->name; // get login account of author
	$staff = get_user_by("login", $staffId); // get user info by login account
	$staffImage = get_user_meta($staff->id, "profileimg", TRUE); // get profile image meta
	?>

	<img src="<?php echo $staffImage; ?>" class="staffimg" />

	<?php
	$args = array(
		"post_type" => "staffwords",
		"author" => $staffId
	);
	$words = query_posts($args); // get posts of staffwords posted by the staff
	foreach($words as $word){
		echo $word->post_contents;
	}?>


<?php get_footer(); ?>
