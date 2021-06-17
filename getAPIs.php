<?php

$apiChoice = $_GET['apiChoice'];

function getAPIList($apiChoice)
{
    $output = '';

    $singleInputAPIs = array("getCodePointLength", "getCodePoints", "getLength", "getLogicalChars", "getWordStrength", "getWordWeight", "isPalindrome", "randomize", "reverse");
    $multiInputAPIs = array("isAnagram");

    if ($apiChoice == 'single') {
        foreach ($singleInputAPIs as $api) {
            $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell" id="' . $api . 'Input"></td><td class="expectedCell" id="' . $api . 'Expected"></td><td = class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
        }
    } else if ($apiChoice == "multi") {
        foreach ($multiInputAPIs as $api) {
            $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell" id="' . $api . 'Input"></td><td class="expectedCell" id="' . $api . 'Expected"></td><td = class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
        }
    }

    echo $output;
}

getAPIList($apiChoice);
