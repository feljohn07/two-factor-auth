<?php
include('connection.php');
require('sendEmail.php');

$json_data = $_GET["data"];
$data_obj = json_decode($json_data);

switch($data_obj->action){

    case 'auth_user_credential':

        $query_result = pg_query($conn, "select * from users_info_sec where email = '" . $data_obj->email_login . "' AND pass = '". $data_obj->password_login ."';");

        if (!$query_result) {
            $login_reply = array("status" => "failed", "reply" => 'An error occurred');
            echo json_encode($login_reply);
            exit;

        }else if(pg_num_rows($query_result) > 0){

            $login_reply = array("status" => "success", "email" => $data_obj->email_login, "password" => $data_obj->password_login);
            echo json_encode($login_reply);

        }else{
            
            $login_reply = array("status" => "failed", "reply" => 'Email or Password is Incorrect!');
            echo json_encode($login_reply);

        }
        break;

    case 'request_code':

        // SEND OTP USER EMAIL, USED FOR SECOND AUTHENTICATION
        $email = $data_obj->email;
        $subject = 'YOUR LOGIN ONE-TIME-PASSWORD';
        $authentication_code = random_int(1000, 9999);

        // sendEmail() returns 1 if the email successfully sent to the user email address.
        if(sendEmail($email, $subject, $authentication_code)){

            
            // Return date/time info of a timestamp; then format the output
            $d = getdate(date("U"));
            $dateTime = "$d[mon]-$d[mday]-$d[year] $d[hours]:$d[minutes]:$d[seconds]";

            $query_result = pg_query($conn, 
            "UPDATE users_info_sec SET auth_code = ".$authentication_code.", last_code_request = '".$dateTime."' Where email = '".$email."'");

            if (!$query_result) {
                // reply (saving authentication code status (failed))
                echo json_encode(array("status" => "failed", "reply" => "an error occured while querieng." . $dateTime));
                exit;

            }else{
                // reply (saving authentication code status (success))
                echo json_encode(array("status" => "sucess", "reply" => "new authentication created!."));
            }

        }else{
            // reply (sending authentication code status (failed))
            echo json_encode(array("status" => "failed", "reply" => "an error occured while sending OTP to your email. Please wait a moment and try again"));
        }

        break;

    case 'verify_code':

        $query_result = pg_query($conn, "SELECT auth_code from users_info_sec where email = '" . $data_obj->email . "'");

        if (!$query_result) {
            echo 'An error occurred';
            exit;
        }else{
            while($row = pg_fetch_assoc($query_result)){
                if($row['auth_code'] == $data_obj->auth_code){
                    echo  json_encode(array("status" => 'true'));
                }else{
                    echo  json_encode(array("status" => 'false'));
                }
            } 
        }

        break;

    default:
        echo 'action not found';
        break;

}

?>