<?php
require('fpdf.php');
include('includes/dbconnection.php');

$cid = $_GET['viewid'];

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Payment Receipt', 0, 1, 'C');
        $this->Ln(10);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Fetch receipt data
$ret = mysqli_query($con, "SELECT * FROM tblapplication WHERE ID='$cid'");
$row = mysqli_fetch_array($ret);

if ($row['TakenFor'] == "Family Member") {
    $fullName = $row['FullName'];
    $email = $row['Email'];
    $mobileNumber = $row['MobileNumber'];
} else {
    $fullName = $row['FirstName'] . ' ' . $row['LastName'];
    $email = $row['uemail'];
    $mobileNumber = $row['umobno'];
}

$pdf->Cell(0, 10, 'Registration Number: ' . $row['RegNumber'], 0, 1);
$pdf->Cell(0, 10, 'Full Name: ' . $fullName, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Mobile Number: ' . $mobileNumber, 0, 1);
$pdf->Cell(0, 10, 'Package Name: ' . $row['PackageName'], 0, 1);
$pdf->Cell(0, 10, 'Package Duration: ' . $row['PackageDuration'], 0, 1);
$pdf->Cell(0, 10, 'Package Price: ' . $row['PackagePrice'], 0, 1);
$pdf->Cell(0, 10, 'Status: ' . ($row['astatus'] == "" ? "Pending" : $row['astatus']), 0, 1);

// Fetch payment history
$ret1 = mysqli_query($con, "SELECT * FROM tblpaymenthistory WHERE ApplicationID='$cid'");
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Payment History:', 0, 1);

while ($result = mysqli_fetch_array($ret1)) {
    $pdf->Cell(0, 10, 'Remark: ' . $result['Remark'] . ' | Amount: ' . $result['PaymentAmount'] . ' | Status: ' . $result['PaymentStatus'] . ' | Date: ' . $result['PaymentDate'], 0, 1);
}

$pdf->Output();
?>
