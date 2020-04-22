<?php

require('Controleur/Controleur.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'apropos') {
            apropos();
        }

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
        } else if ($_GET['action'] == 'supprimerProduitCommande') {
            if (isset($_POST['id'])) {
                $idProduitCommande = intval($_POST['id']);
                if ($idProduitCommande != 0) {
                    supprimerProduitCommande($idProduitCommande);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        } else if ($_GET['action'] == 'modificationProduitCommande') {
            if (isset($_GET['id'])) {
                $idProduitCommande = intval($_GET['id']);
                $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';

                if ($idProduitCommande != 0) {
                    modificationProduitCommande($idProduitCommande, $erreur);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");

            // Ajouter un article
        } else if ($_GET['action'] == 'modifyProduitCommande') {
            if (isset($_POST['id']) && isset($_POST['quantite_produit'])) {
                $idProduitCommande = intval($_POST['id']);
                if ($idProduitCommande != 0) {
                    modifyProduitCommande($idProduitCommande, $_POST['quantite_produit']);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        } else if ($_GET['action'] == 'nouvelCommande') {
            $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
            nouvelCommande($erreur);
        } else if ($_GET['action'] == 'ajouterCommande') {
            if (isset($_POST['details_commande']) && isset($_POST['courriel']) && isset($_POST['utilisateur_id'])) {
                ajouterCommande($_POST);
            } else
                throw new Exception("Aucun courriel ou details de commande");
        } else
            throw new Exception("Action non valide");
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}