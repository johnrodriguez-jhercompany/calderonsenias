<?php
include('session.php');

if (isset($_POST['id_sector'])) {
    $sector_id = $_POST['id_sector'];

    // Preparar la consulta
    $sql = "SELECT id_territorio, territorio_name FROM territorio WHERE id_sector = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $sector_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $territorios = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $territorios[] = $row;
            }
        }

        // Devolver la respuesta como JSON
        echo json_encode($territorios);
        
        $stmt->close();
    } else {
        // Manejo de error si la consulta falla
        echo json_encode(array('error' => 'Error al preparar la consulta.'));
    }

    $conn->close();
} else {
    // Manejo de error si no se envía el ID del sector
    echo json_encode(array('error' => 'No se recibió el ID del sector.'));
}
?>
