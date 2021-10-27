
var submitable = false;

function initRezerwacja(){

	// Zatrzymaj formularz przed automatycznym wysyłaniem //
	$("#rezerwacja-formularz").submit(function(e){
		e.preventDefault();
	});

	// Zweryfikuj dane podane w formularzu //
	$("#rezerwacja-formularz").validate({

		rules: {

			f_email: {
				required: true,
				email: true
			},
			f_wiadomosc: "required"
			
		},
		messages: {
			f_email: "Proszę podać prawidłowy adres email",
			f_wiadomosc: "Proszę wypełnić polę wiadomości"
		},
		submitHandler: function(form) {

			if(!submitable) return;
			submitable = false;

			var $form = $("#rezerwacja-formularz");
			var $inputs = $form.find("input, textarea");

			var serializedData = $form.serialize();

			// $inputs.prop("disabled", true);

			// Wyślij dane //
			request = $.ajax({
			    url: $form.attr("action"),
			    type: "post",
			    data: serializedData
			});

			// Jeśli się powiodło: //
			request.done(function (response, textStatus, jqXHR){

				$("#rezerwacja-formularz").animate({"opacity" : 0}, 800, 'easeInSine', function(){

					$("#wiadomosc-wyslana")
						.css("display", "block")
						.delay(100)
						.animate({"opacity": 1}, 800, 'easeOutSine');
				});

			    console.log(response);
			});

			// Jeśli wystąpił błąd: //
			request.fail(function (jqXHR, textStatus, errorThrown){
			    alert("Wystąpił błąd podczas wysyłania wiadomości, proszę napisz wiadomość email bezpośrednio na adres: m.bulgajewska@gmail.com, lub zadzwoń na numer +48 665 501 604");
			    console.error(
			        "The following error occurred: "+
			        textStatus, errorThrown
			    );
			    submitable = true;
			});

			request.always(function () {
			    $inputs.prop("disabled", false);
			});

		}
	});

	// Ustaw automatyczną regulacje wielkości okna wiadomości //
    $("#rezerwacja-formularz #f_wiadomosc").css("min-height", $("#rezerwacja-formularz #f_wiadomosc").outerHeight() );
    $("#rezerwacja-formularz #f_wiadomosc").css("max-height", $("#rezerwacja-formularz #f_wiadomosc").height()*2 );

    $("#rezerwacja-formularz #f_wiadomosc").on('input', function(){

    	document.getElementById("f_wiadomosc").style.height = "5px";
    	document.getElementById("f_wiadomosc").style.height = (document.getElementById("f_wiadomosc").scrollHeight+2) + "px";
    });

    submitable = true;
}