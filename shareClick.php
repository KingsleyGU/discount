<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require("api/getShare.php");
?>

<?php include 'user/header.php';?>
<?php include 'user/footer.php';?>
<script src="js/md5.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
  	var userProfile = getUserProfile();
  	var shareId = "<?php echo $_GET['shareId'];?>";
    var url = "share.php?shareId=" + shareId;
        $.post( "api/validateUserLike.php", { shareId: "<?php echo $_GET['shareId'];?>", userProfile: userProfile})
      .done(function(data){ 
      	if(data=="false")
      	{
	      $.post( "api/createLike.php", { shareId: shareId, userProfile: userProfile})
	      .done(function(){  
          
          window.location.href = url;   
	      })
      	} 
        else{
        alert("You have already liked this share");  
        window.location.href = url;           
        }
  
      }) 	
});
</script>
