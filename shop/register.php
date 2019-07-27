<?php
session_start();
require("../dbconnection.php");
$errorMessage = "";
$name = "";
$email = "";
$phone = "";
$password = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = stripslashes($_POST['name']);
$email = stripslashes($_POST['email']);
$phone = stripslashes($_POST['phone']);
$password = stripslashes($_POST['password']);
$category = stripslashes($_POST['category']);
$query = "SELECT * FROM `shopUser` WHERE email='$email' or phone='$phone'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$errorMessage = "This phone or email has already been used";
}
else{
$trn_date = date("Y-m-d H:i:s");
$query = "INSERT into `shopUser` (name, email, phone, password, createdDate,category,description,avatar,address,zip,city)
VALUES ('$name', '$email', '$phone', '".md5($password."coolpang45")."', '$trn_date',$category,null,null,null,null,null)";
$result = mysqli_query($conn,$query);
if($result){
    $_SESSION["shopName"] = $name;
    $_SESSION["shopEmail"] = $email;
    $_SESSION["shopPhone"] = $phone;
    $_SESSION["shopId"] = mysqli_insert_id($conn);
    header("Location: index.php");
}
else
{
  echo mysqli_error($conn);
}
}
}
?>
<?php include 'header.php';?>   
          <section id="register" class="masthead">
            <div class="container login-container" style="padding: 30px 0px;">
              <div class="row justify-content-center" style="width:100%;">
                <div class="col-lg-8 wrap-login">
                  <!-- Portfolio Modal - Title -->
                  <h2 class="text-secondary text-uppercase mb-0 text-center">商店注册</h2>
                  <div class="error-messgae"><?php echo $errorMessage;?></div>
                  <!-- Icon Divider -->
                  <form method="post" action="#" id="loginForm">
                    <div class="form-control-group">
                      <label for="name">店铺名称</label>
                      <input value="<?php echo $name;?>" type="text" name="name" id="name" class="form-control" required/>
                    </div>
                     <div class="form-control-group">
                        <label for="category">店铺类型</label>
                        <select class="form-control" id="category" name="category">
                          <option value="1">中餐馆</option>
                          <option value="2">寿司店</option>
                          <option value="3">丹麦店铺</option>
                        </select>
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



<?php include 'footer.php';?>


