<?php

if (isset($_POST['create_user'])) {
    $_SESSION['username'] 		  = $_POST['username'];
    $_SESSION['password'] 		  = $_POST['password'];
    $_SESSION['confirm_password'] = $_POST['confirm_password'];
    $_SESSION['create_user']      = $_POST['create_user'];
}

if(!empty($_SESSION['create_user'])) {
    add_action('wp_head','console_create_user');
}

function console_create_user() {

    if (!empty($_SESSION['create_user'])) {

        $_SESSION['response']['add_user']['status']  = false;


        $api_instance_createuser = new Swagger\Client\Api\UsersApi();

        // $username = $_POST['username'];
        // $password = $_POST['password'];
        // $password_confirm = $_POST['confirm_password'];

        $username	 	  = $_SESSION['username'];
        $password 		  = $_SESSION['password'];
        $confirm_password = $_SESSION['confirm_password'];

        //echo "user " . $username;
        // $isUserExist = false;
        try {
            $isExistUser = $api_instance_createuser->getUsersByName($username);
            //aq zibnecho "<br>exist ang user";
            $isUserExist = true;

        } catch (Exception $e) {

            //echo "<br>not exist ang user";
            $isUserExist = false;

        }



        if($confirm_password != $password )
        {
            //echo "<h3 class='text-center'> password not equal </h3>";
            $_SESSION['response']['add_user']['registration'] = '<div class="alert alert-danger" role="alert">Password not equal</div>';

        }
        else if (empty($confirm_password) || empty($password))
        {
            $_SESSION['response']['add_user']['registration'] = '<div class="alert alert-danger" role="alert">Password should not empty</div>';
            //echo "<h3 class='text-center'> </h3>";
        }
        else if ($isUserExist == TRUE)
        {
            //echo "<h3 class='text-center' style='color:red' > Inputed user $username exist </h3>";
            $_SESSION['response']['add_user']['registration'] = '<div class="alert alert-danger" role="alert">Inputed user ' . $username . '  exist</div>';
        }
        else
        {

            $bodys = array(
                "email" => $username,
                "password" => $password
            );

            $body = json_encode($bodys);

            // echo "url json encoded <br> <pre>";
            // print_r($body);
            //echo "</pre>";
            try {
                 $api_instance_createuser->createUsers($body);

                //echo "<h3 class='text-center' style='color:green' >Successfully created with username $username</h3>";
                $_SESSION['response']['add_user']['email_confirm']['message'] = '<div class="alert alert-warning" role="alert">Please make sure to check your email ' . $username . ' and confirm to be able to use the site. Thank you!</div>';
                $_SESSION['response']['add_user']['registration'] = '<div class="alert alert-success" role="alert">Successfully created with username ' . $username . '</div>';
                $_SESSION['response']['add_user']['status']  = true;

                // exit;
            } catch (Exception $e) {
                $_SESSION['response']['user']['registration'] = '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';

                //echo 'Exception when calling createUsers->createUsers: ', $e->getMessage(), PHP_EOL;
            }
        }

        //        echo "<pre>";
        //        print_r($_SESSION['response']);
        //        echo "</pre>";
        //        //exit;

        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['confirm_password']);
        unset($_SESSION['create_user']);
    } else {
        // echo "<h3> Not Submitted</h3>";
    }
}