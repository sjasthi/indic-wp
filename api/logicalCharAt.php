<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['index'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $index = $_GET['index'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $index = $_GET['input3'];
}

if (!empty($index) && !empty($language) && !empty($string)) {
    $processor = new wordProcessor($string, $language);
    // $logicalCharacters = $processor->parseToLogicalCharacters($string);
    // $logicalCharacters-> $processor->$logical_chars;
    $logicalCharAtIndex = $processor->logicalCharAt($index);
    response(200, "Logical Char at index", $string, $index, $language, $logicalCharAtIndex);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
}
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
}
else if(isset($language) && isset($string) && isset($index)) {
    invalidResponse("Invalid or Empty index");
}
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $index, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "index" => $index, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>