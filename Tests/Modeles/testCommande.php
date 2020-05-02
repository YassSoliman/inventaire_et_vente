<?php

require_once 'Modele/Commande.php';

$tstCommande = new Commande;
echo '<h3>Test getCommandes : </h3>';
$commandes = $tstCommande->getCommandes();
var_dump($commandes->rowCount());

echo '<h3>Test getCommande : </h3>';
$commande =  $tstCommande->getCommande(2);
var_dump($commande);