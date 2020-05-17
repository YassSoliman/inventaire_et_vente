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
                    <a href="<?= "Admincommande/modifier/" . $this->nettoyer($produit['id']) ?>">Modifier</a>
                    &emsp;&emsp;&emsp;
                    <a href="<?= "Admincommande/supprimer/" . $this->nettoyer($produit['id']) ?>">Supprimer</a>                
                </td>
            </tr>
        <?php else : ?>
            <tr>
                <td colspan="2" style="">
                    <p class="efface">
                        <a href="Admincommande/retablir/<?= $this->nettoyer($produit['id']) ?>">
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

<hr />

<h2>Ajouter un produit</h2>
<div class="listeProduits">
    <?php foreach ($produits as $produit): ?>    
        <div class="carte">
            <form action="Admincommande/ajouter" method="post">
                <h1><?= $this->nettoyer($produit['nom_produit']) ?></h1>
                <p class="prix"><?= $this->nettoyer($produit['prix_unitaire']) ?> $</p>
                <p><?= $this->nettoyer($produit['description_produit']) ?></p>
                <input type="hidden" name="commande_id" value="<?= $this->nettoyer($commande['id']) ?>" />
                <input type="hidden" name="produit_id" value="<?= $this->nettoyer($produit['id']) ?>" />
                <p>
                    <input type="submit" value="Ajouter à la commande" />
                </p>
            </form>
        </div>    
    <?php endforeach; ?>
</div>