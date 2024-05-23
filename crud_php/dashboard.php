<?php

require_once dirname(__FILE__) . "/layout/user/header.php";


if (isset($_SESSION["Email"]) && !empty($_SESSION["Email"])) {

  $user_id = $_SESSION["user_id"];
} else {
  redirect_url(LOGIN);
}

?>
<h1> DASHBOARD</h1>
<!-- testing upload form -->
<!-- <form enctype="multipart/form-data" action="<?php echo insert ?>" class=" p-5 m-5 rounded" style="background-color: black;" method="post">

 <div class="mb-3">
  <label for="" class="form-label">Choose file</label>
  <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" />
  <div id="fileHelpId" class="form-text">Help text</div>
 </div>

 <input type="submit" name="fileUpload" value="UPLOAD">
</form> -->




<div class="table-responsive">
  <?php

  $allData = "SELECT * FROM `users`  WHERE `user_id`='{$user_id}'";

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
        //  user fetching data
        while ($row = $exe_allData->fetch_assoc()) {
          // address fetching data
          $address_fetch2 = "SELECT * FROM `user_address` WHERE `user_id` = '" . $row["user_id"] . "'";
          $address_exe_2 = $conn->query($address_fetch2);
          // check if address exist or not
          if ($address_exe_2->num_rows > 0) {


            $fetch_address_all = $address_exe_2->fetch_assoc();

          } else {
            // if not then create dummy data as same as database data
            $fetch_address_all = [
              "image" => json_encode(
                [
                  "absolute_path" => server1 . "/asset/images/default.jpg"
                ]
              )
            ];

          }
          ?>

          <tr>
            <td><?php echo $row["user_id"] ?></td>
            <td class="w-25">
              <?php

              $absolutePath = json_decode($fetch_address_all["image"], true);


              ?>
              <img src="<?php echo $absolutePath["absolute_path"]; ?>" class=" img-thumbnail" alt="" srcset="">
            </td>
            <td><?php echo $row["user_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td>
              <div class="card">
                <div class="card-body d-flex justify-content-center">
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="<?php echo UPDATE; ?>?id=<?php echo $row["user_id"] ?>" class="btn btn-info">EDIT</a>


                    <button type="button" onclick="onDelete('<?php echo base64_encode($row["user_id"]) ?>')"
                      class="btn btn-danger">DELETE</button>


                  </div>
                </div>
              </div>



            </td>
          </tr>

        <?php } ?>
      </tbody>

    </table>


    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Launch static backdrop modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE DATA PERMANENTLY</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h1>ARE YOUR SURE <span style="color:red;">!</span></h1>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>


            <form action="<?php echo DELETE; ?>" method="post">
              <input type="hidden" name="_token" id="_token">

              <input type="submit" name="delete" value="DELETE" class="btn btn-primary">

            </form>


          </div>
        </div>
      </div>
    </div>

    <?php

  } else {
    ?>

    <h1> DATA NOT FOUND</h1>

  <?php } ?>
</div>




<?php

require_once dirname(__FILE__) . "/layout/user/footer.php";
?>

<script>
  function onDelete(id) {
    let user_id = id;

    let input = document.querySelector("#_token")

    input.value = user_id;


    let myModal = document.querySelector("#staticBackdrop");

    const Modal = new bootstrap.Modal(myModal); // bootstrap modal object 

    Modal.show(myModal)
  }


</script>