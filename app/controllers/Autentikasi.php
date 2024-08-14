<?php

use Project\Core\Controller;

class Autentikasi extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('autentikasi');
        $this->view('templates/footer');
    }
}