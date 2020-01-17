<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?> 
<style type="text/css">
  .use-coupon-block{
    cursor: pointer;
  }
  .use-coupon-image{
    height: 60px;
    width: 60px;
  }
</style>
<?php 
include 'user/header.php';
require("api/getCoupon.php");
?>
<section id="coupon" class="masthead">
	<div class="container inner ">
  <?php if(isCurrentUser($couponUser)){?>
          <?php if($couponRecord->used!="1"&&$expired==0){?>
          <div style="text-align:center; margin: 30px 0px;" class=" ">
            <span class="use-coupon-block coupon-button-block" data-toggle="modal" data-target="#use-coupon-modal"><i class='fa fa-file-invoice-dollar'></i>&nbsp;<?php echo $titleArray['use_coupon'];?></span>
          </div>
          <?php } ?>
          <div class="coupon" style="position: relative;">
          
              <span class="coupon-ribbon" style="<?php if($ribbonContent==""){ echo "display:none;"; }?>">
                <span><?php echo $ribbonContent;?></span>
              </span>  

            <h3><?php echo $shopName;?></h3>
            <img src="<?php echo "./shop/shopimage/".$shopImage;?>" alt="Avatar" style="width:100%;">
            <div class="container" style="background-color:white">
              <h3><b><?php echo $shopDiscount;?>% OFF</b> &nbsp;&nbsp;(<?php echo $couponRecord->userLikesNum;?><i class="fas fa-heart text-danger"></i>)</h3> 
              <p class="disclosure"><?php echo $titleArray['coupon_discolsure'];?></p>
            </div>
            <div class="container">
              <p class="promo-code"><?php echo $titleArray['coupon_number'];?>: <span class="promo"><?php echo $shopId.$couponUser.date_format(date_create($couponDate), 'YmdH-i-s');?></span></p>
              <p class="expire-code"><?php echo $titleArray['valida_to'];?>: <span class="promo"><?php echo date('Y F j,',strtotime($couponDate."+30 day"));?> 23:59:59</span></p>             
            </div>
          </div>
    <?php 
    } else{?>
      <h2 class="text-center"><?php echo $titleArray['not_owner'];?></h2>
     <?php }?>
	</div>

</section>


<?php include 'user/footer.php';?>
      <div class="portfolio-modal modal fade" id="use-coupon-modal" tabindex="-1" role="dialog"  aria-hidden="true">
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
                <h3 class="portfolio-modal-title mb-0"><?php echo $titleArray['use_coupon'];?></h3>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                      <i class="fas fa-fish"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                  </div>

                  <p class="text-left" style="font-weight: bold; width: 100%;"><?php echo $titleArray['coupon_use_once'];?></p>
                  <form class="share-form" method="post" action="api/useCoupon.php" enctype="multipart/form-data" > 
                    <input type="hidden" name="couponId" value="<?php echo $_GET['couponId'];?>">
                    <input type="submit" class="login100-form-btn m-t-20" value="<?php echo $titleArray['continue'];?>">
                  </form>             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
