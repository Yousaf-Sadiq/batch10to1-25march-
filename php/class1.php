<?php 
declare(strict_types=1);
?>
<!-- https://www.apachefriends.org/index.html -->

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

<body>


 <?php

//  && || ! 


 function SUM(int|float $a, int|float $b): int|float
 {

  $z = $a + $b;

  return $z;
 }



 ?>
<!--
1. Check two given numbers and return true if one of the numbers is 50 or if their sum is 50.
2. Check from the given integer, whether it is positive or negative.
3. Check whether a given number is even or odd.
4. Check whether a given positive number is a multiple of 3.
5. Determine whether a given year is a leap year.
6. Find the area of a rectangle where the length is 5 and the width is 8.
7.  Find the area of a triangle where the base is 4 and the height is 3.
8. Find the area of a circle where the radius is 3.
9. Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.

-->


<h1> TOTAL SUM : <?php echo SUM(1,4) ?></h1>

 <!-- Bootstrap JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>