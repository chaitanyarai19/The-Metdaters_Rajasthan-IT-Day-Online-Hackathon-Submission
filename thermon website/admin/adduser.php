<?php
session_start();
error_reporting(0);
include('include/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['username'];
$pass=$_POST['password'];
  echo md5($pass);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<center>
	<h1>Add admin</h1>
	<br>
	<form method="POST">
	<input type="text" name="username" placeholder="Enter Username"><br><br>
	<input type="text" name="password" placeholder="Enter password"><br>
	<br>
	<input type="submit" name="submit" value="submit" >
	</form>
</center>

</body>
</html>