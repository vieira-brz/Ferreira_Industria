<?php

class Grafico
{
    public function buscaDados($semana, $dados, $retorno)
    {
        foreach ($dados as $key)
        {
            if (strtotime(date("d/m/Y", strtotime($key["data"]))) >= strtotime($semana))
            {
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['data']))))]
                ["HORARIO"] = date("H", strtotime($key['data']));
                
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['data']))))]
                ["ENERGIA"] = $key['dado'];
            }
        }
        return $retorno;
    }
}

?>
