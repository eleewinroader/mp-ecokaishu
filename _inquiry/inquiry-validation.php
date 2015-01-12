<script type="text/javascript">

$(document).ready(function() {
	var winHeight = $(window).height();
	$(".section").css({'height': winHeight + 'px'});
	$(".container").css({'height':winHeight + 'px'});

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

		rules: {
			txtEcoNo: {
				required: true,
				digits: true,
				maxlength: 9,
				minlength: 9
			},
			txtPassword: {
				required: true,
				digits: true,
				maxlength: 4,
				minlength: 4
			},
			txtNickname: {
				required: true
			},
			cbService: {
				required: true
			},
			cbProduct: {
				required: true
			},
			cbReason: {
				required: true
			},
			slbReason: {
				required: true
			},
			voiceCC: {
				required: true
			},
			txtVoiceCC: {
				required: true,
				minlength: 10
			},
			voiceCD: {
				required: true
			},
			txtVoiceCD: {
				required: true,
				minlength: 10
			},
			voiceCS: {
				required: true
			},
			txtVoiceCS: {
				required: true,
				minlength: 10
			},
			rdRecommend: {
				required: true
			},
			txtRecommend: {
				required: true
			},
			slbArea: {
				required: true
			},
		},
		messages: {
			txtEcoNo: {
				required: 'Please enter your Eco No.',
				digits: 'Please enter only digits.',
				maxlength: $.validator.format('EcoNo. cannot over {0} digits'),
				minlength: $.validator.format('EcoNo. must have {0} digits')
			},
			txtPassword: {
				required: 'Please enter your password',
				digits: 'Please enter only digits.',
				maxlength: $.validator.format('Password cannot over {0} characters'),
				minlength: $.validator.format('Password must have {0} characters')	
			},
			txtNickname: {
				required: 'Please enter your Nickname'
			},	
			cbService: {
				required: 'Please choose service'
			},
			cbProduct: {
				required: 'Please choose product'
			},
			cbReason: {
				required: 'Please choose reason'
			},
			slbReason: {
				required: 'Please choose reason'
			},
			voiceCC: {
				required: 'Please choose one option'
			},
			txtVoiceCC: {
				required: 'Please comment',
				minlength: $.validator.format('Must have {0} characters at least')
			},
			voiceCD: {
				required: 'Please choose one option'
			},
			txtVoiceCD: {
				required: 'Please comment',
				minlength: $.validator.format('Must have {0} characters at least')
			},
			voiceCS: {
				required: 'Please choose one option'
			},
			txtVoiceCS: {
				required: 'Please comment',
				minlength: $.validator.format('Must have {0} characters at least')
			},
			rdRecommend : {
				required: 'Please choose one option'
			},
			txtRecommend: {
				required: 'Please comment'
			},
			slbArea: {
				required: 'Please choose area'
			},
		},
		errorPlacement:function(error, element){
			if($(element).attr("name")=="cbService"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="cbProduct"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="cbReason"){
				$(element).closest('li').append(error);
			}else if ($(element).attr("name")=="voiceCC"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="voiceCS"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="voiceCD"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="voiceCS"){
				$(element).closest('li').append(error);
			} else if ($(element).attr("name")=="rdRecommend"){
				$(element).closest('li').append(error);
			} else {
				$(error).insertAfter(element);
			}   
		},
		submitHandle: function(){				
			$('.frmGeneral').submit(function(){
				return false;
			});
		}
	})

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
	$("a#btnNext03").click(function(){
		if ($("#txtEcoNo, #txtPassword").valid() == true ) {
			hidePage("#section03");
			showPage("#section04");
		}
		return false;
	});
	$("a#btnPrev03").click(function(){
		showPage("#section02");
	});
	/*section04*/
	$("a#btnNext04").click(function(){
		if ($("#txtNickname").valid() == true ) {
			hidePage("#section04");
			showPage("#section05");
		}
		return false;
	});
	$("a#btnPrev04").click(function(){
		showPage("#section03");
	});
	/*section05*/
	$("a#btnNext05").click(function(){
		if ($(".cbProduct, .slbArea").valid() == true ) {
			hidePage("#section05");
			showPage("#section06");
		}
		return false;
	});
	$("a#btnPrev05").click(function(){
		showPage("#section04");
	});
	/*section06*/
	$("a#btnNext06").click(function(){
		if ($(".cbService").valid() == true ) {
			hidePage("#section06");
			showPage("#section07");
		}
		return false;
	});
	$("a#btnPrev06").click(function(){
		showPage("#section05");
	});
	/*section07*/
	$("a#btnNext07").click(function(){
		if ($(".cbReason, .slbReason").valid() == true ) {
			hidePage("#section07");
			showPage("#section08");
		}
		return false;
	});
	$("a#btnPrev07").click(function(){
		showPage("#section06");
	});
	/*section08*/
	$("a#btnNext08").click(function(){
		if ($(".voiceCC, #txtVoiceCC").valid() == true ) {
			hidePage("#section08");
			showPage("#section09");
		}
		return false;
	});
	$("a#btnPrev08").click(function(){
		showPage("#section07");
	});
	/*section09*/
	$("a#btnNext09").click(function(){
		if ($(".voiceCD, #txtVoiceCD").valid() == true ) {
			hidePage("#section09");
			showPage("#section10");
		}
		return false;
	});
	$("a#btnPrev09").click(function(){
		showPage("#section08");
	});
	/*section10*/
	$("a#btnNext10").click(function(){
		if ($(".voiceCS, #txtVoiceCS").valid() == true ) {
			hidePage("#section10");
			showPage("#section11");
		}
		return false;
	});
	$("a#btnPrev10").click(function(){
		showPage("#section09");
	});
	/*section11*/
	$("a#btnNext11").click(function(){
		if ($(".rdRecommend").valid() == true ) {
			hidePage("#section11");
			showPage("#section12");
			if($('#rdRecommend01').is(':checked')){
				$('#txtRecommend01').show();
			} else {
				$('#txtRecommend01').hide();
			}
			if($('#rdRecommend02').is(':checked')){
				$('#txtRecommend02').show();
			} else {
				$('#txtRecommend02').hide();
			}
		}
		return false;
	});
	$("a#btnPrev11").click(function(){
		showPage("#section10");
	});
	/*section12*/
	$("a#btnNext12").click(function(){
		if ($("#txtRecommend").valid() == true ) {
			hidePage("#section12");
			showPage("#section13");
		}
		return false;
	});
	$("a#btnPrev12").click(function(){
		showPage("#section11");
	});
	/*section13*/
	$("a#btnNext13").click(function(){
		hidePage("#section13");
		showPage("#section14");
	});
	$("a#btnPrev13").click(function(){
		showPage("#section12");
	});



	/****************************/
	$('#txtServiceDesc, #txtProductDesc').hide();
	$('#ser04').click(function(){
		if (this.checked) {
		  $('#txtServiceDesc').fadeIn();
		} else {
			$('#txtServiceDesc').hide();
		}
	});
	$('#pro07').click(function(){
		if (this.checked) {
		  $('#txtProductDesc').fadeIn();
		} else {
			$('#txtProductDesc').hide();
		}
	});


	$("#causes input[type='checkbox']").click(function(){
		var inputVal = $(this).val();
		if($(this).is(':checked')){
			var option = $('<option />');
			option.val(inputVal).html(inputVal);
			$('.slbReason').append(option);	   
		}else{
		  $(".slbReason").children("option[value="+inputVal+"]").remove();
		}
	});

	$("#voiceCC input[type='radio']").change(function(){
		var inputVal = $(this).val();
		if($(this).is(':checked')){
			$('#valueVoiceCC').html("「" + inputVal + "」");	   
		}
	});

	$("#voiceCD input[type='radio']").change(function(){
		var inputVal = $(this).val();
		if($(this).is(':checked')){
			$('#valueVoiceCD').html("「" + inputVal + "」");	   
		}
	});

	$("#voiceCS input[type='radio']").change(function(){
		var inputVal = $(this).val();
		if($(this).is(':checked')){
			$('#valueVoiceCS').html("「" + inputVal + "」");	   
		}
	});

});

</script>