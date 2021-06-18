<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['end'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $end = $_GET['end'];
}

if (!empty($string) && !empty($language) && !empty($end)) {
    $processor = new wordProcessor($string, $language);
    $endingString = $processor->endsWith($end);
    response(200, "endsWith() Processed", $string, $language, $endingString, $end);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
} else if (empty($end)) {
    response(400, "Invalid or Empty End", NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $end)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "end" => $end, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
?>