  <section class="page-section portfolio" id="shop-display">
    <div class="container">
      <h2 class="shop-head">
      <?php
        if($category ==1)
        {
          echo "好吃不过中餐";
        }
      ?></h2>

      <div class="row">

        <?php 
          while($shopRecord = mysqli_fetch_object($shopResult)) {      
        ?>
        <div class="col-md-4 col-lg-4 ">
          <div class="shop-item">
              <a href="details.php?shopId=<?php echo $shopRecord->id;?>" class="shop-detail-link">
                 <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo "./shop/shopimage/".$shopRecord->avatar;?>)"></div>
                 <h3><?php echo $shopRecord->name;?></h3>
              </a>
              <div class="wrapper" >
                  <div class="tags-block" style="<?php if($category ==2 || $category ==3){echo "display:none;";}?>">
                  <?php
                      $shopTagQuery = "select * from shopTags where shopId='$shopRecord->id'";
                      $shopTagResult = mysqli_query($conn,$shopTagQuery) or die(mysql_error());
                        while($shopTag = mysqli_fetch_object($shopTagResult)) { 
                  ?>
                  
                      <span class="btn  alt  tag-button green-tag-button">
                      <?php 
                      if($shopTag->id == 1){
                        echo "川菜";
                      }
                      elseif ($shopTag->id == 2) {
                        echo "粤菜";
                      }
                      elseif ($shopTag->id == 3) {
                        echo "湘菜";
                      } 
                      elseif ($shopTag->id == 4) {
                        echo "东北菜";
                      }     
                      ?>
                      </span>
                    <?php
                      }
                      ?>
                  </div>
                  <div class="location-block">
                     <a href="https://maps.google.com/?q=<?php echo urlencode(utf8_encode($shopRecord->address.", ".$shopRecord->city))?>" class="btn btn-light" target="_blank"><i class="fa fa-map-marker-alt location-icon" aria-hidden="true"></i><?php echo $shopRecord->address." ,".$shopRecord->city;?></a>
                  </div>
                <p class="desc"><?php echo $shopRecord->description;?></p>
                <div data-toggle="modal" data-target="#portfolioModal<?php echo $shopRecord->id;?>">
                  <div class="discount-block" style="text-align:center;">
                      <?php 
                      if(isset($_SESSION["email"]))
                      {
                      ?>
                    <a href="#" class="button alt discount-btn red-btn dicount-modal-button"><i class="fas fa-file-invoice-dollar fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;获取<?php echo $shopRecord->discount;?>%优惠券</a>
                      <?php 
                      }
                      else
                      {
                      ?>
                        <a href="login.php" class="button alt discount-btn red-btn dicount-modal-button"><i class="fas fa-file-invoice-dollar fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;获取<?php echo $shopRecord->discount;?>%优惠券</a>
                      <?php
                        }
                      ?>
                  </div>

                </div>

                  <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $shopRecord->id;?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">
                            <i class="fas fa-times"></i>
                          </span>
                        </button>
                        <div class="modal-body container">

                          <form method="post" action="comment.php">
                            <input type="hidden" name="shopId" value="<?php echo $shopRecord->id;?>">
                            <input type="hidden" name="discount" value="<?php echo $shopRecord->discount;?>">
                            <input type="hidden" name="userId" value="<?php echo $_SESSION["userId"];?>">
                            <div class="field">
                              <label for="comment">Comment:</label>
                              <textarea name="comment" id="comment" rows="6"></textarea>
                            </div>
                            <input type="submit" value="Submit" class="alt discount-btn red-btn message-btn" />
                          
                          </form>

                          

                           <button class="discount-btn red-btn" href="#" data-dismiss="modal" style="margin: 20px auto; display: block;">
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