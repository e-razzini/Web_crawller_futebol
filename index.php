<?php

$resultadoJogos = [];

$url = 'https://www.placardefutebol.com.br/';
$dom = new DOMDocument();
$arrayJogos = [];
$html = file_get_contents($url);

libxml_use_internal_errors(true);

$dom->loadHTML($html);
libxml_clear_errors();

$tagDivPai = $dom->getElementsByTagName('div');

//pega os valores de div dentro da div Principal

//funcao retornar divs
foreach ($tagDivPai as $tagsDivFilho) {
//  print_r($tagsDivFilho);

    $buscarClasse = $tagsDivFilho->getAttribute('class');

    if ($buscarClasse == "container content trending-box") {


        $tagsA = $tagsDivFilho->getElementsByTagName('a');
        $tagsSpan = $tagsDivFilho->getElementsByTagName('span');
        $tagsH5 = $tagsDivFilho->getElementsByTagName('h5');
        $tagsH4 = $tagsDivFilho->getElementsByTagName('h4');
        $tagsP = $tagsDivFilho->getElementsByTagName('p');

        foreach ($tagsA as $tag) {

            $arrayTagA[] = $tag->nodeValue;
        }
       // print_r($arrayTagA);

        foreach ($tagsSpan as $tagS) {

            $arrayTagS[] = $tagS->nodeValue;
        }
      //  print_r($arrayTagS);

        foreach ($tagsH5 as $tagH5) {

            $arrayTagH5[] = $tagH5->nodeValue;
        }      
        foreach ($tagsP as $tagP) {

            $arrayTagP[] = $tagP->nodeValue;
        }
      

       $arrayJogos['Times'] = $arrayTagH5;
       $arrayJogos['situacao'] = $arrayTagS;
       $arrayJogos['versos'] = $arrayTagP;
    }

}
print_r($arrayJogos);
