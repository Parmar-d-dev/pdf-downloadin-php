<?php
include 'db.php';
require('fpdf/fpdf.php');

//Check for connection error
if ($conn->connect_error) {
    die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}
// Select data from MySQL database
$select = "SELECT * FROM `users`";
$result = $conn->query($select);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Add header
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Name', 1);
$pdf->Cell(80, 10, 'Email', 1);
$pdf->Cell(40, 10, 'Phone', 1);
$pdf->Ln();

while ($row = $result->fetch_object()) {
    $id = $row->id;
    $name = $row->name;
    $email = $row->email;
    $phone = $row->phone;
    $pdf->Cell(20, 10, $id, 1);
    $pdf->Cell(40, 10, $name, 1);
    $pdf->Cell(80, 10, $email, 1);
    $pdf->Cell(40, 10, $phone, 1);
    $pdf->Ln();
}
$pdf->Output();
?>