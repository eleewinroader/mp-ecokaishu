<script type="text/javascript">

$(document).ready(function() {

	var winHeight = $(window).height();
	$(".formContents").css({'height': winHeight + 'px'});
	$("#inquiryForm").css({'height':winHeight + 'px'});

	function hidePage(id) {
	 	$(id).animate({ "margin-top": winHeight - winHeight*2 + "px" }, "slow" );
	}

	function showPage(id){
		$(id).animate({ "margin-top": 0 }, "slow" );
	}

	/****validate*****/
	var validator = $('#frmQuestion').validate({

		onkeyup: function(element) {
			this.element(element);
		},

		onfocusout: function(element) {
			this.element(element);
		},

		"rules":{
			"cstmCltId":{
				required: true,
				digits: true,
				maxlength: 9,
				minlength: 9
			},
			"cstmCltPass":{
				required: true,
				digits: true,
				maxlength: 4,
				minlength: 4
			},
			"cstmName":{
				required: true
			},
			"cltPrefecture":{
				required: true
			},
			"cltItem[]":{
				required: true
			},
			"cstmStart[]":{
				required: true
			},
			"cstmReason[]":{
				required: true
			},
			"cstmReason1":{
				required: true
			},
			"cstmReason2":{
				required: true
			},
			"cstmReason3":{
				required: true
			},
			"voiceCC":{
				required: true
			},
			"voiceCCCmt":{
				required: true,
				minlength: 10
			},
			"voiceCS":{
				required: true
			},
			"voiceCSCmt":{
				required: true,
				minlength: 10
			},
			"voiceGeneral":{
				required: true
			},
			"voiceGeneralCmt":{
				required: true,
				minlength: 10
			},
			"voiceRecommend":{
				required: true
			},
			"voiceRecommendCmt":{
				required: true,
				minlength: 10
			}
		},

		"messages":{
			"cstmCltId":{
				required: "エコNo.を入力してください",
				digits: "半角数字で入力してください",
				maxlength: $.validator.format("エコNo.は半角数字9桁で入力してください"),
				minlength: $.validator.format("エコNo.は半角数字9桁で入力してください")
			},
			"cstmCltPass":{
				required: "パスワードを入力してください",
				digits: "半角数字で入力してください",
				maxlength: $.validator.format("パスワードは半角数字4桁で入力してください"),
				minlength: $.validator.format("パスワードは半角数字4桁で入力してください")
			},
			"cstmName":{
				required: "ニックネームを入力してください"
			},
			"cltPrefecture":{
				required: "回収エリアを入力してください"
			},
			"cltItem[]":{
				required: "回収アイテムを入力してください"
			},
			"cstmStart[]":{
				required: "きっかけを選択してください"
			},
			"cstmReason[]":{
				required: "理由を選択してください"
			},
			"cstmReason1":{
				required: "1番の理由を選択してください"
			},
			"cstmReason2":{
				required: "2番の理由を選択してください"
			},
			"cstmReason3":{
				required: "3番の理由を選択してください"
			},
			"voiceCC":{
				required: "評価を選択してください"
			},
			"voiceCCCmt":{
				required: "理由を入力してください",
				minlength: $.validator.format("10文字以上入力してください")
			},
			"voiceCS":{
				required: "評価を選択してください"
			},
			"voiceCSCmt":{
				required: "理由を入力してください",
				minlength: $.validator.format("10文字以上入力してください")
			},
			"voiceGeneral":{
				required: "評価を選択してください"
			},
			"voiceGeneralCmt":{
				required: "理由を入力してください",
				minlength: $.validator.format("10文字以上入力してください")
			},
			"voiceRecommend":{
				required: "いずれか選択してください"
			},
			"voiceRecommendCmt":{
				required: "理由を入力してください",
				minlength: $.validator.format("10文字以上入力してください")
			},
			"cstmEmail":{
				email: "正しいメールアドレス形式で入力してください"
			},
			"cstmPhoneNum":{
				digits: "半角数字で入力してください",
			}
			
		},

		errorPlacement: function(error, element){
			$(element).parents(".formElement").append(error);
		},

		submitHandler: function(){
			$(form).ajaxSubmit($("#frmQuestion"));
		}

	});


	/* paging */
	/*section01*/
	$("#btnNext01").click(function() {
		hidePage("#section01");
		showPage("#section02");
	});
	/*section02*/
	$("#btnNext02").click(function() {
		hidePage("#section02");
		showPage("#section03");
	});
	/*section03*/
	$("#btnNext03").click(function(){
		if ($("#cstmCltId, #cstmCltPass").valid() == true ) {
			hidePage("#section03");
			showPage("#section04");
		}
		return false;
	});
	$("#btnPrev03").click(function(){
		showPage("#section02");
	});

	/*section04*/
	$("#btnNext04").click(function(){
		if ($("#cstmName").valid() == true ) {
			hidePage("#section04");
			showPage("#section05");
		}
		return false;
	});
	$("#btnPrev04").click(function(){
		showPage("#section03");
	});

	/*section05*/
	$("#btnNext05").click(function(){
		if ($(".cltItem, #prefectures").valid() == true ) {
			hidePage("#section05");
			showPage("#section06");
		}
		return false;
	});
	$("#btnPrev05").click(function(){
		showPage("#section04");
	});

	/*section06*/
	$("#btnNext06").click(function(){
		if ($(".cstmStart").valid() == true ) {
			hidePage("#section06");
			showPage("#section07");
		}
		return false;
	});
	$("#btnPrev06").click(function(){
		showPage("#section05");
	});

	/*section07*/
	$("#btnNext07").click(function(){
		if ($(".cstmReason, #cstmReason1, #cstmReason2, #cstmReason3").valid() == true ) {
			hidePage("#section07");
			showPage("#section08");
		}
		return false;
	});
	$("#btnPrev07").click(function(){
		showPage("#section06");
	});

	/*section08*/
	$("#btnNext08").click(function(){
		if ($(".voiceCC, #voiceCCCmt").valid() == true ) {
			hidePage("#section08");
			showPage("#section09");
		}
		return false;
	});
	$("#btnPrev08").click(function(){
		showPage("#section07");
	});

	/*section09*/
	$("#btnNext09").click(function(){
		if ($(".voiceCS, #voiceCSCmt").valid() == true ) {
			hidePage("#section09");
			showPage("#section10");
		}
		return false;
	});
	$("#btnPrev09").click(function(){
		showPage("#section08");
	});

	/*section10*/
	$("#btnNext10").click(function(){
		if ($(".voiceGeneral, #voiceGeneralCmt").valid() == true ) {
			hidePage("#section10");
			showPage("#section11");
		}
		return false;
	});
	$("#btnPrev10").click(function(){
		showPage("#section09");
	});

	/*section11*/
	$("#btnNext11").click(function(){
		if ($(".voiceRecommend").valid() == true ) {
			hidePage("#section11");
			showPage("#section12");
		}
		return false;
	});
	$("#btnPrev11").click(function(){
		showPage("#section10");
	});

	/*section12*/
	$("#btnNext12").click(function(){
		if ($("#voiceRecommendCmt").valid() == true ) {
			hidePage("#section12");
			showPage("#section13");
		}
		return false;
	});
	$("#btnPrev12").click(function(){
		showPage("#section11");
	});

	/*section13*/
	$("#btnNext13").click(function(){
		hidePage("#section13");
		showPage("#section14");
	});
	$("#btnPrev13").click(function(){
		showPage("#section12");
	});

	//show etc text box
	$("input[id*='Txt']").hide();
	$("input[id*='Etc']").change(function(){
		var etc = $(this).attr("class");
		var etcEle = "#"+etc+"Txt";
		if(this.checked){
			$(etcEle).fadeIn();
		} else {
			$(etcEle).hide();
		}

	});

	//show municipality select
	var mncplt = $(".municipality");
	mncplt.addClass("hidden");
	$("#prefectures").change(function(){
		mncplt.addClass("hidden");
		$("select#"+$("#prefectures option:selected").attr("id")).val();
		$("select#" + $("#prefectures option:selected").attr("id")).removeClass("hidden");
	});

	//make option lists for the select box of reasons
	$("#reasons input[type='checkbox']").click(function(){
		var inputVal = $(this).val();
		var inputId = $(this).attr("id");
		var inputTxt = $('label[for="' + inputId + '"]').text();
		if($(this).is(':checked')){
			var option = $('<option />');
			option.val(inputVal).html(inputTxt);
			$(".cstmReasonSelect").append(option);
		}else{
			$(".cstmReasonSelect").children("option[value="+inputVal+"]").remove();
		}
	});

	//show text which the user select for comments
	$(".cmtIndex").change(function(){
		var inputName = $(this).attr("name");
		var inputId = $(this).attr("id");
		var inputTxt = $('label[for="' + inputId + '"]').text();
		var valId = $("#" + inputName + "Val");
		if($(this).is(':checked')){
			$(valId).html("「" + inputTxt + "」");
		}
	});
	$("#txtRecommend01, #txtRecommend02").hide();
	$("input[name='voiceRecommend']").click(function(){
		if($(this).val() == 0){
			$("#txtRecommend01, #txtRecommend02").hide();
			$("#txtRecommend01").fadeIn();
			$("#voiceRecommendCmt").attr("placeholder", "例) 1点から引き取ってもらえるし、料金が事前に明確にわかるので安心して利用ができる。");
		}else{
			$("#txtRecommend01, #txtRecommend02").hide();
			$("#txtRecommend02").fadeIn();
			$("#voiceRecommendCmt").attr("placeholder", "例) 身だしなみをもう少し整えたほうがいいと思う。");
		}
	});

});

</script>