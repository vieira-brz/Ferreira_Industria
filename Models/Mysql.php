<?php

class Mysql
{
    private static $instance;
    private $con;
    private $dsn;
    private $root;
    private $pass;

    public function __construct()
    {
        $db = parse_ini_file('../../Config/mysql.ini');
        $this->dsn = 'mysql:host='.$db['server'].';dbname'.$db['name'].'charset=utf8';
        $this->root = $db['user'];
        $this->pass = $db['pwd'];
        $this->con = new PDO($this->dsn, $this->root, $this->pass);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function readQuery($query)
    {
        if ($this->con != null) 
        {
            $sql = $this->con->prepare($query);
            $sql->execute();
            
            $dados = array();
            while ($results = $sql->fetch(PDO::FETCH_ASSOC)) 
            {
                $dados[] = $results;
            }
        }
        else
        {
            return -1;
        }
        return $dados;
    }

    public function insertQuery($query)
    {
        if ($this->con != null) 
        {
            $sql = $this->con->prepare($query);
            $sql->execute();
        }
        else
        {
            return -1;
        }
        return $sql;
    }

    public function alterQuery($query)
    {
        if ($this->con != null) 
        {
            $sql = $this->con->prepare($query);
            $sql->execute();
        }
        else 
        {
            return -1;
        }
        return $sql;
    }

    public function deleteQuery($query)
    {
        if ($this->con != null) 
        {
            $sql = $this->con->prepare($query);
            $sql->execute();
        }
        else
        {
            return -1;
        }
        return $sql;
    }

    public function __destruct()
    {
        $this->con = null;
    }
}

?>