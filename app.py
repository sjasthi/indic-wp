from flask import Flask, request
import requests

app = Flask(__name__)

@app.route("/")
def hello_world():
    return "<p>Hello, World! From Indic WP Seeing SomeEdits Hello</p>"

@app.route("/getLogicalCharacters",methods=["GET"])
def getLogicalCharacters():
    if request.method=="GET":
        string= request.args.get('String',default="None",type=str)
        language=request.args.get('Language',default="None",type=str)
        if(string != "None" and language != "None"):
            #urls="https://indic-wp.thisisjava.com/api/getLogicalChars.php?string="+string+"&language=English"
            urls="http://localhost/indic-wp/api/getLogicalChars.php?string="+string+"&language="+language
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data
        else:
            urls="http://localhost/indic-wp/api/getLogicalChars.php"
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data
    else:
        data="Please Use A GET Request to see the whole function"
        return data
@app.route("/getBaseCharacters",methods=["GET"])
def getBaseCharacters():
    if request.method=="GET":
        string= request.args.get('String',default="None",type=str)
        language=request.args.get('Language',default="None",type=str)
        if(string != "None" and language != "None"):
            #urls="https://indic-wp.thisisjava.com/api/getLogicalChars.php?string="+string+"&language=English"
            urls="http://localhost/indic-wp/api/getBaseCharacters.php?string="+string+"&language="+language
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data
        else:
            urls="http://localhost/indic-wp/api/getBaseCharacters.php"
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            return data
    else:
        data="Please Use A GET Request to see the whole function"
        return data


@app.route("/get_match_id_string")

def get_match_id_string():
    if request.method=="GET":
        string= request.args.get('String1',default="None",type=str)
        language=request.args.get('Language',default="None",type=str)
        string2= request.args.get('String2',default="None",type=str)
        if(string != "None" and language != "None"):
            #urls="https://indic-wp.thisisjava.com/api/getLogicalChars.php?string="+string+"&language=English"
            urls="http://localhost/indic-wp/api/get_match_id_string.php?input1="+string+"&input2="+language+"&input3="+string2
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            
            return data
        else:
            urls="http://localhost/indic-wp/api/get_match_id_string.php"
            r=requests.get(urls,headers={"User-Agent":"XY"})
            data=str(r.text)
            
            return data
    else:
        data="Please Use A GET Request to see the whole function"
        return data
