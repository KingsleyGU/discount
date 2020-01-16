<?php
require("dbconnection.php");
$category = 1;
$shopQuery = "select shopUser.*, COALESCE(Y.shareCount,0) as shareCount, COALESCE(Y.userLikeCount,0) as userLikesNum FROM shopUser left join (select shares.shopId, count(*) as shareCount, sum(X.eachShareLikeCount) as userLikeCount from shares left join (select shareLikes.shareId ,count(*) as eachShareLikeCount from shareLikes group by shareLikes.shareId) X on X.shareId = shares.id group by shares.shopId) Y on Y.shopId = shopUser.id where shopUser.category='$category' and shopUser.active=1 order by weight DESC, userLikesNum DESC, shareCount DESC";
$shopResult = mysqli_query($conn,$shopQuery);
?>