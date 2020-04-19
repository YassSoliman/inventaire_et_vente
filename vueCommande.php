<?php $titre = 'Liste de produits dans commande'; ?>

<?php ob_start(); ?>

<article>
    <header>
        <h1>Commande <?= $commande['id'] ?></h1>
        <h2>Par <?= $commande['nom'] ?></h2>
        <p><?= $commande['details_commande'] ?></p>
   </header>
</article>
<hr />
<table>	
    <thead>
        <th colspan="3">Liste de produits</th>
    </thead>
    <tbody>
        <?php foreach ($produitsComandes as $produit): ?>

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
                <td class="nomPropriete">Description</td>
                <td><?= htmlspecialchars($produit['description_produit']) ?></td>
            </tr>
            <tr>
                <td class="nomPropriete">Quantité</td>
                <td><?= htmlspecialchars($produit['quantite_produit']) ?></td>
            </tr>
            <tr>
                <td colspan="2" style="">
                    <a href="#">Modifier</a>
                    &emsp;&emsp;&emsp;
                    <a href="#">Supprimer</a>
                </td>
            </tr>
            
        <?php endforeach; ?>
    </tbody>
</table>

<hr />

<h2>Ajouter un produit</h2>

<form action="produits_post.php" method="post">
    <p>
        <label for="nom_produit">Produit</label> : &emsp;
        <select>
            <?php foreach ($produits as $produit): ?>
            <option value="<?= $produit['id'] ?>"><?= htmlspecialchars($produit['nom_produit']) ?></option>
            <?php endforeach; ?>
        </select>
        <br />
            
        <input type="submit" value="Ajouter produit" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>