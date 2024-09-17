<?php

require('../lib/fpdf/fpdf.php');
include('session.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_assignment'])) {
    $idAssignment = $_POST['id_assignment'];

    // Realizar la consulta a la base de datos
    $sql = "SELECT *, householder.name AS namehouseholder, householder.last_name AS householderlast,
            user.username AS username, user.last_name AS lastnameuser
            FROM householder
            JOIN assignment ON householder.id_territorio = assignment.id_territorio
            JOIN territorio ON assignment.id_territorio = territorio.id_territorio
            JOIN sector ON territorio.id_sector = sector.id_sector
            LEFT JOIN study ON householder.id_householder = study.id_householder
            LEFT JOIN user ON study.id_user = user.id_user
            WHERE assignment.id_assignment = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $idAssignment);
            $stmt->execute();
            $result = $stmt->get_result();

    // Crear un nuevo PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetFont('Arial', 'B', 8);
$maxTablesPerPage = 2;
$tableCount = 0;

// Iterar a través de los resultados de la consulta
while ($row = $result->fetch_assoc()) {
    if ($tableCount % $maxTablesPerPage == 0) {
        // Añadir una nueva página cada 2 tablas
        $pdf->AddPage('P');
    }

    // Añadir los datos de la fila como una tabla
    $pdf->Cell(130, 8, 'Nombre Completo: ', 1, 0,'C');
    $pdf->Cell(50, 8, 'Territorio #: ', 1, 1,'C');
    $pdf->Cell(130, 8, $row['namehouseholder'] .' '.$row['householderlast'], 1, 0,'C');
    $pdf->Cell(50, 8, $row['codigo'], 1, 1,'C');
    $pdf->Cell(60, 8, utf8_decode('Año de Nacimiento: '), 1, 0,'C');
    $pdf->Cell(40, 8, $row['date_birth'], 1, 0,'C');
    $pdf->Cell(30, 8, 'Telefono: ', 1, 0,'C');
    $pdf->Cell(50, 8, $row['phone'], 1, 1,'C');
    $pdf->Cell(90, 8, 'Sector: ', 1, 0,'C');
    $pdf->Cell(90, 8, utf8_decode('Dirección exacta: '), 1, 1,'C');
    $pdf->Cell(90, 15, $row['sector_name'], 1, 0,'C');
    $pdf->Cell(90, 15, $row['direccion'], 1, 1,'C');
    $pdf->Cell(120, 8, 'Tipo de Sordera: ', 1, 0,'C');
    $pdf->Cell(60, 8, utf8_decode('Código QR: '), 1, 1,'C');
    $pdf->Cell(120, 8, $row['sordera'], 1, 1,'C');
    $pdf->Cell(120, 8, 'Estudia con: ', 1, 1,'C');
    $pdf->Cell(120, 8, $row['username'] .' '.$row['lastnameuser'], 1, 1,'C');
    $pdf->Cell(120, 8, utf8_decode('Información Adicional: '), 1, 1,'C');
    $pdf->Cell(120, 15, $row['observation'], 1, 1,'C');

    // Posicionar la imagen debajo del código QR
    $yPosition = $pdf->GetY()-45; // Ajusta el valor para controlar la distancia entre la celda y la imagen
    
    // Comprobar si hay una imagen asociada o usar una imagen predeterminada
    if (!empty($row['img'])) {
        // Verificar si la imagen existe antes de intentar cargarla
        $imgPath = '../address/' . $row['img'];
        if (file_exists($imgPath)) {
            $pdf->Image($imgPath, 140, $yPosition, 45, 45);
        } else {
            // Si el archivo especificado no existe, usar una imagen predeterminada
            $pdf->Image('../img/photo.jpg', 140, $yPosition, 45, 45);
        }
    } else {
        // Si el campo img está vacío, usar una imagen predeterminada
        $pdf->Image('../img/photo.jpg', 140, $yPosition, 45, 45);
    }
    $pdf->Ln(30); // Espacio después de la imagen
    
    $tableCount++;
}


// Cerrar la conexión a la base de datos
$conn->close();
    

// Agregar una imagen
/*
$pdf->Image('../img/photo.jpg', 10, $pdf->GetY() + 10, 30);
*/

$pdf->Output('D', 'document.pdf');
} else {
    echo "Solicitud no válida.";
}

?>