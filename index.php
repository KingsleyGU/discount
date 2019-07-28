<?php
session_start();
require("dbconnection.php");
$category = 1;
$shopQuery = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.category='$category'";
$shopResult = mysqli_query($conn,$shopQuery);
?>
<?php include 'user/header.php';?>
  <!-- Masthead -->
  <header class="masthead" id="banner" style="">

        <div class="container inner">
          <h1><?php echo $titleArray['desc_food'];?><br />
          <?php echo $titleArray['come_and_get'];?></h1>
        </div>
  </header>
  <!-- Portfolio Section -->

<?php include 'shopitem.php';?>




<?php include 'user/footer.php';?>



