    <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Copenhagen 
            <br>Denmark</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">Contact us</h4>
          <p class="lead mb-0">contact us for business cooperation
            </p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script type="text/javascript">
    $("#inpt_search").on('focus', function () {
      $(this).parent('label').addClass('active');
    });

    $("#inpt_search").on('blur', function () {
      if($(this).val().length == 0)
        $(this).parent('label').removeClass('active');
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js" ></script>
    <script type="text/javascript">
    function like(e,shopId,actionId) {
      var selector = this;
      $(this).hide();
      e.preventDefault();
      $.post( "subscribe.php", { userId: <?php echo $_SESSION["userId"];?>, shopId: shopId,actionId:actionId })
      .done(function(){
        
        var follow_like_block = $(selector).parent(".shop-follow-block").find(".follower-block-like");
        var likesNumber = parseInt(follow_like_block.val());
        if(actionId==1)
        {
          addLike(selector);
          follow_like_block.val(likesNumber+1);
        }
        else{
          removeLike(selector);
          follow_like_block.val(likesNumber-1);
        }
        
      })
      
    };
    function addLike(selector)
    {
      $(selector).parent(".shop-follow-block").find(".unlike-button").show();
    }
    function removeLike(selector){
      $(selector).parent(".shop-follow-block").find(".like-button").show();
    }
  </script>
</body>

</html>