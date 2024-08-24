<?php
use Project\Core\Database as Db;

class Middleware_model{
    private $db;
    public function __construct() {
        $this->db = new Db();
    }

    public function setRmAuth($userId) {
        $token = bin2hex(random_bytes(8));
        setcookie('rm_auth', $token, time() + (86400 * 30) , '/');
        $query = 'UPDATE users SET rm_tkn = :token WHERE id = :id';

        $this->db->query($query);
        $this->db->bindValue(':token', $token);
        $this->db->bindValue(':id', $userId);

        $this->db->execute();
    }

    public function getRmAuth($token){
        $query = 'SELECT * FROM users WHERE rm_tkn = :token';

        $this->db->query($query);
        $this->db->bindValue(':token', $token);

        return $this->db->resultSingle();
    }
}