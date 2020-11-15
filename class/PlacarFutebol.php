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

    public function getContextoConexao()
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
    public function carregarHtml()
    {
        $this->html = file_get_contents($this->url);

        libxml_use_internal_errors(true);

//transforma o html em objeto
        $this->dom->loadHTML($this->html);
        libxml_clear_errors();
    }

/////
    public function capturaTodasDivs()
    {

        $todasDiv = $this->dom->getElementsByTagName('div');
        return $todasDiv;
    }

/////
    public function divEncontrar($todasDiv, $nameClass = 'container content trending-box')
    {

        $tagProcurada = null;

        foreach ($todasDiv as $dvsInternas) {

            $buscaClasse = $dvsInternas->getAttribute('class');

            if ($buscaClasse == $nameClass) {

                $tagProcurada = $dvsInternas->getElementsByTagName('p');
                break;
            }
        }
        return $tagProcurada;
    }

/////
   
/////
    public function getDados($tagProcurada)
    {

        $arrayTags = [];

        foreach ($tagProcurada as $tagInfo) {

            $arrayTags[] = $tagInfo->nodeValue;
        }

        return $arrayTags;
    }

/////
    public function resultadoPlacar()
    {

        $this->carregarHtml();
        $tagsDiv = $this->capturaTodasDivs();

        $encontraTagA = $this->divEncontrar($tagsDiv);        
        $capturaTags =$this->getDados($encontraTagA);

        return $capturaTags;

    }

}
$resultados = new PlacarFutebol();

$paragrafoResultados = $resultados->resultadoPlacar();
$paragrafoResultados;

print_r($paragrafoResultados);
