<?php 
session_start();
require("dbconnection.php");
$shopId = $_GET["shopId"];
$query = "select shopUser.*,(select count(*) from subscription where subscription.shopId = shopUser.id) as subNum,(select count(*) from comment where comment.shopId = shopUser.id) as commentNum from shopUser where shopUser.id='$shopId'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$shopRecord = mysqli_fetch_object($result);  
$location = $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; 
$category = $shopRecord->category;
}
$shopItemQuery = "select * from shopItem where shopId='$shopId'";
$shopItemResult = mysqli_query($conn,$shopItemQuery) or die(mysql_error());
$shopTagQuery = "select * from shopTags where shopId='$shopRecord->id'";
$shopTagResult = mysqli_query($conn,$shopTagQuery) or die(mysql_error());
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
                                <h2><?php echo $shopRecord->name;?></h2>
                                <div>
                                <?php
                                    while($shopTag = mysqli_fetch_object($shopTagResult)) { 
                                ?>
                                
                                    <span class="btn  alt  tag-button detail-tag-button">
                                    <?php 
                                    if($shopTag->tagCategory == 1){
                                      echo "川菜";
                                    }
                                    elseif ($shopTag->tagCategory == 2) {
                                      echo "粤菜";
                                    }
                                    elseif ($shopTag->tagCategory== 3) {
                                      echo "湘菜";
                                    } 
                                    elseif ($shopTag->tagCategory== 4) {
                                      echo "东北菜";
                                    }     
                                    ?>
                                    </span>
                                  <?php
                                    }
                                    ?>
                                </div>                                
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
                                  <span class="follower-block-head"><i class="fas fa-comments shop-profile-icon"></i></span>
                                  <span class="follower-block-content follower-block-comment"><?php echo $shopRecord->commentNum;?></span>
                                </div>
                                <div class="follower-block-item">
                                  <span class="follower-block-head"><i class="fas fa-heart shop-profile-icon"></i></span>
                                  <span class="follower-block-content follower-block-like"><?php echo $shopRecord->subNum;?></span>
                                </div>   
                                <p><?php echo $shopRecord->description;?></p>                         
                            </div>                
                        </div>
                    </div>                    
                </div>
            </div>
          </div>
        </div>

  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio" style="padding-bottom:150px; ">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php if($category==1){
          echo "推荐菜单";
      }
      else{
        echo "推荐商品";
      }
      ?></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <?php 
          while($shopItemRecord = mysqli_fetch_object($shopItemResult)) {      
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#itemModal<?php echo $shopItemRecord->id;?>">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            </div>
               <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo "shop/shop".$shopId."/".$shopItemRecord->img_url;?>)"></div>
 
            <div class="item-name" ><?php echo $shopItemRecord->name;?></div>
          </div>
        </div>

        <?php
        }
        ?>

      </div>
      <!-- /.row -->

    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="padding:60px 0px;">
         <?php
         if($shopRecord->discount ==0)
         {
          ?>
          <h2 class="notice-head"><i class="fas fa-file-invoice-dollar"></i>本店暂无优惠券可领取</h2>
        <?php
         }
                              
        elseif(isset($_SESSION["userId"]))
          {
            $userId = $_SESSION["userId"];
          $couponTakenQuery = "select * from coupon where shopId='$shopRecord->id' and userId='$userId' and createdDate > CURDATE()";
          $couponTakenResult = mysqli_query($conn,$couponTakenQuery);
          $couponTakenrows = mysqli_num_rows($couponTakenResult);
          if($couponTakenrows!=0)
          {                        
          ?>
            <h2 class="notice-head"><i class="fas fa-file-invoice-dollar"></i>您已领取本店今日优惠券</h2>
          <?php  
          }
          else{
            ?>
              <form method="post" action="comment.php">
            <input type="hidden" name="shopId" value="<?php echo $shopRecord->id;?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION["userId"];?>">
            <input type="hidden" name="discount" value="<?php echo $shopRecord->discount;?>">
            <div class="field">
              <label for="comment">评论以后获取打折券:</label>
              <textarea name="comment" id="comment" rows="6"></textarea>
            </div>
              <input type="submit" value="Submit" class="alt discount-btn red-btn message-btn" />
          </form>        
          <?php

          }
        }
        else{
          ?>      
          <form method="post" action="comment.php">
            <input type="hidden" name="shopId" value="<?php echo $shopRecord->id;?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION["userId"];?>">
            <input type="hidden" name="discount" value="<?php echo $shopRecord->discount;?>">
            <div class="field">
              <label for="comment">评论以后获取打折券:</label>
              <textarea name="comment" id="comment" rows="6"></textarea>
            </div>
                <a href="login.php" class="alt discount-btn red-btn message-btn">Submit</a>
          </form>
          </div>
          <?php 
            }
          ?>
          <?php include 'commentList.php';?>
      </div>
    </div>
  </section>




<?php include 'user/footer.php';?>