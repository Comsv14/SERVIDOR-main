 <?php
/* Crear un programa partir de 3 valores, a b y c que corresponden a los tres
coeficientes de una ecuación de segundo grado muestre las soluciones de la
misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
- si b2-4ac es negativo no hay soluciones
- si es nulo, hay sólo una solución -b/2a
- si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-b-
sqrt(b2-4ac))/(2a) */
  $a=2;
  $b=-2;
  $c=-9;
  $ec=$a."x^2+(".$b.")*x+(".$c.")=0";
  echo "Ecuación a resolver: $ec<br>";
  $disc=$b**2-4*$a*$c;
  if ($disc<0) {
    echo "No hay soluciones reales";
    return;
  }
  if ($a==0) {
    if ($b==0) {
      if ($c==0) {
        echo "Cualquier número es solución";
      } else {
        echo "No hay solución";
      }
    } else { 
      $sol=-$c/$b;
      echo "Hay una solución igual a $sol";
    }
  } else { 
    if ($disc==0) {
      $sol=-$b/(2*$a);
      echo "Hay una solución igual a $sol";
    } else {
      $sol1=(-$b+sqrt($disc))/(2*$a);
      $sol2=(-$b-sqrt($disc))/(2*$a);
      echo "Hay dos soluciones: $sol1 y $sol2";
    }
  }
      
?>
