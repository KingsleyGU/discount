<?php include 'user/header.php';?>
<?php
  require("dbconnection.php");
  $category = 1;
  $shopQuery = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.category='$category'";
  echo $shopQuery;
  $shopResult = mysqli_query($conn,$shopQuery) or die(mysql_error());
  

?>

  <!-- Masthead -->
  <header class="masthead" id="banner" style="">

        <div class="container inner">
          <h1>酷胖: <span>哥本哈根终极打折coupon<br />
          欢迎你来领取</span></h1>
        </div>
  </header>
  <!-- Portfolio Section -->

<?php include 'shopitem.php';?>


  <!-- Contact Section -->
  <section class="page-section" id="contact" style="display:none;">
        <div class="container inner">
          <header>
            <h2>Get in Touch</h2>
          </header>
          <form method="post" action="#">
          <div class="row">
            <div class="col-md-6 col-lg-6 ">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" />
            </div>
            <div class="col-md-6 col-lg-6">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" />
            </div>
            </div>
            <div class="field">
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="6"></textarea>
            </div>
            <input type="submit" value="Send Message" class="alt discount-btn red-btn message-btn" />
          </form>
        </div>
  </section>

  <!-- Footer -->




<?php include 'user/footer.php';?>



