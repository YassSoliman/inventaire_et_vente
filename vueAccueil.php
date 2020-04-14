<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Liste de produits</title>
    </head>
    <style>
        form {
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <body>

        <form action="produits_post.php" method="post">
            <p>
                <label for="nom_produit">Nom du produit</label> : <input type="text" name="nom_produit" id="nom_produit"/><br />
                <label for="prix_unitaire">Prix unitaire</label> : <input type="number" placeholder="1.00"  min="0.01" step="0.01"  name="prix_unitaire" id="prix_unitaire"/><br />
                <label for="description_produit">Description du produit</label> : <input type="text" name="description_produit" id="description_produit"/><br />
                <label for="en_stock">En stock</label> : <input type="checkbox" name="en_stock" id="en_stock"/><br />

                <input type="submit" value="Creer produit" />
            </p>
        </form>
        <p style="text-align: center;">
            <a href="apropos.html">À propos</a>
        </p>
        <table>	
            <thead>
            <th colspan="3">Liste de produits</th>
        </thead>
        <tbody>
            <?php foreach ($reponses as $donnees): ?>

                <tr>
                    <td rowspan="5" style="max-width: 200px; text-align: center;">
                        <strong>
                            <?= htmlspecialchars($donnees['nom_produit']) ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Prix unitaire</td>
                    <td><?= htmlspecialchars($donnees['prix_unitaire']) ?>$</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <em>
                            <?= htmlspecialchars($donnees['en_stock'] == 0 ? 'Hors stock' : 'En stock') ?>
                        </em>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?= htmlspecialchars($donnees['description_produit']) ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="">
                        <a href="produits_modifier.php?id=<?= htmlspecialchars($donnees['id']) ?>">Modifier</a>
                        &emsp;&emsp;&emsp;
                        <a href="produits_confirmation.php?id=<?= htmlspecialchars($donnees['id']) ?>">Supprimer</a>
                    </td>
                </tr>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>