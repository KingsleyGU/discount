<?php
require("dbconnection.php");
$userId = $_GET["userId"];
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
$subscribeQuery = "select X.shopId,shopUser.name,shopUser.avatar from (select shares.shopId from shares where shares.userId = ".$userId." group by shares.shopId) X left join shopUser on shopUser.id=X.shopId";
$subscribeResult = mysqli_query($conn,$subscribeQuery);
$subscribeRows = mysqli_num_rows($subscribeResult);

?>