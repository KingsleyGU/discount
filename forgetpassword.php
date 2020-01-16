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
$email = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = stripslashes($_POST['email']);
  $query = "SELECT * FROM `user` WHERE email='$email'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $userRecord = mysqli_fetch_object($result);
      $userId = $userRecord->id;
      $sender = 'coolpanda@coolpanda.dk';
      $recipient = $email;

      $subject = "coolpanda reset password link";
      $headers = 'From:' . $sender;
      $message = "https://coolpanda.dk/resetpassword.php?userId=".$userId."&tokenId=".md5("coolpang2020".$userId.date("Y-m-d"));

      

      if (mail($recipient, $subject, $message, $headers))
      {
          header("Location: notification.php?categoryId=1&mail=".$email); 
      }
      else
      {
          echo "Error: Message not accepted";
      }
       
   }
  else{
    $errorMessage = "Email not belong to any user.";
  }
}
?>
<?php include 'user/header.php';?>  
          <section id="login" class="masthead">
            <div class="container login-container">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center"><?php echo $titleArray['forget_password'];?></h2>
                  
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm" style="padding-top:0px;">
                      <div class="error-messgae"><?php echo $errorMessage;?></div>
                      <div class="wrap-input100 validate-input m-b-35" data-validate = "Enter email">
                        <input class="input100" value="<?php echo $email;?>" type="email" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                        <span class="focus-input100" data-placeholder="Email"></span>
                      </div>  

                      <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
                      <div class="p-t-40">
                          <span class="txt1">
                            <?php echo $titleArray['not_have_account'];?>
                          </span>

                          <a href="register.php" class="txt2">
                            <?php echo $titleArray['register'];?>
                          </a>
                      </div>
                      <div class="p-t-30">
                          <span class="txt1">
                            <?php echo $titleArray['already_have_account'];?>
                          </span>
                          <a href="forgetpassword.php" class="txt2">
                            <?php echo $titleArray['login'];?>
                          </a>
                      </div>
                  </form>

                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>
