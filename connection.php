<?php 

$server="localhost";
$username="root";
$password="";
$db="bank";

$con=mysqli_connect($server,$username,$password,$db);

if($con){
  
}

else
die("connection to this database failed due to " .mysqli_connect_error());


?>
