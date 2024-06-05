<?php
require_once dirname(__FILE__) . "/layout/user/header.php";
use App\database\DB as DB;


$obj = new DB;

// $abc=[
//  "email"=>"email@email.com",
//  "user_name"=>"XYZ",
//  "password"=>1234,
//  "ptoken"=>1234
// ];

// // $obj->insert("users","(`email`,`password`,`ptoken`)","('email@email.com',1234,1234)");
// echo $obj->insert("users",$abc);
// echo dirname(__FILE__);
// echo form_action;
?>


<form class="m-5 p-5 text-bg-dark"  id="Myform" method="POST">
 <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
 </div>
 <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
 </div>
 <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
 </div>
 <input type="hidden" name="insert" value="insert">

 <input type="submit"  value="SUBMIT" class="btn btn-primary">
</form>

<?php
require_once dirname(__FILE__) . "/layout/user/footer.php";

// echo dirname(__FILE__);
?>

<script>

 let form =document.querySelector("#Myform");

 form.addEventListener("submit",async function(a){
  a.preventDefault();

  let url = "<?php echo form_action ?>";

  let formData = new FormData(form);
  
  const option={
   method:"POST",
   body:formData
  }

  let data =await fetch(url,option);

  let response = await data.json();

  console.log(response)

 })

</script>