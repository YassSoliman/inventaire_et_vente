<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurCommande
 *
 * @author yasser
 */
require_once 'Framework/Controleur.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Produit.php';
require_once 'Modele/ProduitCommande.php';

class ControleurCommande extends Controleur {

    private $commandeObj;
    private $produitObj;
    private $produitCommandeObj;

    public function __construct() {
        $this->commandeObj = new Commande();
        $this->produitObj = new Produit();
        $this->produitCommandeObj = new ProduitCommande();
    }

    // Affiche les détails sur une commande
    // Pas utiliser
    public function index() {
        $produitsCommandes = $this->produitCommandeObj->getProduitsCommandes();
        
        $this->genererVue(array('produitsCommandes' => $produitsCommandes));
    }   

}
