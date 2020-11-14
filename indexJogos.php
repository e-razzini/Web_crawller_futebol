<?php 

require './class/PlacarFutebol.php';

$resultados = new PlacarFutebol();

$paragrafoResultados = $resultados->resultadoPlacar();

print_r($paragrafoResultados);


