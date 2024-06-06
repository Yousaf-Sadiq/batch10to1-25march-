<?php

require_once dirname(__DIR__) . "/app/database.php";

use App\database\DB as DB;
use App\database\helper as help;

$db = new DB;
$help = new help;

if (isset($_POST["insert"]) && !empty($_POST["insert"])) {

 $email = $help->filter_data($_POST["email"]);
 $password = $help->filter_data($_POST["pswd"]);


 $status = [
  "error" => 0,
  "msg" => []
 ];


 if (!isset($email) || empty($email)) {

  $status["error"]++;
  array_push($status["msg"], "Email is required");

 } else {

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $status["error"]++;
   array_push($status["msg"], "Email FORMAT INVALID");

  }

 }





 if (!isset($password) || empty($password)) {
  $status["error"]++;
  array_push($status["msg"], "Password is required");

 }


 $c_email = "SELECT * FROM `users` WHERE `email`='{$email}'";
 $check = $db->sql($c_email, true);

 if ($check) {
  $status["error"]++;
  array_push($status["msg"], "Email ALREADY EXIST");
 }


 if ($status["error"] > 0) {

  echo json_encode($status);
 } else {


  $data = [
   "email" => $email,
   "password" => password_hash($password, PASSWORD_BCRYPT),
   "ptoken" => base64_encode($password)
  ];


  echo $db->insert("users", $data);


 }

}
?>