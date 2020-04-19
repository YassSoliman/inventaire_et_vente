<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les commandes
function accueil() {
    $commandes = getCommandes();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur une commande
function commande($idCommande) {
    $commande = getCommande($idCommande);
    $produitsCommandes = getProduitsCommande($idCommande);
    $produits = getProduits();
    require 'Vue/vueCommande.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}

function apropos() {
    require 'Vue/vueApropos.php';
}
