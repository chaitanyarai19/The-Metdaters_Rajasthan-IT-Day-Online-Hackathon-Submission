<?php
session_start();
error_reporting(0);
include('includes/config.php');

$id=intval($_POST['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		
			$success = 	array(
			    "status" => 1,
			    "message" => 'Product has been added to the cart'
			    );
			   	echo json_encode($success);

	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			
		$success = 	array(
			    "status" => 1,
			    "message" => 'Product has been added to the cart'
			    );
	        	echo json_encode($success);
		
		}else{
        				$error = 	array(
        			    "status" => 2,
        			    "message" => 'Product is invalid'
        			    );
        	       	    echo json_encode($error);
		}
	}