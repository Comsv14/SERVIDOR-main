CREATE DATABASE diabetesdb;
USE diabetesdb;

CREATE TABLE USUARIO (
  id_usu INT NOT NULL AUTO_INCREMENT,
  fecha_nacimiento DATE NOT NULL,
  nombre VARCHAR(25) NOT NULL,
  apellidos VARCHAR(25) NOT NULL,
  usuario VARCHAR(25) NOT NULL,
  contra VARCHAR(25) NOT NULL,
  PRIMARY KEY (id_usu)
);

CREATE TABLE CONTROL_GLUCOSA (
  fecha DATE NOT NULL,
  tipo_comida VARCHAR(30) NOT NULL,  -- Añadir tipo_comida
  deporte INT NOT NULL,
  lenta INT NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (fecha, tipo_comida, id_usu),  -- Modificar clave primaria
  FOREIGN KEY (id_usu) REFERENCES USUARIO(id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

CREATE TABLE COMIDA (
  id_comida INT NOT NULL AUTO_INCREMENT,  -- Columna adicional para identificar de manera única cada comida
  tipo_comida VARCHAR(30) NOT NULL,
  gl_1h INT NOT NULL,
  gl_2h INT NOT NULL,
  raciones INT NOT NULL,
  insulina INT NOT NULL,
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (id_comida),  -- Cambio de clave primaria
  FOREIGN KEY (id_usu) REFERENCES USUARIO(id_usu)
    ON DELETE CASCADE 
    ON UPDATE CASCADE,
  FOREIGN KEY (id_usu, fecha) REFERENCES CONTROL_GLUCOSA(id_usu, fecha)  -- Referencia a la combinación de id_usu y fecha
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);


CREATE TABLE HIPERGLUCEMIA (
  glucosa INT NOT NULL,
  hora TIME NOT NULL,
  correccion INT NOT NULL,
  id_comida INT NOT NULL,  -- Cambiado para hacer referencia a id_comida
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (id_comida, fecha, id_usu),  -- Cambiado para usar id_comida
  FOREIGN KEY (id_comida) REFERENCES COMIDA(id_comida)  -- Cambio en la clave foránea
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

CREATE TABLE HIPOGLUCEMIA (
  glucosa INT NOT NULL,
  hora TIME NOT NULL,
  id_comida INT NOT NULL,  -- Cambiar tipo_comida por id_comida
  fecha DATE NOT NULL,
  id_usu INT NOT NULL,
  PRIMARY KEY (id_comida, fecha, id_usu),  -- Usar id_comida como parte de la clave primaria
  FOREIGN KEY (id_comida) REFERENCES COMIDA(id_comida)  -- Hacer referencia solo a id_comida
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);
