<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.2
* @since MP-Ecokaishu 0.0
*/
?>

<div class="contents">
<div class="content">

<div id="response"></div>

<fieldset class="column">
	<ol>
		<li class="formContents">
			<div class="formTitle">お問い合わせ種類</div>
			<div class="formElements">
				<select name="quesKind" id="quesKind"<?php echo $disabled; ?>>
					<option value="">選択してください</option>
					<?php
					$quesKinds = array("お申し込みについて", "料金について", "エコ回収品について" , "エコ回収作業について", "オークションへの出品について", "エコ回収できるモノ/できないモノ", "大型家具 無料引取サービスについて");
					for($i=0; $i<count($quesKinds); $i++){
						if($quesKinds[$i] == $quesKind) $selected = " selected";
						else $selected = "";
						echo '<option id="quesKinds'.$i.'" value="'.$quesKinds[$i].'"'.$selected.'>'.$quesKinds[$i].'</option>';
					}?>
				</select>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset class="column">
	<ol>
		<li class="formContents required">
			<div class="formTitle"><span class="requ">必須</span><label for="cstmName">お名前</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmName" name="cstmName" value="<?php if($cstmName) echo $cstmName;?>"<?php echo $disabled; ?> required /></li>
					<li><input type="checkbox" name="cstmType" value="法人" id="cstmType"<?php if($cstmType) echo ' checked'; echo $disabled; ?> /><label for="cstmType">法人</label></li>
				</ul>
				<p class="formExample"><small>例)エコ花子</small></p>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><span class="requ">必須</span><label for="cstmPron">ふりがな</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmPron" name="cstmPron" value="<?php if($cstmPron) echo $cstmPron;?>"<?php echo $disabled; ?> required /></li>					
				</ul>
				<p class="formExample"><small>例)えこはなこ</small></p>
			</div>
		</li>
		<li class="formContents required" id="email">
			<div class="formTitle"><span class="requ">必須</span><label for="cstmEmail">メールアドレス</label></div>
			<div class="formElements">
				<div class="formElement"><input type="email" name="cstmEmail" id="cstmEmail" value="<?php if($cstmEmail) echo $cstmEmail; ?>"<?php echo $disabled; ?> required /></div>				
				<p class="formExample"><small>例)hoge@example.com</small></p>
			</div>
		</li>
		<li class="formContents required" id="phone">
			<div class="formTitle"><span class="requ">必須</span><label for="cstmPhoneNum">ご連絡可能な電話番号</label></div>
			<div class="formElements">
				<div class="formElement"><?php echo '<input type="text" name="cstmPhoneNum" value="'.$cstmPhoneNum.'" id="cstmPhoneNum"'.$checked.$disabled.' required />'; ?></div>
				<p class="formExample"><small>例)01234567890(数字のみ)</small></p>
			</div>
		</li>
		<li class="formContents required" id="replyWay">
			<div class="formTitle"><span class="requ">必須</span>エコランドからのご返答</div>
			<div class="formElements">
				<ul class="formElement">
					<?php
					$replyWays = array("どちらでも", "電話", "メール");
					for($i=0; $i<count($replyWays); $i++){
						if($replyWay){
							if($replyWays[$i] == $replyWay) $checked = " checked";
							else $checked = "";
						}else{
							if($replyWays[$i] == 'どちらでも') $checked = " checked";
							else $checked = "";
						}
						echo '<li><input type="radio" name="replyWay" value="'.$replyWays[$i].'" id="replyWays'.$i.'"'.$checked.$disabled.' required /><label for="replyWays'.$i.'">'.$replyWays[$i].'</label></li>';
					}?>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><span class="requ">必須</span>お問い合わせ内容</div>
			<div class="formElements">
				<div class="formElement"><textarea name="cstmContents" class="animated" id="cstmContents" <?php echo $disabled; ?> required><?php if($cstmContents) echo $cstmContents; ?></textarea></div>				
				<p class="formExample"><small>例)●月●日に●●●回収してもらいたいですが、可能ですか？かんたん見積フォームが動作しません！ホームページがちゃんと表示されません。などなど</small></p>
			</div>
		</li>
	</ol>
</fieldset>

<!--<fieldset>
	<ol>
		<li class="formContents" id="coupon">
			<div class="formTitle">初回限定クーポン</div>
			<div class="formElements">
				<div class="formElement"><input type="checkbox" name="coupon" value="受け取る" id="getCoupon"<?php if($coupon) echo " checked"; echo $disabled; ?>/><label for="getCoupon">初回限定「基本料金100%OFF」クーポンを受け取る</label></div>
			</div>
		</li>
	</ol>
</fieldset>-->

<fieldset id="law">
	<ol>
		<li class="formContents required" id="law">
			<div class="formTitle"><span class="requ">必須</span>個人情報の取扱について</div>
			<div class="formElements">
				<ul class="formElement">
					<li class="lawDoc"><?php echo get_post_field('post_content', 947); ?></li>
					<li class="lawBtn"><input type="checkbox" name="agreeLaw" value="同意" id="agreeLaw"<?php if($agreeLaw) echo ' checked'; echo $disabled; ?> required /><label for="agreeLaw">上記個人情報の取扱について同意しました</label></li>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<input type="hidden" name="siteCode" value="<?php echo siteCode(); ?>" />
<input type="hidden" name="pr_code" value="<?php echo $pr_code; ?>" />
<input type="hidden" name="couponUsed" id="couponUsed" value="<?php echo $couponUsed; ?>" />


</div>
</div>