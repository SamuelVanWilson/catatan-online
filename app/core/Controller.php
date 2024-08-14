<?php
namespace Project\Core;
class Controller{
    public function view($view, $data = []){
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }

    public function model(){

    }
}