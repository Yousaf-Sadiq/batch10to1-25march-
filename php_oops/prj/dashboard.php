<?php
require_once dirname(__FILE__) . "/layout/user/header.php";
use App\database\DB as DB;
use App\database\helper as help;

$help = new help();
$obj = new DB;

$q = $obj->select("users", "*", null, "`user_id` DESC", "5");

$abc = [
  "email" => "email@email.com",
  "user_name" => "XYZ",
  "password" => 1234,
  "ptoken" => 1234
];
// $obj->update("users",$abc,"`user_id` = 3");

// // $obj->insert("users","(`email`,`password`,`ptoken`)","('email@email.com',1234,1234)");
// echo $obj->insert("users",$abc);
// echo dirname(__FILE__);
// echo form_action;
?>


<form class="m-5 p-5 text-bg-dark" id="Myform" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pswd" class="form-control" id="pswd">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="hidden" name="insert" value="insert">

  <input type="submit" value="SUBMIT" class="btn btn-primary">
</form>


<div class="table-responsive">
  <?php

  if ($q) {
    $abc = $obj->GetResult();

    // $help->pre($abc);
  
    ?>
    <table class="table table-striped table-hover table-borderless table-dark align-middle">
      <thead class="table-light">
        <caption>
          USER DATA
        </caption>
        <tr>
          <th>id</th>
          <th>USER NAME</th>
          <th>EMAIL</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        foreach ($abc as $key => $value) {
          # code...
      
          ?>
          <tr class="table-dark">
            <td scope="row"><?php echo $value["user_id"] ?></td>
            <td><?php echo $value["user_name"] ?></td>
            <td><?php echo $value["email"] ?></td>
            <td>
              <div class="card bg-dark text-white">
                <div class="card-body ">

                  <div class="d-flex flex-wrap gap-2  text-center">

                    <div>
                      <?php
                      $email_edit = $value["email"];
                      $userName_edit = $value["user_name"];
                      $pswd_edit = base64_decode($value["ptoken"]);
                      $id_edit = $value["user_id"];

                      ?>
                      <a href="javascript:void(0)"
                        onclick="OnEdit('<?php echo $email_edit ?>','<?php echo $userName_edit ?>','<?php echo $pswd_edit ?>','<?php echo $id_edit ?>' )"
                        class="badge h3 text-bg-info" style="font-size: 1.1rem;">
                        EDIT
                      </a>
                    </div>

                    <div>
                      <a href="#" class="badge h3 text-bg-danger" style="font-size: 1.1rem;">
                        DELETE
                      </a>
                    </div>



                  </div>


                </div>
              </div>

            </td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>

      </tfoot>
    </table>

    <?php

  } else {

  }
  ?>

  <!-- Modal -->
  <div class="modal  fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="edit_lable" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="edit_lable">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-dark text-bg-dark">

          <form action="#" id="form_edit" method="post">
            <input type="hidden" name="EDIT" value="EDIT">

            <input type="hidden" name="_token" id="_token">

            <div class="mb-3">
              <label for="" class="form-label">USer Name</label>
              <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="helpId"
                placeholder="ENTER USERNAME" />
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="Email" aria-describedby="helpId"
                placeholder="ENTER EMAIL" />
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" name="pswd" id="Pswd" aria-describedby="helpId"
                placeholder="ENTER PASSWORD" />

              <button id="show" type="button">
                <i class="fa-sharp fa-solid fa-eye" id="eye"></i>
              </button>

              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <button type="submit" class="btn btn-outline-primary">
              SUBMIT
            </button>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
require_once dirname(__FILE__) . "/layout/user/footer.php";

// echo dirname(__FILE__);
?>

<script>
  let Pswd = document.querySelector("#Pswd");
  let show = document.querySelector("#show");
  let eye = document.querySelector("#eye");

  show.addEventListener("click", function () {

    if (eye.classList.contains("fa-eye")) {

      eye.classList.remove("fa-eye");
      eye.classList.add("fa-eye-slash");
    }
    else {
      eye.classList.remove("fa-eye-slash");
      eye.classList.add("fa-eye");
    }

    if (Pswd.type == "text") {
      Pswd.type = "password"
    }
    else {
      Pswd.type = "text"
    }

  })


  function OnEdit(email, userName, pswd, _token) {
    let model = document.querySelector("#edit_modal");

    let bootstrap_modal = new bootstrap.Modal(model);

    bootstrap_modal.show(model)



    let Email = document.querySelector("#Email")
    let user_name = document.querySelector("#user_name")
    let password = document.querySelector("#Pswd")
    let token = document.querySelector("#_token")

    Email.value = email;
    user_name.value = userName;
    password.value = pswd;
    token.value = _token
  }






  let form = document.querySelector("#Myform");
  let email = document.querySelector("#email");
  let pswd = document.querySelector("#pswd");

  form.addEventListener("submit", async function (a) {
    a.preventDefault();

    let url = "<?php echo form_action ?>";



    let formData = new FormData(form);

    const option = {
      method: "POST",
      body: formData,
    }

    let data = await fetch(url, option);

    let response = await data.json();

    console.log(response)

    if (response.error > 0) {


      response.msg.forEach(msg => {
        showMsg("error", msg, "danger")
      });
    }
    else {

      showMsg("error", response.msg, "success")
    }

    email.value = ""
    pswd.value = ""


  })






  // ========================update===============================

  let form_edit = document.querySelector("#form_edit");

  form_edit.addEventListener("submit", async function (a) {
    a.preventDefault();

    let url = "<?php echo form_action ?>";



    let formData = new FormData(form_edit);

    const option = {
      method: "POST",
      body: formData,
    }

    let data = await fetch(url, option);

    let response = await data.json();

    console.log(response)

    if (response.error > 0) {


      response.msg.forEach(msg => {
        showMsg("error", msg, "danger")
      });
    }
    else {


      showMsg("error", response.msg, "success")

      let Mymodel = document.querySelector("#edit_modal");

      let bootstrap_modals = bootstrap.Modal.getInstance(Mymodel);

      bootstrap_modals.hide()

      setTimeout(function () {
        location.reload();
      }, 500)


    }

    // email.value = ""
    // pswd.value = ""



  })
</script>