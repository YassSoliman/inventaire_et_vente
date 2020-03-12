<?php
// Connexion a BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$caseacocher = (isset($_POST['en_stock'])) ? 1 : 0;

$req = $bdd->prepare('INSERT INTO Produits (nom_produit, prix_unitaire, description_produit, en_stock) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['nom_produit'], $_POST['prix_unitaire'], $_POST['description_produit'], $caseacocher));

header('Location: index.php');

?>
