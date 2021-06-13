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


const form = document.querySelector("#form");
const universalInput = document.getElementById('universalInput').value;
const languageInput = document.getElementById("languageInput").value;

form.addEventListener("submit", async(e) => {
    e.preventDefault();
    getLength();
    getReverse();
    getCodePointLength();
    getAnagram();
    getPalindrome()
    // console.log(getLength.message);
    // 
    // var universalInput = document.getElementById('universalInput').value;
    // var languageInput = document.getElementById("languageInput").value;
    // var result = "";
    // await fetch("http://localhost/indic-wp/api/getlength.php?word="+universalInput+"&language="+languageInput)
    // .then(response => response.text())
    // .then(data => result = data);

    // console.log(result);
    // console.log(result);
    // console.log("MY EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // var jsonElement = document.getElementById("getLengthJSON");
    // jsonElement.innerHTML = result;
})


async function getLength() {

    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById('lengthExpected').innerHTML;
    var result = "";
    await fetch("http://localhost/indic-wp/api/getlength.php?word="+universalInput+"&language="+languageInput)
    .then(response => response.text())
    .then(data => result = data);


    console.log(result);
    
    // console.log(typeof result);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);
    // console.log(jsonObj.message);
    // var newResult = JSON.parse(result);
    // console.log("MY EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // console.log(expectedResult);
    var jsonElement = document.getElementById("getLengthJSON");
    jsonElement.innerHTML = result;
    var actualLength = document.getElementById("actualLength");
    actualLength.innerHTML = jsonObj.data;
    var inputValue = document.getElementById("lengthInput");
    inputValue.innerHTML = jsonObj.word;
    var passFailElement = document.getElementById("lengthPassFail");
    if (expectedResult == jsonObj.data) {
        passFailElement.innerHTML = "PASS";
    }
    else {
        passFailElement.innerHTML = "FAIL";
    }

}


async function getReverse() {

    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById('expectedReverse').innerHTML;
    var result = "";
    await fetch("http://localhost/indic-wp/api/reverse.php?string="+universalInput+"&language="+languageInput)
    .then(response => response.text())
    .then(data => result = data);
    console.log(result);
    // console.log(typeof result);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);
    // console.log(result);
    // console.log("MY NEW EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // console.log(expectedResult);

    var jsonElement = document.getElementById("reverseJSON");
    var actualCell = document.getElementById('actualReverse');
    var passFail = document.getElementById('passFailReverse');
    var reverseInput = document.getElementById('reverseInput');

    actualCell.innerHTML = jsonObj.data;
    jsonElement.innerHTML = result;
    reverseInput.innerHTML = jsonObj.string;
    
    if(expectedResult == jsonObj.data) {
        passFail.innerHTML = 'PASS';
    }
    else {
        passFail.innerHTML = 'FAIL';
    }   
}


async function getCodePointLength() {
    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById('expectedCodePointLength').innerHTML;
    var result = "";
    await fetch("http://localhost/indic-wp/api/getCodePointLength.php?string="+universalInput+"&language="+languageInput)
    .then(response => response.text())
    .then(data => result = data);
    console.log(result);
    // console.log(typeof result);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);
    // console.log(result);
    // console.log("MY NEW NEW EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // console.log(expectedResult);

    var jsonElement = document.getElementById("jsonCodePointLength");
    var actualCell = document.getElementById('actualCodePointLength');
    var passFail = document.getElementById('codePointLengthPassFail');
    var reverseInput = document.getElementById('codePointLengthInput');

    actualCell.innerHTML = jsonObj.data;
    jsonElement.innerHTML = result;
    reverseInput.innerHTML = jsonObj.string;
    
    if(expectedResult == jsonObj.data) {
        passFail.innerHTML = 'PASS';
    }
    else {
        passFail.innerHTML = 'FAIL';
    }
}


async function getAnagram() {
    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById('expectedAnagram').innerHTML;
    var result = "";
    await fetch("http://localhost/indic-wp/api/isanagram.php?string="+universalInput+"&language="+languageInput)
    .then(response => response.text())
    .then(data => result = data);
    console.log(result);
    // console.log(typeof result);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);
    // console.log(result);
    // console.log("MY NEW NEW EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // console.log(expectedResult);

    var jsonElement = document.getElementById("jsonAnagram");
    var actualCell = document.getElementById('actualAnagram');
    var passFail = document.getElementById('anagramPassFail');
    var anagramInput = document.getElementById('anagramInput');

    actualCell.innerHTML = jsonObj.data;
    jsonElement.innerHTML = result;
    anagramInput.innerHTML = jsonObj.string;

    /* Need to figure out anagram test */
    // if(expectedResult == jsonObj.data) {
    //     passFail.innerHTML = 'PASS';
    // }
    // else {
    //     passFail.innerHTML = 'FAIL';
    // }
}


async function getPalindrome() {
    var universalInput = document.getElementById('universalInput').value;
    var languageInput = document.getElementById("languageInput").value;
    var expectedResult = document.getElementById('palindromeExpected').innerHTML;
    var result = "";
    await fetch("http://localhost/indic-wp/api/isPalindrome.php?string="+universalInput+"&language="+languageInput)
    .then(response => response.text())
    .then(data => result = data);
    console.log(result);
    // console.log(typeof result);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);
    // console.log(result);
    // console.log("MY NEW NEW NEW EventListener worked");
    // console.log(universalInput);
    // console.log(languageInput);
    // console.log(expectedResult);

    var jsonElement = document.getElementById("palindromeJSON");
    var actualCell = document.getElementById('palindromeActual');
    var passFail = document.getElementById('palindromePassFail');
    var palindromeInput = document.getElementById('palindromeInput');

    actualCell.innerHTML = jsonObj.data;
    jsonElement.innerHTML = result;
    palindromeInput.innerHTML = jsonObj.string;

    if(expectedResult == String(jsonObj.data)) {
        passFail.innerHTML = 'PASS';
    }
    else {
        passFail.innerHTML = 'FAIL';
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
  
    if ((str===null) || (str===''))
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
