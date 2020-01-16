
  <section class="page-section portfolio" id="portfolio" style="padding-bottom:150px; ">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <a href="details.php?shopId=<?php echo $shopId?>" style="color: #000;"><h2 style="text-align: center;"><?php
          echo $shopName." ";
          echo $titleArray['recommendation'];
      ?></h2></a>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row" id="shopItemsBlock">
        <!-- Portfolio Item 1 -->


      </div>
      <!-- /.row -->

    </div>
  </section>


<script id="shopItemTemplate" type="text/x-jQuery-tmpl">
{{each(i, data) itemsData}}
        <div class="col-md-6 col-lg-4">
        <div class="portfolio-item mx-auto" data-toggle="modal">
          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
          </div>
             <div class="img-responsive ratio-4-3" style="background-image:url('<?php echo "shop/shop".$shopId."/";?>${data.img_url}')"></div>

          <div class="item-name" >
          {{if "<?php echo $lang;?>" == "cn"}} ${data.name}
          {{else}} ${data.name_UK}
          {{/if}}
          </div>
        </div>
      </div>
{{/each}}
</script>