<?php
        // Recorre el array $posicion y muestra las imágenes de forma consecutiva
        foreach ($_SESSION["posiciones"] as $valor) {
            if ($valor == 2) {
                echo '<img src="copas_02.jpg" alt="Dos">';
            } elseif ($valor == 3) {
                echo '<img src="copas_03.jpg" alt="Tres">';
            } elseif ($valor == 5) {
                echo '<img src="copas_05.jpg" alt="Cinco">';
            }
        }
        ?>