<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/
?>

<div class="contents">
<div class="content">
<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="yCollCstmMuni">お住まいの地域</label></div>
			<div class="formElements">				
				<ul class="formElement">
					<li>
						<select name="yCollCstmMuni" id="yCollCstmMuni"<?php echo $disabled; ?>>
							<option value="">選択してください</option>
							<?php
							$yCollCstmMunis = array("世田谷区", "杉並区", "目黒区", "港区", "大田区", "新宿区", "渋谷区", "品川区");
							for($i=0; $i<count($yCollCstmMunis); $i++){
								if($yCollCstmMunis[$i] == $yCollCstmMuni) $selected = " selected";
								else $selected = "";
								echo '<option id="yCollCstmMunis'.$i.'" value="'.$yCollCstmMunis[$i].'"'.$selected.'>'.$yCollCstmMunis[$i].'</option>';
							}?>
						</select>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmResidence">住居形態</label></div>
			<div class="formElements">				
				<ul class="formElement">
					<li>
						<select name="cstmResidence" id="cstmResidence"<?php echo $disabled; ?>>
							<option value="">選択してください</option>
							<?php
							$cstmResidences = array("マンション", "戸建", "アパート", "オフィスビル", "その他");
							for($i=0; $i<count($cstmResidences); $i++){
								if($cstmResidences[$i] == $cstmResidence) $selected = " selected";
								else $selected = "";
								echo '<option id="cstmResidences'.$i.'" value="'.$cstmResidences[$i].'"'.$selected.'>'.$cstmResidences[$i].'</option>';
							}?>
						</select>
						<input type="text" id="cstmRsdcEtc" name="cstmRsdcEtc" value="<?php echo $cstmRsdcEtc; ?>"<?php echo $disabled; ?> placeholder="お住まいの住居についてご入力ください" />
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmElvts">階数</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li>
						<select name="cstmFloor" id="cstmFloor"<?php echo $disabled; ?>>
						<option value="">何階から運びますか</option>
						<?php
						$cstmFloors = array("1階", "2階", "3階", "4階", "5階", "6-10階", "11-20階", "20階以上");
						for($i=0; $i<count($cstmFloors); $i++){
							if($cstmFloors[$i] == $cstmFloor) $selected = " selected";
							else $selected = "";
							echo '<option id="cstmFloors'.$i.'" value="'.$cstmFloors[$i].'"'.$selected.'>'.$cstmFloors[$i].'</option>';
						}?>
						</select>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmElvts">エレベーター</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li>
					<?php
					$cstmElvts = array("なし", "あり");
					for($i=0; $i<count($cstmElvts); $i++){
						if($cstmElvts[$i] == $cstmElvt) $checked = " checked";
						else $checked = "";
						echo '<input type="radio" name="cstmElvt" value="'.$cstmElvts[$i].'" id="cstmElvts'.$i.'"'.$checked.$disabled.' /><label for="cstmElvts'.$i.'">'.$cstmElvts[$i].'</label>';
					}?>
					</li>
				</ul>
			</div>
		</li>
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
				<div class="formElement"><?php
				echo '<input type="text" name="cstmPhoneNum" value="'.$cstmPhoneNum.'" id="cstmPhoneNum"'.$checked.$disabled.' placeholder="例)01234567890(数字のみ)" />';
				?></div>
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
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle">エコ回収対象品</div>
			<div class="formElements">
				<ul class="formElement" id="yCollItem">

					<?php
					if(!$_POST) $yCollItemNum = 1;
					for($i=0; $i<$yCollItemNum; $i++){

						echo '<li class="yCollItem_var">';

						$yCollItem_catForm = '
								<div class="yCollItem">
								<label for="yCollItem_cat_'.$i.'">品物</label>
								<select name="yCollItem_cat_'.$i.'" id="yCollItem_cat_'.$i.'" class="yCollItem_cat"'.$disabled.'>
								<option value="">選択してください</option>';
								$yCollItem_cats = array("イス", "ソファ", "ソファベッド", "テーブル", "棚", "キャビネット");
								for($j=0; $j<count($yCollItem_cats); $j++){
									if($yCollItem_cats[$j] == ${"yCollItem_cat_".$i}) $selected = " selected";
									else $selected = "";
									$yCollItem_catForm .= '<option value="'.$yCollItem_cats[$j].'"'.$selected.'>'.$yCollItem_cats[$j].'</option>';
								}
								$yCollItem_catForm .= '</select></div>';
						echo $yCollItem_catForm;

						$yCollItem_brandForm = '
								<div class="yCollItem">
								<label for="yCollItem_brand_'.$i.'">ブランド</label>
								<select name="yCollItem_brand_'.$i.'" id="yCollItem_brand_'.$i.'" class="yCollItem_brand"'.$disabled.'>
								<option value="">選択してください</option>';
								$yCollItem_brands = array("無印良品", "Franc franc取扱ブランド", "IDEEブランド", "ザ・コンランショップ取扱ブランド", "カリモク家具");
								for($j=0; $j<count($yCollItem_brands); $j++){
									if($yCollItem_brands[$j] == ${"yCollItem_brand_".$i}) $selected = " selected";
									else $selected = "";
									$yCollItem_brandForm .= '<option value="'.$yCollItem_brands[$j].'"'.$selected.'>'.$yCollItem_brands[$j].'</option>';
								}
								$yCollItem_brandForm .= '</select></div>';
						echo $yCollItem_brandForm;						

						$yCollItem_sizeForm = '
								<div class="yCollItem" id="yCollItem_size">
								<label for="yCollItem_size_'.$i.'">サイズ</label>
								横<input type="text" value="'.${"yCollItem_width_".$i}.'" name="yCollItem_width_'.$i.'" id="yCollItem_width_'.$i.'"'.$disabled.' />cm* 
								縦 <input type="text" value="'.${"yCollItem_height_".$i}.'" name="yCollItem_height_'.$i.'" id="yCollItem_height_'.$i.'"'.$disabled.' />cm* 
								奥行き <input type="text" value="'.${"yCollItem_depth_".$i}.'" name="yCollItem_depth_'.$i.'" id="yCollItem_depth_'.$i.'"'.$disabled.' />cm
								</div>';
						echo $yCollItem_sizeForm;

						if(pageCode(true) == "estimate2-1") echo '<div class="delFormSet"><button class="yCollItem_del">削除</button></div>';
						echo '</li>';

					}?>

				</ul>
				<?php if(pageCode(true) == "estimate2-1") echo '<input type="button" value="対象品追加" class="yCollItem_add">'; ?>
			</div>
		</li>
	</ol>
</fieldset>

<script type="text/javascript">
$(document).ready(function($){
	$("#yCollItem").addInputArea({
		area_del : ".delFormSet"
	});





});
</script>



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


	<?php if(!is_smartphone() && pageCode() == "inquiry"): ?>
	/*
	生年月日*/
	$(function(){
		var date = new Date();
		var yy = date.getFullYear();
		var thirty = yy-30;
		$(".datepicker").datepicker({
			yearRange: "c-20:c+20",
			maxDate: "0",
			defaultDate: new Date(thirty, 00, 01),
			changeYear: true,
			changeMonth: true,
			onClose: function(){
				jVal.cstmBD();
			}
		});
	});
	<?php endif; ?>

	<?php if(!is_smartphone() && pageCode() == "contact"):  ?>
	
		//集荷日
		$(document).ready(function(){
			$( ".datepicker" ).datepicker({
				numberOfMonths: 2,
				showButtonPanel: true,
				minDate: 0
			});
		});

	<?php endif; ?>


	/*
	選んだ理由の順位付け　*/
	//選択ボックス
	$(function(){
		$("#causes input[type='checkbox']").change(function(){
			var inputVal = $(this).val();
			if($(this).is(':checked')){
				var option = $('<option />');
				option.val(inputVal).html(inputVal);
				$('.select').append(option);	   
			}else{
			   $(".select").children("option[value="+inputVal+"]").remove();
			}
		});
	});
	//値がある場合
	var causes = [<?php echo '"'.implode('","', $cause).'"'; ?>];
	var causeValues = [<?php echo '"'.$causeFirst.'", "'.$causeSecond.'", "'.$causeThird.'"'; ?>];
	if(causes.length > 1){
		for(i=0; i<3; i++){
			$.each(causes, function(index, value){
				var child = i+1;
				var option = $('<option />');
				option.val(value).html(value);
				if(value == causeValues[i]){
					option.attr("selected", "selected");
				}				
				$('#causesRank li:nth-child('+child+') select').append(option);
			});
		}
		var confirm = "<?php echo pageCode(true); ?>";
		if(confirm == "confirm"){
			$(".select").each(function(){
				$(this).attr("disabled", "disabled");
			});
		}
	}

	/*
	テキストエリア制御*/
	$(function(){
		$(".fwList, #cttCorsPro, #cttOrgsPro, #cttOrgsCon").hide();
		
		//お客さんの声
		$(".fwRadio input[type='radio']").change(function(){
			var inputVal = $(this).val();
			$(this).closest("ul").find(".fwList").fadeIn().css("display", "block");
			$(this).closest("ul").find(".fwList span").html(inputVal);
		});
		$(".fwRadio input[type='radio']").each(function(){
			var inputVal = $(this).val();
			if(this.checked){
				if($(this).attr("checked") == "checked") var checked = $(this).val();
				$(this).closest("ul").find(".fwList").show();
				$(this).closest("ul").find(".fwList span").html(checked);
			}
		});		

		//他社考慮したか
		$("#cttCors input[type='radio']").change(function(){
			var cttCorsVal = $(this).val();
			if(cttCorsVal == "はい"){
				$("#cttCorsPro").fadeIn();
			}else{
				$("#cttCorsPro").fadeOut();
			}
		});
		$("#cttCors input[type='radio']").each(function(){
			var cttCorsVal = $(this).val();
			if(this.checked){
				if(cttCorsVal == "はい") $("#cttCorsPro").show();
			}
		});

		//自治体考慮したか
		$("#cttOrgs input[type='radio']").change(function(){
			var cttOrgsVal = $(this).val();
			if(cttOrgsVal == "はい"){
				$("#cttOrgsCon").fadeOut();
				$("#cttOrgsPro").fadeIn();
			}else if(cttOrgsVal == "いいえ"){
				$("#cttOrgsPro").fadeOut();
				$("#cttOrgsCon").fadeIn();
			}
		});
		$("#cttOrgs input[type='radio']").each(function(){
			var cttOrgsVal = $(this).val();
			if(this.checked){
				if(cttOrgsVal == "はい"){
					$("#cttOrgsPro").show();
					$("#cttOrgsCon").hide();
				}else if(cttOrgsVal == "いいえ"){
					$("#cttOrgsPro").hide();
					$("#cttOrgsCon").show();
				}
			}
		});
	});		


	/*
	その他のボックス表示*/
	$(function(){
		$("input[id*='Etc']").addClass("hide");
		$("select").change(function(){
			if($('option:selected', this).val() == "その他"){
				$("+input", this).fadeIn().removeClass("hide");
			}else{
				$("+input", this).fadeOut().addClass("hide");
			}
		});
		$("select").each(function(){
			if($('option:selected', this).val() == "その他"){
				$("+input", this).fadeIn().removeClass("hide");
			}else{
				$("+input", this).fadeOut().addClass("hide");
			}
		});
		$("input[value='その他']").change(function(){
			if(this.checked){
				$("+label+input", this).fadeIn().removeClass("hide");
			}else{
				$("+label+input", this).fadeOut().addClass("hide");
			}
		});
		$("input[value='その他']").each(function(){
			if(this.checked){
				$("+label+input", this).fadeIn().removeClass("hide");
			}
		});
	});	


	/*
	インターネット検索ワードのボックス表示*/
	$(function(){
		$("input[id='froms0']").change(function(){
			if(this.checked){
				$("+label+input", this).fadeIn().removeClass("hide");
				$("+label+input", this).css("margin-right", "1.0rem");
			}else{
				$("+label+input", this).fadeOut().addClass("hide");
			}
		});
		$("input[id='froms0']").each(function(){
			if(this.checked){
				$("+label+input", this).fadeIn().removeClass("hide");
				$("+label+input", this).css("margin-right", "1.0rem");
			}
		});
	});

	
	/*
	値のない確認画面でのtextfieldを消す	*/
	$(function(){
		$("#confirm input[type='text']").each(function(){
			if($(this).val() == 0){
				$(this).addClass("hide");
    			}
		});
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

	$(".municipality").addClass('hide');
	$("#prefectures").change(function(){
		$(".municipality").val("");
	});
	var cstmMncplt = "<?php echo $cstmMncplt; ?>";
	if(cstmMncplt) $('.selected').parents("select").removeClass("hide");

	var jVal = {

		'quesKind' : function(){

			var eleId = "quesKind";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.val()){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
			}

		},

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

		'cstmBD' : function(){

			var eleId = "cstmBD";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "生年月日を入力してください";

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
					$.ajax({
						type: "POST",
						url: "<?php echo get_permalink(get_page_by_path('coupon', OBJECT)); ?>",
						data: { "email": ele.val() },
						success: function(data){
							<?php if(pageCode() == "contact" || pageCode() == "estimate"): ?>
								if(data == "customer" || data == "repeator"){
									$("#getCouponMsg").remove();
									$("#getCoupon").closest("li").find("input").attr("disabled", "disabled").removeAttr("checked").hide();
									$("#getCoupon").closest("li").find("label").html('すでに<span class="pink">エコ回収をご利用</span>していただいています。');
									$("#getCoupon").closest("li").find("label").after('<span id="getCouponMsg" class="msg errorMsg">ご利用ありがとうございました</span>');
									$("#couponUsed").attr("value", "1");
								}else{
									$("#getCouponMsg").remove();
									$("#getCoupon").closest("li").find("input").prop('checked', true).removeAttr("disabled").show();
									$("#getCoupon").closest("li").find("label").html("初回限定「基本料金100%OFF」クーポンを受け取る");
									$("#getCoupon").closest("li").find("label").after('<span id="getCouponMsg" class="msg correctMsg">クーポン番号を受付完了メールにてお知らせいたします</span>');
									$("#couponUsed").attr("value", "");
									$("#getCoupon").closest("li").find(".formTitle").addClass("ok");
								}
							<?php else: ?>
								$("#getCouponMsg").remove();
								$("#getCoupon").closest("li").find("input").prop('checked', true).removeAttr("disabled").show();
								$("#getCoupon").closest("li").find("label").html("アンケート回答者限定「基本料金100%OFF」クーポンを受け取る");
								$("#getCoupon").closest("li").find("label").after('<span id="getCouponMsg" class="msg correctMsg">クーポン番号を受付完了メールにてお知らせいたします</span>');
								$("#couponUsed").attr("value", "");
								$("#getCoupon").closest("li").find(".formTitle").addClass("ok");
							<?php endif; ?>							
						}
					});
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
			var errorTypeMsg = "数字のみ、10文字以上入力してください 例)01234567890";
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

		'cstmPrefecture' : function(){

			var eleId = "prefectures";
			var ele = $("#"+eleId);
			var mncplt = $(".municipality");
			var mncpltVal = $("select#"+$("#prefectures option:selected").attr("id")).val();
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "お住まいの都道府県をお選びください";

			if(ele.val()){
				msg.remove();
				mncplt.addClass('hide');
				$('select#' + $("#prefectures option:selected").attr("id")).removeClass("hide");
				ele.removeClass("focus").addClass("correct");
				if(mncpltVal){
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
				msg.remove();
				jVal.errors = true;
				mncplt.addClass('hide');
				mncplt.val("");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				ele.removeClass("focus").addClass("error");
			}

		},

		'yCollMuni' : function(){

			var eleId = "yCollCstmMuni";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "お住まいの区を選択してください";

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

		'yCollItems' : function(){
	
			if($(".yCollItem_cat").val() || $(".yCollItem_brand").val()){
				$(".test").html("OK");
			}

		},
	

		'yCollItems' : function(){

			var eleId = "yCollItem";
			var ele = $("#"+eleId+" select");
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "品物とブランドは必ず一つ以上選択してください";

			if($("#yCollItem .yCollItem_cat").val() && $("#yCollItem .yCollItem_brand").val()){
				msg.remove();
				$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
				$("#yCollItem select, #yCollItem input").removeClass("focus").addClass("correct");
			}else{
				jVal.errors = true;
				msg.remove();
				$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
				$("#"+eleId).after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				$("#yCollItem select, #yCollItem input").removeClass("focus");
			}			

		},

		'cstmMunicipality' : function(){

			var eleId = $("#prefectures option:selected").attr("id");
			var ele = $("select#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "お住まいの市町村区をお選びください";

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

		'cstmResidence' : function(){

			var eleId = "cstmResidence";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "住居形態について選択してください";

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

		'cstmFloor' : function(){

			var eleId = "cstmFloor";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "何階から運ぶのか階数をお選びください";

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


		'cstmElvt' : function(){

			var eleId = "cstmElvt";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var errorMsg = "エレベーターがあるかどうか選択してください";

			if($('input[name="cstmElvt"]:checked').length === 0){
				jVal.errors = true;
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.closest("li").find("label:last-child").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}else{
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'cstmSex' : function(){

			var eleId = "cstmSex";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.is(':checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'cstmMrg' : function(){

			var eleId = "cstmMrg";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.is(':checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'cstmResType' : function(){

			var eleId = "cstmResType";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.is(':checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'cstmJob' : function(){

			var eleId = "cstmJob";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.is(':checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'getCoupon' : function(){

			var eleId = "getCoupon";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if($("#getCoupon").prop('checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				$("#getCoupon").closest("li").find("label").after('<span id="getCouponMsg" class="msg correctMsg">クーポン番号を受付完了メールにてお知らせいたします</span>');
			}else{
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.closest("li").find("label").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
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

		'etc' : function(){

			if($(this).val()) $(this).removeClass("focus").addClass("correct");
			else $(this).removeClass("focus").addClass("error");

		},

		'cltdItems' : function(){

			var eleId = "cltdItems";
			var ele = $("#"+eleId+" input[type='checkbox']:checked");
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "回収していただいた不用品をチェック、あるいは入力してください";

			if(ele.length == 0){
				jVal.errors = true;
				msg.remove();
				$("#"+eleId).find(".formTitle").removeClass("ok");
				$("#"+eleId).find(".formElements").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}else{
				msg.remove();
				$("#"+eleId).find(".formTitle").addClass("ok");
			}

		},	

		'causesRank' : function(){

			var eleId = "causesRank";
			var ele = $("#"+eleId+" select");

			var cause1 = $("#causeFirst").val();
			var cause2 = $("#causeSecond").val();
			var cause3 = $("#causeThird").val();

			if(cause1 && cause2 && cause3){
				$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
			}else{
				$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
				ele.removeClass("focus");
			}			

		},

		'fwRadio' : function(){

			$('.fwRadio').each(function(){

				var eleId = $(this).closest(".formContents").attr("ID");
				var ele = $('#'+eleId+' input[type="radio"]');

				var msgId = eleId+"Msg";
				var msg = $("#"+msgId);

				var errorMsg = "サービスを体験した評価と感想の記入をお願いします";

				if(ele.is(':checked')){
					msg.remove();
				}else{
					msg.remove();
					ele.closest(".formContents").find(".formElements").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				}

			});
			
		},

		'voices' : function(){

			var eleId = $(this).closest(".formContents").attr("ID");
			var ele = $('#'+eleId+' input[type="radio"]');

			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);


			if(ele.is(':checked')){
				msg.remove();
			}
			
		},

		'cttCors' : function(){

			var eleId =　"cttCors";
			var ele = $('#'+eleId+' input[type="radio"]:checked');

			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.val() == "いいえ"){
				$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
			}else{
				$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
			}
			
		},

		'cttCorsPro' : function(){

			var ele1 = $("input[name='cttedCor[]']:checked").length;
			var ele2 = $("input[name='notAplyCor[]']:checked").length;

			if(ele1 > 0 && ele2 > 0){
				$("#cttCors").closest(".formContents").find(".formTitle").addClass("ok");				
			}else{
				$("#cttCors").closest(".formContents").find(".formTitle").removeClass("ok");
			}

		},

		'cttOrgsPro' : function(){

			var ele = $("input[name='notAplyOrg[]']:checked").length;

			if(ele > 0){
				$("#cttOrgs").closest(".formContents").find(".formTitle").addClass("ok");
			}else{
				$("#cttOrgs").closest(".formContents").find(".formTitle").removeClass("ok");
			}

		},


		'cttOrgsCon' : function(){

			var ele = $("input[name='notCttOrg[]']:checked").length;

			if(ele > 0){
				$("#cttOrgs").closest(".formContents").find(".formTitle").addClass("ok");
			}else{
				$("#cttOrgs").closest(".formContents").find(".formTitle").removeClass("ok");
			}

		},


		'fwRadioTextarea' : function(){

			$('.fwRadio textarea').each(function(){

				var eleId = $(this).closest(".formContents").attr("ID");
				var ele = $('#'+eleId+' textarea');

				var msgId = eleId+"Msg";
				var errorMsg = "サービスを体験した評価と感想の記入をお願いします";
				var errorTypeMsg = "最低10文字以上ご記入お願いします";
				var msg = $("#"+msgId);

				if(ele.val()){
					if(ele.val().length > 9){
						msg.remove();
						$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
						ele.removeClass("focus").addClass("correct");
					}else{
						msg.remove();
						jVal.errors = true;
						$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
						ele.removeClass("focus").addClass("error");
						ele.closest(".formContents").find(".formElements").after('<span id="'+msgId+'" class="msg errorMsg">'+errorTypeMsg+'</span>');
					}
				}else{
					msg.remove();
					jVal.errors = true;
					$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
					ele.removeClass("focus").addClass("error");
					ele.closest(".formContents").find(".formElements").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				}

			});

		},

		'checkbox' : function(){

			var eleId = $(this).closest(".formContents").attr("id");
			var ele = $("#"+eleId+" input[type='checkbox']:checked");

			if(ele.length == 0){
				$("#"+eleId).find(".formTitle").removeClass("ok");
			}else{
				$("#"+eleId).find(".formTitle").addClass("ok");
			}

		},


		'textarea' : function(){

			var eleId = $(this).attr("id");
			var ele = $("#"+eleId);

			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "できれば10文字以上お願いします";

			if(ele.val() && ele.val().length > 9){
				$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
			}else{
				$("#"+eleId).closest(".formContents").find(".formTitle").removeClass("ok");
				ele.removeClass("focus").addClass("error");
				ele.after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}

		},

		'radio' : function(){

			$('.radio').each(function(){

				var eleId = $(this).closest(".formContents").attr("ID");
				var ele = $('input[name="'+eleId+'"]');

				var msgId = eleId+"Msg";
				var msg = $("#"+msgId);

				var errorMsg = "必須項目です";

				if(ele.is(':checked')){
					msg.remove();
					$("#"+eleId).closest(".formContents").find(".formTitle").addClass("ok");
				}else{
					jVal.errors = true;
					msg.remove();
					ele.closest(".formContents").find(".formTitle").removeClass("ok");
					ele.closest(".formElements").find("li:last-child label").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
				}

			});

		},

		'sendIt' : function (){
			if(!jVal.errors){
				$('form')[0].submit();
			}
		}

	};

	$('#send').click(function(){

		$("html, body").animate({ scrollTop: $('body').offset().top }, 200, function (){

			<?php if(pageCode() == "contact"): ?>

				jVal.errors = false;
				jVal.cstmName();
				jVal.cstmPron();
				jVal.cstmEmail();
				jVal.cstmPhoneNum();
				jVal.replyWay();
				jVal.cstmContents();
				jVal.agreeLaw();
				jVal.sendIt();

			<?php elseif(pageCode() == "estimate"): ?>

				jVal.errors = false;
				jVal.cstmPrefecture();
				jVal.cstmMunicipality();
				jVal.cstmResidence();
				jVal.cstmFloor();
				jVal.cstmElvt();
				jVal.cstmName();
				jVal.cstmPron();
				jVal.cstmEmail();
				jVal.cstmPhoneNum();
				jVal.replyWay();
				jVal.cstmContents();
				jVal.agreeLaw();
				jVal.sendIt();

			<?php elseif(pageCode() == "estimate2-1"): ?>

				jVal.errors = false;
				jVal.yCollMuni();
				jVal.cstmResidence();
				jVal.cstmFloor();
				jVal.cstmElvt();
				jVal.cstmName();
				jVal.cstmPron();
				jVal.cstmEmail();
				jVal.cstmPhoneNum();
				jVal.yCollItems();
				jVal.replyWay();
				jVal.agreeLaw();
				jVal.sendIt();

			<?php elseif(pageCode() == "inquiry"): ?>

				jVal.errors = false;
				jVal.cltdItems();
				jVal.fwRadio();
				jVal.cstmName();
				jVal.cstmPron();
				jVal.cstmEmail();
				jVal.cstmPhoneNum();
				jVal.cstmPrefecture();
				jVal.cstmMunicipality();
				jVal.cstmBD();
				jVal.radio();
				jVal.fwRadioTextarea();
				jVal.agreeLaw();
				jVal.sendIt();

			<?php endif; ?>

		});
		return false;
	});

	$("#quesKind").change(jVal.quesKind);
	$("#cstmName").blur(jVal.cstmName);
	$("#cstmPron").blur(jVal.cstmPron);
	$("#cstmEmail").blur(jVal.cstmEmail);
	$("#cstmBD").blur(jVal.cstmBD);
	$("#cstmPhoneNum").blur(jVal.cstmPhoneNum);
	$("#cstmFloor").change(jVal.cstmFloor);
	$("#cstmResidence").change(jVal.cstmResidence);
	$("input[name='cstmElvt']").change(jVal.cstmElvt);
	$("input[name='replyWay']").change(jVal.replyWay);
	$("input[name='replyWay']").change(jVal.replyWay);
	$("input[id*='Etc']").each(function(){ $(this).blur(jVal.etc); });
	$("#cltdItems input[type='checkbox']").click(jVal.cltdItems);
	$(".fwRadio input[type='radio']").change(jVal.voices);
	$(".fwRadio textarea").blur(jVal.fwRadioTextarea);
	$("#cstmSex input[type='radio']").change(jVal.cstmSex);
	$("#cstmMrg input[type='radio']").change(jVal.cstmMrg);
	$("#cstmResType input[type='radio']").change(jVal.cstmResType);
	$("#cstmJob input[type='radio']").change(jVal.cstmJob);
	$("#froms1 input[type='checkbox']").click(jVal.searchEtc);
	$("#cues input[type='checkbox'], #causesSelect input[type='checkbox'], #froms input[type='checkbox'], #options input[type='checkbox'], #cstmInt input[type='checkbox'], #mmgRegi input[type='checkbox']").click(jVal.checkbox);
	$("#voiceEtcSvc, #voiceEtc").blur(jVal.textarea);
	$("#cttCors input[name='cttCor']").change(jVal.cttCors);
	$("#cttCorsPro input[type='checkbox']").click(jVal.cttCorsPro);
	$("#cttOrgs input[name='cttOrg']").change(jVal.cttOrgs);
	$("#cttOrgsPro input[type='checkbox']").click(jVal.cttOrgsPro);
	$("#cttOrgsCon input[type='checkbox']").click(jVal.cttOrgsCon);
	$("#causesRank select").change(jVal.causesRank);
	$("#cstmContents").blur(jVal.cstmContents);		
	$("#getCoupon").change(jVal.getCoupon);
	$("#agreeLaw").change(jVal.agreeLaw);
	$("#prefectures").change(jVal.cstmPrefecture);
	$("#yCollCstmMuni").change(jVal.yCollMuni);
	$(".municipality").blur(jVal.cstmMunicipality);
	$("#yCollItem select").change(jVal.yCollItems);

});

</script>