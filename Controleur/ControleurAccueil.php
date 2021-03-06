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
require_once 'Framework/Controleur.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Produit.php';
require_once 'Modele/ProduitCommande.php';

class ControleurAccueil extends Controleur {

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

}
