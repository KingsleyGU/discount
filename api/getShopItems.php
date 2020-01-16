<?php
require("dbconnection.php");
$shopId = $_GET['shopId'];
$shopItemQuery = "select * from shopItem where shopId='$shopId'";
$shopItemResult = $conn->query($shopItemQuery);
$items = array();
while($row = $shopItemResult->fetch_assoc()) { 
	array_push($items, $row);
}
echo json_encode($items);
?>