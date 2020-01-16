<?php
require("dbconnection.php");
require("common_functions.php");
$searchInput = $_GET["userInput"];
$result = $conn->query("SELECT user.*, COALESCE(Y.shareCount,0) as shareCount, COALESCE(Y.userLikeCount,0) as userLikesNum FROM user  left join (select shares.userId, count(*) as shareCount, sum(X.eachShareLikeCount) as userLikeCount from shares left join (select shareLikes.shareId ,count(*) as eachShareLikeCount from shareLikes group by shareLikes.shareId) X on X.shareId = shares.id group by shares.userId) Y on Y.userId = user.id where user.name like '%$searchInput%' or user.email like '%$searchInput%' or user.phone like '%$searchInput%' LIMIT 0, 10 ");
$users = array();



while($row = $result->fetch_assoc()) 
{
	if(empty($row['avatar'])){
		$row['avatar'] = "panda-png-icon.png";
	}
	$row['createdDate'] = time_elapsed_string($row['createdDate']);
	array_push($users, $row);
}
echo json_encode($users);
?>