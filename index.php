<?php
require 'Modele.php';

try {
    $produits = getProduits();
    require 'vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
