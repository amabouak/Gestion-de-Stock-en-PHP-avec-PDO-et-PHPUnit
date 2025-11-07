<?php
require_once '../vendor/autoload.php';

use App\Produit;
use App\StockManager;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prix = (float)$_POST['prix'];
    $quantite = (int)$_POST['quantite'];

    $produit = new Produit($nom, $prix, $quantite);
    $stockManager = new StockManager();
    $stockManager->ajouterProduit($produit);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un Produit</h1>
    <form action="add.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
