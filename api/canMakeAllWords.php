<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['words'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $words = $_GET['words'];
}

if (!empty($string) && !empty($language) && !empty($words)) {
    $processor = new wordProcessor($string, $language);
    $wordArray = explode(",", $words);
    $result = $processor->canMakeAllWords($wordArray);
    response(200, "canMakeAllWords() Processed", $string, $language, $result, $words);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
} else if (empty($words)) {
    response(400, "Invalid or Empty Words", NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
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

