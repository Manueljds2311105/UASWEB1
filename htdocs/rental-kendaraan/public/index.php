<?php
// Configuration
define('BASE_URL', 'http://localhost/rental-kendaraan/public/');

// Autoload core files
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../config/Database.php';

// Run application
$app = new App();
?>