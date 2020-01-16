<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['name']))
{
  unset($_SESSION['name']); 
  unset($_SESSION['email']); 
  unset($_SESSION['phone']); 
  unset($_SESSION['userId']); 
}
?>
<?php
require("api/dbconnection.php");
$errorMessage = "";
$userId = $_GET['userId'];
$password = "";
$tokenId = $_GET['tokenId'];
if(empty($_GET['tokenId'])||$_GET['tokenId']!=md5("coolpang2020".$userId.date("Y-m-d")))
{
  $errorMessage="url is not valid or expired";
}else{
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = stripslashes($_POST['password']);
    $query = "update `user` set password='".md5($password."coolpang34")."'WHERE id='$userId'" ;
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $query = "SELECT * FROM `user` WHERE id='$userId'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
      $userRecord = mysqli_fetch_object($result);

      $_SESSION["name"] = $userRecord->name;
      $_SESSION["email"] = $userRecord->email;
      $_SESSION["phone"] = $userRecord->phone;
      $_SESSION["userId"] = $userRecord->id;
      header("Location: index.php");    
     }
    else{
      $errorMessage = "User name or password is not correct";
    }
  }
}


?>
<?php include 'user/header.php';?>  
          <section id="login" class="masthead">
            <div class="container login-container">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center"><?php echo $titleArray['reset_password'];?></h2>
                  
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm" style="padding-top:0px;">
                      <div class="error-messgae"><?php echo $errorMessage;?></div>

                      <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input value="<?php echo $password;?>" type="password" name="password" id="password" class="input100"/>
                        <span class="focus-input100" data-placeholder="<?php echo $titleArray['password'];?>"></span>
                      </div>   

                      <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
                  </form>

                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>
