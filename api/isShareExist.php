<?php
require("dbconnection.php");

$shareId = $_GET['shareId'];
$sql = "SELECT shares.* from shares where shares.id = ".$shareId;
$result = $conn->query($sql);
$share = $result->fetch_assoc();
if(empty($share))
{
	echo "false";
}
else{
	echo "true";
}
?>