<?php

// Étape 1 
$produit1 = ["nom" => "Livre", "prix" => 15, "quantite" => 2];
$produit2 = ["nom" => "Stylo", "prix" => 3, "quantite" => 5];
$produit3 = ["nom" => "Sac", "prix" => 25, "quantite" => 1];
$panier = [$produit1, $produit2, $produit3];

// Étape 5 
function calculerSousTotal($produit) {
    return $produit['prix'] * $produit['quantite'];
}

// Étape 2
echo "<h2>Sous-totaux des produits</h2>";
$totalPanier = 0;
foreach ($panier as $produit) {
    $sousTotal = calculerSousTotal($produit);
    echo "Le sous-total pour le " . $produit['nom'] . " est de " . $sousTotal . " €.<br>";
    $totalPanier += $sousTotal;
}

// Étape 3 
echo "<h2>Total du panier</h2>";
echo "Le montant total du panier est de " . $totalPanier . " €.<br>";

// Étape 4
if ($totalPanier > 50) {
    $reduction = $totalPanier * 0.10;
    $totalApresReduction = $totalPanier - $reduction;
    echo "Après une réduction de 10%, le total est de " . $totalApresReduction . " €.<br>";
} else {
    $totalApresReduction = $totalPanier;
}

// Bonus
echo "<h2>Tableau du panier</h2>";
echo "<table border='1'>
        <tr>
            <th>Nom</th>
            <th>Prix Unitaire (€)</th>
            <th>Quantité</th>
            <th>Sous-total (€)</th>
        </tr>";

foreach ($panier as $produit) {
    $sousTotal = calculerSousTotal($produit);
    echo "<tr>
            <td>{$produit['nom']}</td>
            <td>{$produit['prix']}</td>
            <td>{$produit['quantite']}</td>
            <td>{$sousTotal}</td>
          </tr>";
}

echo "<tr>
        <td colspan='3'><strong>Total</strong></td>
        <td><strong>{$totalApresReduction} €</strong></td>
      </tr>
      </table>";

?>
