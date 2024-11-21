<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //formulario 
    echo<<<_END
            <form action="Ejercicio5Unidad4-Prueba-2.php" method="post">
        _END;
    for ($i=0; $i <= 9; $i++) { 
        echo<<<_END
        
            <label for="$i">$i:</label>
            <input type="text" id="nombre" name="$i" ><br>
            _END;
    }
     echo<<<_END
        <input type="submit" value="Enviar">
     _END;
     echo"</form>";
     ?>
</body>
</html>