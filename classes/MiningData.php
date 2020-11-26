 <?php

require 'League.php';
require 'PlacarFutebol.php';
require './class/Jogo.php';

class MiningData {

    private $resultados;
    private $liga;

    public function __construct()
    {
        
        $this->resultados = new PlacarFutebol();
        $this->liga = new League();
    }

   //   $resultadosJogos = $this->resultados->resultadoPlacar();
    //  $resultadoLiga  = $this->liga->resultadoLiga();



public function listNewData(){

    $resultadosJogos = $this->resultados->resultadoPlacar();
    $resultadoLiga = $this->liga->resultadoLiga();
     $aux = $this->automaticMining($resultadosJogos);
    //$this->automaticMining($resultadoLiga);
    
   return $aux;
   
}


 private function automaticMining($array)
{
    $novaInfo = new Jogo();
    $dados = [];
    foreach($array as $value) {
 
     $dados =  $novaInfo->inserir($value);
    }
    return $dados;
}
   

}        


?>