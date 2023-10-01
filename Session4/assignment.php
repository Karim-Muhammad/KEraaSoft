<?php

  require_once "helpers/array_log.php";


  /**
   * 1. A program that calculates the average of the numbers in an array of n elements. The array is filled with random numbers. 
   */
  function average($array) {
    return array_sum($array) / count($array);
  }
  average([1,2,3,4,5]);

  echo "<br/>";
  /**
   * 2- A program in which an array contains 10 numbers and another array 2D of size 2x5. What is required is that the second array is dictated by the first array.
   */

   function dictated($array, &$array2D) {
      $array2D = array_chunk($array, 5);
   }
   $my2D = [];
   dictated([1,2,3,4,5,6,7,8,9,10], $my2D);
   array_log($my2D);

   echo "<br/>";
   /**
    * 3- A program in which an array of a group of numbers and print the largest and smallest number
    */

    function largest_smallest($array) {
      $minmax = [$array[0], $array[0]];

      for($i = 1; $i < count($array); $i++) {
        if($minmax[0] > $array[$i])
          $minmax[0] = $array[$i];
        if($minmax[1] < $array[$i])
          $minmax[1] = $array[$i];
      }
      echo "Largest Element in Array = $minmax[1], Smallest Element in Array = $minmax[0]";
      return $minmax;
    }

    largest_smallest([1, 9, 0, -1, 99, 109, -2, 199]);

    echo "<br/>";
    /**
     * 4. The program, in which an array contains 10 numbers, and you store a number and calculates how many numbers are greater  than or equal and how many numbers are smaller  than this number inside
     */

     function array_and_number(array $array, int $number): string {
      $before_after = [0,0];
      foreach($array as $element) {
        if($element < $number) $before_after[0]++;
        else $before_after[1]++;
      }

      return <<<EOT
        Numbers Smaller Than ($number) = $before_after[0]
        Numbers Greater Than ($number) = $before_after[1]
      EOT;
     }
    echo array_and_number([1, 10, 5, 2, 11], 3);


    echo "<br/>";
    /**
     * 5- Create a function that takes an array of names and returns an array where only the first letter of each name is capitalized
     */

     function capitalizeName(&$input) {
      if(is_string($input)) {
        $string = &$input;
        $ascii = ord($string);
        
        if($ascii >= 97 && $ascii <= 122):
          $string[0] = chr($ascii - 32);
          // echo $string[0];
        endif; 

      }else if(is_array($input)) {

        $array = &$input;
        $slice = fn($element) => implode(array_slice(str_split($element), 1));
        $array = array_map(fn($element) => ($element[0] = chr(ord($element) - 32)).$slice($element), $array);
      
      }
     }
     
     $name = "murad pik";
     capitalizeName($name);
     echo $name;
     echo "<br/>";

     $names = ["karim", "muhammad", "abd-eltawab", 'hassan'];
     capitalizeName($names);
     array_log($names);

     /**
      * 6. Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements. Note that you must do this in-place without making a copy of the array
      */
      $array = [9, 19, 0, 10, 0, 0];
      function zerosAtEnd(&$array) {
        usort($array, fn($a, $b) => $b - $a);
      }
      zerosAtEnd($array);
      array_log($array);
      

      /**
       * 7- Write a function that searches an array of names (unsorted) for the name "Bob" and returns the location in the array. If Bob is not in the array, return -1.
       */

       $names = ["John", "Doe", "Bob", "Sarah", "Jack Lambor"];
       function search($array, $target) {
        $result = array_search($target, $array);
        if($result) echo $result;
        else echo -1;
       }
       search($names, "Bob");
       
       echo "<br/>";
       /**
        * 8. Create a function that takes a array of numbers and returns the second largest number.
        */

        function secondLargest($array) {
          $maxes = [PHP_INT_MIN,$array[0]]; // [Max1, Max2]
          foreach($array as $value) {
            if($value > $maxes[0]) {
              $maxes[1] = $maxes[0];
              $maxes[0] = $value;
            }else if ($value > $maxes[1]) {
              $maxes[1] = $value;
            }
          }

          echo "Second Largest Element in Array = $maxes[1]";
        }

        $array = [199, 91, 181, 299, 199, 1,99,100];
        secondLargest($array);

       echo "<br/><br/><br/><br/>";
      /**
       * 9- A program containing an array of different numbers and store a number $x If the number is not in the array prints not found and if it exists prints found and prints this number characteristics like
       */

       function isPrime($number) {
        for($i = 2; $i < $number; $i++) {
          if($number % $i === 0) {
            return false;
          }
        }

        return true;
       }

       function numOfDigits($number) {
        if(!$number)
          return 0;

        return 1 + numOfDigits((int)($number/10)); // (191) -> 1 + (19) + 1 (1) + 1 (0) 
       }

       function isPalindrome($number) {
        $string = (string)$number;
        $length = strlen($string);

        for($i = 0; $i < $length; $i++) {
          $last = $length - (1 + $i);
          if($string[$i] != $string[$last]) return false;
        }

        return true;
       }

       function is_exist($array, $target) {
        if(in_array($target, $array)) {
          echo "Found <br/>";
          echo ($target >= 0 ? "Positive": "Negative")."<br/>";
          echo (isPrime($target)? "Prime": "Not Prime")."<br/>";
          echo "Number of Digits = ".numOfDigits($target)."<br/>";
          echo ($target % 2 === 0 ? "Even": "Odd")."<br/>";
          echo (isPalindrome($target)? "Palindrome": "Not Palindrome")."<br/>";
        }else echo "Not Found!";
       }

       $array = [19, 91, 1829, 1881, 191, 0, 1, 2, 3];
       is_exist($array, 191);

       /**
        * 10 - 
        */