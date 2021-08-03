import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Main {
    public static String language = null;

    /**
     * The format is as follows
     * String [] name which contains all of the parameters for the web API
     * Since this is a multithreaded application we feed the pool of threads a task.
     * The task in this case is the API class.
     * The API class is instantiated with the desired web APIs name along with the parameters
     * and the expected reuslt of the test
     */
    public static void main(String[] args) {
        UserInterface ui = new UserInterface();

        //starting the ui
        int userInput = ui.runMenu();
        if (userInput == 1) {
            language = "telugu";
        } else {
            language = "english";
        }

        //getting desired method and appropriate args for method
        System.out.println("language chosen is " + language);
        ExecutorService pool = Executors.newFixedThreadPool(10);

        //This is the start of the English tests.
        if (language.equals("english")) {
            String[] getLength = new String[]{"hello", language};
            pool.execute(new API("getLength", getLength, "5"));

            String[] getCodePointLength = new String[]{"hello", language};
            pool.execute(new API("getCodePointLength", getCodePointLength, "5"));

            String[] getCodePoints = new String[]{"hello", language};
            pool.execute(new API("getCodePoints", getCodePoints, "[[104],[101],[108],[108],[111]]"));

            String[] reverse = new String[]{"hello", language};
            pool.execute(new API("reverse", reverse, "\"olleh\""));

            String[] getLogicalChars = new String[]{"hello", language};
            pool.execute(new API("getLogicalChars", getLogicalChars, "[\"h\",\"e\",\"l\",\"l\",\"o\"]"));

            String[] getWordStrength = new String[]{"hello", language};
            pool.execute(new API("getWordStrength", getWordStrength, "5"));

            String[] getWordWeight = new String[]{"hello", language};
            pool.execute(new API("getWordWeight", getWordWeight, "5"));

            String[] isPalindrome = new String[]{"hello", language};
            pool.execute(new API("isPalindrome", isPalindrome, "FALSE"));

            String[] randomize = new String[]{"hello", language};
            pool.execute(new API("randomize", randomize, "Not hello"));

            String[] getWordLevel = new String[]{"hello", language};
            pool.execute(new API("getWordLevel", getWordLevel, "5"));

            String[] containsSpace = new String[]{"hello", language};
            pool.execute(new API("containsSpace", containsSpace, "FALSE"));

            String[] getLengthNoSpaces = new String[]{"hello world", language};
            pool.execute(new API("getLengthNoSpaces", getLengthNoSpaces, "10"));

            String[] getLengthNoSpacesNoCommas = new String[]{"hello, World", language};
            pool.execute(new API("getLengthNoSpacesNoCommas", getLengthNoSpacesNoCommas, "10"));

            String[] parseToLogicalChars = new String[]{"hello", language};
            pool.execute(new API("parseToLogicalChars", parseToLogicalChars, "[\"h\",\"e\",\"l\",\"l\",\"o\"]"));

            String[] parseToLogicalCharacters = new String[]{"hello", language};
            pool.execute(new API("parseToLogicalCharacters", parseToLogicalCharacters, "[\"h\",\"e\",\"l\",\"l\",\"o\"]"));

            String[] isAnagram = new String[]{"study", language, "dusty"};
            pool.execute(new API("isAnagram", isAnagram, "true"));

            String[] startsWith = new String[]{"hello", language, "h"};
            pool.execute(new API("startsWith", startsWith, "true"));

            String[] endsWith = new String[]{"hello", language, "o"};
            pool.execute(new API("endsWith", endsWith, "true"));

            String[] containsString = new String[]{"hello", language, "lo"};
            pool.execute(new API("containsString", containsString, "true"));

            String[] containsChar = new String[]{"hello", language, "o"};
            pool.execute(new API("containsChar", containsChar, "true"));

            String[] containsLogicalChars = new String[]{"hello", language, "l,o"};
            pool.execute(new API("containsLogicalChars", containsLogicalChars, "true"));

            String[] containsAllLogicalChars = new String[]{"hello", language, "l,o"};
            pool.execute(new API("containsAllLogicalChars", containsAllLogicalChars, "true"));

            String[] containsLogicalCharSequence = new String[]{"hello", language, "lo"};
            pool.execute(new API("containsLogicalCharSequence", containsLogicalCharSequence, "true"));

            String[] canMakeWord = new String[]{"hello", language, "lo"};
            pool.execute(new API("canMakeWord", canMakeWord, "true"));

            String[] canMakeAllWords = new String[]{"hello", language, "hell,lo"};
            pool.execute(new API("canMakeAllWords", canMakeAllWords, "true"));

            String[] addCharacterAtEnd = new String[]{"hello", language, "a"};
            pool.execute(new API("addCharacterAtEnd", addCharacterAtEnd, "\"helloa\""));

            String[] isIntersecting = new String[]{"hello", language, "el"};
            pool.execute(new API("isIntersecting", isIntersecting, "true"));

            String[] getIntersectingRank = new String[]{"hello", language, "el"};
            pool.execute(new API("getIntersectingRank", getIntersectingRank, "3"));

            String[] compareTo = new String[]{"hello", language, "hello"};
            pool.execute(new API("compareTo", compareTo, "0"));

            String[] compareToIgnoreCase = new String[]{"HELLO", language, "hel"};
            pool.execute(new API("compareToIgnoreCase", compareToIgnoreCase, "2"));

            String[] splitWord = new String[]{"hello!", language, "2"};
            pool.execute(new API("splitWord", splitWord, "{\"0\":[\"h\",\"e\"],\"2\":[\"l\",\"l\"],\"4\":[\"o\",\"!\"]}"));

            String[] equals = new String[]{"hello!", language, "hello!"};
            pool.execute(new API("equals", equals, "true"));

            String[] reverseEquals = new String[]{"hello!", language, "!olleh"};
            pool.execute(new API("reverseEquals", reverseEquals, "true"));

            String[] logicalCharAt = new String[]{"hello!", language, "3"};
            pool.execute(new API("logicalCharAt", logicalCharAt, "\"l\""));

            String[] indexOf = new String[]{"hello!", language, "l"};
            pool.execute(new API("indexOf", indexOf, "2"));

            String[] addCharacterAt = new String[]{"hello!", language, "1", "e"};
            pool.execute(new API("addCharacterAt", addCharacterAt, "\"heello!\""));

            String[] replace = new String[]{"hello!", language, "ell", "i"};
            pool.execute(new API("replace", replace, "\"hio!\""));

            String[] getUniqueIntersectingRank = new String[]{"hello", language, "e,l,i"};
            API temp = new API("getUniqueIntersectingRank", getUniqueIntersectingRank, "2");
            temp.setLanguage(language);
            pool.execute(temp);

            String[] getUniqueIntersectingLogicalChars = new String[]{"hello!", language, "l,l"};
            temp = new API("getUniqueIntersectingLogicalChars", getUniqueIntersectingLogicalChars, "2");
            temp.setLanguage(language);
            pool.execute(temp);

            String[] areLadderWords = new String[]{"help", language, "held"};
            pool.execute(new API("areLadderWords", areLadderWords, "true"));

            String[] areHeadAndTailWords = new String[]{"cat", language, "tin"};
            pool.execute(new API("areHeadAndTailWords", areHeadAndTailWords, "true"));

            String[] baseConsonants = new String[]{"hello", language, "hilla"};
            pool.execute(new API("baseConsonants", baseConsonants, "true"));
        }

        //Start of telugu
        if (language.equals("telugu")) {
            String[] getCodePointLength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getCodePointLength", getCodePointLength, "18"));

            String[] getCodePoints = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getCodePoints", getCodePoints, "[[3077],[3118,3142],[3120,3135],[3093,3134],[3078],[3128,3149,3103,3149,3120,3143],[3122,3135],[3119,3134]]"));

            String[] getLength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLength", getLength, "8"));

            String[] getLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLogicalChars", getLogicalChars, "[\"అ\",\"మె\",\"రి\",\"కా\",\"ఆ\",\"స్ట్రే\",\"లి\",\"యా\"]"));

            String[] getWordStrength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordStrength", getWordStrength, "6"));

            String[] getWordWeight = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordWeight", getWordWeight, "18"));

            String[] isPalindrome = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isPalindrome", isPalindrome, "FALSE"));

            String[] reverse = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("reverse", reverse, "\"యాలిస్ట్రేఆకారిమెఅ\""));

            String[] containsSpace = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("containsSpace", containsSpace, "false"));

            String[] getWordLevel = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordLevel", getWordLevel, "6"));

            String[] isCharConsonant = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isCharConsonant", isCharConsonant, "true"));

            String[] isCharVowel = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isCharVowel", isCharVowel, "false"));

            String[] getLengthNoSpaces = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLengthNoSpaces", getLengthNoSpaces, "8"));

            String[] getLengthNoSpacesNoCommas = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLengthNoSpacesNoCommas", getLengthNoSpacesNoCommas, "8"));

            String[] parseToLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("parseToLogicalChars", parseToLogicalChars, "[\"అ\",\"మె\",\"రి\",\"కా\",\"ఆ\",\"స్ట్రే\",\"లి\",\"యా\"]"));

            String[] parseToLogicalCharacters = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("parseToLogicalCharacters", parseToLogicalCharacters, "[\"అ\",\"మె\",\"రి\",\"కా\",\"ఆ\",\"స్ట్రే\",\"లి\",\"యా\"]"));

            String[] startsWith = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమె"};
            pool.execute(new API("startsWith", startsWith, "true"));

            String[] endsWith = new String[]{"అమెరికాఆస్ట్రేలియా", language, "లియా"};
            pool.execute(new API("endsWith", endsWith, "true"));

            String[] containsString = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా"};
            pool.execute(new API("containsString", containsString, "true"));

            String[] containsChar = new String[]{"అమెరికాఆస్ట్రేలియా", language, "స్ట్రే"};
            pool.execute(new API("containsChar", containsChar, "true"));

            String[] containsLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కా,యా,లి"};
            pool.execute(new API("containsLogicalChars", containsLogicalChars, "true"));

            String[] containsAllLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కా,యా,లి"};
            pool.execute(new API("containsAllLogicalChars", containsAllLogicalChars, "true"));

            String[] containsLogicalCharSequence = new String[]{"అమెరికాఆస్ట్రేలియా", language, "రి,కా,ఆ"};
            pool.execute(new API("containsLogicalCharSequence", containsLogicalCharSequence, "true"));

            String[] canMakeWord = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా"};
            pool.execute(new API("canMakeWord", canMakeWord, "true"));

            String[] canMakeAllWords = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా,ఆస్ట్రేలియా"};
            pool.execute(new API("canMakeAllWords", canMakeAllWords, "true"));

            String[] addCharacterAtEnd = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ల్లో"};
            pool.execute(new API("addCharacterAtEnd", addCharacterAtEnd, "\"అమెరికాఆస్ట్రేలియాల్లో\""));

            String[] isIntersecting = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ఇటలి"};
            pool.execute(new API("isIntersecting", isIntersecting, "true"));

            String[] getIntersectingRank = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కాయాలి"};
            pool.execute(new API("getIntersectingRank", getIntersectingRank, "3"));

            String[] compareTo = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికాఆస్ట్రేలియా"};
            pool.execute(new API("compareTo", compareTo, "0"));

            String[] compareToIgnoreCase = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ఆస్ట్రేలియా"};
            pool.execute(new API("compareToIgnoreCase", compareToIgnoreCase, "-1"));

            String[] splitWord = new String[]{"అమెరికాఆస్ట్రేలియా", language, "2"};
            pool.execute(new API("splitWord", splitWord, "{\"0\":[\"అ\",\"మె\"],\"2\":[\"రి\",\"కా\"],\"4\":[\"ఆ\",\"స్ట్రే\"],\"6\":[\"లి\",\"యా\"]}"));

            String[] equals = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికాఆస్ట్రేలియా"};
            pool.execute(new API("equals", equals, "true"));

            String[] reverseEquals = new String[]{"అమెరికాఆస్ట్రేలియా", language, "యాలిస్ట్రేఆకారిమెఅ"};
            pool.execute(new API("reverseEquals", reverseEquals, "true"));

            String[] logicalCharAt = new String[]{"అమెరికాఆస్ట్రేలియా", language, "6"};
            pool.execute(new API("logicalCharAt", logicalCharAt, "\"లి\""));

            String[] replace = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా", "క్క"};
            pool.execute(new API("replace", replace, "\"క్కఆస్ట్రేలియా\""));

            String[] areLadderWords = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమ్మరికాఆస్ట్రేలియా"};
            pool.execute(new API("areLadderWords", areLadderWords, "true"));

            String[] areHeadAndTailWords = new String[]{"అమెరికాఆస్ట్రేలియా", language, "యామాతారాజభానస"};
            pool.execute(new API("areHeadAndTailWords", areHeadAndTailWords, "true"));

            String[] baseConsonants = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమరకఆసలయ"};
            pool.execute(new API("baseConsonants", baseConsonants, "true"));
        }

        pool.shutdown();
    }
}
