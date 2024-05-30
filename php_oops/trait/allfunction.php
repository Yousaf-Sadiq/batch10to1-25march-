<?php 


trait Allfunction{
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





trait A{
 public function display(){
  echo "from Trait A";
 }
}

trait C{
 public function display(){
  echo "from Trait C";
 }
}

?>