<?php

use Project\Core\Controller;

class Home extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('home');
        $this->view('templates/footer');
    }
    public function tes(){
        echo 'ini index';
    }
}