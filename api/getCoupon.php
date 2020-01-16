<?php
require("dbconnection.php");
$couponId = $_GET["couponId"];
$query = "select coupon.*,shopUser.name as shopName,shopUser.name_UK as shopName_UK,shopUser.avatar,shopUser.firstDiscount, shopUser.firstNum,shopUser.secondDiscount, shopUser.secondNum, COALESCE(X.eachShareLikeCount,0) as userLikesNum from coupon  left join shopUser on coupon.shopId = shopUser.id left join (select shareLikes.shareId ,count(*) as eachShareLikeCount from shareLikes group by shareLikes.shareId) X on X.shareId = coupon.shareId where coupon.id='$couponId'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
  $couponRecord = mysqli_fetch_object($result); 
  if(($couponRecord->userLikesNum>=$couponRecord->secondNum)&&($couponRecord->secondDiscount>$couponRecord->discount)) 
  {
    $sqlUpdate = "update `coupon` set discount =".$couponRecord->secondDiscount." where id = ".$couponId;
    if ($conn->query($sqlUpdate) != TRUE) {
      die(mysql_error());
    }
  }
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $couponRecord = mysqli_fetch_object($result);  
    $shopName = $couponRecord->shopName_UK;
    if($lang=="cn"){
      $shopName = $couponRecord->shopName;
    }
    $shopId = $couponRecord->shopId;
    $shopImage = $couponRecord->avatar;
    if(is_null($shopImage))
    {
      $shopImage = "panda.png";
    }
    $shopDiscount = $couponRecord->discount;
    $couponDate = $couponRecord->createdDate;
    $couponUser = $couponRecord->userId;
    $expired = 0;
    $ribbonContent = "";
    $date = new DateTime(date("Y-m-d"));
    if($couponRecord->used==1)
    {
      $ribbonContent = $titleArray['used'];
    }
    if(isExpired($couponDate))
    {
      $expired = 1;
      $ribbonContent = $titleArray['expired'];
    } 
  }
}


?>