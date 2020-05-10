<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commande
 *
 * @author yasser
 */
require_once 'Framework/Modele.php';

class Commande extends Modele {

    public function getCommandes() {
        $sql = 'SELECT Commandes.*, Utilisateurs.nom, Utilisateurs.identifiant '
                . 'FROM `Commandes` '
                . 'INNER JOIN Utilisateurs ON Commandes.utilisateur_id = Utilisateurs.id';

        $commandes = $this->executerRequete($sql);

        return $commandes;
    }

    public function getCommande($idCommande) {
        $sql = 'SELECT Commandes.*, Utilisateurs.nom, Utilisateurs.identifiant '
                . 'FROM `Commandes` '
                . 'INNER JOIN Utilisateurs ON Commandes.utilisateur_id = Utilisateurs.id '
                . 'WHERE `Commandes`.`id`=?';

        $commandes = $this->executerRequete($sql, array($idCommande));

        if ($commandes->rowCount() == 1) {
            return $commandes->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune commande ne correspond à l'identifiant '$idCommande'");
        }
    }

    public function setCommande($commande) {
        $sql = "INSERT INTO `inventaire_et_vente`.`Commandes` (utilisateur_id, details_commande, courriel) "
                . "VALUES (?, ?, ?)";

        $commandes = $this->executerRequete($sql, array($commande['utilisateur_id'], $commande['details_commande'], $commande['courriel']));

        return $commandes;
    }

}
