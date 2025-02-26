CREATE DATABASE IF NOT EXISTS puzzle_diario;
USE puzzle_diario;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    clave VARCHAR(255) NOT NULL,
    rol ENUM('alumno', 'profesor') NOT NULL DEFAULT 'alumno',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de puzzles
CREATE TABLE puzzles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL UNIQUE DEFAULT CURRENT_DATE,
    imagen1 VARCHAR(255) NOT NULL,
    imagen2 VARCHAR(255) NOT NULL,
    imagen3 VARCHAR(255) NOT NULL,
    imagen4 VARCHAR(255) NOT NULL,
    solucion TEXT NOT NULL -- Para mayor flexibilidad en la solución
);

-- Tabla de intentos
CREATE TABLE intentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    puzzle_id INT NOT NULL,
    movimientos INT NOT NULL,
    acierto BOOLEAN NOT NULL,
    fecha_intento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (puzzle_id) REFERENCES puzzles(id)
);

-- Tabla de estadísticas por usuario
CREATE TABLE estadisticas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total_intentos INT DEFAULT 0,
    total_aciertos INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
