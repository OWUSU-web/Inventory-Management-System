<?php
include("db.php");
if($_POST['id'])
{
$id=($_POST['id']);
$qty_sold=($_POST['qty_sold']);
$price=($_POST['price']);
$da=date("Y-m-d");
$sql=mysqli_query($conn,"select * from inventory where id='$id'");
while($row=mysqli_fetch_array($sql))
{
$qtyleft=$row['qtyleft'];
$price=$row['price'];
}
$ssss=$qtyleft-$qty_sold;
$sale=$qty_sold*$price;
$sales_sql=mysqli_query($conn,"select * from sales where date='$da' and product_id='$id'");
$count=mysqli_num_rows($sales_sql);

if($count==0)
{
mysqli_query($conn,"INSERT INTO sales (product_id, qty, date, sales) VALUES ('$id','$qty_sold','$da','$sale')");
}
if($count!=0)
{
mysqli_query($conn,"UPDATE sales set qty=qty+'$qty_sold',sales='$sale' where date='$da' and product_id='$id'");
}

$sql = "update inventory set qtyleft='$ssss',price='$price',sales=sales+'$sale',qty_sold=qty_sold+'$qty_sold' where id='$id'";
mysqli_query($conn,$sql);
}
?>


