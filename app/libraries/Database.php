<?php
class Database
{
    private $dbaseHandler;
    private $statementHandler;
    private $error;


    public function __construct()
    {
        try {
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $dns = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
            $this->dbaseHandler = new PDO($dns, DBUSER, DBPASS, $options);
        } catch (PDOException $error) {
            $this->error = $error;
            echo $this->error;
        }
    }

    public function prepare($query)
    {
        $this->statementHandler =  $this->dbaseHandler->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                   $type = PDO::PARAM_INT;
                   break; 
                

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->statementHandler->bindValue($param,$value,$type);
    }

    public function execute()
    {
        return $this->statementHandler->execute();
    }

    public function getRow()
    {
        $this->execute();
        return $this->statementHandler->fetch(PDO::FETCH_OBJ);
    }

    public function getArray()
    {
        $this->execute();
        return $this->statementHandler->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->statementHandler->rowCount();
    }
}
