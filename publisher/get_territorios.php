<?php

include('session.php'); 

$sector_id = $_POST['id_sector'];

$sql = "SELECT id_territorio, territorio_name FROM territorio WHERE id_sector = ?";
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