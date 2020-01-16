<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$shareId = $_REQUEST["shareId"];
	$userProfile = $_REQUEST["userProfile"];
	$created_time = date("Y-m-d H:i:s");
	$validateQuery = "select * from shareLikes where userProfile = '$userProfile' and DATE(created_date)=DATE(NOW()) and shareId = '$shareId'";
	$result = $conn->query($validateQuery);
	if($result->num_rows > 0){
		echo "You have already liked this one";
	}
	else{
		$insertQuery = "INSERT into `shareLikes` (shareId, userProfile,created_date)
		    VALUES ($shareId, '$userProfile','$created_time')";
		if ($conn->query($insertQuery) === TRUE) {
		    echo "success";
		}
	}
}

?>