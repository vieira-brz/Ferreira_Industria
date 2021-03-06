<?php

class Grafico
{
    private $con;

    public function __construct($conMysql)
    {
        $this->con = $conMysql;
    }


    public function buscaDadosHoje($db, $tabelanode)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." WHERE `data` > now() - INTERVAL 9 HOUR ORDER BY `data`";
        $dados = $this->con->readQuery($query);   

        foreach ($dados as $key)
        {
            $retorno['HORARIO'][] = date('H:i:s', strtotime($key['data']));
            
            $retorno['ENERGIA'][] = $key['dado'];
        }

        return $retorno;
    }

    public function buscaDados($semana, $retorno, $db, $tabelanode)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." ORDER BY data";
        $dados = $this->con->readQuery($query);   

        foreach ($dados as $key)
        {
            if (strtotime(date('d-m-Y', strtotime($key['data']))) >= strtotime($semana))
            {
                $retorno['semanal'][strtoupper(utf8_encode(strftime('%A - %d/%m', strtotime($key['data']))))]
                ['HORARIO'] = date('H', strtotime(max($key)));
                
                $retorno['semanal'][strtoupper(utf8_encode(strftime('%A - %d/%m', strtotime($key['data']))))]
                ['ENERGIA'] += $key['dado'];
            }
        }
        return $retorno;
    }

    public function dataSelecionada($datai, $dataf, $retorno, $db, $tabelanode)
    {
        $query = "SELECT * FROM ".$db.".".$tabelanode." WHERE data BETWEEN ('".$datai."' - INTERVAL 1 DAY) and ('".$dataf."' + INTERVAL 1 DAY) ORDER BY data";
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
