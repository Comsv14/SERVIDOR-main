<?php
if (isset($_POST['nombre']) /*&& isset($_POST['apellidos'])*/){
        echo "Nombre: ".$_POST['nombre']."</br>";
        echo "Apellidos: ".$_POST['apellidos'];
    }
    else{
            ?>
                <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>
                    <body>
                        <form action="#" method="post">
                            <label for="nombre">Nombre:</label><br>
                            <input type="text" id="nombre" name="nombre" ><br><br>
                            
                            <label for="apellidos">Apellidos:</label><br>
                            <input type="text" id="apellidos" name="apellidos" ><br><br>
                            
                                <!--<input type="submit" value="Enviar">-->
                                <button type="submit">Enviar2</button>
                        </form>
                    </body>
                </html>
            <?php    
        }
?>