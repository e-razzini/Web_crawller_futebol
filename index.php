<?php

require_once('./Classes/PlacarFutebol.php');
require_once('./Classes/Uefa.php');
require_once('./Classes/class/Jogo.php');
require_once('./Classes/Mining.php');

$jog = new Jogo();
$min = new Mining();

// timer de controle
$dataAtual = date('Y-m-d H:i:s');
$dataUltimaAtualizacao = $jog->dateDeInput();
$dataAtualizada = "";

foreach ($dataUltimaAtualizacao as $data) {

    $dataAtualizada = $data['data_captura'];

}

if ($data['data_captura'] == null) {

    $data['data_captura'] = $dataAtual;
    $dataAtualizada = $data['data_captura'];
}


$ultAtua = strtotime($dataAtualizada);
$dtAtual = time();

$controlData = $dtAtual - $ultAtua;
//fim timer controle

if ($controlData <= 5000) {

    $min->listaJogos();
    $jogos = $jog->listar();

} else {

    $jogos = $jog->listar();
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