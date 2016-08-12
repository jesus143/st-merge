<?php
////////////////////////////////////////////////////
/////////////POST SUBMISSION////////////////////////
////////////////////////////////////////////////////
if(isset($_POST['application_delete'])) {
    echo "delete application clicked<br>";
    $_SESSION['selected_application'] = $_POST['selected_application'];
    $_SESSION['application_delete'] = $_POST['application_delete'];
}
else if(isset($_POST['application_set_default'])) {
    //echo "default now clicked<br>";
    $_SESSION['selected_application'] = $_POST['selected_application'];
    $_SESSION['application_set_default'] = $_POST['application_set_default'];
}
else if (isset($_POST['add_application'])) {
   $_SESSION['add_application'] = $_POST['add_application'];
}

//////////////////////////////////////////////////
/////// Add Action ///////////////////////////////
//////////////////////////////////////////////////
if(!empty($_SESSION['application_delete'] )) {
    add_action('wp_head','sertone_application_delete');
}
if(!empty($_SESSION['application_set_default'])) {
    add_action('wp_head','sertone_application_set_default');
}
if(!empty($_SESSION['add_application'])) {
    add_action('wp_head','sertone_application_add_new');
}

//////////////////////////////////////////////////
////////////Functions called by the actions///////
//////////////////////////////////////////////////
function sertone_application_delete() {
    $api_instance_application = new Swagger\Client\Api\ApplicationsApi();
    $user_id = $_SESSION['console_sys_user'];
    $app_eui = '';
    foreach($_SESSION['selected_application'] as $key => $eui) {
        $app_eui = $eui;
        try {
            $api_instance_application->deleteApplicationsByUserIdAndAppId(
                $user_id,
                $app_eui
            );
            //echo "successfully deleted application eui " . $app_eui;
            $_SESSION['response']['application']['set_default'] = '<div class="alert alert-success" role="alert">Successfully deleted application  "'. $app_eui . '" </div>';
        } catch (exception $e) {
            //echo "failed to deleted application eui " . $app_eui;
            $_SESSION['response']['application']['set_default'] = '<div class="alert alert-danger" role="alert">Failed to delete application "'. $app_eui . '"</div>';
        }
    }
    unset($_SESSION['application_delete']);
    unset($_SESSION['selected_application']);
}
function sertone_application_set_default() {
    if(count($_SESSION['selected_application']) <> 1) {
        $_SESSION['response']['application']['set_default'] = '<div class="alert alert-danger" role="alert">Please select only 1 application to be able to set a default. </div>';
    } else {
        $user_id = $_SESSION['console_sys_user'];
        $app_eui = $_SESSION['selected_application'][0];
        //echo "<br> user id = " . $user_id;
        //echo "<br> app eui = " . $app_eui;
        $api_instance_application = new Swagger\Client\Api\ApplicationsApi();

        try {
            $api_instance_application->setAsCurrentSelectedApplication($user_id, $app_eui);
            //echo "<br> Successfully updated";
            $_SESSION['response']['application']['set_default'] = '<div class="alert alert-success" role="alert">Successfully set a default application. </div>';
        } catch (exception $e) {
            //echo "<br> Failed to update";
        }
    }


    unset($_SESSION['application_set_default']);
    unset($_SESSION['selected_application']);
}
function sertone_application_add_new(){
    echo "adding new application now";
    $app_name = $_POST['applcation_name'];
    $bodys = array(
        "name" => $app_name,
        "owner" => $_SESSION['console_sys_user']
    );
    $user_id = $_SESSION['console_sys_user'];
    $body = json_encode($bodys);
    // echo "<br> user id " . $user_id;
    // print_r($body);
    //
    $api_instance_create_application = new Swagger\Client\Api\ApplicationsApi();
    //
    try {
        $api_instance_create_application->createApplications($body, $user_id);
        //echo "<br>successfully added";

        $_SESSION['response']['application']['add_new'] = '<div class="alert alert-success" role="alert">Successfully added new application.</div>';

        // return $return_add_app = "Application has been created";
    } catch (Exception $e) {
        // echo "<br>failed to add application";
        $_SESSION['response']['application']['add_new'] = '<div class="alert alert-danger" role="alert">Failed to add new application.</div>';
        // return  $return_add_app = "Exception when calling ApplicationsApi->createApplications:". $e->getMessage();
    }

    unset($_SESSION['add_application']);
}