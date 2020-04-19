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

// Ajoute un produit à une commande
function ajouterProduit($produit, $commande) {
    setProduitCommande($produit, $commande);
    header('Location: index.php?action=commande&id=' . $commande['id']);
}

// Supprimer un produit d'une commande
function supprimerProduitCommande($id) {
    $produitCommande = getProduitCommande($id);
    deleteProduitCommande($id);
    header('Location: index.php?action=commande&id=' . $produitCommande['commande_id']);
}

// Confirmer la suppression d'un produit dans une commande
function confirmerProduitCommande($id) {
    $produitCommande = getProduitCommande($id);
    require 'Vue/vueConfirmer.php';
}
