 <?php 

 class PlacarFutebol {
  
    private $url;
    private $proxy;
    private $dom;
    private $html;
    public $resultadoJogos =[];

    public function __construct()
    {
        $this->proxy = '10.1.21.254:3128';
        $this->url = 'https://www.gutenberg.org/';
        $this->dom =  new DOMDocument();
    }

    private function getContextoConexao()                
    {
        $arrayPConfig = array(

            'http' => array(

                'proxy' => $this->proxy,
                'request_fulluri' => true
            ),

            'https' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true
            )
        );

        $context = stream_context_create($arrayPConfig);

        return $context;
    }

    private function carregarHtml()
    {
        /* usar somente em local que for config PROXY 
        $context = $this->getContextoConexao();
        $this->html = file_get_contents($this->url, false, $context);
        */
        $this->html = file_get_contents($this->url);

        libxml_use_internal_errors(true);

        //transforma o html em objeto
        $this->dom->loadHTML($this->html);
        libxml_clear_errors();
    }

    private function capturaTodasDivs()
    {

        $todasDiv = $this->dom->getElementsByTagName('div');
        return $todasDiv;
    }

    private function divEncontrar($todasDiv)
    {

        $tagEncontrada = null;

        foreach ($todasDiv as  $dvsInternas) {

            $buscaClasse = $dvsInternas->getAttribute('class');

            if ($buscaClasse == 'container content trending-box') {

                $tagEncontrada = $dvsInternas->getElementsByTagName('a');
                
            break;
        }
    }
    return $tagEncontrada;

    }

    private function encontrarTag($tagEncontrada)
    {
        $arrayResultados= [];
        foreach ($tagEncontrada as $tag) {

          $arrayResultados[]= $tag->nodeValue;
        }

       return $arrayResultados;
    }


    public function resultadoPlacar(){

        $this->carregarHtml();

        $tagsDiv = $this->capturaTodasDivs();

        $buscaDiv =$this->divEncontrar($tagsDiv);

        $tags = $this->encontrarTag($buscaDiv);

        $resultadoJogos[] = $tags;

        return $resultadoJogos;
       
    }

}

