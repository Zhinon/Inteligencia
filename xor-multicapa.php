<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Perceptron</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
        <a class="navbar-brand" href="#">PERCEPTRONES!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">AND</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="or.php">OR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xor.php">XOR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xnor.php">XNOR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nand.php">NAND</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nor.php">NOR</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">XOR Multicapa</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    $table_xor = [[0,0,0],[0,1,1],[1,0,1],[1,1,0]];
    echo '<div class="container mt-5" ><h2>XOR Multicapa:</h2>';
    perceptron($table_xor);
    echo "</div>";

    ?>
</body>
</html>

<?php
function perceptron($table) {
    $w1 = -0.5;
    $w2 = 0.7;
    $w3 = 0.2;
    $w4 = 0.001;
    $w5 = 0.25;
    $w6 = -0.1;
    $w7 = -0.42;
    $w8 = -0.48;
    $w9 = 1;
    $w10 = 0;
    $w11 = -1;
    $w12 = 0.98;
    $w13 = -0.98;

    $w1_array = array($w1);
    $w2_array = array($w2);
    $w3_array = array($w3);
    $w4_array = array($w4);
    $w5_array = array($w5);
    $w6_array = array($w6);
    $w7_array = array($w7);
    $w8_array = array($w8);
    $w9_array = array($w9);
    $w10_array = array($w10);
    $w11_array = array($w11);
    $w12_array = array($w12);
    $w13_array = array($w13);
    $fila0_error = array();   //array de errores
    $fila1_error = array();
    $fila2_error = array();
    $fila3_error = array();
    $eje_x = array('0');
    $eje_x_error = array();

    $c = 1.5; //learning rate!

    echo "<div class='container-fluid' style='height:400px; overflow: auto;'>
            <table class='table'>
                <thead>
                    <tr><th>Iteracion</th><th>W1</th><th>W2</th><th>W3</th><th>W4</th><th>W5</th><th>W6</th><th>W7</th><th>W8</th><th>W9</th><th>W10</th><th>W11</th><th>W12</th><th>W13</th><th>Error</th><tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td><td>".round($w1,4)."</td><td>".round($w2,4)."</td><td>".round($w3,4)."</td><td>".round($w4,4)."</td><td>".round($w5,4)."</td><td>".round($w6,4)."</td><td>".round($w7,4)."</td><td>".round($w8,4)."</td><td>".round($w9,4)."</td><td>".round($w10,4)."</td><td>".round($w11,4)."</td><td>".round($w12,4)."</td><td>".round($w13,4)."</td><td>-</td>
                    </tr>";

    for ($i=0; $i < 600; $i++){
        for ($k=0; $k < 4; $k++){
            $x1 = calcular_x(1, $table[$k][0], $table[$k][1], $w1, $w2, $w3);
            $x2 = calcular_x(1, $table[$k][0], $table[$k][1], $w4, $w5, $w6);
            $x3 = calcular_x(1, $table[$k][0], $table[$k][1], $w7, $w8, $w9);

            $S1 = calcular_S($x1);
            $S2 = calcular_S($x2);
            $S3 = calcular_S($x3);

            $x_final = calcular_x_final(1, $S1, $S2, $S3, $w10, $w11, $w12, $w13);

            $Sr = calcular_S($x_final);
            $Sd = $table[$k][2];
            $error = $Sd - $Sr;

            # Pesos capa externa
            $deltaminf = $Sr * (1 - $Sr) * $error;
            $deltamax = $c * 1 * $deltaminf;
            $w10 = recalcular_w($w10, $deltamax);
            $deltamax = $c * $S1 * $deltaminf;
            $w11 = recalcular_w($w11, $deltamax);
            $deltamax = $c * $S2 * $deltaminf;
            $w12 = recalcular_w($w12, $deltamax);
            $deltamax = $c * $S3 * $deltaminf;
            $w13 = recalcular_w($w13, $deltamax);

            #pesos capa oculta
            $deltaminoc = ($S1) * (1 - $S1) * $deltaminf;
            $deltamax = calc_deltamax($c, $S1, $deltaminoc);
            $w1 = recalcular_w($w1, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][0], $deltaminoc);
            $w2 = recalcular_w($w2, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][1], $deltaminoc);
            $w3 = recalcular_w($w3, $deltamax);

            $deltaminoc = ($S2) * (1 - $S2) * $deltaminf;
            $deltamax = calc_deltamax($c, $S2, $deltaminoc);
            $w4 = recalcular_w($w4, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][0], $deltaminoc);
            $w5 = recalcular_w($w5, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][1], $deltaminoc);
            $w6 = recalcular_w($w6, $deltamax);

            $deltaminoc = ($S3) * (1 - $S3) * $deltaminf;
            $deltamax = calc_deltamax($c, $S3, $deltaminoc);
            $w7 = recalcular_w($w7, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][0], $deltaminoc);
            $w8 = recalcular_w($w8, $deltamax);
            $deltamax = calc_deltamax($c, $table[$k][1], $deltaminoc);
            $w9 = recalcular_w($w9, $deltamax);

            echo "
                    <tr>
                        <td>".($i + 1).".".($k + 1)."</td><td>".round($w1,4)."</td><td>".round($w2,4)."</td><td>".round($w3,4)."</td><td>".round($w4,4)."</td><td>".round($w5,4)."</td><td>".round($w6,4)."</td><td>".round($w7,4)."</td><td>".round($w8,4)."</td><td>".round($w9,4)."</td><td>".round($w10,4)."</td><td>".round($w11,4)."</td><td>".round($w12,4)."</td><td>".round($w13,4)."</td><td>".round($error,4)."</td>
                    </tr>";

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
            }
        }
        if ( $i % 20 == 0 ){
            array_push($eje_x_error, $i + 1);
            array_push($w1_array, round($w1,4));
            array_push($w2_array, round($w2,4));
            array_push($w3_array, round($w3,4));
            array_push($w4_array, round($w4,4));
            array_push($w5_array, round($w5,4));
            array_push($w6_array, round($w6,4));
            array_push($w7_array, round($w7,4));
            array_push($w8_array, round($w8,4));
            array_push($w9_array, round($w9,4));
            array_push($w10_array, round($w10,4));
            array_push($w11_array, round($w11,4));
            array_push($w12_array, round($w12,4));
            array_push($w13_array, round($w13,4));
            array_push($eje_x, ($i + 1));
        }
    }
    echo "</tbody></table>
    </div>
    <div class='mt-3'>
    <h3>Pesos</h3>
    <img src='grafico_multicapa.php?w1=".serialize($w1_array)."&w2=".serialize($w2_array)."&w3=".serialize($w3_array)."&w4=".serialize($w4_array)."&w5=".serialize($w5_array)."&w6=".serialize($w6_array)."&w7=".serialize($w7_array)."&w8=".serialize($w8_array)."&w9=".serialize($w9_array)."&w10=".serialize($w10_array)."&w11=".serialize($w11_array)."&w12=".serialize($w12_array)."&w13=".serialize($w13_array)."&eje_x=".serialize($eje_x)."'>
    </div>
    <div class='mt-3'>
    <h3>Errores</h3>
    <img src='grafico_error.php?e0=".serialize($fila0_error)."&e1=".serialize($fila1_error)."&e2=".serialize($fila2_error)."&e3=".serialize($fila3_error)."&eje_x=".serialize($eje_x_error)."'>
    </div>";

}

function calcular_x($e0, $e1, $e2, $w0, $w1, $w2){
    return (($e0 * $w0) + ($e1 * $w1) + ($e2 * $w2)) * -1;
}
function calcular_x_final($e0, $e1, $e2, $e3, $w0, $w1, $w2, $w3){
    return (($e0 * $w0) + ($e1 * $w1) + ($e2 * $w2) + ($e3 * $w3)) * -1;
}
function calcular_S($x){
    return 1/(1 + pow(M_E,$x));
}
function calc_deltamax($learning_rate, $entrada, $deltamin){
    return $learning_rate * $entrada * $deltamin;
}
function recalcular_w($w,$delta){
    return $w + $delta;
}

?>