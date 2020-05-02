<?php

require_once 'Modele/ProduitCommande.php';

$tstProduitsCommandes = new ProduitCommande;
echo '<h3>Test getProduitsCommandes : </h3>';
$produitsCommandes= $tstProduitsCommandes->getProduitsCommandes();
var_dump($produitsCommandes->rowCount());

echo '<h3>Test getProduitsCommande : </h3>';
$produitsCommande= $tstProduitsCommandes->getProduitsCommande(1);
var_dump($produitsCommande->rowCount());

echo '<h3>Test getProduitCommande : </h3>';
$produitCommande= $tstProduitsCommandes->getProduitCommande(5);
var_dump($produitCommande);