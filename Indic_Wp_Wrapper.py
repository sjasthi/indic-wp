from flask import Flask, request
import requests

app = Flask(__name__)

@app.route("/")
def hello_world():
    return "<p>Hello, World! From Indic WP Seeing SomeEdits Hello</p>"

@app.route("/getLogicalCharacters/<string>/<language>",methods=["GET"])
def getLogicalCharacters(string,language):
            #urls="https://indic-wp.thisisjava.com/api/getLogicalChars.php?string="+string+"&language=English"
            urls="http://localhost/indic-wp/api/getLogicalChars.php?string="+string+"&language="+language
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data
@app.route("/getBaseCharacters/<string>/<language>",methods=["GET"])
def getBaseCharacters(string,language):
            #urls="https://indic-wp.thisisjava.com/api/getBaseCharacters.php?string="+string+"&language="+language
            urls="http://localhost/indic-wp/api/getBaseCharacters.php?string="+string+"&language="+language
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data


@app.route("/get_match_id_string/<string>/<language>/<string2>")
def get_match_id_string(string,language,string2):
            #urls="https://indic-wp.thisisjava.com/api/get_match_id_string.php?input1="+string+"&input2="+language+"&input3="+string2
            urls="http://localhost/indic-wp/api/get_match_id_string.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            
            return data
        
@app.route("/addCharacterAt/<string>/<language>/<index>/<char>")
def addCharacterAt(string,language,index,char):

        urls="http://localhost/indic-wp/api/addCharacterAt.php?input1="+string+"&input2="+language+"&input3="+index+"&input4="+char
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
            
        return data
@app.route("/addCharacterAtEnd/<string>/<language>/<char>")
def addCharacterAtEnd(string,language,char):
            #urls="https://indic-wp.thisisjava.com/api/addCharacterAtEnd.php?input1="+string+"&input2="+language+"&input3="+char
            urls="http://localhost/indic-wp/api/addCharacterAtEnd.php?input1="+string+"&input2="+language+"&input3="+char
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            
            return data

@app.route("/areHeadAndTailWords/<string>/<language>/<string2>")
def areHeadAndTailWords(string,language,string2):
                #urls="https://indic-wp.thisisjava.com/api/areHeadAndTailWords.php?input1="+string+"&input2="+language+"&input3="+string2
                urls="http://localhost/indic-wp/api/areHeadAndTailWords.php?input1="+string+"&input2="+language+"&input3="+string2
                r=requests.get(urls,headers={"User-Agent":"XY"})
                data=str(r.text)
                
                return data
@app.route("/areLadderWords/<string>/<language>/<string2>")
def areLadderWords(string,language,string2):
            #urls="https://indic-wp.thisisjava.com/api/areLadderWords.php?input1="+string+"&input2="+language+"&input3="+string2
            urls="http://localhost/indic-wp/api/areLadderWords.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
                
            return data

@app.route("/baseConsonants/<string>/<language>/<string2>")
def baseConsonants(string,language,string2):
            #urls="https://indic-wp.thisisjava.com/api/baseConstants.php?input1="+string+"&input2="+language+"&input3="+string2
            urls="http://localhost/indic-wp/api/baseConsonants.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
                
            return data
    
@app.route("/canMakeAllWords/<string>/<language>/<string2>")
def canMakeAllWords(string,language,string2):
            #urls="https://indic-wp.thisisjava.com/api/canMakeAllWords.php?input1="+string+"&input2="+language+"&input3="+string2
            urls="http://localhost/indic-wp/api/canMakeAllWords.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
                
            return data
@app.route("/canMakeWord/<string>/<language>/<string2>")
def canMakeWord(string,language,string2):
            #urls="https://indic-wp.thisisjava.com/api/canMakeWord.php?input1="+string+"&input2="+language+"&input3="+string2
            urls="http://localhost/indic-wp/api/canMakeWord.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
                
            return data
@app.route("/compareTo/<string>/<language>/<string2>")
def compareTo(string,language,string2):
        #urls="https://indic-wp.thisisjava.com/api/compareTo.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/compareTo.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/compareToIgnoreCase/<string>/<language>/<string2>")
def compareToIgnoreCase(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/compareToIgnoreCase.php?input1="+string+"&input2="+language+"&input3="+string2
    urls="http://localhost/indic-wp/api/compareToIgnoreCase.php?input1="+string+"&input2="+language+"&input3="+string2
    r=requests.get(urls,headers={"User-Agent":"XY"})
    data=str(r.text)
    return data

@app.route("/containsAllLogicalChars/<string>/<language>/<string2>")
def containsAllLogicalChars(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/containsAllLogicalChars.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/containsAllLogicalChars.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/containsChar/<string>/<language>/<string2>")
def containsChar(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/containsChar.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/containsChar.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/containsLogicalChars/<string>/<language>/<string2>")
def containsLogicalChars(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/containsLogicalChar.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/containsLogicalChars.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/containsLogicalCharSequence/<string>/<language>/<string2>")
def containsLogicalCharSequence(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/containsLogicalCharSequence.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/containsSpace/<string>/<language>")
def containsSpace(string,language):
    #urls="https://indic-wp.thisisjava.com/api/containsSpace.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/containsSpace.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/containsString/<string>/<language>/<string2>")
def containsString(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/containsString.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/containsString.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/endsWith/<string>/<language>/<string2>")
def endsWith(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/endsWith.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/endsWith.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getCodePointLength/<string>/<language>")
def getCodePointLength(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getCodePointLength.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getCodePointLength.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getCodePoints/<string>/<language>")
def getCodePoints(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getCodePoints.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getCodePoints.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getFillerCharacters/<string>/<language>/<string2>")
def getFillerCharacters(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/getFillerCharacters.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/getFillerCharacters.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getIntersectingRank/<string>/<language>/<string2>")
def getIntersectingRank(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/getIntersectingRank.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/getIntersectingRank.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getLength/<string>/<language>")
def getLength(string,language):
        #urls="https://indic-wp.thisisjava.com/api/getLength.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getLength.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getLength2/<string>/<language>")
def getLength2(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getLength2.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getLength2.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getLengthNoSpaces/<string>/<language>")
def getLengthNoSpaces(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getLengthNoSpaces.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getLengthNoSpaces.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getLengthNoSpacesNoCommas/<string>/<language>")
def getLengthNoSpacesNoCommas(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getLengthNoSpacesNoCommas.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getLengthNoSpacesNoCommas.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getLogicalChars2/<string>/<language>")
def getLogicalChars2(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getLogicalChars2.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getLogicalChars2.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getUniqueIntersectingLogicalChars/<string>/<language>/<string2>")
def getUniqueIntersectingLogicalChars(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/getUniqueIntersectingLogicalChars.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/getUniqueIntersectingLogicalChars.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getUniqueIntersectingRank/<string>/<language>/<string2>")
def getUniqueIntersectingRank(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/getUniqueIntersectingRank.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/getUniqueIntersectingRank.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getWordLevel/<string>/<language>")
def getWordLevel(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getWordLevel.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getWordLevel.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getWordStrength/<string>/<language>")
def getWordStrength(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getWordStrength.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getWordStrength.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/getWordWeight/<string>/<language>")
def getWordWeight(string,language):
    #urls="https://indic-wp.thisisjava.com/api/getWordWeight.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/getWordWeight.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/indexOf/<string>/<language>/<string2>")
def indexOf(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/indexOf.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/indexOf.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/isAnagram/<string>/<language>/<string2>")
def isAnagram(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/isAnagram.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/isAnagram.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/isCharConsonant/<string>/<language>")
def isCharConstant(string,language):
        #urls="https://indic-wp.thisisjava.com/api/isCharConsonant.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/isCharConsonant.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/isCharVowel/<string>/<language>")
def isCharVowel(string,language):
    #urls="https://indic-wp.thisisjava.com/api/isCharVowel.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/isCharVowel.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/isIntersecting/<string>/<language>/<string2>")
def isIntersecting(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/isIntersecting.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/isIntersecting.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/isPalindrome/<string>/<language>")
def isPalindrome(string,language):
    #urls="https://indic-wp.thisisjava.com/api/isPalindrome.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/isPalindrome.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/logicalCharAt/<string>/<language>/<string2>")
def logicalCharAt(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/logicalCharAt.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/logicalCharAt.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/parseToLogicalCharacters/<string>/<language>")
def parseToLogicalCharacters(string,language):
    #urls="https://indic-wp.thisisjava.com/api/parseToLogicalCharacters.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/parseToLogicalCharacters.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/parseToLogicalChars/<string>/<language>")
def parseToLogicalChars(string,language):
    #urls="https://indic-wp.thisisjava.com/api/parseToLogicalChars.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/parseToLogicalChars.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/parseToLogicalChars2/<string>/<language>")
def parseToLogicalChars2(string,language):
    #urls="https://indic-wp.thisisjava.com/api/parseToLogicalChars2.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/parseToLogicalChars2.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/randomize/<string>/<language>")
def randomize(string,language):
    #urls="https://indic-wp.thisisjava.com/api/randomize.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/randomize.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/replace/<string>/<language>/<string2>/<target>")
def replace(string,language,string2,target):
        urls="http://localhost/indic-wp/api/replace.php?input1="+string+"&input2="+language+"&input3="+string2+"&input4="+target
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
            
        return data
@app.route("/reverse/<string>/<language>")
def reverse(string,language):
    #urls="https://indic-wp.thisisjava.com/api/reverse.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/reverse.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/reverseEquals/<string>/<language>/<string2>")
def reverseEquals(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/reverseEquals.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/reverseEquals.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/splitInto15Chunks/<string>/<language>")
def splitInto15Chunks(string,language):
    #urls="https://indic-wp.thisisjava.com/api/splitInto15Chunks.php?input1="+string+"&input2="+language
        urls="http://localhost/indic-wp/api/splitInto15Chunks.php?input1="+string+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/splitWord/<string>/<language>/<string2>")
def splitWord(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/splitWord.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/splitWord.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/startsWith/<string>/<language>/<string2>")
def startsWith(string,language,string2):
    #urls="https://indic-wp.thisisjava.com/api/startsWith.php?input1="+string+"&input2="+language+"&input3="+string2
        urls="http://localhost/indic-wp/api/startsWith.php?input1="+string+"&input2="+language+"&input3="+string2
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data


@app.route("/userExists/<email>")
def userExists(email):
    #urls="https://indic-wp.thisisjava.com/api/userExists.php?input1="+email
        urls="http://localhost/indic-wp/api/userExists.php?input1="+email
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data
@app.route("/ws_login/<email>/<password>")
def ws_login(email,password):
    #urls="https://indic-wp.thisisjava.com/api/ws_login.php?input1="+email+"&input2="+password
        urls="http://localhost/indic-wp/api/ws_login.php?input1="+email+"&input2="+password
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getRole/<email>")
def getRole(email):
    #urls="https://indic-wp.thisisjava.com/api/getRole.php?input1="+email
        urls="http://localhost/indic-wp/api/getRole.php?input1="+email
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data

@app.route("/getLangForString/<string>")
def getLangForString(string):
    # urls="https://indic-wp.thisisjava.com/api/getLangForString.php?input1="+string
        urls="http://localhost/indic-wp/api/getLangForString.php?input1="+string
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data


@app.route("/getRandomLogicalChars/<n>/<language>")
def getRandomLogicalChars(n,language):
    # urls="http://localhost/indic-wp/api/getRandomLogicalChars.php?input1="+n+"&input2="+language
        urls="http://localhost/indic-wp/api/getRandomLogicalChars.php?input1="+n+"&input2="+language
        r=requests.get(urls,headers={"User-Agent":"XY"})
        data=str(r.text)
        return data