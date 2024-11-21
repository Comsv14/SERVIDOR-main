<?php
/*
    Crear el siguiente formulario: 
        a. Los campos nombre, e-mail, y sexo se han de introducir de forma 
    obligatoria. 
    b. Se ha de indicar con el mensaje en rojo “*campos requeridos” así como un 
    * al lado de nombre, e-mail y sexo. 
    c. El nombre únicamente ha de admitir letras y espacios en blanco 
    d. Email debe de tener un valor correcto. 
    e. El sitio web debe de tener un valor correcto.
    El resultado (valores de entrada en el formulario) debe de mostrar los datos introducidos 
    sean correctos o no.
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
<?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        $nombre=$_POST['name'];
        $email=$_POST['email'];
        $website=$_POST['website'];
        ?>
        <h2>PHP Form Validation Example</h2>
            <form action="Ejercicio11Unidad4_Practica2.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="name" name="name" required><br><br>
    
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" required><br><br>
    
                <label for="website">Website:</label>
                <input type="text" id="website" name="website" required><br><br>
    
                <!-- Campo Comment -->
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder=""></textarea><br><br>
                
                <!-- Campo Gender -->
                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>
                </br>
                <input type="submit" name="submit" value="submit"> 
            </form>
            <h2>Your Input:</h2>
            </br>
            <?php
                echo $nombre,"</br>";
                echo $email,"</br>";
                echo $website,"</br>";
            ?>
        </body>
        </html>;
<?php 
    } else{
        ?>
        
    <h2>PHP Form Validation Example</h2>
        <form action="Ejercicio11Unidad4_Practica2.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required><br><br>

            <label for="website">Website:</label>
            <input type="text" id="website" name="website" required><br><br>

            <!-- Campo Comment -->
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" cols="50" placeholder=""></textarea><br><br>
            
            <!-- Campo Gender -->
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            </br>
            <input type="submit" name="submit" value="submit"> 
        </form>
    </body>
    </html>
    <?php
    }
    ?>