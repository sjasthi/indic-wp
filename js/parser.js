window.addEventListener('load', startup);


function startup() {
    registerParsingInput();
    registerSelectLanguage();
    setupDataTable();
    console.log('loaded');
}

function registerParsingInput() {
    const parsing_input_area = document.querySelector('#parsing-input');

    if(parsing_input_area) {
        parsing_input_area.addEventListener('input', updateParseTable);
    }
}

function registerSelectLanguage() {
    const language_selector = document.querySelector('#language-select');

    if(language_selector) {
        language_selector.addEventListener('change', (e) => updateLanguageSelection(e));
    }
}

function setupDataTable() {
    $('#parsed-table').DataTable();
}

function updateParseTable() {
    //console.log('detected change!');
}

function updateLanguageSelection(e) {
    const target = e.target;
    const value = target.value;

    switch(value) {
        case 'english':
            console.log('English selected');
            break;
        case 'telugu':
            console.log('Telugu selected');
            break;
        default:
            console.log('Unknown language selected');
    }
}

/**
 * This takes the value of the text area and processes it via the APIs. This function returns a map where the key is
 * the word and the value is the length
 */
async function getWordLengths() {
    const languageSelector = document.querySelector('#language-select');
    const language = languageSelector.value;

    const textArea = document.querySelector('#parsing-input');
    const string = textArea.value.trim();
    let words = string.split(" ");

    const wordWithLength = new Map();

    for (const word of words) {
        await fetch(`http://localhost/indic-wp/api/getLength.php?language=${language}&string=${word}`)
        .then(response => response.text())
        .then(data => result = data);
        newResult = remove_non_ascii(result);
        const jsonObj = JSON.parse(newResult);
        wordWithLength.set(word, jsonObj["data"])
    }

    return wordWithLength;
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
    return str.replace(/[^\x20-\x7E]/g, '');
}