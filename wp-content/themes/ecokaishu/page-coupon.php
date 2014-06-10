<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1
*/

$error = 0;
if($_GET){
	$couponNum = $_GET["couponnum"];
}else{
	if($_POST) include (TEMPLATEPATH . '/coupon-post.php');
	else $error = 1;
}
include (TEMPLATEPATH . '/header-form.php');
if($error){
	$title = "正しいアクセスではありません";
	$content = '<p>こちらはクーポン使用ユーザー様専用フォームです。<br />正しい手順でのアクセスでなかったため、アクセスを制限いたしました。</p>
<p>
お手数お掛けいたしますが、最初から作成をお願いいたします。<a href="https://www.eco-kaishu.jp/contact">お問い合わせフォーム</a><br />
お急ぎの方は0120-530-539までお気軽にご連絡ください。</p>';
}else{
	$title = get_the_title($post->ID);
}?>

	<header>
		<nav id="sitepath">
			<ul class="bread_crumb">					
				<li><?php echo $title; ?></li>
			</ul>
		</nav>
		<h2><?php echo $title; ?></h2>
	</header>

	<div class="fullwidthForm" id="coupon">

		<?php
		if($error){
			echo $content;			
		}else{
			echo notices();
			$actions = get_permalink(get_page_by_path('coupon/confirm', OBJECT));
			$submits = "お問い合わせを確認する";
			echo '<form action="'.$actions.'" method="post" name="form" id="coupon" enctype="multipart/form-data">';
			include(TEMPLATEPATH.'/coupon-form.php');
			echo '<div class="formBtns"><input type="submit" value="'.$submits.'" id="send" /></div></form>';
		}?>

	</div>

</article>
</div>


<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>


</body>
</html>