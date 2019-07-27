<?php include 'user/header.php';?>
<?php
require("dbconnection.php");
$category = 3;
$shopQuery = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.category='$category'";
$shopResult = mysqli_query($conn,$shopQuery) or die(mysql_error());
?>
<section id="intro" class="masthead">
<div class="container inner">
  <header>
    <h2>酷胖</h2>
  </header>
  <p>为了方便在丹麦居住和旅游的华人，我们搜集了哥哈各个餐馆以及商铺的打折信息，以便大家买买买，吃吃吃</p>

</div>
</section>

<?php include 'shopitem.php';?>

<?php include 'user/footer.php';?>