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
