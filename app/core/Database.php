<?php
namespace Project\Core;

class Database {
    private $db_name = DB_NAME;
    private $db_host = DB_HOST;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASS;
    private $dbh;
    private $statement;

    public function __construct() {
        $dsn = "mysql:host=$this->db_host;db_name=$this->db_name";
    }
}