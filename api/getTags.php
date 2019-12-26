<?php
require("dbconnection.php");

$shopTagQuery = "select * from shopTags where shopId='$shopRecord->id'";
$shopTagResult = $conn->query($shopTagQuery);
$tags = array();
while($row = $shopTagResult->fetch_assoc()) { 
	array_push($tags, $row);
}
?>