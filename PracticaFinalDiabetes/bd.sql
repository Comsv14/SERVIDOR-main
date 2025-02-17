CREATE DATABASE diabetesdb;
USE diabetesdb;

-- Crear tabla USUARIO
CREATE TABLE USUARIO (
  id_usu INT NOT NULL AUTO_INCREMENT,
  fecha_nacimiento DATE NOT NULL,
  nombre VARCHAR(25) NOT NULL,
  apellidos VARCHAR(25) NOT NULL,
  usuario VARCHAR(25) NOT NULL,
  contra VARCHAR(255) NOT NULL,  
  rol ENUM('usuario', 'admin') NOT NULL,  
  PRIMARY KEY (id_usu)
);

-- Crear tabla CONTROL_GLUCOSA
CREATE TABLE CONTROL_GLUCOSA (
  fecha DATE NOT NULL,
  deporte INT NOT NULL,
  lenta INT NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (fecha, id_usu),
  FOREIGN KEY (id_usu) REFERENCES USUARIO(id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

-- Crear índice para optimizar consultas
CREATE INDEX idx_fecha_id_usu ON CONTROL_GLUCOSA(fecha, id_usu);

CREATE TABLE COMIDA (
  id_comida INT NOT NULL AUTO_INCREMENT,
  tipo_comida VARCHAR(30) NOT NULL,
  gl_1h INT NOT NULL,
  gl_2h INT NOT NULL,
  raciones INT NOT NULL,
  insulina INT NOT NULL,
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (id_comida),
  FOREIGN KEY (id_usu) REFERENCES USUARIO(id_usu),
  FOREIGN KEY (fecha, id_usu) REFERENCES CONTROL_GLUCOSA(fecha, id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

-- Crear índice único en COMIDA para las columnas tipo_comida, fecha y id_usu
CREATE UNIQUE INDEX idx_comida_tipo_fecha_id ON COMIDA(tipo_comida, fecha, id_usu);

-- Crear tabla HIPERGLUCEMIA
CREATE TABLE HIPERGLUCEMIA (
  glucosa INT NOT NULL,
  hora TIME NOT NULL,
  correccion INT NOT NULL,
  tipo_comida VARCHAR(30) NOT NULL,
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (tipo_comida, fecha, id_usu),
  FOREIGN KEY (tipo_comida, fecha, id_usu) REFERENCES COMIDA(tipo_comida, fecha, id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

-- Crear tabla HIPOGLUCEMIA
CREATE TABLE HIPOGLUCEMIA (
  glucosa INT NOT NULL,
  hora TIME NOT NULL,
  tipo_comida VARCHAR(30) NOT NULL,
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (tipo_comida, fecha, id_usu),
  FOREIGN KEY (tipo_comida, fecha, id_usu) REFERENCES COMIDA(tipo_comida, fecha, id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);
