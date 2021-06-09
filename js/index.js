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



function setChangeListener(td, listener) {

    td.addEventListener("blur", listener);
    td.addEventListener("keyup", listener);
    td.addEventListener("paste", listener);
    td.addEventListener("copy", listener);
    td.addEventListener("cut", listener);

}

var tds = document.querySelectorAll("td.inputCell");

tds.forEach(function (td) {
    setChangeListener(td, function (event) {
        console.log(event);
    });
});