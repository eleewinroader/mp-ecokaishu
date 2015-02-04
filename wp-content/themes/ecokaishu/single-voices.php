<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

get_header();

	$crtUserId = get_current_user_id();
	$crtUser = get_user_by("id", $crtUserId);

	$authors = get_the_terms($post->ID, "author");
	$authorNames = array();
	foreach($authors as $author) array_push($authorNames, $author->name);


	$review01 = get_post_meta($post->ID, "voiceInfo13", TRUE);
	$review01Score = get_post_meta($post->ID, "voiceInfo12", TRUE) ;
	$review02 = get_post_meta($post->ID, "voiceInfo15", TRUE);
	$review02Score = get_post_meta($post->ID, "voiceInfo14", TRUE) ;
	$review03 = get_post_meta($post->ID, "voiceInfo17", TRUE);
	$review03Score = get_post_meta($post->ID, "voiceInfo16", TRUE) ;
	$review04 = get_post_meta($post->ID, "voiceInfo19", TRUE);
	$review04Score = get_post_meta($post->ID, "voiceInfo18", TRUE);
	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.$postTypeUrl.'" itemprop="url">
				<a href="'.get_post_type_archive_link("voices").'">
					<span itemprop="title">お客様の声</span>
				</a>
			</div>
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.get_permalink($post->ID).'" itemprop="url">
					<span itemprop="title">'.getCustomerAreas($post).' '.getCustomerName($post).'様の口コミ</span>
				</a>
			</div>';
	?>



	<div class="headerPage">
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
	<!--.headerPage--></div>

	<div class="container">
		<div class="fourcol col">
			<div class="customerProfile">
				<h2>
					<?php echo getCustomerName($post); ?><span class="small">様</span>
				</h2>
				<dl>
					<dt class="hide">性別・年代</dt><dd class="name"><?php echo getCustomerSex($post)." / ".getCustomerAge($post); ?></dd>
					<dt class="hide">回収エリア</dt><dd class="place"><?php echo getCustomerAreas($post, TRUE);?></dd>
				</dl>
				<h3 class="index info">エコ回収をご利用になったきっかけ</h3>
				<ul><?php echo getCustomerStarts($post, "li"); ?></ul>
				<h3 class="index info">エコランドをお選びになった理由</h3>
				<ul><?php echo getCustomerFeatures($post, "li"); ?></ul>
				<h3 class="index items">エコ回収したアイテム</h3>
				<ul><?php echo getCustomerItems($post, TRUE, "li"); ?></ul>
				<p class="footnote"><small><?php echo get_the_date("Y-m-d"); ?>投稿</small></p>
			<!--customerProfile--></div>
			<div class="listStars small">
				<h4>星印の見方</h4>
				<ul>
					<li><span class="star star5"></span>感動(期待以上)</li>
					<li><span class="star star4"></span>満足(期待通り)</li>
					<li><span class="star star3"></span>普通(まぁまぁ)</li>
					<li><span class="star star2"></span>不満(がっかり)</li>
					<li><span class="star star1"></span>非常に不満(もう頼まない)</li>

				</ul>
			<!--listSns--></div>
			<div class="listSns">
				<ul>
					<li id="shareFacebook"><a href=""><span class="label">facebook</span></a></li>
					<li id="shareTwitter"><a href=""><span class="label">twitter</span></a></li>
					<li id="shareGoogle"><a href=""><span class="label">Google+</span></a></li>
				</ul>
			<!--listSns--></div>
		</div>
		<div class="eightcol col last customerVoices">
			<section class="answer">
				<h3>エコ回収サービス全体について評価してください。</h3>
				<p class="rating-foreground star star<?php echo $review03Score; ?>">
					<meta itemprop="rating" content="<?php echo $review03Score; ?>" />
					<span class="index"><?php echo getCustomerReview($post, $review03Score); ?></span>
				</p>
				<?php echo $review03;
				if(getStaffComments($post, "editor", $crtUser)){
					echo getStaffComments($post, "editor", $crtUser);
				}
				if(getStaffComments($post, "manager", $crtUser)){
					echo getStaffComments($post, "manager", $crtUser);
				}
				if(is_user_logged_in()){
					if($crtUser->roles[0] == "editor" || $crtUser->roles[0] == "manager"){
						comment_form();
					}
				}?>
			<!--answer--></section>
			<section class="answer">
				<h3>電話受付・メール対応など、コンシェルジュ<span class="small">(受付スタッフ)</span>の対応はいかがでしたか？</h3>
				<p class="rating-foreground star star<?php echo $review01Score; ?>">
					<meta itemprop="rating" content="<?php echo $review01Score; ?>" />
					<span class="index"><?php echo getCustomerReview($post, $review01Score); ?></span>
				</p>
				<?php
				echo $review01;
				if(getStaffComments($post, "conciergestaff", $crtUser)){
					echo getStaffComments($post, "conciergestaff", $crtUser);
				}
				if(is_user_logged_in()){
					if($crtUser->roles[0] == "conciergestaff"){
						$search = in_array($crtUser->user_login, $authorNames);
						if($search) comment_form();
					}
				}?>
			<!--answer--></section>
			<section class="answer">
				<h3>当日の集荷スタッフのご対応はいかがでしたか？</h3>
				<p class="rating-foreground star star<?php echo $review02Score; ?>">
					<meta itemprop="rating" content="<?php echo $review02Score; ?>" />
					<span class="index"><?php echo getCustomerReview($post, $review02Score); ?></span>
				</p>
				<?php
				echo $review02;
				if(getStaffComments($post, "cltstaff", $crtUser)){
					echo getStaffComments($post, "cltstaff", $crtUser);
				}
				if(is_user_logged_in()){
					if($crtUser->roles[0] == "cltstaff"){
						$search = in_array($crtUser->user_login, $authorNames);
						if($search) comment_form();
					}
				}?>
			<!--answer--></section>
			<?php if($review04Score == 0): ?>
				<section class="answer">
					<h3>不用品でお困りの方にエコ回収をオススメして頂けますか？</h3>
					<p class="m1_b b">オススメする</p>
					<?php echo $review04;?>
				<!--answer--></section>
			<?php endif; ?>
		<!--customerVoices--></div>
	</div>

	<div class="contents contactBnr">
		<div class="container">
			<div class="twelvecol col last">
				<?php echo contactBnr(TRUE); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>