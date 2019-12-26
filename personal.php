<?php 
session_start();
require("api/dbconnection.php");
$userId = $_SESSION["userId"];
$couponQuery = "select coupon.*,shopUser.name as shopName,shopUser.avatar from coupon  left join shopUser on coupon.shopId = shopUser.id where coupon.userId='$userId' order by coupon.createdDate desc";
$couponResult = mysqli_query($conn,$couponQuery);
$couponRows = mysqli_num_rows($couponResult);
$userQuery = "select * from user where id='$userId'";
$userResult = mysqli_query($conn,$userQuery);
$userRows = mysqli_num_rows($userResult);
$avatar = "img/panda4.png";
if($userRows==1){
	$userRecord = mysqli_fetch_object($userResult);  
	if(!empty($userRecord->avatar))
	{
		$avatar = "img/userAvatar/".$userRecord->avatar;
	}
}
$subscribeQuery = "select subscription.*, shopUser.name, shopUser.avatar from subscription left join shopUser on subscription.shopId = shopUser.id where subscription.userId='$userId'";
$subscribeResult = mysqli_query($conn,$subscribeQuery);
$subscribeRows = mysqli_num_rows($subscribeResult);

?>
<?php include 'user/header.php';?>  
<header class="masthead text-center" style="padding-bottom: 40px;">
    <div class="container d-flex align-items-center flex-column">

      <div class="user-change-trigger">
      	<img class="masthead-avatar user-profile-content" src="<?php echo $avatar;?>" alt="">
      	<form action="api/userProfile.php" method="post" enctype="multipart/form-data" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="5"/>
			<div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" type="file" name="fileToUpload" id="fileToUpload"  required/>
              </div>
		    <input type="submit" value="提交" class="login100-form-btn" />
      	</form>
      </div>
      <div class="user-change-trigger">
      	<h2 class="user-profile-name user-profile-content"><?php echo $userRecord->name; ?></h2>
      	<form action="api/userProfile.php" method="post" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="1"/>
            <div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" value="<?php echo $userRecord->name;?>" type="text" name="name" id="name"  required/>
            </div>  
		    <input type="submit" value="提交" class="login100-form-btn" />
      	</form>
      </div>

      <p class="user-profile-contact"><i class="fa fa-envelope shop-profile-icon" aria-hidden="true"></i><?php echo $userRecord->email;?></p>
      <div class="user-change-trigger">
      <p class="user-profile-contact user-profile-content"> <i class="fas fa-phone shop-profile-icon"></i><?php echo $userRecord->phone;?></p>
    	<form action="api/userProfile.php" method="post" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="3"/>
            <div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" value="<?php echo $userRecord->phone;?>" type="text" name="phone" id="phone"  required/>
            </div>  
		    <input type="submit" value="提交" class="login100-form-btn" />
      	</form>
      </div>
    </div>
  </header>

  <section id="subscription-section">
  <div class="container">
         <h2 style="text-align: center; line-height: 50px;"><?php 
       if($subscribeRows == 0){
       		echo "You don't have any subscription yet";
       }
       else
       {
       	echo "Your subscription";
       }
       ?></h2>

       <div class="row">
        <!-- Portfolio Item 1 -->
        <?php 
          while($subscribeRecord = mysqli_fetch_object($subscribeResult)) {      

	        $shopAvatar = $subscribeRecord->avatar;
	        if(is_null($shopAvatar))
	        {
	          $shopAvatar = "panda.png";
	        }
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal">
          	<a class="subscription-link" alt="<?php echo $subscribeRecord->name;?>" href="details.php?shopId=<?php echo $subscribeRecord->shopId;?>">
               <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo './shop/shopimage/'.$shopAvatar?>)"></div>
 
            	<div class="item-name" ><?php echo $subscribeRecord->name;?></div>
            </a>
          </div>
        </div>

        <?php
        }
        ?>

      </div> 
      </div>	
  </section>
  <section id="coupon-section" >
	<div class="container inner ">
         	<h2 style="text-align: center; line-height: 50px;"><?php 
	       if($couponRows == 0){
	       		echo "You don't have any coupon yet";
	       }
	       else
	       {
	       	echo "Your coupon list";
	       }
	       ?></h2>
      	<div class="personal row" style="<?php if($couponRows == 0){ echo "display: none"; }?>">
			<table class="table col-lg-12">
			  <thead>
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Date</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php 
			  		$row =1;
		          while($couponRecord = mysqli_fetch_object($couponResult)) {  
		          	$expired = 0;
			      $couponDate = date_create($couponRecord->createdDate);
			      $date_today = new DateTime(date("Y-m-d"));
			      if($couponDate>$date_today)
			      {
			      	$expired = 0;
			      }
			      else{
			      	$expired = 1;
			      }    
		        ?>
			    <tr>

			      <td><?php  echo $couponRecord->shopName;?></td>
			      <td><?php echo time_elapsed_string($couponRecord->createdDate);?></td>
			      <td><?php  
			      $couponDate = date_create($couponRecord->createdDate);
			      $date_today = new DateTime(date("Y-m-d"));
			      if($expired ==1)
			      {
			      	echo "<span class='badge badge-secondary'>expired</span>";
			      }
			      else{
			      	echo "<span class='badge badge-success'>valid</span>";
			      }
			      ?></td>
			      <td><a href="coupon.php?couponId=<?php echo $couponRecord->id;?>" class="btn btn-light">VIEW</a></td>
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
<script type="text/javascript">
	$(".user-change-trigger").click(function(){
		$(".user-profile-content").show();
		$(".user-profile-form").hide();
		$(this).find(".user-profile-content").hide();
		$(this).find(".user-profile-form").show();
	})
</script>