<?php
require("dbconnection.php");

$shareId = $_GET['shareId'];
$sql = "SELECT shares.*, shopUser.name as shopName, shopUser.name_UK as shopName_UK,shopUser.avatar as shopAvatar, user.name as userName, user.avatar as userAvatar, shopItem.name as itemName, shopItem.img_url as itemImage,shopItem.name_UK as itemName_UK FROM shares left join shopUser on shopUser.id = shares.shopId left join user on user.id = shares.userId left join shopItem on shopItem.id = shares.itemId  where shares.id = ".$shareId;
$result = $conn->query($sql);
$share = $result->fetch_assoc();
?>