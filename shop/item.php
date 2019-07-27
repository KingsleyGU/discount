<?php
session_start();
require("../dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$ID = $_POST["shpitemId"];
$shopId = $_POST["shopId"];
$target_dir = "shop".$shopId."/";
$name = $_POST["name"];
if (!is_dir($target_dir)) {
mkdir($target_dir, 0755, true);
}
$file_name = date("Ymd-His").basename($_FILES["fileToUpload"]["name"]);
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
echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $d = imagejpeg(imagecreatefromjpeg($target_file), $target_file, 75);
    if(!empty($ID))
    {
        $query = "UPDATE shopItem SET img_url='$file_name', name='$name' WHERE id='$ID'";
    }
    else
    {
        $query = "INSERT into `shopItem` (name, img_url, shopId)
            VALUES ('$name', '$file_name', '$shopId')";
    }    
    $result = mysqli_query($conn,$query) or die(mysql_error());
    if($result){
        header("Location:index.php");
    }
    else{
        echo "Sorry, there was an error inserting";
    }
    
} else {
    echo "Sorry, there was an error uploading your file.";
}
}
         
}
?>