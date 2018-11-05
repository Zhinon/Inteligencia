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
        <a class="nav-link" href="index.php">AND</a>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">NAND</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nor.php">NOR</a>
      </li>
      <li class="nav-item">
                    <a class="nav-link" href="xor-multicapa.php">XOR Multicapa</a>
                </li>
    </ul>
  </div>
</nav>
<?php
include 'funciones.php';
$table_nand = [[0,0,1],[0,1,1],[1,0,1],[1,1,0]];
echo '<div class="container mt-5" ><h2>NAND:</h2>';
perceptron($table_nand);
echo "</div>";

?>
</body>
</html>