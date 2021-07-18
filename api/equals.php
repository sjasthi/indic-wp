<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['secondString'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $secondString = $_GET['secondString'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $secondString = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($secondString)) {
    $processor = new wordProcessor($string, $language);
    $equals = $processor->equals($secondString);
    response(200, "String Equals", $string, $secondString, $language, $equals);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
}
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
}
else if (isset($language) && isset($string) && empty($secondString)) {
    invalidResponse("Invalid Column Number");
} 
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $secondString, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "second string" => $secondString, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>
