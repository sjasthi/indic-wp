t<?php

    $apiChoice = $_GET['apiChoice'];

    function getAPIList($apiChoice)
    {
        $output = '';

        $singleInputAPIs = array("getCodePointLength", "getCodePoints", "getLength", "getLogicalChars", "getWordStrength", "getWordWeight", "isPalindrome", "reverse", "containsSpace", "getWordLevel", "getLengthNoSpaces", "getLengthNoSpacesNoCommas", "parseToLogicalChars", "parseToLogicalCharacters", "isAnagram");
        $doubleInputAPIs = array("startsWith", "endsWith", "containsString", "containsChar", "containsLogicalChars", "containsAllLogicalChars", "containsLogicalCharSequence", "canMakeWord", "canMakeAllWords", "addCharacterAtEnd", "isIntersecting", "getIntersectingRank", "getUniqueIntersectingRank", "compareTo", "compareToIgnoreCase", "splitWord", "equals", "reverseEquals", "logicalCharAt", "getUniqueIntersectingLogicalChars", "indexOf");
        $tripleInputAPIs = array("addCharacterAt", "replace");
        $getFillerChars = array("getFillerCharacters");

        //removed APIs: random, isCharConsonant, isCharVowel

        if ($apiChoice == "getFillerCharacters") {
            $api = "getFillerCharacters";
            $output = $output .
                '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell" id="' . $api . 'Input"><input type="text" size="12" class="inputText" id="' . $api . 'InputText"></td><td class="input2Cell" id="' . $api . 'Type"><input type="text" size="12" class="inputText" id="' . $api . 'TypeText"></td><td class="actualCell" id="' . $api . 'Actual"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
        } else if ($apiChoice == "all") {
            foreach ($getFillerChars as $api) {
                $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCountCell"  id="' . $api . 'Input"><input type="text" size="12" class="inputCountText text-white bg-dark" id="' . $api . 'InputText"></td><td class="input2Cell"  id="' . $api . 'Input2"><input type="text" size="12" class="inputTypeText text-white bg-dark" id="' . $api . 'TypeText"></td><td class="input3Cell" id="' . $api . 'Input3">-</td><td class="expectedCell" id="' . $api . 'Expected">-</td><td class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail">-</td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
            }
            foreach ($singleInputAPIs as $api) {
                $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell"  id="' . $api . 'Input"><input type="text" size="12" class="inputText text-white bg-dark" id="' . $api . 'InputText" value=""></td><td class="input2Cell" id="' . $api . 'Input2">-</td><td class="input3Cell" id="' . $api . 'Input3">-</td><td class="expectedCell" id="' . $api . 'Expected"><input type="text" size="12" class="expectedText text-white bg-dark" id="' . $api . 'ExpectedText"></td><td class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
            }
            foreach ($doubleInputAPIs as $api) {
                $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell"  id="' . $api . 'Input"><input type="text" size="12" class="inputText text-white bg-dark" id="' . $api . 'InputText"></td><td class="input2Cell"  id="' . $api . 'Input2"><input type="text" size="12" class="inputText2 text-white bg-dark" id="' . $api . 'InputText2"></td><td class="input3Cell" id="' . $api . 'Input3">-</td><td class="expectedCell" id="' . $api . 'Expected"><input type="text" size="12" class="expectedText text-white bg-dark" id="' . $api . 'ExpectedText"></td><td class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
            }
            foreach ($tripleInputAPIs as $api) {
                $output = $output . '<tr class="table-data"><th scope="row" class="methodCell" id="' . $api . 'Method">' . $api . '</th><td class="inputCell"  id="' . $api . 'Input"><input type="text" size="12" class="inputText text-white bg-dark" id="' . $api . 'InputText"></td><td class="input2Cell"  id="' . $api . 'Input2"><input type="text" size="12" class="inputText2 text-white bg-dark" id="' . $api . 'InputText2"></td><td class="input3Cell"  id="' . $api . 'Input3"><input type="text" size="12" class="inputText3 text-white bg-dark" id="' . $api . 'InputText3"></td><td class="expectedCell" id="' . $api . 'Expected"><input type="text" size="12" class="expectedText text-white bg-dark" id="' . $api . 'ExpectedText"></td><td class="actualCell" id="' . $api . 'Actual"></td><td class="passFail" id="' . $api . 'PassFail"></td><td class="jsonCell" id="' . $api . 'JSON"></td></tr>';
            }
        }


        echo $output;
    }

    getAPIList($apiChoice);
