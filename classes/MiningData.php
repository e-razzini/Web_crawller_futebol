 <?php

require 'League.php';
require 'PlacarFutebol.php';
require './class/Jogo.php';


$resultados = new PlacarFutebol();
$liga = new League();


$resultadosJogos = $resultados->resultadoPlacar();
$resultadoLiga  = $liga->resultadoLiga();

automaticMining($resultadosJogos);
automaticMining($resultadoLiga);

function automaticMining($array)
{
    $novaInfo = new Jogo();

    foreach($array as $value) {

        $novaInfo->inserir($value);
    }
   
}

?>