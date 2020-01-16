<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['shopName']))
{
  unset($_SESSION['shopName']); 
  unset($_SESSION['shopEmail']); 
  unset($_SESSION['shopPhone']); 
  unset($_SESSION['shopId']); 
}
?>
<?php
require("../api/dbconnection.php");
$errorMessage = "";
$email = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = stripslashes($_POST['email']);
  $password = stripslashes($_POST['password']);
  if($email=="gumin@coolpanda.dk"&&md5($password."coolpang45")=='55eefcd7a73d06b1490cbcb99d215379')
  {
    $_SESSION["shopName"] = "admin";
    $_SESSION["shopEmail"] = $email;
    header("Location: admin.php");  
  }
  else
  {
    $query = "SELECT * FROM `shopUser` WHERE email='$email'and password='".md5($password."coolpang45")."'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
      $userRecord = mysqli_fetch_object($result);
      $_SESSION["shopName"] = $userRecord->name;
      $_SESSION["shopEmail"] = $email;
      $_SESSION["shopPhone"] = $userRecord->phone;
      $_SESSION["shopId"] = $userRecord->id;
      header("Location: index.php?shopId=".$_SESSION["shopId"]);         
     }
    else{
      $errorMessage = "User name or password is not correct";
    }  
  }

}
?>
<?php include 'header.php';?>   
          <section id="login" class="masthead">
            <div class="container login-container" style="padding: 30px 0px;">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center">商店登录</h2>
                  <div class="error-messgae"><?php echo $errorMessage;?></div>
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm">

                    <div class="form-control-group">
                      <label for="email">邮箱</label>
                      <input value="<?php echo $email;?>" type="email" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-control-group">
                      <label for="password">密码</label>
                      <input value="<?php echo $password;?>" type="password" name="password" id="password" class="form-control"/>
                    </div>                                    
                    <input type="submit" value="提交" class="alt discount-btn red-btn message-btn" />
                  </form>
                </div>
              </div>
            </div>
          </section>



<?php include 'footer.php';?>
