<?php

// Problem 1
/**
 * Write a PHP script that records 3 digits and prints the total of the first two digits multiplied by the third digit.
 */

 $input = 123;

 function cop_problem1($param) {
      $first = substr($param, 0, 1);
      $second = substr($param, 1, 1);
      $third = substr($param, 2, 1);
  
      $result = ($first + $second) * $third;
  
      return $result;
 } 

 function problem1($param) {
  $first = floor($param/100) % 10;
  $second = floor($param/10) % 10;
  $third = $param % 10;

  return ($first + $second) * $third;
 }
 echo problem1($input);
 echo "<br/>";

//  Problem 2

/**
 * A program that calculates the size of a box whose length and width are fixed with a value of 5 and 10 and the height is variable (size = length x width x height)
 */

 $length = 5;
 $width = 10;

 function problem2($height) {
  global $length, $width;
  return ($length * $width * $height);
 }

 echo problem2(5);
 echo "<br/>";
 

//  Problem 3

/**
 * Write a PHP script that takes a number integer representing the hours and converts it to seconds.
 */

 function problem3($hours) {
  return $hours * 60 * 60;
 }

 echo problem3(1);
 echo "<br/>";


//  Problem 4

/**
 * Write a PHP script that calculates the Area of a Triangle store the base and height Print the area.
 */


 function problem4($base, $height) {
  $area = ($base * $height) / 2;
  return $area;
 }

  echo problem4(5, 10);
  echo "<br/>";

//  Problem 5

/**
 *  Write a PHP script that takes the age in years and prints the age in days.
 */

 function problem5($age) {
  return $age * 365;
 }

  echo problem5(1);
  echo "<br/>";

//  Problem 6
$string = "EraaSoft Learn by practice";

// Get the length of this sentence.
$string_length = strlen($string);

// Get the length of this sentence without spaces. 
$string_length_without_spaces = strlen(trim($string));

// Get the number of words in this sentence.
$number_of_words = str_word_count($string);

// Check if this word (by) exists in the string or not.
$search = "by";
str_contains($string, $search);
// or
strpos($string, $search) !== false; // if it returns false, it means that the word does not exist in the string.


// Get the word (EraaSoft) from the string and print it.
echo substr($string, 0, strlen("EraaSoft"));
echo "<br/>";


// Remove the word (by) from the string and print the string with and without (by)
echo $string;

$string_without_by = str_replace("by", "", $string);

echo $string_without_by;
echo "<br/>";


// Problem 11

$string_one = "Eraa";
$string_two = "Soft";

//  Make a new variable called (Full_string) that concatenate string_one and string_two

$full_name = $string_one . $string_two;

// Compare the full_string and this string (EraaSoft).

echo strcmp($full_name, "EraaSoft"); // if it returns 0, it means that the two strings are equal.

// Problem 14
// Write a PHP script to split the following string. Sample string: 'ErraSoft'

print_r($splited_str = str_split("ErraSoft", 2)); // explode will works as well

echo implode("/", $splited_str); // join function will works as well