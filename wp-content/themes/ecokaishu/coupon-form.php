<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.1
* @since MP-Ecokaishu 0.0
*/
?>

<div class="contents">
<div class="content">

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmName">お名前</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmName" name="cstmName" value="<?php if($cstmName) echo $cstmName;?>"<?php echo $disabled; ?> placeholder="例)エコ花子" /></li>
					<li><input type="checkbox" name="cstmType" value="法人" id="cstmType"<?php if($cstmType) echo ' checked'; echo $disabled; ?> /><label for="cstmType">法人</label></li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmPron">ふりがな</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmPron" name="cstmPron" value="<?php if($cstmPron) echo $cstmPron;?>"<?php echo $disabled; ?> placeholder="例)えこはなこ" /></li>					
				</ul>
			</div>
		</li>
		<li class="formContents required" id="email">
			<div class="formTitle"><label for="cstmEmail">メールアドレス</label></div>
			<div class="formElements">
				<div class="formElement"><input type="email" name="cstmEmail" id="cstmEmail" value="<?php if($cstmEmail) echo $cstmEmail; ?>"<?php echo $disabled; ?> placeholder="例)hoge@example.com" /></div>
			</div>
		</li>
		<li class="formContents required" id="phone">
			<div class="formTitle"><label for="cstmPhoneNum">ご連絡可能な電話番号</label></div>
			<div class="formElements">
				<div class="formElement"><?php echo '<input type="text" name="cstmPhoneNum" value="'.$cstmPhoneNum.'" id="cstmPhoneNum"'.$checked.$disabled.' placeholder="例)01234567890(数字のみ)" />'; ?></div>
			</div>
		</li>
		<li class="formContents required" id="replyWay">
			<div class="formTitle">エコランドからのご返答</div>
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
					echo '<li><input type="radio" name="replyWay" value="'.$replyWays[$i].'" id="replyWays'.$i.'"'.$checked.$disabled.' /><label for="replyWays'.$i.'">'.$replyWays[$i].'</label></li>';
				}?>
			</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle">エコ回収対象品</div>
			<div class="formElements">
				<div class="formElement">
				<textarea name="cstmContents" class="animated" id="cstmContents" placeholder="例) 本棚(17cm×89cm×59cm)、木棚(三段、29cm×77cm×64cm)、衣装 クリアケース(65cm×17cm×45cm)×４個、ガラス棚(30cm×62cm×40cm)などなど"<?php echo $disabled; ?>><?php if($cstmContents) echo $cstmContents; ?></textarea>	
				</div>
				<p class="footnote"><small>※家具類や大きな品物は、「幅×奥行×高さ」などをお伝え頂くと正確なお見積もりができます。また、家電類は「型番号」、「メーカー名」、「年式」をお伝え頂くと、買取も含め、正確なお見積もりができます。お手数ですが、ご協力のほどよろしくお願いします。</small></p>
				<p class="footnote pink"><small>※原則、購入後５年以上経過している場合は買取は行っておりません。</small></p>				
			</div>
		</li>
	</ol>
</fieldset>

<fieldset id="law">
	<ol>
		<li class="formContents required" id="law">
			<div class="formTitle">個人情報の取扱について</div>
			<div class="formElements">
				<ul class="formElement">
					<li class="lawDoc"><?php echo get_post_field('post_content', 947); ?></li>
					<li class="lawBtn"><input type="checkbox" name="agreeLaw" value="同意" id="agreeLaw"<?php if($agreeLaw) echo ' checked'; echo $disabled; ?> /><label for="agreeLaw">上記個人情報の取扱について同意しました</label></li>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<input type="hidden" name="couponNum" value="<?php echo $couponNum; ?>" />

</div>
</div>

<script type="text/javascript">

$(document).ready(function(){

	//テキストエリア高さ調整
	$(function(){
		$('.animated').autosize();
	});


	var jVal = {

		'cstmName' : function(){

			var eleId = "cstmName";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "お名前を入力してください";

			if(ele.val()){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
			}else{
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}

		},

		'cstmPron' : function(){

			var eleId = "cstmPron";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "お名前のふりがなを入力してください";
			var errorTypeMsg = "全角ひらがなのみで入力してください";

			var patt = /^[\u3040-\u309F]+$/;

			if(ele.val()){
				if(ele.val().match(patt)){
					msg.remove();
					ele.closest(".formContents").find(".formTitle").addClass("ok");
					ele.removeClass("focus").addClass("correct");
				}else{
					jVal.errors = true;
					msg.remove();
					ele.closest(".formContents").find(".formTitle").removeClass("ok");
					ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorTypeMsg+'</span>');
					ele.removeClass("focus").addClass("error");
				}
			}else{
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}

		},

		'cstmEmail' : function(){

			var eleId = "cstmEmail";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorTypeMsg = "正しいメール形式ではありません 例)hoge@example.com";
			var errorMsg = "メールアドレスを入力してください";

			var patt = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;

			if(ele.val()){
				if(ele.val().match(patt)){
					msg.remove();
					ele.closest(".formContents").find(".formTitle").addClass("ok");
					ele.removeClass("focus").addClass("correct");
				}else{
					jVal.errors = true;
					msg.remove();
					ele.closest(".formContents").find(".formTitle").removeClass("ok");
					ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorTypeMsg+'</span>');
					ele.removeClass("focus").addClass("error");
				}
			}else{
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}

		},

		'cstmPhoneNum' : function(){

			var eleId = "cstmPhoneNum";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorTypeMsg = "数字のみ、10文字以上入力してください 例)0123456789";
			var errorMsg = "お電話番号を入力してください";

			var patt = /^[0-9\-]+$/;

			if(ele.val()){
				if(ele.val().match(patt) && ele.val().length > 9){
					msg.remove();
					ele.closest(".formContents").find(".formTitle").addClass("ok");
					ele.removeClass("focus").addClass("correct");
				}else{
					jVal.errors = true;
					msg.remove();
					ele.closest(".formContents").find(".formTitle").removeClass("ok");
					ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorTypeMsg+'</span>');
					ele.removeClass("focus").addClass("error");
				}
			}else{
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}

		},

		'cstmContents' : function(){
			var eleId = "cstmContents";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "最低10文字以上入力してください";

			if(ele.val() && ele.val().length > 10){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
			}else{
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}
		},

		'replyWay' : function(){

			var eleId = "replyWay";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			/*var msg1 = "内容確認の後、最適な方法でご連絡いたします";
			var msg2 = "お急ぎな方や、PCやネットのご利用が不便な方にお勧めです";
			var msg3 = "受付時間以外の…";*/


			if($(this).attr("value") == "どちらでも"){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.closest("ul").after('<span id="'+msgId+'" class="msg correctMsg">'+msg1+'</span>');
			}else if($(this).attr("value") == "電話"){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.closest("ul").after('<span id="'+msgId+'" class="msg correctMsg">'+msg2+'</span>');
			}else if($(this).attr("value") == "メール"){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.closest("ul").after('<span id="'+msgId+'" class="msg correctMsg">'+msg3+'</span>');
			}else{
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");

			}

		},

		'agreeLaw' : function(){
			var eleId = "agreeLaw";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "個人情報の取扱について同意してください";

			if(!$("#agreeLaw").prop('checked')){
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.closest("li").find("label").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}else{
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}
		},

		'sendIt' : function (){
			if(!jVal.errors){
				$('form')[0].submit();
			}
		}

	};

	$('#send').click(function(){
		$("html, body").animate({ scrollTop: $('body').offset().top }, 200, function (){

			jVal.errors = false;
			jVal.cstmName();
			jVal.cstmPron();
			jVal.cstmEmail();
			jVal.cstmPhoneNum();
			jVal.replyWay();
			jVal.cstmContents();
			jVal.agreeLaw();
			jVal.sendIt();

		});
		return false;
	});

	$("#cstmName").blur(jVal.cstmName);
	$("#cstmPron").blur(jVal.cstmPron);
	$("#cstmEmail").blur(jVal.cstmEmail);
	$("#cstmPhoneNum").blur(jVal.cstmPhoneNum);
	$("input[name='replyWay']").change(jVal.replyWay);
	$("#cstmContents").blur(jVal.cstmContents);
	$("#agreeLaw").change(jVal.agreeLaw);

});

</script>