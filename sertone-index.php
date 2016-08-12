<?php
session_start();

/*
Plugin Name: Console system
Plugin URI: http://sertone.co
Description: custom extention for sertone.co
Version: 1.0
Author: Announ
Author URI: http://sertone.co
*/
/*

setting can be found on http://domain.com/wp-admin/options-general.php?page=trail-league-options
ADMIN > SETTINGS

*/

//init

/* Main Plugin File */

if ( ! defined( 'SERTONE_BASE_FILE' ) )
    define( 'SERTONE_BASE_FILE', __FILE__ );
if ( ! defined( 'SERTONE_BASE_DIR' ) )
    define( 'SERTONE_BASE_DIR', dirname( SERTONE_BASE_FILE ) );
if ( ! defined( 'SERTONE_PLUGIN_URL' ) )
    define( 'SERTONE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


require_once('config/configuration.php');
require_once('helper.php');

function on_sertone_activate() {

    //page to be created when install
    global $wpdb;

    $pages_to_create = array(
        'Add Application',
        'Add Gateway',
        'Dashboard',
        'Add Registration',
        'Log in',
        'Add Sensor',
        'application-detail',
        'device-info-abp',
        'device-info-otaa'
    );

    foreach($pages_to_create as $page){


        if($page == "Dashboard") {
            $page = 'add-'. $page;
        }


        $slug = "sertone-" . seoUrlsertone( strtolower( $page ) );

        $postID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name='$slug'");

        if ($postID == '') {


            // Gather post data.
            $my_post = array(
                'post_title'    => $page,
                'post_type'     => 'page',
                'post_name'     => $slug,
                'post_content'  => 'this is an console system template.',
                'post_status'   => 'publish',
                'post_author'   => get_current_user_id(),
            );

            // Insert the post into the database.
            $pid = wp_insert_post( $my_post );

            if($pid!=""){

                $allpid[] = $pid;


            }

        }




    }

    if(!empty( $allpid )){

        update_option('sertone_post_ids',$allpid);

    }


    /* activation code here */
}

register_activation_hook( __FILE__, 'on_sertone_activate' );


$console_sys_url = [
    'sertone-add-gateway',
    'sertone-add-application',
];


add_filter( 'template_include', 'template_loader_sertone');

function template_loader_sertone( $template ) {

    if(is_page('sertone-add-application')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-application.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;

    }

    if(is_page('sertone-add-gateway')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-gateway.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;

    }

    if(is_page('sertone-add-dashboard')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-dashboard.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;

    }

    if( is_page( 'sertone-add-registration' ) ){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-registration.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;

    }

    if( is_page('sertone-log-in') ){

        $new_template = SERTONE_BASE_DIR.'/templates/index.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;

    }

    if(is_page('sertone-add-sensor')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-sensor.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;
    }

    if(is_page('sertone-application-detail')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-application-detail.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;
    }

    if(is_page('sertone-device-info-abp')){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-device-info-abp.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;
    }

    if( is_page('sertone-device-info-otaa') ){

        $new_template = SERTONE_BASE_DIR.'/templates/sertone-device-info-otaa.php';

        if ( '' != $new_template ) {
            return $new_template ;
        }
        exit;
    }

//    if(is_page('sertone-add-sensor')) {
//        $new_template = SERTONE_BASE_DIR.'/templates/sertone-add-sensor.php';
//
//        if ( '' != $new_template ) {
//            return $new_template ;
//        }
//        exit;
//    }

    return $template;
}



/**
 * This should be working online
 * This will allow to display the deault page of the site
 */







$console_sys_url = [
    'sertone-add-gateway',
    'sertone-add-application',
    'sertone-add-dashboard',
    'sertone-log-in',
    'sertone-add-sensor',
    'sertone-application-detail',
    'sertone-device-info-abp',
    'sertone-device-info-otaa'
];



//echo "slug " . csys_get_slug_of_the_page();
//if(in_array(csys_get_slug_of_the_page(), $console_sys_url) || csys_is_local() == true) {
    require SERTONE_BASE_DIR .'/sertone-functions.php';
//}
//if(csys_is_local() == true) {
    add_action('init', 'csys_init_method');
    function csys_init_method() {
        if(! is_admin() ){
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js');
        }
    }
//}



//if(!empty(csys_get_slug_of_the_page())){
//}










function load_plugin() {

    if ( is_admin() && get_option( 'Activated_Plugin' ) == 'Plugin-Slug' ) {

        delete_option( 'Activated_Plugin' );

        /* do stuff once right after activation */
        // example: add_action( 'init', 'my_init_function' );
    }
}




//add_action('wp_head', 'console_include_data');
//function console_include_data() {
//    //declare required
//    require SERTONE_BASE_DIR.'/sertone-functions.php';
//}




//seo url to make url friendly

function seoUrlsertone($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}


/**
 * Jquery and js and css initialized
 */

add_action('init', 'csys_register_script');
add_action('wp_enqueue_scripts', 'csys_enqueue_style');

function csys_register_script() {
    wp_register_script( 'custom_jquery', plugins_url('public/js/custom_jquery.js', __FILE__), array('jquery'), '2.5.1' );
    wp_register_style( 'new_style', plugins_url('public/css/custom_style.css', __FILE__), false, '1.0.0', 'all');
}
function csys_enqueue_style(){
    wp_enqueue_script('custom_jquery');
    wp_enqueue_style( 'new_style' );
}




/**
 * @TODO make all the pages added recently to be auto generated when the plugin is activated
 * Quetions: saan makita ang database table sa sensor saving
 * @TODO change naming convention for pages and title so that it will look uniform
 */
