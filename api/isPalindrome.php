<?php

require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
}

if (!empty($string) && !empty($language)) {
    $processor = new wordProcessor($string, $language);
    $palindromeBool = $processor->isPalindrome();
    response(200, "Palindrome Assessed", $string, $language, $palindromeBool);
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

function response($responseCode, $message, $string, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>
