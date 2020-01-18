<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require("api/dbconnection.php");
$errorMessage = "";
$name = "";
$email = "";
$phone = "";
$password = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = mysqli_real_escape_string($conn,stripslashes($_POST['name']));
  $email = mysqli_real_escape_string($conn,stripslashes($_POST['email']));
  $phone = mysqli_real_escape_string($conn,stripslashes($_POST['phone']));
  $password = mysqli_real_escape_string($conn,stripslashes($_POST['password']));

  $query = "SELECT * FROM `user` WHERE email='$email' ";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
        $errorMessage = "This email has already been used";
   }
  else{
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `user` (name, email, phone, password, createdDate,avatar)
      VALUES ('$name', '$email', '$phone', '".md5($password."coolpang34")."', '$trn_date',null)";
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
            <div class="container login-container">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center"><?php echo $titleArray['register'];?></h2>
                  <div class="error-messgae"><?php echo $errorMessage;?></div>
                  <!-- Icon Divider -->
                  <form method="post" action="register.php" id="loginForm">
                    <div class="wrap-input100 validate-input m-b-30" data-validate = "Enter name">
                      <input class="input100" value="<?php echo $name;?>" type="text" name="name" id="name"  required/>
                      <span class="focus-input100" data-placeholder="<?php echo $titleArray['name'];?>:*"></span>

                    </div>
                      <div class="wrap-input100 validate-input m-b-30" data-validate = "Enter email">
                        <input class="input100" value="<?php echo $email;?>" type="email" name="email" id="email" data-error="Bruh, that email address is invalid" required/>
                        <span class="focus-input100" data-placeholder="Email:*"></span>
                      </div>
                     <div class="wrap-input100 validate-input m-b-30" data-validate = "Enter phone">
                      <input class="input100" value="<?php echo $phone;?>" pattern="^[0-9]{1,}$" maxlength="15" type="text" name="phone" id="phone" />
                      <span class="focus-input100" data-placeholder="<?php echo $titleArray['phone'];?>"></span>
                    </div>  

                      <div class="wrap-input100 validate-input m-b-30" data-validate="Enter password">
                        <input value="<?php echo $password;?>" type="password" name="password" id="password" class="input100" required/>
                        <span class="focus-input100" data-placeholder="<?php echo $titleArray['password'];?>:*"></span>
                      </div>  

                      <input type="submit" value="<?php echo $titleArray['submit'];?>" class="login100-form-btn" />
                      <div class="p-t-50">
                          <span class="txt1">
                            <?php echo $titleArray['already_have_account'];?>
                          </span>

                          <a href="login.php" class="txt2">
                            <?php echo $titleArray['login'];?>
                          </a>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </section>



<?php include 'user/footer.php';?>


