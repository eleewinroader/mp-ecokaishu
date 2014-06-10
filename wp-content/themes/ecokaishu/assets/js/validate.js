$(document).ready(function(){


	try{
		// Firefox, Netscapeなどでのインスタンス化
		xmlobj=new XMLHttpRequest();
	}catch(e){
		try{
			// MS-IEではActiveXObjectとして生成
			xmlobj=new ActiveXObject('Microsoft.XMLHTTP');
		}catch(e){
			// Ajaxはサポートされない
			xmlobj=null;
			return false;
		}
	}

	/*
	テキストエリア高さ調整 */
	$(function(){
		$('.animated').autosize();
	});


	$("form *").focus(function(){
		if($(this).attr("type") != "submit"){
			var id = $(this).attr("id");
			$(this).removeClass("error").removeClass("correct").addClass("focus");
			$("#"+id+"Msg").hide();
		}
	});

	$("form *").each(function(){
		if($(this).attr("type") != "submit"){
			if($(this).val()){
				$(this).addClass("correct");
			}
		}
	});

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

					//couponチェック
					$.ajax({
						type: "POST",
						url: "../wp-content/themes/echokaishu/coupon.php",
						data: "restad",
						success: function(data){
							$("#coupon .formElements").css("background", "red");
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
			var errorTypeMsg = "数字のみ、10文字以上入力してください 例)0123456789";
			var errorMsg = "お電話番号を入力してください";

			var patt = /^[0-9\-]+$/;

			if(ele.val()){
				if(ele.val().match(patt) && ele.val().length > 10){
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

		'getCoupon' : function(){

			var eleId = "getCoupon";
			var ele = $("#"+eleId);
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			if(!$("#getCoupon").prop('checked')){
				msg.remove();
				ele.closest(".formContents").find(".formTitle").removeClass("ok");
				ele.closest("li").find("label").after('<span id="'+msgId+'" class="msg errorMsg">'+errorMsg+'</span>');
			}else{
				msg.remove();
				ele.closest(".formContents").find(".formTitle").addClass("ok");
			}

		},

		'replyWay' : function(){

			var eleId = "replyWay";
			var ele = $('input[name="'+eleId+'"]');
			var msgId = eleId+"Msg";
			var msg = $("#"+msgId);

			var msg1 = "内容確認の後、最適な方法でご連絡いたします";
			var msg2 = "お急ぎな方や、PCやネットのご利用が不便な方にお勧めです";
			var msg3 = "受付時間以外の…";


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
			var errorMsg = "プライバシーポリシーをチェックしてください";

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
		$("html, body").animate({ scrollTop: $('form').offset().top }, 200, function (){
			jVal.errors = false;
			jVal.cstmName();
			jVal.cstmEmail();
			jVal.cstmPhoneNum();
			jVal.cstmContents();
			jVal.replyWay();
			jVal.agreeLaw();
			jVal.sendIt();
		});
		return false;
	});

	$("#quesKind").change(jVal.quesKind);
	$("#cstmName").blur(jVal.cstmName);
	$("#cstmEmail").blur(jVal.cstmEmail);
	$("#cstmPhoneNum").blur(jVal.cstmPhoneNum);
	$("input[name='replyWay']").change(jVal.replyWay);
	$("#cstmContents").blur(jVal.cstmContents);
	$("#getCoupon").change(jVal.getCoupon);
	$("#agreeLaw").change(jVal.agreeLaw);


});