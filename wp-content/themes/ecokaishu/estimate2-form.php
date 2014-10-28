<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
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
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle">無料引取対象品</div>
			<div class="formElements">
				<div class="formElement">
				<textarea name="cstmContents" class="animated" id="cstmContents" placeholder="例) Franc franc ソファベッド、IDEE テーブル"<?php echo $disabled; ?>><?php if($cstmContents) echo $cstmContents; ?></textarea>	
				</div>
				<p class="footnote"><small>※対象ブランド：無印良品、Franc franc(フランフラン)取扱ブランド、IDEE(イデー)取扱ブランド、ザ・コンランショップ取扱ブランド、カリモク家具</small></p>
				<p class="footnote"><small>※対象商品：イス、ソファ、ソファベッド、テーブル、棚、キャビネット</small></p>
				<p class="footnote"><small>※対象エリア：東京都23区</small></p>
				
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents" id="cltDay">
			<div class="formTitle"><label for="cltDays">集荷日</label></div>
			<div class="formElements">
				<ul class="formElement">
				<?php
				$cltDayArgs = array($cltDay0, $cltDay1, $cltDay2);				
				for($i=0; $i<3; $i++){
					$j = $i + 1;
					if(is_smartphone()){
						$today = date("Y-m-d");
						$type = "date";
						$mindate = ' min="'.$today.'"';
					}else{
						$type = "text";	
					}
					echo '<li><label for="cltDay'.$i.'">第'.$j.'希望</label><input type="'.$type.'" name="cltDay'.$i.'" class="datepicker" value="'.$cltDayArgs[$i].'" id="cltDay'.$i.'"'.$disabled.$mindate.' /></li>';
				}?>
				</ul>			
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

<input type="hidden" name="siteCode" value="<?php echo siteCode(); ?>" />
<input type="hidden" name="pr_code" value="<?php echo $_GET["pr_code"]; ?>" />
<input type="hidden" name="couponUsed" id="couponUsed" value="<?php echo $couponUsed; ?>" />
<input type="hidden" name="quiz" id="quiz" value="<?php echo $quiz; ?>" />

</div>
</div>


<script type="text/javascript">

$(document).ready(function(){

	//テキストエリア高さ調整
	$(function(){
		$('.animated').autosize();
	});

	if($("#couponUsed").val() == 1){
		$("#getCoupon").closest("li").find("input").attr("disabled", "disabled").removeAttr("checked").hide();
		$("#getCoupon").closest(".formElements").find("label").html('初回限定「基本料金100%OFF」クーポンはすでに<span class="pink">使用済み</span>です');
	}

	$("form*").focus(function(){
		if($(this).attr("type") != "submit"){
			var id = $(this).attr("id");
			$(this).removeClass("error").removeClass("correct").addClass("focus");
			$("#"+id+"Msg").hide();
		}
	});

	$("form*").each(function(){
		if($(this).attr("type") != "submit"){
			if($(this).val()){
				$(this).addClass("correct");
			}
		}
	});
	
	<?php if(!is_smartphone()): ?>
	
		//集荷日
		$(document).ready(function(){
			$( ".datepicker" ).datepicker({
				numberOfMonths: 2,
				showButtonPanel: true,
				minDate: 0
			});
		});

	<?php endif; ?>

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

		'cstmContents' : function(){

			var eleId = "cstmContents";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "最低3文字以上、引取してほしい品物のブランドと商品についてご入力ください";

			if(ele.val() && ele.val().length > 2){
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
			jVal.cstmContents();
			jVal.agreeLaw();
			jVal.sendIt();

		});
		return false;
	});

	$("#cstmName").blur(jVal.cstmName);
	$("#cstmPron").blur(jVal.cstmPron);
	$("#cstmEmail").blur(jVal.cstmEmail);
	$("#cstmContents").blur(jVal.cstmContents);
	$("#agreeLaw").change(jVal.agreeLaw);

});

</script>