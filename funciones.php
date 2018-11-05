<?php
function perceptron($table) {
    $w0 = 0.0005;
    $w1 = 0.7;
    $w2 = -0.3;
#echo $w0." ".$w1." ".$w2."<br>";

$c = 1.5; //learning rate!
$w0_array = array($w0);   //peso siempre activo
$w1_array = array($w1);
$w2_array = array($w2);
$fila0_error = array();   //array de errores
$fila1_error = array();
$fila2_error = array();
$fila3_error = array();
$eje_x = array('0');
$eje_x_error = array();

echo "<div class='container' style='width:700px; height:400px; overflow: auto;'>
<table class='table'><thead><tr><th>Iteracion</th><th>W0</th><th>W1</th><th>W2</th><th>Error</th><tr></thead><tbody>";
echo "<tr><td>0</td><td>".round($w0,4)."</td><td>".round($w1,4)."</td><td>".round($w2,4)."</td><td>-</td></tr>";

for ($i=0; $i < 400; $i++){
    for ($k=0; $k < 4; $k++){
#    echo $k." del bucle ".$i."<br>";
#    Graficar los w
#    recalcular los w
        $x = calcular_x(1, $table[$k][0], $table[$k][1], $w0, $w1, $w2);
        $Sd = $table[$k][2];
        $Sr = calcular_Sr($x);
        $error = $Sd - $Sr;
        $deltaw0 = $error * $c * 1;
        $deltaw1 = $error * $c * $table[$k][0];
        $deltaw2 = $error * $c * $table[$k][1];
        $w0 = recalcular_w($w0, $deltaw0);
        $w1 = recalcular_w($w1, $deltaw1);
        $w2 = recalcular_w($w2, $deltaw2);
        echo "<tr><td>".($i + 1).".".($k + 1)."</td><td>".round($w0,4)."</td><td>".round($w1,4)."</td><td>".round($w2,4)."</td><td>".round($error,4)."</td></tr>";
        if ( $i % 20 == 0 ){
            switch ($k) {
                case 0:
                array_push($fila0_error, round($error,4));
                break;
                case 1:
                array_push($fila1_error, round($error,4));
                break;
                case 2:
                array_push($fila2_error, round($error,4));
                break;
                case 3:
                array_push($fila3_error, round($error,4));
                break;
            }
            array_push($eje_x_error, $i + 1);
        }
    }
    if ( $i % 20 == 0 ){
        array_push($w0_array, round($w0,4));
        array_push($w1_array, round($w1,4));
        array_push($w2_array, round($w2,4));
        array_push($eje_x, ($i + 1));
    }
}

echo "</tbody></table>";

echo "
</div>
<div>
<h3>Pesos</h3>
<img src='grafico.php?w0=".serialize($w0_array)."&w1=".serialize($w1_array)."&w2=".serialize($w2_array)."&eje_x=".serialize($eje_x)."'>
";
echo "
<h3>Errores</h3>
<img src='grafico_error.php?e0=".serialize($fila0_error)."&e1=".serialize($fila1_error)."&e2=".serialize($fila2_error)."&e3=".serialize($fila3_error)."&eje_x=".serialize($eje_x_error)."'>
</div>";

}

function calcular_x($e0, $e1, $e2, $w0, $w1, $w2){
    return (($e0 * $w0) + ($e1 * $w1) + ($e2 * $w2)) * -1;
}
function calcular_Sr($x){
    return 1/(1 + pow(M_E,$x));
}
function recalcular_w($w,$delta){
    return $w + $delta;
}
?>
