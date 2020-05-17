<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAccueil
 *
 * @author yasser
 */
require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Produit.php';
require_once 'Modele/ProduitCommande.php';

class ControleurAdminAccueil extends ControleurAdmin {

    private $commandeObj;
    private $produitObj;
    private $produitCommandeObj;

    public function __construct() {
        $this->commandeObj = new Commande();
        $this->produitObj = new Produit();
        $this->produitCommandeObj = new ProduitCommande();
    }

    // Affiche la liste de tous les commandes
    public function index() {
        $commandes = $this->commandeObj->getCommandes();
        $this->genererVue(array('commandes' => $commandes));
    }
    
    // Affiche les détails sur une commande
    public function lire() {
        $idCommande = $this->requete->getParametre("id");
        
        $commande = $this->commandeObj->getCommande($idCommande);
        $produitsCommandes = $this->produitCommandeObj->getProduitsCommande($idCommande);
        $produits = $this->produitObj->getProduits();
        
        $this->genererVue(array('commande' => $commande,
            'produitsCommandes' => $produitsCommandes,
            'produits' => $produits));
    }

    public function ajouter() {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['erreur' => $erreur]);
    }

    public function ajouterCommande() {
        $commandeObj['courriel'] = $this->requete->getParametreId("courriel");
        $commandeObj['details_commande'] = $this->requete->getParametreId("details_commande");
        $commandeObj['utilisateur_id'] = $this->requete->getParametreId("utilisateur_id");
        $validation_courriel = filter_var($commandeObj['courriel'], FILTER_VALIDATE_EMAIL);
        
        if ($validation_courriel) {
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            $this->commandeObj->setCommande($commandeObj);
            $this->rediriger('Acceuil');
        } else {
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Accueil', 'ajouter');
        }
    }

}
