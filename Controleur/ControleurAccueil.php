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

class ControleurAccueil extends Controleur {

    private $commande;

    public function __construct() {
        $this->commande = new Commande();
    }

    // Affiche la liste de tous les commandes
    public function index() {
        $commandes = $this->commande->getCommandes();
        $this->genererVue(array('commandes' => $commandes));
    }

    public function nouvelCommande($erreur) {
        $vue = new Vue("AjouterCommande");
        $vue->generer(array('erreur' => $erreur));
    }

    public function apropos() {
        $vue = new Vue("Apropos");
        $vue->generer(array());
    }

    public function ajouterCommande($commande) {
        $validation_courriel = filter_var($commande['courriel'], FILTER_VALIDATE_EMAIL);
        
        if ($validation_courriel) {
            $this->commande->setCommande($commande);
            $this->accueil();
        } else {
            $this->nouvelCommande('courriel');
        }
    }

}
