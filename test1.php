<?php 

require("word_processor.php");

$language = "Telugu";
$x = "అహింసకు మించిన ఆయుధం లేదు";


    // create a word processor
    $x_wp = new wordProcessor($x, $language);

    // now, we can call any method on x_wp
    echo "<br>";
    echo "<br> given word = ", $x;
    echo "<br> logical length = ", $x_wp->getLength();
    echo "<br> code point length = ", $x_wp->getCodePointLength();
    
    echo "<br> word weight = ", $x_wp->getWordWeight($language);
    echo "<br> word strength = ", $x_wp->getWordStrength($language);
    echo "<br> word level = ", $x_wp->getWordLevel($language);

    echo "<br> logical characters = ";
    print_r($x_wp->getLogicalChars());
    echo "<br> code points = ";
    print_r($x_wp->getCodePoints());
    


?>