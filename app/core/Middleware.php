<?php
require_once __DIR__ . '/../models/Middleware_model.php';

class Middleware{
    public static function authEnter(){
        if (!isset($_SESSION['verifiedAuth'])) {
            if (isset($_COOKIE['rm_auth'])) {
                $authUser = new Middleware_model();
                if ($authUser->getRmAuth($_COOKIE['rm_auth'])) {
                    $_SESSION['verifiedAuth'] = $_COOKIE['rm_auth'];
                    header('Location: '.BASE_URL.'home');exit;
                }else {
                    header('Location: '.BASE_URL.'autentikasi');exit;
                }
            }else{
                header('Location: '.BASE_URL.'autentikasi');exit;
            }
        }
    }

    public static function authVerified(){
        if (isset($_SESSION['verifiedAuth'])) {
            header('Location: '.BASE_URL.'home');
        }
    }
}