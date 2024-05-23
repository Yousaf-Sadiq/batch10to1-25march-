<?php

require_once dirname(__FILE__) . "/layout/user/header.php";


if (isset($_SESSION["Email"]) && !empty($_SESSION["Email"])) {

  $user_id = $_SESSION["user_id"];
} else {
  redirect_url(LOGIN);
}

session_destroy();

Success_msg("LOGOUT SUCCESSFULL");

refresh_url(2,LOGIN);


?>




<?php

require_once dirname(__FILE__) . "/layout/user/footer.php";
?>
