<?php
session_start();

?>
<style type="text/css">
.even-line-record{
  background-color: #eee;
}
.search-result-item{
  padding: 10px;
}
</style>
<?php include 'user/header.php';?>

  <header class="masthead" style="">

        <div class="container inner">
          <h2 class="shop-head"><span class="result-number"></span> <?php echo $titleArray['user_search_result'];?> <?php echo $_GET['userInput'];?></h2>
          <div class="row">
            <div class="col-lg-2 col-md-2">
            </div>
            <div class="col-lg-8 col-md-8" id="users-Block">
            </div>
             <div class="col-lg-2 col-md-2">
            </div>           
          </div>

        </div>
  </header>




<?php include 'user/footer.php';?>


<script id="userTemplate" type="text/x-jQuery-tmpl">
{{each(i, data) userData}}
  <div class="author search-result-item  mt-4 mb-4 d-flex align-items-center {{if i%2 == 1}} even-line-record {{/if}}">
      <a href="profile.php?userId=${data.id}" ><img class="share-profile-image" src="img/userAvatar/${data.avatar}"> </a>
      <div class="ml-3 share-author-info">
        <div class="share-contact-info">
          <a href="profile.php?userId=${data.id}" class="author-name">
            <i class="fa fa-users shop-profile-icon" aria-hidden="true"></i>${data.name}
            </a>
        </div>
       <div class="share-contact-info">
            <i class="fa fa-envelope shop-profile-icon" aria-hidden="true"></i>${data.email}
        </div>       
       <div class="share-contact-info">
            <i class="fa fa-clock shop-profile-icon" aria-hidden="true"></i>${data.createdDate}
        </div>  
        <div class="follower-block-item">
          <span class="follower-block-head"><i class="fas fa-heart shop-profile-icon"></i></span>
          <span class="follower-block-content follower-block-like">${data.userLikesNum}</span>
          <img src="img/panda-png-icon.png" class="follower-icon-image shop-profile-icon">
          <span class="follower-block-content follower-block-like">${data.shareCount}</span>
        </div>
      </div>
  </div>
{{/each}}
</script>


<script type="text/javascript">
$( document ).ready(function() {
    var userInput = "<?php echo $_GET['userInput'];?>";
    $.get( "api/getUsers.php", { userInput:userInput })
    .done(function(data){
      var userData = JSON.parse(data);
      $(".result-number").text(userData.length);
      $("#userTemplate").tmpl({userData:userData}).appendTo("#users-Block");
    })
});
</script>