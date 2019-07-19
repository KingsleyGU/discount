<?php include 'user/header.php';?>
 <?php 
  require("dbconnection.php");
  $couponId = $_GET["couponId"];
  $query = "select coupon.*,shopUser.name as shopName,shopUser.avatar from coupon  left join shopUser on coupon.shopId = shopUser.id where coupon.id='$couponId'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
  	$couponRecord = mysqli_fetch_object($result);  
  	$shopName = $couponRecord->shopName;
  	$shopId = $couponRecord->shopId;
  	$shopImage = $couponRecord->avatar;
  	$shopDiscount = $couponRecord->discount;
  	$couponDate = $couponRecord->createdDate;
  	$couponUser = $couponRecord->userId;
  }

 ?> 
<section id="coupon" class="masthead">
	<div class="container inner ">
          <div class="coupon">
              <h3><?php echo $shopName;?></h3>
            <img src="<?php echo "./shop/shopimage/".$shopImage;?>" alt="Avatar" style="width:100%;">
            <div class="container" style="background-color:white">
              <h3><b><?php echo $shopDiscount;?>% OFF</b></h3> 
              <p class="disclosure">本折扣券只限当天有效，而且最终的解释权归相应的餐馆或者商铺所有，一张折扣券只限使用一次</p>
            </div>
            <div class="container">
              <p class="promo-code">折扣券编号: <span class="promo"><?php echo $shopId.$couponUser.date_format(date_create($couponDate), 'YmdH-i-s');?></span></p>
              <p class="expire-code">有效期: <span class="promo"><?php echo date_format(date_create($couponDate), 'jS F Y');?> 23:59:59</span></p>             
            </div>
          </div>
	</div>
</section>


<?php include 'user/footer.php';?>