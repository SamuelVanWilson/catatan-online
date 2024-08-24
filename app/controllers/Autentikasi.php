<?php

use Project\Core\Controller;

class Autentikasi extends Controller{
    public function __construct() {
        Middleware::authVerified();
    }
    public function index(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(14));
        }
        $data['navigasi'] = 0;
        $this->view('templates/header', $data);
        $this->view('autentikasi_login');
        $this->view('templates/footer');
    }

    public function daftar(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(14));
        }
        $data['navigasi'] = 0;
        $this->view('templates/header', $data);
        $this->view('autentikasi_register');
        $this->view('templates/footer');
    }

    public function login(){
        if ($_SESSION['csrf_token'] === $_POST['csrf_token']) {
            $this->model('Autentikasi_model')->login($_POST);
        }
    }

    public function register(){
        if ($_SESSION['csrf_token'] === $_POST['csrf_token']) {
            $userDataId = $this->model('Autentikasi_model')->register($_POST);
            $this->model('Middleware_model')->setRmAuth($userDataId);
            header('Location: '.BASE_URL.'home');
        } else {
            die('ngirim apa hayooo');
        }
    }
}