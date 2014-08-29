$().ready(function(){
	$(".lightbox").hide();
	$("a[rel*=modal]").click(function(e){
	$("body").prepend("<div id='layer'></div>");
		var modalID = $(this).attr("href");
		var modalHeight = $(modalID).outerHeight();
		var modalWidth = $(modalID).outerWidth();			
		$("#layer").click(function(){
			closeModal(modalID);
		});		
		$(modalID).prepend("<a href='#' class='close'><span 'aria-hidden=true' class='icon-close'></span></a>");
		$(".close").click(function(e){
			e.preventDefault();
			closeModal(modalID);
		});
		$("#layer").css({"display":"content", "opacity":0, "z-index": 3});
		$("#layer").fadeTo("slow", 0.8);
		$(modalID).css({
			"display": "content",
			"position": "fixed",
			"z-index": 11000,
			"opacity": 0,
			"left": 50+"%",
			"top": 50+"%",
			"margin-left": -(modalWidth / 2)+"px",
			"margin-top": -(modalHeight / 2)+"px"
		});
		$(modalID).fadeTo(200, 1);
		e.preventDefault();
	});
});
function closeModal(e){
	$("#layer").fadeOut(200);
	$(e).css({"display" : "none"});
	$(".close").remove();
}
function inputDisp(value){
	if(value == true){
		$("#tdslt1").removeAttr("disabled");
		$("#tdslt2").removeAttr("disabled");
		$("#datepicker").removeAttr("disabled");
	}else{
		$("#tdslt1").attr("disabled", "disabled");
		$("#tdslt2").attr("disabled", "disabled");
		$("#datepicker").attr("disabled", "disabled");
	}
}