<?php

class Usuarios
{
    private $con;

    public function __construct($conMysql)
    {
        $this->con = $conMysql;
    }

    public function verificaExistenciaUsers($db, $tabela, $email)
    {
        $query = "SELECT * FROM ".$db.".".$tabela." WHERE EMAIL = '".$email."'";
        $sql = $this->con->readQuery($query);
        return $sql;
    }

    public function cadastraUsers($db, $tabela, $nome, $email, $senha, $palavra, $acesso)
    {
        $query = "INSERT INTO ".$db.".".$tabela." (NOME, EMAIL, SENHA, PALAVRA, ACESSO) VALUES ('".$nome."', '".$email."', '".$senha."', '".$palavra."', '".$acesso."')";
        $sql = $this->con->insertQuery($query);
        return $sql;
    }

    public function editaUsers($db, $tabela, $nome, $email, $acesso, $value)
    {
        $query = "UPDATE ".$db.".".$tabela." SET NOME = '".$nome."', EMAIL = '".$email."', ACESSO = '".$acesso."' WHERE ID = ".$value;
        $sql = $this->con->alterQuery($query);

        if ($sql == true)
        {
            $_SESSION['alterado'] = true;
            header('Location: ../../Views/admin/funcionarios.php');
        }
        else
        {
            $_SESSION['nao_alterado'] = true;
            header('Location: ../../Views/admin/funcionarios.php');        
        }
    }

    public function excluirUsers($db, $tabela, $value)
    {
        $query = "DELETE FROM ".$db.".".$tabela." WHERE ID = ".$value;
        $sql = $this->con->deleteQuery($query);

        if ($sql == true)
        {
            $_SESSION['deletado'] = true;
            header('Location: ../../Views/admin/funcionarios.php');
        }
        else
        {
            $_SESSION['nao_deletado'] = true;
            header('Location: ../../Views/admin/funcionarios.php');        
        }
    }

    public function alteraSenha($db, $tabela, $senha, $id)
    {
        $query = "UPDATE ".$db.".".$tabela." SET SENHA = '".$senha."' WHERE ID = ".$id;
        $sql = $this->con->alterQuery($query);

        if ($sql == true)
        {
            $_SESSION['senha_alterada'] = true;
            header('Location: ../../Views/relembrar-senha.php');
        }
        else 
        {
            $_SESSION['senha_nao_alterada'] = true;
            header('Location: ../../Views/relembrar-senha.php');
        }
    }
}

?>