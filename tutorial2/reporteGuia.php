<?php
include ('./pru_pdf.php');
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

$ID = $_GET['idCat'];

$sqldocumento = "SELECT
e.id_envio,
e.id_usuario,
u.nombre_us,
u.apellido_us,
u.n_documento_us,
e.id_destinatario,
d.nombre_destinatario,
d.apellido_destinatario,
d.telefono_des,
e.direccion,
e.id_destino,
ds.nombre_destino,
e.fecha_envio,
e.fecha_estimada,
tp.id_tipo_paquete,
ps.id_tipo_peso,
v.id_vehiculo,
e.peso,
e.dimensiones,
e.volumen,
e.pago
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
WHERE e.id_envio = $ID"; 
//echo $sql;
$EnvioResult = $conexion->query($sqldocumento);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
  }
  
  function generatePDF($data) {
    // Create a new PDF object
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(250,12, 'GUIA DE ENVIO',0,1, 'C');
    $pdf->Ln(10);
  
    // Set table headers
    $pdf->SetFillColor(232,232,230);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(40,12, 'CODIGO',1,0, 'C', 1);
    $pdf->Cell(40,12, 'Nombre ',1,0, 'C', 1);
    $pdf->Cell(40,12, 'Apellido',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Documento',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Nombre',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Apellido',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Telefono',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Destino',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Fecha Envio',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Fecha Estimada',1,1, 'C', 1);
    $pdf->Cell(40,12, 'Pago',1,1, 'C', 1);
  
    // Set font for data cells
    $pdf->SetFont('Arial','',12);
  
    // Loop through data and populate table cells
    foreach ($data as $row) {
      $pdf->Cell(40, 12, $row['id_envio'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['nombre_us'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['apellido_us'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['n_documento_us'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['nombre_destinatario'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['apellido_destinatario'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['telefono_des'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['nombre_destino'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['fecha_envio'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['fecha_estimada'], 1, 1, 'R');
      $pdf->Cell(40, 12, $row['pago'], 1, 1, 'R');
    }
  
    // Output the PDF document
    $pdf->Output();
  }

  ?>