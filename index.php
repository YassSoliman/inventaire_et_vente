<?php

require('Controleur/Controleur.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'apropos') {
            apropos();
        } else
            
        if ($_GET['action'] == 'commande') {
            if (isset($_GET['id'])) {
                $idCommande = intval($_GET['id']);
                if ($idCommande != 0)
                    commande($idCommande);
                else
                    throw new Exception("Identifiant de commande non valide");
            } else
                throw new Exception("Identifiant de commande non défini");
        } else if ($_GET['action'] == 'ajouterProduit') {
            if (isset($_GET['id']) && isset($_GET['commande_id'])) {
                $idProduit = intval($_GET['id']);
                $idCommande = intval($_GET['commande_id']);
                if ($idProduit != 0 && $idCommande != 0) {
                    $produit = getProduit($idProduit);
                    $commande = getCommande($idCommande);
                    //Réaliser l'action ajouterProduit du contrôleur
                    ajouterProduit($produit, $commande);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de commande");
        
        } else if ($_GET['action'] == 'confirmerProduitCommande') {
            if (isset($_GET['id'])) {
                $idProduitCommande = intval($_GET['id']);
                if ($idProduitCommande != 0) {
                    confirmerProduitCommande($idProduitCommande);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");

            //
        }else if ($_GET['action'] == 'supprimerProduitCommande') {
            if (isset($_POST['id'])) {
                $idProduitCommande = intval($_POST['id']);
                if ($idProduitCommande != 0) {
                    supprimerProduitCommande($idProduitCommande);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");

            // Ajouter un article
        } else
            throw new Exception("Action non valide");
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}