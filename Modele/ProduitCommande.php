<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitCommande
 *
 * @author yasser
 */
require_once 'Modele/Modele.php';

class ProduitCommande extends Modele {

    public function getProduitsCommandes() {
        $sql = 'SELECT `Produits_commande`.id, `commande_id`,'
                . ' `produit_id`,'
                . ' `quantite_produit`,'
                . ' `Produits`.`nom_produit`,'
                . ' `Produits`.`prix_unitaire`,'
                . ' `Produits`.`description_produit`,'
                . ' `Commandes`.`details_commande`,'
                . ' `Utilisateurs`.`nom` '
                . 'FROM `Produits_commande` '
                . 'INNER JOIN `Produits` ON `Produits_commande`.`produit_id` = `Produits`.`id` '
                . 'INNER JOIN `Commandes` ON `Commandes`.`id` = `Produits_commande`.`commande_id` '
                . 'INNER JOIN `Utilisateurs` ON `Commandes`.`utilisateur_id` = `Utilisateurs`.`id` '
                . 'ORDER BY `Produits_commande`.`commande_id` ASC';

        $produitsCommandes = $this->executerRequete($sql);

        return $produitsCommandes;
    }

    // Retourne une liste de produits present dans la commande en parametre
    public function getProduitsCommande($idCommande) {
        $sql = 'SELECT `Produits_commande`.id, `commande_id`,'
                . ' `produit_id`,'
                . ' `quantite_produit`,'
                . ' `Produits`.`nom_produit`,'
                . ' `Produits`.`prix_unitaire`,'
                . ' `Produits`.`description_produit`,'
                . ' `Commandes`.`details_commande`,'
                . ' `Utilisateurs`.`nom` '
                . 'FROM `Produits_commande` '
                . 'INNER JOIN `Produits` ON `Produits_commande`.`produit_id` = `Produits`.`id` '
                . 'INNER JOIN `Commandes` ON `Commandes`.`id` = `Produits_commande`.`commande_id` '
                . 'INNER JOIN `Utilisateurs` ON `Commandes`.`utilisateur_id` = `Utilisateurs`.`id` '
                . 'WHERE `Commandes`.`id`=?'
                . 'ORDER BY `Produits_commande`.`commande_id` ASC';

        $produitsCommandes = $this->executerRequete($sql, array($idCommande));

        return $produitsCommandes;
    }

    // Retourne un produit specifique present dans une commande
    public function getProduitCommande($id) {
        $sql = 'SELECT `Produits_commande`.id, `commande_id`,'
                . ' `produit_id`,'
                . ' `quantite_produit`,'
                . ' `Produits`.`nom_produit`,'
                . ' `Produits`.`prix_unitaire`,'
                . ' `Produits`.`description_produit`,'
                . ' `Commandes`.`details_commande`,'
                . ' `Utilisateurs`.`nom` '
                . 'FROM `Produits_commande` '
                . 'INNER JOIN `Produits` ON `Produits_commande`.`produit_id` = `Produits`.`id` '
                . 'INNER JOIN `Commandes` ON `Commandes`.`id` = `Produits_commande`.`commande_id` '
                . 'INNER JOIN `Utilisateurs` ON `Commandes`.`utilisateur_id` = `Utilisateurs`.`id` '
                . 'WHERE `Produits_commande`.`id`=?'
                . 'ORDER BY `Produits_commande`.`commande_id` ASC';

        $produitCommande = $this->executerRequete($sql, array($id));

        return $produitCommande->fetch();
    }

    // Ajoute un produit associés à une commande
    public function setProduitCommande($produit, $commande) {
        $sql = 'SELECT * FROM `Produits_commande` WHERE commande_id = ? AND produit_id = ?';
        // Verifier si commande contient deja ce produit au moins une fois
        $validerCommande = $this->executerRequete($sql, array($commande['id'], $produit['id']));

        $produitCommande = $validerCommande->fetch();
        if ($produitCommande) {
            $nouvelleQte = $produitCommande['quantite_produit'] + 1;
            
            $sql = 'UPDATE `inventaire_et_vente`.`Produits_commande` '
                    . 'SET `quantite_produit` = ? '
                    . 'WHERE `Produits_commande`.`id` = ?;';
            
            $result = $this->executerRequete($sql, array($nouvelleQte, $produitCommande['id']));
        } else {
            $sql = 'INSERT INTO `Produits_commande` (commande_id, produit_id, quantite_produit) VALUES(?, ?, ?)';
            
            $result = $this->executerRequete($sql, array($commande['id'], $produit['id'], 1));
        }

        return $result;
    }

    public function modifierProduitCommande($id, $qte) {
        $sql = 'UPDATE `inventaire_et_vente`.`Produits_commande` '
                . 'SET `quantite_produit` = ? '
                . 'WHERE `Produits_commande`.`id` = ?;';
        
        $result = $this->executerRequete($sql, array($qte, $id));

        return $result;
    }

    public function deleteProduitCommande($id) {
        $sql = "DELETE FROM `inventaire_et_vente`.`Produits_commande` WHERE `Produits_commande`.`id` = ?";

        $result = $this->executerRequete($sql, array($id));

        return $result;
    }

}
