<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['secondString'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $secondString = $_GET['secondString'];
}


if (!empty($string) && !empty($language) && !empty($secondString)) {
    $processor = new wordProcessor($string, $language);
    $compareToResult = $processor->compareTo($secondString);
    response(200, "Words Compared", $string, $secondString, $language, $compareToResult);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
}
else if  (isset($language) && isset($language) && empty($secondString)) {
    response(400, "Invalid Column Number", NULL, NULL, NULL, NULL);
}  
else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $secondString, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "Second Word" => $secondString, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>