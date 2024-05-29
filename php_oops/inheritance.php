<?php
declare(strict_types=1);
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
 public function setNumber(float $a)
 {

 }


 public function setNumber2(float $a, float $b)
 {
  $this->Num1 = $a;
  $this->Num2 = $b;
 }

 private function SUM()
 {
  $this->sum = $this->Num1 + $this->Num2;

  return $this->sum;
 }
 public function calculate()
 {

  if ($this->SUM() == 50) {
   return "there SUM IS  EQUAL TO 50";
  } else if (($this->Num1 == 50) || ($this->Num2 == 50)) {
   return "either one of the number is equal to 50";
  }

 }



}




$obj= new checkTwoNumber;

$obj->setNumber2(50,25);
echo $obj->calculate();

















abstract class person
{

 public $abc;

 abstract public function name();
 abstract public function age();
}

// interface 

interface person2
{
 public function name();
 public function age();

}

interface person3
{
 public function name2();
 public function age3();

}

class boy implements person2
{



 public function name()
 {


 }


 public function age()
 {
 }
}

class girl extends person
{
 public function name()
 {

 }
 public function age()
 {
 }
}




class car
{

 private $name;
 private $age;



 public function SetName(string $a)
 {
  $this->name = $a;
 }

 public function GetName(): string
 {
  return $this->name;
 }

}

// single inheritance
// base or derived 
class B extends car
{

}

$obj = new B;

$obj->SetName("BMW");

echo $obj->GetName();
echo "<br><hr>";
// =================================================

$obj2 = new car;
$obj2->SetName("BMW 2");

echo $obj2->GetName();
echo "<br><hr>";
// =================================================

