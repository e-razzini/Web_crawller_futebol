<?php

$url = 'https://www.placardefutebol.com.br/liga-das-nacoes-uefa/';
$dom = new DOMDocument();
$html = file_get_contents($url);
libxml_use_internal_errors(true);

$dom->loadHTML($html);
libxml_clear_errors();

$tagDivPai = $dom->getElementsByTagName('div');

foreach ($tagDivPai as $tagsDivFilho) {


    $buscarClasse = $tagsDivFilho->getAttribute('class');
}
function divEncontrarClasse($todasDiv, $valueAttribute, $typeAttribute = 'class')
{

    $divInterna = null;

    foreach ($todasDiv as $dvsInternas) {

        $buscaClasse = $dvsInternas->getAttribute($typeAttribute);

        if ($buscaClasse == $valueAttribute) {

            $divInterna = $dvsInternas->getElementsByTagName('div');
            break;
        }
    }
    return $divInterna;
}
function divEncontraTag($subDiv ,$nameClasse,$tagValue='a')
{

    $tagRetornada = null;

    foreach ($subDiv  as $dvsInternas) {

             $buscaClasse=$dvsInternas->getAttribute('class');           

              if ($buscaClasse == $nameClasse) {

                $tagRetornada = $dvsInternas->getElementsByTagName($tagValue);

                break;

             }
    }
    return $tagRetornada;
}
function getDados($tagBuscada)
{

    $arrayTags = [];

    foreach ($tagBuscada as $tagInfo) {

        $arrayTags[] = $tagInfo->nodeValue;
    }

    return $arrayTags;
}

$df = divEncontrarClasse($tagDivPai, 'container main-content');
$dn = divEncontrarClasse($df, 'livescore','id');

$et = divEncontraTag($dn,'container content');

$tagDad = getDados($et);
//print_r($tagDad);

$array = json_encode($tagDad);
print_r($array);
 //print_r($tagDad);
//print_r($tagDado);
