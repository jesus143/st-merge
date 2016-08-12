<?php

////////////////////////////////////////////////////////////////////////
// Definitions
////////////////////////////////////////////////////////////////////////
if(!defined('THEME')) define('THEME', 'sertone');
define('PREFIX', THEME.'_');
define('PREMETA', '_'.THEME.'_');
define('THEMENAME', 'global');
define('SITEURL', get_bloginfo('url'));
define('THEMEURL', SERTONE_PLUGIN_URL.'templates'); // Or TEMPLATEPATH (UNIX)
define('IMG', THEMEURL.'/img');
define('JS', THEMEURL.'/js');
define('CSS', THEMEURL.'/css');
define('BOOT', THEMEURL.'/bootstrap'); 
define('INC', THEMEURL.'/inc'); 
////////////////////////////////////////////////////////////////////////	 
// Includes
////////////////////////////////////////////////////////////////////////
require_once("inc/include-widgets.php");
require_once("inc/include-customposts.php");
require_once("inc/include-breadcrumbs.php");
require_once("inc/include-comments.php");	
require_once("inc/include-metabox.php");
require_once("inc/include-functions.php");
require_once("inc/include-settings.php");
require_once("inc/include-hooks.php");
// require_once("inc/include-login.php");
require_once("inc/include-swagger-func.php");
require_once("inc/SwaggerClient-php/autoload.php");


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

//==============================API=================================
//==================================================== Login API function==========================================
add_action('wp_head','console_login');
function console_login(){

	if (isset($_POST['submit'])) {

		//echo "log me in!";

		$username = $_POST['username'];
		$password = $_POST['password'];

		//		$username = 'edwin.d.vinas@gmail.com';
		//		$password = '1234567890';

		do_console_login($username, $password);
			
	}
}
//================================================cheking the session=========================================
add_action('plugins_loaded','check_session');

function check_session(){
	
	$_settings = dmlogin_get_settings();

	if ( is_user_logged_in() ) {

			if(isset($_SESSION['console_sys_token'])){

				$api_instance_application = new Swagger\Client\Api\ApplicationsApi();
				
				$auth_key = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', $_SESSION['console_sys_token']);
				$var_array = getProtectedValue($auth_key,'apiKeys');


				//print_r( $var_array );

				if ($var_array['Authorization']=="") {
					$dashboardurl = SITEURL."/sertone-add-dashboard?logout";
					// wp_redirect($dashboardurl);
				}

				//		Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('ClientID', 'appConsole1234567890');
				Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('ClientID', 'ozera8sv1gui3bfmgbdjpuam5y1b11ps');
				
			}

			$dashboardurl = SITEURL."/sertone-add-dashboard/";

			if (!is_page('sertone-add-registration')) {

				if(is_page('sertone-log-in')){
					if(isset($_SESSION['console_sys_token'])) {
						wp_redirect($dashboardurl);
						exit;
					}
				}else{
					if(!isset($_SESSION['console_sys_token'])) {
						$user = wp_get_current_user();
						do_console_login($user->user_email, getUserPlainPass($user->ID));
						wp_redirect( $dashboardurl );
					}
				}

			}

	}
	else{
		wp_redirect( SITEURL.'/'. slugify($_settings->shortcodes->login) );
	}
}


function do_console_login($username, $password){

		$api_instance_login = new Swagger\Client\Api\UsersApi();
		try {
			$login = $api_instance_login->loginUsers($username, $password);

			$newarray = getProtectedValue($login,'container');
			$token = str_replace('"', "", $newarray['token']);
			$_SESSION['console_sys_token'] = $token;
			$_SESSION['console_sys_user'] = $username;
			setcookie('token', $token, time() + 7200);
			check_session();

		}catch (Exception $e) {
			echo "error = " . $e->getMessage();
			?>
			<style type="text/css">
				.alerta{
					display: block !important;
				}
			</style>
			<?php
			return 'Exception when calling UsersApi->loginUsers: '.$e->getMessage(); PHP_EOL;
		}

}


// ================================================================= session logout ==========================================
add_action('init','unset_session');
function unset_session(){
	if(isset($_GET['logout'])){
		session_start();
		$dashboardurls = SITEURL.'/sertone-log-in';
		setcookie("token", "", -1);
		unset($_SESSION['console_sys_token']); 
		unset($_SESSION['console_sys_user']);
		session_destroy();
		wp_redirect(  $dashboardurls );
	}
}


if (empty($_SESSION['console_sys_token'])) {
	unset($_SESSION['console_sys_token']);
	unset($_SESSION['console_sys_user']);
}
else{
	header('location:'.$dashboardurls );
}


// ============================ ADD APPLICATION ================================ //


/*
  add_action('wp_head','addapplication');
function addapplication(){
	if (isset($_POST['add_application'])) {
		$app_name = $_POST['applcation_name'];
		$bodys =  array(
			"name" => $app_name,
			"owner" => $_SESSION['console_sys_user']
		);
		$user_id = $_SESSION['console_sys_user'];
		$body = json_encode($bodys);
		$api_instance_create_application = new Swagger\Client\Api\ApplicationsApi();
			try {
			    $api_instance_create_application->createApplications($body, $user_id);
			 	return $return_add_app = "Application has been created";

			} catch (Exception $e) {
			    return  $return_add_app = "Exception when calling ApplicationsApi->createApplications:". $e->getMessage();
			}
		}
	}*/

// ================================================================Creating gateway====================================================

add_action('wp_head','creategateway');
function creategateway(){


	if (isset($_POST['Third-submit-form'])) {
		$user_id = $_SESSION['console_sys_user'];
		$gateway_eui = $_POST['eui'];
		$city = $_POST['city2'];	
		$latitude = $_POST['cityLat'];	
		$longitude = $_POST['cityLng'];		
		$country = $_POST['country'];	


if (!empty($gateway_eui) || !empty($city)|| !empty($longitude)|| !empty($latitude) || $latitude =="0.000000" ) {
			$bodys= array(
		  		"owner"=> $user_id,
		  		"gateway_eui"=> $_SESSION['serton_eui'],
		  		"longitude"=>$longitude,
		  		"latitude"=> $latitude,
		  		"city"=> $city,
		 		"address"=> $country,
		 		"gateway_title"=> $gateway_eui		 	
			);


			$body = json_encode($bodys);
					
			$gateway_api_instance = new Swagger\Client\Api\GatewaysApi();
			try {
			$result = $gateway_api_instance->createGateways($body, $user_id);
				$confirm = SITEURL."/sertone-add-gateway?confirm";
				header("location: $confirm");
			} catch (Exception $e) {
				echo 'Exception when calling GatewaysApi->createGateways: ', $e->getMessage(), PHP_EOL;
			}
		}
		else{
			echo "Something Error";
		}
	
	}

}


function getwayCurrentStatus(){

	$gwuser = $_SESSION['serton_eui']; 
	$api_instance_gateways_status = new Swagger\Client\Api\GatewaysApi();

	try {
		$qry = $api_instance_gateways_status->getGatewayStatus($gwuser);
		$status = getProtectedValue($qry,'container');
		$status_name = $status['gateway_activity'];
		
		if ($status_name!="" AND $status_name == 'Active' ) {

			return $return_gateway = $status_name;
		}
		else{
			return "Error";
		}
	} catch (Exception $e) {

			return $return_gateway = "Error querying status getway";
	}
}

// getway status 
if (isset($_POST['check_status'])) {
	$_SESSION['serton_eui'] = $_POST['eui'];
}
// echo $_SESSION['console_sys_token'];














//if(isset($_POST['application_delete'])) {
//	echo "delete application clicked<br>";
//	print_r($_POST);
//    $api_instance_application = new Swagger\Client\Api\ApplicationsApi();
//    $result_application = $api_instance_application->getApplicationsByUserId( 'edwin.d.vinas@gmail.com' );
//}
//






//require yong post
$paths = [ 'app/http/post', 'app/http/get', 'view' ];
foreach($paths as $key => $path):
	$files = glob(plugin_dir_path(__FILE__) . $path .'/*.php');
	foreach ($files as $file) {
		require($file);
	}
endforeach;
//Application Default










