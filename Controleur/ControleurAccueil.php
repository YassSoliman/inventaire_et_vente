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
require_once 'Modele/Commande.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $commande;

    public function __construct() {
        $this->commande = new Commande();
    }

    // Affiche la liste de tous les commandes
    public function accueil() {
        $commandes = $this->commande->getCommandes();
        $vue = new Vue("Accueil");
        $vue->generer(array('commandes' => $commandes));
    }

}
