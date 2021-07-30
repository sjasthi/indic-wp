<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['index']) && isset($_GET['char'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $index = $_GET['index'];
    $char = $_GET['char'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3']) && isset($_GET['input4'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $index = $_GET['input3'];
    $char = $_GET['input4'];
}

if (!empty($string) && !empty($language) && !empty($index) && !empty($char)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->addCharacterAt($index, $char);
    response(200, "addCharacterAt() Processed", $string, $language, $result, $index, $char);
} else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} else if (empty($index) || empty($char)) {
    invalidResponse("Invalid or Empty Index or Char");
} else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $index, $char)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "index" => $index, "char" => $char, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}
?>



