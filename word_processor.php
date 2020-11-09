<?php
//require("telugu_parser.php");


/*
 * This is PHP version of Telugu WordProcessor.java
 * The function names and arguments are identical.
 * Contact Siva.Jasthi@metrostate.edu for Java version
 *
 *  NOTE: WordProcessor would be the same for English as well as other
 *  Indic Languages. It would not change as we are manipulating 
 *  these three variables
 * 	 "input string" 
 *   "logical characters"
 *   "codepoints"
 * 
 *   The logic of splitting an "input string" to a set of logical characters
 *   would be different for each Language
 *   For example, "telugu_parser.php" focusses on Telugu parser
 */


class wordProcessor {

	// since all three of these properties are reliant on the others being in exact sync,
	// we only allow them to be accessed via mutators and accessors
	// the basic word, dispayable as UTF-8
	protected $word = "";

	// the word, broken into an array of characters
	protected $logical_chars = array();

	// the array of characters, stored as unicode values
	// All standard functions treat code points as logical characters
	// That may work for English, but not for other multi-byte languages
	protected $code_points = array();

	// constructor
	function __construct($word, $language) {
		if(is_string($word)) return $this->setWord($word, $language);
	}

	// setter for the word 
	// this also parses the word to logical characters 
	function setWord($a_word, $a_language) {
		if( !is_string($a_word) ) return;
		$this->word = $a_word;
		$language = $a_language;
		//$language = $_GET["language"];
		return $this->parseToLogicalChars($this->word, $language);
	}

	/*// all mutators need to call this, since it keeps all three properties in sync
	function parseToLogicalChars() {
		$this->code_points = parseToCodePoints($this->getWord());
		$this->logical_chars = parseToLogicalCharacters($this->getCodePoints());
		return $this->getLogicalChars();
	}*/

	function parseToLogicalChars($word, $language) {
		if ($language == "Hindi"){
			include_once 'hindi_parser.php';
			$this->code_points = parseToCodePoints($word);
			$this->logical_chars = parseToLogicalCharacters($this->getCodePoints());
			return $this->getLogicalChars();

		}elseif ($language == "Gujarati") {
			include_once 'gujarati_parser.php';
			$this->code_points = parseToCodePoints($word);
			$this->logical_chars = parseToLogicalCharacters($this->getCodePoints());
			return $this->getLogicalChars();
		}elseif ($language == "Malayalam") {
			include_once 'malayalam_parser.php';
			$this->code_points = parseToCodePoints($word);
			$this->logical_chars = parseToLogicalCharacters($this->getCodePoints());
			return $this->getLogicalChars();
		}else{
			include_once 'telugu_parser.php';
			$this->code_points = parseToCodePoints($word);
			$this->logical_chars = parseToLogicalCharacters($this->getCodePoints());
			return $this->getLogicalChars();
		}
	}

	// a wrapper for the underlying telugu_parser version with the same name
	function parseToLogicalCharacters($word) {
		return parseToLogicalCharacters($word);
	}

	// accepts an array of logical characters and sets the word to the value of chars
	function setLogicalChars($some_logical_chars) {
		if( !is_array($some_logical_chars) ) return;
		return $this->setWord(implode("", $some_logical_chars));
	}

	function getWord() {
		return $this->word;
	}

	function getLogicalChars() {
		return $this->logical_chars;
	}

	function getCodePoints() {
		return $this->code_points;
	}

	// Standard getLength( ) functions operate on code points
	// We are overtaking and providing a meaningful length
	// based on the number of logical characters
	function getLength() {
		return count($this->getLogicalChars());
	}

	// returns the total number of code points for the word
	function getCodePointLength() {
		$len = 0;
		foreach($this->getCodePoints() as $chars) {
			$len += count($chars);
		}
		return $len;
	}

	function startsWith($start_chars) {
		if( strncmp($start_chars, $this->getWord(), strlen($start_chars)) == 0 ) return true;
		else return false;
	}

	function endsWith($end_chars) {
		if( strcmp($end_chars, substr($this->getWord(), -strlen($end_chars))) == 0 ) return true;
		else return false;
	}

	function containsString($to_find) {
		if( strpos($this->getWord(), $to_find) === false ) return false;
		else return true;
	}

	function containsChar($to_find) {
		foreach($this->getLogicalChars() as $char)
			if($to_find === $char) return true;
		return false;
	}

	function containsLogicalChars($to_find) {
		foreach($to_find as $char) {
			if($this->containsChar($char)) continue;
			return false;
		}
		return true;
	}


	function containsAllLogicalChars($to_find) {
		return $this->containsLogicalChars($to_find);
	}

	function containsLogicalCharSequence($to_find) {
		if(strpos($this->getWord(), $to_find) === false) return false;
		else return true;
	}

	function canMakeWord($a_word) {
		$parsed_word = $this->parseToLogicalCharacters($a_word);
		return $this->containsLogicalChars($parsed_word);
	}

	function canMakeAllWords($some_words) {
		foreach($some_words as $word) {
			if($this->canMakeWord($word)) continue;
			return false;
		}
		return true;
	}

	function containsSpace() {
		foreach($this->getLogicalChars() as $char)
			if($char === " ") return true;
		return false;
	}

	function isPalindrome() {
		$l_count = count($this->getLogicalChars());
		if($l_count < 2) return true; // a one letter word is always a palindrome (a zero length word? sure, it's one too)
		for($i=0; $i < $l_count / 2; $i++) {
			if( $this->logicalCharAt($i) !== $this->logicalCharAt($l_count - $i - 1) ) return false;
		}
		return true;
	}

	// accepts both a string word or an array of logical characters
	function isAnagram($word) {
		if( is_array($word) )
			return ( (count($this->getLogicalChars()) == count($word)) && $this->containsLogicalChars($word) );
		else return $this->isAnagram($this->parseToLogicalCharacters($word));
	}

	function trim() {
		$this->setWord(trim($this->getWord()));
		return $this->getWord();
	}

	function toCaps() {
		$this->setWord(strtoupper($this->getWord()));
		return $this->getWord();
	}

	function stripSpaces() {
		$this->setLogicalChars(stripSpacesTelugu($this->getLogicalChars()));
		return $this->getWord();
	}

	function stripAllSymbols() {
		$build = array();
		$build_i = 0;
		for($i=0; $i < count($this->getLogicalChars()); $i++) {
			$chr = $this->getCodePoints()[$i][0];
			// this is not perfect, it only checks ASCII special symbols
			// but could easily be expanded to cover other ranges
			if( $this->is_symbol($chr) ) continue;
			$build[$build_i++] = $this->logicalCharAt($i);
		}
		$this->setLogicalChars($build);
		return $this->getWord();
	}

	function is_symbol($chr) {
		return (($chr > 32 && $chr < 48) || ($chr > 57 && $chr < 65) ||
			($chr > 90 && $chr < 97) || ($chr > 122 && $chr < 127) );
	}

	function reverse() {
		return implode(array_reverse($this->getLogicalChars()));
	}

	function replace($sub_string, $substitute_string) {
		return str_replace($sub_string, $substitute_string, $this->getWord());
	}

	function addCharacterAt($index, $log_char) {
		if($index >= count($this->getLogicalChars()))
			return $this->addCharacterAtEnd($log_char);

		// array_splice may as well work here. 
		$build = array();
		$build_i = 0;
		foreach($this->getLogicalChars() as $char) {
			if($build_i == $index) $build[$build_i++] = $log_char;
			$build[$build_i++] = $char;
		}
		return implode($build);
	}

	function addCharacterAtEnd($a_logical_char) {
		return $this->getWord() . $a_logical_char;
	}

	function getIntersectingRank($word_2) {
		return count(array_intersect($this->getLogicalChars(), parseToLogicalCharacters($word_2)));
	}

	function isIntersecting($word_2) {
		return ($this->getIntersectingRank($word_2) > 0);
	}

	function getUniqueIntersectingLogicalChars($list) {
		$intersecting = array();
		foreach($this->getLogicalChars() as $char) {
			if( $char == " " ) continue; // we don't want to match spaces
			$found = array_search(strtolower($char), $list);
			if($found !== FALSE) {
				array_push($intersecting, $char);
				$list[$found] = NULL;
			}
			else {
				$found = array_search(strtoupper($char), $list);
				if($found !== FALSE) {
					array_push($intersecting, $char);
					$list[$found] = NULL;
				}
			}
		}
		return $intersecting;
	}

	function getUniqueIntersectingRank($list) {
		return count($this->getUniqueIntersectingLogicalChars($list));
	}

	function logicalCharAt($index) {
		return $this->logical_chars[$index];
	}

	function codePointAt($index) {
		foreach($this->getCodePoints() as $code_points)
			foreach($code_points as $cp)
				if($index-- == 0) return $cp;
	}

	function indexOf($char) {
		$index = 0;
		foreach($this->getLogicalChars() as $logical_char) {
			if($logical_char == $char) return $index;
			$index++;
		}
		return -1;
	}

	function compareTo($word_2) {
		return strcmp($this->getWord(), $word_2);
	}

	function compareToIgnoreCase($word_2) {
		return strcasecmp($this->getWord(), $word_2);
	}

	function randomize($some_strings) {
		shuffle($some_strings);
		return $some_strings;
	}

	function splitWord($cols) {
		$split_word = array();
		for($row=0; $row < count($this->getLogicalChars()); $row += 2) {
			for($col=0;$col < $cols;$col++) {
				@$split_word[$row][$col] = $this->getLogicalChars()[$row + $col];
			}
		}
		return $split_word;
	}

	function __toString() {
		return $this->getWord() . ", ".
		var_export($this->getLogicalChars()) .", ".
		var_export($this->getCodePoints());
	}

	function equals($word_2) {
		return $this->getWord() === $word_2;
	}

	function reverseEquals($word_2) {
		return $this->reverse() == $word_2;
	}

	function getWordStrength($language)
	{
		$len = $this->getLength();

		if ($language == "English")
			return $len;

		$strength = 1;
		foreach ($this->getCodePoints() as $char)
			$strength = ($strength > count($char) ? $strength : count($char));

		return $strength;

	}

	function getWordWeight($language) {
		$len = $this->getLength();

		if ($language == "English")
			return $len;

		$weight = 0;
		foreach($this->getCodePoints() as $char)
			$weight += count($char);

		return $weight;
	}
}
?>