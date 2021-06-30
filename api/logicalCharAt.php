<?php

require("../word_processor.php");

if (isset($_GET['index']) && isset($_GET['language']) && isset($_GET['string'])) {
    $string = $_GET['string'];
    $index = $_GET['index'];
    $language = $_GET['language'];
}

if (!empty($index) && !empty($language) && !empty($string)) {
    $processor = new wordProcessor($string, $language);
    $logicalCharacters = $processor->parseToLogicalCharacters($string);
    $logicalCharacters-> $processor->$logical_chars;
    $logicalCharAtIndex = $processor->logicalCharAt($index);
    response(200, "Logical Char at index", $string, $index, $language, $logicalCharAtIndex);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
}
else if(isset($language) && isset($string) && isset($index)) {
    response(400, "Invalid or Empty index", NULL, NULL, NULL, NULL);
}
else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
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