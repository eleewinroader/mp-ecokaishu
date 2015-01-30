<?php
get_header();

	//calling
	$postType = get_post_type_object(get_post_type());
	$cltAreas = get_the_terms($post->ID, 'cltarea');
	
	//vars of post type
	$postTypeName = $postType->name;
	$postTypeLabel = $postType->label;
	$postTypeUrl = get_post_type_archive_link($postTypeName);

	//vars 
	$pageTitle = get_the_title($post->ID); //page title
	$voiceTitles = getMetaArr($post, "contentsInfo01");
	$voiceContents = getMetaArr($post, "contentsInfo02"); 
	$applicableAreas = get_the_terms($post->ID, 'applicablearea');
	//print_r($applicableAreas);
	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.$postTypeUrl.'" itemprop="url">
					<span itemprop="title">'.$postTypeLabel.'</span>
				</a> 
			</div>';
	
	if(count($cltAreas) > 1){ //vars for a single item page

		//get taxs
		 foreach($cltAreas as $cltArea){
			if($cltArea->parent == 0){
				$cltAreaName = $cltArea -> name; //cat name of a single item
			}
		}

		//get a cat page
		$args = array(
			"post_type" => $postTypeName,
			"name" => $cltAreaName
		);
		$cltArea = query_posts($args);
		if($cltArea){ // if a cat page exists
			$cltAreaId = $cltArea[0]->ID;
			$cltAreaUrl = get_permalink($cltAreaId); //cat url of a single item
			$navPage .= '
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
						<a href="'.$cltAreaUrl.'" itemprop="url">
							<span itemprop="title">'.$cltAreaName.'</span>
						</a> 
					</div>';
		}
		wp_reset_query();

		//vars for area
		foreach($applicableAreas as $applicable) $service = $applicable->name;
		switch ($service) {
			case '対象内':
				$text = '<span class="block">対象エリア</span>';
				break;
			case '地域料金':
				$text = '<span class="block">地域料金が</span><span class="block">かかるエリア</span>';
				break;
			//case 'サービス休止':
			//	$text = '<span class="block">サービス</span><span class="block">一時休止中</span>';
			//	break;
			default:
				$text = '<span class="block">対象外</span>';
				break;
		}
		$areaPageTitle = $cltAreaName." ".$pageTitle;

	}else{ // vars for a cat page

		//get a page
		$cltAreaId = $post->ID;
		$cltAreaName = $post->post_title;
		$areaPageTitle = $pageTitle;

		//vars for area
		if($cltAreaName == "東京都") $text = '<span class="block">全地域</span><span class="block">対応可能です!</span>';
		elseif( $cltAreaName == "兵庫県" || $cltAreaName == "大阪府") $text = "";
		else $text = '<span class="block">一部地域</span><span class="block">対応可能です!</span>';

	}

	$navPage .= '
			<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
				<a href="'.get_permalink($post->ID).'" itemprop="url">
					<span itemprop="title">'.$pageTitle.'</span>
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
				<h2><?php echo $areaPageTitle; ?></h2>
			</div>
		</div>
	<!--.headerPage--></header>

	
	<section class="staffDetail">
		<div class="container">
			<div class="staffInfo contents">
				<div class="twelvecol col last">
					<h3>田野實 温代 <span>たのみ あつよ</span></h3>
					<div class="al_c">
						<div class="circleTrimming"><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/concierge_img_tanomi.jpg" /></div>
						<p>入社2年目 / コンシェルジュ</p>
					</div>
				</div>
			</div>
			<div class="staffDiary contents">
				<div class="twelvecol col last"><h3>田野實 温代の一言日記</h3></div>
				<div class="diary">
					<div class="sixcol col">
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。ひとまず大森さんへ話個人どう話へ考えない人同じ時分あなたかふりにという小遠慮ますです</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p>それも前どうしてもこの相違院として事の日を知れですです。いかに始めを意味院ももちろんそのお話でまいじゃが知れと来たがは出立やったくっですば、ああには入っなたなで。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。ひとまず大森さんへ話個人どう話へ考えない人同じ時分あなたかふりにという小遠慮ますです</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
					</div>
					<div class="sixcol col last">
						<div class="item">
							<p>哲学に尽すたのはもう事実がいよいよりですだっ。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
						<div class="item">
							<p><img src="<?php echo bloginfo("template_url"); ?>/assets/img/staff/img01.jpg" /></p>
							<p>それも前どうしてもこの相違院として事の日を知れですです。いかに始めを意味院ももちろんそのお話でまいじゃが知れと来たがは出立やったくっですば、ああには入っなたなで。</p>
							<small>YYYY-MM-DD 投稿</small>
						</div>
					</div>
				</div>	
				<a href="#" class="seemore">もっと見る</a>			
			</div>
		</div><!--.container-->
	</section><!--.staffDetail-->
	

<?php get_footer(); ?>
