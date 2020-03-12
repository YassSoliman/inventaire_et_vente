<?php
// Connexion a BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$caseacocher = (isset($_POST['en_stock'])) ? 1 : 0;
$reponse = $bdd->query('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits WHERE id=' . $_GET['id']);

while ($donnees = $reponse->fetch()) {
	echo '<h2>Modifier un produit</h2>
			<p>
				<strong>' . htmlspecialchars($donnees['nom_produit']) . '</strong>' . ' - ' . htmlspecialchars($donnees['prix_unitaire'])  . 
				'$ <em>(' . htmlspecialchars($donnees['en_stock'] == 0 ? 'Hors stock' : 'En stock') . ')</em> <br />  ' .
			   	htmlspecialchars($donnees['description_produit']) . '</p>';

	echo '	
		<form action="produits_update.php" method="post">
			<p>
				<input type="hidden" name="id" id="id" value="' . htmlspecialchars($donnees['id']) . '"/>
				<label for="nom_produit">Nom du produit</label> : <input type="text" name="nom_produit" id="nom_produit" value="' . htmlspecialchars($donnees['nom_produit']) . '"/><br />
				<label for="prix_unitaire">Prix unitaire</label> : <input type="number" value="' . htmlspecialchars($donnees['prix_unitaire']) . '"  min="0.01" step="0.01"  name="prix_unitaire" id="prix_unitaire"/><br />
				<label for="description_produit">Description du produit</label> : <input type="text" name="description_produit" id="description_produit" value="' . htmlspecialchars($donnees['description_produit']) . '"/><br />
				<label for="en_stock">En stock</label> : <input type="checkbox" name="en_stock" id="en_stock"' . htmlspecialchars($donnees['en_stock'] == 1 ? 'checked' : '') . '/><br />
		
				<input type="submit" value="Modifier produit" />
				<a href="index.php"><input type="button" value="Annuler"/></a>
			</p>
		</form>
		';
}


?>
