<?php
session_start();

//require_once("../inc/include-widgets.php");
//require_once("../inc/include-customposts.php");
//require_once("../inc/include-breadcrumbs.php");
//require_once("../inc/include-comments.php");
//require_once("../inc/include-metabox.php");
//require_once("../inc/include-functions.php");
//require_once("../inc/include-settings.php");
//require_once("../inc/include-hooks.php");
//require_once("../inc/include-swagger-func.php");
//require_once("../inc/SwaggerClient-php/autoload.php");

require_once('../helper.php');


$data[] = array('volume' => 1, 'edition' => 'testin 3', 'nice 1', 'name'=>'ancis' );
$data[] = array('volume' => 2, 'edition' => 'testin 2', 'nice 2', 'name'=>'bebe');
$data[] = array('volume' => 3, 'edition' => 'testin 1', 'nice 3', 'name'=>'caini');

// Obtain a list of columns
foreach ($data as $key => $row) {
  $volume[$key]  = $row['volume'];
  $edition[$key] = $row['edition'];
  $name[$key]    = $row['name'];
}

// Sort the data with volume descending, edition ascending
// Add $data as the last parameter, to sort by the common key
array_multisort($edition, SORT_ASC, $data);

print_r($data);




