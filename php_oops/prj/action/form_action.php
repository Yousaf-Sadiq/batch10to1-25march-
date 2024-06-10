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


if (isset($_POST["EDIT"]) && !empty($_POST["EDIT"])) {


 $email = $help->filter_data($_POST["email"]);
 $password = $help->filter_data($_POST["pswd"]);
 $user_name = $help->filter_data($_POST["user_name"]);
 $user_id = $help->filter_data($_POST["_token"]);


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

 if (!isset($user_name) || empty($user_name)) {
  $status["error"]++;
  array_push($status["msg"], "USER NAME is required");

 }

 $c_email = "SELECT * FROM `users` WHERE `email`='{$email}' AND `user_id` <> {$user_id} ";
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
   "user_name" => $user_name,
   "password" => password_hash($password, PASSWORD_BCRYPT),
   "ptoken" => base64_encode($password)
  ];

  echo $db->update("users", $data, "`user_id`='{$user_id}'");

 }
}
?>