
  <section class="page-section portfolio" id="portfolio" style="padding-bottom:150px; ">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php
          echo $titleArray['recommendation'];
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
          require("api/getShopItems.php");
          foreach ($items as $key => $item) {
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#itemModal<?php echo $item['id'];?>">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            </div>
               <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo "shop/shop".$shopId."/".$item['img_url'];?>)"></div>
 
            <div class="item-name" ><?php  
            if($lang =="cn")
            {
              echo empty($item['name'])? $item['name_UK']:$item['name'];
            }
            else
            {
              echo empty($item['name_UK'])? $item['name']:$item['name'];
            }
            
            ?></div>
          </div>
        </div>

        <?php
        }
        ?>

      </div>
      <!-- /.row -->

    </div>
  </section>