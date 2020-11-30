 <?php

require_once('Uefa.php');
require_once('PlacarFutebol.php');
require_once('class/Jogo.php');

class Mining
{

    private $resultado;
    private $liga;
    private $novaInfo;

    public function __construct()
    {
        $this->resultado = new PlacarFutebol();

        $this->liga = new Uefa();

        $this->novaInfo =new Jogo();

    }

    public function listaJogos()
    {
       

        $resultadosJogos = $this->resultado->resultadoPlacar();
        $resultadoLiga = $this->liga->resultadoLiga();

        $this->automaticMining($resultadosJogos);
        $this->automaticMining($resultadoLiga);

    }

    private function automaticMining($array)
    {
        $arrayR =[];
        foreach ($array as $value) {

        $arrayR = $this->novaInfo->inserir($value);
        }

        return $arrayR;
    }
}
?>