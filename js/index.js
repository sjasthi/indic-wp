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


/**
 * Function to update "Input" column of TestSuite table with universal input text field
 */
function updateInputs() {
    var input = document.getElementById("universalInput").value;
    var inputCells = document.getElementsByClassName("inputCell");
    var i;
    for (i = 0; i < inputCells.length; i++) {
        inputCells[i].innerHTML = input;
    }
}


//Grabs all method names in the table
var methods = document.querySelectorAll("th.methodCell");
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
    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById(methodName + "Expected").innerHTML;
    await fetch('http://localhost/indic-wp/api/' + methodName + '.php?string=' + universalInput + '&language=' + languageInput)
        .then(response => response.text())
        .then(data => result = data);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);

    var jsonElement = document.getElementById(methodName + "JSON");
    var actualCell = document.getElementById(methodName + "Actual");
    var passFail = document.getElementById(methodName + "PassFail");
    jsonElement.innerHTML = result;
    actualCell.innerHTML = jsonObj.data;
    if (expectedResult == jsonObj.data) {
        passFail.innerHTML = "PASS";
    }
    else {
        passFail.innerHTML = "FAIL";
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
