<?php 
session_start();
require("api/dbconnection.php");
require("api/getShopItems.php");
$shopId = $_GET["shopId"];
$query = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.id='$shopId'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$shopRecord = mysqli_fetch_object($result);  
$location = $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; 
$category = $shopRecord->category;
}
?>  
<?php  include 'user/header.php';?> 
  <header class="masthead text-center" style="color:#000;">
    <div class="container profile-page">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile-header">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-12">
                                <?php 
                                $avatar = $shopRecord->avatar;
                                if(is_null($avatar))
                                {
                                  $avatar = "panda.png";
                                }
                                ?>
                                <div class="profile-image float-md-right"> <img src="./shop/shopimage/<?php echo $avatar;?>" alt="" style="max-width: 100%;" class="img-thumbnail"> 
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-7 col-12" style="text-align: left;">
                                <h2><?php 
                                  if($lang=="cn"){
                                    echo $shopRecord->name;
                                  }
                                  else{
                                    echo $shopRecord->name_UK;
                                  }
                                ?></h2>
                                <?php include 'user/tag_template.php';?>                                
                                <div class="shop-phone shop-contact-info">
                                    <i class="fas fa-phone shop-profile-icon"></i><?php echo $shopRecord->phone;?>
                                </div>
                                <div class="shop-email shop-contact-info">
                                    <i class="fa fa-envelope shop-profile-icon" aria-hidden="true"></i><?php echo $shopRecord->email;?>
                                </div>
                                <div class="shop-location shop-contact-info">
                                    <i class="fa fa-map-marker-alt shop-profile-icon" aria-hidden="true"></i><?php echo $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; ;?>
                                </div> 
                                
                                <div class="follower-block-item">
                                  <span class="follower-block-head"><i class="fas fa-heart shop-profile-icon"></i></span>
                                  <span class="follower-block-content follower-block-like"><?php echo $shopRecord->subNum;?></span>
                                </div>   
                                <p><?php 
                                    if($lang=="cn"){
                                      echo $shopRecord->description;
                                    }
                                    else{
                                      echo $shopRecord->description_UK;
                                    }
                                ?></p>                         
                            </div>                
                        </div>
                    </div>                    
                </div>
            </div>
          </div>
        </div>

  </header>


<?php include 'user/shopItems.php';?>   




<?php include 'user/footer.php';?>