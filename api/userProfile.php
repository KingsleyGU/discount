<?php
require("dbconnection.php");
require("common_functions.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = $_POST["userId"];
    if($_POST["fieldId"]==1)
    {
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $query = "UPDATE user SET name='$name' WHERE id='$userId'";
        $result = mysqli_query($conn,$query);
        if($result){
            $_SESSION["name"] = $name;
            header("Location: /profile.php?userId=".$userId);
        }
        else
        {
            echo mysqli_error($conn);
        }

    }
    elseif($_POST["fieldId"]==3)
    {
        $phone=mysqli_real_escape_string($conn,$_POST['phone']);
        $query = "UPDATE user SET phone='$phone' WHERE id='$userId'";
        $result = mysqli_query($conn,$query);
        if($result){
            $_SESSION["phone"] = $phone;
            header("Location: /profile.php?userId=".$userId);
        }
        else
        {
            echo mysqli_error($conn);
        }

    }
    elseif ($_POST["fieldId"]==5) {
            $target_dir = "../img/userAvatar/";
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
                    $query = "UPDATE user SET avatar='$file_name' WHERE id='$userId'";
                    $result = mysqli_query($conn,$query) ;
                    if($result){
                        correctImageOrientation($target_file);
                        $d=imagejpeg(imagecreatefromjpeg($target_file), $target_file, 75);
                        header("Location: /profile.php?userId=".$userId);
                    }
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    echo mysqli_error($conn);
                }
            }
           }       
}

?>