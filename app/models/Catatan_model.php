<?php

use Project\Core\Database as Db;

class Catatan_model{
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function tambah($data, $userId){
        $query = "INSERT INTO catatan (judul, isi, userId) VALUES (:judul, :isi, :userId)";
        $judul = htmlspecialchars($data['judul'], ENT_QUOTES, 'UTF-8');
        $isi = htmlspecialchars($data['isi'], ENT_QUOTES, 'UTF-8');

        $this->db->query($query);
        $this->db->bindValue(':judul', $judul);
        $this->db->bindValue(':isi', $isi);
        $this->db->bindValue(':userId', $userId);

        $this->db->execute();
        header('Location: '.BASE_URL.'tambahcatatan');
    }
    public function tampil($catatanId){
        $query = "SELECT * FROM catatan WHERE catatanId = :catatanId";

        $this->db->query($query);
        $this->db->bindValue(':catatanId', $catatanId);
        return $this->db->resultSingle();
    }
    public function edit($data,$catatanId){
        $query = "UPDATE catatan SET judul = :judul, isi = :isi WHERE catatanId = :catatanId";
        $judul = htmlspecialchars($data['judul'], ENT_QUOTES, 'UTF-8');
        $isi = htmlspecialchars($data['isi'], ENT_QUOTES, 'UTF-8');

        $this->db->query($query);
        $this->db->bindValue(':judul', $judul);
        $this->db->bindValue(':isi', $isi);
        $this->db->bindValue(':catatanId', $catatanId);

        
        $this->db->execute();
        header('Location: '.BASE_URL.'home');
    }
    public function hapus($catatanId){
        $query = "DELETE FROM catatan WHERE catatanId = :catatanId";

        $this->db->query($query);
        $this->db->bindValue(':catatanId', $catatanId);

        $this->db->execute();
        header('Location: '.BASE_URL.'home');
    }

    public function cari($keyword){
        $query = "SELECT * FROM catatan WHERE judul LIKE :judul";
        $keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

        $this->db->query($query);
        $this->db->bindValue(':judul', "%$keyword%");

        return $this->db->resultMore();
    }
}