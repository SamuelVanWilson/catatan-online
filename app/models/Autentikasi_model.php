<?php
use Project\Core\Database as Db;
use Project\Core\Flasher;

class Autentikasi_model {
    private $db;
    public function __construct() {
        $this->db = new Db();
    }

    public function register($data){
        $query = "INSERT INTO users (nama, sandi) VALUES (:nama, :sandi)";
        $nama = strtolower(htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8'));
        $password = password_hash(htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8'), PASSWORD_ARGON2ID);

        $this->db->query($query);
        $this->db->bindValue(':nama', $nama);
        $this->db->bindValue(':sandi', $password);

        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function login($data){
        $query = "SELECT * FROM users WHERE nama = :nama";
        $nama = strtolower(htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8'));
        $password = htmlspecialchars($data['sandi'], ENT_QUOTES, 'UTF-8');

        $this->db->query($query);
        $this->db->bindValue(':nama', $nama);

        $user = $this->db->resultSingle();
        if ($user == false) {
            Flasher::setFlasher('danger', 'user tidak ditemukan', 'silahkan cek kembali untuk login');
            header('Location: '.BASE_URL.'autentikasi');
        }else{
            if (password_verify($password, $user['sandi'])) {
                setcookie('rm_auth', $user['rm_tkn'], time() + (8400 * 30), '/');
                header('Location: '.BASE_URL.'home');
            }else{
                Flasher::setFlasher('danger', 'password salah', 'silahkan cek kembali untuk login');
                header('Location: '.BASE_URL.'autentikasi');
            } 
        }
    }
}