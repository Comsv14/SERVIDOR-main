-- 1. SELECCIONAR TODOS LOS CAMPOS DE UNA TABLA
SELECT * FROM tabla;

-- 2. SELECCIONAR CAMPOS ESPECÍFICOS
SELECT columna1, columna2 FROM tabla;

-- 3. USAR ALIAS PARA RENOMBRAR COLUMNAS
SELECT columna1 AS alias1, columna2 AS alias2 FROM tabla;

-- 4. FILTRAR RESULTADOS CON WHERE
SELECT * FROM tabla WHERE columna = 'valor';

-- 5. USAR OPERADORES DE COMPARACIÓN EN WHERE
SELECT * FROM tabla WHERE columna > 10;  -- Mayor que
SELECT * FROM tabla WHERE columna >= 10; -- Mayor o igual
SELECT * FROM tabla WHERE columna < 10;  -- Menor que
SELECT * FROM tabla WHERE columna <= 10; -- Menor o igual
SELECT * FROM tabla WHERE columna <> 10; -- Diferente de

-- 6. FILTROS AVANZADOS CON AND, OR, NOT
SELECT * FROM tabla WHERE columna1 = 'valor' AND columna2 > 10;
SELECT * FROM tabla WHERE columna1 = 'valor' OR columna2 > 10;
SELECT * FROM tabla WHERE NOT columna1 = 'valor';

-- 7. BUSCAR PATRONES CON LIKE (% CUALQUIER CARACTER, _ UN SOLO CARACTER)
SELECT * FROM tabla WHERE columna LIKE 'A%'; -- Empieza con A
SELECT * FROM tabla WHERE columna LIKE '%A'; -- Termina con A
SELECT * FROM tabla WHERE columna LIKE '%A%'; -- Contiene A
SELECT * FROM tabla WHERE columna LIKE 'A_'; -- Empieza con A y tiene solo un caracter más

-- 8. USAR IN PARA FILTRAR MÚLTIPLES VALORES
SELECT * FROM tabla WHERE columna IN ('valor1', 'valor2', 'valor3');

-- 9. USAR BETWEEN PARA RANGOS
SELECT * FROM tabla WHERE columna BETWEEN 10 AND 20;

-- 10. ORDENAR RESULTADOS CON ORDER BY
SELECT * FROM tabla ORDER BY columna ASC; -- Orden ascendente
SELECT * FROM tabla ORDER BY columna DESC; -- Orden descendente

-- 11. LIMITAR RESULTADOS CON LIMIT
SELECT * FROM tabla LIMIT 10; -- Muestra solo 10 resultados

-- 12. AGRUPAR RESULTADOS CON GROUP BY
SELECT columna, COUNT(*) FROM tabla GROUP BY columna;

-- 13. FILTRAR AGRUPACIONES CON HAVING (Útil con funciones agregadas)
SELECT columna, COUNT(*) FROM tabla GROUP BY columna HAVING COUNT(*) > 5;

-- 14. UNIR TABLAS CON INNER JOIN (SOLO REGISTROS QUE COINCIDEN)
SELECT t1.columna, t2.columna FROM tabla1 t1
INNER JOIN tabla2 t2 ON t1.id = t2.id;

-- 15. UNIR TABLAS CON LEFT JOIN (MUESTRA TODO DE LA IZQUIERDA Y COINCIDENCIAS DE LA DERECHA)
SELECT t1.columna, t2.columna FROM tabla1 t1
LEFT JOIN tabla2 t2 ON t1.id = t2.id;

-- 16. UNIR TABLAS CON RIGHT JOIN (MUESTRA TODO DE LA DERECHA Y COINCIDENCIAS DE LA IZQUIERDA)
SELECT t1.columna, t2.columna FROM tabla1 t1
RIGHT JOIN tabla2 t2 ON t1.id = t2.id;

-- 17. UNIR TABLAS CON FULL OUTER JOIN (MUESTRA TODO DE AMBAS TABLAS, COINCIDAN O NO)
SELECT t1.columna, t2.columna FROM tabla1 t1
FULL OUTER JOIN tabla2 t2 ON t1.id = t2.id;

-- 18. SUBCONSULTAS (CONSULTAS DENTRO DE OTRAS)
SELECT * FROM tabla WHERE columna IN (SELECT columna FROM otra_tabla WHERE condicion);

-- 19. USAR FUNCIONES AGREGADAS (SUM, AVG, COUNT, MAX, MIN)
SELECT SUM(columna) FROM tabla; -- Suma de valores
SELECT AVG(columna) FROM tabla; -- Promedio de valores
SELECT COUNT(columna) FROM tabla; -- Cuenta registros
SELECT MAX(columna) FROM tabla; -- Valor máximo
SELECT MIN(columna) FROM tabla; -- Valor mínimo

-- 20. CREAR VISTAS PARA CONSULTAS RECURRENTES
CREATE VIEW nombre_vista AS
SELECT columna1, columna2 FROM tabla WHERE condicion;

-- 21. BUSCAR DATOS CON MATCH Y FULLTEXT SEARCH (PARA GRANDES VOLÚMENES DE TEXTO)
SELECT * FROM tabla WHERE MATCH(columna_texto) AGAINST ('palabra_clave');

-- 22. UNION PARA COMBINAR RESULTADOS DE VARIAS CONSULTAS
SELECT columna FROM tabla1
UNION
SELECT columna FROM tabla2;

-- 23. UNION ALL (MANTIENE DUPLICADOS)
SELECT columna FROM tabla1
UNION ALL
SELECT columna FROM tabla2;

-- 24. INSERTAR DATOS
INSERT INTO tabla (columna1, columna2) VALUES ('valor1', 'valor2');

-- 25. ACTUALIZAR DATOS
UPDATE tabla SET columna1 = 'nuevo_valor' WHERE columna2 = 'condicion';

-- 26. ELIMINAR DATOS
DELETE FROM tabla WHERE columna = 'valor';

-- 27. BORRAR TODOS LOS DATOS (¡CUIDADO, NO SE PUEDE DESHACER!)
DELETE FROM tabla;

-- 28. BORRAR TABLA COMPLETA
DROP TABLE tabla;

-- 29. TRUNCATE (BORRA TODOS LOS DATOS PERO MANTIENE LA ESTRUCTURA)
TRUNCATE TABLE tabla;

-- 30. OBTENER LA FECHA Y HORA ACTUAL
SELECT NOW(); -- Fecha y hora actuales
SELECT CURDATE(); -- Solo fecha actual
SELECT CURTIME(); -- Solo hora actual
