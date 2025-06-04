<?php
session_start();
require('../../vendor/fpdf.php');
include("../../config/config.php");

if (!isset($_GET['id'])) {
    die('ID de factura no proporcionado');
}

$factura_id = (int)$_GET['id'];

// Obtener datos de la factura
$sql = "SELECT f.*, df.*, u.nombre_usuario, u.email 
        FROM facturas f 
        JOIN datos_facturacion df ON f.datos_facturacion_id = df.id 
        JOIN usuarios u ON f.usuario_id = u.id 
        WHERE f.id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $factura_id);
$stmt->execute();
$factura = $stmt->get_result()->fetch_assoc();

if (!$factura) {
    die('Factura no encontrada');
}

class PDF extends FPDF {
    function Header() {
        // Logo
        $this->Image('../../public/img/logoLimanprofSB.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'FACTURA',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Creación del PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

// Información de la empresa
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'LIMANPROF',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,'RFC: XXX000000XXX',0,1);
$pdf->Cell(0,10,'Dirección: Dirección de la empresa',0,1);
$pdf->Cell(0,10,'Tel: (555) 555-5555',0,1);
$pdf->Ln(10);

// Información del cliente
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'FACTURAR A:',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,$factura['nombre_completo'],0,1);
$pdf->Cell(0,10,'RFC: '.$factura['rfc'],0,1);
$pdf->Cell(0,10,$factura['direccion'],0,1);
$pdf->Cell(0,10,$factura['ciudad'].', '.$factura['estado'].'. CP: '.$factura['codigo_postal'],0,1);
$pdf->Ln(10);

// Detalles de la factura
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'Factura:',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,$factura['numero_factura'],0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'Fecha:',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,date('d/m/Y', strtotime($factura['fecha'])),0,1);

// Tabla de conceptos
$pdf->Ln(10);
$pdf->SetFillColor(240,240,240);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,10,'Concepto',1,0,'C',true);
$pdf->Cell(30,10,'Cantidad',1,0,'C',true);
$pdf->Cell(40,10,'Precio Unit.',1,0,'C',true);
$pdf->Cell(40,10,'Importe',1,1,'C',true);

// Obtener detalles
$sql = "SELECT * FROM detalles_factura WHERE factura_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $factura_id);
$stmt->execute();
$detalles = $stmt->get_result();

$pdf->SetFont('Arial','',10);
while ($detalle = $detalles->fetch_assoc()) {
    $pdf->Cell(80,10,$detalle['concepto'],1,0);
    $pdf->Cell(30,10,$detalle['cantidad'],1,0,'C');
    $pdf->Cell(40,10,'$'.number_format($detalle['precio_unitario'],2),1,0,'R');
    $pdf->Cell(40,10,'$'.number_format($detalle['subtotal'],2),1,1,'R');
}

// Totales
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,10,'Subtotal:',0,0,'R');
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,'$'.number_format($factura['subtotal'],2),0,1,'R');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,10,'IVA (16%):',0,0,'R');
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,'$'.number_format($factura['iva'],2),0,1,'R');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,10,'Total:',0,0,'R');
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,'$'.number_format($factura['total'],2),0,1,'R');

// Generar el PDF
$pdf->Output('Factura-'.$factura['numero_factura'].'.pdf', 'D');
?>
<script>
window.location.href = 'process/generar_pdf_factura.php?id=' + <?php echo $factura_id; ?>;
</script>
