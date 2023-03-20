
<?php 
//include("header.php");
session_start();
include('includes/config.php');
//foreach($_SESSION['ppid'] as $value ->$key)
//{
 //   mysqli_query($con,'update orders set orderStatus=confirm where id='.$key);
//}

unset($_SESSION['cart']);
unset($_SESSION['qnty']);

?>
  
<!DOCTYPE html>     
<html>		  
	<head>	  
	<title>success</title>
 <style>
	     @media screen and (max-width: 2000px) {
            .map_1 {
          max-width:600px;
          
          }
   }
 @media screen and (max-width: 1200px) {
            .map_1 {
          max-width:600px;
          
          }
 
   }

       @media screen and (max-width: 630px) {
  .map_1 {
    max-width:500px;
  }

}
	</style>
	
</head>
<body>
    
<center>
	<div class="map_1"  style="box-shadow: 0px 0px 10px #666666;border-radius: 20px; align-items: center; margin-top: 50px; height:400px;">
		
				<center><img src="img/tenor.gif"></center>
					<h1><b>Your Order Is Confirmed</b></h1>
<h2>Thanks For Shopping With Us. !!!!</h2>

        <!--<h2>Your Order ID :- <span style="color:green;">20AIOGS06</span></h2>-->

    </div>
</center>

    <!--<div class="row" style="margin-top:10px;">
      <div class="small-12">
          
          <?php 
           /* if (empty($_GET["msg"])){
                echo "<h1><b>Success</b></h1><p>You have purchased a product, then please check your email for the receipt.</p>";
            }else{
                echo "<h1>Attention</h1><p>". $_GET["msg"] ."</p>";
            }*/
          ?>
      </div>
    </div>-->
 <script>
         setTimeout(function(){
            window.location.href = 'index.php';
         }, 4000);
      </script>
      

      
</body>
</html>
