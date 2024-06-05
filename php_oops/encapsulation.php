<?php
declare(strict_types=1);

namespace encapsulation;

require_once "trait/encapsulation.php";
// oops 

// ================object oreinted programming===============
/**
 * 1. encapsulation
 * 2. inheritance
 * 3. abstraction
 * 4. polymorphism
 
 
 
 */

// 1.	Find the area of a rectangle where the length is 5 and the width is 8.
// 2.	Find the area of a triangle where the base is 4 and the height is 3.
// 3.	Find the area of a circle where the radius is 3.
// 4.	Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.


class AreaOfRectangle
{
 private $length;
 private $width;
 private $area;
  









 

use \rectangle;


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


$obj = new car;

$obj->SetName("BMW");

echo $obj->GetName();
echo "<br><hr>";
// =================================================

$obj2 = new car;
$obj2->SetName("BMW 2");

echo $obj2->GetName();
echo "<br><hr>";
// =================================================

$abc= new AreaOfRectangle;

$abc->Setlength(8);
$abc->SetWidth(5);

echo $abc->calculate();
?>