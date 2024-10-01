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
    $pdf->Cell(90, 8, 'Sector: ', 1, 0,'C');
    $pdf->Cell(90, 8, utf8_decode('Dirección exacta: '), 1, 1,'C');
    $pdf->Cell(90, 16, $row['sector_name'], 1, 0,'C');

    // Crear una celda fija de 16 para la dirección
    $x = $pdf->GetX(); // Guardar la posición actual X
    $y = $pdf->GetY(); // Guardar la posición actual Y

    // Dibujar el borde de la celda de tamaño fijo (90 de ancho y 16 de alto)
    $pdf->MultiCell(90, 8, '', 1); // Dibuja la celda vacía con borde

    // Regresar a la posición original
    $pdf->SetXY($x, $y);

    // Crear una MultiCell para la dirección
    $pdf->MultiCell(90, 4, utf8_decode($row['direccion']), 0, 'C');

    // Después de agregar el contenido, ajustar la posición Y
    $pdf->SetXY($x + 90, $y + 16); // Mover la posición actual de acuerdo con la altura de la

    // Aquí se asegura que después de todo lo anterior, el QR se dibuje correctamente en la siguiente línea.
    $pdf->Ln(0); // Añadir espacio para que la siguiente celda no se sobreponga
    $pdf->Cell(120, 8, 'Estudia con: ', 1, 0,'C');
    $pdf->Cell(60, 8, utf8_decode('Código QR: '), 1, 1,'C');
    
    $pdf->Cell(120, 8, $row['username'] .' '.$row['lastnameuser'], 1, 1,'C');
    $pdf->Cell(120, 8, utf8_decode('Información Adicional: '), 1, 1,'C');
    $pdf->Cell(120, 15, $row['observation'], 1, 1,'C');

    // Posicionar la imagen debajo del código QR
    $yPosition = $pdf->GetY()-30; // Ajusta el valor para controlar la distancia entre la celda y la imagen
    
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

    $sectorName = $row['sector_name'];
    
    $tableCount++;
}



    

// Agregar una imagen
/*
$pdf->Image('../img/photo.jpg', 10, $pdf->GetY() + 10, 30);
*/
// Guardar el PDF en el servidor con el nombre especificado
// Preparar la consulta
$sql1 = "SELECT user.username, user.last_name
        FROM assignment
        JOIN user ON assignment.id_user = user.id_user
        WHERE assignment.id_assignment = ?";

$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param('i', $idAssignment); // Asumiendo que el id_assignment es un entero
$stmt1->execute();
$result1 = $stmt1->get_result();
//aqui el nombre del archivo
// Obtener solo una fila
if ($row1 = $result1->fetch_assoc()) {
    $pdfName = $row1['username']. '' . $row1['last_name'] . '' . $sectorName . '.pdf'; // Nombre del archivo
}



$pdfPath = '../pdfs/' . $pdfName; // Ruta donde se guardará el PDF

$pdf->Output('F', $pdfPath); // Guardar el PDF en el servidor
$pdf->Output('D', 'document.pdf');
    
    // Generar URL para compartir el PDF
    //$serverUrl = 'https://your-domain.com/pdfs/' . $pdfName;
    $serverUrl = 'http://calderon.byethost7.com//pdfs/' . $pdfName;
    $serverUrl = '../pdfs/' . $pdfName;

    // Crear el mensaje de WhatsApp con el enlace del PDF
    $whatsappUrl = 'https://wa.me/?text=' . urlencode('Hola, aquí tienes el documento asignado: ' . $serverUrl);

    // Redireccionar al usuario al enlace de WhatsApp
    header('Location: ' . $whatsappUrl);
    
    // Eliminar el archivo PDF del servidor después de redireccionar
    if (file_exists($pdfPath)) {
        unlink($pdfPath); // Borrar el archivo PDF del servidor
    }
    // Cerrar la conexión a la base de datos
$conn->close();
    exit;


//$pdf->Output('D', 'document.pdf');
} else {
    echo "Solicitud no válida.";
}

?>