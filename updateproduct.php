<?php
$mysqli_hostname = "localhost:3308";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "liveedit";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) 
or die("Opps some thing went wrong");
// mysqli_select_db($mysqli_database, $bd) or die("Opps some thing went wrong");

include("db.php");
$proid=$_POST['ITEM'];
$itemnumber=$_POST['itemnumber'];
mysqli_query($conn,"UPDATE inventory SET qtyleft='$itemnumber'
WHERE id='$proid'");
header("location: tableedit.php#page=addproitem");
?>