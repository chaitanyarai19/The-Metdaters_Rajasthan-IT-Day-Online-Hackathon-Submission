<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therm-on | Eco friendly electricity generation</title>
     <link rel="shortcut icon" href="img/favicon.jpeg">

  
    <link rel="stylesheet" href="layouts/orgain/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/style.css" type="text/css">
    
     <style>
.block {
  display: block;
  width: 160px;
  border: none;
  background-color: #f5a700;
  color: white;
  padding: 12px 16px;
  font-size: 14px;
  cursor: pointer;
  text-align: center;
}

</style>
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
                 
                <a href="order-history.php"><i class="fa fa-shopping-bag"></i>My Orders </a>
            </div>

            
        </div>
        <nav class="humberger__menu__nav mobile-menu">
                <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="category.php?cid=7">Service</a>
                <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=13" style="color:#fff;margin-left:5px;">	Manual</a></li>
                        <li><a href="sub-category.php?scid=14" style="color:#fff;margin-left:5px;">Auto</a></li>
           
                        
                    </ul>
                </li>
                <li><a href="category.php?cid=8">Product Parts</a>
                    <ul class="header__menu__dropdown" style="background:#252525;;">
                        <li><a href="sub-category.php?scid=30" style="color:#fff;margin-left:5px;">	Electronic Components</a></li>
                     
                    </ul>
                </li>
              
            
            </ul>
        </nav>
        
        
        <div id="mobile-menu-wrap"></div>
        <!--<form method="#" action="#">
        <button class="block" type="submit">Upload List</button>
        </form>-->
        <br>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> thermon@gmail.com</li>
                <?php if(strlen($_SESSION['login']))
    {   ?>
                                <li>Welcome - <b><?php echo htmlentities($_SESSION['fname']);?></b></li>
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
                                <li>Welcome - <b><?php echo htmlentities($_SESSION['fname']);?></b></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3" >
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.jpeg" alt="" style="width:70%;"></a>
                    </div>
                </div>
                <section class="hero hero-normal">
                    
                    
        <div class="container">
            <div class="row">
             <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="my-wishlist.php"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="my-cart.php"><i class="fa fa-shopping-bag"></i><div id="load_qty2"> <span  ><?php echo $_SESSION['qnty'];?></span></div></a></li>
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
                </div>
                
                
                <div class="col-lg-9" style="width:100%;">
                    
                    <div class="hero__search">
                       
                        <div class="hero__search__form">
                            
                            <form name="search" method="post" action="search-result.php">
                                   <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text"  name="product" placeholder="What do yo u need?">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        
                            <div class="hero__search__phone" style="#">
                           <div class="hero__search__phone__icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                            <div class="hero__search__phone__text">
                      
                        <a class="block" href="https://wa.me/+917089442547?text= Hello Team Thermon!!">Connect on whatsapp</a>
                      
                                
                            </div>
                        </div>
                       
                       <!-- <div class="hero__search__phone">
                            
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-clipboard"></i>
                            </div>
                            <div class="hero__search__phone__text">
                        <form method="#" action="#">
                        <button class="block" type="submit">Upload List</button>
                        </form>
                           
                            </div>
                        </div>-->
                    </div>
                </div>
                
            </div>
        </div>
    </section>
                
                
                
                
                <div class="col-lg-6" style="width:103%;background:#EBECF0;">
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
     <br>
     
    <!-- Hero Section Begin -->
    
    <!-- Hero Section End -->


    



</body>

</html>
</html>