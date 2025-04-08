<?php
include('conexion.php');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM recetas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../rcguardadas.php");
        exit();
    } else {
        echo "Error al eliminar la receta: " . $conn->error;
    }
} else {
    echo "ID no recibido.";
}

$conn->close();
?>
