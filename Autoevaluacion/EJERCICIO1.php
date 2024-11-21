<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversión a Binario</title>
</head>
<body>
    <?php
    $mostrarFormulario = true;
    $resultado = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valores = [
            $_POST['valor1'] ?? '', $_POST['valor2'] ?? '', $_POST['valor3'] ?? '',
            $_POST['valor4'] ?? '', $_POST['valor5'] ?? '', $_POST['valor6'] ?? ''
        ];

        $valido = true;

        foreach ($valores as $valor) {
            if (is_numeric($valor) && $valor >= 1 && $valor <= 100) {
                $resultado[] = [
                    'decimal' => $valor,
                    'binario' => decbin($valor)
                ];
            } else {
                $valido = false;
                break;
            }
        }

        if ($valido) {
            $mostrarFormulario = false;
            echo "<h3>Resultados en Binario:</h3>";
            echo "<ul>";
            foreach ($resultado as $num) {
                echo "<li>{$num['decimal']} = {$num['binario']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Por favor, ingrese valores numéricos entre 1 y 100.</p>";
        }
    }

    if ($mostrarFormulario) {
    ?>
        <form action="EJERCICIO1.php" method="POST">
            <table>
                <?php 
                $filas = 3;
                $columnas = 2;

                for ($i = 0; $i < $filas; $i++) { 
                    echo "<tr>";
                    for ($j = 0; $j < $columnas; $j++) { 
                        $indice = ($i * $columnas) + $j + 1;
                        echo "<td>E.$i.$j</td>";
                        echo "<td><input type='text' name='valor$indice'/></td>";
                    }
                    echo "</tr>";
                }
                ?>    
            </table>
            <br>
            <input type="submit" name="calcular" value="Calcular">
        </form>
    <?php
    }
    ?>
</body>
</html>
