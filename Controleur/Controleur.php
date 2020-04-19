<?php

require 'Modele.php';

// Affiche la liste de tous les commandes
function accueil() {
    $commandes = getCommandes();
    require 'vueAccueil.php';
}

// Affiche les détails sur une commande
function commande($idCommande) {
    $commande = getCommande($idCommande);
    $produitsCommandes = getProduitsCommande($idCommande);
    $produits = getProduits();
    require 'vueCommande.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'vueErreur.php';
}
