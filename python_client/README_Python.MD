# Indic-WP Python Client

Indic-WP_Python is a Python Client that utilizes the APIs from the Indic-WP web application.

## Installation

This application is meant to be ran the command line and requires the latest version of Python to be installed on the machine running the code.
  
[Dominate](https://github.com/Knio/dominate) is a Python Library that is used to generate the HTML output. Instructions on installation is on the Dominate GitHub.

## Usage
Any input listed on a service that is needed will have a value. In the getLength() request below, the service only needs a single string input, and the language. To alter one of the default inputs, simply replace the required input string. If a service has 'NA' for the input, that input is not used. 
```python
    getLengthservice = 'getLength()'
    getLengthinput1 = 'hello'
    getLengthinput2 = 'NA'
    getLengthinput3 = 'NA'
    getLengthlanguage = 'English'
    url = 'http://localhost/indic-wp/api/getlength.php?string='+ input1 + '&language=' + language
    getLengthgetLengthURL = url
    r = requests.get(url)
    dataDecoded = getDecode(r.text)
    x = json.loads(dataDecoded)
    getLengthexpectedResults = 5
    getLengthactualResult = x.get('data')
    getLengthpassOrFaill = 'Pass' if expectedResults == x.get('data') else 'Failed'
    getLengthjsonOUTPUT = x
```