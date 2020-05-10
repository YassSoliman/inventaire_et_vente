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

    // Ajoute un produit à une commande
    public function ajouter() {    
        $idCommande = $this->requete->getParametre("commande_id");
        $idProduit = $this->requete->getParametre("produit_id");
        
        $produit = $this->produitObj->getProduit($idProduit);
        $commande = $this->commandeObj->getCommande($idCommande);
        
        $this->produitCommandeObj->setProduitCommande($produit, $commande);
        
        $this->rediriger('Accueil', 'lire/' . $idCommande);
    }

    // Confirmer la suppression d'un produit dans une commande
    public function supprimer() {
        $idProduitCommande = $this->requete->getParametre("id");
        $produitCommandeObj = $this->produitCommandeObj->getProduitCommande($idProduitCommande);
        
        $this->genererVue(array('produitCommande' => $produitCommandeObj));
    }

    // Supprimer un produit d'une commande
    public function supprimerProduitCommande() {
        $idProduitCommande = $this->requete->getParametre("id");
        $produitCommande = $this->produitCommandeObj->getProduitCommande($idProduitCommande);
        
        $this->produitCommandeObj->deleteProduitCommande($idProduitCommande);

        $this->rediriger('Accueil', 'lire/' . $produitCommande['commande_id']);
    }
    
    // Rétablir un produit d'une commande
    public function retablir() {
        $idProduitCommande = $this->requete->getParametreId("id");

        $produitCommande = $this->produitCommandeObj->getProduitCommande($idProduitCommande);

        $this->produitCommandeObj->restoreProduitCommande($idProduitCommande);

        $this->rediriger('Accueil', 'lire/' . $produitCommande['commande_id']);
    }

    // Modifier un produit d'une commande
    public function modifier() {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';        
        $idProduitCommande = $this->requete->getParametre("id");
        
        $produitCommande = $this->produitCommandeObj->getProduitCommande($idProduitCommande);
        
        $this->genererVue(array('produitCommande' => $produitCommande, 'erreur' => $erreur));
    }

    // Modifier un produit d'une commande
    public function modifyProduitCommande() {
        $idProduitCommande = $this->requete->getParametre("id");
        $qte = $this->requete->getParametre("quantite_produit");
        $produitCommandeObj = $this->produitCommandeObj->getProduitCommande($idProduitCommande);
        
        $validation_quantite = filter_var($qte, FILTER_VALIDATE_INT);
        if ($validation_quantite && $qte > 0) {
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            
            $this->produitCommandeObj->modifierProduitCommande($idProduitCommande, $qte);
            
            $this->rediriger('Accueil', 'lire/' . $produitCommandeObj['commande_id']);
        } else {
            $this->requete->getSession()->setAttribut('erreur', 'quantite');
            
            $this->rediriger('Commande', 'modifier/' . $idProduitCommande);
        }
    }

}
