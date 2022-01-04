<?php
include('connection.php');

$data = $_GET['data'];
$data_obj = json_decode($data);

switch($data_obj->action){

    //Checks if the email is already exist.
    case 'verify_email_for_sign_up':
        $query = "Select email from users where email = ". "'".$data_obj->email."'";
        
        $query_result = pg_query($conn, $query);
        if (!$query_result) {
          echo "An error occurred.\n";
          exit;
        
        }elseif(!filter_var($data_obj->email, FILTER_VALIDATE_EMAIL)){
          echo json_encode(array("status" => "failed", "reply" => "Invalid email format."));
        
        }elseif(pg_num_rows($query_result) > 0){
          echo json_encode(array("status" => "failed", "reply" => "Email Already In Used! Please Use other Email Address."));

        }else{
          echo json_encode(array("status" => "success", "reply" => "Email Not Used, you may continue for signing up."));
          
        }
        break;
    
    //Insert new user to the database.
    case 'insert_user':

        // Return date/time info of a timestamp; then format the output
        $d = getdate(date("U"));
        $dateTime = "$d[mon]-$d[mday]-$d[year] $d[hours]:$d[minutes]:$d[seconds]";

        $query = "Insert Into users(email, pass, name, gender, birth_date, user_created)
        values('". $data_obj->email ."', '".$data_obj->password."', '".$data_obj->fullname."', '".$data_obj->gender."', '".$data_obj->birthdate."', '".$dateTime."');";
        
        $result = pg_query($conn, $query);
        if (!$result) {
          echo "An error occurred.\n";
          exit;
        }else{
            echo "User Created!";
        }
        break;
    
}


?>