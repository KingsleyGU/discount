<?php
session_start();
require("dbconnection.php");
if(!isset($_SESSION["name"]))
{
  header("Location: login.php");
}
$category = 2;
$shopQuery = "select * from shopUser where category='$category'";
$shopResult = mysqli_query($conn,$shopQuery) or die(mysql_error());
?>
<?php include 'user/header.php';?>

<?php include 'shopitem.php';?>

<?php include 'user/footer.php';?>