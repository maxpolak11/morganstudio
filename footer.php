
	<div id="rezerwacja" class="section">
		<div class="container">

			<h2 class="white"><?php echo get_option("rezerwacja_formularz_tytul"); ?></h2>
			<p class="white"><?php echo get_option("rezerwacja_formularz_tekst"); ?></p>

			<div class="formularz">

				<form id="rezerwacja-formularz" action="<?php echo get_template_directory_uri(); ?>/wyslij-wiadomosc.php">
					<div class="wrapper">
						<input id="f_email" name="f_email" type="text" placeholder="Podaj swój adres Email." />
						<textarea id="f_wiadomosc" name="f_wiadomosc" placeholder="Wpisz treść wiadomości." rows="3"></textarea>
					</div>
					<button type="submit" class="button blue filled">Wyślij</button>
				</form>

				<div id="wiadomosc-wyslana">
					<div class="wrapper">
						<h3>Dziękujemy!</h3>
						<p>Twoja wiadomość została wysłana!</p>
					</div>
				</div>

			</div>
			
		</div>
	</div>
		
	<footer id="footer">
		<div class="container">
			
			<div class="adres">
				<h4>Adres</h4>
				<p><?php echo nl2br( get_option("adres") ); ?>
			</div>

			<div class="dane-kontaktowe">
				<h4>Dane kontaktowe</h4>
				<p><?php echo nl2br( get_option("dane_kontaktowe") ); ?>
			</div>

			<div class="social-media">
				<h4>Social media</h4>
				<a target="_blank" href="<?php echo get_option("facebook_link"); ?>">
					<?php echo file_get_contents(get_template_directory_uri() . "/assets/icons/facebook.svg"); ?>
				</a>
				<a target="_blank" href="<?php echo get_option("instagram_link"); ?>">
					<?php echo file_get_contents(get_template_directory_uri() . "/assets/icons/instagram.svg"); ?>
				</a>
				<a target="_blank" href="<?php echo get_option("google_link"); ?>">
					<?php echo file_get_contents(get_template_directory_uri() . "/assets/icons/google-plus.svg"); ?>
				</a>
			</div>

		</div>
	</footer>

	<?php
		if(!isset($_COOKIE["cookies_accepted"])) { ?>
			<div id="cookies-information">
				<div class="container">
					<p>Ten serwis wykorzystuje pliki cookies. Korzystanie z witryny oznacza zgodę na ich zapis lub odczyt wg ustawień przeglądarki.</p>
					<div class="close">
						<a></a>
					</div>
				</div>
			</div>
		<?php }
	?>

	<div class="mq-js-indicator" id="mq-indicator-tablet"></div>
	<div class="mq-js-indicator" id="mq-indicator-phone"></div>
	<div class="mq-js-indicator" id="mq-indicator-phone-xs"></div>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/include/jquery-3.6.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/include/jquery.easing.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/include/jquery.validate.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/include/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main-min.js?<?php echo filemtime( dirname(__FILE__) . "/assets/js/main-min.js"); ?>"></script>

	<?php wp_footer(); ?>

	</body>
</html>