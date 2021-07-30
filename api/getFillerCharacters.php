<?php 

require("../word_processor.php");

if(isset($_GET['count']) && isset($_GET['language']) && isset($_GET['type'])) {
    $count = $_GET['count'];
    $language = $_GET['language'];
    $type = $_GET['type'];
}
else if(isset($_GET['input1']) && isset($_GET['input2']) && isset($_GET['input3'])) {
    $count = $_GET['input1'];
    $language = $_GET['input2'];
    $type = $_GET['input3'];
}

if(!empty($count) && !empty($language)) {
    $processor = new wordProcessor($count, $language);

    if(intval($count) <= 0) {
        invalidResponse("You must provide a number greater than 0.");
    }
    else {
        $fillerCharacters = $processor->getFillerCharacters($count, $type);
        response(200, "Filler Characters Generated", $count, $type, $language, $fillerCharacters);
    }
}
else if(isset($count) && empty($count)){
    invalidResponse("Invalid or Empty Count");
}
else if(isset($type) && empty($type)){
    invalidResponse("Invalid or Empty Type");
}
else if(isset($language) && empty($language)){
    invalidResponse("Invalid or Empty Language");
}
else {
    invalidResponse("Invalid Request");
}

function invalidResponse($message) {
    response(400, $message, NULL, NULL, NULL, NULL);
}

function response($responseCode, $message, $count, $type, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=60');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "count" => $count, "type" => $type, "language" => $language, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>