<?php
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
$categoryId = "";
if(!empty($_GET['categoryId']))
{
	$categoryId = $_GET['categoryId'];
}
?>
<style type="text/css">

</style>
<?php include 'user/header.php';?>

  <header class="masthead" style="">
  <div class="text-center" style="padding:20px 0px;">
  	<a class="btn <?php if(!empty($_GET['categoryId'])&&$_GET['categoryId']==2) echo "btn-light"; else echo "btn-primary"; ?> waves-effect waves-light" href="shares.php?categoryId=1" style="margin-right: 30px;"><?php echo $titleArray['latest'];?></a>
  	<a class="btn <?php if(!empty($_GET['categoryId'])&&$_GET['categoryId']==2) echo "btn-primary"; else echo "btn-light"; ?> waves-effect waves-light" href="shares.php?categoryId=2"><?php echo $titleArray['hottest'];?></a>
  </div>
  <?php include 'user/share_template.php';?>
  </header>




<?php include 'user/footer.php';?>

<script type="text/javascript">
loadShares("api/getShareList.php?categoryId=<?php echo $categoryId;?>");
</script>