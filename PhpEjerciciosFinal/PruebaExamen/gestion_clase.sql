
CREATE DATABASE IF NOT EXISTS GestionClase;
USE GestionClase;

-- Tabla de usuarios (alumnos y profesores)
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    clave VARCHAR(255) NOT NULL,
    rol ENUM('alumno', 'profesor') NOT NULL
);

-- Tabla de exámenes
CREATE TABLE Examenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_examen VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    descripcion TEXT,
    profesor_id INT NOT NULL,
    FOREIGN KEY (profesor_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Tabla de calificaciones
CREATE TABLE Notas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    examen_id INT NOT NULL,
    alumno_id INT NOT NULL,
    nota DECIMAL(5,2),
    fecha_entrega DATE,
    FOREIGN KEY (examen_id) REFERENCES Examenes(id) ON DELETE CASCADE,
    FOREIGN KEY (alumno_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Inserción de ejemplo para pruebas
INSERT INTO Usuarios (nombre, email, clave, rol) VALUES 
('Juan Profesor', 'juan.profesor@correo.com', SHA2('123456', 256), 'profesor'),
('Ana Alumno', 'ana.alumno@correo.com', SHA2('123456', 256), 'alumno');
