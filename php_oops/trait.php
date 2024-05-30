<?php
declare(strict_types=1);
require_once "trait/allfunction.php";
// oops 

// ================object oreinted programming===============
/**
 * 1. encapsulation
 * 2. inheritance
 * 3. abstraction 
 * 4. polymorphism

* overriding 
* overloading

* 1.	Check two given numbers and return true if one of the numbers is 50 or if their sum is 50.
* 2.	Check from the given integer, whether it is positive or negative.
* 3.	Check whether a given number is even or odd.
* 4.	Check whether a given positive number is a multiple of 3.
* 5.	Determine whether a given year is a leap year.

* Reasearch work
* traits
* constructor and destructor 
* namespace

*/




interface givenNumber
{
 public function setNumber(float $a);
 public function setNumber2(float $a, float $b);
 public function calculate();
}


class checkTwoNumber implements givenNumber
{
 private $Num1;
 private $Num2;
 private $sum;


 public static function abc()
 {
  echo "static function abc called <br>";
 }

 use Allfunction, A, C {

  A::display insteadof C;
  C::display as display2;
 }


}



checkTwoNumber::abc();


$obj = new checkTwoNumber;


$obj->display();
echo "<br>";
$obj->display2();




