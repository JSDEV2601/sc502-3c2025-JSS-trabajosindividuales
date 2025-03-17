<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_cliente'];
    $fecha = $_POST['fecha'];
    $num_personas = $_POST['num_personas'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO reservaciones (nombre_cliente, fecha, num_personas, clave) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nombre, $fecha, $num_personas, $clave])) {
        echo "<p>Reservación realizada con éxito.</p>";
    } else {
        echo "<p>Error al realizar la reservación.</p>";
    }
}
?>