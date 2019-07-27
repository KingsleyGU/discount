<h3>Old comments:</h3>
<?php
require("common_functions.php");
$shopId = $_GET['shopId'];
$commentQuery = "select comment.*,(select name from user where user.id = comment.userId) as userName from comment where comment.shopId='$shopId' ORDER BY comment.createdDate DESC limit 0,50";
$commentResult = mysqli_query($conn,$commentQuery);
$row = 1;
while($commentRecord = mysqli_fetch_object($commentResult)) {      
?>
<div style="width:100%; padding: 15px 20px; <?php if($row%2==1) echo 'background:rgba(0,0,0,0.1);';?>">
	<div class="comment-name">
	    <div id="ctl_txt" class="<?php if($row%2==1){echo 'odd-comment-row';} else{echo 'even-comment-row';};?>">
	        <?php 
	        $userName = $commentRecord->userName;
	        if(is_null($userName))
	        {
	        	$userName = "Cool Panda";
	        }
	        $words = explode(" ", $userName);
				$acronym = "";

				foreach ($words as $w) {
				  echo $w[0];
				}
	        ?>
	    </div>
	    <!-- <img src="./img/panda-comment.jpg" class="comment-avatar"> -->
	</div>

	<div class="comment-content" >
		<div class="comment-content-date"> <?php echo time_elapsed_string($commentRecord->createdDate);?></div>
		<div class="comment-content-display"><?php echo $commentRecord->content;?></div>
	</div>
</div>
<?php
	$row = $row + 1;
}
?>