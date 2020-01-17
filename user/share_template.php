

        <div class="container inner">
          <h2 class="shop-head">
          <?php
          if(!empty($_GET['shopId']))
          {
            echo $titleArray['about']."&nbsp;".$shopName."&nbsp;".$titleArray['latest_shares'];
          }
          elseif (!empty($_GET['userId'])) {
            echo  $userRecord->name."&nbsp;".$titleArray['latest_shares'];
          }
          ?>
          </h2>
          <div class="row">
            <div class="col-lg-2 col-md-2">
            </div>
            <div class="col-lg-8 col-md-8" id="shares-Block">
            </div>
             <div class="col-lg-2 col-md-2">
            </div>           
          </div>

        </div>


<script id="shareTemplate" type="text/x-jQuery-tmpl">
{{each(i, data) sharesData}}
  <div class="author search-result-item  mt-4 mb-4 d-flex align-items-center {{if i%2 == 1}} even-line-record {{/if}}">
      <a href="./share.php?shareId=${data.id}" target="_blank"><img class="share-image" src="${data.img_url}"> </a>
      <div class="ml-3 share-author-info">
      	<div class="share-contact-info">
          <a href="share.php?shareId=${data.id}" class="author-name" target="_blank">
            <i class="fa fa-passport shop-profile-icon" aria-hidden="true"></i>share Id: ${data.id}
          </a>
        </div>
        <div class="share-contact-info">
          <a href="details.php?shopId=${data.shopId}" class="author-name" target="_blank">
            <i class="fa fa-store-alt shop-profile-icon" aria-hidden="true"></i>${data.shopName_UK}
          </a>
        </div>
        <div class="share-contact-info">
        	<a href="profile.php?userId=${data.userId}" class="author-name" target="_blank">
            <i class="fa fa-users shop-profile-icon" aria-hidden="true"></i>${data.userName}
            </a>
        </div>
       <div class="share-contact-info">
            <i class="fa fa-clock shop-profile-icon" aria-hidden="true"></i>${data.created_time}
        </div>  
       <div class="share-contact-info">
            <i class="fa fa-heart shop-profile-icon" aria-hidden="true"></i>${data.shareLikeCount}
        </div>  
      </div>
  </div>
{{/each}}
</script>