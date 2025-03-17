CREATE DATABASE IF NOT EXISTS restaurantes;
USE restaurantes;

CREATE TABLE IF NOT EXISTS reservaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(255) NOT NULL,
    fecha DATETIME NOT NULL,
    num_personas INT NOT NULL,
    clave VARCHAR(255) NOT NULL
);