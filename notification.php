<?php
session_start();
?>

</style>
<?php include 'user/header.php';?>
  <!-- Masthead -->
  <header class="masthead" style="">

        <div class="container inner" >
            <?php 
            if($_GET['categoryId']==1){
              echo "<h3>An email has been sent to ".$_GET['mail']." you for reset password, it might take a few minutes for you to receive it.</h3>";
              }
            elseif($_GET['categoryId']==2){
              echo "<h3>There is some network issue while creating the like collecting page.</h3>";
              }
            ?>

        </div>
  </header>





<?php include 'user/footer.php';?>
