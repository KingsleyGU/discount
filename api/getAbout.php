<?php
require("dbconnection.php");

$result = $conn->query("SELECT * FROM about");
$aboutArrayUK = array();
$aboutArrayCN = array();


while($row = $result->fetch_assoc()) 
{
	$aboutArrayUK[$row['name']] = $row['text_UK'];
	$aboutArrayCN[$row['name']] = $row['text_CN'];
}
  

?>