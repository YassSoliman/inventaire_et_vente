<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author yasser
 */
require_once 'Modele/Modele.php';

class Produit extends Modele {

    public function getProduits() {
        $sql = 'SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits ORDER BY id DESC LIMIT 0,10';
        
        $produits = $this->executerRequete($sql);
        
        return $produits;
    }
    
    public function getProduit($idProduit) {
        $bdd = getBdd();

        $reponses = $bdd->prepare('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock '
                . 'FROM Produits '
                . 'WHERE id=?'
                . 'ORDER BY id DESC LIMIT 0,10');

        $reponses->execute(array($idProduit));
        if ($reponses->rowCount() == 1) {
            return $reponses->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun produit ne correspond à l'identifiant '$idProduit'");
        }
    }

}
