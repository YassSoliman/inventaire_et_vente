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
    <?php foreach ($produitsCommandes as $produit): ?>

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
<div class="listeProduits">
    <?php foreach ($produits as $produit): ?>
        <div class="carte">
            <h1><?= htmlspecialchars($produit['nom_produit']) ?></h1>
            <p class="prix"><?= htmlspecialchars($produit['prix_unitaire']) ?> $</p>
            <p><?= htmlspecialchars($produit['description_produit']) ?></p>
            <p><button><a href="<?="index.php?action=ajouterProduit&id=" . $produit['id'] . "&commande_id=" . $commande['id']?>">Ajouter à la commande</a></button>
        </div>
    <?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>