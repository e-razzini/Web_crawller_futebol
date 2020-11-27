<?php

require './classes/PlacarFutebol.php';
require './classes/League.php';
require './classes/class/Jogo.php';

$jog = new Jogo();
$lig =new League();
$placar = new PlacarFutebol();

// timer de controle
$dataAtual = date('Y-m-d H:i:s');
$dataUltimaAtualizacao = $jog->dateDeInput();
$dataAtualizada = "";

foreach ($dataUltimaAtualizacao as $data) {
    $dataAtualizada = $data['data_captura'];
}
$ultAtua = strtotime($dataAtualizada);
$dtAtual = time();
//fim timer controle

$resultadosJogos = $placar->resultadoPlacar();
$resultadoLiga = $lig->resultadoLiga();

if (($dtAtual - $ultAtua) == 8000) {

    
   automaticMining($resultadosJogos);
   automaticMining($resultadoLiga);
    
    $jogos = $jog->listar();

} else {


    $jogos = $jog->listar();
}

function automaticMining($array)
{

    $jog = new Jogo();

    foreach ($array as $value) {

        $jog->inserir($value);
    }

}

?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Crawller</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
       <h2>Jogos de futebol</h2>
    <ul>

        <?php foreach ($jogos as $j) {?>
            <li><?php echo $j['informacao']; ?></li>
        <?php }?>


    </ul>



</body>

</html>