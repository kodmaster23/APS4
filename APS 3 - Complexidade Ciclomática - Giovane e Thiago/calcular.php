<?php
require_once('CalcularImc.php');

$teste = new CalcularImc();
echo $teste->calcular($_POST["peso"], $_POST["altura"]);