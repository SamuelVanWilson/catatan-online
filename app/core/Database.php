<?php
namespace Project\Core;

use PDOException;
use PDO;

class Database {
    private $db_name = DB_NAME;
    private $db_host = DB_HOST;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASS;
    private $dbh;
    private $statement;

    public function __construct() {
        $dsn = "mysql:host=$this->db_host;dbname=$this->db_name";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->db_username, $this->db_password, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query){
        $this->statement = $this->dbh->prepare($query);
    }

    public function bindValue($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_string($value) :
                    $type = PDO::PARAM_STR;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                default :
                    $type = PDO::PARAM_NULL;
                    break;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function execute(){
        $this->statement->execute();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function resultSingle(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function resultMore(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

