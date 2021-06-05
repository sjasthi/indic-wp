<?php 

require("../word_processor.php");

$language = "English";

// If it exists as a variable
if(isset($_GET['word'])) {
    $word = $_GET['word'];
}

// If that variable is not null or empty
if(!empty($word)) {
    header('Content-type:application/json;charset=utf-8');

    $processor = new wordProcessor($word, $language);
    $wordLength = $processor->getLength();

    response(200, "Length Calculated", $wordLength);
}
// If it does exist, but is empty or null
else if(isset($word) && empty($word)){
    response(400, "Invalid or Empty Word", $word);
}
// Otherwise the GET variable isn't set
else {
    response(400, "Invalid Request", NULL);
}

function response($responseCode, $message, $data) {
    // Shorthand of header function, but checks responsecode for you
    http_response_code($responseCode);
    $response = array("response_code" => $responseCode, "message" => $message, "data" => $data);

    $json = json_encode($response);
    echo $json;
}
