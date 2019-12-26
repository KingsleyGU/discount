<?php
session_start();
require("api/getShare.php");
require("api/getLikes.php");
?>
<style type="text/css">
	.share-image-block {
    width: 100%;
    background: url(img/food_intro.jpg);
    background-size: cover;
    min-height: 300px;
}
.share-profile-image{
   width: 80px;
    display: block;
    background-size: cover;
}
.author-name{
    font-weight: 600;
    color: #000000;
    text-decoration: underline;
}
.share-author-info{
	font-size: 20px;
	font-family: "Poppins", Arial, sans-serif;
}
a.like-btn {
	display: inline-block;
    background-color: transparent;
    color: #da452d;
    margin: 20px 0px;
    border-radius: 50px;
}
a.like-btn:hover{
	color: #f00;
}
.share-head{
	font-family: 'Kaushan Script', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  text-decoration: none;
  pointer-events: none;
}
</style>
<?php include 'user/header.php';?>
<?php 
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
	$shareImage = "img/shares/".$share['img_url'];
	if(empty($share['img_url']))
	{
		if($share['itemId']=="0"){
			$shareImage = "shop/shopimage/".$share['shopAvatar'];
		}
		else{
			$shareImage = "shop/shop".$share['shopId']."/".$share['itemImage'];
		}
	}
	$userAvatar = "img/userAvatar/".$share['userAvatar'];
	if(empty($share['userAvatar']))
	{
		$userAvatar = "img/coolpanda.png";
	}
?>
  <section class="masthead share-section page-section" id="about">
        <div class="container">
        	<h1 class="text-center mb-4 share-head">Help me like my Post.</h1>
          <div class="row">
              	<div class="col-lg-5 col-md-12 col-md-offset-1 share-image-block" style="background-image: url(<?php echo $shareImage;?>); border: 15px solid #fff;">
                    <div class="">
                      
                    </div>
                  </img>
                </div>
                <div class="col-lg-5 col-md-12 ml-2">
                <img src="">
					<div class="author  mt-4 mb-4 d-flex align-items-center">
					    <a href="#" ><img class="share-profile-image" src="<?php echo $userAvatar;?>"> </a>
					    <div class="ml-3 share-author-info">
					        <span class="text-muted">Written by</span>
					        <div><a class="author-name" href="#"><?php echo $share['userName'];?></a>, <span><?php echo time_elapsed_string($share['created_time']);?></span></div>
					    </div>
					</div>
                    <div class="about-text">
                      <h2 class="heading"><?php echo $share['title'];?></h2>
                      <p><?php echo $share['description'];?></p>
                      <p class="text-center"><a href="#reserve" class="like-btn" onclick="like(this,event,<?php echo $_GET['shareId'];?>)"><i class="far fa-heart fa-3x"></i></a> </p>
                      <?php 
                      	$likeNumInt = (int) $likeNum['likeNum'];
                      	if($likeNumInt>0)
                  		{?>
	                      <p class="text-center"><span class="current-user"></span>	                     
		                      <span class="other-users"><span class="other-num"> <?php echo $likeNumInt; ?></span> other <img src="img/like.svg" style="height:30px;" > lovers</span>
	                      liked this posts.</p>
              			<?php }?>
                    </div>
                </div>

          </div>
        </div>
    </section>
<?php 
$_GET['shopId'] = $share['shopId'];

include 'user/shopItems.php';
?>   

<?php include 'user/footer.php';?>
<script src="js/md5.js"></script>
<script type="text/javascript">
function getUserProfile()
{
	    var OSName="Unknown OS"; 
	    if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows"; 
	    if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS"; 
	    if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX"; 
	    if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux"; 
	    var ipaddress="<?php echo $ipaddress;?>";
	    var userAgent = navigator.userAgent;
	    var userProfile = md5(OSName+userAgent+ipaddress);
	    return userProfile;	
}
$( document ).ready(function() {
  	var userProfile = getUserProfile();
        $.post( "api/validateUserLike.php", { shareId: <?php echo $_GET['shareId'];?>, userProfile: userProfile})
      .done(function(data){ 
      	if(data=="true")
      	{
      		$(".like-btn").addClass("isDisabled");
      		 $(".like-btn").find('.fa-heart').removeClass("far");
      		 $(".like-btn").find('.fa-heart').addClass("fa");
      		 var likeNum = "<?php echo $likeNumInt;?>";
      		 if(parseInt(likeNum)==1)
      		 {
      		 	$(".current-user").text("You ");
      		 	$(".other-users").text("");
      		 }
      		 else
      		 {
      		 	$(".current-user").text("You and ");
      		 	$(".other-num").text(parseInt(likeNum)-1);
      		 }
      	}   
      }) 	
});
 function like(selector,e,shareId) {
      e.preventDefault();
      var userProfile = getUserProfile();
      $.post( "api/createLike.php", { shareId: shareId, userProfile: userProfile})
      .done(function(){  
      	location.reload();    
      })  
    };	
</script>