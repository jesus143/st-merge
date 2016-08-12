<?php
//==============================API=================================
//==================================================== Login API function==========================================
//add_action('wp_head','console_login');
//
//function console_login() {
//
//    if (isset($_POST['submit'])) {
//
//        echo "log me in !";
//        $username = $_POST['username'];
//        $password = $_POST['password'];
//        // $username = 'edwin.d.vinas@gmail.com';
//        // $password = '1234567890';
//
//        $api_instance_login = new Swagger\Client\Api\UsersApi();
//
//        try {
//            $login = $api_instance_login->loginUsers($username, $password);
//
//            $newarray = getProtectedValue($login,'container');
//            $token = str_replace('"', "", $newarray['token']);
//            $_SESSION['console_sys_token'] = $token;
//            $_SESSION['console_sys_user'] = $username;
//            setcookie('token', $token, time() + 7200);
//            check_session();
//
//        } catch (Exception $e) {
//
//            echo "error = " . $e->getMessage();
//            ?>
<!--            <style type="text/css">-->
<!--                .alerta {-->
<!--                    display: block !important;-->
<!--                }-->
<!--            </style>-->
<!--            --><?php
//            //return 'Exception when calling UsersApi->loginUsers: '.$e->getMessage(); PHP_EOL;
//
//        }
//    }
//
//}