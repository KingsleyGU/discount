<?php
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
require("api/getShare.php");
?>
<?php include 'user/header.php';?>
<?php 
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

  if($lang=="cn"){
    $shopName = $share['shopName'];
  }
  else{
    $shopName = $share['shopName_UK'];
  }
  
  $shopId = $share['shopId'];
  $userId = "";
  if(!empty($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
  }
?>
              <div class="portfolio-modal modal fade" id="share-modal" tabindex="-1" role="dialog"  aria-hidden="true">
              <div class="modal-dialog modal-xl text-center" role="document">
                <div class="modal-content">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="fas fa-times"></i>
                    </span>
                  </button>
                  <div class="modal-body text-center">
                    <div class="container">
                      <div class="row justify-content-center">
                        <div class="col-lg-8">
                           <p class="text-left" style="font-weight: bold; width: 100%;"><?php echo $titleArray['method'];?> 1: <?php echo $titleArray['scan_qr_code'];?></p>
                          <div class="text-center" style="width:100%; padding: 20px 0px 40px 0px;">
                            <div id="myQRCode"></div>
                          </div>  
                           <p class="text-left" style="font-weight: bold; width: 100%; display: none;"><?php echo $titleArray['method'];?> 2: <?php echo $titleArray['copy_url'];?></p>
                            <input type="text" value="https://coolpanda.dk/share.php?shareId=<?php echo $_GET['shareId'];?>" id="copyInp" style="position:absolute;left:-1000px;top:-1000px;">
                            <p class="text-center" style="margin-bottom:10px;">
                            <a onclick="copyFunc()" class="like-image" style="color:#fff; display: none;">
                               <?php echo $titleArray['click_to_copy'];?>
                            </a>     
                            </p>
                          <div class="input-group md-form form-sm form-2 pl-0 ">
                            <p class="text-left" style="font-weight: bold; width: 100%;"><?php echo $titleArray['method'];?> 2: <?php echo $titleArray['share_notice'];?></p>

                          </div>  
                          <div class="text-center" style="width:100%; padding: 20px 0px 40px 0px;">
                            <img src="img/share_chrome_uk.jpeg" style="max-width: 100%;"/>
                          </div>  
                          <div class=" text-center" style="width:100%; padding: 20px 0px;">
                            <img src="img/share_ios_uk.jpeg" style="max-width: 100%;"/>
                          </div>              
                          <!-- Portfolio Modal - Title -->
                          
                          <!-- Icon Divider -->
         
                          <button class="btn btn-primary" href="#" data-dismiss="modal">
                            <i class="fas fa-times fa-fw"></i>
                            <?php echo $titleArray['close_window'];?>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <div class="portfolio-modal modal fade" id="donate-modal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
              <i class="fas fa-times"></i>
            </span>
          </button>
          <div class="modal-body text-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                <h3 class="portfolio-modal-title mb-0">Remaining Likes</h3>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                      <i class="fas fa-fish"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                  </div>

                  <p style="font-weight: bold; width: 100%;"><?php echo $titleArray['danate_notice'];?> <?php echo $share['spare_likes'];?> <i class='fas fa-heart text-danger'></i></p>
                  <form class="share-form" method="post" action="api/createMultipleLikes.php"  > 
                    <input type="hidden" name="userId" value="<?php echo $userId;?>">
                    <input type="hidden" name="shareId" value="<?php echo $_GET['shareId'];?>">
                      <div class="wrap-input100 validate-input m-b-30" data-validate="Enter like number">
                          <input name="likeNum" class="input100" type="number" min="1" max="<?php echo $share['spare_likes'];?>" required/>
                        <span class="focus-input100" data-placeholder="How many likes:*"></span>
                      </div> 
                    <input type="submit" class="login100-form-btn m-t-20" value="<?php echo $titleArray['continue'];?>">
                  </form>             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <section class="masthead share-section page-section" id="about">
        <div class="container">
        	<h1 class="text-center share-head"><?php echo $titleArray['like_my_post']." ";?><?php
          echo $shopName;?>!!!</h1>
          <div class="row">
            
            <div class="author text-center col-lg-6 d-flex align-items-center" style="width:100%; margin: 20px auto;">
                <div class="ml-3 share-author-info text-center" style="width:100%;">
                    <p style="width:100%"><a href="#reserve" class="like-btn" onclick="like(this,event,<?php echo $_GET['shareId'];?>)"><i class="far fa-heart fa-2x like-heart"></i></a> </p>
                     <?php 
                      $likeNumInt = (int) $share['userLikesNum'];
                      $firstNum = (int) $share['firstNum'];
                      if($likeNumInt>0)
                    {?>
                      <p class="text-center" style="font-size: 15px; margin-bottom: 0px;"><span class="current-user"></span>                      
                        <span class="other-users"><span class="other-num"> <?php echo $likeNumInt; ?></span><?php if($lang=="cn"){echo "个";} ?><img src="img/like.svg" style="height:30px;" ><span class="include-you" style="display: none;">(<?php echo $titleArray['include_you'];?>)</span><?php echo $titleArray['already_liked'];?> </span>
                      </p>
                      <?php }?>  
                </div>
            </div>
               <div class="text-center" style="width:100%; margin: 20px;">
                  <p class="text-center" style="font-weight: bold; margin-bottom: 0px; ">
                    <span class="like-image unfollow-image" data-toggle="modal" data-target="#share-modal" style="margin-top:0px;"><i class="fas fa-share-square"></i></span>
                    <?php if(isCurrentUser($share['userId'])&&(((int) $share['spare_likes'])>0)) { ?>
                    <span class="like-image unfollow-image" data-toggle="modal" data-target="#donate-modal" style="margin-top:0px;">Donate <i class='far fa-heart'></i></span>
                    <?php }?>
                  </p>
                </div>
                <?php if(isCurrentUser($share['userId'])) {
                  if($likeNumInt>=$firstNum){
                  ?>
                <div class="text-center" style="width:100%;">
                    <?php 
                      $discount = $share['firstDiscount'];
                      if($likeNumInt>=$share['secondNum'])
                      {
                        $discount = $share['secondDiscount'];
                      }
                    if(empty($share['couponId'])){
                      ?>
                      <form method="post" action="api/createCoupon.php" style="padding-top: 0px; padding-bottom: 10px;">
                        <input type="hidden" name="shopId" value="<?php echo $share['shopId'];?>">
                        <input type="hidden" name="userId" value="<?php echo $share['userId'];?>">
                        <input type="hidden" name="shareId" value="<?php echo $share['id'];?>">
                        <input type="hidden" name="discount" value="<?php echo $discount;?>">
                        <button type="submit" class="use-coupon-block coupon-button-block" ><i class='fa fa-file-invoice-dollar'></i>&nbsp;<?php echo $titleArray['view_coupon'];?></button>
                      </form>
                    <?php } else{ ?>
                      <a href="coupon.php?couponId=<?php echo $share['couponId'];?>" class="use-coupon-block coupon-button-block" style="display: inline-block; margin: 0 auto;"><i class='fa fa-file-invoice-dollar'></i>&nbsp;<?php echo $titleArray['view_coupon'];?></a>
                    <?php  } ?>
                </div>
                <?php } else{ ?>
                  <p class="text-center" style="width: 100%;font-weight: bold;"><?php echo $titleArray['view_coupon_appear'];?> </p>
               <?php }
                }
                ?> 
                <div class="col-lg-6 col-md-12 ml-2">              
          					<div class="author  mt-4 mb-4 d-flex align-items-center">
          					    <a href="profile.php?userId=<?php echo $share['userId'];?>" target="_blank"><img class="share-profile-image" src="<?php echo $userAvatar;?>"> </a>
          					    <div class="ml-3 share-author-info">
          					        <a class="author-name" href="profile.php?userId=<?php echo $share['userId'];?>" target="_blank"><?php echo $share['userName'];?></a>
          					        <div><span class="text-muted"><?php echo $titleArray['post_by'];?>,<?php echo time_elapsed_string($share['created_time']);?></span></div>
          					    </div>
          					</div>
                    <div class="about-text">                 
                      <h2 class="heading"><?php echo $share['title'];?></h2>
                       <div class="shop-location shop-contact-info">
                          <b><?php echo $titleArray['exchange'];?></b>:<?php 
                              echo $share['firstNum']." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$share['firstDiscount']."%";
                              if(!empty($share['secondDiscount'])){
                                echo "&nbsp;&nbsp;&nbsp;".$share['secondNum']." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$share['secondDiscount']."%";
                              }
                           ?>
                      </div>   
                      <p><?php echo $share['description'];?></p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-md-offset-1 share-image-block mt-2" style="background-image: url('<?php echo $shareImage;?>'); border: 15px solid #fff;">
                    <div class="">
                      
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
<script src="vendor/jquery/jquery-qrcode.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {
    var url = 'https://coolpanda.dk/shareClick.php?shareId='+"<?php echo $_GET['shareId'];?>"
      $("#myQRCode").qrcode({ 
          size: 120,
          fill: '#212121',
          text: url,
          mode: 3,
          label: '<?php echo $shopName?>',
          fontcolor: '#e41b17',
          image: "img/china.png"
       });
  	var userProfile = getUserProfile();
        $.post( "api/validateUserLike.php", { shareId: <?php echo $_GET['shareId'];?>, userProfile: userProfile})
      .done(function(data){ 
      	if(data=="true")
      	{
      		$(".like-btn").addClass("isDisabled");
      		 $(".like-btn").find('.fa-heart').removeClass("far");
           $(".like-btn").find('.fa-heart').removeClass("like-heart");
      		 $(".like-btn").find('.fa-heart').addClass("fa");
      		 var likeNum = "<?php echo $likeNumInt;?>";
      		 $(".include-you").show();
      	}   
      }) 	
});
 function like(selector,e,shareId) {
      e.preventDefault();
      var userProfile = getUserProfile();
      var userId = "<?php echo $userId; ?>";
      var ownerId = "<?php echo $share['userId']; ?>";
      if(userId==ownerId)
      {
        userId="";
      }
      $.post( "api/createLike.php", { shareId: shareId, userProfile: userProfile, userId : userId})
      .done(function(){  
      	location.reload();    
      })  
    };	
loadShopItems("api/getShopItems.php?shopId=<?php echo $shopId;?>");
function copyFunc() {
  var copyText = document.getElementById("copyInp");
  copyText.select();
  document.execCommand("copy"); //this function copies the text of the input with ID "copyInp"
  alert("URL copied");
}
</script>


