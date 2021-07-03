<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['word'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $word = $_GET['word'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $word = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($word)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->canMakeWord($word);
    response(200, "canMakeWord() Processed", $string, $language, $result, $word);
} else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} else if (empty($word)) {
    invalidResponse("Invalid or Empty Word");
} else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $word)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "word" => $word, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
