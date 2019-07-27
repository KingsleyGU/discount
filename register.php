<?php
session_start();
require("dbconnection.php");
$errorMessage = "";
$name = "";
$email = "";
$phone = "";
$password = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = stripslashes($_POST['name']);
  $email = stripslashes($_POST['email']);
  $phone = stripslashes($_POST['phone']);
  $password = stripslashes($_POST['password']);

  $query = "SELECT * FROM `user` WHERE email='$email' or phone='$phone'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
        $errorMessage = "This phone or email has already been used";
   }
  else{
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `user` (name, email, phone, password, createdDate)
      VALUES ('$name', '$email', '$phone', '".md5($password."coolpang34")."', '$trn_date')";
     $result = mysqli_query($conn,$query);
      if($result){
            $_SESSION["name"] = $name;
            $_SESSION["email"] = $email;
            $_SESSION["phone"] = $phone;
            $_SESSION["userId"] = mysqli_insert_id($conn);
            header("Location: index.php");
        }
  }
}
?>
<?php include 'user/header.php';?>   
          <section id="register" class="masthead">
            <div class="container login-container" style="padding: 30px 0px;">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center">注册</h2>
                  <div class="error-messgae"><?php echo $errorMessage;?></div>
                  <!-- Icon Divider -->
                  <form method="post" action="register.php" id="loginForm">
                    <div class="form-control-group">
                      <label for="name">名字</label>
                      <input value="<?php echo $name;?>" type="text" name="name" id="name" class="form-control" required/>
                    </div>
                    <div class="form-control-group">
                      <label for="email">邮箱</label>
                      <input value="<?php echo $email;?>" type="email" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                      <div class="help-block with-errors"></div>
                    </div>
                     <div class="form-control-group">
                      <label for="phone">电话</label>
                      <input value="<?php echo $phone;?>" pattern="^[0-9]{1,}$" maxlength="15" type="text" name="phone" id="phone" class="form-control"/>
                    </div>                    
                    <div class="form-control-group">
                      <label for="password">密码</label>
                      <input value="<?php echo $password;?>" type="password" name="password" id="password" class="form-control" required/>
                    </div>                                    
                    <input type="submit" value="提交" class="alt discount-btn red-btn message-btn" />
                  </form>
                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>


