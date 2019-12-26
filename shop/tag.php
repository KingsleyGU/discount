<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../api/dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$shopId = $_REQUEST["shopId"];
if($_REQUEST["request_type"]==1)
{
    $id=$_REQUEST['tagId'];
    $query = "DELETE FROM shopTags WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    if($result){
        header("Location: index.php?shopId=".$shopId);
    }

}
elseif ($_REQUEST["request_type"]==2) {
    $tagCategory=$_REQUEST['tagCategory'];
    $query = "INSERT into `shopTags` (tagCategory, shopId)
        VALUES ('$tagCategory', '$shopId')";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    if($result){
        header("Location: index.php?shopId=".$shopId);
    }
}
}
?>