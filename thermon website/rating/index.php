<?php
	include 'database.php';
	$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating_data where status=1");
	$row = mysqli_fetch_array($query);
	$AVGRATE=$row['AVGRATE'];
	$query = mysqli_query($conn,"SELECT count(rating) as Total from rating_data where status=1");
	$row = mysqli_fetch_array($query);
	$Total=$row['Total'];
	$query = mysqli_query($conn,"SELECT count(remark) as Totalreview from  rating_data where status=1");
	$row = mysqli_fetch_array($query);
	$Total_review=$row['Totalreview'];
	$review = mysqli_query($conn,"SELECT remark,rating,email,name,date_time from rating_data where status=1 order by date_time desc limit 4 ");
	$rating = mysqli_query($conn,"SELECT count(*) as Total,rating from rating_data group by rating order by rating desc");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style>
	@media(max-width:2000px){
		#cen{
		 margin-left:500px;
		}
	}
	@media(max-width:1200px){
		#cen{
		 margin-left:200px;
		}
	}
	@media(max-width:630px){
		#cen{
		 margin-left:50px;
		}
	}
	</style>
</head>
<body>
<center><h3><b><u>Rating & Reviews For Apnakiranas</u></b></h3></center>
	<br><br>
<div class="row container">

<div class="col-md-5" id="cen">	
<div id="rating_div">
				<div class="star-rating">
					<span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
					<input type="hidden" name="whatever3" class="rating-value" value="1">
				</div>
	</div>	
	</div>

</div>
	
	<br><br>
<input type="hidden" name="demo_id" id="demo_id" value="1">
<div class="col-md-4" id="cen">
<input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
<input type="text" class="form-control" name="email" id="email" placeholder="Email Id"><br>
<textarea class="form-control" rows="5" placeholder="Write your review here..." name="remark" id="remark" required></textarea><br>
<p><button  class="btn btn-default btn-sm btn-info" id="srr_rating">Submit</button></p>
</div>

<div class="row container">

<div class="col-md-5" id="cen">
	
	
	<div class="row">
		<div class="col-md-5">
			<h3 align="center"><b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i></h3>
			<p align="center"><?=$Total;?> ratings and <?=$Total_review;?> reviews</p>
		</div>
		<div class="col-md-7">
			<?php
			while($db_rating= mysqli_fetch_array($rating)){
			?>
				<h4 align="center"><?php
				if($db_rating['rating']==5){
				?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<?php
				}
				elseif($db_rating['rating']==4){
                ?>
                 <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_rating['rating']==3){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_rating['rating']==2){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_rating['rating']==1){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<?php
				}
				?> Total <?=$db_rating['Total'];?></h4>
				
				
			<?php	
			}
				
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">	
		<?php
			while($db_review= mysqli_fetch_array($review)){
		?>
				<h4><?//$db_review['rating'];?> 
				<?php
				if($db_review['rating']==5){
				?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<?php
				}
				elseif($db_review['rating']==4){
                ?>
                 <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==3){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==2){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==1){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				?>
				
                <?php $date_time=$db_review['date_time'];?>
				by <span style="font-size:14px;"><b><?=$db_review['name'];?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=date("D, M Y H:m", strtotime($date_time));?></span></h4>
				<p><?=$db_review['remark'];?></p>
				<hr>
		<?php	
			}
				
		?>
		</div>
	</div>
			
</div>

</div><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
