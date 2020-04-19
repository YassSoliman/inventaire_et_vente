<?php $titre = 'Confirmer la suppression'; ?>

<?php ob_start(); ?>

<table>	
    <thead>
    <th colspan="3">Supprimer?</th>
</thead>
<tr>
    <td id="conteneurNomProduit" rowspan="5">
        <strong id="nomProduit"><?= htmlspecialchars($produitCommande['nom_produit']) ?></strong>
    </td>
</tr>
<tr>
    <td class="nomPropriete">Prix unitaire</td>
    <td><?= htmlspecialchars($produitCommande['prix_unitaire']) ?>$</td>
</tr>
<tr>
    <td class="nomPropriete">Description</td>
    <td><?= htmlspecialchars($produitCommande['description_produit']) ?></td>
</tr>
<tr>
    <td class="nomPropriete">Quantité</td>
    <td><?= htmlspecialchars($produitCommande['quantite_produit']) ?></td>
</tr>
</tbody>
</table>
<form action="index.php?action=supprimerProduitCommande" method="post">
    <input type="hidden" name="id" value="<?= $produitCommande['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="commande" />
    <input type="hidden" name="id" value="<?= $produitCommande['commande_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>