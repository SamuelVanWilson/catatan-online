<?php

use Project\Core\Controller;
use Project\Core\Flasher;
class Home extends Controller{
    public function __construct() {
        Middleware::authEnter();
    }
    public function index(){
        $data['navigasi'] = 'home';
        $dataUser = $this->model('Middleware_model')->getRmAuth($_COOKIE['rm_auth']);
        $data['catatanUser'] =  $this->model('Home_model')->previewCatatan($dataUser['id']);
        $data['alert'] = 0;
        $this->view('templates/header', $data);
        $this->view('home', $data);
        $this->view('templates/footer');
    }

    public function cariCatatan(){
        $data['navigasi'] = 'home';
        $judulCatatan = (empty($_POST['judul'])) ? '' : $_POST['judul'] ;
        $dataUser = $this->model('Middleware_model')->getRmAuth($_COOKIE['rm_auth']);
        $data['catatanUser'] = $this->model('Catatan_model')->cari($judulCatatan, $dataUser['id']);
        $data['alert'] = 0;

        if ($judulCatatan != '') {
            if ($data['catatanUser'] != false) {
                Flasher::setFlasher('success', 'data berhasil ditemukan', 'kosongkan serach dan pencet tombol lagi untuk melihat semua catatan');
            }else{
                $data['alert'] = 1;
                Flasher::setFlasher('danger', 'data gagal ditemukan', 'catatan mungkin belum kamu buat');
            }
        }

        $this->view('templates/header', $data);
        $this->view('home', $data);
        $this->view('templates/footer');
    }
}