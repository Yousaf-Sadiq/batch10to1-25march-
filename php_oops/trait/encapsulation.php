<?php 


trait rectangle{
 
 public function Setlength(float $l)
 {
  $this->length = $l;
 }

 public function SetWidth(float $w)
 {
  $this->width = $w;
 }


 public function calculate(): float|int
 {
  $this->area = $this->length * $this->width;

  return $this->area;
 }

}
?>