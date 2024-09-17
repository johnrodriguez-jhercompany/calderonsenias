<?php

include('session.php'); 

$sector_id = $_POST['id_sector'];

// Consulta para verificar si hay registros 'asignados' en la tabla assigment
$sql_check = "SELECT 1 FROM assignment WHERE state_asigment = 'asignado' LIMIT 1";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Si hay registros 'asignados', excluir esos territorios
    $sql = "SELECT territorio.id_territorio, territorio.territorio_name 
            FROM territorio
            JOIN sector ON territorio.id_sector = sector.id_sector
            WHERE territorio.id_sector = ?
            AND territorio.id_territorio NOT IN (
                SELECT assignment.id_territorio 
                FROM assignment 
                WHERE assignment.state_asigment = 'asignado'
            )";
} else {
    // Si no hay registros 'asignados', seleccionar todos los territorios
    $sql = "SELECT territorio.id_territorio, territorio.territorio_name 
            FROM territorio
            JOIN sector ON territorio.id_sector = sector.id_sector
            WHERE territorio.id_sector = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $sector_id);
$stmt->execute();
$result = $stmt->get_result();

$territorios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $territorios[] = $row;
    }
}

echo json_encode($territorios);

$stmt->close();
$conn->close();

?>