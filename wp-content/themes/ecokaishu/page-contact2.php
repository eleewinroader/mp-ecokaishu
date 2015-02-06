<?php
/*
* @package Montser Platform
*/


include (TEMPLATEPATH . '/contact2-post.php');
include (TEMPLATEPATH . '/header-form.php');

?>

	<header>
		<h2><?php the_title(); ?></h2>
	</header>

	<div class="intro">
		<img src="<?php echo bloginfo("template_url"); ?>/assets/img/contact/appealing.png" alt="梱包配送料不要!!" id="appealing" />
		<p>エコオクにて、通常発生してしまう梱包配送料を支払うことなく、<br /> 現場引取にて商品を受け取りことが可能です。</p>
		<p>2015年2月8日(日)～2月19日(木)(落札日)</p>
		<dl>
			<dt>対象者</dt>
			<dd>キャンペーン期間中に、エコオクで商品を落札し、<br />その後、専用フォームから直接引取り申請をし、期日までに銀行振込いただいた方。</dd>
			<dd>2/15(日)、16(月)、22(日)、23日(月)の11時～14時に<br />東京都東村山市のエコオク倉庫に引き取りに来れる方。</dd>
			<dt>料金</dt>
			<dd>落札代金の他、１点あたり500円の引き取り手数料がかかります。</dd>
		</dl>
		<div class="footnote">
			<p><small>※落札日から11日目以降は保管料金500円/円発生します。</small>
			<small>※引き取りキャンセルの場合、梱包配送料金をお支払したのち発送したします。</small></p>
		</div>
		<p class="titFlow">ご利用の流れ</p>
		<ul>
			<li>
				<h5>STEP 1</h5>
				<h6>WEBでかんたん申込</h6>
				<p>以下フォームより、直接引取りかんたん申込</p>
			</li>
			<li>
				<h5>STEP 2</h5>
				<h6>引取前日までに振り込み</h6>
				<p>引取前日15:00までご指定の講座まで振り込み</p>
			</li>
			<li>
				<h5>STEP 3</h5>
				<h6>商品の引取</h6>
				<p>指定した引取日11:00-14:00の間エコオク倉庫にて商品引取</p>
			</li>
		</ul>
		<div class="clear"></div>
	</div>

	<div class="fullwidthForm" id="contact">
		<?php
		echo notices();
		$actions = get_permalink(get_page_by_path('contact2/confirm', OBJECT));
		$submits = "お問い合わせ内容を確認する";
		echo '<form action="'.$actions.'" method="post" name="form" id="contact" enctype="multipart/form-data">';
		include(TEMPLATEPATH.'/contact2-form.php');
		echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		?>

	</div>

</article>
</div>


<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>
</body>
</html>