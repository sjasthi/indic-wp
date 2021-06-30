/**
 * Toggles entire page theme between dark and light mode (work in progress)
 * @param {} objButton 
 */
function changeTheme(objButton) {
    button = document.getElementById("theme");
    navigation = document.getElementById("navigation");
    table = document.getElementById("testSuite")
    var element = document.body;
    element.classList.toggle("dark-mode");

    if (objButton.value == "light") {
        //changing to Light Mode but making button say Dark
        button.value = "dark";

        btnDark = document.querySelectorAll(".btn-dark");
        btnDark.forEach(function (btn) {
            btn.className = btn.className.replace("btn-dark", "btn-light");
        });

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

        button.className = button.className.replace("btn-dark", "btn-light")
        navigation.className = navigation.className.replace("navbar-light bg-light", "navbar-dark bg-dark")
        table.className += " table-dark";
        $("#theme").html("Light Mode");
    }
}

window.onload = function () {
    jQuery.get('getHeaders.php?apiChoice=all').done(function (data) {
        $('#apiHeader').append(data);
    });

    jQuery.get('getAPIs.php?apiChoice=all').done(function (data) {
        $('#apiTable').append(data);
        methods = document.querySelectorAll("th.methodCell");
        if (document.getElementById("testForm").style.display == "none") {
            document.getElementById("testForm").style.display = "block";
            document.getElementById("testSuite").style.display = "table";
        }
    });
}

/**
 * Function to update "Input" column of TestSuite table with universal input text field
 */
function updateInputs() {
    var input = document.getElementById("universalInput").value;
    var inputCells = document.getElementsByClassName("inputText");
    var i;
    for (i = 0; i < inputCells.length; i++) {
        inputCells[i].value = input;
    }
}


var methods = document.querySelectorAll("th.methodCell");

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

//Grabs the form
const form = document.querySelector("#form");

//Adds event listener on form submit
form.addEventListener("submit", async (e) => {
    e.preventDefault();
    runTests();

})

/*Async function to run the tests*/
async function runTests() {
    //Grabs the name of each method in the table and does callAPI function
    methods.forEach(function (method) {
        const methodName = method.innerHTML;
        callAPI(methodName);
    });
}

/*Takes methodName as argument and does API call to retrieve the appropriate */
async function callAPI(methodName) {

    const singleInput = ["getCodePointLength", "getCodePoints", "getLength", "getLogicalChars", "getWordStrength", "getWordWeight", "isPalindrome", "randomize", "reverse", "containsSpace", "getWordLevel", "getLengthNoSpaces", "getLengthNoSpacesNoCommas", "parseToLogicalChars", "parseToLogicalCharacters", "isAnagram"];
    const doubleInput = ["startsWith", "endsWith", "containsString", "containsChar", "containsLogicalChars", "containsAllLogicalChars", "containsLogicalCharSequence", "canMakeWord", "canMakeAllWords", "addCharacterAtEnd", "isIntersecting", "getIntersectingRank", "getUniqueIntersectingRank", "compareTo", "compareToIgnoreCase", "splitWord", "equals", "reverseEquals", "logicalCharAt"];
    const tripleInput = ["addCharacterAt", "replace"];

    if (methodName == "getFillerCharacters") {
        var cellInput = document.getElementById(methodName + 'InputText').value;
        var languageInput = document.getElementById("languageInput").value;
        var type = document.getElementById(methodName + 'TypeText').value;
        await fetch('http://localhost/indic-wp/api/' + methodName + '.php?string=' + cellInput + '&language=' + languageInput + '&type=' + type)
            .then(response => response.text())
            .then(data => result = data);
        newResult = remove_non_ascii(result);
        const jsonObj = JSON.parse(newResult);

        var jsonElement = document.getElementById(methodName + "JSON");
        var actualCell = document.getElementById(methodName + "Actual");
        var passFail = document.getElementById(methodName + "PassFail");
        jsonElement.innerHTML = result;
        actualCell.innerHTML = jsonObj.data;
    } else {
        var languageInput = document.getElementById("languageInput").value;
        var expectedResult = document.getElementById(methodName + "Expected").innerHTML;
        var jsonElement = document.getElementById(methodName + "JSON");
        var actualCell = document.getElementById(methodName + "Actual");
        var passFail = document.getElementById(methodName + "PassFail");

        if (singleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            await fetch('http://localhost/indic-wp/api/' + methodName + '.php?string=' + cellInput + '&language=' + languageInput)
                .then(response => response.text())
                .then(data => result = data);
        } else if (doubleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            var cellInput2 = document.getElementById(methodName + 'InputText2').value;
            await fetch('http://localhost/indic-wp/api/' + methodName + '.php?string=' + cellInput + '&input2=' + cellInput2 + '&language=' + languageInput)
                .then(response => response.text())
                .then(data => result = data);
        } else if (tripleInput.includes(methodName)) {
            var cellInput = document.getElementById(methodName + 'InputText').value;
            var cellInput2 = document.getElementById(methodName + 'InputText2').value;
            var cellInput3 = document.getElementById(methodName + 'InputText3').value;
            await fetch('http://localhost/indic-wp/api/' + methodName + '.php?string=' + cellInput + '&input2=' + cellInput2 + '&input3=' + cellInput3 + '&language=' + languageInput)
                .then(response => response.text())
                .then(data => result = data);
        }
        newResult = remove_non_ascii(result);
        const jsonObj = JSON.parse(newResult);

        jsonElement.innerHTML = result;
        actualCell.innerHTML = jsonObj.data;
        if (expectedResult == jsonObj.data) {
            passFail.innerHTML = "PASS";
            passFail.classList.add("pass")
        }
        else {
            passFail.innerHTML = "FAIL";
            passFail.classList.add("fail")
        }
    }

}




function setChangeListener(td, listener) {

    td.addEventListener("blur", listener);
    td.addEventListener("keyup", listener);
    td.addEventListener("paste", listener);
    td.addEventListener("copy", listener);
    td.addEventListener("cut", listener);

}

function remove_non_ascii(str) {

    if ((str === null) || (str === ''))
        return false;
    else
        str = str.toString();

    return str.replace(/[^\x20-\x7E]/g, '');
}

var tds = document.querySelectorAll("td.inputCell");

tds.forEach(function (td) {
    setChangeListener(td, function (event) {
        console.log(event);
    });
});

