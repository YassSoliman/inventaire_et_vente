<?php
// Connexion a BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}
$id = $_POST['id'];
$req = $bdd->prepare("DELETE FROM `inventaire_et_vente`.`Produits` WHERE `Produits`.`id` = " . $id);
$req->execute();

header('Location: index.php');


?>
