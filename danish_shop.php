<?php
session_start();
require("dbconnection.php");
$category = 3;
$shopQuery = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.category='$category'";
$shopResult = mysqli_query($conn,$shopQuery) or die(mysql_error());
?>
<?php include 'user/header.php';?>
<section id="intro" class="masthead">
<div class="container inner">
  <header>
    <h2><?php echo $titleArray['coolpanda'];?></h2>
  </header>
  <p><?php echo $titleArray['info'];?></p>

</div>
</section>

<?php include 'shopitem.php';?>

<?php include 'user/footer.php';?>