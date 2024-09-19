<?php

require('./fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../static/img/aquashine.png', 90, 10, 40); // Centered logo
        $this->Ln(30); // Space after the logo
    
        // Subtitle
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, utf8_decode("REPORTE DE PROVEEDORES"), 0, 1, 'C', true); // Centered subtitle
        $this->Ln(10); // Space after subtitle

        // Table Header
        $this->SetFillColor(96, 165, 250); // Tailwind color: bg-blue-400
        $this->SetTextColor(255, 255, 255); // White text
        $this->SetDrawColor(255, 255, 255); // White border
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(60, 10, utf8_decode('NOMBRE'), 1, 0, 'C', true);
        $this->Cell(80, 10, utf8_decode('EMAIL'), 1, 0, 'C', true);
        $this->Cell(50, 10, utf8_decode('TELÉFONO'), 1, 1, 'C', true);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(96, 165, 250); // Tailwind color: bg-blue-400
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(96, 165, 250); // Tailwind color: bg-blue-400
        $hoy = date('d/m/Y');
        $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

// Crear el PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages(); // Páginas totales

// Conectar a la base de datos
include '../config/conexion.php';
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); // Gray border

// Consulta para traer los proveedores
$consulta_proveedores = $conn->query("SELECT Nombre, email, telefono FROM proveedores");

// Mostrar los datos en el PDF
while ($proveedor = $consulta_proveedores->fetch_object()) {
    $pdf->Cell(60, 10, utf8_decode($proveedor->Nombre), 1, 0, 'C', 0);
    $pdf->Cell(80, 10, utf8_decode($proveedor->email), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($proveedor->telefono), 1, 1, 'C', 0);
}

// Salida del PDF
$pdf->Output('ReporteProveedores.pdf', 'I');
?>
