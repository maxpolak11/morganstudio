
var uslugiClickable = false;
var cennikClickable = false;

var cennikKatChanged = false;

function initOferta(){

	// Zmiana zakładki usługi //
	$("#uslugi .kategorie a").click(function(){
		
		if(!uslugiClickable || $(this).is(".active") ) return;
		uslugiClickable = false;

		$("#uslugi .kategorie a.prev").removeClass("prev");
		$("#uslugi .kategorie a.active").removeClass("active");
		$(this).addClass("active");

		if( !$(this).is(":first-child") ){
			$(this).prev("a").addClass("prev");
		}

		$("#uslugi .tresci .content.active").animate({"opacity" : 0}, 250, "easeOutSine", function(){

			$("#uslugi .tresci .content.active").removeClass("active");

			$("#" + $("#uslugi .kategorie a.active").attr("data-target") )
				.css("opacity", 0)
				.addClass("active")
				.animate({"opacity" : 1}, 250, "easeOutSine", function(){
					uslugiClickable = true;
				});

		});

	});

	// Zmiana zakładki cennika //
	$("#cennik .buttons .button").click(function(){

		if(!cennikClickable || $(this).is(".active") ) return;
		cennikClickable = false;

		$("#cennik .buttons .button.active").removeClass("active");
		$(this).addClass("active");

		$("#cennik .content.active").animate({"opacity" : 0}, 250, "easeOutSine", function(){

			var oldHeight = $("#cennik .content.active").height();

			$("#cennik .content.active").removeClass("active");

			$("#" + $("#cennik .buttons .button.active").attr("data-target") )
				.css("opacity", 0)
				.addClass("active");

			var newHeight = $("#cennik .content.active").height();

			$("#" + $("#cennik .buttons .button.active").attr("data-target") )
				.css("height", oldHeight)
				.animate({"opacity" : 1, "height" : newHeight}, 250, "easeOutSine", function(){
					cennikClickable = true;
					$("#cennik .content").css("height", "");
				});

			if( !cennikKatChanged ){
				cennik_border_remove();
				cennikKatChanged = true;
			}

		});

	});

	// Usuń krawędź z ostatniego elementu kolumny cennika //
	cennik_border_remove();

	uslugiClickable = true;
	cennikClickable = true;

}

// Usuń krawędź z ostatniego elementu kolumny cennika //
function cennik_border_remove(){
	
	var cennikKatOffset = 0;
	var cennikKatIndex = 0;

	$("#cennik .content.active .kategoria").each(function(){

		if( cennikKatOffset < $(this).offset().top && !$(this).is(":last-child") ){
			cennikKatOffset = $(this).offset().top ;
			cennikKatIndex = $(this).index();
		}
	});

	$("#cennik .content.active .kategoria").eq(cennikKatIndex).addClass("last");
}