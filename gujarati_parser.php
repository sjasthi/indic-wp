<?php


// gujarati_parser.php primarily deals with splitting an input string
// into a series of logical characters
// contact Siva.Jasthi@metrostate.edu  or (Aslam) zi5379yx@metrostate.edu for any clarifications on
// gujarti processing logic used in these functions.

// for unicode reference : http://www.unicode.org/charts/

    function stripSpacesGujarati($log_chars) {
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
        $word_array = explode_gujarati(json_encode($word));
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
                if(isHalant($next_ch) || isDependentVowel($next_ch)) {
                    if($i < count($word_array)) {
                        continue;
                    }
                    $ch_buffer[count($ch_buffer)] = $current_ch;
                }
                $logical_chars[count($logical_chars)] = $ch_buffer;
                $ch_buffer = array();
                continue;
            } else if(isVowel($current_ch)) {
                if(isDependentVowel($next_ch)) {
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


// returns a 2d array of the logical characters, but using Gujarati characters
    function parseToLogicalCharacters($word) {
        if(is_array($word)) {
            for($i=0; $i < count($word); $i++)
                $word[$i] = parseToCharacter($word[$i]);
            return $word;
        }
        else return parseToLogicalCharacters(parseToCodePoints($word));
    }

    function parseToCharacter($logical_char) {
        $gujarati_char = "";
        foreach($logical_char as $char) {
            if(isGujarati($char))	$gujarati_char .= sprintf("\\u%'04s", dechex($char));
            else return chr($char);
        }
        return json_decode('"'.$gujarati_char.'"');
    }

    function explode_gujarati($to_explode) {
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
                    $char = 0 + ("0x" . substr($to_explode, $pos + 2, 4)); // convert to a number
                    if(isGujarati($char)) {
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
        return ( $ch >= 0x0a95 && $ch <= 0xab9 );
    }

    function isDependentVowel($ch) {
        return ( $ch >= 0x0abe && $ch <= 0x0acc );
    }

    function isDependent($ch) {
        return ( ($ch == 0x0a81) || ($ch == 0x0a82) || ($ch == 0x0a83) );
    }

    function isVowel($ch) {
        return ($ch >= 0x0a85 && $ch <= 0x0a94);
    }
//0c4d
    function isHalant($ch) {
        return $ch == 0x0acd;
    }

    function isGujaratiNumber($ch) {
        return ($ch >= 0x0ae6 && $ch <= 0x0aef);
    }

// this function is not perfect: there are gaps in the Telugu/Hindi/Gujarati unicode table,
// so it is theoretically possible to get a false positive. However, other than
// intentionally feeding this function bad data, there's no practical way to get
// that false positive, and nothing harmful would happen if you did
// Gujarati Range: 0A80–0AFF
    function isGujarati($ch) {
        return ( $ch >= 0x0a80 && $ch <= 0x0aff ) || ( $ch == 0x200c );
    }
//}
?>