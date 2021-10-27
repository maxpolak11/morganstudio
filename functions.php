<?php

// Usuń niechciane elementy z menu admina //
add_action( 'admin_init', 'maxj_remove_menu_pages' );
function maxj_remove_menu_pages() {

	remove_menu_page('index.php' ); //dashboard
	remove_menu_page('edit.php'); // Posts
	remove_menu_page('upload.php'); // Media
	remove_menu_page('edit-comments.php'); // Comments
	remove_menu_page('plugins.php'); // Plugins
	remove_menu_page('themes.php'); // Appearance
	remove_menu_page('users.php'); // Users
	remove_menu_page('profile.php'); // Profile
	remove_menu_page('tools.php'); // Tools
	remove_menu_page('options-general.php'); // Settings
}

// Przekieruj użytkownika na zakładkę - strony - po zalogowaniu //
add_filter('login_redirect', 'maxj_login_redirect'); 
function maxj_login_redirect($url) {
    return admin_url('edit.php?post_type=page');
}

// Przekieruj użytkownika z zakładki dashboard //
add_action( 'admin_init', 'maxj_dashboard_redirect' );
function maxj_dashboard_redirect(){
	global $pagenow;
    if ( $pagenow == 'index.php' ) {
        wp_redirect( admin_url( '/edit.php?post_type=page' ) );
        exit;
    }
}

// Usuń pasek admina //
add_action('after_setup_theme', 'maxj_remove_admin_bar');
function maxj_remove_admin_bar() {
	show_admin_bar(false);
}

// Usuń wp-embed.js // 
function maxj_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'maxj_deregister_scripts' );

// Usuń emoji //
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

// Usuń Gutenbergowe bloki //
function maxj_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' );
} 
add_action( 'wp_enqueue_scripts', 'maxj_remove_wp_block_library_css', 100 );

// Usuń niepotrzebne elementy z headera //
add_action( 'init', 'maxj_remove_dns_prefetch' ); 
function  maxj_remove_dns_prefetch () {
	// dns-prefetch //      
	remove_action( 'wp_head', 'wp_resource_hints', 2, 99 ); 
	// wlwmanifest-link //
	remove_action( 'wp_head', 'wlwmanifest_link');
	// wp_generator //
	remove_action('wp_head', 'wp_generator');
	// rsd //
	remove_action ('wp_head', 'rsd_link');
	// shortlink //
	remove_action( 'wp_head', 'wp_shortlink_wp_head');
	// rest json //
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	// wp-embed //
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	// cannonical link //
	remove_action( 'wp_head', 'rel_canonical' );

}

// Dodaj zakładkę ustawienia w adminie //
add_action('admin_menu', 'maxj_admin_menu');
function maxj_admin_menu() {
	add_menu_page( 'Morgan Studio - Ustawienia', 'Morgan Studio - Ustawienia', 'read', 'morgan-studio-ustawienia', 'adminMorganStudioUstawienia', get_template_directory_uri() . '/assets/icons/favicon/favicon-20x20.png', 20 );	
}
// Zapis opcji z formularza //
add_action( 'admin_init', 'register_morganstudio_settings' );
function register_morganstudio_settings(){
	register_setting( 'morganstudio-settings-group', 'facebook_link' );
	register_setting( 'morganstudio-settings-group', 'instagram_link' );
	register_setting( 'morganstudio-settings-group', 'google_link' );
	register_setting( 'morganstudio-settings-group', 'adres' );
	register_setting( 'morganstudio-settings-group', 'dane_kontaktowe' );
	register_setting( 'morganstudio-settings-group', 'rezerwacja_tekst' );
	register_setting( 'morganstudio-settings-group', 'rezerwacja_tekst_przycisku' );
	register_setting( 'morganstudio-settings-group', 'rezerwacja_formularz_tytul' );
	register_setting( 'morganstudio-settings-group', 'rezerwacja_formularz_tekst' );
	register_setting( 'morganstudio-settings-group', 'logo', 'maxj_handle_logo_upload' );
}
// Upload logo //
function maxj_handle_logo_upload($option){
	if(!empty($_FILES["logo"]["tmp_name"])){
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
		$temp = $urls["url"];
		return $temp;  
	}else{
		return get_option("logo");
	}

	return $option;
}
// Treść Zakładki //
function adminMorganStudioUstawienia(){
?>
<div class="wrap" id="wp-admin-morganstudio-ustawienia">
	<h1>Morgan Studio - Ustawienia</h1>

	<form method="post" action="options.php" enctype="multipart/form-data" 
		<?php 
		// użytkownik tester, niech nie ma możliwości zapisu zmian //
		if( get_current_user_id() == 2) { ?> onSubmit="return false;" <?php } ?>
	>
	    <?php settings_fields( 'morganstudio-settings-group' ); ?>
	    <?php do_settings_sections( 'morganstudio-settings-group' ); ?>
	    <table class="form-table">

	    	<tr valign="top">
	    		<th>Logo</th>
	    		<td>
	    			<img src="<?php echo get_option('logo'); ?>" /><br>
	    			<input type="file" name="logo" /> 
	    		</td>
	    	</tr>

	        <tr valign="top">
		        <th scope="row">Link do facebooka</th>
		        <td>
		        	<input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Link do instagrama</th>
		        <td>
		        	<input type="text" name="instagram_link" value="<?php echo esc_attr( get_option('instagram_link') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Link do google+</th>
		        <td>
		        	<input type="text" name="google_link" value="<?php echo esc_attr( get_option('google_link') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Adres</th>
		        <td>
		        	<textarea rows="5" name="adres"><?php echo esc_attr( get_option('adres') ); ?></textarea>
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Dane Kontaktowe</th>
		        <td>
		        	<textarea rows="5" name="dane_kontaktowe"><?php echo esc_attr( get_option('dane_kontaktowe') ); ?></textarea>
		        </td>
	        </tr>

			<tr valign="top">
		        <th scope="row">Rezerwacja Tekst</th>
		        <td>
		        	<input type="text" name="rezerwacja_tekst" value="<?php echo esc_attr( get_option('rezerwacja_tekst') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Rezerwacja Tekst Przycisku</th>
		        <td>
		        	<input type="text" name="rezerwacja_tekst_przycisku" value="<?php echo esc_attr( get_option('rezerwacja_tekst_przycisku') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Nagłówek formularza rezerwacji</th>
		        <td>
		        	<input type="text" name="rezerwacja_formularz_tytul" value="<?php echo esc_attr( get_option('rezerwacja_formularz_tytul') ); ?>" />
		        </td>
	        </tr>

	        <tr valign="top">
		        <th scope="row">Tekst formularza rezerwacji</th>
		        <td>
		        	<textarea rows="5" name="rezerwacja_formularz_tekst"><?php echo esc_attr( get_option('rezerwacja_formularz_tekst') ); ?></textarea>
		        </td>
	        </tr>

	    </table>
    
    	<?php submit_button(); ?>

	</form>
</div>
<?php
}

// Dodaj CSS do wp-admin //
function maxj_admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'maxj_admin_style');

// Dodaj favikonkę do wp-admin //
function favicon4admin() {
?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
<?php }
add_action( 'admin_head', 'favicon4admin' );


// zablokuj zapisywanie zmian dla nie admina //
function maxj_disable_save( $maybe_empty, $postarr ) {
	if( get_current_user_id() != 1){
	    $maybe_empty = true;
	    return $maybe_empty;
	}
}
add_filter( 'wp_insert_post_empty_content', 'maxj_disable_save', 999999, 2 );

// zablokuj publikowanie zdjęć dla nie admina //
function maxj_only_upload_for_admin( $file ) {
    if ( get_current_user_id() != 1 ) {
        $file['error'] = 'Jako tester nie możesz publikować zdjęć.';
    }
    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'maxj_only_upload_for_admin' );

// wyłącz generowanie miniaturek publikowanych zdjęć //
add_action('intermediate_image_sizes_advanced', 'maxj_disable_image_sizes');
add_filter('big_image_size_threshold', '__return_false');
add_action('init', 'maxj_disable_other_image_sizes');
function maxj_disable_image_sizes($sizes) {
	
	unset($sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['large']);
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	
	return $sizes;
	
}
function maxj_disable_other_image_sizes() {
	remove_image_size('post-thumbnail');
	remove_image_size('another-size');
}

// jeśli przeglądarka obsługuje webp, podmień url //
function maxj_jpgorwebp($imgurl){
	if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
		return $imgurl . ".webp";
	}else{
		return $imgurl;
	}	
	
}

// Napraw błąd podczas pobierania adresu logo bez https //
function maxj_logo_url_fix($logo_url){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") {
	   
	   if ( strpos($logo_url, 'https') !== false) {
	   	return $logo_url;
	   }else{
	   	return str_replace("http", "https", $logo_url);
	   }

	}else{
		return $logo_url;
	}
}