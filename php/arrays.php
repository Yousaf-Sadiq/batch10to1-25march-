<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">

<head>
 <title>Title</title>
 <!-- Required meta tags -->
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

 <!-- Bootstrap CSS v5.2.1 -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body data-bs-theme="dark" class="p-5">



 <?php

 function print_array(array $t)
 {
  echo "<pre>";
  print_r($t);
  echo "</pre>";

 }


 $a = [1, 321, "dsada", [45, 432, 432, 432, 22, 213, 65654, 888]];

 //  loops => start ; end ; increament/decreament
 // $array_length = count($a);
 
 // for ($i = 0; $i < $array_length; $i++) {
 // foreach ($a as $t => $value) {
 
 //  if (is_array($value)) {
 //   print_array($value);
 //  } else {
 //   echo $t . "_" . $value . "&ensp;";
 //  }
 
 // }
 

 /**


 *
 **
 ***
 ****
 *****
 ******
 *******

 *******
 ******
 *****
 ****
 ***
 **
 *

  */


 // for ($row = 7; $row >= 1; $row--) {
 
 //  for ($col = 1; $col <= $row; $col++) {
 
 //   echo "*";
 
 //  }
 
 //  echo "<br>";
 
 // }
 

 // 7
 

// Print numbers from 1 to 100, but for multiples of 
// 3 print "Fizz", for multiples of 5,
 // print "Buzz" and for numbers that are multiples 
 // of both 3 and 5 print "FizzBuzz".
// 

// Find the largest number in an array by using a loop.
// Write a function that checks if a word is a palindrome (reads the same forwards and backward).
// Write a function to calculate the factorial of a given number.
// Write a function that determines whether a given number is prime or not.
// Print numbers from 1 to 100, but for multiples of 3 print "Fizz", for multiples of 5, print "Buzz" and for numbers that are multiples of both 3 and 5 print "FizzBuzz".


// Find the same numbers from the following multidimensional array
$multiArr = [
    [
        [12, 32, 13, 34],
        [13, 12, 23, 41],
        [15, 23, 34, 45],
    ],
    [
        [122, 32, 133, 314],
        [123, 132, 23, 141],
        [155, 23, 334, 465],
    ],
    [
        [12, 342, 135, 234],
        [713, 712, 423, 431],
        [15, 23, 34, 45],
    ],
    [
        [12, 372, 913, 334],
        [13, 162, 243, 341],
        [175, 423, 34, 435],
    ],
];



 // 1 x 2 x 3 x 4 x 5 
 $t = [1, 321, "dsada", [45, 432, 432, 432, 22, 213, 65654, 888]];


 foreach ($a as $key => $value) {

  if (is_array($value)) {
   echo "<hr>";
   foreach ($value as $childKey => $subArray) {
    echo $childKey . "=> " . $subArray." &ensp;<br>";
   }





  } else {
   echo $key . "=>" . $value . "&ensp;<br>";
  }
 }

 ?>






 <!-- Bootstrap JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>