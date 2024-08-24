<?php

use Project\Core\Controller;

class Catatan extends Controller{
    public function __construct() {
        Middleware::authEnter();
    }

    public function index($catatanId){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(14));
        }
        $data['navigasi'] = 'catatan';
        $data['dataCatatan'] = $this->model('Catatan_model')->tampil($catatanId);
        $this->view('templates/header', $data);
        $this->view('catatan', $data);
        $this->view('templates/footer');
    }

    public function catatanBaru(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(14));
        }
        $data['navigasi'] = 'tambahCatatan';
        $this->view('templates/header', $data);
        $this->view('tambahCatatan');
        $this->view('templates/footer');
    }

    public function tambah(){
        if ($_SESSION['csrf_token'] == $_POST['csrf_token']) {
            $dataUser = $this->model('Middleware_model')->getRmAuth($_COOKIE['rm_auth']);
            $this->model('Catatan_model')->tambah($_POST, $dataUser['id']);
        }
    }
    public function edit($catatanId){
        if ($_SESSION['csrf_token'] == $_POST['csrf_token']) {
            $this->model('Catatan_model')->edit($_POST, $catatanId);
        }
    }
    public function hapus($catatanId){
        $this->model('Catatan_model')->hapus($catatanId);
    }
}