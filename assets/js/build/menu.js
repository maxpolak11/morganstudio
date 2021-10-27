
var submenuClickable = false;
var mobileMenuClickable = false;

function initMenu(){
	
	// Zmniejsz wysokość menu przy skrolowaniu //
	$(window).scroll(function() {
		if( $(window).scrollTop() > 20 ){
			$topMenu.addClass("scrolling");
		}else{
			$topMenu.removeClass("scrolling");
		}
	});

	// Wyświetl podmenu po kliknięciu strzałki //
	$("#top-menu .menu-item .more").click(function(){

		if(!submenuClickable) return;
		submenuClickable = false;

		if( $(this).is(".active") ){

			$(this).removeClass("active");

			$(this).next(".submenu").animate({"opacity":0}, 150, "easeOutCubic", function(){
				$("#top-menu .menu-item .more.active").next(".submenu").css("display", "none");
				submenuClickable = true;
			});

			submenuClickable = true;

		}else{

			if( $("#top-menu .menu-item .more.active").length ){

				$("#top-menu .menu-item .more.active").next(".submenu").css("display", "none");
				$("#top-menu .menu-item .more.active").removeClass("active");
			}

			$(this).addClass("active");

			$(this).next(".submenu").css({"display":"block","opacity" : 0}).animate({"opacity":1}, 150, "easeOutCubic", function(){
				submenuClickable = true;
			});
		}
		
	});

	// zamknij menu po kliknięciu gdziekolwiek poza menu //
	$("#top-menu .menu-item").click(function(event){
		event.stopPropagation();
	});

	$('html').click(function(e) {                    
		if( $topMenu.find(".more.active") ){

			$topMenu.find(".more.active").next(".submenu").css("display", "none");
			$topMenu.find(".more.active").removeClass("active");

		}
	});

	// Mobile Menu //
	$("#mobile-menu-button").click(function(){

		if(!mobileMenuClickable) return;
		mobileMenuClickable = false;

		// Otwórz Menu //
		if( !$("#mobile-menu").hasClass("open") ){

			$(this).addClass("open");

			$("#mobile-menu")
				.addClass("open")
				.css("opacity", 0)
				.animate({"opacity": 1}, 400, 'easeOutCubic', function(){
					mobileMenuClickable = true;
				});

		// Zamknij Menu //
		}else{

			$(this).removeClass("open");
			
			$("#mobile-menu").animate({"opacity": 0}, 400, 'easeOutCubic', function(){
				$("#mobile-menu").removeClass("open");
				mobileMenuClickable = true;
			});

		}
		
	});

	mobileMenuClickable = true;
	submenuClickable = true;
}