<?php 

require("../word_processor.php");

if(isset($_GET['string']) && isset($_GET['language'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
}
else if(isset($_GET['input1']) && isset($_GET['input2'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
}

if(!empty($string) && !empty($language)) {
    $processor = new wordProcessor($string, $language);
    $logicalChars = $processor->getLogicalChars2();

    response(200, "Logical Chars 2 Calculated", $string, $language, $logicalChars);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
}
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} 
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>
