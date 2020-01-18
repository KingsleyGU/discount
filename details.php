<?php 
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
require("api/getShop.php");
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

                            <div class="col-lg-5 col-md-6 col-12" style="text-align: left;">
                                <h2><?php 
                                  $shopName = $shopRecord->name_UK;
                                  if($lang=="cn"){
                                    $shopName =  $shopRecord->name;
                                  }
                                  echo $shopName;
                                  $shopId = $shopRecord->id;
                                ?></h2>
                                <?php include 'user/tag_template.php';?>                                
                                <div class="shop-phone shop-contact-info">
                                    <i class="fas fa-phone shop-profile-icon"></i><?php echo $shopRecord->phone;?>
                                </div>
                                <div class="shop-email shop-contact-info">
                                    <i class="fa fa-globe shop-profile-icon" aria-hidden="true"></i><a href="http://<?php echo $shopRecord->website;?>" style="text-decoration: underline; color: #000;"><?php echo $shopRecord->website;?></a>
                                </div>
                                <div class="shop-location shop-contact-info">
                                    <i class="fa fa-map-marker-alt shop-profile-icon" aria-hidden="true"></i><?php echo $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; ?>
                                </div> 
                                <div class="shop-location shop-contact-info">
<!--                                     <i class="fa fa-dollar-sign shop-profile-icon" aria-hidden="true"></i> -->                                     <b><?php echo $titleArray['exchange'];?></b>:
                                        <?php 
                                        echo $shopRecord->firstNum." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$shopRecord->firstDiscount."%";
                                        if(!empty($shopRecord->secondDiscount)){
                                          echo "&nbsp;&nbsp;&nbsp;".$shopRecord->secondNum." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$shopRecord->secondDiscount."%";
                                        }
                                     ?>
                                </div>                                 
                                <div class="follower-block-item">
                                  <span class="follower-block-head"><i class="fas fa-heart shop-profile-icon"></i></span>
                                  <span class="follower-block-content follower-block-like"><?php echo $shopRecord->userLikesNum;?></span>
                                 <span class="follower-block-head"><i class="fas fa-user-friends shop-profile-icon"></i></span>
                                  <span class="follower-block-content follower-block-like"><?php echo $shopRecord->shareCount;?></span>
                                </div>  <br/>
                                <div>
                                  <?php
                                      if(isset($_SESSION["userId"]))
                                      {
                                        $userId = $_SESSION["userId"];
                                    ?>
                                        
                                      <span class="like-image unfollow-image" data-toggle="modal" data-target="#share-popup"><?php echo $titleArray['go_collect'];?>&nbsp;<i class="fas fa-heart fa-lg"></i></span>
                                    <?php
                                         
                                      }
                                      else{
                                    ?>
                                    <a href="login.php"> 
                                    <span class="like-image unfollow-image"><?php echo $titleArray['go_collect'];?>&nbsp;<i class="fas fa-heart fa-lg"></i></span></a>
                                    <?php
                                      }
                                    ?> 
                                  </div>                     
                            </div>                
                        </div>
                    </div>                    
                </div>
            </div>
          </div>
        </div>

  </header>


        <div class="portfolio-modal modal fade" id="share-popup" tabindex="-1" role="dialog" aria-labelledby="portfolioModal<?php echo $itemRow;?>Label" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
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
                    <h3 class="portfolio-modal-title mb-0"><?php echo $titleArray['share_content'];?></h3>
                      <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                          <i class="fas fa-fish"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                      </div>
                      <!-- Portfolio Modal - Image -->
                      <img class="img-fluid rounded mb-5" src="<?php echo "./shop/shopimage/".$avatar;?>" alt="">                        
                    <form class="share-form" method="post" action="api/createShares.php" enctype="multipart/form-data" >
                      <div class="wrap-input100 validate-input m-b-50" data-validate = "Enter title">
                        <label for="description"><?php echo $titleArray['title'];?>:</label>
                        <input class="input100" value="Awesome!!! <?php echo $shopName;?>" type="text" name="title"  required/>
                      </div>
                      <div class="wrap-input100 validate-input m-b-30" >
                      <label for="fileToUpload"><?php echo $titleArray['image'];?>:</label>
                      <input class="input100" type="file" name="fileToUpload" id="fileToUpload" />
                      </div>
                      <input type="hidden" name="shopId" value="<?php echo $shopRecord->id;?>">
                      <input type="hidden" name="userId" value="<?php echo $userId;?>">
                      <input type="hidden" name="itemId" value="0">
                      <div class="field">
                        <label for="description"><?php echo $titleArray['description'];?>:</label>
                        <textarea name="description" id="description" rows="6"><?php echo $titleArray['default_description'];?></textarea>
                      </div>
                          <input type="submit" class="login100-form-btn m-t-20" value="<?php echo $titleArray['generate'];?>">
                    </form>
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


 <?php include 'user/shopItems.php';?>  

  <section class="page-section" style="padding-top: 50px;">
    <?php include 'user/share_template.php';?>  
  </section>


<?php include 'user/footer.php';?>
<script type="text/javascript">
loadShares("api/getShareList.php?shopId=<?php echo $_GET['shopId'];?>");
loadShopItems("api/getShopItems.php?shopId=<?php echo $shopId;?>");
</script>