<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <h2>Reservación en el Restaurante</h2>
    <form action="procesar.php" method="POST" id="reservaForm">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre_cliente" required>

        <label for="fecha">Fecha:</label>
        <input type="datetime-local" id="fecha" name="fecha" required>

        <label for="personas">Número de personas:</label>
        <input type="number" id="personas" name="num_personas" required min="1">

        <label for="clave">Clave de verificación:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>