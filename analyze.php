<?php
require("word_processor.php");

if(isset($_POST["to_parse"])) {
	analyze_essay($_POST["to_parse"], $_POST["to_language"]);
}

// We are intentionally not sterilizing the $essay input, since the parsing
// peforms that task quite effectively
function analyze_essay($essay, $language) {
	$parsed = array();
	$wordbuff = "";
	$tot_lines = 0;
	$tot_letters = 0;
	$tot_str = 0; // total strength
	$tot_wt = 0; // total weight
	$newline = false;

	for($i=0; $i < strlen($essay); $i++) {
		// Return the ASCII value of...
		$chr = ord($essay[$i])	;

		if($chr == 10) { // is the character a newline?
			if(!$newline) {
				$tot_lines++; // count successive newlines as a single newline
				$newline = true;
			}
		}//end if
		else {
			$newline = false;
		}//end else


		if( is_word_separator($chr) ) {
			if(strlen($wordbuff) > 0) {
				$parsed[] = new wordProcessor($wordbuff, $language);
				$wordbuff = "";
			}
		}
		else if( !is_ignored($chr) ) {
			$wordbuff .= $essay[$i];
		}
	}//end for loop

	// housekeeping if the essay does not end with a word separator
	if(strlen($wordbuff)) {
		$parsed[] = new wordProcessor($wordbuff, $language);
		$tot_lines++;
	}

	$tot_words = count($parsed);
	if( $tot_words == 0 ) {
		echo "0|0|0|0|0|0|0";
		return;
	}

	foreach($parsed as $word) {
		$tot_letters += $word->getLength();
		$tot_str += $word->getWordStrength($language);
		$tot_wt += $word->getWordWeight($language);
	}

	// Sort the elements of the array using a user-defined comparison function:
	usort($parsed, "len_lex_sort");
	$analysis = "";
	$current = $parsed[0];
	$word_num = 1;
	$freq=1;

	for($i=1; $i < count($parsed); $i++) {
		if($parsed[$i]->getWord() != $current->getWord()) {
			$analysis .= "|".$word_num .",". $current->getWord() .",". $current->getLength() .",". $freq;
			$current = $parsed[$i];
			$word_num++;
			$freq = 1;
		}//end if
		else {
			$freq++;
		}//end else
	}//end for loop

	$analysis .= "|".$word_num .",". $current->getWord() .",". $current->getLength() .",". $freq;
	// words|letters|lines|strength|weight|avg strength|avg weight
	echo $tot_words ."|". $tot_letters ."|". $tot_lines;
	echo "|" . $tot_str ."|". $tot_wt;
	echo "|". $tot_str / $tot_words . "|" . $tot_wt / $tot_words;
	echo $analysis;
}//end analyze_essay

// ignoring quotes, both single and double and unprintable characters
// 39 = '
// 34 = "
// 32 = space
function is_ignored($chr) {
	return ($chr == 39) || ($chr == 34) || ($chr < 32);
}

// word separators are unprintable characters and all punctuation and whitespace
// NOTE! this does not account for punctuation that resides as ascii values between 128 and 255
// since the punctuation in that range is spanish, this is not a fatal flaw for this project
function is_word_separator($chr) {
	// greater than -1 less than 48
	// greater than 57 less than 64
	// greater than 90 less than 97
	// greater than 122 less than 128
	return ($chr > -1 && $chr < 48) || ($chr > 57 && $chr < 64) || ($chr > 90 && $chr < 97) || ($chr > 122 && $chr < 128);
}

function len_lex_sort($word1, $word2) {
	if( $word1->getLength() == $word2->getLength() ) return strcasecmp($word1->getWord(), $word2->getWord());
	else return $word1->getLength() > $word2->getLength();
}