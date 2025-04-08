<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';  
$base_datos = 'recetas_app';

//  conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// verificaaa la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
