<?php
require_once '../vendor/autoload.php';

use App\StockManager;

if (isset($_GET['id'])) {
    $stockManager = new StockManager();
    $stockManager->supprimerProduit((int)$_GET['id']);
}

header('Location: index.php');
exit;
?>
