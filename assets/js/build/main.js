
var $root;
var $topMenu;

// po załadowaniu - podepnij eventy //
$(document).ready(function () { 

	$root = $('html, body');
	$topMenu = $("#top-menu");

	// Menu //
	initMenu();

	// Rezerwacja - Formularz kontaktowy //
	initRezerwacja();

	// Zakładka Home //
	if( $("#home-header").length ){
		initHome();
	
	// Zakładka Oferta //
	}else if( $("#uslugi").length ){
		initOferta();

	}

	// Gładkie przejście do hash linków //
	$("a[href*=\\#]").click(function () {

		var target = "#" + $.attr(this, 'href').split('#').pop();

		if( $(target).length ){

			var scrollTo = $( target ).offset().top;

			if( $("#mq-indicator-phone").css("display") == "block" ){
				scrollTo -= $topMenu.outerHeight();
			}else{
				scrollTo -= 80;
			}

		    $root.animate({
		        scrollTop: scrollTo
		    }, 1000, 'easeInOutCubic');

		    return false;
	    	
		}
		
	});

	// Akceptacja Ciasteczek //
	if( $("#cookies-information").length ){

		$("#cookies-information .close").click(function(){
			
			createCookie('cookies_accepted', 'true', 7);

			$("#cookies-information").animate({"opacity" : 0}, 300, "easeOutCubic", function(){
				$("#cookies-information").remove();
			});
		});

	}
	
	$(window).resize();
	$(window).scroll();

	// Jeśli w linku jest # zjedź do sekcji //
	if( window.location.hash ){

		var scrollTo = $( window.location.hash ).offset().top;

		if( $("#mq-indicator-phone").css("display") == "block" ){
			scrollTo -= $topMenu.outerHeight();
		}else{
			scrollTo -= 80;
		}

	    $root.animate({
	        scrollTop: scrollTo
	    }, 1000, 'easeOutCubic');

	}
	
});

// Po pełnym załadowaniu strony //
$(window).on('load', function() {
	$(window).resize();
	$(window).scroll();
});
