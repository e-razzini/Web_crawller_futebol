<?php

class PlacarFutebol
{

    private $url;
    private $proxy;
    private $dom;
    private $html;
// public $resultadoJogos =[];

    public function __construct()
    {
        $this->proxy = '10.1.21.254:3128';
        $this->url = 'https://www.gutenberg.org/';
        $this->dom = new DOMDocument();
    }

    private function getContextoConexao()
    {
        $arrayPConfig = array(

            'http' => array(

                'proxy' => $this->proxy,
                'request_fulluri' => true,
            ),

            'https' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true,
            ),
        );

        $context = stream_context_create($arrayPConfig);

        return $context;
    }

    /////
    private function carregarHtml()
    {
        $this->html = file_get_contents($this->url);

        libxml_use_internal_errors(true);

        //transforma o html em objeto
        $this->dom->loadHTML($this->html);
        libxml_clear_errors();
    }

    /////
    private function capturaTodasDivs()
    {

        $todasDiv = $this->dom->getElementsByTagName('div');
        return $todasDiv;
    }

    /////
    private function divEncontrar($todasDiv, $class = array('container content trending-box'), $tagBuscada = array('a'), $atributoHtml = array('class'))
    {

        $tagEncontrada = null;

        foreach ($todasDiv as $dvsInternas) {

            $buscaClasse = $dvsInternas->getAttribute($atributoHtml);

            if ($buscaClasse == $class) {

                $tagEncontrada = $dvsInternas->getElementsByTagName($tagBuscada);

            }
        }
        return $tagEncontrada;
    }
   
    /////
    private function getTags($tagEncontrada)
    {
        $arrayResultados = [];

        foreach ($tagEncontrada as $tag) {

            $arrayResultados[] = $tag->nodeValue;
        }

        return $arrayResultados;
    }
    
    /////
    public function resultadoPlacar()
    {

        $this->carregarHtml();

        $tagsDiv = $this->capturaTodasDivs();

        $encontraTagA = $this->divEncontrar($tagsDiv);
        $resultadoJogos = $this->getTags($encontraTagA);
        return $resultadoJogos;

    }

}
$resultados = new PlacarFutebol();

$paragrafoResultados = $resultados->resultadoPlacar();
echo $paragrafoResultados;
