<?php $this->titre = 'Liste de produits dans commande'; ?>

<article>
    <header>
        <h1>Commande <?= $this->nettoyer($commande['id']) ?></h1>
        <h2>Par <?= $this->nettoyer($commande['nom']) ?></h2>
        <p><?= $this->nettoyer($commande['details_commande']) ?></p>
        <h3>Contact : <?= $this->nettoyer($commande['courriel']) ?></h3>
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
                <strong id="nomProduit"><?= $this->nettoyer($produit['nom_produit']) ?></strong>
            </td>
        </tr>
        <tr>
            <td class="nomPropriete">Prix unitaire</td>
            <td><?= $this->nettoyer($produit['prix_unitaire']) ?>$</td>
        </tr>
        <tr>
            <td class="nomPropriete">Description</td>
            <td><?= $this->nettoyer($produit['description_produit']) ?></td>
        </tr>
        <tr>
            <td class="nomPropriete">Quantité</td>
            <td><?= $this->nettoyer($produit['quantite_produit']) ?></td>
        </tr>
        <tr>
            <td colspan="2" style="">
                <a href="<?= "index.php?action=modificationProduitCommande&id=" . $this->nettoyer($produit['id']) ?>">Modifier</a>
                &emsp;&emsp;&emsp;
                <a href="<?= "index.php?action=confirmerProduitCommande&id=" . $this->nettoyer($produit['id']) ?>">Supprimer</a>
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
            <h1><?= $this->nettoyer($produit['nom_produit']) ?></h1>
            <p class="prix"><?= $this->nettoyer($produit['prix_unitaire']) ?> $</p>
            <p><?= $this->nettoyer($produit['description_produit']) ?></p>
            <p><a href="<?= "index.php?action=ajouterProduit&id=" . $this->nettoyer($produit['id']) . "&commande_id=" . $this->nettoyer($commande['id']) ?>">
                    <button>Ajouter à la commande</button>
                </a>
            </p>
        </div>
    <?php endforeach; ?>
</div>