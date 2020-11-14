<?php


$resultadoJogos = [];

$url = 'https://www.placardefutebol.com.br/';
$dom = new DOMDocument();
$arrayJogos =[];
$html = file_get_contents($url);

libxml_use_internal_errors(true);

$dom->loadHTML($html);
libxml_clear_errors();

$tagDivPai = $dom->getElementsByTagName('div');

//pega os valores de div dentro da div Principal

//funcao retornar divs
foreach ($tagDivPai as $value) {
 //    print_r($value);

    $buscarClasse = $value->getAttribute('class');

    if ($buscarClasse == "container content trending-box") {  

       $tagsA = $value->getElementsByTagName('a');

       foreach ($tagsA as  $tag) {

          $arrayJogos[] = $tag->nodeValue;
        
        }
        print_r($arrayJogos[4]);

    }


    
    
}

    //fim classe especifica



