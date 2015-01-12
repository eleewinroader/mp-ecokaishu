<?php
/**
 * The main template file.
* @package Montser Platform
 */
if(is_single()){
	$tempType = "single";
	$metaObj = $post;
}elseif(is_page()){
	$tempType = "single";
	$metaObj = $post;
}elseif(is_post_type_archive()){
	$tempType = "postTypeArchive";
	$metaObj = get_post_type_object(get_post_type());
}elseif(is_archive()){
	$tempType = "archive";
	if(is_category() || is_tag() || is_tax()){
		if(is_category()){
			$tax_slug = "category";
			$id = get_query_var('cat');
		}elseif(is_tag()){
			$tax_slug = "post_tag";
			$id = get_query_var("tag_id");
		}elseif(is_tax()){
			$tax_slug = get_query_var("taxonomy");
			$term_slug = get_query_var("term");
			$term = get_term_by("slug",$term_slug,$tax_slug);
			$id = $term->term_id;
		}
		$metaObj = get_term($id, $tax_slug);
	}else{

	}
}elseif(is_home()){
	$tempType = "home";
}
$h1 = getH1($tempType, $metaObj); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$brow = IEbrowserVer();
if($brow == "msie ie6" || $brow == "msie ie7" || $brow == "msie ie8"){
	echo '<meta http-equiv="refresh" content="0; url=http://www.eco-kaishu.jp/legacy">';
}?>
<?php
$title = getTitle($tempType, $metaObj);
$description = getDescription($tempType, $metaObj);
$keywords = getKeywords($tempType, $metaObj);
if($title) echo "<title>".$title."</title>"."\n";
else echo "<title></title>\n";
if($description && !is_single()) echo '<meta name="description" itemprop="description" content="'.$description.'" />'."\n";
if($keywords && !is_single()) echo '<meta name="keywords" itemprop="keywords" content="'.$keywords.'" />'."\n";
?>
<link href="<?php echo bloginfo("stylesheet_url"); ?>" rel="stylesheet" type="text/css" media="all" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.min.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script.min.js"></script>
<script type="text/javascript">
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/ga_common.php'); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/ga_ecokaishu.php'); ?>
</script>
<?php wp_head(); ?>
</head>
<body>

<article class="<?php echo getArticleClass($tempType, $metaObj);?>"<?php echo getArticleId($tempType, $metaObj); ?>>

<?php include (TEMPLATEPATH . '/inquiry-post.php'); ?>

<div class="container" id="inquiryForm">

<?php if($_POST == FALSE): ?>


	<!--start section01-->
	<div class="formContents" id="section01">
		<div class="intro">
			<h1>
				<span class="block">エコランドの</span><span class="block">満足度レビュー</span><span class="block">にご協力ください。</span>
			</h1>
			<p>
				<span class="block">このたびはエコランドのサービスをご利用頂き、誠にありがとうございました。</span>
				<span class="block">ぜひサービスに関するご感想・ご意見をお聞かせください。</span>
				<span class="block">頂いたご意見は今後のサービス品質向上のために活用させて頂きます。</span>
			</p>
			<p>
				<span class="block">レビューにお答えいただくためには、領収書に記載ているエコNo.とパスワードが必要です。</span>
				<span class="block">手元に領収書をご用意してください。</span>
			</p>
			<p>
				<span class="block">お客様レビューの内容はエコランドHP上に掲載されます。</span>
				<span class="block pink">お客様の個人情報は掲載致しませんのでご安心ください。</span>
			</p>
			<div class="formBtns">
				<a href="#" id="btnNext01" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/personalinfo/'}');ga('send', 'pageview',{'page':'/inquiry/personalinfo/'});">次へ</a>
			</div>
		</div>
	</div>
	<!--end section01-->

	<form action="<?php echo get_permalink(); ?>" id="frmQuestion" method="post">

		<!--start section02-->
		<section class="formContents" id="section02">
			<h2><span class="block">エコランドサービスのレビューのためには</span><span class="block">下記の個人情報の取り扱いについて同意が必要です。</span></h2>
			<div class="formElements">
				<div class="lawDoc"><?php echo get_post_field('post_content', 3244); ?></div>
				<div class="formBtns">
					<a href="#" id="btnNext02" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q1/'}');ga('send', 'pageview',{'page':'/inquiry/q1/'});">同意してレビューを開始</a>
				</div>
			</div>
		</section>
		<!--end section02-->

		<!--start section03-->
		<section class="formContents" id="section03">
			<h2><span class="crtPage">1</span>/10</h2>
			<div class="formElements">
				<p class="index">エコNo.とパスワードを入力してください</p>
				<div class="formElement">
					<ul>
						<li><input type="text" value="" name="cstmCltId" id="cstmCltId" placeholder="エコNo. 例)123456789" required /></li>
						<li><input type="password" value="" name="cstmCltPass" id="cstmCltPass" placeholder="パスワード 例)1234" required /></li>
					</ul>
					<p class="footnote">
						<small>※ エコNo.は領収書の右上に記載されている「案件ID」です。<br />
						※ パスワードは領収書の左上に記載されています。</small>
					</p>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev03" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/personalinfo/'}');ga('send', 'pageview',{'page':'/inquiry/personalinfo/'});">戻る</a><a href="javascript:void(0);" id="btnNext03" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q2/'}');ga('send', 'pageview',{'page':'/inquiry/q2/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section03-->


		<!--start section04-->
		<section class="formContents" id="section04">
			<h2><span class="crtPage">2</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">ニックネームを入力してください。</p>
					<ul>
						<li><input type="text" name="cstmName" value="" id="cstmName" placeholder="ニックネーム 例)えこりん" required /></li>
					</ul>
				</div>
				<div class="formElement">
					<ul>

						<?php
						$cstmSexs = array("女性", "男性");
						for($i=0; $i<count($cstmSexs); $i++){
							echo '<li><input type="radio" name="cstmSex" value="'.$i.'" class="cstmSex" id="cstmSex'.$i.'" /><label for="cstmSex'.$i.'">'.$cstmSexs[$i].'</label></li>';
						}?>
						<li>
							<label>年代</label>
							<select name="cstmAge" id="cstmAge">
								<option value="">選択してください</option>
								<?php
								$cstmAges = array(
									"20代",
									"30代",
									"40代",
									"50代",
									"60代",
									"70代以上"
								);
								for($i=0; $i<count($cstmAges); $i++){
									echo '<option value="'.$i.'">'.$cstmAges[$i].'</option>';
								}?>
							</select>
						</li>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev04" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q1/'}');ga('send', 'pageview',{'page':'/inquiry/q1/'});">戻る</a><a href="javascript:void(0);" id="btnNext04" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q3/'}');ga('send', 'pageview',{'page':'/inquiry/q3/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section04-->

		<!--start section05-->
		<section class="formContents" id="section05">
			<h2><span class="crtPage">3</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">エコ回収にお伺いした地域はどちらですか。</p>
					<ul>
						<li>
						<select name="cltPrefecture" id="prefectures" required>
							<option value="">選択してください</option>
							<?php
							$args = array(
								'get' => 'all',
								'parent' => 0,
							);
							$terms = get_terms('cltarea', $args);
							asort($terms);
							$i = 0;
							foreach($terms as $term){
								echo '<option value="'.$term->name.'" id="prefecture'.$i.'">'.$term->name.'</option>';
								$i++;
							}?>
						</select>
						<?php
						$j = 0;
						foreach($terms as $term){
							$municipalities = get_term_children($term->term_id, 'cltarea');
							asort($municipalities);
							if($municipalities){
								echo '<select name="cltMncplt'.$j.'" id="prefecture'.$j.'" class="municipality">';
								echo '<option value="">市区町村を選択してください</option>';
								$k = 0;
								foreach($municipalities as $municipality){
									$mncplt = get_term_by('id', $municipality, 'cltarea' );
									echo '<option value="'.$mncplt->name.'">'.$mncplt->name.'</option>';
									$k++;
								}
								echo '</select>';
							}
						$j++;
						}?>
						</li>
					</ul>
				</div>
				<div class="formElement">
					<p class="index">エコ回収させて頂いた品物をお選びください。</p>
					<ul>
						<?php
						$cltItems = array(
							"ベッド",
							"ソファ",
							"テレビ",
							"洗濯機",
							"冷蔵庫",
							"パソコン",
							"その他"
						);
						for($i=0; $i<count($cltItems); $i++){
							if($cltItems[$i] != "その他") $code = $i;
							else $code = "Etc";
							echo '<li><input type="checkbox" name="cltItem[]" value="'.$cltItems[$i].'" id="cltItem'.$code.'" class="cltItem" /><label for="cltItem'.$code.'">'.$cltItems[$i].'</label></li>
							';
						}?>
						<li>
							<input type="text" name="cltItemTxt" value="" id="cltItemTxt" placeholder="その他のアイテムについて具体的記述してください。" />
						</li>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev05" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q2/'}');ga('send', 'pageview',{'page':'/inquiry/q2/'});">戻る</a><a href="javascript:void(0);" id="btnNext05" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q4/'}');ga('send', 'pageview',{'page':'/inquiry/q4/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section05-->

		<!--start section06-->
		<section class="formContents" id="section06">
			<h2><span class="crtPage">4</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">不用品を出そうと思ったきっかけは何ですか？</p>
					<ul>
						<?php
						$cstmStarts = array("お引越", "お片づけ", "買い替え", "その他");
						for($i=0; $i<count($cstmStarts); $i++){
							if($cstmStarts[$i] != "その他") $code = $i;
							else $code = "Etc";
							echo '<li><input type="checkbox" name="cstmStart[]" value="start'.$i.'" id="cstmStart'.$code.'" class="cstmStart" /><label for="cstmStart'.$code.'">'.$cstmStarts[$i].'</label></li>
							';
						}?>
						<li><input type="text" name="cstmStartTxt" value="" id="cstmStartTxt" placeholder="その他のきっかけについて具体的記述してください。" /></li>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev06" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q3/'}');ga('send', 'pageview',{'page':'/inquiry/q3/'});">戻る</a><a href="javascript:void(0);" id="btnNext06" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q5/'}');ga('send', 'pageview',{'page':'/inquiry/q5/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section06-->

		<!--start section07-->
		<section class="formContents" id="section07">
			<h2><span class="crtPage">5</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">当社をお選びいただいた理由は何ですか？(複数可)</p>
					<ul id="reasons">
						<?php
						$cstmReasons = array(
							"急な対応が可能だった",
							"日時が指定できる",
							"運び出ししてもらえる",
							"土日も対応できる",
							"買取対応もしている",
							"解体作業もしてくれる",
							"メールで見積できる",
							"1品から対応できる",
							"1点ずつ料金が決まっている",
							"料金が安い",
							"サービス内容が分かりやすかった",
							"知人/他企業からの紹介だったから",
							"受付スタッフの対応が良かったから",
							"見積スタッフの対応が良かったから",
							"運営会社が信頼できた",
							"以前利用した時に良かった",
							"スタッフが事前に分かる",
							"明確な料金が事前に分かる",
							"リユース・リサイクルしている",
							"オークションに出品できる"
						);
						for($i=0; $i<count($cstmReasons); $i++){
							echo '<li><input type="checkbox" name="cstmReason[]" value="feature'.$i.'" id="cstmReason'.$i.'" class="cstmReason" /><label for="cstmReason'.$i.'">'.$cstmReasons[$i].'</label></li>
								';
						}?>
					</ul>
				</div>
				<div class="formElement" id="reasonSelect">
					<p class="index">当社をお選び頂いた理由の中でベスト3をお選びください。</p>
					<ul>
						<li>
							<label for="cstmReasonSelect1">1番</label>
							<select name="cstmReason1" id="cstmReasonSelect1" class="cstmReasonSelect">
								<option value="">選択してください</option>
							</select>
						</li>
						<li>
							<label for="cstmReasonSelect2">2番</label>
							<select name="cstmReason2" id="cstmReasonSelect2" class="cstmReasonSelect">
								<option value="">選択してください</option>
							</select>
						</li>
						<li>
							<label for="cstmReasonSelect3">3番</label>
							<select name="cstmReason3" id="cstmReasonSelect3" class="cstmReasonSelect">
								<option value="">選択してください</option>
							</select>
						</li>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev07" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q4/'}');ga('send', 'pageview',{'page':'/inquiry/q4/'});">戻る</a><a href="javascript:void(0);" id="btnNext07" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q6/'}');ga('send', 'pageview',{'page':'/inquiry/q6/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section07-->

		<?php
		$voiceScores = array(
			'非常<span class="small">に不満(もう頼まない)</span>',
			'不満<span class="small">(がっかり)</span>',
			'普通<span class="small">(まぁまぁ)</span>',
			'満足<span class="small">(期待通り)</span>',
			'感動<span class="small">(期待以上)</span>'
		);?>

		<!--start section08-->
		<section class="formContents" id="section08">
			<h2><span class="crtPage">6</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">電話受付やメール対応など、コンシェルジュ<span class="small">(受付スタッフ)</span>の対応はいかがでしたか？</p>
					<ul>
						<?php
						for($i=5; $i>0; $i--){
							echo '<li><input type="radio" name="voiceCC" value="'.$i.'" id="voiceCC'.$i.'" class="cmtIndex voiceCC" required /><label for="voiceCC'.$i.'">'.$voiceScores[$i-1].'</label>';
						}?>
					</ul>
				</div>
				<div class="formElement">
					<p class="index">どのような点で<span id="voiceCCVal"></span>と感じましたか。</p>
					<textarea name="voiceCCCmt" id="voiceCCCmt" placeholder="例) 始めての利用でしたが、親切に対応してくれたので安心して依頼ができました。"></textarea>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev08" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q5/'}');ga('send', 'pageview',{'page':'/inquiry/q5/'});">戻る</a><a href="javascript:void(0);" id="btnNext08" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q7/'}');ga('send', 'pageview',{'page':'/inquiry/q7/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section08-->

		<!--start section09-->
		<section class="formContents" id="section09">
			<h2><span class="crtPage">7</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">当日の集荷スタッフのご対応はいかがでしたか？</p>
					<ul>
						<?php
						for($i=5; $i>0; $i--){
							echo '<li><input type="radio" name="voiceCS" value="'.$i.'" id="voiceCS'.$i.'" class="cmtIndex voiceCS" required /><label for="voiceCS'.$i.'">'.$voiceScores[$i-1].'</label></li>';
						}?>
					</ul>
				</div>
				<div class="formElement">
					<p class="index">どのような点で<span id="voiceCSVal"></span>と感じましたか。</p>
					<textarea name="voiceCSCmt" id="voiceCSCmt" placeholder="例) とても暑い日だったにも関わらずテキパキと作業してくれた。"></textarea>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev09" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q6/'}');ga('send', 'pageview',{'page':'/inquiry/q6/'});">戻る</a><a href="javascript:void(0);" id="btnNext09" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q8/'}');ga('send', 'pageview',{'page':'/inquiry/q8/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section9-->

		<!--start section10-->
		<section class="formContents" id="section10">
			<h2><span class="crtPage">8</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">エコ回収のサービスのご対応はいかがでしたか？</p>
					<ul>
						<?php
						for($i=5; $i>0; $i--){
							echo '<li><input type="radio" name="voiceGeneral" value="'.$i.'" id="voiceGeneral'.$i.'" class="cmtIndex voiceGeneral" required /><label for="voiceGeneral'.$i.'">'.$voiceScores[$i-1].'</label></li>';
						}?>
					</ul>
				</div>
				<div class="formElement">
					<p class="index">どのような点で<span id="voiceGeneralVal"></span>と感じましたか。</p>
					<textarea name="voiceGeneralCmt" id="voiceGeneralCmt" placeholder="例) 事前に見積の詳細がわかるし、対応も良かったので全体的に安心して利用できました。"></textarea>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev10" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q7/'}');ga('send', 'pageview',{'page':'/inquiry/q7/'});">戻る</a><a href="javascript:void(0);" id="btnNext10" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q9/'}');ga('send', 'pageview',{'page':'/inquiry/q9/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section10-->

		<!--start section11-->
		<section class="formContents" id="section11">
			<h2><span class="crtPage">9</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p class="index">不用品でお困りの方にエコ回収をオススメして頂けますか？</p>
					<ul>
						<?php
						$voiceRecommends = array("オススメする", "オススメしない");
						for($i=0; $i<count($voiceRecommends); $i++){
							echo '<li><input type="radio" name="voiceRecommend" value="'.$i.'" id="voiceRecommend'.$i.'" class="cmtIndex voiceRecommend" required /><label for="voiceRecommend'.$i.'">'.$voiceRecommends[$i].'</label></li>';
						}?>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev11" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q8/'}');ga('send', 'pageview',{'page':'/inquiry/q8/'});">戻る</a><a href="javascript:void(0);" id="btnNext11" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q10/'}');ga('send', 'pageview',{'page':'/inquiry/q10/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section11-->

		<!--start section12-->
		<section class="formContents" id="section12">
			<h2><span class="crtPage">10</span>/10</h2>
			<div class="formElements">
				<div class="formElement">
					<p id="txtRecommend01" class="index">オススメすると答えた方へ <br />「エコ回収を利用しようかお悩みの方へ、アドバイスをお願いします」</p>
					<p id="txtRecommend02" class="index">オススメしないと答えた人へ <br />「どのような点を改善できればエコ回収をオススメできるようになりますか」</p>
					<textarea name="voiceRecommendCmt" id="voiceRecommendCmt" placeholder="placeholder"></textarea>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev12" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q9/'}');ga('send', 'pageview',{'page':'/inquiry/q9/'});">戻る</a><a href="javascript:void(0);" id="btnNext12" class="btnNext" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/lottery/'}');ga('send', 'pageview',{'page':'/inquiry/lottery/'});">次へ</a>
				</div>
			</div>
		</section>
		<!--end section12-->

		<!--start section13-->
		<div class="formContents" id="section13">
			<div class="formElements">
				<div class="formElement">
					<p class="index">ただいま<br />「抽選で20名様に3,000円の商品券プレゼント！お客様レビュー始めましたキャンペーン！」<br />を実施しております。<br />抽選ご希望の方はお名前、メールアドレス、電話番号をご入力の上、送信してください。</p>
					<p>抽選をご希望されない方はこのまま送信してください。<p>
					<p class="footnote"><small>※ 当選は発送をもって発表させて頂きます。</small></p>
					<ul>
						<li><input type="text" name="cstmNamePrivate" value="" id="cstmNamePrivate" placeholder="お名前 例)エコ花子" /></li>
						<li><input type="email" name="cstmEmail" value="" id="cstmEmail" placeholder="メールアドレス 例)hoge@example.com" /></li>
						<li><input type="text" name="cstmPhoneNum" value="" id="cstmPhoneNum" placeholder="電話番号 例)01234567890(数字のみ)" /></li>
					</ul>
				</div>
				<div class="formBtns">
					<a href="javascript:void(0);" id="btnPrev13" class="btnPrev" onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/q10/'}');ga('send', 'pageview',{'page':'/inquiry/q10/'});">戻る</a><input onclick="ga('secondTracker.send','pageview',{'page':'/inquiry/thanks/'}');ga('send', 'pageview',{'page':'/inquiry/thanks/'});" type="submit" value="送信" class="btnNext" id="btnNext13" />
				</div>
			</div>
		</div>
		<!--end section13-->

	</form>

<?php else: ?>

	<!--start section14-->
	<section class="twelvecol col last al_c" id="thanks">
		<div class="intro">
			<h2>ありがとうございました。</h2>
			<div class="formElements">
				<p>いつもエコランドをご利用頂きましてありがとうございます。</p>
				<div class="formBtns">
					<a href="<?php echo get_bloginfo("url"); ?>">エコ回収TOPへ移動</a>
				</div>
			</div>
		</div>
	</section>
	<!--end section14-->

	<!-- Google Code for &#12456;&#12467;&#22238;&#21454;CV&#12479;&#12464; Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 974830453;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "ewxYCOv_2QkQ9fbq0AM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974830453/?label=ewxYCOv_2QkQ9fbq0AM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

<?php endif; ?>

</div>

<?php include (TEMPLATEPATH . '/inquiry-validation.php'); ?>

<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_google.php'); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]. '/inc/tags/rm_yahoo.php'); ?>

<footer class="siteFooter al_c">
	<p>Copyrights&copy;. 2014 WINROADER ALL RIGHT RESERVED.</p>
</footer>

<?php wp_footer(); ?>

<script src="//easy-entry.jp/ffconf/ffconf_5000_0141_0233.js" charset="utf-8" type="text/javascript"></script>
<script src="//easy-entry.jp/track/efo2r.js?t=100" charset="utf-8" type="text/javascript"></script>

</body>
</html>

