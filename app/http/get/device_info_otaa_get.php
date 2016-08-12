<?php
////////////////////////////////////////////////////////
////////////////////////Declareation////////////////////
////////////////////////////////////////////////////////
if(!empty($_GET['dev_eui']) and !empty($_GET['reg_type']) and  $_GET['reg_type'] == 'OTAA') {

    //echo "<br> otaa page details ";
    $_SESSION['dev_eui'] = $_GET['dev_eui'];

    $_SESSION['reg_type'] = $_GET['reg_type'];

    //echo " session " . $_SESSION['dev_eui'];
}

////////////////////////////////////////////////////////
////////////////////////Actions////////////////////
////////////////////////////////////////////////////////
if(!empty($_SESSION['dev_eui']) and $_SESSION['reg_type'] == 'OTAA') {
    add_action("wp_head", "csys_get_otaa_details");
}

////////////////////////////////////////////////////////
////////////////////////add actions////////////////////
////////////////////////////////////////////////////////
function csys_get_otaa_details() {

    $user_id = $_SESSION['console_sys_user'];
    $dev_eui = $_SESSION['dev_eui'];
    $node_api_instance = new Swagger\Client\Api\NodesApi();

    try {

        $_SESSION['device']['otaa']['details'] = $node_api_instance->getNodesByUserIdAndSensorId($user_id, $dev_eui);



        // print "<pre>  <h4> Result from function getNodesByUserIdAndSensorId($user_id, $dev_eui) </h4> ";
        // print_r($_SESSION['device']['otaa']['details']);
        // print "</pre>";

    } catch ( exception $e) {

        echo "<br> error " . $e->getMessage();
    }

    unset($_SESSION['dev_eui']);
    unset($_SESSION['reg_type']);
}



