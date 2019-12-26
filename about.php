<?php 
session_start();
require("api/getAbout.php");
include 'user/header.php';
?>
  <!-- Masthead -->
  <header class="masthead" style="">

        <div class="container inner">
        	<div class="row">      	                                <!-- Blog Post Start -->
                <div class="col-md-12 blog-post">
                    <div class="post-title">
                      <h2><?php echo $titleArray['who_are_we'];?>?</h2>
                    </div>    
                    <p class="answer-desc"><?php echo $aboutArray['who_are_we'];?>
					</p>                          			
                    
                </div>

                <div class="col-md-12 blog-post">
                    <div class="post-title">
                      <h2><?php echo $titleArray['what_is_our_goal'];?>?</h2>
                    </div>    
                    <p class="answer-desc"><?php echo $aboutArray['what_is_our_goal'];?>
					</p>                          			
                    
                </div>
                <div class="col-md-12 blog-post">
                    <div class="post-title">
                      <h2><?php echo $titleArray['who_can_be_our_user'];?>?</h2>
                    </div>    
                    <p class="answer-desc"><?php echo $aboutArray['who_can_be_our_user'];?>
					</p>                          			
                    
                </div>

                <div class="col-md-12 blog-post">
                    <div class="post-title">
                      <h2><?php echo $titleArray['how_can_you_follow_us'];?>?</h2>
                    </div>    
                    <p class="answer-desc"><?php echo $aboutArray['how_can_you_follow_us'];?>

					</p>                          			                 
                </div>


        	</div>
        </div>
  </header>

<?php include 'user/footer.php';?>