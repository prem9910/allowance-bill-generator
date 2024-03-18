<?php 
include('config.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];
$sql_users = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($sql_users);

$sql_travel = mysqli_query($con,"SELECT * FROM travel_information WHERE id='$id'");
$travel = mysqli_fetch_assoc($sql_travel);

$sql_hotel = mysqli_query($con,"SELECT * FROM hoteldetails WHERE id='$id'");
$hotel = mysqli_fetch_assoc($sql_hotel);


// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('details_pdf.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('B4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
header('Content-Type: application/pdf');
// header('Content-Disposition: inline; filename="print-details.pdf"');

// Output the generated PDF to Browser
echo $dompdf->output();
