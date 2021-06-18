<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['index']) && isset($_GET['char'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $index = $_GET['index'];
    $char = $_GET['char'];
}

if (!empty($string) && !empty($language) && !empty($index) && !empty($char)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->addCharacterAt($index, $char);
    response(200, "addCharacterAt() Processed", $string, $language, $result, $index, $char);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL, NULL);
} else if (empty($index) || empty($char)) {
    response(400, "Invalid or Empty Index or Char", NULL, NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $index, $char)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "index" => $index, "char" => $char, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
?>



