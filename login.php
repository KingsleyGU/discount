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
    if(!empty($_SESSION['current_page'])){
      header("Location: ".$_SESSION['current_page']);
    }
    else{
      header("Location: index.php");  
    }    
   }
  else{
    $errorMessage = "User name or password is not correct";
  }
}
?>
<?php include 'user/header.php';?>  
          <section id="login" class="masthead">
            <div class="container login-container">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center"><?php echo $titleArray['login'];?></h2>
                  
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm" style="padding-top:0px;">
                      <div class="error-messgae"><?php echo $errorMessage;?></div>
                      <div class="wrap-input100 validate-input m-b-30" data-validate = "Enter email">
                        <input class="input100" value="<?php echo $email;?>" type="email" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                        <span class="focus-input100" data-placeholder="Email:*"></span>
                      </div>

                      <div class="wrap-input100 validate-input m-b-30" data-validate="Enter password">
                        <input value="<?php echo $password;?>" type="password" name="password" id="password" class="input100"/>
                        <span class="focus-input100" data-placeholder="<?php echo $titleArray['password'];?>:*"></span>
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
                          <a href="forgetpassword.php" class="txt2">
                            <?php echo $titleArray['forget_password'];?>
                          </a>
                      </div>
                  </form>

                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>
