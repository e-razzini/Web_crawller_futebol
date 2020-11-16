<?php 

require './class/PlacarFutebol.php';
require './class/Liga.php';

$resultados = new PlacarFutebol();
$liga = new Liga();

$paragrafoResultados = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();

print_r($paragrafoResultados);
print_r($resultadoLiga);

