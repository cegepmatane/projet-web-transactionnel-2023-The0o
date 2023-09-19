<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <ul>
        <?php foreach ($produits as $produit): ?>
            <li>
                <h2><?php echo $produit->nomProduit; ?></h2>
                <p>Prix : <?php echo $produit->prixProduit; ?> EUR</p>
                <p>Description : <?php echo $produit->descriptionProduit; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
