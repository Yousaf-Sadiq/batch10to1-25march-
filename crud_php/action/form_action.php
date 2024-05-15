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

if (isset($_POST["update"]) && !empty($_POST["update"])) {

 $email = filter_data($_POST["email"]);
 $user_name = filter_data($_POST["user_name"]);
 $pswd = filter_data($_POST["pswd"]);

 $user_id = filter_data(base64_decode($_POST["_token"]));

 // if record exist or not 

 $status = [
  "error" => 0,
  "msg" => []
 ];

 // =============================validation start=========================
 $allData = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";

 $exe_allData = $conn->query($allData);

 if ($exe_allData->num_rows > 0) {

  $row = $exe_allData->fetch_assoc();




  // ===========================check email====================


  $check_email = "SELECT * FROM `users` WHERE `email`='{$email}' AND user_id <> $user_id ";

  $exe_email = $conn->query($check_email);


  if ($exe_email->num_rows > 0) {

   $status["error"]++;

   array_push($status["msg"], "EMAIL ALREADY EXISTED");
  }




  // =============================================


 } else {


  $status["error"]++;


  array_push($status["msg"], "RECORD NOT FOUND");

 }







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

 if (!isset($user_name) || empty($user_name)) {
  $status["error"]++;
  array_push($status["msg"], "USER NAME is required");

 }




 // ======================validation END=========================================

 if ($status["error"] > 0) {

  foreach ($status["msg"] as $value) {
   ERROR_MSG($value);
  }

  refresh_url(2, UPDATE . "?id={$user_id}");
  // redirect_url(HOME);
 } else {

  $hash = password_hash($pswd, PASSWORD_BCRYPT);


  $encrpyt = base64_encode($pswd);


  $update = "UPDATE `users` SET `user_name`='{$user_name}', 
  `password`='{$hash}', `ptoken`='{$encrpyt}' WHERE `user_id`='{$user_id}' ";

  $exe_update = $conn->query($update);

  if ($exe_update) {

   if ($conn->affected_rows > 0) {
    Success_msg("DATA HAS BEEN UPDATED");
   } else {
    ERROR_MSG("DATA HAS NOT BEEN UPDATED {$update}");
   }
  } else {
   ERROR_MSG("EXECUTION ERROR {$update}");
  }


  refresh_url(2, HOME);


 }


}

// ============================insert work========================================

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


 $check_email = "SELECT * FROM `users` WHERE `email`='{$email}'  ";

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