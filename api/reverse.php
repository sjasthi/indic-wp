<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
}

if (!empty($string) && !empty($language)) {
    header('Content-type:application/json;charset=utf-8');
    $processor = new wordProcessor($string, $language);
    $reversedString = $processor->reverse();
    response(200, "Length Calculated", $string, $language, $reversedString);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL);
}
else {
    response(400, "Invalid Request", NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data)
{
    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>
