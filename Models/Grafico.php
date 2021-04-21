<?php

class Grafico
{
    public function buscaDados($semana, $dados, $retorno)
    {
        foreach ($dados as $key)
        {
            if (date("d/m/Y", strtotime($key['data'])) > date('d/m/Y', strtotime($semana)))
            {
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['data']))))]
                ["HORARIO"] = date("H", strtotime($key['data']));
                
                $retorno['semanal'][strtoupper(utf8_encode(strftime("%a", strtotime($key['data']))))]
                ["ENERGIA"] = $key["dado"];
            }
        }
        return $retorno;
    }
}

?>
