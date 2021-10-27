<?php 
	/* Template Name: Kontakt */

	get_header(); 
?>

	<div id="kontakt-header" style="background-image: url('<?php echo maxj_jpgorwebp( get_field('header')['tlo']['url'] ); ?>')">
		<div class="container">

			<div class="text">
				<h2 class="white"><?php echo get_field("header")['tytul']; ?></h2>
				<p class="white"><?php echo get_field("header")['tekst']; ?></p>
			</div>

		</div>
	</div>

	<div id="kontakt" class="section">
		<div class="container">
			
			<div class="informacje">

				<div class="box dane-kontaktowe">
					<div class="wrapper">
						<h3>Dane Kontaktowe</h3>
						<p><?php echo nl2br( get_option("dane_kontaktowe") ); ?></p>
						<a href="#rezerwacja" class="button blue filled">Zarezerwuj termin</a>
					</div>
				</div>

				<div class="box oferta" style="background-image: url('<?php echo maxj_jpgorwebp( get_field("oferta")['tlo']['url'] ); ?>');">
					<div class="wrapper">

						<h3 class="white"><?php echo get_field("oferta")["tytul"]; ?></h3>
						<p class="white"><?php echo get_field("oferta")["tekst"]; ?></p>

						<div class="buttons">
							<a href="<?php echo get_site_url(); ?>/oferta/" class="button blue filled">Oferta</a>
							<a href="<?php echo get_site_url(); ?>/oferta#cennik" class="button white filled">Cennik</a>
						</div>

					</div>
				</div>

			</div>

			<div class="mapa">
				<div id="map">
					<iframe 
						width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2402.913013318698!2d14.60369231596592!3d52.96797921068482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47075ae2218e1993%3A0xebf10defc96e7536!2sKo%C5%9Bciuszki%2049%2C%2074-510%20Trzci%C5%84sko-Zdr%C3%B3j!5e0!3m2!1sen!2spl!4v1634548104557!5m2!1sen!2spl"
					></iframe>
				</div>
			</div>

		</div>
	</div>

<?php get_footer(); ?>