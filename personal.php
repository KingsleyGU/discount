 <?php include 'user/header.php';?>   
 <?php 
  require("dbconnection.php");
	$userId = $_SESSION["userId"];
  	$query = "select coupon.*,shopUser.name as shopName,shopUser.avatar from coupon  left join shopUser on coupon.shopId = shopUser.id where coupon.userId='$userId'";
	$couponResult = mysqli_query($conn,$query) or die(mysql_error());

  ?>
  <section id="personal" class="masthead">
	<div class="container inner ">
          <div class="personal row">
	<table class="table col-lg-12">
	  <thead>
	    <tr>
	      <th scope="col">序号</th>
	      <th scope="col">Name</th>
	      <th scope="col">Date</th>
	      <th scope="col">Status</th>
	      <th scope="col">View</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php 
	  		$row =1;
          while($couponRecord = mysqli_fetch_object($couponResult)) {      
        ?>
	    <tr>

	      <th scope="row"><?php  echo $row;?></th>
	      <td><?php  echo $couponRecord->shopName;?></td>
	      <td><?php  echo $couponRecord->createdDate;?></td>
	      <td><?php  
	      $couponDate = date_create($couponRecord->createdDate);
	      $date_today = new DateTime(date("Y-m-d"));
	      if($couponDate>$date_today)
	      {
	      	echo "valid";
	      }
	      else{
	      	echo "expired";
	      }
	      ?></td>
	      <td><a href="coupon.php?couponId=<?php echo $couponRecord->id;?>">detail</a></td>
	    </tr>
        <?php
        	$row = $row +1;
          }
          ?>

	  </tbody>
	</table>
	</div>
	</div>
	</section>
  <?php include 'user/footer.php';?>