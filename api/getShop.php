<?php 
require("dbconnection.php");
$shopId = $_GET["shopId"];
$query = "select shopUser.*, COALESCE(Y.shareCount,0) as shareCount, COALESCE(Y.userLikeCount,0) as userLikesNum FROM shopUser left join (select shares.shopId, count(*) as shareCount, sum(X.eachShareLikeCount) as userLikeCount from shares left join (select shareLikes.shareId ,count(*) as eachShareLikeCount from shareLikes group by shareLikes.shareId) X on X.shareId = shares.id group by shares.shopId) Y on Y.shopId = shopUser.id where shopUser.id='$shopId'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$shopRecord = mysqli_fetch_object($result);  
$location = $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; 
$category = $shopRecord->category;
}
?> 