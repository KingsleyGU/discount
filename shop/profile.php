<?php
require("../dbconnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = $_POST["id"];
    if($_POST["itemId"]==1)
    {
        $name=$_POST['name'];
        $query = "UPDATE shopUser SET name='$name' WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            $_SESSION["shopName"] = $name;
            header("Location: index.php");
        }

    }
    elseif ($_POST["itemId"]==2) {
        $description=$_POST['description'];
        $query = "UPDATE shopUser SET description='$description' WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            header("Location: index.php");
        }
    }
    elseif ($_POST["itemId"]==3) {
        $email=$_POST['email'];
        $query = "UPDATE shopUser SET email='$email' WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            $_SESSION["shopEmail"] = $email;
            header("Location: index.php");
        }
    }   
    elseif ($_POST["itemId"]==4) {
        $phone=$_POST['phone'];
        $query = "UPDATE shopUser SET phone='$phone' WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            $_SESSION["shopPhone"] = $phone;
            header("Location: index.php");
        }
    }
    elseif ($_POST["itemId"]==6) {
        $address=$_POST['address'];
        $zip=$_POST['zip'];
        $city=$_POST['city'];
        $query = "UPDATE shopUser SET address='$address', zip = '$zip',city = '$city'  WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            header("Location: index.php");
        }
    }
    elseif ($_POST["itemId"]==7) {
        $discount=$_POST['discount'];
        $query = "UPDATE shopUser SET discount='$discount' WHERE id='$ID'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        if($result){
            header("Location: index.php");
        }
    }    
    elseif ($_POST["itemId"]==5) {
            $target_dir = "shopimage/";
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
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $query = "UPDATE shopUser SET avatar='$file_name' WHERE id='$ID'";
                    $result = mysqli_query($conn,$query) or die(mysql_error());
                    if($result){
                        header("Location: index.php");
                    }
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
           }       
}

?>