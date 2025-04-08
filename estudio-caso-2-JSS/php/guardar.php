<?php
include('conexion.php');


if (isset($_POST['nombre'], $_POST['ingredientes'], $_POST['preparacion'], $_POST['imagen'])) {
    
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $ingredientes = $conn->real_escape_string($_POST['ingredientes']);
    $preparacion = $conn->real_escape_string($_POST['preparacion']);
    $imagen = $conn->real_escape_string($_POST['imagen']);

    // codigos que insetar a la base de datos la info
    $sql = "INSERT INTO recetas (nombre, ingredientes, preparacion, imagen)
            VALUES ('$nombre', '$ingredientes', '$preparacion', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Receta guardada correctamente.";
    } else {
        echo "Error al guardar la receta: " . $conn->error;
    }
} else {
    echo "Faltan datos para guardar la receta.";
}

$conn->close();
?>
