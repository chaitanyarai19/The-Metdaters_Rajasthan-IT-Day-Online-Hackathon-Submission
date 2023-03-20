<?php 
include("aabbaabb.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Apna Kiranas</title>    
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;

}

.button2 {background-color: #f44336;} 
</style>
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

   tr:nth-child(even) { 
            background-color: Lightgreen; 
      } 
</style>
</head>
<body>

<center><b><h2>All Order Details</h2></b></center>
 
<input id="myInput" type="text" style="width:300px;height:40px;"placeholder="Search..">
<br><br>

<table>
  <thead>
    <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th>Product Name</th>
                <th>Product Company</th>
                <th>Product Price</th>
                <th>ProductPriceBefore Discount</th>
                <th>Product Description</th>
                <th>Product image1</th>
                <th>Product image2</th>
                <th>Product image3</th>
                <th>Shipping</th>
                <th>Product Quantity</th>
                <th>Product Availability</th>
                <th>Posting Date</th>
                <th>Updating Date</th>
                
             
            </tr>
  </thead>
  
<?php

$cn = mysql_connect("localhost", "apnakira_mood704", "kirana@12345");
mysql_select_db("apnakira_mood704", $cn) or die(mysql_error());
 
 $c = "SELECT * FROM  products";
 $d = mysql_query($c) or die(mysql_error());
 while($row=mysql_fetch_array($d)) {
			extract($row);

?>

  <tbody id="myTable">
    <tr>
    <td><?php echo $id;?></td>
    <td><?php echo $category; ?></td>
    <td><?php echo $subCategory; ?></td>
	<td style="text-transform:uppercase;"><?php echo $productName; ?></td>
	<td><?php echo $productCompany; ?></td>
	<td><?php echo $productPrice; ?></td>
	<td><?php echo $productPriceBeforeDiscount; ?></td>
	<td><?php echo $productDescription; ?></td>
	<td><?php echo $productImage1; ?></td>
	<td><?php echo $productImage2; ?></td>
	<td><?php echo $productImage3; ?></td>
	<td><?php echo $shippingCharge; ?></td>
	<td><?php echo $productquantity; ?></td>
	<td><?php echo $productAvailability; ?></td>
	<td><?php echo $postingDate; ?></td>
	<td><?php echo $updationDate; ?></td>


	
	
    </tr>
  </tbody>
  
  <?php  } ?>
  
</table>

<?php 
$cn = mysql_connect("localhost", "apnakira_mood704", "kirana@12345");
mysql_select_db("apnakira_mood704", $cn);
if(isset($_GET['id'])) {
    $a1 = $_GET['id'];
    $b1 = "UPDATE orders SET status='Delivered' WHERE id=$a1";
    $c1 = mysql_query($b1) or die(mysql_error());
	echo "<script>alert('Item Delivered');</script>";
	echo "<script>window.location.href='info.php';</script>";
	}
?>



<?php
$cn = mysql_connect("localhost", "apnakira_mood704", "kirana@12345");
mysql_select_db("apnakira_mood704", $cn);

if(isset($_GET['del'])) { 
	$serial=$_GET['del'];
	
	$a = "DELETE FROM orders WHERE id=$serial";
	$b = mysql_query($a) or die(mysql_error());

	if($b) {
		echo "Values deleted successfully";
	} 
}
?>


</body>
</html>