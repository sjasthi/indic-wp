import java.util.Scanner;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Main {
    public static String language = null;

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


        //english version start here
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
            pool.execute(new API("isAnagram", isAnagram, "TRUE"));

            String[] startsWith = new String[]{"hello", language, "h"};
            pool.execute(new API("startsWith", startsWith, "TRUE"));

            String[] endsWith = new String[]{"hello", language, "o"};
            pool.execute(new API("endsWith", endsWith, "TRUE"));

            String[] containsString = new String[]{"hello", language, "lo"};
            pool.execute(new API("containsString", containsString, "TRUE"));

            String[] containsChar = new String[]{"hello", language, "o"};
            pool.execute(new API("containsChar", containsChar, "TRUE"));

            String[] containsLogicalChars = new String[]{"hello", language, "l,o"};
            pool.execute(new API("containsLogicalChars", containsLogicalChars, "TRUE"));

            String[] containsAllLogicalChars = new String[]{"hello", language, "l,o"};
            pool.execute(new API("containsAllLogicalChars", containsAllLogicalChars, "TRUE"));

            String[] containsLogicalCharSequence = new String[]{"hello", language, "lo"};
            pool.execute(new API("containsLogicalCharSequence", containsLogicalCharSequence, "TRUE"));

            String[] canMakeWord = new String[]{"hello", language, "lo"};
            pool.execute(new API("canMakeWord", canMakeWord, "TRUE"));

            String[] canMakeAllWords = new String[]{"hello", language, "hell,lo"};
            pool.execute(new API("canMakeAllWords", canMakeAllWords, "TRUE"));

            String[] addCharacterAtEnd = new String[]{"hello", language, "a"};
            pool.execute(new API("addCharacterAtEnd", addCharacterAtEnd, "\"helloa\""));

            String[] isIntersecting = new String[]{"hello", language, "el"};
            pool.execute(new API("isIntersecting", isIntersecting, "TRUE"));

            String[] getIntersectingRank = new String[]{"hello", language, "el"};
            pool.execute(new API("getIntersectingRank", getIntersectingRank, "3"));

            String[] compareTo = new String[]{"hello", language, "hello"};
            pool.execute(new API("compareTo", compareTo, "0"));

            String[] compareToIgnoreCase = new String[]{"HELLO", language, "hel"};
            pool.execute(new API("compareToIgnoreCase", compareToIgnoreCase, "2"));

            String[] splitWord = new String[]{"hello!", language, "2"};
            pool.execute(new API("splitWord", splitWord, "{\"0\":[\"h\",\"e\"],\"2\":[\"l\",\"l\"],\"4\":[\"o\",\"!\"]}"));

            String[] equals = new String[]{"hello!", language, "hello!"};
            pool.execute(new API("equals", equals, "TRUE"));

            String[] reverseEquals = new String[]{"hello!", language, "!olleh"};
            pool.execute(new API("reverseEquals", reverseEquals, "TRUE"));

            String[] logicalCharAt = new String[]{"hello!", language, "3"};
            pool.execute(new API("logicalCharAt", logicalCharAt, "\"l\""));

            String[] indexOf = new String[]{"hello!", language, "l"};
            pool.execute(new API("indexOf", indexOf, "2"));

            String[] addCharacterAt = new String[]{"hello!", language, "1", "e"};
            pool.execute(new API("addCharacterAt", addCharacterAt, "\"heello!\""));

            String[] replace = new String[]{"hello!", language, "ell", "i"};
            pool.execute(new API("replace", replace, "\"hio!\""));

            String[] getUniqueIntersectingRank = new String[]{"hello", language, "input3[0]=e&input3[1]=l&input3[2]=i"};
            API temp = new API("getUniqueIntersectingRank", getUniqueIntersectingRank, "2");
            temp.setLanguage(language);
            pool.execute(temp);

            String[] getUniqueIntersectingLogicalChars = new String[]{"hello!", language, "['l', 'l']"};
            temp = new API("getUniqueIntersectingLogicalChars", getUniqueIntersectingLogicalChars, "2");
            temp.setLanguage(language);
            pool.execute(temp);

            String[] areLadderWords = new String[]{"help", language, "held"};
            pool.execute(new API("areLadderWords", areLadderWords, "true"));

            String[] areHeadAndTailWords = new String[]{"cat", language, "tin"};
            pool.execute(new API("areHeadAndTailWords", areHeadAndTailWords, "true"));
        }

        //Start of telugu
        if (language.equals("telugu")) {
            String[] getCodePointLength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getCodePointLength", getCodePointLength, "18"));

            String[] getCodePoints = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getCodePoints", getCodePoints, "c05 c2e c46 c30 c3f c15 c3e c06 c38 c4d c1f c4d c30 c47 c32 c3f c2f c3e"));

            String[] getLength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLength", getLength, "8"));

            String[] getLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLogicalChars", getLogicalChars, "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా"));

            String[] getWordStrength = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordStrength", getWordStrength, "6"));

            String[] getWordWeight = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordWeight", getWordWeight, "18"));

            String[] isPalindrome = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isPalindrome", isPalindrome, "FALSE"));

//            String[] randomize = new String[]{"అమెరికాఆస్ట్రేలియా", language};
//            pool.execute(new URLBuilder("randomize", randomize, ""));

            String[] reverse = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("reverse", reverse, "యాలిస్ట్రేఆకారిమెఅ"));

            String[] containsSpace = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("containsSpace", containsSpace, "NO"));

            String[] getWordLevel = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getWordLevel", getWordLevel, "6"));

            String[] isCharConsonant = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isCharConsonant", isCharConsonant, ""));

            String[] isCharVowel = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("isCharVowel", isCharVowel, ""));

            String[] getLengthNoSpaces = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLengthNoSpaces", getLengthNoSpaces, "8"));

            String[] getLengthNoSpacesNoCommas = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("getLengthNoSpacesNoCommas", getLengthNoSpacesNoCommas, "8"));

            String[] parseToLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("parseToLogicalChars", parseToLogicalChars, "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా"));

            String[] parseToLogicalCharacters = new String[]{"అమెరికాఆస్ట్రేలియా", language};
            pool.execute(new API("parseToLogicalCharacters", parseToLogicalCharacters, "అ,మె,రి,కా,ఆ,స్ట్రే,లి,యా"));

            String[] startsWith = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమె"};
            pool.execute(new API("startsWith", startsWith, "TRUE"));

            String[] endsWith = new String[]{"అమెరికాఆస్ట్రేలియా", language, "లియా"};
            pool.execute(new API("endsWith", endsWith, "TRUE"));

            String[] containsString = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా"};
            pool.execute(new API("containsString", containsString, "TRUE"));

            String[] containsChar = new String[]{"అమెరికాఆస్ట్రేలియా", language, "స్ట్రే"};
            pool.execute(new API("containsChar", containsChar, "TRUE"));

            String[] containsLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కా,యా,లి"};
            pool.execute(new API("containsLogicalChars", containsLogicalChars, "TRUE"));

            String[] containsAllLogicalChars = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కా,యా,లి"};
            pool.execute(new API("containsAllLogicalChars", containsAllLogicalChars, "TRUE"));

            String[] containsLogicalCharSequence = new String[]{"అమెరికాఆస్ట్రేలియా", language, "రి,కా,ఆ"};
            pool.execute(new API("containsLogicalCharSequence", containsLogicalCharSequence, "TRUE"));

            String[] canMakeWord = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా"};
            pool.execute(new API("canMakeWord", canMakeWord, "TRUE"));

            String[] canMakeAllWords = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికా,ఆస్ట్రేలియా"};
            pool.execute(new API("canMakeAllWords", canMakeAllWords, "TRUE"));

            String[] addCharacterAtEnd = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ల్లో"};
            pool.execute(new API("addCharacterAtEnd", addCharacterAtEnd, "అమెరికాఆస్ట్రేలియాల్లో"));

            String[] isIntersecting = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ఇటలి"};
            pool.execute(new API("isIntersecting", isIntersecting, "TRUE"));

            String[] getIntersectingRank = new String[]{"అమెరికాఆస్ట్రేలియా", language, "కాయాలి"};
            pool.execute(new API("getIntersectingRank", getIntersectingRank, "3"));

            String[] compareTo = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికాఆస్ట్రేలియా"};
            pool.execute(new API("compareTo", compareTo, "0"));

            String[] compareToIgnoreCase = new String[]{"అమెరికాఆస్ట్రేలియా", language, "ఆస్ట్రేలియా"};
            pool.execute(new API("compareToIgnoreCase", compareToIgnoreCase, "1"));

            String[] splitWord = new String[]{"అమెరికాఆస్ట్రేలియా", language, "2"};
            pool.execute(new API("splitWord", splitWord, "{\"0\":[\"\\u0c05\",\"\\u0c2e\\u0c46\"],\"2\":[\"\\u0c30\\u0c3f\",\"\\u0c15\\u0c3e\"],\"4\":[\"\\u0c06\",\"\\u0c38\\u0c4d\\u0c1f\\u0c4d\\u0c30\\u0c47\"],\"6\":[\"\\u0c32\\u0c3f\",\"\\u0c2f\\u0c3e\"]}"));

            String[] equals = new String[]{"అమెరికాఆస్ట్రేలియా", language, "అమెరికాఆస్ట్రేలియా"};
            pool.execute(new API("equals", equals, " TRUE"));

            String[] reverseEquals = new String[]{"అమెరికాఆస్ట్రేలియా", language, "యాలిస్ట్రేఆకారిమెఅ"};
            pool.execute(new API("reverseEquals", reverseEquals, ""));

            String[] logicalCharAt = new String[]{"అమెరికాఆస్ట్రేలియా", language, "6"};
            pool.execute(new API("logicalCharAt", logicalCharAt, "స్ట్రే"));

            String[] replace = new String[]{"అమెరికాఆస్ట్రేలియా", language, "క్క", "2"};
            pool.execute(new API("replace", replace, "అక్కరికాఆస్ట్రేలియా"));

            String[] areLadderWords = new String[]{"మురుకు", language, "మురుగు"};
            pool.execute(new API("areLadderWords", areLadderWords, "true"));

            String[] areHeadAndTailWords = new String[]{"మురుకు", language, "కుడుము"};
            pool.execute(new API("areHeadAndTailWords", areHeadAndTailWords, "true"));
        }

        pool.shutdown();
    }
}
