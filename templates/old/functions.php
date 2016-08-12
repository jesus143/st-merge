<?php 


define('PREFIX', THEME.'_');
define('PREMETA', '_'.THEME.'_');
define('THEMENAME', 'global');
define('SITEURL', get_bloginfo('url'));
define('THEMEURL', get_bloginfo('template_url')); // Or TEMPLATEPATH (UNIX)
define('IMG', THEMEURL.'/img');
define('JS', THEMEURL.'/js'); 
define('CSS', THEMEURL.'/css'); 
define('BOOT', THEMEURL.'/bootstrap'); 
define('INC', THEMEURL.'/inc'); 



function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		'header' => 'header_menu',
		'footer' => 'footer Menu'
		)
	);
}



 ?>