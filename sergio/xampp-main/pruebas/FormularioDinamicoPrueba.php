<?php
    echo<<<_END
    <form action="segundoFormularioDinamico.php" method="get">
    _END;
    
    for ($i=0; $i<3;$i++) {
        
        echo<<<_END
            <label for="$i">$i:</label>
            <input type="text" id="num1" name="caja$i" required>
            <br>
        _END;
    }
    echo<<<_END
        <input type="submit" value="Enviar">
    _END;
    echo "</form>";
?>