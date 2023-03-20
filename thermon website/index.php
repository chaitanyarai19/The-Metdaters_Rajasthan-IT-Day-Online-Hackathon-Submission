<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
    echo "$('#myModal').modal();";
	echo "<script>alert('Product has been added to the cart')</script>";
		// echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>

   
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="robots" content="all">

	    <title>Therm-on | Eco friendly electricity generation</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.jpeg">

<!--new-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"/>

    <!-- Css Styles -->

    <link rel="stylesheet" href="layouts/orgain/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="layouts/orgain/css/style.css" type="text/css">
<style>
    .row {
        margin-left:-5px;
         margin-right:-5px;
    }
</style>

	</head>
    <body class="cnt-home">
	
<?php include('aabb.php');?> 		

		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

<?php //include('includes/top-header.php');?>
<?php //include('includes/main-header.php');?>
<?php //include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php //include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			

<!-- Hero Section Begin -->
    <script type="text/javascript" src="layouts/orgain/js/jssor.slider.min.js"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $DragOrientation: 2,
              $PlayOrientation: 2,
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $Orientation: 2
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1130;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb031 {position:absolute;}
        .jssorb031 .i {position:absolute;cursor:pointer;}
        .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
        .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
        .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
        .jssorb031 .i.idn {opacity:.3;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <!--<div>
                <img data-u="image" src="../img/gallery/980x380/001.jpg" />
                <div style="position:absolute;top:57px;left:92px;width:400px;height:250px;z-index:0;background-color:rgba(255,188,5,0.8);font-size:16px;color:#ffffff;line-height:30px;text-align:left;padding:10px;box-sizing:border-box;">Settings <br /><br />
                    Layout -> Slide -> Orientation: Vertical<br /> 
                    Options -> Drag -> Orientation: Vertical
                </div>
            </div>-->
            <div>
                <a href="#"><img data-u="image" src="img/slider/slider 1.png" /></a>
            </div>
			<div>
                <img data-u="image" src="img/slider/slider 2.png" />
            </div>
			<div>
                <img data-u="image" src="img/slider/slider 3.png" />
            </div>
            <!--<div>-->
            <!--    <img data-u="image" src="assets/images/sliders/farm2.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="assets/images/sliders/farm3.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="assets/images/sliders/farm4.jpg" />-->
            <!--</div>-->
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="2" data-scale="0.5" data-scale-right="0.75">
            <div data-u="prototype" class="i" style="width:12px;height:12px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
			
			
			
			
			
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<!--<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/slider1.jpg);">
			
			</div>
		</div>
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider2.jpg);">
			</div>
		</div>
		
		 <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider3.jpg);">
			</div>
		</div>
		
		 <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider4.jpg);">
			</div>
		</div>
		
		 <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider5.jpg);">
			</div>
		</div>
		
		 <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider6.jpg);">
			</div>
		</div>

	</div>
</div>-->
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	
				<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
						     <i class="icon fa fa-check-circle-o"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading green">Quality Product</h4>
						</div>
					</div>	
					<!--<h6 class="text">All Brand Product Available</h6>-->
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-truck"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading orange">Quick Delivery</h4>
						</div>
					</div>
					<!--<h6 class="text">Same Day Delivery</h6>	-->
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-user-circle"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading red">Best Service</h4>
						</div>
					</div>
					<!--<h6 class="text">All items-sale up to 10% off </h6>	-->
				</div>
			</div><!-- .col -->
	
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->		
			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->
<br><br><br><br>
	

  <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3" style="width:500px;height:300px;">
                        <div class="categories__item set-bg" data-setbg="admin/productimages/1204/MQ2-1.png">
                            <h5><a href="#">Smoke mq2 sensor</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3" style="width:500px;height:300px;">
                        <div class="categories__item set-bg" data-setbg="admin/productimages/1207/A_few_Jumper_Wires.jpg">
                            <h5><a href="#">Jumpher wire</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3" style="width:500px;height:300px;">
                        <div class="categories__item set-bg" data-setbg="admin/productimages/1202/61UOyRccN0L._SX342_.jpg">
                            <h5><a href="#">Node mcu esp8266</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3" style="width:500px;height:300px;">
                        <div class="categories__item set-bg" data-setbg="admin/productimages/1201/electrolytic-capacitor-500x500.jpg">
                            <h5><a href="#">Capacitor</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3" style="width:500px;height:300px;">
                         <div class="categories__item set-bg" data-setbg="admin/productimages/1196/175_21-0058_UT_6.webp">
                            <h5><a href="#">Heating sensor</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

<!--<section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=14" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/93/412TbDp8+mL (1).jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fortune sunlight refine oil </h6>
                                       </span> <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=14" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/94/81y1VIW4pbL._SL1500_.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fortune rice bran health </h6>
                                       <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=14" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/95/518p92TkXqL._AC_UL600_SR600,600_.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fortune khachi ghani oil </h6>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=21" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/125/fogg_voyager_body_spray.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fogg Master Voyager Body Spray</h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=21" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/158/FoggNapoleanBodySpray.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fogg Napolean Body Spray</h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=21" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/127/FoggMasterCedarBodySpray.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>fog master cidar body spray</h6>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=31" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/23/41LlTn9pSmL.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Khana khazana mango pickle nilons </h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=31" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/191/MothersRecipeMixedPickle.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> Mother's recipe mixed pickle</h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=31" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/141/MIX FRUIT JAM  500G NILONS.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Mixed fruit jam nilons</h6>
                                         <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=33" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/22/61rnn7q+KXL._SL1500_.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Mountain dew</h6>
                                       <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=33" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/24/71Z1QcRLPyL._SR500,500_.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Pepsi</h6>
                                    <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=33" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/25/71+6kdHK1vL._SL1500_.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Miranda</h6>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=19" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/100/69a45ae4005900581532new.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>nivea cherry blosssom</h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=19" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/101/Nivea-Fruity-Lip-Care-Tube-SDL859616152-1-ec701-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nivea fruit lipbam</h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=19" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/102/1dde5ae4005808954711new.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nivea fresh powder charged deo</h6>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="sub-category.php?scid=20" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/175/h&s_antihairfall_180ml.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Head and shoulders anti dandruff shampoo </h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=20" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/164/h&s_coolmenthol650ml.webp" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Head and shoulders adds  cool minthol shampoo </h6>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="sub-category.php?scid=20" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width:200px;height:150px;" src="admin/productimages/139/h&s ads lemon fresh 340 ml.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Head and shoulders adds lemon fresh </h6>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Latest Product Section End -->



		




<?php //include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
	
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
	
	    
    <!-- Js Plugins -->
    <script src="layouts/orgain/js/jquery-3.3.1.min.js"></script>
    <script src="layouts/orgain/js/bootstrap.min.js"></script>
    <script src="layouts/orgain/js/jquery-ui.min.js"></script>
    <script src="layouts/orgain/js/jquery.slicknav.js"></script>
    <script src="layouts/orgain/js/mixitup.min.js"></script>
    <script src="layouts/orgain/js/owl.carousel.min.js"></script>
    <script src="layouts/orgain/js/main.js"></script>
	
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

	

</body>
</html>