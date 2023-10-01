<?php


/**
 * Problem 1: Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position
 */

function problem1($end)
{
    for ($i = 1; $i <= $end; $i++) {
        if ($i !== 1) {
            echo "-";
        }

        echo $i;
    }
}

// problem1(10);


/**
 * Problem 2: Write a PHP program which iterates the integers from 1 to 50. For multiples of three print "Fizz" instead of the number and for the multiples of five print "Buzz". For numbers which are multiples of both three and five print "FizzBuzz"
 */

function problem2($from, $end)
{
    for ($i = $from; $i <= $end; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            echo "FuzzBuzz";
        } elseif ($i % 3 === 0) {
            echo "Fuzz";
        } elseif ($i % 5 === 0) {
            echo "Buzz";
        } else {
            echo $i;
        }

        echo "<br/>";
    }
}

// problem2(1, 50);

/**
 * Problem 3: Create a script using a for loop to add all the integers between 0 and 30 and display the total
 */

function problem3($from, $end)
{
    $result = 0; // Identity Element - محايد جمعي
    $count = $from;

    while ($count <= $end) {
        $result += $count;
        $count++;
    }

    return "The Sum of the numbers $from to $end is $result";
}

// echo problem3(1, 10);

/**
 * Problem 4: Write a program to calculate and print the factorial of a number using a for loop. The factorial of a number is the product of all integers up to and including that number
 * Example : the factorial of 4 is 4*3*2*1= 24
 */

function problem4($end)
{
    $result = 1; // multiplicative identity - محايد ضربي
    for ($i = $end; $i >= 1; $i--) {
        $result *= $i;
    }

    return $result;
}

// using recursion

function problem4_recursion($end)
{
    if ($end === 1) {
        return 1;
    }

    return $end * problem4_recursion($end - 1);
}

// echo problem4(5); // more efficient
// echo problem4_recursion(5);


/**
 * Problem 5 & 6: Write a PHP program that prints the odd/even numbers from 1 to 15 using a while loop.
 */

function problem5($from, $end)
{
    while ($from <= $end) {
        if ($from % 2 === 1):
            echo "ODD";
        else:
            echo "EVEN";
        endif;
        echo "\n<br/>\n";
        $from++;
    }
}

// problem5(1, 15);


/**
 * Problem 7: Write a PHP program that prints all the numbers between 1 and 100 that are divisible by 3 using a do while loop.
 */

function problem7($from, $end, $divisible)
{
    while ($from <= $end) {
        if ($from % $divisible === 0)
            echo $from;

        echo "\n<br/>\n";
        $from++;
    }
}

// problem7(1, 100, 3);


/**
 * Problem 8: Make a calculator with these operations using if and else if
 */

function problem8($number1, $number2, $operator)
{
    if ($operator === '+') {
        return $number1 + $number2;
    } // we can use 'if' insteadof 'else if' since we return in function
    else if ($operator === '-') {
        return $number1 - $number2;
    } else if ($operator === '*') {
        return $number1 * $number2;
    } else if ($operator === '/') {
        return $number1 / $number2;
    } else if ($operator === '**') {
        return $number1 ** $number2;
    } else if ($operator === '%') {
        return $number1 % $number2;
    } else {
        return "Invalid Operator!";
    }
}

function problem8_match($number1, $number2, $operator)
{
    return match ($operator) {
        "+" => $number1 + $number2,
        "-" => $number1 - $number2,
        "*" => $number1 * $number2,
        "/" => $number1 / $number2,
        "**" => $number1 ** $number2,
        "%" => $number1 % $number2,
    };
}

echo problem8(5, 5, '+');
echo "\n";

echo problem8(5, 5, '-');
echo "\n";

echo problem8(5, 5, '*');
echo "\n";

echo problem8(5, 5, '/');
echo "\n";

echo problem8(5, 3, '**');
echo "\n";

echo problem8(5, 5, '%');
echo "\n";
