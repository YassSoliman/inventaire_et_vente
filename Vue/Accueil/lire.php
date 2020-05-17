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
    <?= ($produitsCommandes->rowCount() == 0) ? '<p class="message">Pas encore de produits dans cette commande.</p>' : '' ?>
    <?php foreach ($produitsCommandes as $produit): ?>
        <?php if ($produit['efface'] == '0') : ?>
            <tr>
                <td id="conteneurNomProduit" rowspan="4">
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
        <?php else : ?>
            <tr>
                <td colspan="2" style="">
                    <p class="efface">
                        <a href="Utilisateurs">
                            [ Se connecter pour rétablir ]
                        </a>
                        <?= $this->nettoyer($produit['nom_produit']) ?> effacé!
                    </p>
                </td>
            </tr>
        <?php endif; ?>

    <?php endforeach; ?>
</tbody>
</table>
<hr />

<h2>Liste de produits existants</h2>
<div class="listeProduits">
    <?php foreach ($produits as $produit): ?>    
        <div class="carte">
                <h1><?= $this->nettoyer($produit['nom_produit']) ?></h1>
                <p class="prix"><?= $this->nettoyer($produit['prix_unitaire']) ?> $</p>
                <p><?= $this->nettoyer($produit['description_produit']) ?></p>
                <input type="hidden" name="commande_id" value="<?= $this->nettoyer($commande['id']) ?>" />
                <input type="hidden" name="produit_id" value="<?= $this->nettoyer($produit['id']) ?>" />
        </div>    
    <?php endforeach; ?>
</div>