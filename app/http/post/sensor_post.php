<?php
////////////////////////////////////////////////////
/////////////POST SUBMISSION////////////////////////
////////////////////////////////////////////////////
if(isset($_POST['csys_add_sensor'])) {
    //echo "add ";
    $_SESSION['csys_add_sensor']      = $_POST['csys_add_sensor'];
    $_SESSION['csys_device_eui']      = $_POST['csys_device_eui'];
    $_SESSION['csys_sensor_selected'] = $_POST['csys_sensor_selected'];
}
//else {
//    echo "not add";
//}


//////////////////////////////////////////////////
/////// Add Action ///////////////////////////////
//////////////////////////////////////////////////
if(isset($_SESSION['csys_add_sensor'])) {
    //echo "submitted";
    add_action('wp_head','sertone_add_sensor');
}
//else {
//    echo "not submiteed";
//}


//////////////////////////////////////////////////
////////////Functions called by the actions///////
//////////////////////////////////////////////////
function sertone_add_sensor() {


    /**
     *
     *
     * Add filter that will not allow string
     * when click otaa or abp button when posting then script should identify if how many exactly are the digit required
     * able to save the abp and otaa Divice EUI
     * Specify the error for abp and otaa
     *
     *
     * Questions:
     *
     * How to code disable and enable
     * What is the use of default application field
     */

    $user_id  = $_SESSION['console_sys_user'];
    $dev_eui  = $_SESSION['csys_device_eui'];

    $api_instance_node  = new \Swagger\Client\Api\NodesApi();



//    $api_instance_node->regOtaaNodesByUserIdAndSensorId(); e




    try {
        if(strlen($dev_eui) == 8) {
            $api_instance_node->regAbpNodesByUserIdAndSensorId($user_id, $dev_eui);
            $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-success" role="alert">Successfully added new device abp</div>';
        } else if (strlen($dev_eui) == 16){
            $api_instance_node->regOtaaNodesByUserIdAndSensorId($user_id, $dev_eui);
            $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-success" role="alert">Successfully added new device otaa</div>';
        } else {
            if($_SESSION['csys_sensor_selected'] == 'abp') {
                $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-danger" role="alert">ABP should have exactly 8 digit.</div>';
            } else if($_SESSION['csys_sensor_selected'] == 'otaa') {
                $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-danger" role="alert">OTAA should have exactly 16 digit.</div>';
            } else {
                $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-danger" role="alert">Options are required!</div>';
            }
        }

       // print "Successfully added new device";

    } catch ( exception $e) {

        $_SESSION['response']['sensor']['add_new'] = '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
        //print "Adding new sensor hasb an error: " . $e->getMessage();

    }


    unset($_SESSION['csys_device_eui']);
    unset($_SESSION['csys_sensor_selected']);
    unset($_SESSION['csys_add_sensor']);
}

