<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['char'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $char = $_GET['char'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $char = $_GET['input3'];
}

if (!empty($string) && !empty($language) && !empty($char)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->indexOf($char);
    response(200, "indexOf() Processed", $string, $language, $result, $char);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL, NULL);
} else if (isset($char) && empty($char)) {
    response(400, "Invalid or Empty Char", NULL, NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $char)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "char" => $char, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
?>



