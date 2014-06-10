<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/
?>
		<!-- article#<?php echo pageCode(TRUE); ?>--></article>

	<!-- #main --></div>

	<aside class="contents boiler" id="campaign">
		<div class="container">
			<h3>キャンペーン</h3>
			<ul>
				<li class="threecol col"><a href="http://www.eco-kaishu.jp/campaign/1404-00/"><img src="http://www.eco-kaishu.jp/img/kaishu/base/side_bnr_201404-00.gif" /></a></li>
				<li class="threecol col last"></li>
			</ul>
		</div>
	</aside>

	<footer class="siteFooter">
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
			<a href="http://www.g-mark.org/award/describe/35474" id="gd"><span class="icon-gooddesign icon"></span></a>
			<a href="http://privacymark.jp/" id="pmark"><span class="icon-pmark icon"></span></a>
		</div>
	</div>
	</footer>

<script type="text/javascript">
$(document).ready(function(){

	//col float adjust setting
	$(".last").after("<div class='clear'></div>");

	//fixedHeader
	var header = $("#fixedHeader");
	var headerHeight = $("#fixedHeader").outerHeight();
	var start = $(header).offset().top;
	var timerId = null;


	$.event.add(window, "scroll", function(){
		var p = $(window).scrollTop();
			
		if(p>start){
			var styles = {
				"position": "fixed",
				"top" : "0px"
			};
			$(header).css(styles);
			$(".panelCont").slideUp("fast");
		}else{
			var styles = {
				"position": "static",
				"top" : ""
			}
			$(header).css(styles);
		}
	});

	//showpanel
	$(".showSmaller").each(function(){
		$(this).click(function(){
			var panelId = $(this).attr("data-panel");
			var panel = $("#"+panelId);
			var contentId = $(this).attr("data-content");
			var content = $("#"+contentId);
			if(panel.css("display") == "none"){
				$(".panelCont").slideUp("fast");
				panel.html(content);
				panel.slideDown("fast");
			}else{
				panel.slideUp("fast");
			}
		});
	});
	
});
</script>

<?php wp_footer(); ?>
</body>
</html>
