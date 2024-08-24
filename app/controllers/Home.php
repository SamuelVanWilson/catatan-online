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
        $dataUser = $this->model('Middleware_model')->getRmAuth($_COOKIE['rm_auth']);
        $data['catatan'] =  $this->model('Home_model')->previewCatatan($dataUser['id']);
        $data['catatanUser'] = $this->model('Catatan_model')->cari($_POST['judul']);
        $data['alert'] = 0;

        if ($_POST['judul'] != '') {
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