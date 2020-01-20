<?php
require("dbconnection.php");
require("common_functions.php");
$sql = "SELECT shares.*, COALESCE(Y.shareLikeCount,0) as shareLikeCount, shopUser.name as shopName, shopUser.name_UK as shopName_UK,shopUser.avatar as shopAvatar, user.name as userName, user.avatar as userAvatar, shopItem.name as itemName, shopItem.img_url as itemImage,shopItem.name_UK as itemName_UK FROM shares left join shopUser on shopUser.id = shares.shopId left join user on user.id = shares.userId left join shopItem on shopItem.id = shares.itemId  left join (select shareId, count(*) as shareLikeCount from shareLikes group by shareId) Y on Y.shareId = shares.id";
if(!empty($_GET['userId']))
{
	$sql = $sql." where shares.userId = ".$_GET['userId'];
}
if(!empty($_GET['shopId']))
{
	$sql = $sql." where shares.shopId = ".$_GET['shopId'];
}
if(!empty($_GET['categoryId'])&&$_GET['categoryId']==2)
{
	$sql = $sql." where shares.created_time >= DATE_SUB(NOW(), INTERVAL 3 DAY) order by shareLikeCount DESC";
}
else{
$sql = $sql." order by shares.created_time DESC";
}
if(!empty($_GET['userId'])){
	$sql = $sql." limit 10";
}
elseif(!empty($_GET['shopId']))
{
	$sql = $sql." limit 20";
}
else{
	$sql = $sql." limit 20";
}
$result = $conn->query($sql);
$shares = array();


while($row = $result->fetch_assoc()) 
{
	 if(empty($row['img_url'])){
	 	$row['img_url'] = "./shop/shopimage/".$row['shopAvatar'];
	 }
	 else{
	 	$row['img_url'] = "./img/shares/".$row['img_url'];
	 }
	$row['created_time'] = time_elapsed_string($row['created_time']);
	array_push($shares, $row);
}
echo json_encode($shares);
?>