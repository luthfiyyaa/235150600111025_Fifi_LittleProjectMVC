<?php

require_once "config/koneksi_mysql.php";
require_once "controllers/PengurusController.php";
require_once "controllers/ProgramKerja.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Pengurus';
$action = isset($_GET['action']) ? $_GET['action'] : 'viewRegister';

switch ($controller) {
    case 'Pengurus':
        $controller = new PengurusController();
        break;
    case 'ProgramKerja':
        $controller = new ProgramKerja();
        break;
    default:
        die("Controller tidak ditemukan!");
}

if (method_exists($controller, $action)) {
    $controller->{$action}();
} else {
    die("Action tidak ditemukan!");
}
