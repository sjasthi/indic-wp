<?php
require("../word_processor.php");

if(isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
}
else if(isset($_GET['input1']) && isset($_GET['input2'])) {
    $email = $_GET['input1'];
    $password = $_GET['input2'];
}

if(!empty($email) && !empty($password)) {
    // $processor = new wordProcessor($string, $language);
    // $baseCharacters = $processor->getBaseCharacters();
    $user='root';
    $pass='';
    $db='indic_wp_db';
    $sql= "Select password from users where email='$email';";
    $db= mysqli_connect('localhost',$user,$pass,$db) or die(mysqli_connect_error());
    //$db= new mysqli('localhost',$user,$pass,$db) or die ("Unable to Connect");
    // $result= $db->query($sql)
    $result= mysqli_query($db,$sql);
    if(mysqli_num_rows($result)){
        $myresult=mysqli_fetch_assoc($result);
        if(password_verify($password,$myresult['password'])){
                response(200, "Password Authorized.", $email, $password, true);
                
            }
        else {
            response(200, "Password Authorized.", $email, $password, false);
           
        }
    }
    else{
        response(200, "password Authorized", $email,$password, false);
    }
    mysqli_close($db);
    
}
else if (isset($email) && empty($email)) {
    invalidResponse("Invalid or Empty email");
}
else if (isset($password) && empty($password)) {
    invalidResponse("Invalid or Empty password");

}
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL);
}

function response($responseCode, $message, $email, $password, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "email" => $email, "password" => $password, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>