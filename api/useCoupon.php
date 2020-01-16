<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_REQUEST["couponId"];
	$insertQuery = "update `coupon` set used = 1 where id = ".$id;
	if ($conn->query($insertQuery) === TRUE) {
		header("Location: /discount/coupon.php?couponId=".$id);
	}
	else{
		echo "Some thing is wring with the server";
	}
}
?>