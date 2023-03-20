<?php
session_start();
include('../../include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
header('location:../../index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$user_id=$_GET['uid'];
$query1=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,
users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,
users.shippingPincode as shippingpincode,products.productName as productname,
products.shippingCharge as shippingcharge,orders.quantity as quantity,
orders.paymentMethod as paymentMethod,orders.orderDate as orderdate,
products.productPrice as productprice,orders.id as id  from orders join users on  
orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to' and users.id=$user_id");
$row1=mysqli_fetch_array($query1);


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
	$image_file = K_PATH_IMAGES.'logo_example.jpg';
	$this->Image($image_file, 30, 30, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		
		$this->Cell(0, 30, 'APNA KIRANAS', 30, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->SetX(-15);
	}
// Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 6);
        // Page number
        
        $this->Cell(0, 8, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Print Bill');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 14, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();



$html.='<table cellspacing="0" style="border-spacing:0;border-collapse: collapse;border: 1px solid #009efb;">
<tr style="line-height: 30px;color:white;background-color:#009efb;">
<td width="100%" style="border: 1px solid #009efb;color:white;" align="center"><b>BILL</b></td>

</tr>

</table>
<br>
<table cellspacing="0" >
<tr>
<td width="50%" >

To<br>
'.$row1['username'].'<br>
'.htmlentities($row1['shippingaddress'].",".$row1['shippingcity'].",".$row1['shippingstate']."-".$row1['shippingpincode']).'<br>
'.$row1['useremail'].'/'.$row1['usercontact'].'<br>

</td>
<td width="50%" align="right">
<br><br><br>
Date: '.$row1['orderdate'].'
</td>
</tr>
</table>
<br>
<table cellspacing="0" style="border-spacing:0;border-collapse: collapse;border: 1px solid black;">
<tr style="line-height:30px;">
	<th align="center" style="border: 1px solid black;" width="10%"><b>SL No</b></th>
	<th align="center" style="border: 1px solid black;" width="55%"><b>Product name</b></th>
	<th align="center" style="border: 1px solid black;" width="15%"><b>Quantity</b></th>
	
	<th align="center" style="border: 1px solid black;" width="20%"><b>Price</b></th>
</tr>';
$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$user_id=$_GET['uid'];
$query=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,
users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,
users.shippingPincode as shippingpincode,products.productName as productname,
products.shippingCharge as shippingcharge,orders.quantity as quantity,
orders.paymentMethod as paymentMethod,orders.orderDate as orderdate,
products.productPrice as productprice,orders.id as id  from orders join users on  
orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to' and users.id=$user_id");

                                    
									$i=1;
									$price=0;
									while($row=mysqli_fetch_array($query))
									{
									    
										$medicine_id=$row['medicine_id'];
										$html .='<tr style="line-height:30px;">
											<td style="border: 1px solid black;" width="10%">'.$i.'</td>
											<td style="border: 1px solid black;" width="55%">'.$row['productname'].'</td>
											<td width="15%" style="border: 1px solid black;" align="right">'.$row['quantity'].'</td>
											<td style="border: 1px solid black;" width="20%" align="right">
											'.$row['productprice'].'
											</td>
											</tr>';
										$price=$price+$row['productprice'];
										$i++;
									}
                                       $html.='<tr style="line-height:30px;">
											
											
											<td  width="10%"></td>
											
											<td  width="55%"></td>
											<td style="border: 1px solid black;" width="15%" align="right">Delivery </td>
											<td style="border: 1px solid black;" width="20%" align="right">'.number_format(20,2).'</td>
										</tr>';
                                       $html.='<tr style="line-height:30px;">
											
											
											<td  width="10%"></td>
											
											<td  width="55%"></td>
											<td style="border: 1px solid black;" width="15%" align="right">Sub Total</td>
											<td style="border: 1px solid black;" width="20%" align="right">'.number_format($price+20,2).'</td>
										</tr>';

                                    

$html.='</table>';




										




$pdf->setPage(1, true);
$pdf->writeHTML($html, true, false, true, false, '');


// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('print.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
