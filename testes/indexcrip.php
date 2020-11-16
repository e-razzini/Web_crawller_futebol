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
function divEncontraTag($subDiv ,$tagValue='a')
{

    $tagRetornada = null;

    foreach ($subDiv  as $dvsInternas) {

             //$buscaClasse=$dvsInternas->getAttribute('class');
            //$dvsInternas->getAttribute('class');

              if ($dvsInternas == $subDiv) {
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

$divPrincipal = divEncontrarClasse($tagDivPai, 'container main-content');
$divInter = divEncontrarClasse($divPrincipal, 'container content');
$divTag = divEncontraTag($divInter);
$tagDado = getDados($divInter);
$tagDad = getDados($divTag);

$array = json_encode($tagDad);
//print_r($tagDado);
//print_r($tagDad);
print_r($array);
