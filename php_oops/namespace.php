<?php
require "file1.php";
require "file2.php";


use file1\test\A as file1;
use file2\test\A as file2;

$obj2= new file2;
$obj1= new file1;
?>