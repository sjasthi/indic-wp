<?php

$apiChoice = $_GET['apiChoice'];

function getTableHeaders($apiChoice)
{
    $output = '';

    if ($apiChoice == "getFillerCharacters") {
        $output =
            '<tr class="header-data"><th scope="col" class="methodHeader">Method</th><th scope="col">Input 1</th><th scope="col">Input Type</th>><th scope="col">Actual Result</th><th scope="col" class="jsonHeader">JSON Output</th></tr>';
    } else if ($apiChoice == "all") {
        $output = '<tr class="header-data"><th scope="col" class="methodHeader">Method</th><th scope="col">Input 1</th><th scope="col">Input 2</th><th scope="col">Input 3</th><th scope="col">Expected Result</th><th scope="col">Actual Result</th><th scope="col">Pass/Fail</th><th scope="col" class="jsonHeader">JSON Output</th></tr>';
    }



    echo $output;
}

getTableHeaders($apiChoice);
