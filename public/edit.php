<?php
require_once '../vendor/autoload.php';

use App\Produit;
use App\StockManager;

$stockManager = new StockManager();
$produit = null;

if (isset($_GET['id'])) {
    $produit = $stockManager->getProduit((int)$_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $produit) {
    $produit = new Produit($_POST['nom'], (float)$_POST['prix'], (int)$_POST['quantite'], $produit->getId());
    $produit->save();

    header('Location: index.php');
    exit;
}

if (!$produit) {
    echo "Produit non trouvé.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier le Produit</h1>
    <form action="edit.php?id=<?php echo $produit->getId(); ?>" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($produit->getNom()); ?>" required><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" step="0.01" value="<?php echo htmlspecialchars($produit->getPrix()); ?>" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" value="<?php echo htmlspecialchars($produit->getQuantite()); ?>" required><br>

        <button type="submit">Modifier</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
