<?php
/*
    ¿Qué acción realizará la siguiente línea de código html? 
    mail: <input type="text" name="email" value="<?php echo $email;?
    >"><span class="error">* <?php echo $emailErr;?></span><br><br>
    
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    mail: 
<input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
</body>
</html>