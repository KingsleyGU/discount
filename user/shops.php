  <section class="page-section portfolio" id="shop-display">
    <div class="container">
      <h2 class="shop-head">

         <span class='category-head'><?php echo $titleArray['eat_in'];?></span><img src='img/coolpanda_eating.png' class='logo-img'/><span class='category-head'><?php echo $titleArray['cph'];?></span>
        
      </h2>

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
                 <div class="img-responsive ratio-4-3" style="background-image:url('<?php echo "./shop/shopimage/".$avatar;?>')"></div>
                 <h3 style="font-size: 18px; margin: 10px 0px;"><?php 

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
                  <div class="phone-block m-t-10 m-b-10">
                    <b><?php echo $titleArray['exchange'];?></b>:
                     <?php 
                        echo $shopRecord->firstNum." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$shopRecord->firstDiscount."%";
                        if(!empty($shopRecord->secondDiscount)){
                          echo "&nbsp;&nbsp;&nbsp;".$shopRecord->secondNum." <i class='fas fa-heart text-danger'></i> <i class='fas fa-exchange-alt'></i> ".$shopRecord->secondDiscount."%";
                        }
                     ?>
                  </div>


                  <div class="shop-follow-block m-b-30 text-center" style="height: 25px; margin-top: 10px;">
                    <?php
                      if(isset($_SESSION["userId"]))
                      {
                        $userId = $_SESSION["userId"];
                    ?>
                        <span class="like-image unfollow-image" data-toggle="modal" data-target="#portfolioModal<?php echo $itemRow;?>"><?php echo $titleArray['go_collect'];?>&nbsp;<i class="fas fa-heart fa-lg"></i></span>

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


        <?php
          }
        ?>
 
    </div>
    </div>
  </section>
