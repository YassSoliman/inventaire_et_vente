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
    public function index() {
        $idCommande = $this->requete->getParametre("id");
        
        $commande = $this->commandeObj->getCommande($idCommande);
        $produitsCommandes = $this->produitCommandeObj->getProduitsCommande($idCommande);
        $produits = $this->produitObj->getProduits();
        
        $this->genererVue(array('commande' => $commande,
            'produitsCommandes' => $produitsCommandes,
            'produits' => $produits));
    }

    // Ajoute un produit à une commande
    public function ajouterProduit($idProduit, $idCommande) {
        $produit = $this->produitObj->getProduit($idProduit);
        $commande = $this->commandeObj->getCommande($idCommande);
        $this->produitCommandeObj->setProduitCommande($produit, $commande);
        $this->commande($idCommande);
    }

    // Confirmer la suppression d'un produit dans une commande
    public function confirmerProduitCommande($id) {
        $produitCommande = $this->produitCommandeObj->getProduitCommande($id);
        $vue = new Vue("ConfirmerProduit");
        $vue->generer(array('produitCommande' => $produitCommande));
    }

    // Supprimer un produit d'une commande
    public function supprimerProduitCommande($id) {
        $produitCommande = $this->produitCommandeObj->getProduitCommande($id);
        $this->produitCommandeObj->deleteProduitCommande($id);
        $this->commande($produitCommande['commande_id']);
    }

    // Modifier un produit d'une commande
    public function modificationProduitCommande($id, $erreur) {
        $produitCommande = $this->produitCommandeObj->getProduitCommande($id);
        $vue = new Vue("ModifierProduit");
        $vue->generer(array('produitCommande' => $produitCommande, 'erreur' => $erreur));
    }

    // Modifier un produit d'une commande
    public function modifyProduitCommande($id, $qte) {
        $produitCommande = $this->produitCommandeObj->getProduitCommande($id);
        $validation_quantite = filter_var($qte, FILTER_VALIDATE_INT);
        if ($validation_quantite && $qte > 0) {
            $this->produitCommandeObj->modifierProduitCommande($id, $qte);
            $this->commande($produitCommande['commande_id']);
        } else {
            $this->modificationProduitCommande($id, "quantite");
        }
    }

}
