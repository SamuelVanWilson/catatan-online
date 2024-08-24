<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/core/Middleware.php';

new Project\Core\App();
new Project\Core\Controller();