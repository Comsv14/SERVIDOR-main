<?php
function segundoGrado($a, $b, $c) {
    if ($b**2-4*$a*$c < 0) {
        return false;
    } else {
        $x1 = (-$b+sqrt($b**2-4*$a*$c))/2*$a;
        $x2 = (-$b-sqrt($b**2-4*$a*$c))/2*$a;

        return array($x1,$x2);
    }
}


?>