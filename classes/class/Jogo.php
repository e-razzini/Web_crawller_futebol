
<?php 

require 'Conexao.php';
use Classes\Conexao;

class Jogo {

    public function __construct() {

        $con = new Conexao();
        $this->conexao = $con->getConexao();

    }

    public function listar() {
        
        $sql = "select * from resultado_jogos;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
        
    }
    public function dateDeInput() {
        
        $sql = "select data_captura from resultado_jogos order by data_captura desc limit 1;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
        
    }

    public function inserir($informacao) {
        
        $dataAtual =date('Y-m-d H:i:s');
        $sql = "insert into  resultado_jogos (informacao,data_captura) values (?,?);";
        $q = $this->conexao->prepare($sql);        
        $q->bindParam(1,$informacao);                      
        $q->bindParam(2,$dataAtual);        
        $q->execute();        
    }
    public function update($informacao) {
        
        $dataAtual =date('Y-m-d H:i:s');
        $sql = "Update resultado_jogos  set informacao = ? ,data_captura = ?  where id_resultado >  0;";
        $q = $this->conexao->prepare($sql);        
        $q->bindParam(1,$informacao);                      
        $q->bindParam(2,$dataAtual);        
        $q->execute();        
    }




}