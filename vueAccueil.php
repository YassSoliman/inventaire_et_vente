<?php $titre = 'Liste de produits'; ?>

<?php ob_start(); ?>

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
        <?php foreach ($produits as $produit): ?>

            <tr>
                <td id="conteneurNomProduit" rowspan="5">
                    <strong id="nomProduit"><?= htmlspecialchars($produit['nom_produit']) ?></strong>
                </td>
            </tr>
            <tr>
                <td class="nomPropriete">Prix unitaire</td>
                <td><?= htmlspecialchars($produit['prix_unitaire']) ?>$</td>
            </tr>
            <tr>
                <td class="nomPropriete">Status</td>
                <td>
                    <em>
                        <?= htmlspecialchars($produit['en_stock'] == 0 ? 'Hors stock' : 'En stock') ?>
                    </em>
                </td>
            </tr>
            <tr>
                <td class="nomPropriete">Description</td>
                <td><?= htmlspecialchars($produit['description_produit']) ?></td>
            </tr>
            <tr>
                <td colspan="2" style="">
                    <a href="produits_modifier.php?id=<?= htmlspecialchars($produit['id']) ?>">Modifier</a>
                    &emsp;&emsp;&emsp;
                    <a href="produits_confirmation.php?id=<?= htmlspecialchars($produit['id']) ?>">Supprimer</a>
                </td>
            </tr>
            
        <?php endforeach; ?>
    </tbody>
</table>


<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>