<?php
use Project\Core\Database as Db;

class Home_model{
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function previewCatatan($id){
        $query = "SELECT * FROM catatan WHERE userId = :id";

        $this->db->query($query);
        $this->db->bindValue(':id', $id);

        return $this->db->resultMore();
    }
}