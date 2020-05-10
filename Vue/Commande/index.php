<?php $this->titre = 'Liste de produits dans les commandes'; ?>


<table>	
    <thead>
    <th colspan="3">Liste de produits dans les commandes</th>
</thead>
<tbody>
    <?= ($produitsCommandes->rowCount() == 0) ? '<p class="message">Aucune commande existante.</p>' : '' ?>
    <?php foreach ($produitsCommandes as $produit): ?>
        <?php if ($produit['efface'] == '0') : ?>
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
                    <p>
                        <a href="Accueil/lire/<?= $this->nettoyer($produit['commande_id']) ?>">
                            [ Voir commande ]
                        </a>
                    </p>
                </td>
            </tr>
        <?php else : ?>
            <tr>
                <td colspan="2" style="">
                    <p class="efface">
                        <a href="Commande/retablir/<?= $this->nettoyer($produit['id']) ?>">
                            [ Rétablir ]
                        </a>
                        <?= $this->nettoyer($produit['nom_produit']) ?> effacé!
                    </p>
                </td>
            </tr>
        <?php endif; ?>

    <?php endforeach; ?>
</tbody>
</table>