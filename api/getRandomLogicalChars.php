<?php   
require("../word_processor.php");
if(isset($_GET['int']) && isset($_GET['language'])) {
    $count = $_GET['int'];
    $language = $_GET['language'];
}
else if(isset($_GET['input1']) && isset($_GET['input2'])) {
    $count = $_GET['input1'];
    $language = $_GET['input2'];
}

if(!empty($count) && !empty($language)) {
    $processor = new wordProcessor("", $language);
    $logicalChars=$processor->getRandomLogicalChars($count);
    #$logicalChars = "CheckingMethod";

    response(200, "Random Logical Chars", $count, $language, $logicalChars);
}
else if (isset($count) && empty($count)) {
    invalidResponse("Invalid or Empty Word");
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

function response($responseCode, $message, $count, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "N" => $count, "language" => $language, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>