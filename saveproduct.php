<?php
include("db.php");
$proname=$_POST['proname'];
$price=$_POST['price'];
$qty=$_POST['qty'];
mysqli_query($conn,"INSERT INTO inventory (item, price, qtyleft) VALUES ('$proname', '$price','$qty')");
header("location: tableedit.php#page=addpro");
?>