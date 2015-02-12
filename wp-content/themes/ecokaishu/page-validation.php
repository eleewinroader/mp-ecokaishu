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
	<?php if($cause): ?>
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
	<?php endif; ?>

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
	値のない確認画面でのtextfieldを消す*/
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
					/*$.ajax({
						type: "POST",
						url: "<?php echo get_permalink(get_page_by_path('coupon', OBJECT)); ?>",
						data: { "email": ele.val() },
						success: function(data){
							<?php if(pageCode() == "contact" || pageCode() == "estimate" || pageCode() == "contact-legacy"): ?>
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
					});*/
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


		'campKind' : function(){

			var eleId = "campKind";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(ele.val()){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
				ele.removeClass("focus").addClass("correct");
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
		},

		'afUserName' : function(){

			var eleId = "afUserName";
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
		'afUserID' : function(){

			var eleId = "afUserID";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorTypeMsg = "数字のみ、6文字入力してください 例)123456";
			var errorMsg = "会員番号を入力してください";

			var patt = /^[0-9\-]+$/;

			if(ele.val()){
				if(ele.val().match(patt) && ele.val().length == 6){
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
		'afUserPhone' : function(){

			var eleId = "afUserPhone";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorTypeMsg = "数字のみ、10文字入力してください 例)08012345678";
			var errorMsg = "お電話番号を入力してください";

			var patt = /^[0-9\-]+$/;

			if(ele.val()){
				if(ele.val().match(patt) && ele.val().length < 12){
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
		'afUserCltDate' : function(){

			var eleId = "afUserCltDate";
			var ele = $("#"+eleId+" input[type='checkbox']:checked");
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);
			var errorMsg = "回収していただいた不用品をチェック、あるいは入力してください";

			if(ele.length == 0){
				jVal.errors = true;
				msg.remove();
				$("#"+eleId).find(".formTitle").removeClass("ok");
				$("#"+eleId).find(".formElement").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}else{
				msg.remove();
				$("#"+eleId).find(".formTitle").addClass("ok");
			}

		},


	};

	$('#send').click(function(){

		$("html, body").animate({ scrollTop: $('body').offset().top }, 200, function (){

			<?php if(pageCode() == "contact" || pageCode() == "contact-legacy"): ?>

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

			<?php elseif(pageCode() == "estimate2"): ?>

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

			<?php elseif(pageCode() == "campaign"): ?>

				jVal.errors = false;
				jVal.afUserID();
				jVal.afUserName();
				jVal.afUserPhone();
				jVal.afUserCltDate();
				jVal.agreeLaw();
				jVal.sendIt();

			<?php endif; ?>

		});
		return false;
	});

	$("#quesKind").change(jVal.quesKind);
	//$("#campKind").change(jVal.campKind);
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
	$(".municipality").blur(jVal.cstmMunicipality);
	$("#afUserName").blur(jVal.afUserName);
	$("#afUserID").blur(jVal.afUserID);
	$("#afUserPhone").blur(jVal.afUserPhone);
	$("#afUserCltDate input[type='checkbox']").click(jVal.afUserCltDate);

});

</script>