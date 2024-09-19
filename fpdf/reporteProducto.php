<?php

require('./fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../static/img/aquashine.png', 10, 10, 40);
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(13, 71, 161);
        $this->Cell(0, 10, utf8_decode("REPORTE DE PRODUCTOS"), 0, 1, 'C');
        $this->Ln(10);
    }

    function TablaHeader()
    {
        $this->SetFillColor(96, 165, 250);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 12);

        $widths = [70, 50, 35, 25, 35];
        $totalWidth = array_sum($widths);
        $pageWidth = 297;
        $margin = ($pageWidth - $totalWidth) / 2;

        $this->SetX($margin);
        $this->Cell($widths[0], 10, utf8_decode('NOMBRE'), 1, 0, 'C', true);
        $this->Cell($widths[1], 10, utf8_decode('DESCRIPCIÓN'), 1, 0, 'C', true);
        $this->Cell($widths[2], 10, utf8_decode('CATEGORÍA'), 1, 0, 'C', true);
        $this->Cell($widths[3], 10, utf8_decode('PRECIO'), 1, 0, 'C', true);
        $this->Cell($widths[4], 10, utf8_decode('PROVEEDOR'), 1, 1, 'C', true);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(96, 165, 250);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Ln(5);
        $this->Cell(0, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage('L');
$pdf->AliasNbPages();

include '../config/conexion.php';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$pdf->TablaHeader();

$sql = "
    SELECT p.nom_producto, p.prod_descrp, p.categoria_prod_idcat, p.precio, pr.Nombre as proveedor 
    FROM productos p
    JOIN proveedores pr ON p.FK_proveedores = pr.idProveedores
";
$consulta_productos = $conn->query($sql);

if ($consulta_productos === FALSE) {
    die("Error en la consulta: " . $conn->error);
}

if ($consulta_productos->num_rows > 0) {
    $widths = [70, 50, 35, 25, 35];
    $totalWidth = array_sum($widths);
    $pageWidth = 297;
    $margin = ($pageWidth - $totalWidth) / 2;

    while ($producto = $consulta_productos->fetch_object()) {
        $pdf->SetX($margin);
        $pdf->Cell($widths[0], 10, utf8_decode($producto->nom_producto), 1, 0, 'C', 0);
        $pdf->Cell($widths[1], 10, utf8_decode($producto->prod_descrp), 1, 0, 'C', 0);
        $pdf->Cell($widths[2], 10, utf8_decode($producto->categoria_prod_idcat), 1, 0, 'C', 0);
        $pdf->Cell($widths[3], 10, utf8_decode('$' . number_format($producto->precio, 2)), 1, 0, 'C', 0);
        $pdf->Cell($widths[4], 10, utf8_decode($producto->proveedor), 1, 1, 'C', 0);
    }
} else {
    $pdf->SetX($margin);
    $pdf->Cell(array_sum($widths), 10, utf8_decode('No se encontraron productos.'), 1, 1, 'C', 0);
}

$pdf->Output('reporteProducto.pdf', 'I');
?>
