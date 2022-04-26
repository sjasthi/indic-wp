<?php
require("../word_processor.php");

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    
}
else if(isset($_GET['input1'])) {
    $email = $_GET['input1'];
}

if(!empty($email)) {
    $user='root';
    $pass='';
    $db='indic_wp_db';
    $sql= "Select * from users where email='$email';";
    try{
    $db= mysqli_connect('localhost',$user,$pass,$db);
    //$db= new mysqli('localhost',$user,$pass,$db) or die ("Unable to Connect");
    // $result= $db->query($sql)
    $result= mysqli_query($db,$sql);
    if(mysqli_num_rows($result)){
        $row=mysqli_fetch_array($result);
        $role=$row["role"];

        response(200, "get Role.", $email, $row["role"]);
    }
    else{
        response(200, "get Role.", $email, "None");
    }

    mysqli_close($db);
}
catch(Exception $e){
    response(200,"getRole",$email,"Cannot connect to database");
}
    // $processor = new wordProcessor($string, $language);
    // $baseCharacters = $processor->getBaseCharacters();

    // response(200, "Base characters processed.", $string, $baseCharacters);
}
else if (isset($email) && empty($email)) {
    invalidResponse("Invalid or Empty Word");
}
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL);
}

function response($responseCode, $message, $string, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "email" => $string, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>