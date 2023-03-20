<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

?>

<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Therm-on | Eco friendly electricity generation</title>
     <link rel="shortcut icon" href="img/favicon.jpeg">
            		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="robots" content="all">
	    
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" href="layouts/orgain/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/style.css" type="text/css">
		
		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
		<!--<link rel="shortcut icon" href="layouts/orgain/22.png">-->
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

            <link rel="stylesheet" type="text/css" href="layouts/orgain/css/table-responsive.css"> 
    </head>
    <body>
    
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.jpeg" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                <li><a href="my-cart.php"><i class="fa fa-shopping-bag"></i> <div id="load_qty"><span><?php echo $_SESSION['qnty'];?></span></div></a></li>
                     </ul>
                                            <?php
if(!empty($_SESSION['cart'])){
	?>
                            
                            <?php }?>
                        
                        
                        		 <?php
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

	?>
                        
               <?php } }?>         
                        <div class="header__cart__price">item: <span>Rs <?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                                	<?php if(strlen($_SESSION['login'])==0)
  {   ?>
<a href="login.php"><i class="fa fa-user"></i>Login &nbsp;&nbsp;|</a>

<?php }
else{ ?>
	<a href="logout.php"><i class="fa fa-user"></i>Logout | </a> 
		<?php } ?>
            </div>
            <div class="header__top__right__auth">
                 <!--<a href="track-orders.php"><i class="fa fa-truck"></i> Track Order</a>-->
                <a href="my-account.php"><i class="fa fa-user"></i>My Account </a>
            </div><br>
           <div class="header__top__right__auth">
                 
                <a href="order-history.php.php"><i class="fa fa-shopping-bag"></i>My Orders </a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
                <ul>
                <li class="active"><a href="index.php">Home</a></li>
            <li><a href="category.php?cid=31">Service</a>
                <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=85" style="color:#fff;margin-left:5px;">	Manual</a></li>
                        <li><a href="sub-category.php?scid=86" style="color:#fff;margin-left:5px;">Auto</a></li>
           
                        
                    </ul>
                </li>
                <li><a href="category.php?cid=30">Product Parts</a>
                    <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=84" style="color:#fff;margin-left:5px;">	Electronic Components</a></li>
                     
                    </ul>
                </li>
         
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> thermon@gmail.com.com</li>
                <?php if(strlen($_SESSION['login']))
    {   ?>
                                <li>Welcome - <b><?php echo htmlentities($_SESSION['username']);?></b></li>
                                  <?php } ?> 
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    
                    <?php 
//session_start();

?>



                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> thermon@gmail.com</li>
                                <?php if(strlen($_SESSION['login']))
    {   ?>
                                <li>Welcome - <b><?php echo htmlentities($_SESSION['username']);?></b></li>
                                  <?php } ?> 
                            </ul>
                        </div>
                    </div>
                 
                    
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                
                                                
                	<?php if(strlen($_SESSION['login'])==0)
  {   ?>
 
<a href="login.php"><i class="fa fa-user"></i>Login/Register |</a>

<?php }
else{ ?>
	<a href="logout.php"><i class="fa fa-user"></i>Logout |</a>
				<?php } ?>
				
				
                                
                            </div>
                           <!-- <div class="header__top__right__auth">
                                <a href="track-orders.php"><i class="fa fa-truck"></i>Track Order |</a>
                            </div>-->
                            <div class="header__top__right__auth">
                                <a href="my-account.php"><i class="fa fa-user"></i>My Account |</a>
                             </div>
                             <div class="header__top__right__auth">
                                <a href="order-history.php"><i class="fa fa-shopping-bag"></i>My Orders</a>
                             </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        
        <div class="container" style="margin-left:100px;">
            <div class="row">
               
                <div class="col-lg-6" style="width:103%;background:#EBECF0; ">
                    <nav class="header__menu">
                  <ul>
                <li class="active"><a href="index.php">Home</a></li>
            <li><a href="category.php?cid=31">Service</a>
                <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=85" style="color:#fff;margin-left:5px;">	Manual</a></li>
                        <li><a href="sub-category.php?scid=86" style="color:#fff;margin-left:5px;">Auto</a></li>
           
                        
                    </ul>
                </li>
                <li><a href="category.php?cid=30">Product Parts</a>
                    <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=84" style="color:#fff;margin-left:5px;">	Electronic Components</a></li>
                     
                    </ul>
                </li>
  
            </ul>        
        
                    </nav>
                </div>
              
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
     <br><br><br><br>
     
        <div id="wrapper">
          <table>
            <thead>
              <tr>
                  <th>S.No.</th>
				  <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Order Date</th>
                <th>Action</th>
              </tr>
            </thead>
        <tbody>	
        <?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
	
        
             <tr>
                <td data-label="S.No."><?php echo $cnt;?></td>
                <td data-label="Image"><img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="80" height="80"></td>
                <td data-label="Product"><a href="product-details.php?pid=<?php echo $row['opid'];?>"><?php echo $row['pname'];?></a></td>
                 <td data-label="Quantity"><?php echo $qty=$row['qty']; ?></td>
                 <?php $price=$row['pprice']; ?>
                   <td data-label="Total"><?php echo (($qty*$price));?></td>
                 <td data-label="Payment Method"><?php echo $row['paym']; ?></td>
                   <td data-label="Order Date"><?php echo $row['odate']; ?></td>
                    <td data-label="Track Order"><a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">Track</a></td>
              </tr>
<?php $cnt=$cnt+1;} ?>
            </tbody>
          </table>
        </div>  
        
            <!-- Js Plugins -->
    <script src="layouts/orgain/js/jquery-3.3.1.min.js"></script>
    <script src="layouts/orgain/js/bootstrap.min.js"></script>
    <script src="layouts/orgain/js/jquery-ui.min.js"></script>
    <script src="layouts/orgain/js/jquery.slicknav.js"></script>
    <script src="layouts/orgain/js/mixitup.min.js"></script>
    <script src="layouts/orgain/js/owl.carousel.min.js"></script>
    <script src="layouts/orgain/js/main.js"></script>
        
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
	<script src="assets/js/scripts.js"></script>

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
        
        
        
    </body>
</html>
<?php } ?>