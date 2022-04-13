<?php
 
require("../word_processor.php");
 
if(isset($_GET['string'])) {
    $string = $_GET['string'];
   
}
else if(isset($_GET['input1'])) {
    $string = $_GET['input1'];
}
 
if(!empty($string)) {
    $processor = new wordProcessor($string, '');
    $codePoints = $processor->getLangForString();
   
    response(200, "Find Language Calculated", $string, $codePoints);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
}
 
else {
    invalidResponse("Invalid Request");
}
 
function invalidResponse($message) {
    response(400, $message, NULL,  NULL);
}
 
function response($responseCode, $message, $string, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');
 
    // JSON Header
    header('Content-type:application/json;charset=utf-8');
 
    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string,"data" => $data);
    $json = json_encode($response);
    echo $json;
}
 
?>
