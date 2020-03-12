<?php
// Connexion a BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=inventaire_et_vente;charset=utf8', 'root', '6890674');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$caseacocher = (isset($_POST['en_stock'])) ? 1 : 0;
$reponse = $bdd->query('SELECT id, nom_produit, prix_unitaire, description_produit, en_stock FROM Produits WHERE id=' . $_GET['id']);
echo '<style>

		table, th, td {
	   		border: 1px solid black;
		}
	
	</style>';

echo '<table>';	
while ($donnees = $reponse->fetch()) {
	echo '
			<h2>Supprimer un produit</h2>
			<tr>
				<td rowspan="5" style="max-width: 200px; text-align: center;"><strong>' . htmlspecialchars($donnees['nom_produit'])  . '<strong></td>
			</tr>
			<tr>
				<td>Prix unitaire</td>' . 
				'<td>'  . htmlspecialchars($donnees['prix_unitaire'])  . '$</td>
	   		</tr>
			<tr>
				<td>Status</td>
				<td><em>' . htmlspecialchars($donnees['en_stock'] == 0 ? 'Hors stock' : 'En stock') . '</em></td>
			</tr>
			<tr>
				<td>Description</td>
				<td>' . htmlspecialchars($donnees['description_produit']) . '</td>
			</tr>
		';
	echo '</tr></table><br />';
	echo '	
		<form action="produits_supprimer.php" method="post">
			<input type="hidden" name="id" id="id" value="' . htmlspecialchars($donnees['id']) . '"/>
			<input type="submit" value="Confirmer" />
			<a href="index.php"><input type="button" value="Annuler"/></a>
		</form>
		';
}


?>
