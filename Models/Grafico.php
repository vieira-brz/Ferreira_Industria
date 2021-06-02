<?php

class Grafico
{
    private $con;
    public $antigo;
    public $novo;

    public function __construct($conMysql)
    {
        $this->con = $conMysql;
    }

    public function buscaDados($semana, $retorno, $db, $tabelanode)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." ORDER BY data";
        $dados = $this->con->readQuery($query);   
        
        foreach ($dados as $key => $value)
        {
            if (strtotime(date('d-m-Y', strtotime($value['data']))) >= strtotime($semana))
            {
                $this->antigo = date('H', strtotime($value[$key - 1]['data']));
                $this->novo = date('H', strtotime($value['data']));

                if ($this->antigo > $this->novo)
                {
                    $retorno['semanal'][strtoupper(utf8_encode(strftime('%a', strtotime($value['data']))))]
                    ['HORARIO'] = $this->antigo;
                }
                else
                {
                    $retorno['semanal'][strtoupper(utf8_encode(strftime('%a', strtotime($value['data']))))]
                    ['HORARIO'] = $this->novo;
                }
                
                $retorno['semanal'][strtoupper(utf8_encode(strftime('%a', strtotime($value['data']))))]
                ['ENERGIA'] += $value['dado'];
            }
        }
        return $retorno;
    }

    public function dataSelecionada($datai, $dataf, $retorno, $db, $tabelanode)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." WHERE data BETWEEN '".$datai."' and '".$dataf."' ORDER BY data";
        $dados = $this->con->readQuery($query); 

        foreach ($dados as $key) 
        { 
            $retorno['selecao'][date('d/m', strtotime($key['data']))]
            ['ENERGIA'] += $key['dado'];
        }
        return $retorno;
    }
}

?>
