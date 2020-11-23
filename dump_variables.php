<?php
session_start();


  // these lines format the output as HTML comments
  // and call dump_array repeatedly

  echo "<br> <br>  BEGIN VARIABLE DUMP ";

  echo "<br> <br> ======= BEGIN GET VARS =======";
  echo "<br> <br> ======= ".dump_array($_GET)." =======";

  echo "<br> <br> ======= BEGIN POST VARS =======";
  echo "<br> <br> ======= ".dump_array($_POST)." =======";

  echo "<br> <br> ======= BEGIN SESSION VARS =======";
  echo "<br> <br> ======= ".dump_array($_SESSION)." =======";

  echo "<br> <br> ======= BEGIN COOKIE VARS =======";
  echo "<br> <br> ======= ".dump_array($_COOKIE)." =======";

  echo "<br> <br> ======= END VARIABLE DUMP =======";

// dump_array() takes one array as a parameter
// It iterates through that array, creating a single
// line string to represent the array as a set

function dump_array($array) {

  if(is_array($array)) {

    $size = count($array);
    $string = "";
    if($size) {

      $count = 0;
      $string .= "{ ";
      // add each element's key and value to the string
      foreach($array as $var => $value) {

        $string .= $var." = ".$value;
        if($count++ < ($size-1)) {
          $string .= ", ";
        }
      }
      $string .= " }";
    }
    return $string;
  } else {
    // if it is not an array, just return it
    return $array;
  }
}
?>
