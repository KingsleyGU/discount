<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$userId = $_REQUEST["userId"];
	$shareId = $_REQUEST["shareId"];
	$likeNum = (int) $_REQUEST["likeNum"];
	$created_time = date("Y-m-d H:i:s");
	$userProfile = "f4d67a277ffc3ba3cdd7252a8283d76a";
	$insertQuery = "INSERT into `shareLikes` (shareId, userProfile,created_date)
	    VALUES ($shareId, '$userProfile','$created_time')";
 	for ($i = 1; $i < $likeNum; $i++) {
	    $insertQuery = $insertQuery.",($shareId, '$userProfile','$created_time')";
	}
	if ($conn->query($insertQuery) === TRUE) { 
		$sql = $sql = "update user set spare_likes=spare_likes-".$likeNum." where id=".$userId;
		$result = $result = $conn->query($sql);
	  	header("Location: /discount/share.php?shareId=".$shareId);
	}
}

?>