<?php include 'user/header.php';?>
<?php
  require("dbconnection.php");
  $category = 1;
  $shopQuery = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.category='$category'";
  $shopResult = mysqli_query($conn,$shopQuery);
?>

  <!-- Masthead -->
  <header class="masthead" id="banner" style="">

        <div class="container inner">
          <h1>酷胖: <span>哥本哈根终极打折coupon<br />
          欢迎你来领取</span></h1>
        </div>
       <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
        </ul>
  </header>
  <!-- Portfolio Section -->

<?php include 'shopitem.php';?>





<?php include 'user/footer.php';?>



