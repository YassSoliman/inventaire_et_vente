<?php

function getProduits() {
    $bdd = getBdd();

    $reponses = $bdd->query('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits ORDER BY id DESC LIMIT 0,10');
    return $reponses;
}

function getCommandes() {
    $bdd = getBdd();

    $reponses = $bdd->query('SELECT Commandes.*, Utilisateurs.nom, Utilisateurs.identifiant '
            . 'FROM `Commandes` '
            . 'INNER JOIN Utilisateurs ON Commandes.utilisateur_id = Utilisateurs.id');

    return $reponses;
}

function getProduitsCommandes() {
    $bdd = getBdd();

    $reponses = $bdd->query('SELECT `commande_id`,'
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
            . 'ORDER BY `Produits_commande`.`commande_id` ASC');

    return $reponses;
}

function getProduit($idProduit) {
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

function getCommande($idCommande) {
    $bdd = getBdd();

    $reponses = $bdd->prepare('SELECT Commandes.*, Utilisateurs.nom, Utilisateurs.identifiant '
            . 'FROM `Commandes` '
            . 'INNER JOIN Utilisateurs ON Commandes.utilisateur_id = Utilisateurs.id '
            . 'WHERE `Commandes`.`id`=?');

    $reponses->execute(array($idCommande));
    if ($reponses->rowCount() == 1) {
        return $reponses->fetch();  // Accès à la première ligne de résultat
    } else {
        throw new Exception("Aucune commande ne correspond à l'identifiant '$idCommande'");
    }
}

function getProduitsCommande($idCommande) {
    $bdd = getBdd();

    $reponses = $bdd->prepare('SELECT `commande_id`,'
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
            . 'ORDER BY `Produits_commande`.`commande_id` ASC');

    $reponses->execute(array($idCommande));

    return $reponses;
}

function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8',
            'root', '6890674', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
