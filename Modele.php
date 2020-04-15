<?php

function getProduits() {
    // Connexion a la BDD
    $bdd = getBdd();
    // Recuperation des produits
    $reponses = $bdd->query('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits ORDER BY id DESC LIMIT 0,10');
    return $reponses;
}

function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8',
           'root', '6890674', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}