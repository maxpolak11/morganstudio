<?php
	
	// Ustal aktualną zakładkę //
	$url = $_SERVER['REQUEST_URI'];
	$page = "home";

	if( strpos($url, 'oferta') !== false ){
		$page = "oferta";
	}else if( strpos($url, 'kontakt') !== false ){
		$page = "kontakt";
	}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

	<title>Salon Kosmetyczny - Morgan Studio - <?php echo get_the_title(); ?></title>

	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css?<?php echo filemtime( dirname(__FILE__) . "/assets/css/main.css" ); ?>">
	<base href="/">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body>

	<div id="top-menu">
		<div class="container">

			<a href="<?php echo get_site_url(); ?>" class="logo">
				<img src="<?php echo maxj_logo_url_fix( get_option("logo") ); ?>" alt="Morgan Studio - logo" />
			</a>

			<div id="mobile-menu-button">
				<div></div>
				<div></div>
				<div></div>
			</div>

			<div class="menu">
				
				<div class="menu-item">
					<a href="<?php echo get_site_url(); ?>" class="<?php if($page == "home") echo "active"; ?>">Home</a>
					<div class="more">
						<?php echo file_get_contents(get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
					</div>
					<div class="submenu">
						<a href="<?php echo get_site_url(); ?>#o-mnie">O mnie</a>
						<a href="<?php echo get_site_url(); ?>#galeria">Galeria</a>
					</div>
				</div>

				<div class="menu-item">
					<a href="<?php echo get_site_url(); ?>/oferta/" class="<?php if($page == "oferta") echo "active"; ?>">Oferta</a>
					<div class="more">
						<?php echo file_get_contents(get_template_directory_uri() . "/assets/icons/chevron-down.svg"); ?>
					</div>
					<div class="submenu">
						<a href="<?php echo get_site_url(); ?>/oferta#uslugi">Usługi</a>
						<a href="<?php echo get_site_url(); ?>/oferta#cennik">Cennik</a>
						<a href="<?php echo get_site_url(); ?>/oferta#promocje">Promocje</a>
					</div>
				</div>

				<div class="menu-item">
					<a href="<?php echo get_site_url(); ?>/kontakt/" class="<?php if($page == "kontakt") echo "active"; ?>">Kontakt</a>
				</div>
				
			</div>

			<div class="social-media">
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

	</div>
	
	<div id="mobile-menu">
		<div id="mobile-menu-wrapper">
			
			<a href="<?php echo get_site_url(); ?>" class="<?php if($page == "home") echo "active"; ?>">Home</a>
			<a href="<?php echo get_site_url(); ?>/oferta/" class="<?php if($page == "oferta") echo "active"; ?>">Oferta</a>
			<a href="<?php echo get_site_url(); ?>/kontakt/" class="<?php if($page == "kontakt") echo "active"; ?>">Kontakt</a>

			<div class="social-media">
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
	</div>
	