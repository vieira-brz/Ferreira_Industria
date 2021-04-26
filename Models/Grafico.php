<?php

class Grafico
{
    private $con;

    public function __construct($conMysql)
    {
        $this->con = $conMysql;
    }

    public function buscaDados($semana, $retorno)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode;
        $dados = $this->con->readQuery($query);   

        foreach ($dados as $key)
        {
            if (strtotime(date('d/m/Y', strtotime($key['data']))) >= strtotime($semana))
            {
                $retorno['semanal'][strtoupper(utf8_encode(strftime('%a', strtotime($key['data']))))]
                ['HORARIO'] = date('H', strtotime($key['data']));
                
                $retorno['semanal'][strtoupper(utf8_encode(strftime('%a', strtotime($key['data']))))]
                ['ENERGIA'] = $key['dado'];
            }
        }
        return $retorno;
    }

    public function dataSelecionada($datai, $dataf, $retorno)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." WHERE data BETWEEN '".$datai."' and '".$dataf."'";
        $dados = $this->con->readQuery($query); 

        foreach ($dados as $key) 
        {
            var_dump($dados);
        }
        return $retorno;
    }
}

?>
