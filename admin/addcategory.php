<?php
include 'header.php';
include 'footer.php';
include 'db.php';
?>

<div class="container">
 <div class="head">
    <div>
    <div class="jumbotron">
  <h1 class="display-4">Add a category</h1>
  <p class="lead">Add Category and also mention their category id.</p>
  <hr class="my-4">
  <form action="addcategory.php" method="post">
  <div class="form-row">
    <div class="col-7">
      <input type="text" name="catname" class="form-control" placeholder="Category Name">
    </div>
    <div class="col">
      <input type="text" name="catid" class="form-control" placeholder="Category ID">
    </div>
  </div>
  <br> <br>
  <button class="btn btn-primary btn-lg"  name="submit" href="#" role="button">Add Category</button>
</form>
</div>
    </div>
 </div>
</div>

<?php

if(isset($_POST['submit']))
{
    $catname=$_POST['catname'];
    $catid=$_POST['catid'];

    $query="INSERT INTO `category`(`category_id`, `category_name`) VALUES ($catid,'$catname')";
    $run=mysqli_query($con,$query);
   if($run)
   {
    echo  "<script>alert('category Added Successfully');window.location.href='categorylist.php';</script>";
   }
   else
   {
    echo  "<script> alert('There was an error adding category');windows.location.href='addcategory.php'; </script>";
   }

}



?>