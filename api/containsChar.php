<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['contains'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $contains = $_GET['contains'];
}

if (!empty($string) && !empty($language) && !empty($contains)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->containsChar($contains);
    response(200, "String Reversed", $string, $language, $result, $contains);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
} else if (empty($contains)) {
    response(400, "Invalid or Empty End", NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
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
?>