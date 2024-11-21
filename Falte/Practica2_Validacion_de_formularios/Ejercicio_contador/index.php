<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        session_start();
        if(!isset($_SESSION['contador'])){
            $_SESSION['contador']=0;
        }   
            if(isset($_POST['ope'])){
                $ope=$_POST['ope'];
                if($ope=="+"){
                    $_SESSION['contador']++;
                }else{
                    $_SESSION['contador']--;
                }
            }
            ?>
                <form action="#" method="post">
                <label for="nombre">Contador:</label>
                <br>
                <input type="submit" name="ope" value="-">
                <label for=""><?php echo $_SESSION['contador']; ?></label>
                <input type="submit" name="ope" value="+">
                <br>
                </form> 
                <form action="index2.php" method="post">
                    <input type="submit" name="cerrar" value="Cerrar">
                </form>
</body>
</html>