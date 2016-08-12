<?php


//echo "ayuasdasd asd asd asds";
////////////////////////////////////////////////////
/////////////POST SUBMISSION////////////////////////
////////////////////////////////////////////////////
if(isset($_GET['app_eui']) and count($_GET) == 1) {
    //echo "add sensor<br>";
    add_action('wp_head','application_details_get');
    add_action('wp_head','csys_get_nodes_by_user');
    add_action('wp_head','csys_get_data_delivery');
}

//////////////////////////////////////////////////
/////// Add Action ///////////////////////////////
//////////////////////////////////////////////////



//////////////////////////////////////////////////
////////////Functions called by the actions///////
//////////////////////////////////////////////////
function application_details_get() {
    $application_details = array();
    $app_eui = $_GET['app_eui'];
    $user_id = $_SESSION['console_sys_user'];
    $gateway_api_instance = new Swagger\Client\Api\ApplicationsApi();
    try {
        $application_details = $gateway_api_instance->getApplicationsByUserIdAndAppId_0($user_id, $app_eui);
        $_SESSION['application_details'] = $application_details;
        //print_r($application_details);
    } catch ( exception $e) {
        echo "error found " .  __FILE__.  $e->getMessage();
    }
}

function csys_get_nodes_by_user() {


    $user_id = $_SESSION['console_sys_user'];
    $node_api_instance = new Swagger\Client\Api\NodesApi();

    try {
        $csys_users_nodes = $node_api_instance->getNodesByUserId($user_id);

       // print "<pre><h1>  Users node </h1>";

       //  print_r($csys_users_nodes);
       // print "</pre>";

        $_SESSION['csys_users_nodes'] = $csys_users_nodes;

    } catch ( exception $e) {

        echo "<br> error " . $e->getMessage();

    }
}


function csys_get_data_delivery() {

    $user_id = $_SESSION['console_sys_user'];
    $customer_api_instance = new Swagger\Client\Api\CustomersApi();


    $costumers = [];
    try {
        $costumers = $customer_api_instance->getCustomersByUserId($user_id);

    } catch ( exception $e) {
        print " error " . $e->getMessage();
    }

    $customer_id = $costumers[0]['customer_uid'];



    //        print "<pre> <h1>Customer </h1>";
    //        print_r( $costumers );
    //        print "</pre>";

    try {
        $request_api_instance = new Swagger\Client\Api\RequestsApi();
        $request  = $request_api_instance->getRequestsByCustId($customer_id);
    } catch ( exception $e) {
        print " error "  . $e->getMessage();
    }


    //        print "<pre> <H1> Request </H1>";
    //        print_r( $request );
    //        print "</pre>";




}


