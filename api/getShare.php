<?php
require("dbconnection.php");
$shareId = $_GET['shareId'];
$sql = "SELECT shares.*, coupon.id as couponId, COALESCE(X.eachShareLikeCount,0) as userLikesNum, shopUser.name as shopName, shopUser.firstDiscount,shopUser.firstNum,shopUser.secondNum,shopUser.secondDiscount, shopUser.name_UK as shopName_UK,shopUser.avatar as shopAvatar,shopUser.firstDiscount, shopUser.firstNum,shopUser.secondDiscount, shopUser.secondNum, user.name as userName,user.id as userId, user.avatar as userAvatar, user.spare_likes,shopItem.name as itemName, shopItem.img_url as itemImage,shopItem.name_UK as itemName_UK FROM shares left join shopUser on shopUser.id = shares.shopId left join user on user.id = shares.userId left join shopItem on shopItem.id = shares.itemId  left join (select shareLikes.shareId ,count(*) as eachShareLikeCount from shareLikes group by shareLikes.shareId) X on X.shareId = shares.id left join coupon on coupon.shareId = shares.id where shares.id = ".$shareId;
$result = $conn->query($sql);
$share = $result->fetch_assoc();
?>