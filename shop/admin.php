<?php 
session_start();
require("../api/dbconnection.php");
if(isset($_SESSION["shopName"]))
{
	if($_SESSION["shopName"]!='admin')
	{
		header("Location: login.php");
	}
}
else{
	header("Location: login.php");
}
$query = "select * from shopUser";
$shopResult = mysqli_query($conn,$query);
?>
<?php include 'header.php';?> 
  <section class="masthead">
	<div class="container inner ">
          <div class="row">
	<table class="table col-lg-12">
	  <thead>
	    <tr>
	      <th scope="col">序号</th>
	      <th scope="col">Name</th>
	      <th scope="col">Date</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php 
          while($shopRecord = mysqli_fetch_object($shopResult)) {      
        ?>
	    <tr>

	      <th scope="row"><?php  echo $shopRecord->id;?></th>
	      <td><?php  echo $shopRecord->name;?></td>
	      <td><?php  echo $shopRecord->createdDate;?></td>
	      <td><a href="index.php?shopId=<?php echo $shopRecord->id;?>" class="btn btn-light">VIEW</a></td>
	    </tr>
        <?php
          }
          ?>

	  </tbody>
	</table>
	</div>
	</div>
	</section>
<?php include 'footer.php';?>