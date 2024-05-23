<?php

require_once dirname(__FILE__) . "/layout/user/header.php";

if (isset($_SESSION["Email"]) && !empty($_SESSION["Email"])) {

 redirect_url(HOME);
} else {
 
}

?>
<h1> LOGIN</h1>
<!-- testing upload form -->
<!-- <form enctype="multipart/form-data" action="<?php echo insert ?>" class=" p-5 m-5 rounded" style="background-color: black;" method="post">

 <div class="mb-3">
  <label for="" class="form-label">Choose file</label>
  <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
  <div id="fileHelpId" class="form-text">Help text</div>
 </div>

 <input type="submit" name="fileUpload" value="UPLOAD">
</form> -->


<form class=" p-5 m-5 rounded" style="background-color: black;" action="<?php echo insert ?>" method="POST">
  <!--email   -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <!-- password -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
  </div>

  <!-- check box -->
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <input type="submit" name="login" value="LOGIN" class="btn btn-primary">


</form>






<?php

require_once dirname(__FILE__) . "/layout/user/footer.php";
?>

</script>