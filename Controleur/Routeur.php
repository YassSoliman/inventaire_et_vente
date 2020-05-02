<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Routeur
 *
 * @author yasser
 */
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCommande.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlCommande;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlCommande = new ControleurCommande();
    }

    // Traite une requête entrante
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'commande') {
                    if (isset($_GET['id'])) {
                        $idCommande = intval($_GET['id']);
                        if ($idCommande != 0) {
                            $this->ctrlCommande->commande($idCommande);
                        } else
                            throw new Exception("Identifiant de commande non valide");
                    } else
                        throw new Exception("Identifiant de commande non défini");
                } else if ($_GET['action'] == 'apropos') {
                    $this->ctrlAccueil->apropos();
                } else if ($_GET['action'] == 'nouvelCommande') {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    $this->ctrlAccueil->nouvelCommande($erreur);
                } else if ($_GET['action'] == 'ajouterCommande') {
                    if (isset($_POST['details_commande']) && isset($_POST['courriel']) && isset($_POST['utilisateur_id'])) {
                        $this->ctrlAccueil->ajouterCommande($_POST);
                    } else
                        throw new Exception("Aucun courriel ou details de commande");
                } else if ($_GET['action'] == 'ajouterProduit') {
                    if (isset($_GET['id']) && isset($_GET['commande_id'])) {
                        $idProduit = intval($_GET['id']);
                        $idCommande = intval($_GET['commande_id']);
                        if ($idProduit != 0 && $idCommande != 0) {
                            $this->ctrlCommande->ajouterProduit($idProduit, $idCommande);
                        } else
                            throw new Exception("Identifiant de produit incorrect");
                    } else
                        throw new Exception("Aucun identifiant de commande");
                } else if ($_GET['action'] == 'confirmerProduitCommande') {
                    if (isset($_GET['id'])) {
                        $idProduitCommande = intval($_GET['id']);
                        if ($idProduitCommande != 0) {
                            $this->ctrlCommande->confirmerProduitCommande($idProduitCommande);
                        } else
                            throw new Exception("Identifiant de produit incorrect");
                    } else
                        throw new Exception("Aucun identifiant de produit");
                } else if ($_GET['action'] == 'supprimerProduitCommande') {
                    if (isset($_POST['id'])) {
                        $idProduitCommande = intval($_POST['id']);
                        if ($idProduitCommande != 0) {
                            $this->ctrlCommande->supprimerProduitCommande($idProduitCommande);
                        } else
                            throw new Exception("Identifiant de produit incorrect");
                    } else
                        throw new Exception("Aucun identifiant de produit");
                } else if ($_GET['action'] == 'modificationProduitCommande') {
                    if (isset($_GET['id'])) {
                        $idProduitCommande = intval($_GET['id']);
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        if ($idProduitCommande != 0) {
                            $this->ctrlCommande->modificationProduitCommande($idProduitCommande, $erreur);
                        } else
                            throw new Exception("Identifiant de produit incorrect");
                    } else
                        throw new Exception("Aucun identifiant de produit");

                } else if ($_GET['action'] == 'modifyProduitCommande') {
                    if (isset($_POST['id']) && isset($_POST['quantite_produit'])) {
                        $idProduitCommande = intval($_POST['id']);
                        if ($idProduitCommande != 0) {
                            $this->ctrlCommande->modifyProduitCommande($idProduitCommande, $_POST['quantite_produit']);
                        } else
                            throw new Exception("Identifiant de produit incorrect");
                    } else
                        throw new Exception("Aucun identifiant de produit");
                } else
                    throw new Exception("Action non valide");
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

}
