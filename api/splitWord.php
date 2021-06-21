<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['col'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $col = $_GET['col'];
}


if (!empty($string) && !empty($language) && !empty($col)) {
    $processor = new wordProcessor($string, $language);
    $split_word = $processor->splitWord($col);
    response(200, "Word Split", $string, $col, $language, $split_word);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
}
else if  (isset($language) && isset($language) && empty($col)) {
    response(400, "Invalid Column Number", NULL, NULL, NULL, NULL);
}  
else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $col, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "Columns" =>$col, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>