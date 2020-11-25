<?php

require './Liga.php';
require './PlacarFutebol.php';
require '../classes/class/Jogo.php';

$resultados = new PlacarFutebol();
$liga = new Liga();
$novaInfo = new Jogo();

$resultadoJogos = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();

automaticScann($resultadoJogos);
automaticScann($resultadoLiga);



function automaticScann($array){

    foreach ($array as $value) {
  
        $novaInfo->inserir($value);
    }

}




?>