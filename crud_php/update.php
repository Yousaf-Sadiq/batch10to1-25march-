<?php

require_once dirname(__FILE__) . "/layout/user/header.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
  $user_id = $_GET["id"];

  $allData = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";

  $exe_allData = $conn->query($allData);

  if ($exe_allData->num_rows > 0) {

    $row = $exe_allData->fetch_assoc();



  } else {

    redirect_url(HOME);
  }

} else {
  redirect_url(HOME);
}


// echo HOME;
?>



<form enctype="multipart/form-data" class=" p-5 m-5 rounded" style="background-color: black;" action="<?php echo update_submit ?>" method="POST">

  <input type="hidden" name="_token" value="<?php echo base64_encode($user_id) ?>">
  <div class="mb-3">
    <label for="" class="form-label">Profile</label>
    <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
    <div id="fileHelpId" class="form-text">Help text</div>
  </div>

  <!-- user_name -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">USER NAME</label>
    <input type="text" value="<?php echo $row["user_name"] ?>" name="user_name" class="form-control"
      id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <!-- email -->
  <input type="hidden" readonly value="<?php echo $row["email"] ?>" name="email" class="form-control"
    id="exampleInputEmail1" aria-describedby="emailHelp">

  <!-- <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input type="hidden" readonly  disabled value="<?php echo $row["email"] ?>" name="email" class="form-control" id="exampleInputEmail1"
   aria-describedby="emailHelp">
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
 </div> -->
  <!-- password  -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" value="<?php echo base64_decode($row["ptoken"]) ?>" name="pswd" class="form-control"
      id="exampleInputPassword1">
  </div>
  <!-- check box -->
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <input type="submit" name="update" value="SUBMIT" class="btn btn-primary">
  <!-- http://localhost/25marchbatch/crud_php/update.php?id=2 -->

</form>







<?php

require_once dirname(__FILE__) . "/layout/user/footer.php";
?>