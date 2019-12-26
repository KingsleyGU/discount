  <section class="page-section portfolio" id="shop-display">
    <div class="container">
      <h2 class="shop-head">
      <?php
        if($category ==1)
        {
          echo "<span class='category-head'>".$titleArray['eat_in']."</span><img src='img/coolpanda_eating.png' class='logo-img'/><span class='category-head'>".$titleArray['cph']."</span>";
        }
        elseif($category ==3)
        {
          echo "<span class='category-head'>".$titleArray['purchase']."</span><img src='img/panda_shopping.png' class='logo-img'/><span class='category-head'>".$titleArray['cph']."</span>";
        }
      ?></h2>

      <div class="row">

        <?php 
          $itemRow =0;
          while($shopRecord = mysqli_fetch_object($shopResult)) {   
          $itemRow = $itemRow +1;  
        ?>
        <div class="col-md-6 col-lg-4 ">
          <div class="shop-item" >
              <a href="details.php?shopId=<?php echo $shopRecord->id;?>" class="shop-detail-link" >
                  <?php 
                  $avatar = $shopRecord->avatar;
                  if(is_null($avatar))
                  {
                    $avatar = "panda.png";
                  }
                  ?>
                 <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo "./shop/shopimage/".$avatar;?>)"></div>
                 <h3><?php 

                    if($lang=="cn"){
                      $shopName =  $shopRecord->name;
                    }
                    else{
                      $shopName =  $shopRecord->name_UK;
                    }
                    echo $shopName;
                 ?></h3>
              </a>
              <div class="wrapper" >
                  <?php include 'user/tag_template.php';?>
                  <div class="location-block">
                     <a href="https://maps.google.com/?q=<?php echo urlencode(utf8_encode($shopRecord->address.", ".$shopRecord->city))?>" target="_blank"><i class="fa fa-map-marker-alt location-icon" aria-hidden="true"></i><?php echo $shopRecord->address." ,".$shopRecord->city;?></a>
                  </div>
                  <div class="phone-block m-t-10 m-b-10">
                     <a href="tel:<?php echo "(+45)".$shopRecord->phone;?>"><i class="fa fa-phone phone-icon" aria-hidden="true"></i><?php echo "(+45)  ".$shopRecord->phone;?></a>
                  </div>



                  <div class="shop-follow-block m-b-30" style="height: 25px;">
                    <?php
                      if(isset($_SESSION["userId"]))
                      {
                        $userId = $_SESSION["userId"];
                    ?>
    
                      
                        <img src="img/liked.svg" class="like-image unfollow-image" data-toggle="modal" data-target="#portfolioModal<?php echo $itemRow;?>">
                    <?php
                         
                      }
                      else{
                    ?>
                    <a href="login.php"> 
                    <img src="img/like.svg" class="like-image follow-image" ></a>
                    <?php
                      }
                    ?>
                      

                      
                      <span class="follower-block">
                        <div class="follower-block-item">
                          <span class="follower-block-head"><i class="fas fa-share-square"></i></span>
                          <span class="follower-block-content follower-block-comment"><?php echo $shopRecord->commentNum;?></span>
                        </div>
                        <div class="follower-block-item">
                          <span class="follower-block-head"><i class="fas fa-heart"></i></span>
                          <span class="follower-block-content follower-block-like"><?php echo $shopRecord->subNum;?></span>
                        </div>
                      </span>
                    
                  </div>

              </div>


          </div>
        </div>


            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $itemRow;?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal<?php echo $itemRow;?>Label" aria-hidden="true">
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
                        <h3 class="portfolio-modal-title mb-0">分享内容如下</h3>
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
                            <label for="description">输入标题*：</label>
                            <input class="input100" value="Awesome!!! <?php echo $shopName;?>" type="text" name="title"  required/>
                          </div>
                          <div class="wrap-input100 validate-input m-b-30" >
                          <label for="fileToUpload">选择自定义图片：</label>
                          <input class="input100" type="file" name="fileToUpload" id="fileToUpload" />
                          </div>
                          <input type="hidden" name="shopId" value="<?php echo $shopRecord->id;?>">
                          <input type="hidden" name="userId" value="<?php echo $userId;?>">
                          <input type="hidden" name="itemId" value="0">
                          <div class="field">
                            <label for="description">请输入分享的描述*</label>
                            <textarea name="description" id="description" rows="6">大家快来一起跟我编程点赞狂魔吧，点赞获取优惠券。</textarea>
                          </div>
                              <input type="submit" class="login100-form-btn m-t-20" value="submit">
                        </form>
                          <!-- Portfolio Modal - Title -->
                          
                          <!-- Icon Divider -->
         

                          <button class="btn btn-primary" href="#" data-dismiss="modal">
                            <i class="fas fa-times fa-fw"></i>
                            Close Window
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        <?php
          }
        ?>
 
    </div>
    </div>
  </section>
