<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
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

		<aside id="contactBnrFixed">
			<div class="container">
				
				<div class="twelvecol col last" data-panel="panelBnr" id="title">
					<h3>エコランドに今すぐ相談する</h3>
					<img src="<?php echo bloginfo("template_url"); ?>/assets/img/base/contactBnrFixed_icon.png" id="ecolandGirl" data-panel="panelBnr" />
				</div>
				<div id="panelBnr" class="<!--panelCont-->">
					<div class="threecol col" id="tel">
						<a href="tel:0120530<?php echo telNum(); ?>" class="telBnr" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});">
							<p class="msg" id="tap">お急ぎの方はお電話で！</p>
							<p class="btn">
								<span class="icon-phone"></span>0120-530-<?php echo telNum(); ?>
							</p>
							
						</a>
					</div>
					<div class="threecol col" id="contact">
						<a href="<?php echo siteInfo("rootUrl"); ?>/contact/">
							<p class="msg">お困りの事は何でもご相談！</p>
							<p class="btn"><span class="icon-question2"></span>お問い合わせ</p>
						</a>
					</div>
					<div class="threecol col" id="estimate">
						<a href="<?php echo siteInfo("rootUrl"); ?>/estimate<?php echo $ycoll; ?>/<?php echo $param; ?>">
							<p class="msg">見積もってほしいという方は！</p>
							<p class="btn"><span class="icon-shipping"></span>かんたん見積依頼</p>
						</a>
					</div>
					<div class="threecol col last" id="openingHour">
						<p>
							<span class="block">平･土 9時-22時</span>
							<span class="blcok">祝･日 9時-20時</span>
						</p>
					</div>
				</div>
				<div id="gotop"><a href="#ecoland"><span class="icon-arrow-up3"></span></a></div>
			<!--#contactBnrFixed .container--></div>
		<!--#contactBnrFixed--></aside>

		<aside class="boiler" id="campaign">
			<div class="container">
				<h3>キャンペーン</h3>
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

		<footer class="siteInfo">
			<div class="container">
			<div class="ninecol col" id="appendix">
				<ul>
					<li><a href="<?php echo get_post_type_archive_link("about"); ?>">企業情報</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3252)); ?>">寄付先紹介</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3250)); ?>">利用規約</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3248)); ?>">出品禁止商品ガイドライン</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3246)); ?>">プライバシーポリシー</a></li>
					<li><a href="<?php echo esc_url(get_permalink(3244)); ?>">個人情報の扱いについて</a></li>
				</ul>
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
				"top" : "0px"
			});
			$("#panelMenu").slideUp().css("display", "none");
		}else{
			$(header).css({
				"position": "static",
				"top" : ""
			});
		}

		<?php if(is_home() == FALSE): ?>
		//footer
		/*if ( docHeight - scrollPosition <= footerHeight ){

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
		}*/
		<?php endif; ?>

		//subMenu
		if(p>start){
			$(subMenu).css({
				"position": "fixed",
				"top" : headerHeight+"px"
			});
			$(subMenu).find("ul").addClass("spSettings");
		}else{
			$(subMenu).css({
				"position": "static",
				"top" : ""
			});
			$(subMenu).find("ul").removeClass("spSettings");
		}

	});

	//showpanel
	$(".showSmaller, .showBnr, .showMsg").each(function(){
		$(this).click(function(){
			var panelId = $(this).attr("data-panel");
			var panel = $("#"+panelId);
			var contentId = $(this).attr("data-content");
			var content = $("#"+contentId);
			if(panel.css("display") == "none"){
				$(".panelCont").slideUp();
				if($(this).attr("class") == "showSmaller") panel.html(content);
				panel.slideDown();
			}else{
				panel.slideUp();
			}
		});
	});

	//owl-slide
	$("#owl-slide").owlCarousel({ 
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		navigationText : ["",""],
		autoPlay: true
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

});

</script>

<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_google.php'); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_yahoo.php'); ?>

<?php wp_footer(); ?>
</body>
</html>
