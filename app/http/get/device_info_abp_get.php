<?php
    ////////////////////////////////////////////////////////
    ////////////////////////Declareation////////////////////
    ////////////////////////////////////////////////////////
    if(!empty($_GET['dev_eui']) and $_GET['reg_type'] == 'ABP') {

        //echo "<br> abp page details ";
        //echo "loaded " . __FILE__;
        $_SESSION['dev_eui'] = $_GET['dev_eui'];
        $_SESSION['reg_type'] = $_GET['reg_type'];
        //echo " session " . $_SESSION['dev_eui'];
    }

    ////////////////////////////////////////////////////////
    ////////////////////////Actions////////////////////
    ////////////////////////////////////////////////////////
if(!empty($_SESSION['dev_eui']) and $_SESSION['reg_type'] == 'ABP') {
        add_action("wp_head", "csys_get_abp_details");
    }

    ////////////////////////////////////////////////////////
    ////////////////////////add actions////////////////////
    ////////////////////////////////////////////////////////
    function csys_get_abp_details() {

        $user_id = $_SESSION['console_sys_user'];
        $dev_eui = $_SESSION['dev_eui'];
        $node_api_instance = new Swagger\Client\Api\NodesApi();

        try {

            $_SESSION['device']['abp']['details'] = $node_api_instance->getNodesByUserIdAndSensorId($user_id, $dev_eui);

                    // print "<pre> <h4> Result from function getNodesByUserIdAndSensorId($user_id, $dev_eui) </h4>";
                    // print_r($_SESSION['device']['abp']['details']);
                    // print "</pre>";

        } catch ( exception $e) {

            echo "<br> Error "  . $e->getMessage();
        }

        unset($_SESSION['dev_eui']);
        unset($_SESSION['reg_type']);
    }



