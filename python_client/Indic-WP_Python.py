import os

import requests
import json

import dominate
from dominate.tags import *

def getDecode(jsonToDecode):
	data_decoded = jsonToDecode.encode().decode('utf-8-sig')
	data_decoded2 = data_decoded.encode().decode('utf-8-sig')
	return data_decoded2

#User will select English or Telugu. 
print("Welcome to the indic-WP Python test client.")
print("Please Press 1 to run tests in English or 2 to run tests in Telugu...")
userInput = input()

if userInput == '1':

    print('English selected...')
    #################################
    #################################
    ####### GET LENGTH API ##########
    # Input1 is a string that the length is needed. A integer value is returned. 
    # Spaces are counted as characters. 
    #################################
    #################################
    getLengthservice = 'getLength'
    getLengthinput1 = 'hello'
    getLengthinput2 = 'NA'
    getLengthinput3 = 'NA'
    getLengthlanguage = 'English'
    url = 'http://localhost/indic-wp/api/getlength.php?string='+ getLengthinput1 + '&language=' + getLengthlanguage
    getLengthURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthexpectedResults = 5
    getLengthactualResult = x.get('data')
    getLengthpassOrFaill = 'Pass' if getLengthactualResult == x.get('data') else 'Failed'
    getLengthjsonOUTPUT = x

    #################################
    #################################
    ####### GET REVERSE API #########
    # Input1 is a string that is reversed. 
    # The output is the reveresed String
    #################################
    #################################
    reverseService = 'reverse'
    reverseInput1 = 'hello'
    reverseInput2 = 'NA'
    reverseInput3 = 'NA'
    reverseLanguage = 'English'
    url = 'http://localhost/indic-wp/api/reverse.php?string='+reverseInput1+'&language='+reverseLanguage
    reverseURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    reverseExpectedResults = 'olleh'
    reverseActualResult = x.get('data')
    reversePassOrFaill = 'Pass' if reverseExpectedResults == x.get('data') else 'Failed'
    reverseJsonOUTPUT = x

    #################################
    #################################
    ### GET CODE POINT LENGTH API ###
    # Input1 is a string that needs to have the code point length measured.
    #################################
    #################################
    getCodePointLengthService = 'getCodePointLength'
    getCodePointLengthInput1 = 'hello'
    getCodePointLengthInput2 = 'NA'
    getCodePointLengthInput3 = 'NA'
    url = 'http://localhost/indic-wp/api/getCodePointLength.php?string=hello&language=English'
    getCodePointLengthURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getCodePointLengthExpectedResults = 5
    getCodePointLengthActualResult = x.get('data')
    getCodePointLengthPassOrFaill = 'Pass' if getCodePointLengthExpectedResults == x.get('data') else 'Failed'
    getCodePointLengthJsonOUTPUT = x

    #################################
    #################################
    ###### GET CODE POINTS API ######
    # Input1 is a string that needs to have the code point length measured.
    #################################
    #################################
    getCodePointshService = 'getCodePoints'
    getCodePointsInput1 = 'hello'
    getCodePointsInput2 = 'NA'
    getCodePointsInput3 = 'NA'
    getCodePointsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getCodePoints.php?string='+getCodePointsInput1+'&language='+getCodePointsLanguage
    getCodePointsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getCodePointsExpectedResults =  [[104], [101], [108], [108], [111]]
    getCodePointsActualResult = x.get('data')
    getCodePointsPassOrFaill = 'Pass' if getCodePointsExpectedResults == x.get('data') else 'Failed'
    getCodePointsJsonOUTPUT = x

    #################################
    #################################
    ######  GET WORD LEVEL API  #####
    # Input1 is a string that has the word level calculated. The Service
    # returns an integer value for the word value. 
    #################################
    #################################
    getwordLevelService = 'wordLevel'
    getwordLevelInput1 = 'hello'
    getwordLevelInput2 = 'NA'
    getwordLevelInput3 = 'NA'
    getWordLevelLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getwordLevel.php?string='+getwordLevelInput1+'&language='+ getWordLevelLanguage
    getWordLevelURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getwordLevelExpectedResults = 5
    getwordLevelActualResult = x.get('data')
    getwordLevelPassOrFaill = 'Pass' if getwordLevelExpectedResults == x.get('data') else 'Failed'
    getwordLevelJsonOUTPUT = x

    #################################
    #################################
    ######  GET WORD LEVEL API  #####
    # Input1 is a string that and this API returns the expected logical characters of the 
    # input string.
    #################################
    #################################
    getLogicalCharsService = 'getLogicalChars'
    getLogicalCharsInput1 = 'hello'
    getLogicalCharsInput2 = 'NA'
    getLogicalCharsInput3 = 'NA'
    getLogicalCharsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getLogicalChars.php?string='+getLogicalCharsInput1+'&language='+getLogicalCharsLanguage
    getLogicalCharsURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLogicalCharsExpectedResults = ['h', 'e', 'l', 'l', 'o']
    getLogicalCharsActualResult = x.get('data')
    getLogicalCharsPassOrFaill = 'Pass' if getLogicalCharsExpectedResults == x.get('data') else 'Failed'
    getLogicalCharsJsonOUTPUT = x

    #################################
    #################################
    ####  GET WORD STRENGTH API  ####
    # Input1 is a string that has the word strength calculated. The Service
    # returns an integer value for the strength value. 
    #################################
    #################################
    getWordStrengthService = 'getWordStrength'
    getWordStrengthInput1 = 'hello'
    getWordStrengthInput2 = 'NA'
    getWordStrengthInput3 = 'NA'
    getWordStrengthLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getWordStrength.php?string='+getWordStrengthInput1+'&language='+getWordStrengthLanguage
    getWordStrengthURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getWordStrengthExpectedResults = 5
    getWordStrengthActualResult = x.get('data')
    getWordStrengthPassOrFaill = 'Pass' if getWordStrengthExpectedResults == x.get('data') else 'Failed'
    getWordStrengthJsonOUTPUT = x

    #################################
    #################################
    ####  GET WORD WEIGHT API  ####
    # Input1 is a string that has the word weight calculated. The Service
    # returns an integer value for the word weight. 
    #################################
    #################################    
    getWordWeightService = 'getWordWeight'
    getWordWeightInput1 = 'hello'
    getWordWeightInput2 = 'NA'
    getWordWeightInput3 = 'NA'
    getWordWeightLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getWordWeight.php?string='+getWordWeightInput1+'&language=' + getWordWeightLanguage
    getWordWeightURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getWordWeightExpectedResults = 5
    getWordWeightActualResult = x.get('data')
    getWordWeightPassOrFaill = 'Pass' if getWordWeightExpectedResults == x.get('data') else 'Failed'
    getWordWeightJsonOUTPUT = x


    #################################
    #################################
    ######  IS PALINDROME API  ######
    # Input1 is a string that will be checked if it is a palindrome
    # It returns true if a word is a palindrome. For example, racecar returns true.
    #################################
    ################################# 
    isPalindromeService = 'isPalindrome'
    isPalindromeInput1 = 'hello'
    isPalindromeInput2 = 'NA'
    isPalindromeInput3 = 'NA'
    isPalindromeLanguage = 'English'
    url = 'http://localhost/indic-wp/api/isPalindrome.php?string='+isPalindromeInput1+'&language=' + isPalindromeLanguage
    isPalindromeURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isPalindromeExpectedResults = False
    isPalindromeActualResult = x.get('data')
    isPalindromePassOrFaill = 'Pass' if isPalindromeExpectedResults == x.get('data') else 'Failed'
    isPalindromeJsonOUTPUT = x


    #################################
    #################################
    ######  IS RANDOMIZE API  #######
    # Input1 is a string that will be randomized. 
    # The API returns a randomized version of the string.
    #################################
    ################################# 
    randomizeService = 'randomize'
    randomizeInput1 = 'hello'
    randomizeInput2 = 'NA'
    randomizeInput3 = 'NA'
    randomizeLanguage = 'English'
    url = 'http://localhost/indic-wp/api/randomize.php?string='+randomizeInput1+'&language=' + randomizeLanguage
    randomizeURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    randomizeExpectedResults = 'Not ' + randomizeInput1
    randomizeActualResult = x.get('data')
    randomizePassOrFaill = 'Pass' if randomizeInput1 != x.get('data') else 'Failed'
    randomizeJsonOUTPUT = x

    #################################
    #################################
    #####  CONTAINS SPACE API  ######
    # Input1 is a string that will be processed to find out if there is a space in the string. 
    # The API returns True or False
    #################################
    ################################# 
    containsSpaceService = 'containsSpace'
    containsSpaceInput1 = 'hello'
    containsSpaceInput2 = 'NA'
    containsSpaceInput3 = 'NA'
    containsSpaceLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsSpace.php?string='+containsSpaceInput1+'&language=' + containsSpaceLanguage
    containsSpaceURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsSpaceExpectedResults = False
    containsSpaceActualResult = x.get('data')
    containsSpacePassOrFaill = 'Pass' if containsSpaceExpectedResults == x.get('data') else 'Failed'
    containsSpaceJsonOUTPUT = x

    #################################
    #################################
    ### GET LENGTH NO SPACES API ###
    # Input1 is a string that will be processed to calculate the length 
    # minus the spaces in the string.
    # The API returns the length minus the spaces in the string.  
    #################################
    ################################# 
    getLengthNoSpacesService = 'getLengthNoSpaces'
    getLengthNoSpacesInput1 = 'hello world'
    getLengthNoSpacesInput2 = 'NA'
    getLengthNoSpacesInput3 = 'NA'
    getLengthNoSpacesLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getLengthNoSpaces.php?string='+getLengthNoSpacesInput1+'&language=' + getLengthNoSpacesLanguage
    getLengthNoSpacesURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthNoSpacesExpectedResults = 10
    getLengthNoSpacesActualResult = x.get('data')
    getLengthNoSpacesPassOrFaill = 'Pass' if getLengthNoSpacesExpectedResults == x.get('data') else 'Failed'
    getLengthNoSpacesJsonOUTPUT = x


    #################################
    #################################
    # GET LENGTH NO SPACES NO COMMAS API #
    # Input1 is a string that will be processed to calculate the length 
    # minus the spaces and commas in the string.
    # The API returns the length minus the spaces and commas in the string.  
    #################################
    ################################# 
    getLengthNoSpacesNoCommasService = 'getLengthNoSpacesNoCommas'
    getLengthNoSpacesNoCommasInput1 = 'hello, World'
    getLengthNoSpacesNoCommasInput2 = 'NA'
    getLengthNoSpacesNoCommasInput3 = 'NA'
    getLengthNoSpacesNoCommasLanguage= 'English'
    url = 'http://localhost/indic-wp/api/getLengthNoSpacesNoCommas.php?string='+getLengthNoSpacesNoCommasInput1+'&language=' + getLengthNoSpacesNoCommasLanguage
    getLengthNoSpacesNoCommasURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthNoSpacesNoCommasExpectedResults = 10
    getLengthNoSpacesNoCommasActualResult = x.get('data')
    getLengthNoSpacesNoCommasPassOrFaill = 'Pass' if getLengthNoSpacesNoCommasExpectedResults == x.get('data') else 'Failed'
    getLengthNoSpacesNoCommasJsonOUTPUT = x

    #################################
    #################################
    ### PARSE TO LOGICAL CHAR API ###
    # Input1 is a string that will be processed and parsed out to logical characters.
    # The API returns the parsed out characters. 
    #################################
    ################################# 
    parseToLogicalCharsService = 'parseToLogicalChars'
    parseToLogicalCharsInput1 = 'hello'
    parseToLogicalCharsInput2 = 'NA'
    parseToLogicalCharsInput3 = 'NA'
    parseToLogicalCharsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/parseToLogicalChars.php?string='+parseToLogicalCharsInput1+'&language='+parseToLogicalCharsLanguage
    ParseToLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    parseToLogicalCharsExpectedResults = ['h', 'e', 'l', 'l', 'o']
    parseToLogicalCharsActualResult = x.get('data')
    parseToLogicalCharsPassOrFaill = 'Pass' if parseToLogicalCharsExpectedResults == x.get('data') else 'Failed'
    parseToLogicalCharsJsonOUTPUT = x

    #################################
    #################################
    #PARSE TO LOGICAL CHARACTERS API#
    # Input1 is a string that will be processed and parsed out to logical characters.
    # The API returns the parsed out characters. 
    #################################
    ################################# 
    parseToLogicalCharactersService = 'parseToLogicalCharacters'
    parseToLogicalCharactersInput1 = 'hello'
    parseToLogicalCharactersInput2 = 'NA'
    parseToLogicalCharactersInput3 = 'NA'
    parseToLogicalCharactersLanguage = 'English'
    url = 'http://localhost/indic-wp/api/parseToLogicalChars.php?string='+parseToLogicalCharactersInput1+'&language='+parseToLogicalCharactersLanguage
    parseToLogicalCharactersURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    parseToLogicalCharactersExpectedResults = ['h', 'e', 'l', 'l', 'o']
    parseToLogicalCharactersActualResult = x.get('data')
    parseToLogicalCharactersPassOrFaill = 'Pass' if parseToLogicalCharactersExpectedResults == x.get('data') else 'Failed'
    parseToLogicalCharactersJsonOUTPUT = x

    #################################
    #################################
    ####### IS ANAGRAM API ##########
    # NEEDS TO BE UPDATED FOR 2 INPUTS. NOT CURRENTLY WORKING CORRECTLY.
    #################################
    ################################# 
##### isAnagram needs to be fixed to take 2 inputs. Currently only taking one. 
    isAnagramService = 'isAnagram'
    isAnagramInput1 = 'hello'
    isAnagramInput2 = 'ellho'
    isAnagramInput3 = 'NA'
    isAnagramLanguage = 'Language'
    url = 'http://localhost/indic-wp/api/isAnagram.php?input1='+isAnagramInput1+'&input2=' + isAnagramLanguage + '&input3=' + isAnagramInput2
    isAnagramURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isAnagramExpectedResults = True
    isAnagramActualResult = x.get('data')
    isAnagramPassOrFaill = 'Pass' if isAnagramExpectedResults == x.get('data') else 'Failed'
    isAnagramJsonOUTPUT = x

    #################################
    #################################
    ####### STARTS WITH API ########
    # Input1 is a string and Input 2 is a character that will be processed 
    # to be determined if Input1 begins with input 2
    # The API returns True or False.
    #################################
    ################################# 
    startsWithService = 'startsWith'
    startsWithInput1 = 'hello'
    startsWithInput2 = 'h'
    startsWithInput3 = 'NA'
    startsWithLanguage = 'English'
    url = 'http://localhost/indic-wp/api/startsWith.php?string='+startsWithInput1+'&language='+startsWithLanguage+'&start=' + startsWithInput2
    startsWithURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    startsWithExpectedResults = True
    startsWithActualResult = x.get('data')
    startsWithPassOrFaill = 'Pass' if startsWithExpectedResults == x.get('data') else 'Failed'
    startsWithJsonOUTPUT = x

    #################################
    #################################
    ###### ENDS WITH API ############
    # Input1 is a string and Input 2 is a character that will be processed 
    # to be determined if Input1 ends with input 2
    # The API returns True or False.
    #################################
    ################################# 
    endsWithService = 'endsWith'
    endsWithInput1 = 'hello'
    endsWithInput2 = 'o'
    endsWithInput3 = 'NA'
    endsWithLanguage = 'English'
    url = 'http://localhost/indic-wp/api/endsWith.php?string='+endsWithInput1+'&language='+endsWithLanguage+'&end=' + endsWithInput2
    endsWithURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    endsWithExpectedResults = True
    endsWithActualResult = x.get('data')
    endsWithPassOrFaill = 'Pass' if endsWithExpectedResults == x.get('data') else 'Failed'
    endsWithJsonOUTPUT = x

    #################################
    #################################
    #### CONTAINS STRING API ########
    # Input1 is a string and Input 2 is a possible substring of Input 1
    # The API returns True or False.
    #################################
    ################################# 
    containsStringService = 'containsString'
    containsStringInput1 = 'hello'
    containsStringInput2 = 'lo'
    containsStringInput3 = 'NA'
    containsStringLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsString.php?string='+containsStringInput1+'&language='+containsStringLanguage+'&contains=' + containsStringInput2
    containsStringURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsStringExpectedResults = True
    containsStringActualResult = x.get('data')
    containsStringPassOrFaill = 'Pass' if containsStringExpectedResults == x.get('data') else 'Failed'
    containsStringJsonOUTPUT = x

    #################################
    #################################
    ###### CONTAINS CHAR API ########
    # Input1 is a string and Input 2 is a character that will be processed 
    # to be determined if Input1 contains input 2
    # The API returns True or False.
    #################################
    ################################# 
    containsCharService = 'containsChar'
    containsCharInput1 = 'hello'
    containsCharInput2 = 'o'
    containsCharInput3 = 'NA'
    containsCharLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsChar.php?string='+containsCharInput1+'&language='+containsCharLanguage+'&contains=' + containsCharInput2
    containsCharURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsCharExpectedResults = True
    containsCharActualResult = x.get('data')
    containsCharPassOrFaill = 'Pass' if containsCharExpectedResults == x.get('data') else 'Failed'
    containsCharJsonOUTPUT = x

    #################################
    #################################
    ###### CONTAINS LOGICAL CHARS API ########
    # Input1 is a string and Input 2 is a list of characters that will be processed 
    # to be determined if Input1 contains input 2
    # The API returns True or False.
    #################################
    ################################# 
    containsLogicalCharsService = 'containsLogicalChars'
    containsLogicalCharsInput1 = 'hello'
    containsLogicalCharsInput2 = 'l,o'
    containsLogicalCharsInput3 = 'NA'
    containsLogicalCharLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsLogicalChars.php?string='+containsLogicalCharsInput1+'&language='+containsLogicalCharLanguage+'&contains=' +containsLogicalCharsInput2
    containsLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsLogicalCharsExpectedResults = True
    containsLogicalCharsActualResult = x.get('data')
    containsLogicalCharsPassOrFaill = 'Pass' if containsLogicalCharsExpectedResults == x.get('data') else 'Failed'
    containsLogicalCharsJsonOUTPUT = x

    #################################
    #################################
    # CONTAINS ALL LOGICAL CHARS API#
    # Input1 is a string and Input 2 is a list of characters that will be processed 
    # to be determined if Input1 contains input 2
    # The API returns True or False.
    #################################
    ################################# 
    containsAllLogicalCharservice = 'containsAllLogicalChars'
    containsAllLogicalCharsInput1 = 'hello'
    containsAllLogicalCharsInput2 = 'l,o'
    containsAllLogicalCharsInput3 = 'NA'
    containsAllLogicalCharsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsAllLogicalChars.php?string='+containsAllLogicalCharsInput1+'&language='+containsAllLogicalCharsLanguage+'&contains=' + containsAllLogicalCharsInput2
    containsAllLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsAllLogicalCharsExpectedResults = True
    containsAllLogicalCharsActualResult = x.get('data')
    containsAllLogicalCharsPassOrFaill = 'Pass' if containsAllLogicalCharsExpectedResults == x.get('data') else 'Failed'
    containsAllLogicalCharsJsonOUTPUT = x

    #################################
    #################################
    # CONTAINS LOGICAL CHAR SEQUENCE API#
    # Input1 is a string and Input 2 is a list of characters that will be processed 
    # to be determined if Input1 contains Input2
    # The API returns True or False.
    #################################
    ################################# 
    containsLogicalCharSequenceservice = 'containsLogicalCharSequence'
    containsLogicalCharSequenceInput1 = 'hello'
    containsLogicalCharSequenceInput2 = 'lo'
    containsLogicalCharSequenceInput3 = 'NA'
    containsLogicalCharSequenceLanguage = 'English'
    url = 'http://localhost/indic-wp/api/containsLogicalCharSequence.php?string='+containsLogicalCharSequenceInput1+'&language='+containsLogicalCharSequenceLanguage+'&contains=' + containsLogicalCharSequenceInput2
    containsLogicalCharSequenceURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsLogicalCharSequenceExpectedResults = True
    containsLogicalCharSequenceActualResult = x.get('data')
    containsLogicalCharSequencePassOrFaill = 'Pass' if containsLogicalCharSequenceExpectedResults == x.get('data') else 'Failed'
    containsLogicalCharSequenceJsonOUTPUT = x

    #################################
    #################################
    ######## CAN MAKE WOR API #######
    # Input1 is a string and Input 2 is a list of characters that will be processed 
    # to be determined if Input1 can be made with the characters in Input 2.
    # The API returns True or False.
    #################################
    ################################# 
    canMakeWordservice = 'canMakeWord'
    canMakeWordInput1 = 'hello'
    canMakeWordInput2 = 'lo'
    canMakeWordInput3 = 'NA'
    canMakeWordLanguage = 'English'
    url = 'http://localhost/indic-wp/api/canMakeWord.php?string='+canMakeWordInput1+'&language='+canMakeWordLanguage+'&word=' + canMakeWordInput2
    canMakeWordURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    canMakeWordExpectedResults = True
    canMakeWordActualResult = x.get('data')
    canMakeWordPassOrFaill = 'Pass' if canMakeWordExpectedResults == x.get('data') else 'Failed'
    canMakeWordJsonOUTPUT = x

    #################################
    #################################
    ### CAN MAKE ALL WORDS API ######
    # Input1 is a string and Input 2 is a list of sub strings that will be processed 
    # to be determined if the string in Input1 can be made from the sub strings in input 2
    # The API returns True or False.
    #################################
    ################################# 
    canMakeAllWordsservice = 'canMakeAllWords'
    canMakeAllWordsInput1 = 'hello'
    canMakeAllWordsInput2 = 'hell,lo'
    canMakeAllWordsInput3 = 'NA'
    canMakeAllWordsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/canMakeAllWords.php?string='+canMakeAllWordsInput1+'&language='+canMakeAllWordsLanguage+'&words=' + canMakeAllWordsInput2
    canMakeAllWordsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    canMakeAllWordsExpectedResults = True
    canMakeAllWordsActualResult = x.get('data')
    canMakeAllWordsPassOrFaill = 'Pass' if canMakeAllWordsExpectedResults == x.get('data') else 'Failed'
    canMakeAllWordsJsonOUTPUT = x

    #################################
    #################################
    ### ADD CHARACTERS AT END API ###
    # Input1 is a string and Input 2 is a character that will be processed to 
    # to be added at the end of a Input 1. 
    # The API returns the new string.
    #################################
    ################################# 
    addCharacterAtEndservice = 'addCharacterAtEnd'
    addCharacterAtEndInput1 = 'hello'
    addCharacterAtEndInput2 = 'a'
    addCharacterAtEndInput3 = 'NA'
    addCharacterAtEndLanguage = 'English'
    url = 'http://localhost/indic-wp/api/addCharacterAtEnd.php?string='+addCharacterAtEndInput1+'&language='+addCharacterAtEndLanguage+'&char=' + addCharacterAtEndInput2
    addCharacterAtEndURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    addCharacterAtEndExpectedResults = 'helloa'
    addCharacterAtEndActualResult = x.get('data')
    addCharacterAtEndPassOrFaill = 'Pass' if addCharacterAtEndExpectedResults == x.get('data') else 'Failed'
    addCharacterAtEndJsonOUTPUT = x

    #################################
    #################################
    ###### IS INTERSECTING API ######
    # Input1 is a string and Input 2 is a substring that will be processed 
    # to determined if they intersect with input1.
    # The API returns True or False. 
    #################################
    ################################# 
    isIntersectingservice = 'isIntersecting'
    isIntersectingInput1 = 'hello'
    isIntersectingInput2 = 'el'
    isIntersectingInput3 = 'NA'
    isIntersectingLanguage = 'English'
    url = 'http://localhost/indic-wp/api/isIntersecting.php?string='+ isIntersectingInput1 + '&language='+isIntersectingLanguage+'&word='+ isIntersectingInput2
    isIntersectingURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isIntersectingExpectedResults = True
    isIntersectingActualResult = x.get('data')
    isIntersectingPassOrFaill = 'Pass' if isIntersectingActualResult == x.get('data') else 'Failed'
    isIntersectingJsonOUTPUT = x

    #################################
    #################################
    ## GET INTERSECTING RANK API ####
    # Input1 is a string and Input 2 is a substring that will be processed 
    # to determined what the intersecting rank is.
    # The API returns the rank value. 
    #################################
    ################################# 
    getIntersectingRankservice = 'getIntersectingRank'
    getIntersectingRankInput1 = 'hello'
    getIntersectingRankInput2 = 'el'
    getIntersectingRankInput3 = 'NA'
    getIntersectingRankLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getIntersectingRank.php?string='+ getIntersectingRankInput1 + '&language='+getIntersectingRankLanguage+'&word='+ getIntersectingRankInput2
    getIntersectingRankURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getIntersectingRankExpectedResults = 3
    getIntersectingRankActualResult = x.get('data')
    getIntersectingRankPassOrFaill = 'Pass' if getIntersectingRankActualResult == x.get('data') else 'Failed'
    getIntersectingRankJsonOUTPUT = x

    #################################
    #################################
    # GET UNIQUE INTERSECTING RANK API 
    # Input1 is a string and Input 2 is a substring that will be processed 
    # to determined what the unique intersecting rank is. This will process
    # characters once despite appearing in a string more than once. 
    # The API returns the rank value. 
    #################################
    ################################# 
    getUniqueIntersectingRankservice = 'getUniqueIntersectingRank'
    getUniqueIntersectingRankInput1 = 'hello'
    getUniqueIntersectingRankInput2 = ['e', 'l', 'i']
    getUniqueIntersectingRankInput3 = 'NA'
    getUniqueIntersectingRankLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getUniqueIntersectingRank.php?string='+ getUniqueIntersectingRankInput1 + '&language='+getUniqueIntersectingRankLanguage+'&list[0]='+ getUniqueIntersectingRankInput2[0]+'&list[1]='+ getUniqueIntersectingRankInput2[1] +'&list[2]='+ getUniqueIntersectingRankInput2[2]
    getUniqueIntersectingRankURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getUniqueIntersectingRankExpectedResults = 2
    getUniqueIntersectingRankActualResult = x.get('data')
    getUniqueIntersectingRankPassOrFaill = 'Pass' if getUniqueIntersectingRankActualResult == x.get('data') else 'Failed'
    getUniqueIntersectingRankJsonOUTPUT = x

    #################################
    #################################
    ####### COMPARE TO API ##########
    # Input1 is a string and Input2 is a new string comparing to Input1. Case is not ignored.
    # The API returns 0 if Input 1 and Input 2 are equal. 
    #################################
    ################################# 
    compareToservice = 'compareTo'
    compareToInput1 = 'hello'
    compareToInput2 = 'hello'
    compareToInput3 = 'NA'
    compareToLanguage = 'English'
    url = 'http://localhost/indic-wp/api/compareTo.php?string='+ getUniqueIntersectingRankInput1 + '&language='+compareToLanguage+'&secondString='+ compareToInput2
    compareToURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    compareToExpectedResults = 0
    compareToActualResult = x.get('data')
    compareToPassOrFaill = 'Pass' if compareToExpectedResults == x.get('data') else 'Failed'
    compareToJsonOUTPUT = x

    #################################
    #################################
    # COMPARE TO IGNORE CASE API ####
    # Input1 is a string and Input2 is a new string comparing to Input1. Case is ignored. 
    # The API returns 0 if Input 1 and Input 2 are equal.  
    #################################
    ################################# 
    compareToIgnoreCaseservice = 'compareToIgnoreCase'
    compareToIgnoreCaseInput1 = 'HELLO'
    compareToIgnoreCaseInput2 = 'hel'
    compareToIgnoreCaseInput3 = 'NA'
    compareToIgnoreCaseLanguage = 'English'
    url = 'http://localhost/indic-wp/api/compareToIgnoreCase.php?string='+ compareToIgnoreCaseInput1 + '&language='+compareToIgnoreCaseLanguage+'&secondString='+ compareToIgnoreCaseInput2
    compareToIgnoreCaseURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    compareToIgnoreCaseExpectedResults = 2
    compareToIgnoreCaseActualResult = x.get('data')
    compareToIgnoreCasePassOrFaill = 'Pass' if compareToIgnoreCaseActualResult == x.get('data') else 'Failed'
    compareToIgnoreCaseJsonOUTPUT = x

    #################################
    #################################
    # COMPARE TO IGNORE CASE API ####
    # Input1 is a string and Input2 is an integer to used to break the 
    # string in Input1 into separate lists.  
    # The API returns a dictionary of the Input1 slpit out into separate lists size of 
    # Input 2.  
    #################################
    ################################# 
    splitWordservice = 'splitWord'
    splitWordInput1 = 'hello!'
    splitWordInput2 = '2'
    splitWordInput3 = 'NA'
    splitWordLanguage = 'English'
    url = 'http://localhost/indic-wp/api/splitWord.php?string='+ splitWordInput1 + '&language='+splitWordLanguage+'&col='+ splitWordInput2
    splitWordURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    splitWordExpectedResults = {'0': ['h', 'e'], '2': ['l', 'l'], '4': ['o', '!']}
    splitWordActualResult = x.get('data')
    splitWordPassOrFaill = 'Pass' if splitWordExpectedResults == x.get('data') else 'Failed'
    splitWordJsonOUTPUT = x

    #################################
    #################################
    ######## EQUALS API #############
    # Input1 is a string and Input2 is a string that is processed 
    # to be compared to Input 1 
    # The API returns True or False.
    #################################
    ################################# 
    equalsservice = 'equals'
    equalsInput1 = 'hello!'
    equalsInput2 = 'hello!'
    equalsInput3 = 'NA'
    equalsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/equals.php?string='+ equalsInput1 + '&language='+equalsLanguage+'&secondString='+ equalsInput2
    equalsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    equalsExpectedResults = True
    equalsActualResult = x.get('data')
    equalsPassOrFaill = 'Pass' if equalsExpectedResults == x.get('data') else 'Failed'
    equalsJsonOUTPUT = x


    #################################
    #################################
    ##### REVERSE EQUALS API ########
    # Input1 is a string and Input2 is a string that is processed 
    # to be compared to Input1 to verify if it is the reverse of Input1. 
    # The API returns True or False.
    #################################
    ################################# 
    reverseEqualsservice = 'reverseEquals'
    reverseEqualsInput1 = 'hello!'
    reverseEqualsInput2 = '!olleh'
    reverseEqualsInput3 = 'NA'
    reverseEqualsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/reverseEquals.php?string='+ reverseEqualsInput1 + '&language='+reverseEqualsLanguage+'&secondString='+ reverseEqualsInput2
    reverseEqualsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    reverseEqualsExpectedResults = True
    reverseEqualsActualResult = x.get('data')
    reverseEqualsPassOrFaill = 'Pass' if reverseEqualsExpectedResults == x.get('data') else 'Failed'
    reverseEqualsJsonOUTPUT = x

    #################################
    #################################
    ###### LOGICAL CHAR AT API ######
    # Input1 is a string and Input2 is an integer to check the index of Input 1. 
    # The API returns the logical character at index, if it exists. 
    #################################
    ################################# 
    logicalCharAtservice = 'logicalCharAt'
    logicalCharAtInput1 = 'hello!'
    logicalCharAtInput2 = '3'
    logicalCharAtInput3 = 'NA'
    logicalCharAtLanguage = 'English'
    url = 'http://localhost/indic-wp/api/logicalCharAt.php?string='+ logicalCharAtInput1 + '&language='+logicalCharAtLanguage+'&index='+ logicalCharAtInput2
    logicalCharAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    logicalCharAtExpectedResults = 'l'
    logicalCharAtActualResult = x.get('data')
    logicalCharAtPassOrFaill = 'Pass' if logicalCharAtExpectedResults == x.get('data') else 'Failed'
    logicalCharAtJsonOUTPUT = x

    #################################
    #################################
    ###### LOGICAL CHAR AT API ######
    # Input1 is a string and Input2 is an integer to check the index of Input 1. 
    # The API returns the logical character at index, if it exists. 
    #################################
    ################################# 
    getUniqueIntersectingLogicalCharsservice = 'getUniqueIntersectingLogicalChars'
    getUniqueIntersectingLogicalCharsAtInput1 = 'hello!'
    getUniqueIntersectingLogicalCharsAtInput2 = ['l','l']
    getUniqueIntersectingLogicalCharsAtInput3 = 'NA'
    getUniqueIntersectingLogicalCharsAtLanguage = 'English'
    url = 'http://localhost/indic-wp/api/getUniqueIntersectingLogicalChars.php?string='+ getUniqueIntersectingLogicalCharsAtInput1 + '&language='+getUniqueIntersectingLogicalCharsAtLanguage+'&list[0]='+ getUniqueIntersectingLogicalCharsAtInput2[0] +'&list[1]='+ getUniqueIntersectingLogicalCharsAtInput2[1]
    getUniqueIntersectingLogicalCharsAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getUniqueIntersectingLogicalCharsExpectedResults = 2
    getUniqueIntersectingLogicalCharsActualResult = x.get('data')
    getUniqueIntersectingLogicalCharsPassOrFaill = 'Pass' if getUniqueIntersectingLogicalCharsExpectedResults == x.get('data') else 'Failed'
    getUniqueIntersectingLogicalCharsJsonOUTPUT = x

    #################################
    #################################
    ###### INDEX OF API ######
    # Input1 is a string and Input2 is a char to be processed and searched for in Input1
    # The API returns the index of the first instance of Input2. 
    #################################
    ################################# 
    indexOfservice = 'indexOf'
    indexOfInput1 = 'hello!'
    indexOfInput2 = 'l'
    indexOfInput3 = 'NA'
    indexOfLanguage = 'English'
    url = 'http://localhost/indic-wp/api/indexOf.php?string='+ indexOfInput1 + '&language='+indexOfLanguage+'&char='+ indexOfInput2
    indexOfURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    indexOfExpectedResults = 2
    indexOfActualResult = x.get('data')
    indexOfPassOrFaill = 'Pass' if indexOfExpectedResults == x.get('data') else 'Failed'
    indexOfJsonOUTPUT = x

    #################################
    #################################
    ###### ADD CHAR AT API ######
    # Input1 is a string and Input2 is a character to be added to input at a specific index 
    # The API returns the new string with Input2 inserted at specified index.
    #################################
    ################################# 
    addCharacterAtservice = 'addCharacterAt'
    addCharacterAtInput1 = 'hello!'
    addCharacterAtInput2 = '1'
    addCharacterAtInput3 = 'e'
    addCharacterAtLanguage = 'English'
    url = 'http://localhost/indic-wp/api/addCharacterAt.php?string='+ addCharacterAtInput1 + '&language='+addCharacterAtLanguage+'&index='+ addCharacterAtInput2 +'&char=' +addCharacterAtInput3
    addCharacterAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    addCharacterAtExpectedResults = 'heello!'
    addCharacterAtActualResult = x.get('data')
    addCharacterAtPassOrFaill = 'Pass' if addCharacterAtExpectedResults == x.get('data') else 'Failed'
    addCharacterAtJsonOUTPUT = x

    #################################
    #################################
    ###### REPLACE API ##############
    # Input1 is a string and Input2 a substring to be replaced in Input1. 
    # The API returns the new string. 
    #################################
    ################################# 
    replaceservice = 'replace'
    replaceInput1 = 'hello!'
    replaceInput2 = 'ell'
    replaceInput3 = 'i'
    replaceLanguage = 'English'
    url = 'http://localhost/indic-wp/api/replace.php?string='+ replaceInput1 + '&language='+replaceLanguage+'&target='+ replaceInput2 +'&new=' +replaceInput3
    replaceAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    replaceExpectedResults = 'hio!'
    replaceActualResult = x.get('data')
    replacePassOrFaill = 'Pass' if replaceExpectedResults == x.get('data') else 'Failed'
    replaceJsonOUTPUT = x


    #################################
    #################################
    ###### Base Consonants API ######
    # Input1 is a string and Input2 is a string. 
    # The API checks that the 2 input strings have the same 
    # consonants. 
    #################################
    ################################# 
    baseConsonantService = 'Base Consonants'
    baseConsonantInput1 = 'hello'
    baseConsonantInput2 = 'hello'
    baseConsonantInput3 = 'NA'
    baseConsonantLanguage = 'English'
    url = 'http://localhost/indic-wp/api/baseConsonants.php?input1='+ baseConsonantInput1 + '&input2='+ baseConsonantLanguage +'&input3='+ baseConsonantInput2
    baseConsonantAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    baseConsonantExpectedResults = True
    baseConsonantActualResult = x.get('data')
    baseConsonantPassorFaill = 'Pass' if baseConsonantExpectedResults == x.get('data') else 'Failed'
    baseConsonantJsonOUTPUT = x

    #################################
    #################################
    ###### Heads and Tails API ######
    # Input 1 is a string. Input 2 is a string. The 
    # API checks if the first letter if input 2 is the 
    # last letter of input 1. It also validates the strings
    # are the same length. 
    #################################
    ################################# 
    headsAndTailService = 'Head and Tail Words'
    headsAndTailInput1 = 'hello'
    headsAndTailInput2 = 'other'
    headsAndTailInput3 = 'NA'
    headsAndTailLanguage = 'English'
    url = 'http://localhost/indic-wp/api/areHeadAndTailWords.php?input1='+ headsAndTailInput1 + '&input2='+ headsAndTailLanguage +'&input3='+ headsAndTailInput2
    headsAndTailAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    headsAndTailExpectedResults = True
    headsAndTailActualResult = x.get('data')
    headsAndTailPassorFaill = 'Pass' if headsAndTailExpectedResults == x.get('data') else 'Failed'
    headsAndTailJsonOUTPUT = x


    #################################
    #################################
    ###### Are Ladder Words API #####
    # Takes 2 strings as input and checks if
    # the words differ by just one logical character. 
    #################################
    ################################# 
    areLadderWordsService = 'Are Ladder Words'
    areLadderWordsInput1 = 'hello'
    areLadderWordsInput2 = 'hillo'
    areLadderWordsInput3 = 'NA'
    areLadderWordsLanguage = 'English'
    url = 'http://localhost/indic-wp/api/areLadderWords.php?input1='+ areLadderWordsInput1 + '&input2='+ areLadderWordsLanguage +'&input3='+ areLadderWordsInput2
    areLadderWordsAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    areLadderWordsExpectedResults = True
    areLadderWordsActualResult = x.get('data')
    areLadderWordsPassorFaill = 'Pass' if areLadderWordsExpectedResults == x.get('data') else 'Failed'
    areLadderWordsJsonOUTPUT = x


####### Start Telugu 
elif userInput == '2':
    print('Telugu selected...')

    getLengthservice = 'getLength'
    getLengthinput1 = 'అమెరికాఆస్ట్రేలియా'
    getLengthinput2 = 'NA'
    getLengthinput3 = 'NA'
    getLengthlanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getlength.php?string='+ getLengthinput1 + '&language=' + getLengthlanguage
    getLengthURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthexpectedResults = 8
    getLengthactualResult = x.get('data')
    getLengthpassOrFaill = 'Pass' if getLengthexpectedResults == x.get('data') else 'Failed'
    getLengthjsonOUTPUT = x

    reverseService = 'reverse'
    reverseInput1 = 'అమెరికాఆస్ట్రేలియా'
    reverseInput2 = 'NA'
    reverseInput3 = 'NA'
    reverseLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/reverse.php?string='+reverseInput1+'&language='+reverseLanguage
    reverseURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    reverseExpectedResults = 'యాలిస్ట్రేఆకారిమెఅ'
    reverseActualResult = x.get('data')
    reversePassOrFaill = 'Pass' if reverseExpectedResults == x.get('data') else 'Failed'
    reverseJsonOUTPUT = x


    getCodePointLengthService = 'getCodePointLength'
    getCodePointLengthInput1 = 'అమెరికాఆస్ట్రేలియా'
    getCodePointLengthInput2 = 'NA'
    getCodePointLengthInput3 = 'NA'
    getCodePointLengthLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getCodePointLength.php?string='+getCodePointLengthInput1+'&language=' + getCodePointLengthLanguage
    getCodePointLengthURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getCodePointLengthExpectedResults = 18
    getCodePointLengthActualResult = x.get('data')
    getCodePointLengthPassOrFaill = 'Pass' if getCodePointLengthExpectedResults == x.get('data') else 'Failed'
    getCodePointLengthJsonOUTPUT = x



    getCodePointshService = 'getCodePoints'
    getCodePointsInput1 = 'అమెరికాఆస్ట్రేలియా'
    getCodePointsInput2 = 'NA'
    getCodePointsInput3 = 'NA'
    getCodePointsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getCodePoints.php?string='+getCodePointsInput1+'&language='+getCodePointsLanguage
    getCodePointsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getCodePointsExpectedResults =  [[3077], [3118, 3142], [3120, 3135], [3093, 3134], [3078], [3128, 3149, 3103, 3149, 3120, 3143], [3122, 3135], [3119, 3134]]
    getCodePointsActualResult = x.get('data')
    getCodePointsPassOrFaill = 'Pass' if getCodePointsExpectedResults == x.get('data') else 'Failed'
    getCodePointsJsonOUTPUT = x


    getwordLevelService = 'getWordLevel'
    getwordLevelInput1 = 'అమెరికాఆస్ట్రేలియా'
    getwordLevelInput2 = 'NA'
    getwordLevelInput3 = 'NA'
    getWordLevelLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getwordLevel.php?string='+getwordLevelInput1+'&language='+ getWordLevelLanguage
    getWordLevelURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getwordLevelExpectedResults = 6
    getwordLevelActualResult = x.get('data')
    getwordLevelPassOrFaill = 'Pass' if getwordLevelExpectedResults == x.get('data') else 'Failed'
    getwordLevelJsonOUTPUT = x


    getLogicalCharsInput1 = 'అమెరికాఆస్ట్రేలియా'
    getLogicalCharsInput2 = 'NA'
    getLogicalCharsInput3 = 'NA'
    getLogicalCharsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getLogicalChars.php?string='+getLogicalCharsInput1+'&language='+getLogicalCharsLanguage
    getLogicalCharsURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLogicalCharsService = 'getLogicalChars'
    getLogicalCharsExpectedResults = ['అ','మె','రి','కా','ఆ','స్ట్రే','లి','యా']
    getLogicalCharsActualResult = x.get('data')
    getLogicalCharsPassOrFaill = 'Pass' if getLogicalCharsExpectedResults == x.get('data') else 'Failed'
    getLogicalCharsJsonOUTPUT = x


    getWordStrengthService = 'getWordStrength'
    getWordStrengthInput1 = 'అమెరికాఆస్ట్రేలియా'
    getWordStrengthInput2 = 'NA'
    getWordStrengthInput3 = 'NA'
    getWordStrengthLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getWordStrength.php?string='+getWordStrengthInput1+'&language='+getWordStrengthLanguage
    getWordStrengthURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getWordStrengthExpectedResults = 6
    getWordStrengthActualResult = x.get('data')
    getWordStrengthPassOrFaill = 'Pass' if getWordStrengthExpectedResults == x.get('data') else 'Failed'
    getWordStrengthJsonOUTPUT = x


    getWordWeightService = 'getWordWeight'
    getWordWeightInput1 = 'అమెరికాఆస్ట్రేలియా'
    getWordWeightInput2 = 'NA'
    getWordWeightInput3 = 'NA'
    getWordWeightLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getWordWeight.php?string='+getWordWeightInput1+'&language=' + getWordWeightLanguage
    getWordWeightURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getWordWeightExpectedResults = 18
    getWordWeightActualResult = x.get('data')
    getWordWeightPassOrFaill = 'Pass' if getWordWeightExpectedResults == x.get('data') else 'Failed'
    getWordWeightJsonOUTPUT = x



    isPalindromeService = 'isPalindrome'
    isPalindromeInput1 = 'అమెరికాఆస్ట్రేలియా'
    isPalindromeInput2 = 'NA'
    isPalindromeInput3 = 'NA'
    isPalindromeLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/isPalindrome.php?string='+isPalindromeInput1+'&language=' + isPalindromeLanguage
    isPalindromeURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isPalindromeExpectedResults = False
    isPalindromeActualResult = x.get('data')
    isPalindromePassOrFaill = 'Pass' if isPalindromeExpectedResults == x.get('data') else 'Failed'
    isPalindromeJsonOUTPUT = x

###### TELUGU RANDOMIZE DOES NOT WORK WILL NEED TO UPDATE WITH REAL DATA
    randomizeService = 'randomize'
    randomizeInput1 = 'అమెరికాఆస్ట్రేలియా'
    randomizeInput2 = 'NA'
    randomizeInput3 = 'NA'
    randomizeLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/randomize.php?string='+randomizeInput1+'&language=' + randomizeLanguage
    randomizeURL = url
    # r = requests.get(url)
    # dataDecoded = getDecode(r.text)
    # x = json.loads(dataDecoded)
    randomizeExpectedResults = 'NA' #'Not ' + randomizeInput1
    randomizeActualResult = 'NA'#x.get('data')
    randomizePassOrFaill = 'NA'#'Pass' if randomizeInput1 != x.get('data') else 'Failed'
    randomizeJsonOUTPUT = 'NA'#x


    # url = 'http://localhost/indic-wp/api/randomize.php?string=hello&language=English'
    # r = requests.get(url)
    # dataDecoded = getDecode(r.text)
    # x = json.loads(dataDecoded)
    # randomizeService = 'randomize'
    # randomizeInput1 = 'hello'
    # randomizeInput2 = 'NA'
    # randomizeInput3 = 'NA'
    # randomizeExpectedResults = 'Not ' + randomizeInput1
    # randomizeActualResult = x.get('data')
    # randomizePassOrFaill = 'Pass' if randomizeInput1 != x.get('data') else 'Failed'
    # randomizeJsonOUTPUT = x



    containsSpaceService = 'containsSpace'
    containsSpaceInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsSpaceInput2 = 'NA'
    containsSpaceInput3 = 'NA'
    containsSpaceLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsSpace.php?string='+containsSpaceInput1+'&language=' + containsSpaceLanguage
    containsSpaceURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsSpaceExpectedResults = False
    containsSpaceActualResult = x.get('data')
    containsSpacePassOrFaill = 'Pass' if containsSpaceExpectedResults == x.get('data') else 'Failed'
    containsSpaceJsonOUTPUT = x


    getLengthNoSpacesService = 'getLengthNoSpaces'
    getLengthNoSpacesInput1 = 'అమెరికాఆస్ట్రేలియా'
    getLengthNoSpacesInput2 = 'NA'
    getLengthNoSpacesInput3 = 'NA'
    getLengthNoSpacesLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getLengthNoSpaces.php?string='+getLengthNoSpacesInput1+'&language=' + getLengthNoSpacesLanguage
    getLengthNoSpacesURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthNoSpacesExpectedResults = 8
    getLengthNoSpacesActualResult = x.get('data')
    getLengthNoSpacesPassOrFaill = 'Pass' if getLengthNoSpacesExpectedResults == x.get('data') else 'Failed'
    getLengthNoSpacesJsonOUTPUT = x



    getLengthNoSpacesNoCommasService = 'getLengthNoSpacesNoCommas'
    getLengthNoSpacesNoCommasInput1 = 'అమెరికాఆస్ట్రేలియా'
    getLengthNoSpacesNoCommasInput2 = 'NA'
    getLengthNoSpacesNoCommasInput3 = 'NA'
    getLengthNoSpacesNoCommasLanguage= 'Telugu'
    url = 'http://localhost/indic-wp/api/getLengthNoSpacesNoCommas.php?string='+getLengthNoSpacesNoCommasInput1+'&language=' + getLengthNoSpacesNoCommasLanguage
    getLengthNoSpacesNoCommasURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthNoSpacesNoCommasExpectedResults = 8
    getLengthNoSpacesNoCommasActualResult = x.get('data')
    getLengthNoSpacesNoCommasPassOrFaill = 'Pass' if getLengthNoSpacesNoCommasExpectedResults == x.get('data') else 'Failed'
    getLengthNoSpacesNoCommasJsonOUTPUT = x


    parseToLogicalCharsService = 'parseToLogicalChars'
    parseToLogicalCharsInput1 = 'అమెరికాఆస్ట్రేలియా'
    parseToLogicalCharsInput2 = 'NA'
    parseToLogicalCharsInput3 = 'NA'
    parseToLogicalCharsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/parseToLogicalChars.php?string='+parseToLogicalCharsInput1+'&language='+parseToLogicalCharsLanguage
    ParseToLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    parseToLogicalCharsExpectedResults = ['అ','మె','రి','కా','ఆ','స్ట్రే','లి','యా']
    parseToLogicalCharsActualResult = x.get('data')
    parseToLogicalCharsPassOrFaill = 'Pass' if parseToLogicalCharsExpectedResults == x.get('data') else 'Failed'
    parseToLogicalCharsJsonOUTPUT = x



    parseToLogicalCharactersService = 'parseToLogicalCharacters'
    parseToLogicalCharactersInput1 = 'అమెరికాఆస్ట్రేలియా'
    parseToLogicalCharactersInput2 = 'NA'
    parseToLogicalCharactersInput3 = 'NA'
    parseToLogicalCharactersLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/parseToLogicalCharacters.php?string='+parseToLogicalCharactersInput1+'&language='+parseToLogicalCharactersLanguage
    parseToLogicalCharactersURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    parseToLogicalCharactersExpectedResults = ['అ','మె','రి','కా','ఆ','స్ట్రే','లి','యా']
    parseToLogicalCharactersActualResult = x.get('data')
    parseToLogicalCharactersPassOrFaill = 'Pass' if parseToLogicalCharactersExpectedResults == x.get('data') else 'Failed'
    parseToLogicalCharactersJsonOUTPUT = x


##### isAnagram needs to be fixed to take 2 inputs. Currently only taking one. 
    isAnagramService = 'isAnagram'
    isAnagramInput1 = 'అమెరికాఆస్ట్రేలియా'
    isAnagramInput2 = 'అఆమెస్ట్రేరిలికాయా'
    isAnagramInput3 = 'NA'
    isAnagramLanguage = 'Language'
    url = 'http://localhost/indic-wp/api/isAnagram.php?string='+isAnagramInput1+'&language=' + isAnagramLanguage
    isAnagramURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isAnagramExpectedResults = True
    isAnagramActualResult = x.get('data')
    isAnagramPassOrFaill = 'Pass' if isAnagramExpectedResults == x.get('data') else 'Failed'
    isAnagramJsonOUTPUT = x


    startsWithService = 'startsWith'
    startsWithInput1 = 'అమెరికాఆస్ట్రేలియా'
    startsWithInput2 = 'అమె'
    startsWithInput3 = 'NA'
    startsWithLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/startsWith.php?string='+startsWithInput1+'&language='+startsWithLanguage+'&start=' + startsWithInput2
    startsWithURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    startsWithExpectedResults = True
    startsWithActualResult = x.get('data')
    startsWithPassOrFaill = 'Pass' if startsWithExpectedResults == x.get('data') else 'Failed'
    startsWithJsonOUTPUT = x


    endsWithService = 'endsWith'
    endsWithInput1 = 'అమెరికాఆస్ట్రేలియా'
    endsWithInput2 = 'లియా'
    endsWithInput3 = 'NA'
    endsWithLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/endsWith.php?string='+endsWithInput1+'&language='+endsWithLanguage+'&end=' + endsWithInput2
    endsWithURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    endsWithExpectedResults = True
    endsWithActualResult = x.get('data')
    endsWithPassOrFaill = 'Pass' if endsWithExpectedResults == x.get('data') else 'Failed'
    endsWithJsonOUTPUT = x


    containsStringService = 'containsString'
    containsStringInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsStringInput2 = 'అమెరికా'
    containsStringInput3 = 'NA'
    containsStringLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsString.php?string='+containsStringInput1+'&language='+containsStringLanguage+'&contains=' + containsStringInput2
    containsStringURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsStringExpectedResults = True
    containsStringActualResult = x.get('data')
    containsStringPassOrFaill = 'Pass' if containsStringExpectedResults == x.get('data') else 'Failed'
    containsStringJsonOUTPUT = x


    containsCharService = 'containsChar'
    containsCharInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsCharInput2 = 'స్ట్రే'
    containsCharInput3 = 'NA'
    containsCharLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsChar.php?string='+containsCharInput1+'&language='+containsCharLanguage+'&contains=' + containsCharInput2
    containsCharURL = url 
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsCharExpectedResults = True
    containsCharActualResult = x.get('data')
    containsCharPassOrFaill = 'Pass' if containsCharExpectedResults == x.get('data') else 'Failed'
    containsCharJsonOUTPUT = x

    containsLogicalCharsService = 'containsLogicalChars'
    containsLogicalCharsInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsLogicalCharsInput2 = 'కా,యా,లి'
    containsLogicalCharsInput3 = 'NA'
    containsLogicalCharLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsLogicalChars.php?string='+containsLogicalCharsInput1+'&language='+containsLogicalCharLanguage+'&contains=' +containsLogicalCharsInput2
    containsLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsLogicalCharsExpectedResults = True
    containsLogicalCharsActualResult = x.get('data')
    containsLogicalCharsPassOrFaill = 'Pass' if containsLogicalCharsExpectedResults == x.get('data') else 'Failed'
    containsLogicalCharsJsonOUTPUT = x


    containsAllLogicalCharservice = 'containsAllLogicalChars'
    containsAllLogicalCharsInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsAllLogicalCharsInput2 = 'కా,యా,లి'
    containsAllLogicalCharsInput3 = 'NA'
    containsAllLogicalCharsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsAllLogicalChars.php?string='+containsAllLogicalCharsInput1+'&language='+containsAllLogicalCharsLanguage+'&contains=' + containsAllLogicalCharsInput2
    containsAllLogicalCharsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsAllLogicalCharsExpectedResults = True
    containsAllLogicalCharsActualResult = x.get('data')
    containsAllLogicalCharsPassOrFaill = 'Pass' if containsAllLogicalCharsExpectedResults == x.get('data') else 'Failed'
    containsAllLogicalCharsJsonOUTPUT = x


    containsLogicalCharSequenceservice = 'containsLogicalCharSequence'
    containsLogicalCharSequenceInput1 = 'అమెరికాఆస్ట్రేలియా'
    containsLogicalCharSequenceInput2 = 'రికాఆ'
    containsLogicalCharSequenceInput3 = 'NA'
    containsLogicalCharSequenceLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/containsLogicalCharSequence.php?string='+containsLogicalCharSequenceInput1+'&language='+containsLogicalCharSequenceLanguage+'&contains=' + containsLogicalCharSequenceInput2
    containsLogicalCharSequenceURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    containsLogicalCharSequenceExpectedResults = True
    containsLogicalCharSequenceActualResult = x.get('data')
    containsLogicalCharSequencePassOrFaill = 'Pass' if containsLogicalCharSequenceExpectedResults == x.get('data') else 'Failed'
    containsLogicalCharSequenceJsonOUTPUT = x


    canMakeWordservice = 'canMakeWord'
    canMakeWordInput1 = 'అమెరికాఆస్ట్రేలియా'
    canMakeWordInput2 = 'అమెరికా'
    canMakeWordInput3 = 'NA'
    canMakeWordLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/canMakeWord.php?string='+canMakeWordInput1+'&language='+canMakeWordLanguage+'&word=' + canMakeWordInput2
    canMakeWordURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    canMakeWordExpectedResults = True
    canMakeWordActualResult = x.get('data')
    canMakeWordPassOrFaill = 'Pass' if canMakeWordExpectedResults == x.get('data') else 'Failed'
    canMakeWordJsonOUTPUT = x


    canMakeAllWordsservice = 'canMakeAllWords'
    canMakeAllWordsInput1 = 'అమెరికాఆస్ట్రేలియా'
    canMakeAllWordsInput2 = 'అమెరికా,ఆస్ట్రేలియా'
    canMakeAllWordsInput3 = 'NA'
    canMakeAllWordsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/canMakeAllWords.php?string='+canMakeAllWordsInput1+'&language='+canMakeAllWordsLanguage+'&words=' + canMakeAllWordsInput2
    canMakeAllWordsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    canMakeAllWordsExpectedResults = True
    canMakeAllWordsActualResult = x.get('data')
    canMakeAllWordsPassOrFaill = 'Pass' if canMakeAllWordsExpectedResults == x.get('data') else 'Failed'
    canMakeAllWordsJsonOUTPUT = x


    addCharacterAtEndservice = 'addCharacterAtEnd'
    addCharacterAtEndInput1 = 'అమెరికాఆస్ట్రేలియా'
    addCharacterAtEndInput2 = 'ల్లో'
    addCharacterAtEndInput3 = 'NA'
    addCharacterAtEndLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/addCharacterAtEnd.php?string='+addCharacterAtEndInput1+'&language='+addCharacterAtEndLanguage+'&char=' + addCharacterAtEndInput2
    addCharacterAtEndURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    addCharacterAtEndExpectedResults = 'అమెరికాఆస్ట్రేలియాల్లో'
    addCharacterAtEndActualResult = x.get('data')
    addCharacterAtEndPassOrFaill = 'Pass' if addCharacterAtEndExpectedResults == x.get('data') else 'Failed'
    addCharacterAtEndJsonOUTPUT = x

    isIntersectingservice = 'isIntersecting'
    isIntersectingInput1 = 'అమెరికాఆస్ట్రేలియా'
    isIntersectingInput2 = 'ఇటలి'
    isIntersectingInput3 = 'NA'
    isIntersectingLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/isIntersecting.php?string='+ isIntersectingInput1 + '&language='+isIntersectingLanguage+'&word='+ isIntersectingInput2
    isIntersectingURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    isIntersectingExpectedResults = True
    isIntersectingActualResult = x.get('data')
    isIntersectingPassOrFaill = 'Pass' if isIntersectingActualResult == x.get('data') else 'Failed'
    isIntersectingJsonOUTPUT = x


    getIntersectingRankservice = 'getIntersectingRank'
    getIntersectingRankInput1 = 'అమెరికాఆస్ట్రేలియా'
    getIntersectingRankInput2 = 'కాయాలి'
    getIntersectingRankInput3 = 'NA'
    getIntersectingRankLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getIntersectingRank.php?string='+ getIntersectingRankInput1 + '&language='+getIntersectingRankLanguage+'&word='+ getIntersectingRankInput2
    getIntersectingRankURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getIntersectingRankExpectedResults = 3
    getIntersectingRankActualResult = x.get('data')
    getIntersectingRankPassOrFaill = 'Pass' if getIntersectingRankActualResult == x.get('data') else 'Failed'
    getIntersectingRankJsonOUTPUT = x


    getUniqueIntersectingRankservice = 'getUniqueIntersectingRank'
    getUniqueIntersectingRankInput1 = 'అమెరికాఆస్ట్రేలియా'
    getUniqueIntersectingRankInput2 = ['కా','యా','లి']
    getUniqueIntersectingRankInput3 = 'NA'
    getUniqueIntersectingRankLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getUniqueIntersectingRank.php?string='+ getUniqueIntersectingRankInput1 + '&language='+getUniqueIntersectingRankLanguage+'&list[0]='+ getUniqueIntersectingRankInput2[0]+'&list[1]='+ getUniqueIntersectingRankInput2[1] +'&list[2]='+ getUniqueIntersectingRankInput2[2]
    getUniqueIntersectingRankURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getUniqueIntersectingRankExpectedResults = 3
    getUniqueIntersectingRankActualResult = x.get('data')
    getUniqueIntersectingRankPassOrFaill = 'Pass' if getUniqueIntersectingRankActualResult == x.get('data') else 'Failed'
    getUniqueIntersectingRankJsonOUTPUT = x


    compareToservice = 'compareTo'
    compareToInput1 = 'అమెరికాఆస్ట్రేలియా'
    compareToInput2 = 'అమెరికాఆస్ట్రేలియా'
    compareToInput3 = 'NA'
    compareToLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/compareTo.php?string='+ getUniqueIntersectingRankInput1 + '&language='+compareToLanguage+'&secondString='+ compareToInput2
    compareToURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    compareToExpectedResults = 0
    compareToActualResult = x.get('data')
    compareToPassOrFaill = 'Pass' if compareToExpectedResults == x.get('data') else 'Failed'
    compareToJsonOUTPUT = x


    compareToIgnoreCaseservice = 'compareToIgnoreCase'
    compareToIgnoreCaseInput1 = 'ఆస్ట్రేలియా'
    compareToIgnoreCaseInput2 = 'అమెరికాఆస్ట్రేలియా'
    compareToIgnoreCaseInput3 = 'NA'
    compareToIgnoreCaseLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/compareToIgnoreCase.php?string='+ compareToIgnoreCaseInput1 + '&language='+compareToIgnoreCaseLanguage+'&secondString='+ compareToIgnoreCaseInput2
    compareToIgnoreCaseURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    compareToIgnoreCaseExpectedResults = 1
    compareToIgnoreCaseActualResult = x.get('data')
    compareToIgnoreCasePassOrFaill = 'Pass' if compareToIgnoreCaseExpectedResults == x.get('data') else 'Failed'
    compareToIgnoreCaseJsonOUTPUT = x


    splitWordservice = 'splitWord'
    splitWordInput1 = 'అమెరికాఆస్ట్రేలియా'
    splitWordInput2 = '2'
    splitWordInput3 = 'NA'
    splitWordLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/splitWord.php?string='+ splitWordInput1 + '&language='+splitWordLanguage+'&col='+ splitWordInput2
    splitWordURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    splitWordExpectedResults = {'0': ['అ', 'మె'], '2': ['రి', 'కా'], '4': ['ఆ', 'స్ట్రే'], '6': ['లి', 'యా']}
    splitWordActualResult = x.get('data')
    splitWordPassOrFaill = 'Pass' if splitWordExpectedResults == x.get('data') else 'Failed'
    splitWordJsonOUTPUT = x


    equalsservice = 'equals'
    equalsInput1 = 'అమెరికాఆస్ట్రేలియా!'
    equalsInput2 = 'అమెరికాఆస్ట్రేలియా!'
    equalsInput3 = 'NA'
    equalsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/equals.php?string='+ equalsInput1 + '&language='+equalsLanguage+'&secondString='+ equalsInput2
    equalsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    equalsExpectedResults = True
    equalsActualResult = x.get('data')
    equalsPassOrFaill = 'Pass' if equalsExpectedResults == x.get('data') else 'Failed'
    equalsJsonOUTPUT = x

    reverseEqualsservice = 'reverseEquals'
    reverseEqualsInput1 = 'అమెరికాఆస్ట్రేలియా'
    reverseEqualsInput2 = 'యాలిస్ట్రేఆకారిమెఅ'
    reverseEqualsInput3 = 'NA'
    reverseEqualsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/reverseEquals.php?string='+ reverseEqualsInput1 + '&language='+reverseEqualsLanguage+'&secondString='+ reverseEqualsInput2
    reverseEqualsURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    reverseEqualsExpectedResults = True
    reverseEqualsActualResult = x.get('data')
    reverseEqualsPassOrFaill = 'Pass' if reverseEqualsExpectedResults == x.get('data') else 'Failed'
    reverseEqualsJsonOUTPUT = x


    logicalCharAtservice = 'logicalCharAt'
    logicalCharAtInput1 = 'అమెరికాఆస్ట్రేలియా'
    logicalCharAtInput2 = '5'
    logicalCharAtInput3 = 'NA'
    logicalCharAtLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/logicalCharAt.php?string='+ logicalCharAtInput1 + '&language='+logicalCharAtLanguage+'&index='+ logicalCharAtInput2
    logicalCharAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    logicalCharAtExpectedResults = 'స్ట్రే'
    logicalCharAtActualResult = x.get('data')
    logicalCharAtPassOrFaill = 'Pass' if logicalCharAtExpectedResults == x.get('data') else 'Failed'
    logicalCharAtJsonOUTPUT = x

    addCharacterAtservice = 'addCharacterAt'
    addCharacterAtInput1 = 'అమెరికాఆస్ట్రేలియా' 
    addCharacterAtInput2 = '3'
    addCharacterAtInput3 = 'క్క'
    addCharacterAtLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/addCharacterAt.php?string='+ addCharacterAtInput1 + '&language='+addCharacterAtLanguage+'&index='+ addCharacterAtInput2 +'&char=' +addCharacterAtInput3
    addCharacterAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    addCharacterAtExpectedResults = 'అమెరిక్కకాఆస్ట్రేలియా'
    addCharacterAtActualResult = x.get('data')
    addCharacterAtPassOrFaill = 'Pass' if addCharacterAtExpectedResults == x.get('data') else 'Failed'
    addCharacterAtJsonOUTPUT = x

    replaceservice = 'replace'
    replaceInput1 = 'అమెరికాఆస్ట్రేలియా'
    replaceInput2 = 'అమెరికా'
    replaceInput3 = 'క్క'
    replaceLanguage = 'English'
    url = 'http://localhost/indic-wp/api/replace.php?string='+ replaceInput1 + '&language='+addCharacterAtLanguage+'&target='+ replaceInput2 +'&new=' +replaceInput3
    replaceAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    replaceExpectedResults = 'క్కఆస్ట్రేలియా'
    replaceActualResult = x.get('data')
    replacePassOrFaill = 'Pass' if replaceExpectedResults == x.get('data') else 'Failed'
    replaceJsonOUTPUT = x


    getUniqueIntersectingLogicalCharsservice = 'getUniqueIntersectingLogicalChars'
    getUniqueIntersectingLogicalCharsAtInput1 = 'అమెరికాఆస్ట్రేలియా'
    getUniqueIntersectingLogicalCharsAtInput2 = ['కా','యా','లి']
    getUniqueIntersectingLogicalCharsAtInput3 = 'NA'
    getUniqueIntersectingLogicalCharsAtLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/getUniqueIntersectingLogicalChars.php?string='+ getUniqueIntersectingLogicalCharsAtInput1 + '&language='+getUniqueIntersectingLogicalCharsAtLanguage+'&list[0]='+ getUniqueIntersectingLogicalCharsAtInput2[0] +'&list[1]='+ getUniqueIntersectingLogicalCharsAtInput2[1]+'&list[2]='+ getUniqueIntersectingLogicalCharsAtInput2[2]
    getUniqueIntersectingLogicalCharsAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getUniqueIntersectingLogicalCharsExpectedResults = 3
    getUniqueIntersectingLogicalCharsActualResult = x.get('data')
    getUniqueIntersectingLogicalCharsPassOrFaill = 'Pass' if getUniqueIntersectingLogicalCharsExpectedResults == x.get('data') else 'Failed'
    getUniqueIntersectingLogicalCharsJsonOUTPUT = x


    indexOfservice = 'indexOf'
    indexOfInput1 = 'అమెరికాఆస్ట్రేలియా'
    indexOfInput2 = 'స్ట్రే'
    indexOfInput3 = 'NA'
    indexOfLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/indexOf.php?string='+ indexOfInput1 + '&language='+indexOfLanguage+'&char='+ indexOfInput2
    indexOfURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    indexOfExpectedResults = 5
    indexOfActualResult = x.get('data')
    indexOfPassOrFaill = 'Pass' if indexOfExpectedResults == x.get('data') else 'Failed'
    indexOfJsonOUTPUT = x

    baseConsonantService = 'Base Consonants'
    baseConsonantInput1 = 'కర్త'
    baseConsonantInput2 = 'కర్త'
    baseConsonantInput3 = 'NA'
    baseConsonantLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/baseConsonants.php?input1='+ baseConsonantInput1 + '&input2='+ baseConsonantLanguage +'&input3='+ baseConsonantInput2
    baseConsonantAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    baseConsonantExpectedResults = True
    baseConsonantActualResult = x.get('data')
    baseConsonantPassorFaill = 'Pass' if baseConsonantExpectedResults == x.get('data') else 'Failed'
    baseConsonantJsonOUTPUT = x

    ###########################################
    # Need Telugu inputs for testing
    ##########################################
    headsAndTailService = 'Head and Tail Words'
    headsAndTailInput1 = ''
    headsAndTailInput2 = ''
    headsAndTailInput3 = 'NA'
    headsAndTailLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/areHeadsAndTailWords.php?input1='+ headsAndTailInput1 + '&input2='+ headsAndTailLanguage +'&input3='+ headsAndTailInput2
    headsAndTailAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    headsAndTailExpectedResults = True
    headsAndTailActualResult = x.get('data')
    headsAndTailPassorFaill = 'Pass' if headsAndTailExpectedResults == x.get('data') else 'Failed'
    headsAndTailJsonOUTPUT = x


    areLadderWordsService = 'Are Ladder Words'
    areLadderWordsInput1 = ''
    areLadderWordsInput2 = ''
    areLadderWordsInput3 = 'NA'
    areLadderWordsLanguage = 'Telugu'
    url = 'http://localhost/indic-wp/api/areHeadsAndTailWords.php?input1='+ areLadderWordsInput1 + '&input2='+ areLadderWordsLanguage +'&input3='+ areLadderWordsInput2
    areLadderWordsAtURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    areLadderWordsExpectedResults = True
    areLadderWordsActualResult = x.get('data')
    areLadderWordsPassorFaill = 'Pass' if areLadderWordsExpectedResults == x.get('data') else 'Failed'
    areLadderWordsJsonOUTPUT = x




h = html()
h.add(head()).add(link(rel="stylesheet", href="style.css"))
# h.add(style())
with h.add(body()).add(div(id='content')):
    h1('Indic-WP Python Test Outputs')
    # p('')
    # l = tr()
    # l.add(th('Service'))
    # l.add(th('Input 1'))
    with table(style="width:100%", id="mainTable"):
        l = tr()
        l.add(th('Service'))
        l.add(th('Service Address'))
        l.add(th('Input 1'))
        l.add(th('Input 2'))
        l.add(th('Input 3'))
        l.add(th('Expected Result'))
        l.add(th('Actual Result'))
        l.add(th('Pass or Fail'))
        l.add(th('JSON Output'))
        row = tr()
        row.add(td(getLengthservice))
        row.add(td(getLengthURL))
        row.add(td(getLengthinput1))
        row.add(td(getLengthinput2))
        row.add(td(getLengthinput3))
        row.add(td(getLengthexpectedResults))
        row.add(td(getLengthactualResult))
        row.add(td(getLengthpassOrFaill))
        row.add(td(str(getLengthjsonOUTPUT)))

        row = tr()
        row.add(td(getCodePointLengthService))
        row.add(td(getCodePointLengthURL))
        row.add(td(getCodePointLengthInput1))
        row.add(td(getCodePointLengthInput2))
        row.add(td(getCodePointLengthInput3))
        row.add(td(getCodePointLengthExpectedResults))
        row.add(td(getCodePointLengthActualResult))
        row.add(td(getCodePointLengthPassOrFaill))
        row.add(td(str(getCodePointLengthJsonOUTPUT)))

        row = tr()
        row.add(td(getCodePointshService))
        row.add(td(getCodePointsURL))
        row.add(td(getCodePointsInput1))
        row.add(td(getCodePointsInput2))
        row.add(td(getCodePointsInput3))
        row.add(td(str(getCodePointsExpectedResults)))
        row.add(td(str(getCodePointsActualResult)))
        row.add(td(getCodePointsPassOrFaill))
        row.add(td(str(getCodePointsJsonOUTPUT)))

        row = tr()
        row.add(td(reverseService))
        row.add(td(reverseURL))
        row.add(td(reverseInput1))
        row.add(td(reverseInput2))
        row.add(td(reverseInput3))
        row.add(td(reverseExpectedResults))
        row.add(td(reverseActualResult))
        row.add(td(reversePassOrFaill))
        row.add(td(str(reverseJsonOUTPUT)))


        row = tr()
        row.add(td(getLogicalCharsService))
        row.add(td(getLogicalCharsURL))
        row.add(td(getLogicalCharsInput1))
        row.add(td(getLogicalCharsInput2))
        row.add(td(getLogicalCharsInput3))
        row.add(td(str(getLogicalCharsExpectedResults)))
        row.add(td(str(getLogicalCharsActualResult)))
        row.add(td(getLogicalCharsPassOrFaill))
        row.add(td(str(getLogicalCharsJsonOUTPUT)))

        row = tr()
        row.add(td(getWordStrengthService))
        row.add(td(getWordStrengthURL))
        row.add(td(getWordStrengthInput1))
        row.add(td(getWordStrengthInput2))
        row.add(td(getWordStrengthInput3))
        row.add(td(getWordStrengthExpectedResults))
        row.add(td(getWordStrengthActualResult))
        row.add(td(getWordStrengthPassOrFaill))
        row.add(td(str(getWordStrengthJsonOUTPUT)))

        row = tr()
        row.add(td(getWordWeightService))
        row.add(td(getWordWeightURL))
        row.add(td(getWordWeightInput1))
        row.add(td(getWordWeightInput2))
        row.add(td(getWordWeightInput3))
        row.add(td(getWordWeightExpectedResults))
        row.add(td(getWordWeightActualResult))
        row.add(td(getWordWeightPassOrFaill))
        row.add(td(str(getWordWeightJsonOUTPUT)))

        row = tr()
        row.add(td(isPalindromeService))
        row.add(td(isPalindromeURL))
        row.add(td(isPalindromeInput1))
        row.add(td(isPalindromeInput2))
        row.add(td(isPalindromeInput3))
        row.add(td(isPalindromeExpectedResults))
        row.add(td(isPalindromeActualResult))
        row.add(td(isPalindromePassOrFaill))
        row.add(td(str(isPalindromeJsonOUTPUT)))

        row = tr()
        row.add(td(randomizeService))
        row.add(td(randomizeURL))
        row.add(td(randomizeInput1))
        row.add(td(randomizeInput2))
        row.add(td(randomizeInput3))
        row.add(td(randomizeExpectedResults))
        row.add(td(randomizeActualResult))
        row.add(td(randomizePassOrFaill))
        row.add(td(str(randomizeJsonOUTPUT)))


        row = tr()
        row.add(td(getwordLevelService))
        row.add(td(getWordLevelURL))
        row.add(td(getwordLevelInput1))
        row.add(td(getwordLevelInput2))
        row.add(td(getwordLevelInput3))
        row.add(td(getwordLevelExpectedResults))
        row.add(td(getwordLevelActualResult))
        row.add(td(getwordLevelPassOrFaill))
        row.add(td(str(getwordLevelJsonOUTPUT)))

        row = tr()
        row.add(td(containsSpaceService))
        row.add(td(containsSpaceURL))
        row.add(td(containsSpaceInput1))
        row.add(td(containsSpaceInput2))
        row.add(td(containsSpaceInput3))
        row.add(td(containsSpaceExpectedResults))
        row.add(td(containsSpaceActualResult))
        row.add(td(containsSpacePassOrFaill))
        row.add(td(str(containsSpaceJsonOUTPUT)))

        row = tr()
        row.add(td(getLengthNoSpacesService))
        row.add(td(getLengthNoSpacesURL))
        row.add(td(getLengthNoSpacesInput1))
        row.add(td(getLengthNoSpacesInput2))
        row.add(td(getLengthNoSpacesInput3))
        row.add(td(getLengthNoSpacesExpectedResults))
        row.add(td(getLengthNoSpacesActualResult))
        row.add(td(getLengthNoSpacesPassOrFaill))
        row.add(td(str(getLengthNoSpacesJsonOUTPUT)))

       	row = tr()
        row.add(td(getLengthNoSpacesService))
        row.add(td(getLengthNoSpacesNoCommasURL))
        row.add(td(getLengthNoSpacesNoCommasInput1))
        row.add(td(getLengthNoSpacesNoCommasInput2))
        row.add(td(getLengthNoSpacesNoCommasInput3))
        row.add(td(getLengthNoSpacesNoCommasExpectedResults))
        row.add(td(getLengthNoSpacesNoCommasActualResult))
        row.add(td(getLengthNoSpacesNoCommasPassOrFaill))
        row.add(td(str(getLengthNoSpacesNoCommasJsonOUTPUT)))

       	row = tr()
        row.add(td(parseToLogicalCharsService))
        row.add(td(ParseToLogicalCharsURL))
        row.add(td(parseToLogicalCharsInput1))
        row.add(td(parseToLogicalCharsInput2))
        row.add(td(parseToLogicalCharsInput3))
        row.add(td(str(parseToLogicalCharsExpectedResults)))
        row.add(td(str(parseToLogicalCharsActualResult)))
        row.add(td(parseToLogicalCharsPassOrFaill))
        row.add(td(str(parseToLogicalCharsJsonOUTPUT)))

        row = tr()
        row.add(td(parseToLogicalCharactersService))
        row.add(td(parseToLogicalCharactersURL))
        row.add(td(parseToLogicalCharactersInput1))
        row.add(td(parseToLogicalCharactersInput2))
        row.add(td(parseToLogicalCharactersInput3))
        row.add(td(str(parseToLogicalCharactersExpectedResults)))
        row.add(td(str(parseToLogicalCharactersActualResult)))
        row.add(td(parseToLogicalCharactersPassOrFaill))
        row.add(td(str(parseToLogicalCharactersJsonOUTPUT)))

       	row = tr()
        row.add(td(isAnagramService))
        row.add(td(isAnagramURL))
        row.add(td(isAnagramInput1))
        row.add(td(isAnagramInput2))
        row.add(td(isAnagramInput3))
        row.add(td(isAnagramExpectedResults))
        row.add(td(isAnagramActualResult))
        row.add(td(isAnagramPassOrFaill))
        row.add(td(str(isAnagramJsonOUTPUT)))


       	row = tr()
        row.add(td(startsWithService))
        row.add(td(startsWithURL))
        row.add(td(startsWithInput1))
        row.add(td(startsWithInput2))
        row.add(td(startsWithInput3))
        row.add(td(startsWithExpectedResults))
        row.add(td(startsWithActualResult))
        row.add(td(startsWithPassOrFaill))
        row.add(td(str(startsWithJsonOUTPUT)))


       	row = tr()
        row.add(td(endsWithService))
        row.add(td(endsWithURL))
        row.add(td(endsWithInput1))
        row.add(td(endsWithInput2))
        row.add(td(endsWithInput3))
        row.add(td(endsWithExpectedResults))
        row.add(td(endsWithActualResult))
        row.add(td(endsWithPassOrFaill))
        row.add(td(str(endsWithJsonOUTPUT)))

       	row = tr()
        row.add(td(containsStringService))
        row.add(td(containsStringURL))
        row.add(td(containsStringInput1))
        row.add(td(containsStringInput2))
        row.add(td(containsStringInput3))
        row.add(td(containsStringExpectedResults))
        row.add(td(containsStringActualResult))
        row.add(td(containsStringPassOrFaill))
        row.add(td(str(containsStringJsonOUTPUT)))


       	row = tr()
        row.add(td(containsCharService))
        row.add(td(containsCharURL))
        row.add(td(containsCharInput1))
        row.add(td(containsCharInput2))
        row.add(td(containsCharInput3))
        row.add(td(containsCharExpectedResults))
        row.add(td(containsCharActualResult))
        row.add(td(containsCharPassOrFaill))
        row.add(td(str(containsCharJsonOUTPUT)))


       	row = tr()
        row.add(td(containsLogicalCharsService))
        row.add(td(containsLogicalCharsURL))
        row.add(td(containsLogicalCharsInput1))
        row.add(td(containsLogicalCharsInput2))
        row.add(td(containsLogicalCharsInput3))
        row.add(td(containsLogicalCharsExpectedResults))
        row.add(td(containsLogicalCharsActualResult))
        row.add(td(containsLogicalCharsPassOrFaill))
        row.add(td(str(containsLogicalCharsJsonOUTPUT)))

       	row = tr()
        row.add(td(containsAllLogicalCharservice))
        row.add(td(containsAllLogicalCharsURL))
        row.add(td(containsAllLogicalCharsInput1))
        row.add(td(containsAllLogicalCharsInput2))
        row.add(td(containsAllLogicalCharsInput3))
        row.add(td(containsAllLogicalCharsExpectedResults))
        row.add(td(containsAllLogicalCharsActualResult))
        row.add(td(containsAllLogicalCharsPassOrFaill))
        row.add(td(str(containsAllLogicalCharsJsonOUTPUT)))

       	row = tr()
        row.add(td(containsLogicalCharSequenceservice))
        row.add(td(containsLogicalCharSequenceURL))
        row.add(td(containsLogicalCharSequenceInput1))
        row.add(td(containsLogicalCharSequenceInput2))
        row.add(td(containsLogicalCharSequenceInput3))
        row.add(td(containsLogicalCharSequenceExpectedResults))
        row.add(td(containsLogicalCharSequenceActualResult))
        row.add(td(containsLogicalCharSequencePassOrFaill))
        row.add(td(str(containsLogicalCharSequenceJsonOUTPUT)))


       	row = tr()
        row.add(td(canMakeWordservice))
        row.add(td(canMakeWordURL))
        row.add(td(canMakeWordInput1))
        row.add(td(canMakeWordInput2))
        row.add(td(canMakeWordInput3))
        row.add(td(canMakeWordExpectedResults))
        row.add(td(canMakeWordActualResult))
        row.add(td(canMakeWordPassOrFaill))
        row.add(td(str(canMakeWordJsonOUTPUT)))

       	row = tr()
        row.add(td(canMakeAllWordsservice))
        row.add(td(canMakeAllWordsURL))
        row.add(td(canMakeAllWordsInput1))
        row.add(td(canMakeAllWordsInput2))
        row.add(td(canMakeAllWordsInput3))
        row.add(td(canMakeAllWordsExpectedResults))
        row.add(td(canMakeAllWordsActualResult))
        row.add(td(canMakeAllWordsPassOrFaill))
        row.add(td(str(canMakeAllWordsJsonOUTPUT)))

       	row = tr()
        row.add(td(addCharacterAtEndservice))
        row.add(td(addCharacterAtEndURL))
        row.add(td(addCharacterAtEndInput1))
        row.add(td(addCharacterAtEndInput2))
        row.add(td(addCharacterAtEndInput3))
        row.add(td(addCharacterAtEndExpectedResults))
        row.add(td(addCharacterAtEndActualResult))
        row.add(td(addCharacterAtEndPassOrFaill))
        row.add(td(str(addCharacterAtEndJsonOUTPUT)))

       	row = tr()
        row.add(td(isIntersectingservice))
        row.add(td(isIntersectingURL))
        row.add(td(isIntersectingInput1))
        row.add(td(isIntersectingInput2))
        row.add(td(isIntersectingInput3))
        row.add(td(isIntersectingExpectedResults))
        row.add(td(isIntersectingActualResult))
        row.add(td(isIntersectingPassOrFaill))
        row.add(td(str(isIntersectingJsonOUTPUT)))

       	row = tr()
        row.add(td(getIntersectingRankservice))
        row.add(td(getIntersectingRankURL))
        row.add(td(getIntersectingRankInput1))
        row.add(td(getIntersectingRankInput2))
        row.add(td(getIntersectingRankInput3))
        row.add(td(getIntersectingRankExpectedResults))
        row.add(td(getIntersectingRankActualResult))
        row.add(td(getIntersectingRankPassOrFaill))
        row.add(td(str(getIntersectingRankJsonOUTPUT)))

       	row = tr()
        row.add(td(getUniqueIntersectingRankservice))
        row.add(td(getUniqueIntersectingRankURL))
        row.add(td(getUniqueIntersectingRankInput1))
        row.add(td(getUniqueIntersectingRankInput2))
        row.add(td(getUniqueIntersectingRankInput3))
        row.add(td(getUniqueIntersectingRankExpectedResults))
        row.add(td(getUniqueIntersectingRankActualResult))
        row.add(td(getUniqueIntersectingRankPassOrFaill))
        row.add(td(str(getUniqueIntersectingRankJsonOUTPUT)))

       	row = tr()
        row.add(td(compareToservice))
        row.add(td(compareToURL))
        row.add(td(compareToInput1))
        row.add(td(compareToInput2))
        row.add(td(compareToInput3))
        row.add(td(compareToExpectedResults))
        row.add(td(compareToActualResult))
        row.add(td(compareToPassOrFaill))
        row.add(td(str(compareToJsonOUTPUT)))

        row = tr()
        row.add(td(compareToIgnoreCaseservice))
        row.add(td(compareToIgnoreCaseURL))
        row.add(td(compareToIgnoreCaseInput1))
        row.add(td(compareToIgnoreCaseInput2))
        row.add(td(compareToIgnoreCaseInput3))
        row.add(td(compareToIgnoreCaseExpectedResults))
        row.add(td(compareToIgnoreCaseActualResult))
        row.add(td(compareToIgnoreCasePassOrFaill))
        row.add(td(str(compareToIgnoreCaseJsonOUTPUT)))


       	row = tr()
        row.add(td(splitWordservice))
        row.add(td(splitWordURL))
        row.add(td(splitWordInput1))
        row.add(td(splitWordInput2))
        row.add(td(splitWordInput3))
        row.add(td(str(splitWordExpectedResults)))
        row.add(td(str(splitWordActualResult)))
        row.add(td(splitWordPassOrFaill))
        row.add(td(str(splitWordJsonOUTPUT)))

       	row = tr()
        row.add(td(equalsservice))
        row.add(td(equalsURL))
        row.add(td(equalsInput1))
        row.add(td(equalsInput2))
        row.add(td(equalsInput3))
        row.add(td(equalsExpectedResults))
        row.add(td(equalsActualResult))
        row.add(td(equalsPassOrFaill))
        row.add(td(str(equalsJsonOUTPUT)))

       	row = tr()
        row.add(td(reverseEqualsservice))
        row.add(td(reverseEqualsURL))
        row.add(td(reverseEqualsInput1))
        row.add(td(reverseEqualsInput2))
        row.add(td(reverseEqualsInput3))
        row.add(td(reverseEqualsExpectedResults))
        row.add(td(reverseEqualsActualResult))
        row.add(td(reverseEqualsPassOrFaill))
        row.add(td(str(reverseEqualsJsonOUTPUT)))

       	row = tr()
        row.add(td(logicalCharAtservice))
        row.add(td(logicalCharAtURL))
        row.add(td(logicalCharAtInput1))
        row.add(td(logicalCharAtInput2))
        row.add(td(logicalCharAtInput3))
        row.add(td(logicalCharAtExpectedResults))
        row.add(td(logicalCharAtActualResult))
        row.add(td(logicalCharAtPassOrFaill))
        row.add(td(str(logicalCharAtJsonOUTPUT)))

        
        row = tr()
        row.add(td(getUniqueIntersectingLogicalCharsservice))
        row.add(td(getUniqueIntersectingLogicalCharsAtURL))
        row.add(td(getUniqueIntersectingLogicalCharsAtInput1))
        row.add(td(str(getUniqueIntersectingLogicalCharsAtInput2)))
        row.add(td(getUniqueIntersectingLogicalCharsAtInput3))
        row.add(td(getUniqueIntersectingLogicalCharsExpectedResults))
        row.add(td(getUniqueIntersectingLogicalCharsActualResult))
        row.add(td(getUniqueIntersectingLogicalCharsPassOrFaill))
        row.add(td(str(getUniqueIntersectingLogicalCharsJsonOUTPUT))) 

        row = tr()
        row.add(td(indexOfservice))
        row.add(td(indexOfURL))
        row.add(td(indexOfInput1))
        row.add(td(indexOfInput2))
        row.add(td(indexOfInput3))
        row.add(td(indexOfExpectedResults))
        row.add(td(indexOfActualResult))
        row.add(td(indexOfPassOrFaill))
        row.add(td(str(indexOfJsonOUTPUT)))


       	row = tr()
        row.add(td(addCharacterAtservice))
        row.add(td(addCharacterAtURL))
        row.add(td(addCharacterAtInput1))
        row.add(td(addCharacterAtInput2))
        row.add(td(addCharacterAtInput3))
        row.add(td(addCharacterAtExpectedResults))
        row.add(td(addCharacterAtActualResult))
        row.add(td(addCharacterAtPassOrFaill))
        row.add(td(str(addCharacterAtJsonOUTPUT)))

       	row = tr()
        row.add(td(replaceservice))
        row.add(td(replaceAtURL))
        row.add(td(replaceInput1))
        row.add(td(replaceInput2))
        row.add(td(replaceInput3))
        row.add(td(replaceExpectedResults))
        row.add(td(replaceActualResult))
        row.add(td(replacePassOrFaill))
        row.add(td(str(replaceJsonOUTPUT)))


        row = tr()
        row.add(td(baseConsonantService))
        row.add(td(baseConsonantAtURL))
        row.add(td(baseConsonantInput1))
        row.add(td(baseConsonantInput2))
        row.add(td(baseConsonantInput3))
        row.add(td(baseConsonantExpectedResults))
        row.add(td(baseConsonantActualResult))
        row.add(td(baseConsonantPassorFaill))
        row.add(td(str(baseConsonantJsonOUTPUT)))

        row = tr()
        row.add(td(headsAndTailService))
        row.add(td(headsAndTailAtURL))
        row.add(td(headsAndTailInput1))
        row.add(td(headsAndTailInput2))
        row.add(td(headsAndTailInput3))
        row.add(td(headsAndTailLanguage))
        row.add(td(headsAndTailExpectedResults))
        row.add(td(headsAndTailActualResult))
        row.add(td(headsAndTailPassorFaill))
        row.add(td(str(headsAndTailJsonOUTPUT)))

        row = tr()
        row.add(td(areLadderWordsService))
        row.add(td(areLadderWordsAtURL))
        row.add(td(areLadderWordsInput1))
        row.add(td(areLadderWordsInput2))
        row.add(td(areLadderWordsInput3))
        row.add(td(areLadderWordsLanguage))
        row.add(td(areLadderWordsExpectedResults))
        row.add(td(areLadderWordsActualResult))
        row.add(td(areLadderWordsPassorFaill))
        row.add(td(str(areLadderWordsJsonOUTPUT)))


#######################################################################################
#######################################################################################
# Use the below to create new html rows if more services are needed.                  #
#######################################################################################
#######################################################################################

       	# row = tr()
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td())
        # row.add(td(str()))


f = open("indicPythontest.html", "w")
f.write(str(h))
f.close()
print("HTML Output Generated!")


