               <?php

require 'Liga.php';
require 'PlacarFutebol.php';
require './class/Jogo.php';

class MiningData
{

    private $resultados;
    private $liga;

    public function __construct()
    {
        $lig = new liga();
        $result = new PlacarFutebol();

        $this->resultados = $result->resultadoPlacar();
        $this->liga = $lig->resultadoLiga();
    }

    function list() {
        $this->insertData($this->resultados);
        $this->insertData($this->liga);

    }
    private function insertData($array)
    {
        $info = new Jogo();
        $dados = [];
        foreach ($array as $value) {

            $dados = $info->inserir($value);
        }
        return $dados;
    }

}

?>