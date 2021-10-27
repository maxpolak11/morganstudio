
var homeGaleriaClickable = false;
var homeGaleriaTarget = "";

var homeGaleriaAnimTime = 800;
var gallery2Activated = false;

function initHome(){

	// zainicjuj galerię slick //
	$("#galeria .galeria.active .wrapper").slick({
		dots: true,
		prevArrow: $("#galeria .galeria.active .arrow.left-arrow"),
		nextArrow: $("#galeria .galeria.active .arrow.right-arrow"),
		appendDots: $("#galeria .galeria.active .galeria-dots")
	});

	// zmiana kategorie Galerii //
	$("#galeria .galeria-kategorie a.button").click(function(){

		if( $(this).is(".active") || !homeGaleriaClickable ) return;
		homeGaleriaClickable = false;
		
		homeGaleriaTarget = "#" + $(this).attr("data-target");

		$(".galeria-kategorie a.button.active").removeClass("active");
		$(this).addClass("active");

		$(".galeria.active").animate({"opacity" : 0}, 250, "easeInCubic", function(){
			$(".galeria.active").removeClass("active");
			$(homeGaleriaTarget)
				.addClass("active")
				.css("opacity", 0)
				.animate({"opacity": 1}, 400, "easeOutCubic", function(){
					homeGaleriaClickable = true;
				});

				// zainicjuj drugą galerię w trakcie jej animacji //
				if(!gallery2Activated){
					gallery2Activated = true;
					$(homeGaleriaTarget).find(".wrapper").slick({
						dots: true,
						prevArrow: $(homeGaleriaTarget).find(".arrow.left-arrow"),
						nextArrow: $(homeGaleriaTarget).find(".arrow.right-arrow"),
						appendDots: $(homeGaleriaTarget).find(".galeria-dots")
					});
				}
		});

	});

	homeGaleriaClickable = true;
}