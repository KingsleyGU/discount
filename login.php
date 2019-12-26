<?php
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
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = stripslashes($_POST['email']);
  $password = stripslashes($_POST['password']);
  $query = "SELECT * FROM `user` WHERE email='$email'and password='".md5($password."coolpang34")."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $userRecord = mysqli_fetch_object($result);

    $_SESSION["name"] = $userRecord->name;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $userRecord->phone;
    $_SESSION["userId"] = $userRecord->id;
    header("Location: index.php");    
   }
  else{
    $errorMessage = "User name or password is not correct";
  }
}
?>
<?php include 'user/header.php';?>  
          <section id="login" class="masthead">
            <div class="container login-container" style="padding: 30px 0px;">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center"><?php echo $titleArray['login'];?></h2>
                  
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm" style="padding-top:0px;">
                      <div class="error-messgae"><?php echo $errorMessage;?></div>
                      <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter email">
                        <input class="input100" value="<?php echo $email;?>" type="email" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                        <span class="focus-input100" data-placeholder="Email"></span>
                      </div>

                      <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input value="<?php echo $password;?>" type="password" name="password" id="password" class="input100"/>
                        <span class="focus-input100" data-placeholder="Password"></span>
                      </div>   

                      <input type="submit" value="提交" class="login100-form-btn" />
                      <div class="p-t-50">
                          <span class="txt1">
                            Don’t have an account?
                          </span>

                          <a href="register.php" class="txt2">
                            Sign up
                          </a>
                      </div>
                  </form>

                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>
