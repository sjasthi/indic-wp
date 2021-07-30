window.addEventListener('load', startup);

let language = "english";
let table;

function startup() {
    registerSelectLanguage();
    table = $('#parsed-table').DataTable();
}

function registerSelectLanguage() {
    const language_selector = document.querySelector('#language-select');

    if(language_selector) {
        language_selector.addEventListener('change', (e) => updateLanguageSelection(e));
    }
}

function rebuildTable() {
    table.clear();
    $('#parsed-table tbody').empty();
    table = $('#parsed-table').DataTable();
}

function updateParseTable() {
    const input = document.querySelector('#parsing-input');

    if($('#parsing-input').val().trim().length > 0) {
        const words = getWordLengths().then((wordsMap) => {
            rebuildTable();
            for(let [key, value] of wordsMap) {
                table.row.add([key, value['length'], value['frequency']]).draw();
            }
        }, (error) => {
            return error;
        });
    }
    else {
        rebuildTable();
        table.row.add(["Enter some text...", "-", "-"]).draw();
    }
}

function updateLanguageSelection(e) {
    const target = e.target;
    const value = target.value;
    const parsingInput = document.querySelector('#parsing-input');

    switch(value) {
        case 'english':
            language = value;
            console.log(language + ' selected');
            break;
        case 'telugu':
            language = value;
            console.log(language + ' selected');
            break;
        default:
            console.log('Unknown language selected');
    }

    parsingInput.value = "";
    rebuildTable();
    table.row.add(["Enter some text...", "-", "-"]).draw();
}

/**
 * This takes the value of the text area and processes it via the APIs. This function returns a map where the key is
 * the word and the value is the length
 */
async function getWordLengths() {
    const textArea = document.querySelector('#parsing-input');
    const string = textArea.value.trim();
    let words = string.split(/\s+/);
    const wordWithLength = new Map();
    
    for (const word of words) {
        await fetch(`api/getLength.php?language=${language}&string=${word}`)
        .then(response => response.text())
        .then(data => result = data);
        
        newResult = remove_non_ascii(result);
        const jsonObj = JSON.parse(newResult);
        let objFrequency;
        
        if(wordWithLength.has(word)) {
            objFrequency = wordWithLength.get(word)['frequency'] + 1;
        }
        else {
            objFrequency = 1;
        }

        const wordEntry = {
            length: jsonObj["data"],
            frequency: objFrequency
        };

        wordWithLength.set(word, wordEntry);
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
    return str.replace(/[^\x20-\x7E\uC00-\u0C7F]/g, '');
}