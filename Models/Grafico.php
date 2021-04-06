<?php

class Grafico 
{
    private $results;

    public function buscaDados($semana, $dados, $retorno)
    {
        foreach ($dados as $key)
        {
            if (date("d/m/Y", strtotime($key['DATA_REGISTRO'])) > $semana) 
            {
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['DATA_REGISTRO']))))]
                ["HORARIO"] = date("H", strtotime($key['DATA_REGISTRO']));
    
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['DATA_REGISTRO']))))]
                ["ENERGIA"] = $key["ENERGIA"];
            }
        }
        return $retorno;
    } 
}

?>