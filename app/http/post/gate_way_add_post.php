<?php

// ================================================================Creating gateway====================================================


if (isset($_POST['Third-submit-form'])) {
    $_SESSION['third_submit_form'] = $_POST['Third-submit-form'];
    $_SESSION['gateway_eui']       = $_POST['eui'];
    $_SESSION['city']              = $_POST['city2'];
    $_SESSION['latitude']          = $_POST['cityLat'];
    $_SESSION['longitude']         = $_POST['cityLng'];
    $_SESSION['country']           = $_POST['country'];

}

if(!empty($_SESSION['third_submit_form'])) {
    add_action('wp_head','csys_creategateway');
}

function csys_creategateway() {


    //echo " adding gateway ";

    $user_id 	 = $_SESSION['console_sys_user'];
    $gateway_eui = $_SESSION['gateway_eui'];
    $city        = $_SESSION['city'];
    $latitude    = $_SESSION['latitude'];
    $longitude   = $_SESSION['longitude'];
    $country     = $_SESSION['country'];

    //print "add new gateway now";
    if (!empty($gateway_eui) || !empty($city)|| !empty($longitude)|| !empty($latitude) || $latitude =="0.000000" ) {

        $bodys= array(
            "owner"=> $user_id,
            "gateway_eui"=> $_SESSION['serton_eui'],
            "longitude"=>$longitude ,
            "latitude"=> $latitude,
            "city"=> $city,
            "address"=> $country,
            "gateway_title"=> $gateway_eui
        );
        $body = json_encode($bodys);
        //        echo "<pre>";
        //        print_r($body);
        //        echo "</pre>";

        $gateway_api_instance = new Swagger\Client\Api\GatewaysApi();

        try {


            $gateway_api_instance->createGateways($body, $user_id);
            $confirm = SITEURL."/sertone-add-gateway?confirm";
            header("location: $confirm");
            $_SESSION['response']['add_gate_way']['success'] = '<div class="alert alert-success" role="alert"><h4> Congratulations! Your gateway is now activated and you can proceed with connecting your sensors! </h4></div>';
        } catch (Exception $e) {
            // $confirm = SITEURL."/sertone-add-gateway?confirm";
            //  header("location: $confirm");
            $_SESSION['response']['add_gate_way']['error'] = '<div class="alert alert-danger" role="alert"> ' . $e->getMessage()  . '</div>';
        }


    } else {
        $_SESSION['response']['add_gate_way']['error'] = '<div class="alert alert-danger" role="alert">Error occur, please fill all the fields</div>';
        //echo "Something Error";
    }


    unset($_SESSION['third_submit_form']);
    unset($_SESSION['gateway_eui']);
    unset($_SESSION['city']);
    unset($_SESSION['latitude']);
    unset($_SESSION['longitude']);
    unset($_SESSION['country']);
}



