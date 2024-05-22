<?php

// define("ROOTPATH","http://localhost/");

const ROOTPATH = "http://localhost/"; // absolute path 

define("ROOTPATH2",$_SERVER['DOCUMENT_ROOT']); // relative path 


const Folder = "25marchbatch/crud_php";




const server1 = ROOTPATH . Folder; // absolute path 


const server2 = ROOTPATH2 ."/". Folder; // relative path

const HOME = server1 . "/home.php";


const insert = server1 . "/action/form_action.php";

const update_submit= server1 . "/action/form_action.php";



const UPDATE = server1 ."/update.php";


?>