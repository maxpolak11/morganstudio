<?php 
	/* Template Name: Strona Główna */

	get_header(); 
?>

	<div id="home-header" style="background-image: url('<?php echo maxj_jpgorwebp( get_field('header')['tlo']['url'] ); ?>')">
		<div class="container">

			<div class="text">
				
				<h3 class="white"><?php echo get_field("header")['tytul']; ?></h3>
				<h1 class="white"><?php echo get_field("header")['tekst']; ?></h1>

				<a href="<?php echo get_site_url(); ?>/oferta/" class="button filled blue">Oferta</a>
				<a href="<?php echo get_site_url(); ?>/kontakt/" class="button white outline">Kontakt</a>

			</div>

		</div>
		<a id="home-header-scroll-down" href="#o-mnie">
			<?php echo file_get_contents( get_template_directory_uri() . "/assets/icons/circle-chevron-down.svg"); ?>
		</a>
	</div>

	<?php include("elements/zarezerwuj.php"); ?>

	<div id="o-mnie" class="section">
		<div class="container">

			<h2>O mnie</h2>
			<p><?php echo get_field("o_mnie")['o_mnie']; ?></p>

			<div class="text">
				
				<div class="t">
					<h3>Co robię?</h3>
					<p><?php echo get_field("o_mnie")["co_robie"]; ?></p>
				</div>

				<div class="t">
					<h3>Kwalifikacje</h3>
					<p><?php echo get_field("o_mnie")["kwalifikacje"]; ?></p>
				</div>

				<div class="t">
					<h3>Doświadczenie</h3>
					<p><?php echo get_field("o_mnie")["doswiadczenie"]; ?></p>
				</div>

			</div>

		</div>
	</div>

	<div id="konkursy" class="section" style="background-image: url('<?php echo maxj_jpgorwebp( get_field("konkursy")['tlo']['url'] ); ?>');">
		<div class="container">

			<h2 class="white">Konkursy</h2>
			<p><?php echo get_field("konkursy")["tekst"]; ?></p>
			<a href="#galeria" class="button blue filled">Galeria zdjęć</a>

		</div>
	</div>

	<div id="galeria" class="section">
		<div class="container">

			<h3>Morgan studio</h3>
			<h2>Galeria</h2>

			<div class="galeria-kategorie">
				<a class="button wide filled grey-blue active" data-target="galeria-konkursy">Konkursy</a>
				<a class="button wide filled grey-blue" data-target="galeria-makijaz">Makijaż</a>
			</div>

			<div class="galeria active" id="galeria-konkursy">
				
				<div class="wrapper">

					<?php

						for ($i=1; $i < 5; $i++) { 
							if( get_field("galeria")["konkursy"]["zdjecie_" . $i] ){ ?>
							<img src="<?php echo maxj_jpgorwebp( get_field("galeria")['konkursy']['zdjecie_' . $i]['url'] ); ?>" alt="Galeria konkursy - slajd <?php echo $i; ?>" />
							<?php } 
						}

					?>

				</div>

				<div class="galeria-arrows">
					<div class="arrow left-arrow">
						<div>
							<?php echo file_get_contents( get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
						</div>
					</div>
					<div class="arrow right-arrow">
						<div>
							<?php echo file_get_contents( get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
						</div>
					</div>
				</div>

				<div class="galeria-dots"></div>

			</div>

			<div class="galeria" id="galeria-makijaz">
				
				<div class="wrapper">

					<?php

						for ($i=1; $i < 5; $i++) { 
							if( get_field("galeria")["makijaz"]["zdjecie_" . $i] ){ ?>
							<img src="<?php echo maxj_jpgorwebp( get_field("galeria")['makijaz']['zdjecie_' . $i]['url'] ); ?>" alt="Galeria makijaż - slajd <?php echo $i; ?>" />
							<?php } 
						}

					?>
					
				</div>

				<div class="galeria-arrows">
					<div class="arrow left-arrow">
						<div>
							<?php echo file_get_contents( get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
						</div>
					</div>
					<div class="arrow right-arrow">
						<div>
							<?php echo file_get_contents( get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
						</div>
					</div>
				</div>

				<div class="galeria-dots">
					<div class="dot active"></div>
					<div class="dot"></div>
				</div>

			</div>

		</div>
	</div>

	<div id="home-oferta" class="section" style="background-image: url('<?php echo maxj_jpgorwebp( get_field("oferta")['tlo']['url'] ); ?>');">
		<div class="container">
			
			<h2 class="white">Oferta</h2>
			<p><?php echo get_field("oferta")['tekst']; ?></p>

			<div class="buttons">
				<a class="button blue filled" href="<?php echo get_site_url(); ?>/oferta/">Oferta</a>
				<a class="button white filled" href="<?php echo get_site_url(); ?>/oferta#cennik">Cennik</a>
				<a class="button white outline" href="<?php echo get_site_url(); ?>/oferta#promocje">Promocje</a>
			</div>

		</div>
	</div>

<?php get_footer(); ?>