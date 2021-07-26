var local = false;
if (local == true) {
    apiURL = "http://localhost/indic-wp/api/";
} else {
    apiURL = "https://indic-wp.thisisjava.com/api/";
}

/**
 * Toggles entire page theme between dark and light mode (work in progress)
 * @param {} objButton 
 */
function changeTheme(objButton) {
    button = document.getElementById("theme");
    navigation = document.getElementById("navigation");
    table = document.getElementById("testSuite")
    inputCells = document.getElementsByClassName("inputText");
    var element = document.body;
    element.classList.toggle("dark-mode");

    if (objButton.value == "light") {
        //changing to Light Mode but making button say Dark
        button.value = "dark";

        btnDark = document.querySelectorAll(".btn-dark");
        btnDark.forEach(function (btn) {
            btn.className = btn.className.replace("btn-dark", "btn-light");
        });

        textDark = document.querySelectorAll(".text-white, .bg-dark")
        textDark.forEach(function (txt) {
            txt.className = txt.className.replace("text-white", "text-dark")
            txt.className = txt.className.replace("bg-dark", "bg-light")
        })

        button.className = button.className.replace("btn-light", "btn-dark")
        navigation.className = navigation.className.replace("navbar-dark bg-dark", "navbar-light bg-light")
        table.className = table.className.replace("table-dark", "");
        $("#theme").html("Dark Mode");
    } else {
        //changing to Dark Mode but making button say Light
        button.value = "light";

        btnLight = document.querySelectorAll(".btn-light");
        btnLight.forEach(function (btn) {
            btn.className = btn.className.replace("btn-light", "btn-dark");
        });

        textLight = document.querySelectorAll(".text-dark, .bg-light")
        textLight.forEach(function (txt) {
            txt.className = txt.className.replace("text-dark", "text-white")
            txt.className = txt.className.replace("bg-light", "bg-dark")
        })

        button.className = button.className.replace("btn-dark", "btn-light")
        navigation.className = navigation.className.replace("navbar-light bg-light", "navbar-dark bg-dark")
        table.className += " table-dark";
        $("#theme").html("Light Mode");
    }
}

/**
 * Function to update "Input" column of TestSuite table with universal input text field
 */
function updateInputs() {
    var input = document.getElementById("universalInput").value;
    var inputCells = document.getElementsByClassName("inputText");
    for (var i = 0; i < inputCells.length; i++) {
        inputCells[i].value = input;
    }
}


/**
 * When an option is selected, remove the table headers and data.
 * Repopulate new header and data.
 */
$('#apiChoice').on('change', function (e) {
    $('#apiHeader .header-data').remove();
    $('#apiTable .table-data').remove();

    jQuery.get('getHeaders.php?apiChoice=' + $('#apiChoice').val()).done(function (data) {
        $('#apiHeader').append(data);
    });

    jQuery.get('getAPIs.php?apiChoice=' + $('#apiChoice').val()).done(function (data) {
        $('#apiTable').append(data);
        methods = document.querySelectorAll("th.methodCell");
        if (document.getElementById("testForm").style.display == "none") {
            document.getElementById("testForm").style.display = "block";
            document.getElementById("testSuite").style.display = "table";
        }
    });
});

/*Grabs the form*/
const form = document.querySelector("#form");

/*Adds event listener on form submit*/
form.addEventListener("submit", async (e) => {
    e.preventDefault();
    runTests();

})

/*Grabs all the method names from the methods column*/
var methods = document.querySelectorAll("a.methodURL");

/*Async function to run the tests*/
async function runTests() {
    //Grabs the name of each method in the table and does callAPI function
    methods.forEach(function (method) {
        const methodName = method.innerHTML;
        callAPI(methodName);
    });
}

/*Takes methodName as argument and does API call to retrieve the appropriate data*/
async function callAPI(methodName) {

    const singleInput = ["getCodePointLength", "getCodePoints", "getLength", "getLogicalChars", "getWordStrength", "getWordWeight", "isPalindrome", "randomize", "reverse", "containsSpace", "getWordLevel", "getLengthNoSpaces", "getLengthNoSpacesNoCommas", "parseToLogicalChars", "parseToLogicalCharacters", "isAnagram"];
    const doubleInput = ["startsWith", "endsWith", "containsString", "containsChar", "containsLogicalChars", "containsAllLogicalChars", "containsLogicalCharSequence", "canMakeWord", "canMakeAllWords", "addCharacterAtEnd", "isIntersecting", "getIntersectingRank", "getUniqueIntersectingRank", "compareTo", "compareToIgnoreCase", "splitWord", "equals", "reverseEquals", "logicalCharAt", "getUniqueIntersectingLogicalChars", "indexOf", "areLadderWords", "areHeadAndTailWords"];
    const tripleInput = ["addCharacterAt", "replace"];

    if (methodName == "getFillerCharacters") {
        var cellInput = document.getElementById(methodName + 'InputText').value;
        var languageInput = document.getElementById("languageInput").value;
        var type = document.getElementById(methodName + 'TypeText').value;
        await fetch(apiURL + methodName + '.php?count=' + cellInput + '&language=' + languageInput + '&type=' + type)
            .then(response => response.text())
            .then(data => result = data);
        newResult = remove_non_ascii(result);
        const jsonObj = JSON.parse(newResult);

        var jsonElement = document.getElementById(methodName + "JSON");
        var actualCell = document.getElementById(methodName + "Actual");
        var passFail = document.getElementById(methodName + "PassFail");
        jsonElement.innerHTML = result;
        actualCell.innerHTML = jsonObj.data;
        if (jsonObj.response_code != 200) {
            passFail.innerHTML = "FAIL";
            passFail.classList.remove("pass")
            passFail.classList.add("fail")
            passFail.classList.remove("table-success")
            passFail.classList.add("table-danger")
        } else {
            passFail.innerHTML = "PASS";
            passFail.classList.remove("fail")
            passFail.classList.add("pass")
            passFail.classList.remove("table-danger")
            passFail.classList.add("table-success")
        }
    } else {
        var languageInput = document.getElementById("languageInput").value;
        var expectedResult = document.getElementById(methodName + "ExpectedText").value;
        var jsonElement = document.getElementById(methodName + "JSON");
        var actualCell = document.getElementById(methodName + "Actual");
        var passFail = document.getElementById(methodName + "PassFail");

        if (singleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            await fetch(apiURL + methodName + '.php?string=' + cellInput + '&language=' + languageInput)
                .then(response => response.text())
                .then(data => result = data);
        } else if (doubleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            var cellInput2 = document.getElementById(methodName + 'InputText2').value;
            await fetch(apiURL + methodName + '.php?input1=' + cellInput + '&input2=' + languageInput + '&input3=' + cellInput2)
                .then(response => response.text())
                .then(data => result = data);
        } else if (tripleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            var cellInput2 = document.getElementById(methodName + 'InputText2').value;
            var cellInput3 = document.getElementById(methodName + 'InputText3').value;
            await fetch(apiURL + methodName + '.php?input1=' + cellInput + '&input2=' + languageInput + '&input3=' + cellInput2 + '&input4=' + cellInput3)
                .then(response => response.text())
                .then(data => result = data);
        }
        newResult = remove_non_ascii(result);

        const jsonObj = JSON.parse(newResult);

        jsonElement.innerHTML = result;
        actualCell.innerHTML = jsonObj.data;


        if (jsonObj.response_code != 200) {
            passFail.innerHTML = "FAIL";
            passFail.classList.remove("pass")
            passFail.classList.add("fail")
            passFail.classList.remove("table-success")
            passFail.classList.add("table-danger")
        } else if (expectedResult == actualCell.innerHTML) {
            passFail.innerHTML = "PASS";
            passFail.classList.remove("fail")
            passFail.classList.add("pass")
            passFail.classList.remove("table-danger")
            passFail.classList.add("table-success")
        } else {
            passFail.innerHTML = "FAIL";
            passFail.classList.remove("pass")
            passFail.classList.add("fail")
            passFail.classList.remove("table-success")
            passFail.classList.add("table-danger")
        }
    }

}

/**
 * Removes NON-ASCII characters from strings 
 */
function remove_non_ascii(str) {

    if ((str === null) || (str === ''))
        return false;
    else
        str = str.toString();

    return str.replace(/[^\x20-\x7E]/g, '');
}


window.onload = function () {
    var language = document.getElementById("languageInput").value;
    getLanguageValues(language);
    getDefaultValues(language);
    runTests();

}

/**
 * Generates default values for expected and runs the tests when the language dropdown is changed
 */
$('#languageInput').on('change', function (e) {
    var language = document.getElementById("languageInput").value;
    getLanguageValues(language);
    getDefaultValues(language);
    runTests();
})

function getLanguageValues(language) {
    var input;
    document.getElementById("getFillerCharactersInputText").value = 20;
    document.getElementById("getFillerCharactersTypeText").value = "vowels";
    if (language == "English") {
        input = "hello";
    } else if (language == "Telugu") {
        input = "అమెరికాఆస్ట్రేలియా";
    }
    document.getElementById("universalInput").value = input;
    var inputCells = document.getElementsByClassName("inputText");
    for (var i = 0; i < inputCells.length; i++) {
        inputCells[i].value = input;
    }
}


function getDefaultValues(language) {
    if (language == "English") {
        document.getElementById("startsWithInputText2").value = "h";
        document.getElementById("endsWithInputText2").value = "o";
        document.getElementById("containsStringInputText2").value = "lo";
        document.getElementById("containsCharInputText2").value = "o";
        document.getElementById("containsLogicalCharsInputText2").value = "l,o";
        document.getElementById("containsAllLogicalCharsInputText2").value = "l,o";
        document.getElementById("containsLogicalCharSequenceInputText2").value = "lo";
        document.getElementById("canMakeWordInputText2").value = "lo";
        document.getElementById("canMakeAllWordsInputText2").value = "hell,lo";
        document.getElementById("addCharacterAtEndInputText2").value = "a";
        document.getElementById("isIntersectingInputText2").value = "el";
        document.getElementById("getIntersectingRankInputText2").value = "el";
        document.getElementById("getUniqueIntersectingRankInputText2").value = "eli";
        document.getElementById("compareToInputText2").value = "hello";
        document.getElementById("compareToIgnoreCaseInputText2").value = "HEL";
        document.getElementById("splitWordInputText2").value = "2";
        document.getElementById("equalsInputText2").value = "hello";
        document.getElementById("reverseEqualsInputText2").value = "olleh";
        document.getElementById("logicalCharAtInputText2").value = "3";
        document.getElementById("getUniqueIntersectingLogicalCharsInputText2").value = "l,l";
        document.getElementById("indexOfInputText2").value = "e";
        document.getElementById("addCharacterAtInputText2").value = "1";
        document.getElementById("replaceInputText2").value = "ell";
        document.getElementById("addCharacterAtInputText3").value = "e";
        document.getElementById("replaceInputText3").value = "i";
        document.getElementById("areLadderWordsInputText2").value = "cello";
        document.getElementById("areHeadAndTailWordsInputText2").value = "oasis";


        document.getElementById("getCodePointLengthExpectedText").value = "5";
        document.getElementById("getCodePointsExpectedText").value = "104,101,108,108,111";
        document.getElementById("getLengthExpectedText").value = "5";
        document.getElementById("getLogicalCharsExpectedText").value = "h,e,l,l,o";
        document.getElementById("getWordStrengthExpectedText").value = "5";
        document.getElementById("getWordWeightExpectedText").value = "5";
        document.getElementById("isPalindromeExpectedText").value = "false";
        document.getElementById("reverseExpectedText").value = "olleh";
        document.getElementById("containsSpaceExpectedText").value = "false";
        document.getElementById("getWordLevelExpectedText").value = "5";
        document.getElementById("getLengthNoSpacesExpectedText").value = "5";
        document.getElementById("getLengthNoSpacesNoCommasExpectedText").value = "5";
        document.getElementById("parseToLogicalCharsExpectedText").value = "h,e,l,l,o";
        document.getElementById("parseToLogicalCharactersExpectedText").value = "h,e,l,l,o";
        document.getElementById("isAnagramExpectedText").value = "true";
        document.getElementById("startsWithExpectedText").value = "true";
        document.getElementById("endsWithExpectedText").value = "true";
        document.getElementById("containsStringExpectedText").value = "true";
        document.getElementById("containsCharExpectedText").value = "true";
        document.getElementById("containsLogicalCharsExpectedText").value = "true";
        document.getElementById("containsAllLogicalCharsExpectedText").value = "true";
        document.getElementById("containsLogicalCharSequenceExpectedText").value = "true";
        document.getElementById("canMakeWordExpectedText").value = "true";
        document.getElementById("canMakeAllWordsExpectedText").value = "true";
        document.getElementById("addCharacterAtEndExpectedText").value = "helloa";
        document.getElementById("isIntersectingExpectedText").value = "true";
        document.getElementById("getIntersectingRankExpectedText").value = "3";
        document.getElementById("getUniqueIntersectingRankExpectedText").value = "5";
        document.getElementById("compareToExpectedText").value = "0";
        document.getElementById("compareToIgnoreCaseExpectedText").value = "2";
        document.getElementById("splitWordExpectedText").value = "{'0': ['h', 'e'], '2': ['l', 'l'], '4': ['o', '']}";
        document.getElementById("equalsExpectedText").value = "true";
        document.getElementById("reverseEqualsExpectedText").value = "true";
        document.getElementById("logicalCharAtExpectedText").value = "l";
        document.getElementById("getUniqueIntersectingLogicalCharsExpectedText").value = "5";
        document.getElementById("indexOfExpectedText").value = "1";
        document.getElementById("addCharacterAtExpectedText").value = "heello";
        document.getElementById("replaceExpectedText").value = "hio";
        document.getElementById("areLadderWordsExpectedText").value = "true";
        document.getElementById("areHeadAndTailWordsExpectedText").value = "true";
    }

    if (language == "Telugu") {
        document.getElementById("startsWithInputText2").value = "అమె";
        document.getElementById("endsWithInputText2").value = "లియా";
        document.getElementById("containsStringInputText2").value = "అమెరికా";
        document.getElementById("containsCharInputText2").value = "స్ట్రే";
        document.getElementById("containsLogicalCharsInputText2").value = "కా,యా,లి";
        document.getElementById("containsAllLogicalCharsInputText2").value = "కా,యా,లి";
        document.getElementById("containsLogicalCharSequenceInputText2").value = "రి,కా,ఆ";
        document.getElementById("canMakeWordInputText2").value = "అమెరికా";
        document.getElementById("canMakeAllWordsInputText2").value = "అమెరికా,ఆస్ట్రేలియా";
        document.getElementById("addCharacterAtEndInputText2").value = "ల్లో";
        document.getElementById("isIntersectingInputText2").value = "ఇటలి";
        document.getElementById("getIntersectingRankInputText2").value = "కాయాలి";
        document.getElementById("getUniqueIntersectingRankInputText2").value = "కాయాలి";
        document.getElementById("compareToInputText2").value = "అమెరికాఆస్ట్రేలియా";
        document.getElementById("compareToIgnoreCaseInputText2").value = "ఆస్ట్రేలియా";
        document.getElementById("splitWordInputText2").value = "2";
        document.getElementById("equalsInputText2").value = "అమెరికాఆస్ట్రేలియా";
        document.getElementById("reverseEqualsInputText2").value = "యాలిస్ట్రేఆకారిమెఅ";
        document.getElementById("logicalCharAtInputText2").value = "6";
        document.getElementById("getUniqueIntersectingLogicalCharsInputText2").value = "కాయాలి";
        document.getElementById("indexOfInputText2").value = "లి";
        document.getElementById("addCharacterAtInputText2").value = "3";
        document.getElementById("replaceInputText2").value = "అమెరికా";
        document.getElementById("addCharacterAtInputText3").value = "క్క";
        document.getElementById("replaceInputText3").value = "క్క";

        document.getElementById("getCodePointLengthExpectedText").value = "18";
        document.getElementById("getCodePointsExpectedText").value = "3077,3118,3142,3120,3135,3093,3134,3078,3128,3149,3103,3149,3120,3143,3122,3135,3119,3134";
        document.getElementById("getLengthExpectedText").value = "8";
        document.getElementById("getLogicalCharsExpectedText").value = "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా";
        document.getElementById("getWordStrengthExpectedText").value = "6";
        document.getElementById("getWordWeightExpectedText").value = "18";
        document.getElementById("isPalindromeExpectedText").value = "false";
        document.getElementById("reverseExpectedText").value = "యాలిస్ట్రేఆకారిమెఅ";
        document.getElementById("containsSpaceExpectedText").value = "false";
        document.getElementById("getWordLevelExpectedText").value = "6";
        document.getElementById("getLengthNoSpacesExpectedText").value = "8";
        document.getElementById("getLengthNoSpacesNoCommasExpectedText").value = "8";
        document.getElementById("parseToLogicalCharsExpectedText").value = "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా";
        document.getElementById("parseToLogicalCharactersExpectedText").value = "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా";
        document.getElementById("isAnagramExpectedText").value = "true";
        document.getElementById("startsWithExpectedText").value = "true";
        document.getElementById("endsWithExpectedText").value = "true";
        document.getElementById("containsStringExpectedText").value = "true";
        document.getElementById("containsCharExpectedText").value = "true";
        document.getElementById("containsLogicalCharsExpectedText").value = "true";
        document.getElementById("containsAllLogicalCharsExpectedText").value = "true";
        document.getElementById("containsLogicalCharSequenceExpectedText").value = "false";
        document.getElementById("canMakeWordExpectedText").value = "true";
        document.getElementById("canMakeAllWordsExpectedText").value = "true";
        document.getElementById("addCharacterAtEndExpectedText").value = "అమెరికాఆస్ట్రేలియాల్లో";
        document.getElementById("isIntersectingExpectedText").value = "true";
        document.getElementById("getIntersectingRankExpectedText").value = "3";
        document.getElementById("getUniqueIntersectingRankExpectedText").value = "8";
        document.getElementById("compareToExpectedText").value = "0";
        document.getElementById("compareToIgnoreCaseExpectedText").value = "-1";
        document.getElementById("splitWordExpectedText").value = ""; //Need to update
        document.getElementById("equalsExpectedText").value = "true";
        document.getElementById("reverseEqualsExpectedText").value = "true";
        document.getElementById("logicalCharAtExpectedText").value = "లి";
        document.getElementById("getUniqueIntersectingLogicalCharsExpectedText").value = "8";
        document.getElementById("indexOfExpectedText").value = "6";
        document.getElementById("addCharacterAtExpectedText").value = "అమెరిక్కకాఆస్ట్రేలియా";
        document.getElementById("replaceExpectedText").value = "క్కఆస్ట్రేలియా";
    }
}