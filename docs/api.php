<!DOCTYPE html>
<html lang="en">
<?php
$root = 'http://' . $_SERVER['HTTP_HOST'] . '/indic-wp/';
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Indic-WP - Group Bears - ICS499</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</head>

<nav id="navigation" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= $root ?>index.php">Home</a>
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
      <li class="nav-item">
        <a class="nav-link" href="api.php">API Docs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $root ?>parser.php">Parser</a>
      </li>
    </ul>
    <span class="navbar-brand mb-0 h1">Indic-WP WebServices</span>
    <a class="btn btn-dark" href="../indic_classic.php">Classic Indic-WP</a>
    <button class="btn btn-light" value="light" onclick="changeTheme(this)" id="theme">Light Mode</button>
  </div>
</nav>

<div class="APIDescriptionTop"="top">
  <h2>Getting Started with the Indic-WP API </h2>
  <p>
    How to use the Indic-WP API and what to expect.
  </p>
  <h3>How to use the API URLs</h3>
  <p>
    The URL for any API is </p>
  <div class="codeBlock">
    <!-- Will need to update with actual link once service is posted.  -->
    http://localhost/indic-wp/api/SERVICENAME.PHP?input1='hello'&input2='English'
  </div>
  <p>
    where the service name is the actual service name (getLength), input 1 is the string that is
    being processed and input2 is the language of the string. </p>
  <h3>The Response</h3>
  <p>
    The response from any API will be a JSON response and will look
    like the following:
  </p>

  <div class="codeBlock">
    {'response_code': 200, 'message': 'Length Calculated', 'string': 'hello', 'language': 'English', 'data': 5}
  </div>
  <p>
    If the response has a string for the return value the response will look like the following:
  </p>
  <div class="codeBlock">
    {'response_code': 200, 'message': 'String Reversed', 'string': 'hello', 'language': 'English', 'data': 'olleh'}
  </div>
  <h3>Response Codes</h3>
  <p>
  <div class="codeBlock">
    response code 200: The request was successfully completed.
    <br>
    response code 400: The request was invalid.
  </div>
  </p>
</div>

<div class="APIDescriptionTop">
  <h3>The Methods:</h3>
</div>

<div class="APIDescription" id="getLength">

  <body>
    <h4>Get Length:</h4>
    <p>
      The getLength API takes a single string as a
      parameter and returns an integer value. For example, sending a
      the word 'Mississippi' would return an integer value of 11.
    </p>
  </body>
</div>

<div class="APIDescription" id="reverse">

  <body>
    <h4>Reverse:</h4>
    <p>
      The reverse API takes a single string as input and returns
      the reverse of the input string. For example, entering racecar would
      return racecar :) . Also, entering moan would reutrn noam.

    </p>
  </body>
</div>

<div class="APIDescription" id="codePointLength">

  <body>
    <h4>Get Code Point Length:</h4>
    <p>
      The get code point length takes a single string as input and returns
      an integer representing the code point length. A code point is the atomic unit of information and text is
      a sequence of code points. For example, entering hello would
      return 5 as the value for the code point length. Entering అమెరికాఆస్ట్రేలియా would result in
      a return value of 18.

    </p>
  </body>
</div>

<div class="APIDescription" id="codePoints">

  <body>
    <h4>Get Code Points:</h4>
    <p>
      The get code points API takes a single string and returns the actual
      code points of the characters in the string. For example, if hello is enetered
      the return array is [[104], [101], [108], [108], [111]]

    </p>
  </body>
</div>


<div class="APIDescription" id="getWordLevel">

  <body>
    <h4>Get Word Level:</h4>
    <p>
      The get word level API takes a single string as input and reutrns the word level
      as an integer value. For example, entering the word 'hello' would return the value
      5 as the word level.
    </p>
  </body>
</div>

<div class="APIDescription" id="getLogicalChars">

  <body>
    <h4>Get Logical Chars:</h4>
    <p>
      The get logical Chars API takes a single string as input and returns an
      array of the logical characters from the string. For example, if the word 'hello'
      is entered, ['h', 'e', 'l', 'l', 'o'] is returned.
    </p>
  </body>
</div>


<div class="APIDescription" id="getWordStrength">

  <body>
    <h4>Get Word Strength:</h4>
    <p>
      The get word strength API takes a single string and returns an integer
      representing the value of the word strength. For example, submitting the word
      'hello' will return a value of 5.
    </p>
  </body>
</div>

<div class="APIDescription" id="getWordWeight">

  <body>
    <h4>Get Word Weight:</h4>
    <p>
      The get word weight API takes a single string and returns an integer
      representing the value of the word weight. For example, submitting the word
      'hello' will return a value of 5.
    </p>
  </body>
</div>

<div class="APIDescription" id="isPalindrome">

  <body>
    <h4>Is Palindrome:</h4>
    <p>
      The is palindrome API take a single string and returns true if it is a palindrome.
      For example, if the string 'racecar' is enetered True will be returned. If 'hello'
      is entered False will be returned.
    </p>
  </body>
</div>

<div class="APIDescription" id="randomize">

  <body>
    <h4>Randomize:</h4>
    <p>
      The randomize API takes a string and randomizes the order of the string and returns
      that new string. For example, if 'hello' is entered 'elhol' could be returned.
    </p>
  </body>
</div>

<div class="APIDescription" id="wordLevel">

  <body>
    <h4>Word Level:</h4>
    <p>
      The word level API takes a string and returns an integer value as the word level.
      For example, if 'hello' is enetered 5 is returned as the word level value.
    </p>
  </body>
</div>

<div class="APIDescription" id="containsSpace">

  <body>
    <h4>Contains Space:</h4>
    <p>
      The contains space API takes a string and determines if the string has a space or not.
      If a space is detected the response is True else, it is False.
    </p>
  </body>
</div>

<div class="APIDescription" id="getLengthNoSpaces">

  <body>
    <h4>Get Length No Spaces:</h4>
    <p>
      The get length no spaces API takes a string as input and determines it that string has a space. If the string
      does have a space it returns True else, it returns False.
    </p>
  </body>
</div>

<div class="APIDescription" id="parseToLogicalCharacters">

  <body>
    <h4>Parse to Logical Characters:</h4>
    <p>
      The parse to logical characters API takes a string and returns an array of logical characters.
      For example, if 'hello' is entered ['h', 'e', 'l', 'l', 'o'] is returned.
    </p>
  </body>
</div>

<div class="APIDescription" id="isAnagram">

  <body>
    <h4>Is Anagram:</h4>
    <p>
      The is anagram API takes two strings. The service checks if the first string can be made up
      of the second string. For example, input 1 is 'cat' and second string is 'tac'. This API returns true
      if the strings meet the anagram definition, otherwise it returns false.
    </p>
  </body>
</div>

<div class="APIDescription" id="startsWith">

  <body>
    <h4>Starts With:</h4>
    <p>
      The starts with API takes a string and a character as input. The service checks if the string begins with the character that is
      supplied. For example, if 'hello' and 'h' are supplied the service will return true. </p>
  </body>
</div>

<div class="APIDescription" id="endsWith">

  <body>
    <h4>Starts With:</h4>
    <p>
      The ends with API takes a string and a character as input. The service checks if the string ends with the character that is
      supplied. For example, if 'hello' and 'o' are supplied the service will return true. </p>
  </body>
</div>


<div class="APIDescription" id="containsString">

  <body>
    <h4>Contains String:</h4>
    <p>
      The contains string API takes two strings. The service checks if the second string is in the first string.
      For example, if the first input was 'Hello, World' and the second input was 'Hello' the service would return true. </p>
  </body>
</div>

<div class="APIDescription" id="containsChar">

  <body>
    <h4>Contains Char:</h4>
    <p>
      The contains char API takes a string and a character as input. The service checks if the character is in the string supplied.
      For example, if the first input is 'hello' and the second input is 'e' the service returns true. </p>
  </body>
</div>

<div class="APIDescription" id="containsLogicalChars">

  <body>
    <h4>Contains Logical Chars:</h4>
    <p>
      The contains logical chars API takes a string and a list of characters as input. The service checks if
      any of the characters are in the string.
      For example if the first input is 'hello' and the second input is ['l', 'o'] the service will
      return true. </p>
  </body>
</div>

<div class="APIDescription" id="containsAllLogicalChars">

  <body>
    <h4>Contains All Logical Chars:</h4>
    <p>
      The contains all logical chars API takes a string and a list of characters as input. The service checks if all of the characrters
      in the list are in the string.
      For example if the first input is 'hello' and the second input is ['l', 'o'] the service will
      return true. </p>
  </body>
</div>

<div class="APIDescription" id="containsLogicalCharSequence">

  <body>
    <h4>Contains All Logical Chars:</h4>
    <p>
      The contains logical char sequence API takes two strings as input. The service checks to see if the second input is a sub string
      of the first input. For example, if 'hello' and 'lo' are submitted the service will return true.</p>
  </body>
</div>


<div class="APIDescription" id="canMakeWord">

  <body>
    <h4>Can Make Word:</h4>
    <p>
      The can make word API takes two strings as input. The service checks if the second string submitted can be made from the first string.
      For example, if 'hello' and 'lo' are submitted the service will return true. </p>
  </body>
</div>

<div class="APIDescription" id="canMakeAllWords">

  <body>
    <h4>Can Make All Words:</h4>
    <p>
      The can make word API takes a string and a list of strings as input. It behaves similar to the can make word API except it will
      iterate through a list of words. </p>
  </body>
</div>

<div class="APIDescription" id="addCharacterAtEnd">

  <body>
    <h4>Add Character At End:</h4>
    <p>
      The add character at end API takes a string and a character as input. The service then appends the string with the provided character.
      For example, if 'hello' and 'a' is submitted the result will be 'helloa'.</p>
  </body>
</div>

<div class="APIDescription" id="isIntersecting">

  <body>
    <h4>Is Intersecting:</h4>
    <p>
      The is intersecting API takes two strings as input. It then checks if the second string intersects with the first string.
      For example, if 'hello' and 'el' are submitted the service returns true. </p>
  </body>
</div>

<div class="APIDescription" id="getIntersectingRank">

  <body>
    <h4>Get Intersecting Rank:</h4>
    <p>
      The get intersecting rank API take two strings as input. The service returns the rank as an integer value for the rank.
      For example, if 'hello' and 'el' are submitted the service will return 3.</p>
</div>

<div class="APIDescription" id="getUniqueIntersectingRank">

  <body>
    <h4>Get Unique Intersecting Rank:</h4>
    <p>
      The get unique intersecting rank API take two strings as input. The service returns the rank as an integer value for the rank.
      For example, if 'hello' and 'eli' are submitted the service will return 2.
</div>

<div class="APIDescription" id="compareTo">

  <body>
    <h4>Compare To:</h4>
    <p>
      The compare to API takes two strings as input. The service compares the strings and if the strings are equal the service will
      return 0. For example, if 'hello' and 'hello' are entered the service will return 0. </p>
</div>

<div class="APIDescription" id="splitWord">

  <body>
    <h4>Split Word:</h4>
    <p>
      The split word API takes a string and a integer value as input. The service will split the string into
      "chunks" based on the number
      that was provided. For example, if 'hello!' and 2 is entered the
      service will return: {'0': ['h', 'e'], '2': ['l', 'l'], '4': ['o', '!']}</p>
</div>

<div class="APIDescription" id="equals">

  <body>
    <h4>Equals:</h4>
    <p>
      The equals API takes two strings as input. The service will compare the strings and if they are equal the service will
      return true. For example, if 'hello!' and 'hello!' are entered the service will return true. </p>
</div>

<div class="APIDescription" id="equals">

  <body>
    <h4>Equals:</h4>
    <p>
      The equals API takes two strings as input. The service will compare the strings and if they are equal the service will
      return true. For example, if 'hello!' and 'hello!' are entered the service will return true. </p>
</div>


<div class="APIDescription" id="reverseEquals">

  <body>
    <h4>Reverse Equals:</h4>
    <p>
      The reverse equals API takes two strings as input. The service checks if the second string is equal to the reverse of the first string.
      For example, if 'hello!' and '!olleh' are entered the service returns true. </p>
</div>

<div class="APIDescription" id="logicalCharAt">

  <body>
    <h4>Logical Char At:</h4>
    <p>
      The logical char at API takes a string and an integer value as input. The service checks if the string contains a logical
      char at the position specified. For example, if 'hello!' and 3 are entered the service returns true. </p>
</div>

<div class="APIDescription" id="getUniqueIntersectingLogicalChars">

  <body>
    <h4>Get Unique Intersecting Logical Chars:</h4>
    <p>
      The get unique Intersecting Logical Chars takes a string and a list of characters as input. The service will return a value for the unique
      intersecting rank. For example if 'hello!' and ['l', 'l'] are entered the service will return 2. </p>
</div>

<div class="APIDescription" id="indexOf">

  <body>
    <h4>Index Of:</h4>
    <p>
      The indx of API will takes a string and a character as input. The service returns an integer value for the index of the character.
      For example, if 'hello!' and 'l' are entered the service will return 2. This API uses zero based indexing. </p>
</div>

<div class="APIDescription" id="addCharacterAt">

  <body>
    <h4>Add Character At:</h4>
    <p>
      The add character at API takes a string, an integer, and a character as input. The service will insert the character into the string at
      the specified location. For example, if 'hello!', 1, and 'e' are entered the service will return 'heelo!'. </p>
</div>

<div class="APIDescription" id="replace">

  <body>
    <h4>Replace:</h4>
    <p>
      The replace API takes a string and 3 strings as input. The service will replace the 2nd string that is found in the first string with the 3rd string.
      For example, if 'hello!', 'ell', 'i' are entered the service returns 'hio!'. </p>
</div>

<div class="APIDescription" id="baseConsonants">
  <body>
    <h4>Base Consonants:</h4>
    <p> The base consonants API takes two strings as input. The API processes the strings
      to see if the strings contain the same consonants and have the same length. For example,
      if moon and maan are entered, the service will return true.
    </p>
</div>

<div class="APIDescription" id="areLadderWords">
  <body>
    <h4>Are Ladder Words:</h4>
    <p>
      The are ladder words takes 2 strings and processes the string to see if the 
      strings are equal in length and if they differ by 1 logical Character. For example, 
      if input 1 is Cold and input 2 is Cord the service returns true. 
    </p>
</div>

<div class="APIDescription" id="headAndTail">
  <body>
    <h4>Head and Tail:</h4>
    <p>
      The head and tail API takes 2 strings as input and checks if the 
      last character of the first word is the same as the first character of the second word. 
      For example, if cat and tin are entered the service returns true. 
    </p>
</div>


<link rel="stylesheet" href="<?= $root ?>css/style.css">


</html>