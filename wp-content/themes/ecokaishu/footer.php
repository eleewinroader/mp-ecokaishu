<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.1
* @since MP-Ecokaishu 0.0
*/
?>


	<!-- article#<?php echo pageCode(TRUE); ?>--></article>

	<div class="footer">

		<?php
		if(campCode($post)){ 
			$childrenClass = campCode($post, "children");
			$pr_code = substr($childrenClass, 7, 11);
			$pr_code = str_replace("-", "_", $pr_code);
			$param = "?pr_code=".$pr_code; 
			if($pr_code == "4_00") $ycoll = "2-1";
		}?>

		<aside class="boiler" id="campaign">
			<div class="container">
				<div class="twelvecol col last">
					<h3>ただ今のキャンペーン</h3>
				</div>
				<ul>
					<?php
					$i = 1;
					$args = array(
						"post_type" => "campaign",
						"campaignstatus" => "open"
					);
					$posts = query_posts($args);
					foreach($posts as $post){
						if($i == 4) $last = " last";
						$folder = substr($post->post_name, 0, 4);
						$code = substr($post->post_name, 5);
						echo '<li class="threecol col'.$last.'"><a href="'.get_permalink($post->ID).'"><img src="'.get_bloginfo("template_url").'/assets/img/campaign/'.$folder.'/'.$code.'_bnr_640x260.gif" alt="'.$post->post_title.'へ" /></a></li>';
						$i++;
					}
					wp_reset_query();
					?>
				</ul>
				<div class="clear"></div>
			</div>
		<!--#campaign--></aside>

		<aside class="boiler" id="sitePages">
			<div class="container">
				<div class="twelvecol col last">
					<h3>エコ回収 全コンテンツ</h3>
				</div>
				<div class="twocol col">
					<h4>サービス利用</h4>
					<ul>
						<li><a href="<?php echo siteInfo("rootUrl") ?>">サイトTOP</a></li>
						<li><a href="<?php echo get_post_type_archive_link("faq"); ?>#faq1">エコ回収できるモノ/できないモノ</a></li>
						<li><a href="<?php echo get_post_type_archive_link("faq"); ?>#faq3">買取について</a></li>
						<li><a href="<?php echo get_post_type_archive_link("faq"); ?>">よくある質問</a></li>
						<li><a href="<?php echo get_post_type_archive_link("campaign"); ?>">キャンペーン一覧</a></li>
						<li><a href="<?php echo siteInfo("rootUrl") ?>/estimate">メールで見積依頼</a></li>
						<li><a href="<?php echo get_post_type_archive_link("concierge"); ?>">WEB見積&申込</a></li>
					</ul>
				</div>
				<div class="twocol col">
					<h4>サービス案内</h4>
					<ul>
						<li><a href="<?php echo get_post_type_archive_link("ecokaishu"); ?>">エコ回収とは</a></li>
						<li><a href="<?php echo get_post_type_archive_link("problems"); ?>">お悩みの方へ</a></li>
						<li><a href="<?php echo get_post_type_archive_link("flow"); ?>">ご利用の流れ</a></li>
						<li><a href="<?php echo get_post_type_archive_link("price"); ?>">料金案内</a></li>
						<li><a href="<?php echo get_post_type_archive_link("staff"); ?>">スタッフ紹介</a></li>
						<li><a href="<?php echo get_category_link(507); ?>">100人に聞いてみました</a></li>
					</ul>
				</div>
				<div class="twocol col">
					<h4>対応エリアの確認</h4>
					<ul>
					<?php
					$terms = array("東京都", "神奈川県", "埼玉県", "千葉県", "大阪府", "兵庫県"); 
					foreach($terms as $term){
						$prefecture = get_page_by_title($term, "", "area");
						echo '<li><a href="'.get_permalink($prefecture->ID).'">'.$prefecture->post_title.'</a></li>';
					}?>
					</ul>
				</div>
				<div class="fourcol col">
					<h4>アイテム別口コミ・エコ回収実績</h4>
					<ul class="listItems">
						<?php
						$posts = query_posts(
							array(
								"order_by" => "date",
								"order" => ASC,
								"post_type" => "items",
								"posts_per_page" => -1
							)
						);
						foreach($posts as $post){
							echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
						}
						wp_reset_query();
						?>
					</ul>
				</div>
				<div class="twocol col last">
					<h4>当サイトについて</h4>
					<ul>
						<li><a href="<?php echo get_post_type_archive_link("about"); ?>">企業情報</a></li>
						<?php
						$docsCat = get_category_by_slug("docs");
						$posts = query_posts(
							array(
								"order_by" => "date",
								"order" => ASC,
								"post_type" => "post",
								"posts_per_page" => -1,
								"cat" => $docsCat->term_id
							)
						);
						foreach($posts as $post) echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
						wp_reset_query(); ?>
						<li><a href="<?php echo bloginfo("siteurl"); ?>/contact/">お問い合わせ</a></li>
					</ul>
				</div>
			</div>
		</aside>

		<footer class="siteInfo">
			<div class="container">
			<div class="ninecol col" id="appendix">
				<ul>
					<li>株式会社ウインローダー 東京都杉並区上荻2-37-7</li>
					<li>エコランドコンシェルジュ 0120-530-539</li>
					<li>特願2007-262892 取得済み</li>
				</ul>
				<p>Copyrights&copy;. <?php echo date("Y"); ?> WINROADER ALL RIGHT RESERVED.</p>
			</div>
			<div class="threecol col last" id="logos">
				<a href="http://www.g-mark.org/award/describe/35474" id="gd" rel="nofollow"><span class="icon-gooddesign icon"></span></a>
				<a href="http://privacymark.jp/" id="pmark" rel="nofollow"><span class="icon-pmark icon"></span></a>
			</div>
		</footer>

	</div>

	<div id="shortcutsBtns">
		<ul>
			<li><a href="tel:0120530<?php echo telNum(); ?>" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});"><span class="icon-phone"></span><span class="label"><span class="block">0120</span><span class="block">530-<?php echo telNum(); ?></span></span></a></li>
			<li><a href="http://www.eco-kaishu.jp/estimate"><span class="icon-shipping"></span><span class="label"><span class="block">メールで</span><span class="block">見積依頼</span></span></a></li>
			<li><a href="<?php echo get_post_type_archive_link("faq"); ?>"><span class="icon-question"></span><span class="label">よくある質問</span></a></li>
			<li><a href="#siteHeader"><span class="icon-arrow-up3"></span><span class="label">TOP</span></a></li>
		</ul>
	</div>

<script type="text/javascript">
$(document).ready(function(){

	//col float adjust setting
	$(".last").after("<div class='clear'></div>");

	//elements
	var header = $("#headerFixed");
	var footer = $("#contactBnrFixed");
	var subMenu = $(".subMenu");
	//vars
	var docHeight = $(document).height();
	var windowHeight = $(window).height();
	var headerHeight = $("#headerFixed").outerHeight();
	var footerHeight = $(".footer").innerHeight();
	var subMenuHeight = $(".subMenu").outerHeight();
	var start = $(header).offset().top;

	$.event.add(window, "scroll", function(){

		//positions
		var p = $(window).scrollTop();
		var scrollPosition = windowHeight + p;

		//header
		if(p>start){
			$(header).css({
				"position": "fixed",
				"top" : "0px",
				"padding-top" : "1.0rem"
			});
			$("#panelMenu").slideUp().css("display", "none");
		}else{
			$(header).css({
				"position": "static",
				"top" : "",
				"padding-top" : "0rem"
			});
		}

		<?php if(is_home() == FALSE): ?>
		//footer
		if ( docHeight - scrollPosition <= footerHeight ){

			$(footer).css({
				"position": "static",
				"bottom": "inherit"
			});
			<?php if(is_smartphone()): ?>
				$("#panelBnr").slideDown().css("display", "block");
			<?php endif; ?>

		}else{

			$(footer).css({
				"position": "fixed",
				"bottom" : "0px"
			});
			<?php if(is_smartphone()): ?>
				$("#panelBnr").slideUp().css("display", "none");
			<?php endif; ?>
		}
		<?php endif; ?>

		
	});

	// pc mouseover
	$('.showLnSubmenu').on({
		'mouseenter':function(){
			$(this).children('ul').show();
		},
		'mouseleave':function(){
			$(this).children('ul').hide();
		}
	});

	<?php if(is_smartphone()): ?>

	// sp menu
	$(".showSmaller").each(function(){
			
		var panelId = $(this).attr("data-panel");
		var panel = $("#"+panelId);
		var contentId = $(this).attr("data-content");
		var content = $("#"+contentId);

		panel.html(content); // ex: $("#panelMenu").html($("#contMenu"));
	});
	
	//// header
	// sp main menu btn tap
	$('#menuBtn').on({
		'touchstart':function(){
			$("#panelMenu").animate({height: "toggle", opacity: "toggle"}, "slow");

			// close sub menu
			if($(".lnSubMenu").css("display") == "block"){
				$(".lnSubMenu").css("display", "none");
			}
		}
	});

	// sp sub menu btn tap
	$(".showLnSubmenu").on({
		"touchstart":function(){
			var subId = $(this).attr("data-sub");
			$("#"+subId).animate({height: "toggle", opacity: "toggle"}, "slow");
		}
	});

	// footer
	$("#title").on({
		"touchstart":function(){
			$("#panelBnr").animate({height: "toggle", opacity: "toggle"}, "slow");
		}
	});

	<?php endif; ?>

	//owl-slide
	$(".owl-carousel").owlCarousel({ 
		navigation : true, // Show next and prev buttons
		slideSpeed : 500,
		paginationSpeed : 1000,
		singleItem: true,
		navigationText : ["",""],
		autoPlay: true
	});

	//showMsg
	$(".showMsg").each(function(){
		$(this).click(function(){
			var id = $(this).attr("data-panel");
			var panel = $("#"+id);
			if(panel.css("display") == "none"){
				$(".panelCont").slideUp("fast");
				panel.slideDown("fast");
			}else{
				panel.slideUp("fast");
			}
		});
	});

	//masonry
	var $container = $(".liquidLayout").masonry();
	$container.imagesLoaded( function() {
		$container.masonry({
			"columnWidth": 75,
			"gutter": 20,
			"itemSelector": ".item"
		});
	});

	//scrolling
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - headerHeight
					}, 300);
					return false;
			}
		}
	});

	//newsticker
	$('#news ul').inewsticker({
		speed : 5000,
		effect : 'fade',
		dir : 'ltr',
		delay_after : 2000
	});

	//setting for not sp
	<?php if(!is_smartphone()): ?>

		//tab
		$(".tabCont:first-of-type").show();
		<?php if(get_post_type() == "price"): ?>$(".tabIndex li:nth-of-type(2)").addClass("active");<?php endif; ?>
		<?php if(get_post_type() == "flow"): ?>$(".tabIndex li:nth-of-type(1)").addClass("active");<?php endif; ?>
		$(".tabIndex .tabBtn").each(function(){
			$(this).click(function(){
				$(".tabIndex li").removeClass("active");
				$(this).addClass("active");
				var tabId = $(this).attr("data-tab");
				$(".tabCont").hide();
				$("#"+tabId).fadeIn("slow");
			});
		});

	<?php endif; ?>

	//setting for sp
	<?php if(is_smartphone()): ?>

		//img for sp
		$(".imgforSp").each(function(){
			var img = $(this).attr('src');
			var extension = img.match(/(\.)(png|jpg|gif)/gi);
			var name = "_s" + extension;
			$(this).attr("src", img.replace(/(\.)(png|jpg|gif)/gi, name));
		});

	<?php endif; ?>

});

</script>

<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_google.php'); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_yahoo.php'); ?>

<?php wp_footer(); ?>
</body>
</html>
