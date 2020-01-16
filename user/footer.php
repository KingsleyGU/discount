    <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4"><?php echo $titleArray['location'];?></h4>
          <p class="lead mb-0">Copenhagen, Denmark</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4"><?php echo $titleArray['follow_us'];?></h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/coolpanda.dk" target="_blank">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/coolpanda_dk/" target="_blank">
            <i class="fab fa-fw fa-instagram"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4"><?php echo $titleArray['contact_us'];?></h4>
          <p class="lead mb-0" style="color:#000;">+45 50233011
            </p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/jquery.tmpl.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script src="js/form.js"></script>
  <script type="text/javascript">
    // function share(selector,e,userId,shopId,itemId) {
    //   e.preventDefault();
      
    //   $.post( "api/shares.php", { userId: userId, shopId: shopId,itemId:itemId })
    //   .done(function(data){
    //     var url = "/discount/share.php?shareId="+data;
    //     window.location.href = url;
    //   })
      
    // };
    $(".user-search-btn").click(function(){
      var userInput = $("#user-search-input").val();
      if(userInput =="")
      {
        alert("Please enter the input");
      }
      else
      {
        var url = "/discount/users.php?userInput="+userInput;
        window.location.href = url;
      }
    });
    $(".share-search-btn").click(function(){
      var shareId = $("#share-search-input").val();
      if(isInt(shareId)){
      $.get( "api/isShareExist.php", { shareId:shareId })
        .done(function(data){
          if(data=="false")
          {
            alert("Not a valid share Id");
          }
          else
          {
            var url = "/discount/share.php?shareId="+shareId;
            window.location.href = url;
          }
        })
      }
      else{
          alert("ShareId must be a number");
      }
    })
    function isInt(value) {
      return !isNaN(value) && 
             parseInt(Number(value)) == value && 
             !isNaN(parseInt(value, 10));
    }
  </script>
  <script src="vendor/bootstrap/js/validator.min.js" ></script>
  <script src="js/platform.js"></script>
    <script type="text/javascript">
    function changeUrl(lang){
      var url = window.location.href.split('#')[0];    
      if (url.indexOf('?') > -1){
         url += '&lang='+lang;
      }else{
         url += '?lang='+lang;
      }
      window.location.href = url;
    }
    function loadShares(url)
    {
      $(window).on('load', function(){
        $.get(url)
        .done(function(data){
          var sharesData = JSON.parse(data);
          $("#shareTemplate").tmpl({sharesData:sharesData}).appendTo("#shares-Block");
        })
      });
    }
    function loadShopItems(url){
      $(window).on('load', function(){
          $.get(url)
          .done(function(data){
            var itemsData = JSON.parse(data);
            $("#shopItemTemplate").tmpl({itemsData:itemsData}).appendTo("#shopItemsBlock");
          })
      });
    }
    function getUserProfile()
    {
      var OSName = platform.os;
      var ipaddress="<?php echo $ipaddress;?>";
      var userProfile = md5(OSName+ipaddress);
      return userProfile; 
    }
    $(document).ready(function(){
          $('.input100').each(function(){
                $(this).focus();
                if($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                }
                else {
                    $(this).removeClass('has-val');
                }  
                $(this).blur();
        })
    });
  </script>

</body>

</html>