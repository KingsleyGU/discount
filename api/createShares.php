<?php
require("dbconnection.php");
require("common_functions.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($_FILES["fileToUpload"]['size'] == 0){
		$file_name = null;
	}
	else{
	    $target_dir = "../img/shares/";
	    $file_name = preg_replace('/\s/', '', date("Ymd-His").basename($_FILES["fileToUpload"]["name"]));
	    $target_file = $target_dir.$file_name;
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	    // Check if image file is a actual image or fake image
	    if(isset($_POST["submit"])) {
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if($check !== false) {
	            echo "File is an image - " . $check["mime"] . ".";
	            $uploadOk = 1;
	        } else {
	            echo "File is not an image.";
	            $uploadOk = 0;
	        }
	    }
	    // Check if file already exists
	    if (file_exists($target_file)) {
	        echo "Sorry, file already exists.";
	        $uploadOk = 0;
	    }
	    // Check file size
	    if ($_FILES["fileToUpload"]["size"] > 5000000) {
	        echo "Sorry, your file is too large.";
	        $uploadOk = 0;
	    }
	    // Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	    && $imageFileType != "gif" ) {
	        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	        $uploadOk = 0;
	    }
	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	        $file_name = null;

	    // if everything is ok, try to upload file
	    } else {
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            correctImageOrientation($target_file);
                $d=imagejpeg(imagecreatefromjpeg($target_file), $target_file, 75);
	        } else {
	            $file_name = null;
	        }
	    }
	}
	$shopId = $_REQUEST["shopId"];
	$userId = $_REQUEST["userId"];
	$itemId = $_REQUEST["itemId"];
	$created_time = date("Y-m-d H:i:s");
	$title = addslashes($_REQUEST["title"]);
	$description = addslashes($_REQUEST["description"]);
	$query = "INSERT into `shares` (userId, shopId,itemId,img_url,created_time,title,description)
	    VALUES ($userId, $shopId,$itemId,'$file_name','$created_time','$title','$description')";
	if ($conn->query($query) === TRUE) {
	    $shareId = $conn->insert_id;
	    header("Location: /discount/share.php?shareId=".$shareId);
	} else {
	    header("Location: /discount/notification.php?categoryId=2");
	}
}
?>