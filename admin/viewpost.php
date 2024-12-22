<?php 

include 'db.php';
include 'header.php';
include 'footer.php';
 ?>
<?php 

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query1 = "SELECT * FROM category where id = $id";
  $run1 = mysqli_query($con,$query1);
  if ($run1) {
    while ($row1=mysqli_fetch_assoc($run1)) {
      ?>


<div class="container">
  

   
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Movies in <?php echo $row1['category_name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  	 <ul class="navbar-nav ml-auto">
  	 	      <li class="nav-item">
        <a class="btn btn-warning text-light" href="addmovie.php">Add a Movie</a>
      </li>
  	 </ul>
    <ul class="navbar-nav ml-auto">

 		<form class="form-inline" method="post" action="searchmovie.php">
    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
    <button class="btn btn-success" name="submit" type="submit">Search</button>
  </form>
    </ul>
  </div>
</nav>
</div>

		
	
		<div class="container">
      
    

<div class="row">
<?php 

$query2 = "SELECT * FROM category,movie where category.id=movie.cat_id and category.id=$id";
$run2 = mysqli_query($con,$query2);
if ($run2) {
  while ($row2=mysqli_fetch_assoc($run2)) {
    ?>
  <div class="col-md-2">

    <div class="card" style="width:200px;text-align: center;">
    	<p><?php echo $row2['id']; ?></p>
     <?php echo "<img height='180px' width='auto' src='../thumb/".$row2['img']."'>"; ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $row2['mv_name']; ?></h5>
        <p class="card-text"><?php echo $row2['meta_description']; ?></p>
        <a href="viewmovie.php?id=<?php echo$row2['id']; ?>" class="btn btn-secondary">View Details</a>
      <br>
      <br>
      <a href="deletemovie.php?id=<?php echo$row2['id'] ?>" class="btn btn-danger">DELETE</a>
      <a href="editmovie.php?id=<?php echo$row2['id'] ?>" class="btn btn-info ">Edit</a>
</div>

    </div>
  </div> <?php
  }
}

    ?>
</div>
</div>
	<?php
    }
  }

}
else{
  header('location:categorylist.php');
}

 ?>