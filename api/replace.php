<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['target']) && isset($_GET['new'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $target = $_GET['target'];
    $new = $_GET['new'];
}

if (!empty($string) && !empty($language) && !empty($target) && !empty($new)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->replace($target, $new);
    response(200, "replace() Processed", $string, $language, $result, $target, $new);
} else if (isset($string) && empty($string)) {
    response(400, "Invalid or Empty Word", NULL, NULL, NULL, NULL, NULL);
} else if (isset($language) && empty($language)) {
    response(400, "Invalid or Empty Language", NULL, NULL, NULL, NULL, NULL);
} else if (empty($target) || empty($new)) {
    response(400, "Invalid or Empty Target or New", NULL, NULL, NULL, NULL, NULL);
} else {
    response(400, "Invalid Request", NULL, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $target, $new)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "target" => $target, "new" => $new, "data" => $data);
    $json = json_encode($response);
    echo $json;
}
?>


