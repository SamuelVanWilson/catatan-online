<?php
namespace Project\Core;

class Flasher {
    public static function setFlasher($tipe, $judul, $pesan){
        $_SESSION['flash'] = [
            'tipe' => $tipe,
            'judul' => $judul,
            'pesan' => $pesan
        ];
    }

    public static function alert(){
        echo <<<FLASH
                <div class="container-fluid d-flex justify-content-center fixed-top z-10" id="pesan">
                    <div class="alert alert-{$_SESSION["flash"]["tipe"]} alert-dismissible fade show position-fixed mx-4 mt-4" role="alert">
                        <strong>{$_SESSION["flash"]["judul"]}</strong> {$_SESSION["flash"]["pesan"]}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
        FLASH;
        unset($_SESSION['flash']);
    }
}   