<?php

const SERVER="localhost";
const User_name="root";
const PASSWORD="";
const DB="25march_db";

$conn= new mysqli(SERVER,User_name,PASSWORD,DB);

if ($conn) {
 // echo "established";
}
else{
 echo $conn->error;
}

// $conn= mysqli_connect();





?>