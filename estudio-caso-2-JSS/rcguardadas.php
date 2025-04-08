<?php
include('php/conexion.php');

$sql = "SELECT * FROM recetas ORDER BY fecha_guardado DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recetas Guardadas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Recetas Guardadas</h1>

    <?php if ($resultado->num_rows > 0): ?>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php while ($fila = $resultado->fetch_assoc()): ?>
          <div class="col">
            <div class="card shadow-sm h-100">
              <img src="<?= $fila['imagen'] ?>" class="card-img-top rounded-top" alt="<?= $fila['nombre'] ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title text-primary"><?= $fila['nombre'] ?></h5>
                <h6 class="text-secondary">Ingredientes:</h6>
                <pre class="bg-light p-2 rounded border"><?= $fila['ingredientes'] ?></pre>
                <h6 class="text-secondary mt-2">Preparación:</h6>
                <p><?= $fila['preparacion'] ?></p>

                <form action="php/eliminar.php" method="POST" class="mt-auto" onsubmit="return confirm('¿Estás seguro de eliminar esta receta?');">
                  <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                  <button type="submit" class="btn btn-danger btn-sm mt-3">Eliminar receta</button>
                </form>
              </div>
              <div class="card-footer text-muted text-end">
                Guardado el <?= date("d/m/Y H:i", strtotime($fila['fecha_guardado'])) ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <p class="text-center">No hay recetas guardadas aún.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
      <a href="index.html" class="btn btn-primary">Volver a la receta</a>
    </div>
  </div>
</body>
</html>

<?php $conn->close(); ?>

