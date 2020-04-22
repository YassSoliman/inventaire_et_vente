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

function nouvelCommande($erreur) {
    require 'Vue/vueAjouterCommande.php';
}

function ajouterCommande($commande) {
    $validation_courriel = filter_var($commande['courriel'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        setCommande($commande);
        header('Location: index.php');
    } else {
        header('Location: index.php?action=nouvelCommande&erreur=courriel');
    }
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

// Modifier un produit d'une commande
function modificationProduitCommande($id, $erreur) {
    $produitCommande = getProduitCommande($id);
    require 'Vue/vueModifierProduit.php';
}

// Modifier un produit d'une commande
function modifyProduitCommande($id, $qte) {
    $produitCommande = getProduitCommande($id);
    $validation_quantite = filter_var($qte, FILTER_VALIDATE_INT);
    if ($validation_quantite && $qte > 0) {
        modifierProduitCommande($id, $qte);
        header('Location: index.php?action=commande&id=' . $produitCommande['commande_id']);
    } else {
        header('Location: index.php?action=modificationProduitCommande&id=' . $id . '&erreur=quantite');
    }
}

// Confirmer la suppression d'un produit dans une commande
function confirmerProduitCommande($id) {
    $produitCommande = getProduitCommande($id);
    require 'Vue/vueConfirmerProduit.php';
}
