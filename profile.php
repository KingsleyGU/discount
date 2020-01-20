<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require("api/getUserInfo.php");
?>
<?php include 'user/header.php';?>  
<header class="masthead text-center" style="padding-bottom: 40px;">
  	<?php if(isCurrentUser($userId)){?>
    <div class="container d-flex align-items-center flex-column">
      <div class="user-change-trigger">
      	<div>
      		<img class="masthead-avatar user-profile-content" src="<?php echo $avatar;?>" alt="">
      	</div>
      	<form action="api/userProfile.php" method="post" enctype="multipart/form-data" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="5"/>
			<div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" type="file" name="fileToUpload" id="fileToUpload"  required/>
              </div>
		    <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
      	</form>

      </div>
      <div class="user-change-trigger">
      	<h2 class=" user-profile-content"><?php echo $userRecord->name; ?></h2>
        <p><?php echo $titleArray['remaining'];?><i class='fas fa-heart text-danger'></i> :<?php echo $userRecord->spare_likes;?></p>

      	<form action="api/userProfile.php" method="post" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="1"/>
            <div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" value="<?php echo $userRecord->name;?>" type="text" name="name" id="name"  required/>
            </div>  
		    <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
      	</form>
      </div>

      <p><i class="fa fa-envelope shop-profile-icon" aria-hidden="true"></i><?php echo $userRecord->email;?></p>
      <div class="user-change-trigger">
      <p class="user-profile-content"> <i class="fas fa-phone shop-profile-icon"></i><?php echo $userRecord->phone;?></p>
    	<form action="api/userProfile.php" method="post" class="user-profile-form">
			<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
			<input type="hidden" name="fieldId" value="3"/>
            <div class="wrap-input100 validate-input m-b-30" >
              <input class="input100" value="<?php echo $userRecord->phone;?>" type="text" name="phone" id="phone"  required/>
            </div>  
		    <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
      	</form>
      </div>
    </div>
    <?php } else{?>
   <div class="container d-flex align-items-center flex-column">
      <div >
      	<div>
      		<img class="masthead-avatar user-profile-content" src="<?php echo $avatar;?>" alt="">
      	</div>
      </div>
      <div >
      	<h2 class="user-profile-content"><?php echo $userRecord->name; ?></h2>
      </div>

      <p ><i class="fa fa-envelope shop-profile-icon" aria-hidden="true"></i><?php echo $userRecord->email;?></p>
      <div >
      <p class="user-profile-content"> <i class="fas fa-phone shop-profile-icon"></i><?php echo $userRecord->phone;?></p>
      </div>
    </div>

    <?php }?>
  </header>



<?php 
   if($subscribeRows > 0){
?>
  <section id="subscription-section" style="padding:50px 0px; display:none;">
  <div class="container">
         <h2 style="text-align: center; line-height: 50px;  ">
          <?php	echo $titleArray['subscription']; ?>
        </h2>

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
<?php
}
?>
  <section class="page-section" style="border-top: solid 5px #da452d; padding: 60px 0px;">
  	<?php include 'user/share_template.php';?>	
  </section>
<?php if(isCurrentUser($userId)&&$couponRows > 0){?>
  <section id="coupon-section" style="border-top: solid 5px #da452d; padding: 60px;">
	<div class="container inner ">
         	<h2 style="text-align: center; line-height: 50px;"><?php 
	       	echo "Your coupon list";   
	       ?></h2>
      	<div class="personal row" style="<?php if($couponRows == 0){ echo "display: none"; }?>">
			<table class="table col-lg-12">
			  <thead>
			    <tr>
			      <th scope="col" >Name</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php 
			  		$row =1;
		          while($couponRecord = mysqli_fetch_object($couponResult)) {  
		          	$status = 0;
			      $couponDate = $couponRecord->createdDate;
			      // $date_7daysago = new DateTime(date("Y-m-d",strtotime('-7 days')));
            $date_today = new DateTime(date("Y-m-d"));
			      if(isExpired($couponDate))
			      {
			      	$status = 1;
			      }
            if($couponRecord->used == 1) {
              $status = 2;
            }  
		        ?>
			    <tr>

			      <td width="40%"><?php  echo $couponRecord->shopName;?></td>
			      <td width="30%"><?php  
			      if($status ==1)
			      {
			      	echo "<span class='badge badge-secondary'>expired</span>";
			      }
            elseif($status ==2)
            {
              echo "<span class='badge badge-secondary'>used</span>";
            }
			      else{
			      	echo "<span class='badge badge-success'>valid</span>";
			      }
			      ?></td>
			      <td width="30%"><a href="coupon.php?couponId=<?php echo $couponRecord->id;?>" class="btn btn-light">VIEW</a></td>
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
<?php }?>
  <?php include 'user/footer.php';?>
<script type="text/javascript">
	$(".user-change-trigger").click(function(){
		$(".user-profile-content").show();
		$(".user-profile-form").hide();
		$(this).find(".user-profile-content").hide();
		$(this).find(".user-profile-form").show();
	})
</script>
<script type="text/javascript">
loadShares("api/getShareList.php?userId="+"<?php echo $_GET['userId'];?>");
</script>