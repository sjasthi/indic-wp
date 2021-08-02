<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['list'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $list = $_GET['list'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $list = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($list)) {
    $processor = new wordProcessor($string, $language);
    $uniqueIntersectingRank = $processor->getUniqueIntersectingRank(explode(',',$list));
    response(200, "Unique Intersecting Char", $string, $list, $language, $uniqueIntersectingRank);
}
else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} 
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
}
else if  (isset($language) && isset($language) && empty($list)) {
    invalidResponse("Invalid list Number");
}  
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $list, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "List" => $list, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
