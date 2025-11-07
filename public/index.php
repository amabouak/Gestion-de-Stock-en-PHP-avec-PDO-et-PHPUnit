<?php
require_once '../vendor/autoload.php';

use App\Produit;
use App\StockManager;

// Initialiser le gestionnaire de stock
$stockManager = new StockManager();

// Récupérer tous les produits
$produits = Produit::all();

// Calculer le total du stock
$totalStock = $stockManager->totalStock();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion de Stock</h1>

    <h2>Ajouter un Produit</h2>
    <form action="add.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des Produits</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produit->getId()); ?></td>
                    <td><?php echo htmlspecialchars($produit->getNom()); ?></td>
                    <td><?php echo htmlspecialchars($produit->getPrix()); ?> FCFA</td>
                    <td><?php echo htmlspecialchars($produit->getQuantite()); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $produit->getId(); ?>">Modifier</a>
                        <a href="delete.php?id=<?php echo $produit->getId(); ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Total du Stock: <?php echo htmlspecialchars($totalStock); ?> FCFA</h2>
</body>
</html>
