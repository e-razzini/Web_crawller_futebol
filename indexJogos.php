<?php 

require './class/PlacarFutebol.php';

$resultados = new PlacarFutebol();

$paragrafoResultados = $resultados->resultadoPlacar();
// var_dump($paragrafoResultados);

print_r($paragrafoResultados) ;


