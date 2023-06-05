<?php
require('../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN SEMUA DATA MATAKULIAH', 0, 10, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'ID', 1, 0);
$pdf->Cell(20, 6, 'KODE', 1, 0);
$pdf->Cell(50, 6, 'Nama', 1, 0);
$pdf->Cell(100, 6, 'SKS', 1, 0);
$pdf->Cell(50, 6, 'SEMESTER', 1, 1);
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($con, "SELECT * FROM matakuliah");
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, $data['id'], 1, 0);
    $pdf->Cell(20, 6, $data['kode'], 1, 0);
    $pdf->Cell(50, 6, $data['nama'], 1, 0);
    $pdf->Cell(100, 6, $data['sks'], 1, 0);
    $pdf->Cell(50, 6, $data['semester'], 1, 1);
}
$pdf->Output();
