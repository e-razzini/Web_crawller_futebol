
<?php 

require 'Conexao.php';
use Classes\Conexao;

class Informacoes {

    public function __construct() {

        $con = new Conexao();
        $this->conexao = $con->getConexao();

    }

    public function listar() {
        
        $sql = "select resultado_jogos.informacao, resultado_jogos.data_captura * from resultado_jogos;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
        
    }

    public function inserir($informacao) {
        
        $sql = "insert into  resultado_jogos (informacao) values (?);";
        $q = $this->conexao->prepare($sql);        
        $q->bindParam(1,$informacao);        
        $q->execute();
        
    }




}