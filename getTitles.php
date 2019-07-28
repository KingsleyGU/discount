<?php
require("dbconnection.php");

$result = $result = $conn->query("SELECT * FROM language");
$titleArrayUK = array();
$titleArrayCN = array();


while($row = $result->fetch_assoc()) 
{
	$titleArrayUK[$row['name']] = $row['text_UK'];
	$titleArrayCN[$row['name']] = $row['text_CN'];
}
  

?>