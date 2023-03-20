<?php 
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');// change according timezone
include('includes/config.php');
if(isset($_POST['submit'])){
	if(!empty($_SESSION['cart'])){
	foreach($_POST['quantity'] as $key => $val){
		if($val==0){
			unset($_SESSION['cart'][$key]);
		}else{
			$_SESSION['cart'][$key]['quantity']=$val;

		}
	}
		echo "<script>alert('Your Cart hasbeen Updated');</script>";
	}
}
// Code 
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table

if(isset($_POST['ordersubmit'])) 
{	
    if(strlen($_SESSION['login'])==0)
{   
    header('location:login.php');
}
else{
    $sql = "SELECT id from orders order by id desc limit 1";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    if($row['id'] >0){
        $number   = $row['id']+1;
    }
    else{
        $number   = 1;
    }
    
    function setindex_prefix($index_assigned)
    {
        switch(strlen($index_assigned))
        {
            case 1:
                $new_index_assigned = "000".$index_assigned;
                break;
            case 2:
                $new_index_assigned = "00".$index_assigned;
            break;
			case 3:
                $new_index_assigned = "0".$index_assigned;
                break;
            default:
                $new_index_assigned = $index_assigned;
        }
        
    	return "ORD".$new_index_assigned;
    }
	$unique_id = setindex_prefix($number);/* Pass parameter */
	mysqli_query($con,"INSERT INTO orders( 'order_code') VALUES ($unique_id)");
	$last_id = mysqli_insert_id($con);
	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$baddress=$_POST['billingaddress'];
	$bstate=$_POST['bilingstate'];
	$bcity=$_POST['billingcity'];
	$area=$_POST['area'];
	
	$bpincode=$_POST['billingpincode'];
	$query=mysqli_query($con,"update users set address='$baddress',state='$bstate',city='$bcity',pin='$bpincode' where id='".$_SESSION['id']."'");
	if($query)
	{
	    $value=array_combine($pdd,$quantity);
	foreach($value as $qty=> $val34)
	{
		mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
		$_SESSION['total']=$_SESSION['tp']="$totalprice"+"$a". ".00";
		if($data=mysqli_query($con,'SELECT id FROM orders ORDER BY id DESC '))
		{
			$row=mysqli_fetch_assoc($data);
			$val[]=$row;
			$_SESSION['ppid']=$val;
		}	
	}
	header('location:payment-method.php');
	
}
}
}
// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		//$area=$_POST['area'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set address='$baddress',state='$bstate',city='$bcity',pin='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
        echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
		}
		else
		{
			$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");

		}
	}

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therm-on | Eco friendly electricity generation</title>
     <link rel="shortcut icon" href="img/favicon.jpeg">
        
        
	 
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		<!-- Favicon -->
		<!--<link rel="shortcut icon" href="layouts/orgain/22.png">-->
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="layouts/orgain/button/button.css">
    <!-- Css Styles -->
    
    <link rel="stylesheet" href="layouts/orgain/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/style.css" type="text/css">
       <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>

.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  text-align: center;
  height: 41px;
  vertical-align: middle;
  padding: 11px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  padding-left: 15px;
  padding-right: 15px;;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;
  border-radius: 2px 0 0 2px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 2px 2px 0;
}


input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
  padding-bottom: 2.5px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>


</head>

<body>
    
<?php include("aabb.php"); ?>    
   <header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php //include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php //include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php //include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>



    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>                
         <form method="post" action="">
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width:50px;height:50px;" src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
                                        <h5 style="font-size:20px;"><?php echo $row['productName'];?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo "Rs"." ".$row['productPrice']; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        
    &nbsp;&nbsp;<div class="quantity buttons_added">
        <input type="button" function increaseValue();  value="-" class="minus">
<input type="number" step="1" min="0" max="" name="quantity[<?php echo $row['id'];?>]" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
<input type="button" value="+" class="plus">
                                        </div>
                         
                                        <!--<div class="quantity">
                                            <div class="pro-qty">
                                           <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                           <input type="number" id="number" value="<?php //echo $_SESSION['cart'][$row['id']]['quantity']; ?>" / name="quantity[<?php //echo $row['id'];?>]">
                                          <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                            </div>
                                        </div>-->
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    
                                        <span style="color:red;" class="icon_close remove"><a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class=""></a></span>
                                    </td>
                                </tr>
                             <?php } }
$_SESSION['pid']=$pdtid;
				?>
                            
                            </tbody>
                        </table>
                        
		
                        
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button type="submit" name="submit" value="Update shopping cart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</button>
                    </div>
				</div>
           
              
    <div class="col-lg-6">
           <br><br>          
<div class="col-md-4 col-sm-12 estimate-ship-tax" style="width:370px;">
	<table class="table table-bordered" >
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Billing Information</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="form-group">
					    <label class="info-title" for="Billing Address"> Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required><?php echo $row['address'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State "> State  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['state'];?>" required>
					  </div>
					  
					  
					  <div class="form-group">
					    <label class="info-title" for="Billing City"> City <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity"  value="<?php echo $row['city'];?>" required>
					  </div>
					  
					   <!--<div class="form-group">
					    <label class="info-title" for="Billing City"> Area <span>*</span></label>
					    <select  class="form-control unicase-form-control text-input" name="area" required>
                            <option value="Select" selected>Select</option>
                            <?php //include("includes/area.php");?>
         
        </select>
					   
					  </div>-->
					  
                        <div class="form-group">
					    <label class="info-title" for="Billing Pincode"> Pincode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" value="<?php echo $row['pin'];?>" required>
					  </div>
					  </div>
					  
				  
					  <button style="background:#7fad39;" type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
			
					<?php } ?>
		
						</div>
					
					</td>
				</tr>
		</tbody>
		
	</table>
	
	
</div>
</div>
          
                
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                           
                                <input type="text" placeholder="Enter your coupon code" style="width: 255px;height: 46px;
                                border: 1px solid #cccccc;font-size: 16px;color: #b2b2b2;text-align: center;display: inline-block;margin-right: 15px;">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                        </div>
                    </div>
                    
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <?php //$a=20 ;?>
                            <li>Sub Total<span>Rs <?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span></li>
                            <!--<li>delivery Charge <?php //echo $b;?><span>Rs 20.00</span></li>-->
                            <li>Grand Total <span>Rs <?php echo $_SESSION['tp']="$totalprice"+"$a". ".00"; ?></span></li>
						</ul>
						<?php
						if($totalprice>=399) {
						?>
						<button type="submit" name="ordersubmit" vlaue="submit" class="primary-btn">PROCEED TO CHECKOUT</button>
						<?php
						} else {
						?>
						<button type="submit" name="ordersubmit" vlaue="submit" class="primary-btn btn btn-danger" disabled>PLEASE ORDER ATLEAST Rs.399/-</button>
						<?php
						}
						?>
					
					</form>
                    </div>
                </div>           
                
                
                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

   </div><!-- /.shopping-cart-table -->			
   



	<?php } else {
echo "Your shopping Cart is empty";
		} ?>



    	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<!--<script src="assets/js/scripts.js"></script>-->

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->


    <script src="layouts/orgain/button/button.js"></script>

    <!-- Js Plugins -->
    <script src="layouts/orgain/js/jquery-3.3.1.min.js"></script>
    <script src="layouts/orgain/js/bootstrap.min.js"></script>
    <script src="layouts/orgain/js/jquery.nice-select.min.js"></script>
    <script src="layouts/orgain/js/jquery-ui.min.js"></script>
    <script src="layouts/orgain/js/jquery.slicknav.js"></script>
    <script src="layouts/orgain/js/mixitup.min.js"></script>
    <!--<script src="layouts/orgain/js/owl.carousel.min.js"></script>-->
    <script src="layouts/orgain/js/main.js"></script>

<script>
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
</script>
<script type="text/javascript">

$(document).on('click','.remove',function(){
//$(this).parent().parent().remove();

});
</script>
<?php
$_SESSION['total']=$_SESSION['tp']="$totalprice"+"$a". ".00";
?>

</body>
</html>

