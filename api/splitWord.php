<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['col'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $col = $_GET['col'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $col = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($col)) {
    $processor = new wordProcessor($string, $language);
    $split_word = $processor->splitWord($col);
    response(200, "Word Split", $string, $col, $language, $split_word);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
}
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
}
else if  (isset($language) && isset($string) && empty($col)) {
    invalidResponse("Invalid Column Number");
}  
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $col, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "Columns" =>$col, "language" => $language, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>