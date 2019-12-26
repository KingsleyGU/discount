<?php
require("dbconnection.php");

$shareId = $_GET['shareId'];
$shareQuery = "select count(*) as likeNum from shareLikes where shareId='$shareId'";
$result = $conn->query($shareQuery);
$likeNum = $result->fetch_assoc();
?>