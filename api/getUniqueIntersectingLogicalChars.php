<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['list'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $list = $_GET['list'];
}


if (!empty($string) && !empty($language) && !empty($list)) {
    $processor = new wordProcessor($string, $language);
    $uniqueIntersectingRank = $processor->getUniqueIntersectingRank($list);
    response(200, "Unique Intersecting Char", $string, $list, $language, $uniqueIntersectingRank);
}
else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL);
}
else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL);
}
else if  (isset($language) && isset($language) && empty($list)) {
    response(400, "Invalid list Number", NULL, NULL, NULL, NULL);
}  
else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $list, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "List" => $list, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>