<?php
include 'header.php';
include 'footer.php';
include 'db.php';
?>
<?php

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $catname =$_GET['catname'];
    $fk=$_GET['forkey'];
    if(isset($_POST['submit']))
    {
       $cname=$_POST['categoryname'];
       $forkey=$_POST['forkey'];
       $pid=$_POST['pid'];
       $query="UPDATE `category` SET `id`=$pid,`category_id`='$forkey',`category_name`='$cname' WHERE id=$id";
      $run=mysqli_query($con,$query);
      if($run)
      {
        echo  "<script>alert('category update Successfully');window.location.href='categorylist.php';</script>";
      }
      else
      {
        echo  "<script>alert('something went wrong');window.location.href='editcategory.php';</script>";
      }

    }

}
else
{
    header('location:categorylist.php');
}

?>



<div class="container">
    <div class="head" style="text-align: center: padding=10px 0px 10px 0px;">
      <h1> Edit Category</h1>
    </div>
    <form action="#" method="post">
  <div class="form-row">
    <div class="col-7">
        <small>category name</small>
      <input type="text" class="form-control" name="categoryname" value="<?php  echo $catname;?>" placeholder="category name">
    </div>
    <div class="col">
    <small>foriegn key</small>
      <input type="text" class="form-control"  name="forkey" value="<?php  echo $fk;?>" placeholder="foriegn key">
    </div>
    <div class="col">
    <small>primary ID</small>
      <input type="text" class="form-control"  name="pid" value="<?php  echo $id;?>"    placeholder="primary ID">
    </div>
  </div>
  <br>
  <input type="submit" class="btn btn-outline-success btn-lg"  name="submit">
</form>
</div>


