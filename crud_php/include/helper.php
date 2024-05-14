<?php
declare(strict_types=1);

function filter_data(string $q)
{
 global $conn;

 $data = trim($q);
 $data = htmlspecialchars($data);
 $data = stripslashes($data);

 $data = $conn->real_escape_string($data);

 return $data;
}

function ERROR_MSG(string $msg)
{
 $html = "<div class='alert alert-danger d-flex align-items-center justify-content-between' role='alert'>
 <svg style='width:10%;' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
 <div style='width:60%; font-size:2rem; font-weigth:bolder;'>
  {$msg}
 </div>
</div>";

 echo $html;

}

function Success_msg(string $msg)
{
 $html = "<div class='alert alert-success  d-flex align-items-center justify-content-between' role='alert'>
 <svg style='width:10%;' class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
 <div style='width:60%; font-size:2rem; font-weigth:bolder;'>
  {$msg}
 </div>
</div>";

 echo $html;
}

function refresh_url(int $sec, string $url)
{

 header("Refresh:{$sec},url='{$url}'");
}


function redirect_url(string $url)
{

 header("Location:{$url}");
}
?>