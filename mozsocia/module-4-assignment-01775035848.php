<?php

echo "\n------------- 1 no answer (sortArrayByLength) --------------------\n";

// 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)

function sortArrayByLength($arr)
{
    usort($arr, function ($a, $b) {
        if (strlen($a) == strlen($b)) {
            return 0;
        }
        return strlen($a) > strlen($b) ? 1 : -1;

    });
    return $arr;
}

$myArray = array("pear", "apple", "banana", "cherry", "orange", "elderberry");
$sortedArray = sortArrayByLength($myArray);
print_r($sortedArray);

echo "\n------------- 2 no answer (concatenate_two_string)--------------------\n";

// 2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.

function concatenate_two_string($string1, $string2)
{
    $len1 = strlen($string1);
    $len2 = strlen($string2);
    $result = '';

    for ($i = 0; $i < $len1; $i++) {
        $result .= $string1[$i];
    }

    for ($i = 0; $i < $len2; $i++) {
        $result .= $string2[$i];
    }

    return $result;
}

$string1 = 'hello';
$string2 = 'world';
$result = concatenate_two_string($string1, $string2);
echo $result;

echo "\n------------- 3 no answer (remove_first_and_last from array)--------------------\n";

// 3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.

function remove_first_and_last($arr)
{
    $length = count($arr);
    $new_arr = array();

    for ($i = 1; $i < $length - 1; $i++) {
        $new_arr[$i - 1] = $arr[$i];
    }

    return $new_arr;
}

$my_array = array(67, 27, 34, 74, 85, 65);
$new_array = remove_first_and_last($my_array);
print_r($new_array);

echo "\n------------- 4 no answer (contains_only_letters_and_whitespace)--------------------\n";

// 4.Write a PHP function to check if a string contains only letters and whitespace.
function contains_only_letters_and_whitespace($str)
{
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        if (!ctype_alpha($char) && !ctype_space($char)) {
            return false;
        }
    }

    return true;
}

$str1 = "Hello World";
$str2 = "Hello123World";
$str3 = "Hello_World";

echo contains_only_letters_and_whitespace($str1) ? "only contains letters and whitespace\n" : "extra character found \n";

echo contains_only_letters_and_whitespace($str2) ? "only contains letters and whitespace\n" : "extra character found \n";

echo contains_only_letters_and_whitespace($str3) ? "only contains letters and whitespace\n" : "extra character found \n";

echo "\n------------- 5 no answer (find Second Largest )--------------------\n";

// 5.Write a PHP function to find the second largest number in an array of numbers.

function findSecondLargest($arr)
{

    $largest = $arr[0];
    $secondLargest = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $largest) {
            $secondLargest = $largest;
            $largest = $arr[$i];
        } elseif ($arr[$i] > $secondLargest && $arr[$i] != $largest) {
            $secondLargest = $arr[$i];
        }
    }

    return $secondLargest;
}

$numbers = array(5, 2, 9, 8, 7, 3, 1, 6, 4);
$secondLargest = findSecondLargest($numbers);
echo "The second largest number is: " . $secondLargest;


