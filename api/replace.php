<?php
require("../word_processor.php");

if (isset($_GET['string']) && isset($_GET['language']) && isset($_GET['target']) && isset($_GET['new'])) {
    $string = $_GET['string'];
    $language = $_GET['language'];
    $target = $_GET['target'];
    $new = $_GET['new'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3']) && isset($_GET['input4'])) {
    $string = $_GET['input1'];
    $language = $_GET['input2'];
    $target = $_GET['input3'];
    $new = $_GET['input4'];
}

if (!empty($string) && !empty($language) && !empty($target) && !empty($new)) {
    $processor = new wordProcessor($string, $language);
    $result = $processor->replace($target, $new);
    response(200, "replace() Processed", $string, $language, $result, $target, $new);
} else if (isset($string) && empty($string)) {
    invalidResponse("Invalid or Empty Word");
} else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} else if (empty($target) || empty($new)) {
    invalidResponse("Invalid or Empty Target or New");
} else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $string, $language, $data, $target, $new)
{
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "language" => $language, "target" => $target, "new" => $new, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}
?>


