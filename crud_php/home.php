<?php

require_once dirname(__FILE__) . "/layout/user/header.php";

// echo HOME;
?>
<h1> HOME</h1>

<form enctype="multipart/form-data" action="<?php echo insert ?>" class=" p-5 m-5 rounded" style="background-color: black;" method="post">

 <div class="mb-3">
  <label for="" class="form-label">Choose file</label>
  <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
  <div id="fileHelpId" class="form-text">Help text</div>
 </div>

 <input type="submit" name="fileUpload" value="UPLOAD">
</form>


<form class=" p-5 m-5 rounded" style="background-color: black;" action="<?php echo insert ?>" method="POST">
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

 <input type="submit" name="insert" value="SUBMIT" class="btn btn-primary">


</form>





<div class="table-responsive">
 <?php

 $allData = "SELECT * FROM `users`";

 $exe_allData = $conn->query($allData);

 if ($exe_allData->num_rows > 0) {



  ?>
  <table class="table table-dark table-bordered table-hover">
   <thead>
    <tr>
     <th>#</th>
     <th>User Name</th>
     <th>EMAIL</th>
     <th>ACTION</th>
    </tr>
   </thead>


   <tbody>
    <?php

    while ($row = $exe_allData->fetch_assoc()) {


     ?>

     <tr>
      <td><?php echo $row["user_id"] ?></td>
      <td><?php echo $row["user_name"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td>
       <div class="card">
        <div class="card-body d-flex justify-content-center">
         <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <a href="<?php echo UPDATE; ?>?id=<?php echo $row["user_id"] ?>" class="btn btn-info">EDIT</a>

          <button type="button" class="btn btn-danger">DELETE</button>


         </div>
        </div>
       </div>



      </td>
     </tr>

    <?php } ?>
   </tbody>

  </table>
  <?php

 } else {
  ?>

  <h1> DATA NOT FOUND</h1>

 <?php } ?>
</div>




<?php

require_once dirname(__FILE__) . "/layout/user/footer.php";
?>