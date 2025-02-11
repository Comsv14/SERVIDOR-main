CREATE DATABASE DiabetesDB;
USE DiabetesDB;

-- Tabla Usuario
CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellido1 VARCHAR(50),
    apellido2 VARCHAR(50),
    login VARCHAR(50) UNIQUE,
    pass VARCHAR(255),
    fecha_nacimiento DATE
);

-- Tabla Control_Glucosa (Depende de Usuario)
CREATE TABLE Control_Glucosa (
    id_usuario INT,
    fecha_control DATETIME,
    deporte BOOLEAN,
    lenta INT,
    indice_actividad DECIMAL(5,2),
    PRIMARY KEY (id_usuario, fecha_control),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE
);

-- Tabla Comida (Depende de Control_Glucosa)
CREATE TABLE Comida (
    id_usuario INT,
    fecha_control DATETIME,
    tipo_comida VARCHAR(50),
    raciones INT,
    glucosa INT,
    insulina DECIMAL(5,2),
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    FOREIGN KEY (id_usuario, fecha_control) REFERENCES Control_Glucosa(id_usuario, fecha_control) ON DELETE CASCADE
);

-- Tabla Hiperglucosa (Tabla débil, depende de Comida)
CREATE TABLE Hiperglucosa (
    id_usuario INT,
    fecha_control DATETIME,
    tipo_comida VARCHAR(50),
    glucosa INT,
    hora TIME,
    correccion VARCHAR(255),
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    FOREIGN KEY (id_usuario, fecha_control, tipo_comida) REFERENCES Comida(id_usuario, fecha_control, tipo_comida) ON DELETE CASCADE
);

-- Tabla Hipoglucosa (Tabla débil, depende de Comida)
CREATE TABLE Hipoglucosa (
    id_usuario INT,
    fecha_control DATETIME,
    tipo_comida VARCHAR(50),
    glucosa INT,
    hora TIME,
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    FOREIGN KEY (id_usuario, fecha_control, tipo_comida) REFERENCES Comida(id_usuario, fecha_control, tipo_comida) ON DELETE CASCADE
);
