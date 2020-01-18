<?php
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
require("api/getShopList.php");
?>
<style type="text/css">
	.share-form label{
		text-align: left !important;
		font-weight: bold;
	}
</style>
<?php include 'user/header.php';?>
  <!-- Masthead -->
  <header class="masthead" id="banner" style="">

        <div class="container inner" style="padding:100px 0px;">
          <h1><?php echo $titleArray['desc_food'];?><br />
          <?php echo $titleArray['come_and_get'];?><a href="instruction.php" target=”_blank” style="text-decoration: underline; color: #fff;"> <?php echo $titleArray['learn_more'];?>. >></a></h1>
        <a href="shares.php" class="btn alt  about-btn"><?php echo $titleArray['latest_shares'];?></a>

        </div>
  </header>
  <!-- Portfolio Section -->

<?php include 'user/shops.php';?>




<?php include 'user/footer.php';?>



