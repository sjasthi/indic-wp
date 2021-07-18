<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['contains'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $contains = $_GET['contains'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $contains = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($contains)) {
    $processor = new wordProcessor($string, $language);
    $array = explode(",",$contains);
    $result = $processor->containsAllLogicalChars($array);
    response(200, "containsAllLogicalChars() Processed", $string, $language, $result, $contains);
} else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} else if (empty($contains)) {
    invalidResponse("Invalid or Empty Contains");
} else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $contains)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "contains" => $contains, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
