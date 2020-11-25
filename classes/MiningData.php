<?php

require 'Liga.php';
require 'PlacarFutebol.php';
require './class/Jogo.php';

class MiningData {

$resultados = new PlacarFutebol();
$liga = new Liga();
$novaInfo = new Jogo();

$resultadoJogos = $resultados->resultadoPlacar();
$resultadoLiga = $liga->resultadoLiga();

autoMatic($resultadoJogos);
autoMatic($resultadoLiga);

function autoMatic($array){
   $novaInfo = new Jogo();

   foreach ($resultadoLiga as $value) {
  
      $novaInfo->inserir($value);
      }
}   


}








?>