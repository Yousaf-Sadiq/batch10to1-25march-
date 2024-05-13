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





 // ===============================================================



 if ($status["error"] > 0) {

  foreach ($status["msg"] as $value) {
   ERROR_MSG($value);
  }

  refresh_url(2, HOME);
 }
 else{

  
 }

}



?>


<?php

require_once dirname(__DIR__) . "/layout/user/footer.php";

// echo HOME;
?>