<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $shopId = $_POST["shopId"];
    $userId = $_POST["userId"];
    $content = $_POST["comment"];
    $createdDate = date("Y-m-d H:i:s");
     $query = "INSERT into `comment` (userId, shopId, content, createdDate)
      VALUES ('$userId', '$shopId', '$content', '$createdDate')";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            $discount = $_POST["discount"];
            $couponQuery = "INSERT into `coupon` (userId, shopId, discount, createdDate)
      VALUES ('$userId', '$shopId', '$discount', '$createdDate')";
            $couponResult = mysqli_query($conn,$couponQuery) or die(mysql_error());
            $couponId = $conn->insert_id;
            if($couponResult)
            {
                header("Location: coupon.php?couponId=$couponId");
            }
            
        }
        else{
            echo("Error description: " . mysqli_error($con));
        }

    
    
}

?>