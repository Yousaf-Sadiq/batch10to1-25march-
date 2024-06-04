<?php
require_once dirname(__FILE__) . "/layout/user/header.php";
use App\database\DB as DB  ;


$obj = new DB;

$abc=[
 "email"=>"email@email.com",
 "user_name"=>"XYZ",
 "password"=>1234,
 "ptoken"=>1234
];

// $obj->insert("users","(`email`,`password`,`ptoken`)","('email@email.com',1234,1234)");
$obj->insert("users",$abc);
// echo dirname(__FILE__);
?>


<?php
require_once dirname(__FILE__) . "/layout/user/footer.php";

// echo dirname(__FILE__);
?>