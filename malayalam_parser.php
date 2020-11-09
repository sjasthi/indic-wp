<?php

/* IMPORTANT : Note on using Google translator for Malayalam
WHILE USING GOOGLE TRANSLATOR MAKE SURE THAT YOU SELECT MALAYALAM FROM LEFT DROPDOWN LIST (NEXT TO DETECT LANGUAGE)
AND THEN TYPE YOUR INPUT AND COPY IT.

EVERYTHING SHOULD WORK FINE. IF THERE IS STILL A PROBLEM IN PARSING, PLEASE CHECK AT THE BOTTOM OF LEFT SIDE WINDOW THERE IS
ANOTHER DROPDOWN LIST. THE VERY FIRST OPTION IN THIS WINDOW WHICH IS (namaskar -> നമസ്കാർ) SHOULD BE CHECKED.
*/




// malayalam_parser.php primarily deals with splitting an input string
// into a series of logical characters
// contact Siva.Jasthi@metrostate.edu  or (Aslam) zi5379yx@metrostate.edu for any clarifications on
// malayalam processing logic used in these functions.

// for unicode reference : http://www.unicode.org/charts/

function stripSpacesMalayalam($log_chars) {
    $code_points = parseToCodePoints(implode($log_chars));
    $build = array();
    $build_i = 0;
    for($i=0; $i < count($code_points); $i++) {
        if(strcmp($log_chars[$i], " ") == 0)
            continue;
        else {
            $build[$build_i++] = $log_chars[$i];
            if(isHalant(end($code_points[$i]) && $i + 1 < count($code_points))) {
                if($code_points[$i+1] == 32) { // if the next character is a space...
                    $build[$build_i][count($build[$build_i])] = json_decode("\u200c");
                }
            }
        }
    }
    return $build;
}

// $word expects a single utf-8 encoded word
// returns a 2 dimensional array, representing the unicoded logical characters of the word
function parseToCodePoints($word) {
    $word_array = explode_malayalam(json_encode($word));
    $i = 0;
    $logical_chars = array();
    $ch_buffer = array();

    while( $i < count($word_array) ) {
        $current_ch = $word_array[$i++];
        $ch_buffer[count($ch_buffer)] = $current_ch;

        if( $i == count($word_array) ) {
            $logical_chars[count($logical_chars)] = $ch_buffer;
            continue;
        }
        $next_ch = $word_array[$i];
        if(isDependent($next_ch)) {
            $ch_buffer[count($ch_buffer)] = $next_ch;
            $i++;
            $logical_chars[count($logical_chars)] = $ch_buffer;
            $ch_buffer = array();
            continue;
        }
        if(isHalant($current_ch)) {
            if(isConsonant($next_ch)) {
                if($i < count($word_array)) {
                    continue;
                }
                $ch_buffer[count($ch_buffer)] = $current_ch;
            }
            $logical_chars[count($logical_chars)] = $ch_buffer;
            $ch_buffer = array();
            continue;
        } else if(isConsonant($current_ch)) {
            if(isHalant($next_ch) || isDependentVowel($next_ch) || isTwoPartDependentVowel($next_ch)) {
                if($i < count($word_array)) {
                    continue;
                }
                $ch_buffer[count($ch_buffer)] = $current_ch;
            }
            $logical_chars[count($logical_chars)] = $ch_buffer;
            $ch_buffer = array();
            continue;
        } else if(isVowel($current_ch)) {
            if(isDependentVowel($next_ch) || isTwoPartDependentVowel($next_ch) ) {
                $ch_buffer[count($ch_buffer)] = $next_ch;
                $i++;
            }

            $logical_chars[count($logical_chars)] = $ch_buffer;
            $ch_buffer = array();
            continue;
        }
        $logical_chars[count($logical_chars)] = $ch_buffer;
        $ch_buffer = array();
    }
    return $logical_chars;
}


// returns a 2d array of the logical characters, but using Malayalam characters
function parseToLogicalCharacters($word) {
    if(is_array($word)) {
        for($i=0; $i < count($word); $i++)
            $word[$i] = parseToCharacter($word[$i]);
        return $word;
    }
    else return parseToLogicalCharacters(parseToCodePoints($word));
}

function parseToCharacter($logical_char) {
    $malayalam_char = "";
    foreach($logical_char as $char) {
        if(isMalayalam($char))	$malayalam_char .= sprintf("\\u%'04s", dechex($char));
        else return chr($char);
    }
    return json_decode('"'.$malayalam_char.'"');
}

function explode_malayalam($to_explode) {
    $pos=0;
    $e_pos=0;
    $exploded = array();
    while($pos < strlen($to_explode) - 1) {
        if(strcmp($to_explode[$pos], "\"") == 0) {
            $pos++;
            continue;
        }
        if(strcmp($to_explode[$pos], "\\") == 0) { // if the the character in question is a slash...
            if(strcmp($to_explode[$pos + 1], "u") == 0) { // ...followed by a u...
                $char = intval(substr($to_explode, $pos + 2, 4), 16); // convert to a number
                if(isMalayalam($char)) {
                    // if it matches, add it as a character, bump the counter up by six, and continue
                    $exploded[$e_pos++] = $char;
                    $pos += 6;
                    continue;
                }
            }
        }
        $exploded[$e_pos++] = ord($to_explode[$pos++]);
    }
    return $exploded;
}

function isConsonant($ch) {
    return ( $ch >= 0x0d15 && $ch <= 0x0d3a );
}

function isDependentVowel($ch) {
    return ( $ch >= 0x0d3e && $ch <= 0x0d48 );
}

//Two-part dependent vowel signs (newly added)
//may be required later  || ( $ch >= 0x0d4a && $ch <= 0x0d4c )
function isTwoPartDependentVowel($ch) {
    return ( $ch >= 0x0d4a && $ch <= 0x0d4c );
}

function isDependent($ch) {
    return ( ($ch == 0x0d01) || ($ch == 0x0d02) || ($ch == 0x0d03) );
}

function isVowel($ch) {
    return ($ch >= 0x0d05 && $ch <= 0x0d14);
}
//0c4d
function isHalant($ch) {
    return $ch == 0x0d4d;
}

function isMalayalamNumber($ch) {
    return ($ch >= 0x0d66 && $ch <= 0x0d6f);
}

// this function is not perfect: there are gaps in the Telugu/Hindi/Gujarati/Malayalam unicode table,
// so it is theoretically possible to get a false positive. However, other than
// intentionally feeding this function bad data, there's no practical way to get
// that false positive, and nothing harmful would happen if you did
function isMalayalam($ch) {
    return ( $ch >= 0x0d00 && $ch <= 0x0d7f ) || ( $ch == 0x200c );
}
//}
?>
