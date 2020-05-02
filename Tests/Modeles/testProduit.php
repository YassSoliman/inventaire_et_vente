<?php

require_once 'Modele/Produit.php';

$tstProduit = new Produit;
echo '<h3>Test getProduits : </h3>';
$produits= $tstProduit->getProduits();
var_dump($produits->rowCount());

echo '<h3>Test getProduit : </h3>';
$produit= $tstProduit->getProduit(4);
var_dump($produit);