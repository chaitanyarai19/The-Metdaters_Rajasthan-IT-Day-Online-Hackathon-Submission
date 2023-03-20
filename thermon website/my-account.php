<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}


date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
    $sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
     $con=mysqli_query($con,"update users set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
    echo "<script>alert('Password Changed Successfully !!');</script>";
    }
    else
    {
    	echo "<script>alert('Current Password not match !!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
			<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="robots" content="all">

	    <title>Therm-on | Eco friendly electricity generation</title>
     <link rel="shortcut icon" href="img/favicon.jpeg">
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
		<!--<link rel="shortcut icon" href="layouts/orgain/22.png">-->

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
		@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 380px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 380px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #f5a700;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #f5a700;
  text-decoration: none;
}
.form .register-form {
  display: none;
}

.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}

	</style>
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
</head>
<body>
<?php include("aabb.php"); ?>
<center><div style="background:#f5a700;width:390px;">
<div class="login-page">
  <div class="form">


    <form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
	<b><u><h2>Change password</h2></u></b><br>
      <input type="password" id="cpass" name="cpass" required="required" placeholder="Current password"/>
      <input type="password" id="newpass" name="newpass" placeholder="password"/>
      <input type="password" id="cnfpass" name="cnfpass" required="required" placeholder="Confirm password"/>
      <button type="submit" name="submit">Change Password</button>
      <p class="message" style="font-size:18px;"><a href="#">My Profile</a></p>
    </form>
      	<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
    <form class="login-form" method="post">
	<b><u><h2>My Profile</h2></u></b><br>
      <input type="text" value="<?php echo $row['fname'];?>" id="name" name="name" required="required" placeholder="Full Name"/>
      <input type="email" id="exampleInputEmail1" value="<?php echo $row['email'];?>"  placeholder="Email Address" readonly/>
      <input type="text" id="contactno" name="contactno" required="required" value="<?php echo $row['phone'];?>"  maxlength="10" placeholder="Contact Number"/>
      <button type="submit" name="update">Update</button>
      <p class="message" style="font-size:18px;"><a href="#">Change Password</a></p>
    </form>
    <?php } ?>
  </div>
</div>
</div></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<?php include('includes/footer.php');?>
   <script src="layouts/orgain/js/jquery-3.3.1.min.js"></script>
    <script src="layouts/orgain/js/bootstrap.min.js"></script>
    <script src="layouts/orgain/js/jquery-ui.min.js"></script>
    <script src="layouts/orgain/js/jquery.slicknav.js"></script>
    <script src="layouts/orgain/js/mixitup.min.js"></script>
    <script src="layouts/orgain/js/owl.carousel.min.js"></script>
    <script src="layouts/orgain/js/main.js"></script>
    
</body>
</html>
<?php } ?>