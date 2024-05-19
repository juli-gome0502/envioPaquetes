<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Envío</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #e8e8e8;
        }
    </style>
</head>
<body>
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

echo $ID;
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
    foreach ($EnvioResult as $row) {

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
    <h1 style="text-align: center;">GUIA DE ENVIO</h1>
    <table>
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Destino</th>
                <th>Fecha Envio</th>
                <th>Fecha Estimada</th>
                <th>Pago</th>
            </tr>
            <?php 
            
            foreach ($EnvioResult as $fila) {

                ?>
            <tr>
                    <td><?php echo $fila['id_envio']; ?></td>
                    <td><?php echo $fila['nombre_us']; ?></td>
                    <td><?php echo $fila['apellido_us']; ?></td>
                    <td><?php echo $fila['n_documento_us']; ?></td>
                    <td><?php echo $fila['nombre_destinatario']; ?></td>
                    <td><?php echo $fila['apellido_destinatario']; ?></td>
                    <td><?php echo $fila['telefono_des']; ?></td>
                    <td><?php echo $fila['nombre_destino']; ?></td>
                    <td><?php echo $fila['fecha_envio']; ?></td>
                    <td><?php echo $fila['fecha_estimada']; ?></td>
                    <td><?php echo $fila['pago']; ?></td>

                    <?php } ?>

        </thead>
        <tbody>
            <!-- Aquí deberías insertar los datos del envío -->
            <!-- Por ejemplo: -->
            <!-- <tr>
                <td>123456</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Documento</td>
                <td>Destinatario</td>
                <td>Apellido Destinatario</td>
                <td>123456789</td>
                <td>Destino</td>
                <td>2024-05-19</td>
                <td>2024-05-25</td>
                <td>$100</td>
            </tr> -->
        </tbody>
    </table>
</body>
</html>
