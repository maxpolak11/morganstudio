<?php 
	/* Template Name: Oferta */

	get_header(); 
?>

	<div id="oferta-header" style="background-image: url('<?php echo maxj_jpgorwebp( get_field('header')['tlo']['url'] ); ?>')">
		<div class="container">

			<div class="text">
				<h2 class="white"><?php echo get_field("header")['tytul']; ?></h2>
				<p class="white"><?php echo get_field("header")['tekst']; ?></p>
			</div>

		</div>
	</div>

	<div id="uslugi" class="section">
		<div class="container">
			
			<div class="kategorie">

				<?php

					for ($i=1; $i <= 14; $i++) { 
						if( get_field("uslugi")["tytul" . $i] ){ ?>
							<a class="kategoria<?php if($i == 1) { echo " active"; } ?>" data-target="usluga-<?php echo $i; ?>"><?php echo get_field("uslugi")["tytul" . $i]; ?></a>
						<?php }
					}

				?>

			</div>

			<div class="tresci">

				<?php

					for ($i=1; $i <= 14; $i++) { 
						if( get_field("uslugi")["tytul" . $i] ){ ?>
							
							<div class="content<?php if($i == 1){ echo " active"; } ?>" id="usluga-<?php echo $i; ?>">
								<h2><?php echo get_field("uslugi")["tytul" . $i]; ?></h2>
								<p><?php echo get_field("uslugi")["tresc" . $i]; ?></p>
							</div>

						<?php }
					}

				?>

			</div>

		</div>
	</div>

	<?php include("elements/zarezerwuj.php"); ?>

	<?php

		function get_cennik($strefa_acf, $liczba_uslug){

			for ($i=1; $i <= $liczba_uslug; $i++) { 
					if( !get_field($strefa_acf)["uslugi_i_ceny" . $i] ) continue;
				?>

					<div class="kategoria">	
						<h5><?php echo get_field($strefa_acf)["kategoria" . $i]; ?></h5>
						<div class="uslugi-i-ceny">
							<?php

								$uslugi_i_ceny = get_field($strefa_acf)["uslugi_i_ceny" . $i];
								if( strpos($uslugi_i_ceny, '>') === false) { ?>

									<div class="usluga-i-cena">
										<p class="usluga"></p>
										<p class="cena"><?php echo $uslugi_i_ceny; ?></p>
									</div>

								<?php }else{
									$uslugi_i_ceny = preg_split("/\\r\\n|\\r|\\n/", $uslugi_i_ceny);
									foreach ($uslugi_i_ceny as $mixed) {
										
										$usluga = strtok($mixed, ">");
										$cena = substr($mixed, strpos($mixed, ">") + 1); 

										?>

										<div class="usluga-i-cena">
											<p class='usluga'><?php echo $usluga; ?></p>
											<p class='cena'><?php echo $cena; ?></p>
										</div>

									<?php }
								}
							?>
						</div>
					</div>

				<?php }

		}
	?>

	<div id="cennik" class="section">
		<div class="container">
			
			<h2>Cennik</h2>

			<div class="buttons">
				<a class="button active" data-target="strefa-damska">strefa damska</a>
				<a class="button" data-target="strefa-meska">strefa męska</a>
			</div>

			<div class="content active" id="strefa-damska">
				<div class="wrapper">

					<?php get_cennik("cennik_strefa_damska", 10); ?>

				</div>
			</div>

			<div class="content" id="strefa-meska">
				<div class="wrapper">

					<?php get_cennik("cennik_strefa_meska", 6); ?>
			
				</div>
			</div>

		</div>
	</div>

	<div id="promocje" class="section" style="background-image: url('<?php echo maxj_jpgorwebp( get_field("promocje")['tlo']['url'] ); ?>');">
		<div class="container">

			<h2 class="white">Promocje</h2>
			<div class="wrapper">
				<p><?php echo get_field("promocje")["promocja_1"]; ?></p>
				<p><?php echo get_field("promocje")["promocja_2"]; ?></p>
				<p><?php echo get_field("promocje")["promocja_3"]; ?></p>
			</div>

		</div>
	</div>

<?php get_footer(); ?>