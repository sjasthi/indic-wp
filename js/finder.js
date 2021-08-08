//TODO: do things within finder.php lulz
//Getting DOM objects
const inputText = document.querySelector("#input-text");
const textToCompare = document.querySelector("#text-to-compare");
const finderMatches = document.querySelector("#finder-matches");
const processButton = document.querySelector("#process");
const language = document.querySelector("#language-select").value;

//put finder method inside here
processButton.addEventListener("click", async () => {
    finderMatches.value = "";
    //gettting text values of input box and text area
    const inputTextValue = inputText.value.trim();
    const textToCompareValue = textToCompare.value.trim();

    //getting base chars and length of input for comparison
        const inputTextBaseCharacters = await getBaseCharacters(inputTextValue);



    // const inputTextLength = inputTextBaseCharacters.length;

    //splitting each line from the text area into an array
    const stringArray = textToCompareValue.split("\n");

    //placing all strings with their base characters into a map
    const wordWithbaseChars = new Map();
    if(inputTextValue !== ""){
        if(textToCompareValue !== ""){
            for (const string of stringArray) {
                const value = await getBaseCharacters(string)
                wordWithbaseChars.set(string, value);
            }
        }
    }

    //if contents of arrays are the same then adds them to the match box
    for (const [key, value] of wordWithbaseChars.entries()) {
        if (compareArrays(inputTextBaseCharacters, value)) {
            finderMatches.value += key + "\n"
        }
    }
})

//compares if the arrays have the same contents
function compareArrays (array1, array2) {
    if (array1 == undefined || array1.length == 0) {
        return false;
    }
    if (array1 == undefined || array1.length == 0) {
        return false;
    }
    if (array1.length != array2.length) {
        return false
    } else {
        array1 = array1.sort();
        array2 = array2.sort();
        for (let i = 0; i < array1.length; i++) {
            if (array1[i] != array2[i]) {
                return false
            }
        }
    }
    return true;
}

//calls the base chars api and returns result
async function getBaseCharacters (string) {    
    if(string !== "") {
    await fetch(`http://localhost/indic-wp/api/getBaseCharacters.php?language=${language}&string=${string}`)
        .then(response => response.text())
        .then(data => result = data);
    newResult = remove_non_ascii(result);
    const jsonObj = JSON.parse(newResult);

    return jsonObj["data"];
}
}

/**
 * Removes NON-ASCII characters from strings
 * taken from index.js
 */
function remove_non_ascii(str) {
    if ((str === null) || (str === ''))
        return false;
    else
        str = str.toString();
    return str.replace(/[^\x20-\x7E\uC00-\u0C7F]/g, '');
}