<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        h2 { color: #333; }
    </style>
</head>
<body>

<h2>Sous-totaux des produits</h2>
<?php


$produit1 = ["nom" => "Livre", "prix" => 15, "quantite" => 2];
$produit2 = ["nom" => "Stylo", "prix" => 3, "quantite" => 5];
$produit3 = ["nom" => "Sac", "prix" => 25, "quantite" => 1];
$panier = [$produit1, $produit2, $produit3];

 
function calculerSousTotal($produit) {
    return $produit['prix'] * $produit['quantite'];
}

$totalPanier = 0;
foreach ($panier as $produit) {
    $sousTotal = calculerSousTotal($produit);
    $totalPanier += $sousTotal;
}

?>


<h2>Tableau du panier</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prix Unitaire (€)</th>
        <th>Quantité</th>
        <th>Sous-total (€)</th>
    </tr>

    <?php foreach ($panier as $produit): ?>
        <?php $sousTotal = calculerSousTotal($produit); ?>
        <tr>
            <td><?= htmlspecialchars($produit['nom']); ?></td>
            <td><?= htmlspecialchars($produit['prix']); ?></td>
            <td><?= htmlspecialchars($produit['quantite']); ?></td>
            <td><?= htmlspecialchars($sousTotal); ?> €</td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong><?= htmlspecialchars($totalPanier); ?> €</strong></td>
    </tr>

    <?php if ($totalPanier > 50): 
        $reduction = $totalPanier * 0.10;
        $totalApresReduction = $totalPanier - $reduction;
    ?>
        <tr>
            <td colspan="3"><strong>Total après réduction (10%)</strong></td>
            <td><strong><?= htmlspecialchars($totalApresReduction); ?> €</strong></td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
