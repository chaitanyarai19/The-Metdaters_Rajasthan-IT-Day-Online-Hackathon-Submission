<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
function pdf($user)
{
include('includes/config.php');
$res=mysqli_query($con,'SELECT * FROM users WHERE id='.$user);
$row=mysqli_fetch_row($res);
$name=$row[1];
$email=$row[2];
$phone=$row[3];
$address=$row[5].','.$row[6].','.$row[7].','.$row[8].','.$row[9].','.$row[10].','.$row[11].','.$row[12];
$res=mysqli_query($con,'SELECT * from orders WHERE userId='.$user);
$row=mysqli_fetch_row($res);
$product=$row[2];
$res=mysqli_query($con,'SELECT * FROM products WHERE id='.$product);
$row=mysqli_fetch_row($res);
$productname=$row[3];
$invoice=rand(10,1000);
$date=date('d-m-y');
$dompdf = new Dompdf();
$html='<!DOCTYPE html>
<html>
<body>
    <head>
        <style>
            #left{margin-left: 50px;}
            #right{padding-left: 150px;}
            table{margin-top: 150px;}
            h3{color:#d1e0e0;font-size: 28px;}
            h2{margin-top: 200px;}
        </style>
    </head>
<table align="center">
<tr>
	<td id="left"><h3>INVOICE TO:</h3></td>
	<td id="right"><h3>INVOICE  FROM:</h3></td>
</tr>
<tr>
	<td id="left">User Name</td>
	<td id="right">:'.$name.'</td>
</tr>
<tr>
	<td id="left">User Address</td>
	<td id="right">:'.$address.'</td>
</tr>
<tr>
	<td id="left">User Email</td>
	<td id="right">:'.$email.'</td>
</tr>
<tr>
	<td id="left">User Phone</td>
	<td id="right">:'.$phone.'</td>
</tr>
<tr>
	<td id="left">INVOICE ID:-</td>
	<td id="right">:'.$invoice.'</td>
</tr>
<tr>
	<td id="left">INVOICE DATE:-</td>
	<td id="right">:'.$date.'</td>
</tr>
</table>
<center><h4>Product details</h4></center>
<center><p align="justify">'.$productname.'</p></center>
<center><h2>Thank You</h2></center>
</body>
</html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream('bill',array('Attachment' =>1));
exit();
}
?>


