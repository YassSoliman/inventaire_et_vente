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
require_once 'Modele/Commande.php';
require_once 'Modele/Produit.php';
require_once 'Modele/ProduitCommande.php';
require_once 'Vue/Vue.php';

class ControleurCommande {

    private $commandeObj;
    private $produitObj;
    private $produitCommandeObj;

    public function __construct() {
        $this->commandeObj = new Commande();
        $this->produitObj = new Produit();
        $this->produitCommandeObj = new ProduitCommande();
    }

    // Affiche les détails sur une commande
    public function commande($idCommande) {
        $commande = $this->commandeObj->getCommande($idCommande);
        $produitsCommandes = $this->produitCommandeObj->getProduitsCommande($idCommande);
        $produits = $this->produitObj->getProduits();
        $vue = new Vue("Commande");
        $vue->generer(array('commande' => $commande, 
                            'produitsCommandes' => $produitsCommandes, 
                            'produits' => $produits));
    }

}
