<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indic-WP - Group Bears - ICS499</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="js/index.js"></script> -->

</head>

<?php

// $wordLength = 'This';
// $someJson = '';
// if(isset($_GET['expectedLength'])) {
//     $someJson = 'SOMEJOSN';
// }
?>
<nav id="navigation" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="https://trello.com/b/BhYKwqBf/indic-wp-499su21" target="_blank">Trello Board <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GitHub
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://github.com/tonynguyen-metrostate" target="_blank">Tony Nguyen (Scrum Master)</a>
                    <a class="dropdown-item" href="https://github.com/NathanAlkurdi" target="_blank">Nathan Al-Kurdi - GitHub</a>
                    <a class="dropdown-item" href="https://github.com/duvickcedu" target="_blank">Christian Duvick - GitHub</a>
                    <a class="dropdown-item" href="https://github.com/EricDMunoz" target="_blank">Eric Munoz - GitHub</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://github.com/sjasthi/indic-wp" target="_blank">sjasthi (Master Repo)</a>
                </div>
            </li>
        </ul>
        <span class="navbar-brand mb-0 h1">Indic-WP WebServices</span>
        <a class="btn btn-dark" href="indic_classic.php">Classic Indic-WP</a>
        <button class="btn btn-light" value="light" onclick="changeTheme(this)" id="theme">Light Mode</button>
    </div>
</nav>

<body>
    <form name="form" id="form">
        <div class="row" style="padding: 15px;">
            <div class="col text-center">
                <label for="apiChoice">WS Type: </label>
                <select name="apiChoice" class="m-1" id="apiChoice">
                    <option selected disabled hidden>Select an option</option>
                    <option value="single">Single Input</option>
                    <option value="double">Two Input</option>
                    <option value="triple">Three Input</option>
                    <option value="getFillerCharacters">getFillerCharacters</option>
                </select>
                <br>
                <div id="testForm" style="display: none">
                    <label for="universalInput">Universal Input: </label>
                    <input type="text" class="m-1" name="word" id="universalInput">
                    <input type="button" class="btn-secondary m-1" value="Update Inputs" onclick="updateInputs()">
                    <br>
                    <label for="languageInput">Language: </label>
                    <select name="languageInput" class="m-1" id="languageInput">
                        <option selected disabled hidden>Select an option</option>
                        <option value="English">English</option>
                        <option value="Telugu">Telugu</option>
                    </select>
                    <br>
                    <input name="submit" type="submit" class="btn btn-primary btn-lg btn-block" value="Run Tests">
                    <br>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 20px;">
            <div class="col" style="padding: 15px;">
                <table id="testSuite" class="table table-dark table-striped" style="display:none;">
                    <thead id="apiHeader">
                        <!-- <tr class="header-data">
                            <th scope=" col" class="methodHeader">Method</th>
                            <th scope="col">Input</th>
                            <th scope="col">Expected Result</th>
                            <th scope="col">Actual Result</th>
                            <th scope="col">Pass/Fail</th>
                            <th scope="col" class="jsonHeader">JSON Output</th>
                        </tr> -->
                    </thead>
                    <tbody id="apiTable">
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</body>

<?php

?>

<script>
    var docWidth = document.documentElement.offsetWidth;

    [].forEach.call(
        document.querySelectorAll('*'),
        function(el) {
            if (el.offsetWidth > docWidth) {
                console.log(el);
            }
        }
    );
</script>
<script src="js/index.js"></script>
<!-- <script src="js/runTests.js"></script> -->

</html>