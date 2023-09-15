<?php

  require_once "helpers/array_log.php";

/** ================== 1 ======================
 * Array of Chunks
 * array_chunk — Split an array into chunks with specified length
 * sometimes you want split your array into chunks of arrays
*/

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo "<br/> No Preserved Keys <br/>";
array_log(array_chunk($arr, 3)); // [[1,2,3], [4,5,6], [7,8,9]]
// Third Argument is preserve keys if false it will reindex the array with numeric keys
// array_log(array_chunk($arr, 3, false)); // [[1,2,3], [4,5,6], [7,8,9]]
// if true it will preserve the keys(keep them as they are)
echo "<br/> Preserved Keys <br/>";
 array_log(array_chunk($arr, 3, true)); // [[1,2,3], [4,5,6], [7,8,9]]


/** ================== 2 ======================
 * array_combine — Creates an array by using one array for keys and another for its values
 * sometimes you want to combine two arrays into one array
 */

echo "<br/> array_combine <br/>";
$keys = ['name', 'age', 'job']; // 'salary'
// if the two arrays have different length, it will Throw an Error current version of php
// Uncaught ValueError: array_combine(): Argument #1 ($keys) and argument #2 ($values) must have the same number of elements

$values = ['Karim', 30, 'Developer'];
array_log(array_combine($keys, $values)); // ['name' => 'Karim', 'age' => 30, 'job' => 'Developer']

/** ================== 3 ======================
 * array_filter — Filters elements of an array using a callback function
 * sometimes you want to filter your array based on some condition
 *
 * no-reindexing the array
 */

echo "<br/> array_filter <br/>";
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
array_log(array_filter($arr, fn($item) => $item % 2 === 0)); // [2, 4, 6, 8] even numbers
echo "<br/>";
array_log(array_filter($arr, fn($item) => $item % 2 !== 0)); // [1, 3, 5, 7, 9] odd numbers
echo "<br/>";

// more arguments in array_filter
// 1# array_filter($arr, fn($item) => $item % 2 === 0, ARRAY_FILTER_USE_KEY); // [1, 3, 5, 7, 9] odd numbers
// 2# array_filter($arr, fn($item) => $item % 2 === 0, ARRAY_FILTER_USE_BOTH); // [1, 3, 5, 7, 9] odd numbers
$result = array_filter($arr, fn($number) => $number % 2 === 0, ARRAY_FILTER_USE_KEY);
array_log($result); // $number is the key of the array
$result = array_filter($arr, fn($number) => $number % 2 === 0);
array_log($result); // $number is the value of the array

$result = array_filter($arr, fn($number, $key) => $number % 2 === 0, ARRAY_FILTER_USE_BOTH);
array_log($result); //

// TIP; if we didn't specify callback, it will filter falsy elements in array

/** ================== 4 ======================
 * array_values — Return all the values of an array
 * sometimes you want to get all values of array indexed numerically
 */

echo "<br/> array_values <br/>";
$arr = ['name' => 'Karim', 'age' => 30, 'job' => 'Developer'];
array_log(array_values($arr)); // ['Karim', 30, 'Developer']

/** ================== 5 ======================
 * array_keys — Return all the keys or a subset of the keys of an array
 * sometimes you want to get all keys of array indexed numerically
 */

echo "<br/> array_keys <br/>";
$arr = ['name' => 'Karim', 'sub-name' => 'Karim', 'age' => 30, 'age2' => '30', 'job' => 'Developer'];

array_log(array_keys($arr)); // ['name', 'age', 'job', 'sub-name']
array_log(array_keys($arr, 'Karim')); // ['name', 'sub-name'] // search for value in array and return keys of matched values
// this search on value use loose comparison
// if we want to search on value with strict comparison we can use third argument

array_log(array_keys($arr, '30', true)); // ['age2'] // search for value in array and return keys of matched values
array_log(array_keys($arr, '30', false)); // ['age', 'age2'] // search for value in array and return keys of matched values

/** ================== 6 ======================
 * array_map — Applies the callback to the elements of the given arrays
 * sometimes you want to apply callback function to each element in array
 * re-indexing the array
 */

// Simple Form
echo "<br/> array_map <br/>";
$arr = ['a' => 1, 'b' => 2,'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'k' => 9];
array_log(array_map(fn($item) => $item * 2, $arr)); // [2, 4, 6, 8, 10, 12, 14, 16, 18]

// More Complex Form (NEW to me)
$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
$arr2 = ['a' => 4, 'b' => 5, 'c' => 6];
array_log(array_map(fn($item1, $item2) => $item1 + $item2, $arr1, $arr2)); // [5, 7, 9]

// un-even length arrays
$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
$arr2 = ['a' => 4, 'b' => 5, 'c' => 6, 'd' => 7];
array_log(array_map(fn($item1, $item2) => $item1 * $item2, $arr1, $arr2)); // [4, 10, 18] // the last element in the longest array will be ignored
// in case we do addition operation, won't ignored, it will be 0
array_log(array_map(fn($item1, $item2) => $item1 + $item2, $arr1, $arr2)); // [5, 7, 9, 7] // the last element in the longest array will be ignored

// Null as a callback
$arr = ['a' => 1, 'b' => 2,'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'k' => 9];
array_log(array_map(null, $arr)); // [1, 2, 3, 4, 5, 6, 7, 8, 9] // return values of array


/** ================== 7 ======================
 * array_merge — Merge one or more arrays
 * sometimes you want to merge two arrays into one array
 * re-indexing the array
 */

echo "<br/> array_merge <br/>";
$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
$arr2 = ['d' => 4, 'e' => 5, 'f' => 6];
array_log(array_merge($arr1, $arr2)); // ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6]

// if we used + operator, it will keep the keys of the first array (deal with keys)
array_log($arr1 + $arr2); // ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6]

// if keys is similar won't append, if different will append(merge)

$arr3 = ['a' => 10, 'b' => 11, 'c' => 12];
array_log(array_merge($arr1, $arr3)); // ['a' => 10, 'b' => 11, 'c' => 12] // overwrite since have same keys


/**   ================== 8 ======================
 * array_reduce — Iteratively reduce the array to a single value using a callback function
 * sometimes you want to reduce your array into one value
 */

$invoiceItems = [
    ['name' => 'item1', 'price' => 10, 'quantity' => 2],
    ['name' => 'item2', 'price' => 20, 'quantity' => 3],
    ['name' => 'item3', 'price' => 30, 'quantity' => 4],
    ['name' => 'item4', 'price' => 40, 'quantity' => 5],
];

echo "<br/> array_reduce <br/>";
$total = array_reduce($invoiceItems, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
echo $total; // 300

/** ================== 9 ======================
 * array_search — Searches the array for a given value and returns the first corresponding key if successful
 * sometimes you want to search for value in array and return key of matched value
 */

echo "<br/> array_search <br/>";
$arr = ['name' => 'Karim', 'age' => 30, 'job' => 'Developer'];
echo array_search('Karim', $arr); // name
echo "<br/>";
$shuffled_numbers = [1,2,3,4,5,6,7,8,9,1,2,11,231,31,23,15];
$isFound = array_search(1, $shuffled_numbers, true); // 0 (strict comparison true)

// Careful! this will return 0, and 0 is falsy value too, but 0 this is position in array
// so we should use strict comparison ===
//if($isFound == false) {
if($isFound === false) {
    echo "Not Found";
} else {
    echo "Found";
}

/** ================== 10 ======================
 * in_array() — Checks if a value exists in an array (return true or false)
 */


echo "<br/> in_array <br/>";
$arr = ['name' => 'Karim', 'age' => 30, 'job' => 'Developer'];
echo in_array('Karim', $arr); // 1
echo "<br/>";

/** ================== 11 ======================
 * array_diff — Computes the difference of arrays
 * sometimes you want to get the difference between two arrays
 *
 * this function check values only, not keys
 */
$array1 = ['a'=> 1, 'b' => 2, 3, 4, 5];
$array2 = [3, 4, 5, 'a' => 6, 'b' => 7];
echo "<br/> array_diff <br/>";
array_log(array_diff($array1, $array2)); // [1, 2] // return values of array1 that not in array2
array_log(array_diff($array2, $array1)); // [6, 7] // return values of array2 that not in array1

/** ================== 12 ======================
 * array_diff_assoc — Computes the difference of arrays with additional index check
 * sometimes you want to get the difference between two arrays with additional index check
 */
echo "<br/> array_diff_assoc <br/>";
array_log(array_diff_assoc($array1, $array2)); // [1, 2] // return values of array1 that keys/value pair not in array2
array_log(array_diff_assoc($array2, $array1)); // [6, 7] // return values of array2 that keys/value pair not in array1

/** ================== 13 ======================
 * array_diff_key — Computes the difference of arrays using keys for comparison
 * sometimes you want to get the difference between two arrays using keys for comparison
 */
echo "<br/> array_diff_key <br/>";
array_log(array_diff_key($array1, $array2)); // empty array, because all keys in array1 are exist in array2
array_log(array_diff_key($array2, $array1)); // empty array, because all keys in array2 are exist in array1

echo "<br/>";

/** ================== 14 ======================
 * asort — Sort an array by Values and maintain index association
 * ksort — Sort an array by Keys
 * usort — Sort an array by values using a user-defined comparison function
 *
 * re-indexing the array
 */

$arr = ['a' => 5, 'b' => 2, 'c' => 1];
echo "<br/> asort <br/>";
asort($arr);
array_log($arr); // ['c' => 1, 'b' => 2, 'a' => 5] // sort by values and maintain index association

echo "<br/> ksort <br/>";
ksort($arr);
array_log($arr); // ['a' => 5, 'b' => 2, 'c' => 1] // sort by keys

echo "<br/> usort <br/>";
$arr = ['a' => 5, 'b' => 2, 'c' => 1];
usort($arr, fn($a, $b) => $a <=> $b); // if a > b return 1, if a < b return -1, if a == b return 0
array_log($arr); // ['c' => 1, 'b' => 2, 'a' => 5] // sort by values and maintain index association



// Destructuring
// sometimes you want to get specific values from array

echo "<br/> Destructuring <br/>";
$arr = ['a' => 5, 'b' => 2, 'c' => 1, 0];
$a = $arr['a'];
echo $a; // 5
echo "<br/>";

// Destructuring
['a' => $a, 'b' => $b, 'c' => $c] = $arr;
echo $a; // 5
echo "<br/>";


/*
// Destructuring with list
list($a, $b, $c) = $arr; // there is 0 key in array, so $b, $c there is no keys for them (Warning)
echo $a; // 5
echo "<br/>";
*/

// Destructuring with list and keys
list('a' => $a, 'b' => $b, 'c' => $c) = $arr;
echo $a; // 5
echo "<br/>";


/*
// Destructuring with list and keys and values
list('a' => $a, 'b' => $b, 'c' => $c) = array_values($arr);
echo $a; // undefiend, because array_values re-index the array, so there are not keys 'a', .. in array_values which its keys is numeric
echo "<br/>";
*/

// it is like Javascript
$arr = [5, [2, 1], 0];
[$a, [$b1, $b2], ] = $arr; // skip last element, capture nested array like this
