<?php
require("dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $shopId = $_REQUEST["shopId"];
    $userId = $_REQUEST["userId"];
    $actionId = $_REQUEST["actionId"];
    $createdDate = date("Y-m-d H:i:s");
    if($actionId == 1)
    {
     $query = "INSERT into `subscription` (userId, shopId,createdDate)
      VALUES ('$userId', '$shopId', '$createdDate')";
      echo $query."111111";
        $result = mysqli_query($conn,$query);
        if($result){

                echo "success";                  
        }
        else{
            echo("Error description: " . mysqli_error($conn));
        }
    }
    else{
     $query = "delete from `subscription` where shopId = '$shopId' and userId ='$userId'";
     echo $query."22222";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "success"; 
        }
        else{
            echo("Error description: " . mysqli_error($conn));
        }        
    }
}
?>