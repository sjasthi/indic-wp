<!DOCTYPE html>
<html lang="en">
<?php
$root = 'http://' . $_SERVER['HTTP_HOST'] . '/wpapi/';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indic Language Word Processor APIs</title>

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
                <a class="nav-link" href="api.php">API Docs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $root ?>parser.php">Parser</a>
            </li>
        </ul>
        <span class="navbar-brand mb-0 h1">wpapi WebServices</span>
        <a class="btn btn-dark" href="../indic_classic.php">Classic wpapi</a>
        <button class="btn btn-light" value="light" onclick="changeTheme(this)" id="theme">Light Mode</button>
    </div>
</nav>

<div class="APIDescriptionTop" ="top">
    <h2>Getting Started with the WPAPI </h2>
        <p>
        How to use the WPAPIs @ telugupuzzles?.
        </p>
        <p>
        We currently have 51 APIs to process Telugu strings to enable prorammers to develop puzzle applications.
        </p>
    <h3>How to use the API URLs</h3>
        <p>
        The URL for any API is </p>
        <div class="codeBlock">
            <!-- Will need to update with actual link once service is posted.  -->
            https://wpapi.telugupuzzles.com/api/SERVICENAME.PHP?input1='hello'&input2='English' 
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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLength.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getLength.php?string=hello&language=English</a>
    </p>
  </body>
</div>

<div class="APIDescription" id="reverse">
  <body>
    <h4>Reverse:</h4>
    <p>
    The reverse API takes a single string as input and returns
    the reverse of the input string. For example, entering racecar would
    return racecar :) . Also, entering moon would return noom. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/reverse.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/reverse.php?string=hello&language=English</a>
    
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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getCodePointLength.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getCodePointLength.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getCodePoints.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getCodePoints.php?string=hello&language=English</a>


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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getWordLevel.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getWordLevel.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLogicalChars.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getLogicalChars.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getWordStrength.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getWordStrength.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getWordWeight.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getWordWeight.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/isPalindrome.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/isPalindrome.php?string=hello&language=English</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="randomize">
  <body>
    <h4>Randomize:</h4>
    <p>
    The randomize API takes a string and randomizes the order of the string and returns
    that new string. For example, if 'hello' is entered 'elhol' could be returned.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/randomize.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/randomize.php?string=hello&language=English</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="wordLevel">
  <body>
    <h4>Word Level:</h4>
    <p>
    The word level API takes a string and returns an integer value as the word level.
    For example, if 'hello' is enetered 5 is returned as the word level value. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getWordLevel.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getWordLevel.php?string=hello&language=English</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="containsSpace">
  <body>
    <h4>Contains Space:</h4>
    <p>
    The contains space API takes a string and determines if the string has a space or not. 
    If a space is detected the response is True else, it is False. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsSpace.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/containsSpace.php?string=hello&language=English</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="getLengthNoSpaces">
  <body>
    <h4>Get Length No Spaces:</h4>
    <p>
    The get length no spaces API takes a string as input and determines it that string has a space. If the string 
    does have a space it returns True else, it returns False. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLengthNoSpaces.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/getLengthNoSpaces.php?string=hello&language=English</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="parseToLogicalCharacters">
  <body>
    <h4>Parse to Logical Characters:</h4>
    <p>
    The parse to logical characters API takes a string and returns an array of logical characters. 
    For example, if 'hello' is entered ['h', 'e', 'l', 'l', 'o'] is returned.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/parseToLogicalCharacters.php?string=hello&language=English">Link to API: https://wpapi.telugupuzzles.com/api/parseToLogicalCharacters.php?string=hello&language=English</a>

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
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/isAnagram.php?input1=cat&input2=English&input3=tac">Link to API: https://wpapi.telugupuzzles.com/api/isAnagram.php?input1=cat&input2=English&input3=tac</a>

    </p>
  </body>
</div>

<div class="APIDescription" id="startsWith">
  <body>
    <h4>Starts With:</h4>
    <p>
    The starts with API takes a string and a character as input. The service checks if the string begins with the character that is
    supplied. For example, if 'hello' and 'h' are supplied the service will return true. </p>
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/startswith.php?input1=hello&input2=English&input3=h">Link to API: https://wpapi.telugupuzzles.com/api/startswith.php?input1=hello&input2=English&input3=h</a>

  </body>
</div>

<div class="APIDescription" id="endsWith">
  <body>
    <h4>Ends With:</h4>
    <p>
    The ends with API takes a string and a character as input. The service checks if the string ends with the character that is
    supplied. For example, if 'hello' and 'o' are supplied the service will return true. </p>
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/endswith.php?input1=hello&input2=English&input3=o">Link to API: https://wpapi.telugupuzzles.com/api/endswith.php?input1=hello&input2=English&input3=o</a>

  </body>
</div>


<div class="APIDescription" id="containsString">
  <body>
    <h4>Contains String:</h4>
    <p>
    The contains string API takes two strings. The service checks if the second string is in the first string. 
    For example, if the first input was 'Hello, World' and the second input was 'Hello' the service would return true. </p>
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsString.php?input1=hello&input2=English&input3=hello">Link to API: https://wpapi.telugupuzzles.com/api/containsString.php?input1=hello&input2=English&input3=hello</a>

  </body>
</div>

<div class="APIDescription" id="containsChar">
  <body>
    <h4>Contains Char:</h4>
    <p>
    The contains char API takes a string and a character as input. The service checks if the character is in the string supplied. 
    For example, if the first input is 'hello' and the second input is 'e' the service returns true. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsChar.php?input1=hello&input2=English&input3=e">Link to API: https://wpapi.telugupuzzles.com/api/containsChar.php?input1=hello&input2=English&input3=e</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="containsLogicalChars">
  <body>
    <h4>Contains Logical Chars:</h4>
    <p>
    The contains logical chars API takes a string and a list of characters as input. The service checks if 
    any of the characters are in the string.
    For example if the first input is 'hello' and the second input is ['l', 'o'] the service will
    return true. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsLogicalChars.php?input1=hello&input2=English&input3=l,o">Link to API: https://wpapi.telugupuzzles.com/api/containsLogicalChars.php?input1=hello&input2=English&input3=l,o</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="containsAllLogicalChars">
  <body>
    <h4>Contains All Logical Chars:</h4>
    <p>
    The contains all logical chars API takes a string and a list of characters as input. The service checks if all of the characrters
    in the list are in the string. 
    For example if the first input is 'hello' and the second input is ['l', 'o'] the service will
    return true. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsAllLogicalChars.php?input1=hello&input2=English&input3=l,o">Link to API: https://wpapi.telugupuzzles.com/api/containsAllLogicalChars.php?input1=hello&input2=English&input3=l,o</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="containsLogicalCharSequence">
  <body>
    <h4>Contains Logical Char Sequence:</h4>
    <p>
    The contains logical char sequence API takes two strings as input. The service checks to see if the second input is a sub string 
    of the first input. For example, if 'hello' and 'lo' are submitted the service will return true.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/containsLogicalCharsequence.php?input1=hello&input2=English&input3=lo">Link to API: https://wpapi.telugupuzzles.com/api/containsLogicalCharsequence.php?input1=hello&input2=English&input3=lo</a>

   </p>
  </body>
</div>


<div class="APIDescription" id="canMakeWord">
  <body>
    <h4>Can Make Word:</h4>
    <p>
    The can make word API takes two strings as input. The service checks if the second string submitted can be made from the first string.
    For example, if 'hello' and 'lo' are submitted the service will return true. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/canmakeword.php?input1=hello&input2=English&input3=lo">Link to API: https://wpapi.telugupuzzles.com/api/canmakeword.php?input1=hello&input2=English&input3=lo</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="canMakeAllWords">
  <body>
    <h4>Can Make All Words:</h4>
    <p>
    The can make word API takes a string and a list of strings as input. It behaves similar to the can make word API except it will 
    iterate through a list of words. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/canmakeallwords.php?input1=hello&input2=English&input3=lo">Link to API: https://wpapi.telugupuzzles.com/api/canmakeallwords.php?input1=hello&input2=English&input3=lo</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="addCharacterAtEnd">
  <body>
    <h4>Add Character At End:</h4>
    <p>
    The add character at end API takes a string and a character as input. The service then appends the string with the provided character.
    For example, if 'hello' and 'a' is submitted the result will be 'helloa'.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/addCharacterAtEnd.php?input1=hello&input2=English&input3=a">Link to API: https://wpapi.telugupuzzles.com/api/addCharacterAtEnd.php?input1=hello&input2=English&input3=a</a>

  </p>
  </body>
</div>

<div class="APIDescription" id="isIntersecting">
  <body>
    <h4>Is Intersecting:</h4>
    <p>
    The is intersecting API takes two strings as input. It then checks if the second string intersects with the first string. 
    For example, if 'hello' and 'el' are submitted the service returns true. </p>
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/addCharacterAtEnd.php?input1=hello&input2=English&input3=a">Link to API: https://wpapi.telugupuzzles.com/api/addCharacterAtEnd.php?input1=hello&input2=English&input3=a</a>
    
  </body>
</div>

<div class="APIDescription" id="getIntersectingRank">
  <body>
    <h4>Get Intersecting Rank:</h4>
    <p>
    The get intersecting rank API take two strings as input. The service returns the rank as an integer value for the rank. 
    For example, if 'hello' and 'el' are submitted the service will return 3.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getIntersectingRank.php?input1=hello&input2=English&input3=el">Link to API: https://wpapi.telugupuzzles.com/api/getIntersectingRank.php?input1=hello&input2=English&input3=el</a>

  </p> 
</div>

<div class="APIDescription" id="getUniqueIntersectingRank">
  <body>
    <h4>Get Unique Intersecting Rank:</h4>
    <p>
    The get unique intersecting rank API take two strings as input. The service returns the rank as an integer value for the rank. 
    For example, if 'hello' and 'eli' are submitted the service will return 2. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getUniqueIntersectingRank.php?input1=hello&input2=English&input3[0]=e&input3[1]=l&input3[2]=i">Link to API: https://wpapi.telugupuzzles.com/api/getUniqueIntersectingRank.php?input1=hello&input2=English&input3[0]=e&input3[1]=l&input3[2]=i</a>

            </p>
</div>

<div class="APIDescription" id="compareTo">
  <body>
    <h4>Compare To:</h4>
    <p>
    The compare to API takes two strings as input. The service compares the strings and if the strings are equal the service will 
    return 0. For example, if 'hello' and 'hello' are entered the service will return 0. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/compareTo.php?input1=hello&input2=English&input3=hello">Link to API: https://wpapi.telugupuzzles.com/api/compareTo.php?input1=hello&input2=English&input3=hello</a>

  </p>
</div>

<div class="APIDescription" id="splitWord">
  <body>
    <h4>Split Word:</h4>
    <p>
    The split word API takes a string and a integer value as input. The service will split the string into 
    "chunks" based on the number 
    that was provided. For example, if 'hello!' and 2 is entered the 
    service will return: {'0': ['h', 'e'], '2': ['l', 'l'], '4': ['o', '!']}
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/splitword.php?input1=hello!&input2=English&input3=2">Link to API: https://wpapi.telugupuzzles.com/api/splitword.php?input1=hello!&input2=English&input3=2</a>

  </p>
</div>

<div class="APIDescription" id="equals">
  <body>
    <h4>Equals:</h4>
    <p>
    The equals API takes two strings as input. The service will compare the strings and if they are equal the service will 
    return true. For example, if 'hello!' and 'hello!' are entered the service will return true. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/equals.php?input1=hello&input2=English&input3=hello">Link to API: https://wpapi.telugupuzzles.com/api/equals.php?input1=hello&input2=English&input3=hello</a>

  </p>
</div>


<div class="APIDescription" id="reverseEquals">
  <body>
    <h4>Reverse Equals:</h4>
    <p>
    The reverse equals API takes two strings as input. The service checks if the second string is equal to the reverse of the first string. 
    For example, if 'hello!' and '!olleh' are entered the service returns true.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/reverseequals.php?input1=hello!&input2=English&input3=!olleh">Link to API: https://wpapi.telugupuzzles.com/api/reverseequals.php?input1=hello!&input2=English&input3=!olleh</a>

  </p>
</div>

<div class="APIDescription" id="logicalCharAt">
  <body>
    <h4>Logical Char At:</h4>
    <p>
    The logical char at API takes a string and an integer value as input. The service checks if the string contains a logical 
    char at the position specified. For example, if 'hello!' and 3 are entered the service returns the item at the index. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/logicalCharAt.php?input1=hello!&input2=English&input3=3">Link to API: https://wpapi.telugupuzzles.com/api/logicalCharAt.php?input1=hello!&input2=English&input3=3</a>

  </p>
</div>

<div class="APIDescription" id="getUniqueIntersectingLogicalChars">
  <body>
    <h4>Get Unique Intersecting Logical Chars:</h4>
    <p>
    The get unique Intersecting Logical Chars takes a string and a list of characters as input. The service will return a value for the unique 
    intersecting rank. For example if 'hello!' and ['l', 'l'] are entered the service will return 2.
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/getUniqueIntersectingLogicalChars.php?input1=hello!&input2=English&input3[0]=l&input3[1]=l">Link to API: https://wpapi.telugupuzzles.com/api/getUniqueIntersectingLogicalChars.php?input1=hello!&input2=English&input3[0]=l&input3[1]=l</a>

  </p>
</div>

<div class="APIDescription" id="indexOf">
  <body>
    <h4>Index Of:</h4>
    <p>
    The indx of API will takes a string and a character as input. The service returns an integer value for the index of the character. 
    For example, if 'hello!' and 'l' are entered the service will return 2. This API uses zero based indexing. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/indexof.php?input1=hello!&input2=English&input3=l">Link to API: https://wpapi.telugupuzzles.com/api/indexof.php?input1=hello!&input2=English&input3=l</a>

  </p>
</div>

<div class="APIDescription" id="addCharacterAt">
  <body>
    <h4>Add Character At:</h4>
    <p>
    The add character at API takes a string, an integer, and a character as input. The service will insert the character into the string at 
    the specified location. For example, if 'hello!', 1, and 'e' are entered the service will return 'heelo!'. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/addCharacterAt.php?input1=hello!&input2=English&input3=1&input4=e">Link to API: https://wpapi.telugupuzzles.com/api/addCharacterAt.php?input1=hello!&input2=English&input3=1&input4=e</a>

  </p>
</div>

<div class="APIDescription" id="replace">
  <body>
    <h4>Replace:</h4>
    <p>
    The replace API takes a string and 3 strings as input. The service will replace the 2nd string that is found in the first string with the 3rd string. 
    For example, if 'hello!', 'ell', 'i' are entered the service returns 'hio!'. 
    <br>
    <a href="https://wpapi.telugupuzzles.com/api/replace.php?input1=hello!&input2=English&input3=ell&input4=i">Link to API: https://wpapi.telugupuzzles.com/api/replace.php?input1=hello!&input2=English&input3=ell&input4=i</a>

  </p>
</div>

<div class="APIDescription" id="baseConsonants">
  <body>
    <h4>Base Consonants:</h4>
    <p> The base consonants API takes two strings as input. The API processes the strings
      to see if the strings contain the same consonants and have the same length. For example,
      if moon and maan are entered, the service will return true.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/baseConsonants.php?input1=moon&input2=English&input3=maan">Link to API: https://wpapi.telugupuzzles.com/api/baseConsonants.php?input1=moon&input2=English&input3=moan</a>

      
    </p>
</div>

<div class="APIDescription" id="areLadderWords">
  <body>
    <h4>Are Ladder Words:</h4>
    <p>
      The are ladder words takes 2 strings and processes the string to see if the 
      strings are equal in length and if they differ by 1 logical Character. For example, 
      if input 1 is Cold and input 2 is Cord the service returns true. 
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/areLadderWords.php?input1=Cold&input2=English&input3=Cord">Link to API: https://wpapi.telugupuzzles.com/api/areLadderWords.php?input1=Cold&input2=English&input3=Cord</a>


    </p>
</div>

<div class="APIDescription" id="headAndTail">
  <body>
    <h4>Head and Tail:</h4>
    <p>
      The head and tail API takes 2 strings as input and checks if the 
      last character of the first word is the same as the first character of the second word. 
      For example, if cat and tin are entered the service returns true. 
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/areHeadAndTailWords.php?input1=cat&input2=English&input3=tin">Link to API: https://wpapi.telugupuzzles.com/api/areHeadAndTailWords.php?input1=cat&input2=English&input3=tin</a>
 
    </p>
</div>

<div class="APIDescription" id="getFillerCharacters">
  <body>
    <h4>Get Filler Characters:</h4>
    <p>
      The get filler API takes a character count to and the type of character (vowel or consonant) and returns the type and count of those vowels. For example,
      If 10 and vowel are entered, the service returns 10 random vowels.   
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getFillerCharacters.php?input1=10&input2=English&input3=vowel">Link to API: https://wpapi.telugupuzzles.com/api/getFillerCharacters.php?input1=10&input2=English&input3=vowel</a>
 
    </p>
</div>

<div class="APIDescription" id="CompareToIgnoreCase">
  <body>
    <h4>Compare To Ignore Case:</h4>
    <p>
      The Compare to Ignore Case API takes two Strings and compares them to one another. This API is not case senstive, meaning if 
      a lowercase letter will be equal to its uppercase counterpart.   
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/compareToIgnoreCase.php?input1=HELLO&input2=English&input3=Denver">Link to API: https://wpapi.telugupuzzles.com/api/compareToIgnoreCase.php?input1=HELLO&input2=English&input3=DENVER</a>
 
    </p>
</div>


<div class="APIDescription" id="getLength2">
  <body>
    <h4>Get Length2:</h4>
    <p>
      The get length API takes a two parameters the first input is a string and the second input is the Language.
      This API returns the length of the string. If you have the word Colorado it returns 8.  
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLength2.php?input1=Colorado&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/getLength2.php?input1=Colorado&input2=English</a>
 
    </p>
</div>

<div class="APIDescription" id="getLengthNoSpacesNoCommas">
  <body>
    <h4>Get Length No spaces No Commas:</h4>
    <p>
    The get length API takes a two parameters the first input is a string and the second input is the Language. It ignores all commas. 
      and spaces This API returns the length of the string. If you have the string I love Colorado, it returns 13.  
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLengthNoSpacesNoCommas.php?input1=I love, Colorado&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/getLengthNoSpacesNoCommas.php?input1=I love, Colorado&input2=English</a>
 
    </p>
</div>


<div class="APIDescription" id="getLogicalChars2">
  <body>
    <h4>Get Logical Chars 2 :</h4>
    <p>
    The get logical Chars API takes a single string as input and returns an 
    array of the logical characters from the string.It removes a set of special characters For example, if the word 'hello'
    is entered, ['h', 'e', 'l', 'l', 'o'] is returned.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLogicalChars2.php?input1=hello&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/getLogicalChars2.php?input1=hello&input2=English</a>
 
    </p>
</div>

<div class="APIDescription" id="splitInto15Chunks">
  <body>
    <h4>Split Into 15 Chunks :</h4>
    <p>
    The Split Into 15 chunks API takes two inputs. The first is a string and the second is the language
    After Which it will break that string into 15 pieces randomly. But will retain its order. If you have ABCDEFGHIJKLMNOP
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/splitInto15Chunks.php?input1=ABCDEFGHIJKLMNOP&input2=english">Link to API: https://wpapi.telugupuzzles.com/api/splitInto15Chunks.php?input1=ABCDEFGHIJKLMNOP&input2=english</a>
 
    </p>
</div>

<div class="APIDescription" id="getBaseCharacters">
  <body>
    <h4>get Base Characters :</h4>
    <p>
    Gets the Base Characters oF Telugu letters.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getBaseCharacters.php?input1=ABCDEFGHIJKLMNOP&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/getaBaseCharacters.php?input1=ABCDEFGHIJKLMNOP&input2=English</a>
 
    </p>
</div>



<div class="APIDescription" id="isCharConsonant">
  <body>
    <h4>Is Character Consonant :</h4>
    <p>
    This API takes two parameters. The first Parameter being a single Char, and the other other a language.
    It will then check if the char is a consonant or not and return true if it is, false if it is not.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/isCharConsonant.php?input1=A&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/isCharConsonant.php?input1=A&input2=English</a>
 
    </p>
</div>


<div class="APIDescription" id="isCharConsonant">
  <body>
    <h4>Is Character Vowel :</h4>
    <p>
    This API takes two parameters. The first Parameter being a single Char, and the other other a language.
    It will then check if the char is a Vowel or not and return true if it is, false if it is not.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/isCharVowel.php?input1=A&input2=English">Link to API: https://wpapi.telugupuzzles.com/api/isCharVowel.php?input1=A&input2=English</a>
 
    </p>
</div>


<div class="APIDescription" id="isCharConsonant">
  <body>
    <h4>Get Match Id String :</h4>
    <p>
    This API takes Three parameters. The first is a string, the second the language and the third another string. This APi
    represents the second string trying to guess what the first string is. If a character in the second string is in the same position and is the same character
    you the string will return a 1. if a character in the second string is not in the same position as the first but exist in the first string 
    it returns a 2. IF the character in the second string does not exist in the first string at all it'll return a 5. If String1= hello 
    and string 2=hello than it'll return 11111 because the characters in string two are the same and in the same position.
    If string 1= hello and string 2= elloh than that returns 21222. And If string 1= Hello and string 2=SamSu. Then itll return 5555
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/get_match_id_string.php?input1=Hello&input2=english&input3=Hello">Link to API: https://wpapi.telugupuzzles.com/api/get_match_id_string.php?input1=Hello&input2=english&input3=Hello</a>
 
    </p>
</div>


<div class="APIDescription" id="userExist">
  <body>
    <h4>User Exist :</h4>
    <p>
     This API takes in one input. The input being an email. It will check if the email exist in the indic_WP database.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/UserExists.php?email=ics499@gmail.com">Link to API: https://wpapi.telugupuzzles.com/api/UserExists.php?email=ics499@gmail.com</a>
 
    </p>
</div>
<div class="APIDescription" id="ws_login">
  <body>
    <h4>ws_Login :</h4>
    <p>
     This API takes in two inputs. The first input being an email and the second being a password. It will check if the email exist in the indic_WP database and then see if the passwords match
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/ws_login.php?email=ics499@gmail.com&password=spring22">https://wpapi.telugupuzzles.com/api/ws_login.php?email=ics499@gmail.com&password=spring22</a>
 
    </p>
</div>


<div class="APIDescription" id="getRole">
  <body>
    <h4>Get Role :</h4>
    <p>
      This API takes in a single input. The input being an email. If the email exists in the indic_Wp database it will return that users role.
      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getRole.php?email=ics499@gmail.com">https://wpapi.telugupuzzles.com/api/getRole.php?email=ics499@gmail.com</a>
 
    </p>
</div>



<div class="APIDescription" id="getLangForString">
  <body>
    <h4>Get Language For String :</h4>
    <p>
This Api Takes a single input. The input being a string. The Api Will figure out if the string is English or Telugu. 
If the whole string is in telugu than it will return telugu. If the entire string is in english it wil return english
Other wise it will return other.      <br>
    <a href="https://wpapi.telugupuzzles.com/api/getLangForString.php?input1=hello">https://wpapi.telugupuzzles.com/api/getLangForString.php?input1=hello</a>
 
    </p>
</div>


<div class="APIDescription" id="getRandomLogicalChars">
  <body>
    <h4>Get Random Logical Chars :</h4>
    <p>
This Api Takes a two inputs. The first input being an int(N) and the second one a string(language). The API will return a random set of logical Chars
based on the N value. If input1=4 and language=english. It will return 4 random logical chars.     <br>
    <a href="https://wpapi.telugupuzzles.com/api/getRandomLogicalChars.php?input1=4&input2=english">https://wpapi.telugupuzzles.com/api/getRandomLogicalChars.php?input1=4&input2=english</a>
 
    </p>
</div>





<link rel="stylesheet" href="../../wpapi/css/style.css">

</html>
