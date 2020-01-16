<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$shareId = $_REQUEST["shareId"];
	$userProfile = $_REQUEST["userProfile"];
	$created_time = date("Y-m-d H:i:s");
	$validateQuery = "select * from shareLikes where userProfile = '$userProfile' and shareId = '$shareId'";
	$result = $conn->query($validateQuery);
	if($result->num_rows > 0){
		echo "true";
	}else{
		echo "false";
	}
}

?>