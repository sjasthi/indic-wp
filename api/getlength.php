<?php 

require("../word_processor.php");

if(isset($_GET['word']) && isset($_GET['language'])) {
    $word = $_GET['word'];
    $language = $_GET['language'];
}

if(!empty($word) && !empty($language)) {
    header('Content-type:application/json;charset=utf-8');

    $processor = new wordProcessor($word, $language);
    $wordLength = $processor->getLength();

    response(200, "Length Calculated", $word, $language, $wordLength);
}
else if(isset($word) && empty($word)){
    response(400, "Invalid or Empty Word", NULL, NULL, NULL);
}
else if(isset($language) && empty($language)){
    response(400, "Invalid or Empty Language", NULL, NULL, NULL);
}
else {
    response(400, "Invalid Request", NULL, NULL, NULL);
}

function response($responseCode, $message, $word, $language, $data) {
    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "word" => $word, "language" => $language, "data" => $data);

    $json = json_encode($response);
    echo $json;
}

?>
