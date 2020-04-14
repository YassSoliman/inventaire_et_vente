<?php
// Connexion a la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Recuperation des produits
$reponses = $bdd->query('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits ORDER BY id DESC LIMIT 0,10');


require 'vueAccueil.php';