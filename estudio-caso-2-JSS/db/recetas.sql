--base de datos
CREATE DATABASE IF NOT EXISTS recetas_app;
USE recetas_app;

-- tabla para guardar recetas
CREATE TABLE IF NOT EXISTS recetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    ingredientes TEXT NOT NULL,
    preparacion TEXT NOT NULL,
    imagen VARCHAR(500) NOT NULL,
    fecha_guardado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
