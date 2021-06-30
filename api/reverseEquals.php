<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['secondString'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $string_2 = $_GET['secondString'];
}


if (!empty($string) && !empty($language) && !empty($string_2)) {
    $processor = new wordProcessor($string, $language);
    $reversedEquals = $processor->reverseEquals($string_2);
    response(200, "Reverse Equals", $string, $string_2, $language, $reversedEquals);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
}
else if (isset($language) && isset($string) && empty($string_2)) {
    response(400, "Invalid or Empty Second Word", NULL, NULL, NULL, NULL);
}  
else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $string_2, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "second string" =>$string_2, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>
