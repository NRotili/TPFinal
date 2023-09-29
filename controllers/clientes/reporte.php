<?php

require_once '../../models/Cliente.php';
//fpdf
require_once '../../vendor/fpdf/fpdf.php';

$clientes = Cliente::all();


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Lista de clientes');

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Apellido', 1, 0, 'C', 0);
$pdf->Cell(120, 10, 'Email', 1, 0, 'C', 0);

$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
foreach ($clientes as $cliente) {
    $pdf->Cell(40, 10, $cliente->nombre, 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $cliente->apellidos, 1, 0, 'C', 0);
    $pdf->Cell(120, 10, $cliente->email, 1, 0, 'C', 0);
    $pdf->Ln();
}

$pdf->Output('I', date('dmY').'.pdf');