/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	$(".menu > li").click(function(e){
		switch(e.target.id){
			case "all":
				//change status & style menu
				$("#all").addClass("active");
				$("#new").removeClass("active");
				$("#open").removeClass("active");
				$("#assigned").removeClass("active");
				$("#pending").removeClass("active");
				$("#cancelled").removeClass("active");
				//display selected division, hide others
				$("div.all").fadeIn();
				$("div.new").css("display", "none");
				$("div.open").css("display", "none");
				$("div.assigned").css("display", "none");
				$("div.pending").css("display", "none");
				$("div.cancelled").css("display", "none");


			break;
			case "new":
				//change status & style menu
				$("#all").removeClass("active");
				$("#new").addClass("active");
				$("#open").removeClass("active");
				$("#assigned").removeClass("active");
				$("#pending").removeClass("active");
				$("#cancelled").removeClass("active");
				//display selected division, hide others
				$("div.all").css("display", "none");
				$("div.new").fadeIn();
				$("div.open").css("display", "none");
				$("div.assigned").css("display", "none");
				$("div.pending").css("display", "none");
				$("div.cancelled").css("display", "none");
				 
				
			break;
				case "open":
				//change status & style menu
				$("#all").removeClass("active");
				$("#new").removeClass("active");
				$("#open").addClass("active");
				$("#assigned").removeClass("active");
				$("#pending").removeClass("active");
				$("#cancelled").removeClass("active");
				//display selected division, hide others
				$("div.all").css("display", "none");
				$("div.new").css("display", "none");
				$("div.open").fadeIn();
				$("div.assigned").css("display", "none");
				$("div.pending").css("display", "none");
				$("div.cancelled").css("display", "none");
			break;
			case "assigned":
				//change status & style menu
				$("#all").removeClass("active");
				$("#new").removeClass("active");
				$("#open").removeClass("active");
				$("#assigned").addClass("active");
				$("#pending").removeClass("active");
				$("#cancelled").removeClass("active");
				//display selected division, hide others
				$("div.all").css("display", "none");
				$("div.new").css("display", "none");
				$("div.open").css("display", "none");
				$("div.assigned").fadeIn();
				$("div.pending").css("display", "none");
				$("div.cancelled").css("display", "none");
			break;
			case "pending":
				//change status & style menu
				$("#all").removeClass("active");
				$("#new").removeClass("active");
				$("#open").removeClass("active");
				$("#assigned").removeClass("active");
				$("#pending").addClass("active");
				$("#cancelled").removeClass("active");
				//display selected division, hide others
				$("div.all").css("display", "none");
				$("div.new").css("display", "none");
				$("div.open").css("display", "none");
				$("div.assigned").css("display", "none");
				$("div.pending").fadeIn();
				$("div.cancelled").css("display", "none");
			break;
            case "cancelled":
				//change status & style menu
				$("#all").removeClass("active");
				$("#new").removeClass("active");
				$("#open").removeClass("active");
				$("#assigned").removeClass("active");
				$("#pending").removeClass("active");
				$("#cancelled").addClass("active");
				//display selected division, hide others
				$("div.all").css("display", "none");
				$("div.new").css("display", "none");
				$("div.open").css("display", "none");
				$("div.assigned").css("display", "none");
				$("div.pending").css("display", "none");
				$("div.cancelled").fadeIn();
			break;
		}
		//alert(e.target.id);
		return false;
	});
});