<?php

require './classes/PlacarFutebol.php';
require './classes/Liga.php';
require './classes/class/Jogo.php';

$resultados = new PlacarFutebol();
$liga = new Liga();
$novaInfo = new Jogo();

$paragrafoResultados = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();

foreach ($paragrafoResultados as $value) {
    //print_r($value);
    $novaInfo->inserir($value);

}
foreach ($resultadoLiga as $value) {
    //print_r($value);
    $novaInfo->inserir($value);

}
