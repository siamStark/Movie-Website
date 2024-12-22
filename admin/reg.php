<?php
include'header.php';
include'footer.php';
include'db.php';
?>

<div class="container">
	<div class="head" style="text-align: center;">
		<h1>Register To Movies HUB</h1>
	</div>
  
	<form action="reg.php" method="post">
  <fieldset>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  </fieldset>
</form>

</div>


<?php
if(isset($_POST['submit']))
{
    $uname=$_POST['uname'];
    $pwd=$_POST['pwd'];

    $hash=password_hash("$pwd", PASSWORD_BCRYPT);
    
  
   
    $query="INSERT INTO `admin`(`uname`, `pwd`) VALUES ('$uname','$hash')";
 $run=mysqli_query($con,$query);
 if($run)
 {
    echo "<script>alert('New User Added Successfully');window.location.href='Login.php';</script>";
 }
 else
 {
    echo "Something Wrong";
 }
}
?>