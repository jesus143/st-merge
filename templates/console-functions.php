<?php 
session_start();
////////////////////////////////////////////////////////////////////////	 
// Definitions
////////////////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////////////////	 
// Includes
////////////////////////////////////////////////////////////////////////
require_once( TEMPLATEPATH."/inc/include-widgets.php");
require_once( TEMPLATEPATH."/inc/include-customposts.php");
require_once( TEMPLATEPATH."/inc/include-breadcrumbs.php");
require_once( TEMPLATEPATH."/inc/include-comments.php");	
require_once( TEMPLATEPATH."/inc/include-metabox.php");
require_once( TEMPLATEPATH."/inc/include-functions.php");
require_once( TEMPLATEPATH."/inc/include-settings.php");
require_once( TEMPLATEPATH."/inc/include-hooks.php");
require_once( TEMPLATEPATH."/inc/include-swagger-func.php");
require_once( TEMPLATEPATH."/inc/SwaggerClient-php2/autoload.php");


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
// ==============================  API   =================================


//====================================================   Login API function   ==========================================
add_action('wp_head','console_login');
function console_login(){

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

			$api_instance_login = new Swagger\Client\Api\UsersApi();

			try {

					$login = $api_instance_login->loginUsers($username, $password);
					$newarray = getProtectedValue($login,'container');
					$token = str_replace('"', "", $newarray['token']);
					$_SESSION['token'] = $token;
					$_SESSION['user'] = $username;
 					setcookie('token', $token, time() + 7200);
					check_session();

				}catch (Exception $e) {
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

}







//================================================     cheking the session    =========================================
add_action('wp_head','check_session');
function check_session(){
	if(isset($_SESSION['token'])){
		$api_instance_application = new Swagger\Client\Api\ApplicationsApi();
		
		$auth_key = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', $_SESSION['token']);
		$var_array = getProtectedValue($auth_key,'apiKeys');
		echo $var_array['Authorization'];
		if ($var_array['Authorization']=="") {
			$dashboardurl = SITEURL."/dashboard?logout";
			wp_redirect($dashboardurl);
	 	} 	
	 	Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('ClientID', 'appConsole1234567890');
		
	}

	$dashboardurl = SITEURL."/dashboard/";

	if (!is_page('registration')) {

	if(is_home() OR is_front_page()){
		if(isset($_SESSION['token'])) {
			wp_redirect($dashboardurl);
			exit;
		}
	}else{
		if(!isset($_SESSION['token'])) {
			wp_redirect(home_url());
			exit;
		}
		}
	}
	
}


// ================================================================= session logout ==========================================
add_action('init','unset_session');
function unset_session(){
	if(isset($_GET['logout'])){
		session_start();
		$dashboardurls = SITEURL;
		setcookie("token", "", -1);
		unset($_SESSION['token']); 
		unset($_SESSION['user']); 
		wp_redirect(  $dashboardurls );
	}
}

if (empty($_SESSION['token'])) {
	unset($_SESSION['token']);
	unset($_SESSION['user']);
}
else{
	wp_redirect(  $dashboardurls );
}






// =========================================== createUsers =======================================
add_action('wp_head','console_create_user');
function console_create_user(){

	echo "<br>console create user 2";

	$api_instance_createuser = new Swagger\Client\Api\UsersApi();

		if (isset($_POST['create_user'])) {

			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_confirm = $_POST['confirm_password'];

			if ($password == $password_confirm) {

				try {
					$result = $api_instance_createuser->getUsersByName($username);
					if ($result!="") {
						$bodys =  array(
						  "email"=> $username,
						  "password"=> $password
						);

							$body = json_encode($bodys);
							try {
							    $api_instance_createuser->createUsers($body);
							     echo "<h1 class='text-center'>Succefully created</h1>";
							} catch (Exception $e) {
							    echo 'Exception when calling createUsers->createUsers: ', $e->getMessage(), PHP_EOL;
							}
						//  end of adding the usernae
						}
					else{
						echo "<h1 class='text-center'>User is existed</h1>";
					}

				} catch (Exception $e) {
					echo 'Exception when calling UsersApi->createUsers: ', $e->getMessage(), PHP_EOL;
				}
			}

			// maching password not match
			else{
				echo "<h1 class='text-center'>Password not match</h1>";
			}
		}


}



// ============================ ADD APPLICATION ================================ //
add_action('wp_head','addapplication');

function addapplication(){

	if (isset($_POST['add_application'])) {
		$app_name = $_POST['applcation_name'];

		$bodys =  array(
			"name" => $app_name,
			"owner" => $_SESSION['user']
		);

		$user_id = $_SESSION['user'];

		$body = json_encode($bodys);

		$api_instance_create_application = new Swagger\Client\Api\ApplicationsApi();
		// var_dump($api_instance_create_application);
			try {
			    $api_instance_create_application->createApplications($body, $user_id);
			  	
			  		echo "<center>Inserted successfuly</center>";

			} catch (Exception $e) {
			    echo '<h2>Exception when calling ApplicationsApi->createApplications: ', $e->getMessage(), PHP_EOL ."</h2>";
			   
			}

		}

	}
	




// ================================================================Creating gateway====================================================
	add_action('wp_head','gateway');
	function gateway(){
		if (isset($_POST['submit_gateway'])) {
			$respberry_pi = $_POST['respberry_pi'];
			$Respberry_Pi_B = $_POST['Respberry_Pi_B'];
			$IMST = $_POST['IMST'];
			$USB = $_POST['USB'];
			$city = $_POST['city'];
			$country = $_POST['country'];
			$address = $_POST['address'];
			$zipcode = $_POST['zipcode'];


			$bodys = array(
				"gwEui"    => "string",
				"gwStat"   => "string",
				"longitude"=> "string",
				"latitude" => "string",
				"altitude" => "string"
			);

			


				$api_instance_gateways = new Swagger\Client\Api\GatewaysApi();
				$body = json_encode($bodys);
				$user_id =$_SESSION['user']; // string | The userId whom to create this gateway

				try {
				$api_instance_gateways->createGateways($body, $user_id);
				} catch (Exception $e) {
					echo 'Exception when calling GatewaysApi->createGateways: ', $e->getMessage(), PHP_EOL;
				}


		}
	}




	/**
	* My Extended Class
	 */
	class MyExeption extends Exception
	{
		
		
	}

	$MyExeption = new MyExeption();

?>