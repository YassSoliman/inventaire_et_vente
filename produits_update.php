<?php
// Connexion a BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$caseacocher = (isset($_POST['en_stock'])) ? 1 : 0;

$req = 'UPDATE Produits SET nom_produit="' . $_POST['nom_produit'] . '", prix_unitaire="' . $_POST['prix_unitaire'] . '", description_produit="' . $_POST['description_produit']  . '", en_stock="' . $caseacocher . '" WHERE id="' . $_POST['id'] . '"';
$bdd->query($req);

header('Location: index.php');

?>
