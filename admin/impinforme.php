<?php

require('../lib/fpdf/fpdf.php');
include('session.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['anio'])) {

    $anio=$_POST['anio'];

    // Realizar la consulta a la base de datos
    $sql = "SELECT assignment.id_assignment, date_assignment, date_assignment_end, 
                                            user.username, user.last_name, territorio.territorio_name,sector_name
											FROM assignment 
											JOIN user ON assignment.id_user = user.id_user
											JOIN sector ON assignment.id_sector = sector.id_sector
											JOIN territorio ON assignment.id_territorio = territorio.id_territorio
											WHERE YEAR(assignment.date_assignment) = ?
                                            OR YEAR(assignment.date_assignment_end) = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $anio,$anio);
            $stmt->execute();
            $result = $stmt->get_result();

    // Crear un nuevo PDF sin datos de la base de datos
	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->SetFont('Arial', 'B', 10);
    
    $pdf->AddPage('P');
    $pdf->Cell(200, 16, utf8_decode('REGISTRO DE ASIGNACIÓN DE TERRITORIO'), 0, 1,'C');
    $pdf->Cell(50, 8, utf8_decode('Año de Servicio:').' '.$anio, 0, 1,'L');
    $pdf->Cell(35, 8, utf8_decode('Núm. de Terr.: '), 1, 0,'C');
    $pdf->Cell(35, 8, 'Sector: ', 1, 0,'C');
    $pdf->Cell(35, 8, 'Asignado a: ', 1, 0,'C'); 
    $pdf->Cell(35, 8, 'Fecha Asignada: ', 1, 0,'C'); 
    $pdf->Cell(35, 8, 'Fecha Entrega: ', 1, 1,'C');

    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(35, 8, utf8_decode($row['territorio_name']), 1, 0,'C');
        $pdf->Cell(35, 8, utf8_decode($row['sector_name']), 1, 0,'C');
        $pdf->Cell(35, 8, utf8_decode($row['username'].' '.$row['last_name']), 1, 0,'C');
        $pdf->Cell(35, 8, utf8_decode($row['date_assignment']), 1, 0,'C');
        $pdf->Cell(35, 8, utf8_decode($row['date_assignment_end']), 1, 1,'C');  
    }

	$pdf->Output('D', 'document.pdf');
    $conn->close();
    exit;
}else {
    echo "Solicitud no válida.";
}

?>