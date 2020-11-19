<?php 

require './classes/PlacarFutebol.php';
require './classes/Liga.php';
require './classes/Informacoes.php';


$resultados = new PlacarFutebol();
$liga = new Liga();
$novaInfo = new Informacoes();

$paragrafoResultados = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();
foreach ($paragrafoResultados as $value) {
    print_r($value);
    $novaInfo->inserir($value);

}


