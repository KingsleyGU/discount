<?php 
session_start();
require("../dbconnection.php");
if(!isset($_SESSION["shopId"]))
{
	header("Location: login.php");
}
$shopId = $_SESSION["shopId"];
$shopQuery = "select * from shopUser where id='$shopId'";
$shopResult = mysqli_query($conn,$shopQuery) or die(mysql_error());
$rows = mysqli_num_rows($shopResult);
if($rows==1){
  $shopRecord = mysqli_fetch_object($shopResult);  
  $location = $shopRecord->address . ', ' . $shopRecord->zip . ' '. $shopRecord->city; 
	}
$shopItemQuery = "select * from shopItem where shopId='$shopId'";
$shopItemResult = mysqli_query($conn,$shopItemQuery) or die(mysql_error());
$shopTagQuery = "select * from shopTags where shopId='$shopId'";
$shopTagResult = mysqli_query($conn,$shopTagQuery) or die(mysql_error());
$shopTags = array();
?> 
<?php include 'header.php';?>  
  <header class="masthead text-center" style="color:#000;">
    <div class="container d-flex align-items-center flex-column">
    	<div class="row">
      <!-- Masthead Heading -->
      <div class="col-lg-12">
      	<div class="change-trigger">

	      	<h2 class="text-uppercase mb-0 item-content"><?php echo $shopRecord->name;?></h2>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="1"/>
			    <input type="text" name="name" value="<?php echo $shopRecord->name;?>" placeholder="name" />
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>
		</div>
      
      <div class="change-trigger">
      	<?php 
      	$avatar = $shopRecord->avatar;
      	if(is_null($avatar))
      	{
      		$avatar = "panda.png";
      	}
      	?>
	      <img class="masthead-avatar mb-5 item-content" src="<?php echo "shopimage/".$avatar;?>" alt="" >
				<form action="profile.php" method="post" enctype="multipart/form-data" class="profileForm">
					<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
					<input type="hidden" name="itemId" value="5"/>
					<input type="file" name="fileToUpload" id="fileToUpload">
				    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
				</form>

      	</div>
      <?php
		while($shopTag = mysqli_fetch_object($shopTagResult)) {	
			array_push($shopTags,$shopTag->tagCategory);
	

		?>

		<form class="tag-form" method="POST" action="tag.php">
			<input type="hidden" name="request_type" value="1">
			<input type="hidden" name="shopId" value="<?php echo $_SESSION["shopId"];?>">
			<input type="hidden" name="tagId" value="<?php echo $shopTag->id;?>">
			<button type="submit" class="btn  alt  tag-button detail-tag-button">
			<?php 
			if($shopTag->tagCategory == 1){
				echo "川菜";
			}
			elseif ($shopTag->tagCategory == 2) {
				echo "粤菜";
			}
			elseif ($shopTag->tagCategory == 3) {
				echo "湘菜";
			}	
			elseif ($shopTag->tagCategory == 4) {
				echo "东北菜";
			}			
			?><i class="fas fa-minus tag-button-icon"></i>
			</button>
		</form>
		<?php
			}
      ?>
  		<div class="change-trigger">
			<i class="fa fa-file-invoice-dollar" aria-hidden="true"></i>
	  		<p class="masthead-subheading font-weight-light mb-0 item-content"><?php echo $shopRecord->discount;?></p>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="7"/>
			    <input type="text" name="discount" value="<?php echo $shopRecord->discount;?>" placeholder="discount" />
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>	
		</div>	
      <div class="change-trigger">
      		<i class="fa fa-envelope" aria-hidden="true"></i>
	      <p class="masthead-subheading font-weight-light mb-0 item-content"><?php echo $shopRecord->email;?></p>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="3"/>
			    <input type="text" name="email" value="<?php echo $shopRecord->email;?>" placeholder="email" />
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>
		</div>
		<div class="change-trigger">
			<i class="fa fa-phone" aria-hidden="true"></i>
	  		<p class="masthead-subheading font-weight-light mb-0 item-content"><?php echo $shopRecord->phone;?></p>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="4"/>
			    <input type="text" name="phone" value="<?php echo $shopRecord->phone;?>" placeholder="phone number" />
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>	
		</div>	
     
	     <div class="change-trigger">
	     	<i class="fa fa-edit" aria-hidden="true"></i>
	      <p class="masthead-subheading font-weight-light mb-0 item-content"><?php echo $shopRecord->description;?></p>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="2"/>
			    <textarea name="description"><?php echo $shopRecord->description;?></textarea> 
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>
		</div>

	     <div class="change-trigger">
	     	<i class="fa fa-map-marker-alt" aria-hidden="true"></i>
	      <p class="masthead-subheading font-weight-light mb-0 item-content"><?php echo $location;?></p>
			<form action="profile.php" method="post" class="profileForm">
				<input type="hidden" name="id" value="<?php echo $_SESSION["shopId"];?>"/>
				<input type="hidden" name="itemId" value="6"/>
			    <input type="text" name="address" value="<?php echo $shopRecord->address;?>" placeholder="address" />
			    <input type="text" name="zip" value="<?php echo $shopRecord->zip;?>" placeholder="zip" />
			    <input type="text" name="city" value="<?php echo $shopRecord->city;?>" placeholder="city name" />
			    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
			</form>
		</div>

      <?php
		for($x = 1; $x < 5; $x++) {

			if(!in_array($x, $shopTags,false))
			{

		?>

		<form class="tag-form" method="POST" action="tag.php">
			<input type="hidden" name="request_type" value="2">
			<input type="hidden" name="shopId" value="<?php echo $_SESSION["shopId"];?>">
			<input type="hidden" name="tagCategory" value="<?php echo $x;?>">
			<button type="submit" class="btn  alt  tag-button red-tag-button">
			<?php 
			if($x == 1){
				echo "川菜";
			}
			elseif ($x == 2) {
				echo "粤菜";
			}
			elseif ($x == 3) {
				echo "湘菜";
			}	
			elseif ($x == 4) {
				echo "东北菜";
			}			
			?><i class="fas fa-plus tag-button-icon"></i>
			</button>
		</form>
		<?php
			}
		}
      ?>
      </div>


    </div>
    	</div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio" style="padding-bottom:150px; ">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">推荐菜单</h2>

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
    	    while($shopItemRecord = mysqli_fetch_object($shopItemResult)) {		   
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#itemModal<?php echo $shopItemRecord->id;?>">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
               <div class="img-responsive ratio-4-3" style="background-image:url(<?php echo "./shop".$shopId."/".$shopItemRecord->img_url;?>)"></div>
 
            <div class="item-name "><?php echo $shopItemRecord->name;?></div>
          </div>
        </div>

         <div class="portfolio-modal modal fade" id="itemModal<?php echo $shopItemRecord->id;?>" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
		    <div class="modal-dialog modal-xl" role="document">
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
		                <!-- Portfolio Modal - Title -->
		                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"></h2>
							<form action="item.php" method="post" enctype="multipart/form-data" class="itemForm">
								<input type="hidden" name="shopId" value="<?php echo $_SESSION["shopId"];?>"/>
								<input type="hidden" name="shpitemId" id="shpitemId" value="<?php echo $shopItemRecord->id;?>"/>
								<input type="text" name="name" id="shopItemName" value="<?php echo $shopItemRecord->name;?>"/><br>
								<input type="file" name="fileToUpload" id="fileToUpload"><br>
							    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
							</form> 
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
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#itemModal">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
          <div class="img-responsive ratio-4-3" style="background-image:url('../img/add.png')"></div>
 
            <div class="item-name ">添加美食</div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
  </section>

     <div class="portfolio-modal modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
		    <div class="modal-dialog modal-xl" role="document">
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
		                <!-- Portfolio Modal - Title -->
		                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"></h2>
							<form action="item.php" method="post" enctype="multipart/form-data" class="itemForm">
								<input type="hidden" name="shopId" value="<?php echo $_SESSION["shopId"];?>"/>
								<input type="hidden" name="shpitemId" id="shpitemId" value=""/>
								<input type="text" name="name" id="shopItemName" value=""/><br>
								<input type="file" name="fileToUpload" id="fileToUpload"><br>
							    <input value="submit" type="submit" class="alt discount-btn red-btn message-btn">
							</form> 
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>


<?php include 'footer.php';?>
<script type="text/javascript">
	$(".change-trigger").click(function(){
		$(".item-content").show();
		$(".profileForm").hide();
		$(this).find(".item-content").hide();
		$(this).find(".profileForm").show();
	})
</script>