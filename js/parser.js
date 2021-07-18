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