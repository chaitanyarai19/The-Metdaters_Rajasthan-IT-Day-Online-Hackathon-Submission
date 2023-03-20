<?php
error_reporting(0);
	include 'database.php';
	$rate=$_REQUEST['rate'];
	$name=$_REQUEST['name'];
	$remark=$_REQUEST['remark'];
	$email=$_REQUEST['email'];
	$demo_id=$_REQUEST['demo_id'];
	$status=1;
	$date_time=date("Y-m-d H:i:s");
	//Check email id already exists or not
	$query = mysqli_query($conn,"SELECT count(*) AS TOTAL FROM rating_data WHERE email='$email' and demo_id=$demo_id");
	$row = mysqli_fetch_array($query);
	$TOTAL_COUNT=$row['TOTAL'];
	if($TOTAL_COUNT==0){
		$sql="INSERT INTO 'rating_data'( 'demo_id','rating','name','email', 'remark', 'date_time', 'status') VALUES ('$demo_id','$rate','$name','$email','$remark','$date_time',$status)";
		mysqli_query($conn,$sql);
		echo "Rating Added Successfully !";
	}
	
?>