<?php

    // Obtener el id_householder desde los resultados de otra consulta
    $id_householder = '4';
    include('../conn.php');
    // Preparar la consulta para verificar si el id_householder está en la tabla study
    // y obtener el username y last_name de la tabla user
    $query2 = "SELECT user.username, user.last_name 
              FROM study 
              JOIN user ON study.id_user = user.id_user 
              WHERE study.id_householder = ?";

    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id_householder);
    $stmt2->execute();
    $stmt2->bind_result($username, $last_name);

    // Verificar si hay resultados y obtener los datos
    if ($stmt2->fetch()) {
        echo $username ." ".$last_name;
    } else {
        echo "No estudia";
    }

    // Cerrar la declaración y la conexión
    $stmt2->close();
    $conn->close();

?>