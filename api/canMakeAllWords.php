<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['words'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $words = $_GET['words'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $words = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($words)) {
    $processor = new wordProcessor($string, $language);
    $wordArray = explode(",", $words);
    $result = $processor->canMakeAllWords($wordArray);
    response(200, "canMakeAllWords() Processed", $string, $language, $result, $words);
} else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} else if (empty($words)) {
    invalidResponse("Invalid or Empty Words");
} else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $words)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "words" => $words, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
?>

