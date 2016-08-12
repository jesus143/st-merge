<?php
//error_reporting(1);

//echo "<pre>";
//print_r($_POST);
//
//print_r($_SESSION);
//
//echo "</pre>";

//error_reporting(0);


// set up url
//$_SESSION['url']['logout'] =  site_url() . '?' . 'logout';

$_SESSION['url']['add_application'] =  site_url() . '/' . 'sertone-add-application';

$_SESSION['url']['sertone_add_sensor'] = site_url() . '/' . 'sertone-add-sensor';

$_SESSION['url']['application_detail'] =  site_url() . '/' . 'sertone-application-detail';

$_SESSION['url']['device_info_abp'] =  site_url() . '/' . 'sertone-device-info-abp';

$_SESSION['url']['device_info_otaa'] =  site_url() . '/' . 'sertone-device-info-otaa';

$_SESSION['url']['register'] =  site_url() . '/' . 'sertone-add-registration';







$_SESSION['url']['slug']['device_info_abp'] =  basename($_SESSION['url']['device_info_abp']); //'sertone-device-info-abp';

$_SESSION['url']['slug']['device_info_otaa'] = basename($_SESSION['url']['device_info_otaa']);  'sertone-device-info-otaa';

$_SESSION['url']['slug']['sertone_add_sensor'] = basename($_SESSION['url']['sertone_add_sensor']); //'sertone-add-sensor';



$_SESSION['url']['logout'] = site_url() . '/sertone-add-dashboard' . '?logout=1';

$_SESSION['url']['logiin'] =  site_url() . '/' . 'sertone-log-in';

$_SESSION['url']['dashboard'] = site_url() . '/sertone-add-dashboard';

//$link_dashboard = site_url() . '/sertone-add-dashboard';
//$link_main_domain = site_url() . '?logout';
// setup host for api
// focalpoint.sertone.net:8090
// production server: focalpoint.sertone.net:8090


define('sertone_host_name', 'http://focalpoint-internal.sertone.net');

define('sertone_host_port', '8090');

define('sertone_host_key', 'eemzfihz7caaubut7ujymk3lpfwctam6');

define('sertone_host_full_path', sertone_host_name . ':' . sertone_host_port . '/' . sertone_host_key);


//echo sertone_host_full_path;


////variables

$_SESSION['response']['message'] = '';

$_SESSION['response']['sensor']['add_new'] = '';


//// application details


$_SESSION['application_details'] = '';


$_SESSION['csys_users_nodes'] = '';



$_SESSION['user']['customer'] = [];


$_SESSION['response']['user']['registration']  = '';

$_SESSION['response']['add_user']['status'] = false;

$_SESSION['response']['add_user']['email_confirm']['message']  = (!empty($_SESSION['response']['add_user']['email_confirm']['message'])) ? $_SESSION['response']['add_user']['email_confirm']['message'] : null;



$_SESSION['device']['abp']['details'] = '';
$_SESSION['device']['otaa']['details'] = '';




