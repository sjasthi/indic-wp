<?php 

require("../word_processor.php");

if(isset($_GET['string']) && isset($_GET['type']) && isset($_GET['language'])) {
    $string = $_GET['string'];
    $type = $_GET['type'];
    $language = $_GET['language'];
}

if(!empty($string) && !empty($language)) {
    $processor = new wordProcessor($string, $language);

    if(intval($string) <= 0) {
        invalidResponse("You must provide a number greater than 0.");
    }
    else {
        $fillerCharacters = $processor->getFillerCharacters($string, $type);
        response(200, "Filler Characters Generated", $string, $type, $language, $fillerCharacters);
    }
}
else if(isset($string) && empty($string)){
    invalidResponse("Invalid or Empty Word");
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

function response($responseCode, $message, $string, $type, $language, $data) {
    // Locally cache results for two hours
    header('Cache-Control: max-age=7200');

    // JSON Header
    header('Content-type:application/json;charset=utf-8');

    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "string" => $string, "type" => $type, "language" => $language, "data" => $data);
    $json = json_encode($response, JSON_UNESCAPED_UNICODE);
    echo $json;
}

?>