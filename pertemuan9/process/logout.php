<?php
session_start();

// Hapus semua data sesi
session_unset();
session_destroy();

require_once '../controllers/PengurusController.php';

$pengurusController = new PengurusController();
$pengurusController->logout();

// Redirect ke halaman login
header("Location: index.php?action=viewLogin");
exit;

