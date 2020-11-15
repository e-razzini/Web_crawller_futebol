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
        $this->url = 'https://www.placardefutebol.com.br/';
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
    private function divEncontrar($todasDiv)
    {

        $divInterna=null;

        foreach ($todasDiv as $dvsInternas) {

            $buscaClasse = $dvsInternas->getAttribute('class');

            if ($buscaClasse == 'container content trending-box') {
          
              $divInterna = $dvsInternas->getElementsByTagName('a');
            //     $divInterna['situacao'] = $dvsInternas->getElementsByTagName('span');
            //     $divInterna['nomes'] = $dvsInternas->getElementsByTagName('h5');
            //     $divInterna = $dvsInternas->getElementsByTagName('p');

                break;
            }
        }
        return $divInterna;
    }

      private function divEncontrarBuscaTag($todasDiv,$valueAttribute  ='container content',$typeAttribute ='class',$tagValue ='a')
    {

        $divInterna=null;

        foreach ($todasDiv as $dvsInternas) {

            $buscaClasse = $dvsInternas->getAttribute($typeAttribute);

            if ($buscaClasse == $valueAttribute) {
          
              $divInterna = $dvsInternas->getElementsByTagName($tagValue);          
                break;
            }
        }
        return $divInterna;
    }

/////
    private function getDados($tagBuscada)
    {

        $arrayTags = null;

        foreach ($tagBuscada as $tagInfo) {

            $arrayTags[] = $tagInfo->nodeValue;
        }

        return $arrayTags;
    }

/////
    public function resultadoPlacar()
    {

        $this->carregarHtml();
        $tagsDiv = $this->capturaTodasDivs();

        $encontraDiv = $this->divEncontrar($tagsDiv);     
        $capturaOutTags =$this->divEncontrarBuscaTag($tagsDiv);

        $capturaTags = $this->getDados($capturaOutTags);
        $capturaTag = $this->getDados($encontraDiv);
        
        $captura =[];

        $captura ['amistoso_selecao'] = $capturaTags;
        $captura ['mais_Populares'] = $capturaTag;
          
        return   $captura ;

    }

}

