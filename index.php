<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indic-WP - Group Bears - ICS499</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
                <a class="nav-link" href="https://trello.com/b/BhYKwqBf/indic-wp-499su21">Trello Board <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GitHub
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://github.com/tonynguyen-metrostate">Tony Nguyen (Scrum Master)</a>
                    <a class="dropdown-item" href="https://github.com/NathanAlkurdi">Nathan Al-Kurdi - GitHub</a>
                    <a class="dropdown-item" href="https://github.com/duvickcedu">Christian Duvick - GitHub</a>
                    <a class="dropdown-item" href="https://github.com/EricDMunoz">Eric Munoz - GitHub</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://github.com/sjasthi/indic-wp">sjasthi (Master Repo)</a>
                </div>
            </li>
        </ul>
        <span class="navbar-brand mb-0 h1">Indic-WP WebServices</span>
        <a class="btn btn-dark" href="indic_classic.php">Classic Indic-WP</a>
        <button class="btn btn-light" value="light" onclick="changeTheme(this)" id="theme">Light Mode</button>
    </div>
</nav>

<body>
    <form name="form" id="form" >  
    <div class="row" style="padding: 15px;">
        <div class="col text-center">
            <label for="universalInput">Universal Input: </label>
            <input type="text" class="m-1" name="word" id="universalInput">
            <label for="universalInput">language: </label>
            <input type="text" class="m-1" name="language" id="languageInput">
            <input type="button" class="btn-secondary m-1"  value="Update Inputs" onclick="updateInputs()">
            
            <input name="submit" type="submit" class="btn btn-primary btn-lg btn-block" value="Run Tests" >
            
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col" style="padding: 15px;">
            <table id="testSuite" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="methodHeader">Method</th>
                        <th scope="col">Input</th>
                        <th scope="col">Expected Result</th>
                        <th scope="col">Actual Result</th>
                        <th scope="col">Pass/Fail</th>
                        <th scope="col" class="jsonHeader">JSON Output</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">getLength()</th>
                        <td class="inputCell" id ="lengthInput"></td>
                        <td class="expectedCell" id="lengthExpected"></td>
                        <td class="actualCell" id="actualLength"></td>
                        <td class="passFail" id="lengthPassFail"></td>
                        <td class="jsonCell" id="getLengthJSON"> </td>
                        
                        
                        
                    </tr>
                    <tr>
                        <th scope="row">getWordStrength()/getWordLevel()</th>
                        <td class="inputCell"></td>
                        <td class="expectedCell"></td>
                        <td class="actualCell"></td>
                        <td class="passFail"></td>
                        <td class="jsonCell"></td>
                    </tr>
                    <tr>
                        <th scope="row">getWordWeight()</th>
                        <td class="inputCell"></td>
                        <td class="expectedCell"></td>
                        <td class="actualCell"></td>
                        <td class="passFail"></td>
                        <td class="jsonCell"></td>
                    </tr>
                    <tr>
                        <th scope="row">getCodePoints()</th>
                        <td class="inputCell"></td>
                        <td class="expectedCell"></td>
                        <td class="actualCell"></td>
                        <td class="passFail"></td>
                        <td class="jsonCell"></td>
                    </tr>
                    <tr>
                        <th scope="row">getLogicalChars()</th>
                        <td class="inputCell"></td>
                        <td class="expectedCell"></td>
                        <td class="actualCell"></td>
                        <td class="passFail"></td>
                        <td class="jsonCell"></td>
                    </tr>
                    <tr>
                        <th scope="row">getCodePointLength()</th>
                        <td class="inputCell" id="codePointLengthInput"></td>
                        <td class="expectedCell" id="expectedCodePointLength"></td>
                        <td class="actualCell" id="actualCodePointLength"></td>
                        <td class="passFail" id="codePointLengthPassFail"></td>
                        <td class="jsonCell" id="jsonCodePointLength"></td>
                    </tr>
                    <tr>
                        <th scope="row">isPalindrome()</th>
                        <td class="inputCell" id="palindromeInput"></td>
                        <td class="expectedCell" id="palindromeExpected"></td>
                        <td class="actualCell" id="palindromeActual"></td>
                        <td class="passFail" id="palindromePassFail"></td>
                        <td class="jsonCell" id="palindromeJSON"></td>
                    </tr>
                    <tr>
                        <th scope="row">reverse()</th>
                        <td class="inputCell" id="reverseInput"></td>
                        <td class="expectedCell" id="expectedReverse"></td>
                        <td class="actualCell" id="actualReverse"></td>
                        <td class="passFail" id="passFailReverse"></td>
                        <td class="jsonCell" id="reverseJSON"></td>
                    </tr>
                    <tr>
                        <th scope="row">isAnagram()</th>
                        <td class="inputCell" id="anagramInput"></td>
                        <td class="expectedCell" id="expectedAnagram"></td>
                        <td class="actualCell" id="actualAnagram"></td>
                        <td class="passFail" id="anagramPassFail"></td>
                        <td class="jsonCell" id="jsonAnagram"></td>
                    </tr>
                    <tr>
                        <th scope="row">randomize()</th>
                        <td class="inputCell"></td>
                        <td class="expectedCell"></td>
                        <td class="actualCell"></td>
                        <td class="passFail"></td>
                        <td class="jsonCell"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

<?php


// include("api/getlength.php");
// $wordLength = $_POST['universalInput'] ?? "";
// if(isset($_GET['expectedLength'])) {
//     echo "is set";
// }
//     else
//         echo 'NOT SET';

// if(isset($_GET['expectedLength'])) {
//     $someJson = 'this should be JSON';
// }

// $data = json_decode(file_get_contents('http://localhost/indic-wp/api/getLength.php?word=test&language=english'));

// echo $data['word'], ' ' , $data['language'];

// $wordLength = $_GET['expectedLength'] ?? "";
// $universalWord = $_GET['universalInput'];
// $testGetLength = new getlength();

// $word = $_GET['universalInput'] ?? "";
// $language = $_GET['language'] ?? "";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,'http://localhost/indic-wp/api/getLength.php' );
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, 'word=test&language=english');
// $result = curl_exec($ch);
// echo $result;
// curl_close($ch);

// $response = file_get_contents('http://localhost/indic-wp/api/getlength.php?word=test&language=english');
// $response = json_decode($response);
// echo $response;
// echo $wordLength;
// echo $universalWord;
// $tesWord = 'Hello';
// echo $tesWord;
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
</html>