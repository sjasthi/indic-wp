import os

import requests
import json

def getDecode(jsonToDecode):
	data_decoded = jsonToDecode.encode().decode('utf-8-sig')
	data_decoded2 = data_decoded.encode().decode('utf-8-sig')
	return data_decoded2

language = 'english'
testWord = 'Hello'

secondString = 'Hello'
englishChar = 'e'
index = '2'
word = secondString
colCount = '2'
intersectList = ['a', 'e']
contains = 'el'
target = 'e'
new = 'f'
start = 'H'
end = 'o'
letterType = 'vowels'
numOfChar = '6'
count = 0





expectedParsedCharacters = ['H', 'e', 'l', 'l', 'o']
expectedCodePointsCalculated =  [[72], [101], [108], [108], [111]]
stringEquals = True 
expectedWordWeightCalc = 5
logicalCharAtIndex = 'l'
reverseEquals = False
charAddedAtEnd = 'Helloe'
canmakeWord = True
stringRandomized = testWord
vowelChecked = False
wordSplit = {'0': ['H', 'e'], '2': ['l', 'l'], '4': ['o', None]}
wordCompared = 0
parsedLogicalChars = ['H', 'e', 'l', 'l', 'o']
expectedLegnth = len(testWord)
intersectingRank = 5
logicalCharsCalc = ['H', 'e', 'l', 'l', 'o']
isPalindrome = False 
containsString = True 
uniqueIntersectingRank = 1
containsLogicalSequence = True
containsLogicalChars = True
anagramAssessed = True 
addCharacterAt = 'Heelo'
wordsCompared = 0
containsSpace = 'False'
isIntersecting = True 
wordLevelCalc = 5 
uniqueIntersectingChar = 1
replace = 'Hfllo'
stringReversed = 'olleH' 
isConsonant = False
startsWith = True 
lengthCalcWithSpaces = 5
lengthCalculated = len(testWord)
endsWith = True 
containsChar = False 
codePointLengthCalc = 5 
wordStrength = 5 
containsAllLogicalChars = True 
fillerCharsGenerated = True 
invalidOrEmptyWords = None




expectedResults = {
'parseToLogicalCharacters' : expectedParsedCharacters,
'getCodePoints' : expectedCodePointsCalculated, 
'equals' : stringEquals,
'getWordWeight' : expectedWordWeightCalc,
'logicalCharAt' : logicalCharAtIndex,
'reverseEquals' : reverseEquals,
'addCharacterAtEnd' : charAddedAtEnd,
'canMakeWord' : canmakeWord,
'randomize' : stringRandomized,
'isCharVowel' : vowelChecked,
'splitWord' : wordSplit,
'compareToIgnoreCase' : wordCompared,
'parseToLogicalChars' : parsedLogicalChars,
'getLengthNoSpacesNoCommas' : expectedLegnth,
'getIntersectingRank' : intersectingRank,
'getLogicalChars' : logicalCharsCalc,
'isPalindrome' : isPalindrome,
'containsString' : containsString,
'getUniqueIntersectingRank' : uniqueIntersectingRank,
'containsLogicalCharSequence' : containsLogicalSequence,
'containsLogicalChars' : containsLogicalChars,
'isAnagram' : anagramAssessed,
'addCharacterAt' : addCharacterAt,
'compareTo' : wordsCompared,
'containsSpace' : containsSpace,
'isIntersecting' : isIntersecting ,
'getWordLevel' : wordLevelCalc ,
'getUniqueIntersectingLogicalChars' : uniqueIntersectingChar,
'replace' : replace,
'reverse' : stringReversed,
'isCharConsonant' : isConsonant,
'startsWith' : startsWith,
'getLengthNoSpaces' : lengthCalcWithSpaces,
'getLength' : lengthCalculated ,
'endsWith' : endsWith ,
'containsChar' : containsChar,
'getCodePointLength' : codePointLengthCalc,
'getWordStrength' : wordStrength,
'containsAllLogicalChars' : containsAllLogicalChars,
'getFillerCharacters' : fillerCharsGenerated,
'canMakeAllWords' : invalidOrEmptyWords
}









print('')


path = '/Applications/XAMPP/xamppfiles/htdocs/indic-wp/api/'
files = os.listdir(path)



payload = {'string': testWord, 'language': language, 'secondString': secondString, 
'char': englishChar, 'index': index, 'word': secondString, 'col': colCount, 'list[0]': intersectList[0], 'list[1]': intersectList[1], 
'contains': contains, 'target': target, 'new': new, 'start': start, 'end': end, 'type': letterType, 'numOfChar': numOfChar}

for f in files:
	url = 'http://localhost/indic-wp/api/' + f
	# print(f[:-4])
	r = requests.get(url, params=payload)
	# print(r.text)
	dataDecoded = getDecode(r.text)
	# print(dataDecoded)
	x = json.loads(dataDecoded)
	# print(x.get("response_code"))
	# print(x.keys())
	# print(x)
	if(x.get('data') == expectedResults[f[:-4]]):
		print("Service Called: " + f[:-4] + " Word Tested: " + " " + testWord + " Expected Results: " , expectedResults[f[:-4]] , " Actual Result: " ,x.get('data') , " Pass? " + str(True))
		print(" JSON Response: ", x)
		print("\n")
	else:
		print(f[:-4] + " " + str(False) + " JSON Respnse: ", x)
		print("\n")
	# print(x)
	count += 1


url = 'http://localhost/indic-wp/api/getLength.php'
payload = {'string': 'అమ్మ', 'language': 'Telugu'} 
r = requests.get(url, params=payload)
dataDecoded = getDecode(r.text)
x = json.loads(dataDecoded)
print(x)








