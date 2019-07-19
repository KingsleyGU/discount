<?php
require("../dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $shopId = $_POST["shopId"];
    if($_POST["request_type"]==1)
    {
        $id=$_POST['tagId'];
        $query = "DELETE FROM shopTags WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            $_SESSION["shopName"] = $name;
            header("Location: index.php");
        }

    }
    elseif ($_POST["request_type"]==2) {
        $tagCategory=$_POST['tagCategory'];
        $query = "INSERT into `shopTags` (tagCategory, shopId)
            VALUES ('$tagCategory', '$shopId')";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            header("Location: index.php");
        }
    }
}
?>