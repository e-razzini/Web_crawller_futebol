<?php

require './Liga.php';
require './PlacarFutebol.php';
require '../classes/class/Jogo.php';

$resultados = new PlacarFutebol();
$liga = new Liga();
$novaInfo = new Jogo();

$paragrafoResultados = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();

foreach ($paragrafoResultados as $value) {
  
    $novaInfo->inserir($value);
}
foreach ($resultadoLiga as $value) {
    
    $novaInfo->inserir($value);
}

?>