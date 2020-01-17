<?php
session_start();
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
  <header class="masthead" style="margin-top: 50px;">
  <div class="container inner text-center">
	<div class="wrap-input100 validate-input m-b-30" data-validate = "Enter email">
	  <input class="input100" value="<?php echo $_GET['shareId'];?>" type="text" class="form-control"  id="shareId"  required/>
	<span class="focus-input100" data-placeholder="ShareId"></span>
	</div>

  <p style="width:100%"><a href="#reserve" class="like-btn" onclick="like(this,event)"><i class="far fa-heart fa-2x like-heart"></i></a> </p>
  </div>
   
  </header>




<script src="js/md5.js"></script>
<?php include 'user/footer.php';?>
<script type="text/javascript">
	 function like(selector,e) {
	 	var shareId = $("#shareId").val();
      e.preventDefault();
      var today = new Date();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var userProfile = md5(getUserProfile()+time);
      $.post( "api/createLike.php", { shareId: shareId, userProfile: userProfile})
      .done(function(){  
      	location.reload();    
      })  
    };	
</script>