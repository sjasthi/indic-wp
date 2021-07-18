<?php

require("../word_processor.php");

if (isset($_GET['char']) && isset($_GET['language'])) {
    $char = $_GET['char'];
    $language = $_GET['language'];
}
else if(isset($_GET['input1']) && isset($_GET['input2'])) {
    $char = $_GET['input1'];
    $language = $_GET['input2'];
}

if (!empty($char) && !empty($language)) {
    $processor = new wordProcessor($char, $language);
    $isConsonant = $processor->isCharConsonant($char);
    response(200, "Consonant Checked", $char, $language, $isConsonant);
}
else if (isset($char) && empty($char)) {
    invalidResponse("Invalid or Empty Char");
}
else if (isset($language) && empty($language)) {
    invalidResponse("Invalid or Empty Language");
} 
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL);
}

function response($responseCode, $message, $char, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "char" => $char, "language" => $language, "data" => $data);
    $json = json_encode($response);
    echo $json;
}

?>
