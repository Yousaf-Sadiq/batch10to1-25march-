<?php 


trait Insert{
 
 public function insert(string $table, array $data)
 {

  if ($this->checkTable($table)) {

  

  }else{
   // error display if table is not existed 
  }

 }

}
?>