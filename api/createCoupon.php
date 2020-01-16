<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$shareId = $_REQUEST["shareId"];
	$userId = $_REQUEST["userId"];
	$shopId = $_REQUEST["shopId"];
	$discount = $_REQUEST["discount"];
	$createdDate = date("Y-m-d H:i:s");
	$insertQuery = "INSERT into `coupon` (shareId,userId,shopId, discount,createdDate)
	    VALUES ($shareId,$userId,$shopId, '$discount','$createdDate')";
	if ($conn->query($insertQuery) === TRUE) {
		$couponId = $conn->insert_id;
	    header("Location: /discount/coupon.php?couponId=".$couponId);
	}
}

?>