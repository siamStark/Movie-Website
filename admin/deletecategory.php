<?php
include 'db.php';
$id=$_GET['id'];

$query="DELETE FROM `category` WHERE  id=$id";
$run=mysqli_query($con,$query);
if($run)
{
    header('location:categorylist.php');
}
else
{
    "<script> alert('something is wrong');windows.location.href='categorylist.php';</script>";
}

?>