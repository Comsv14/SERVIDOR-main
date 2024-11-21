<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
<?php
echo 'Sexo:
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
value="mujer"> Mujer
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
value="hombre"> Hombre
<span class="error">* <?php echo $sexoErr;?></span><br><br>'    
?>
</body>
</html>