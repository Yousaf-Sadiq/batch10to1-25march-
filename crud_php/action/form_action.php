<?php

require_once dirname(__DIR__) . "/layout/user/header.php";

// echo HOME;
?>

<!-- 
 1. $_POST
 2. $_GET
 3. $_FILES
 4. $_SERVER
 5. $_REQUEST
 -->

<?php


if (isset($_POST["insert"]) && !empty($_POST["insert"])) {

 $email = filter_data($_POST["email"]);
 $pswd = filter_data($_POST["pswd"]);

 // error checking variable
 $status = [
  "error" => 0,
  "msg" => []
 ];


 // ===========================validation============================================
 if (!isset($email) || empty($email)) {

  $status["error"]++;
  array_push($status["msg"], "Email is required");

 } else {

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $status["error"]++;
   array_push($status["msg"], "Email FORMAT INVALID");

  }

 }


 if (!isset($pswd) || empty($pswd)) {
  $status["error"]++;
  array_push($status["msg"], "Password is required");

 }



 // ===========================check email====================


 $check_email = "SELECT * FROM `users` WHERE `email`='{$email}'";

 $exe_email = $conn->query($check_email);


 if ($exe_email->num_rows > 0) {

  $status["error"]++;

  array_push($status["msg"], "EMAIL ALREADY EXISTED");
 }

 // $exe_email= mysqli_query($conn,$check_email) ;
 // ===============================================================



 if ($status["error"] > 0) {

  foreach ($status["msg"] as $value) {
   ERROR_MSG($value);
  }

  refresh_url(2, HOME);
  // redirect_url(HOME);
 } else {


  $hash = password_hash($pswd, PASSWORD_BCRYPT);


  $encrpyt = base64_encode($pswd);


  $insert = "INSERT INTO `users`( `email`, `password`, `ptoken`) 
  VALUES ('{$email}','{$hash}','{$encrpyt}')";

  $exe_insert = $conn->query($insert);

  if ($exe_insert) {

   if ($conn->affected_rows > 0) {
    Success_msg("DATA HAS BEEN INSERTED");
   } else {
    ERROR_MSG("DATA HAS NOT BEEN INSERTED {$insert}");
   }
  } else {
   ERROR_MSG("EXECUTION ERROR {$insert}");
  }


  refresh_url(2, HOME);
 }

}



?>


<?php

require_once dirname(__DIR__) . "/layout/user/footer.php";

// echo HOME;
?>