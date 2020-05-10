<?php $this->titre = 'Confirmer la suppression'; ?>

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
    <td><?= $this->nettoyer($produitCommande['prix_unitaire']) ?>$</td>
</tr>
<tr>
    <td class="nomPropriete">Description</td>
    <td><?= $this->nettoyer($produitCommande['description_produit']) ?></td>
</tr>
<tr>
    <td class="nomPropriete">Quantité</td>
    <td><?= $this->nettoyer($produitCommande['quantite_produit']) ?></td>
</tr>
</tbody>
</table>
<form action="index.php?action=supprimerProduitCommande" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($produitCommande['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="commande" />
    <input type="hidden" name="id" value="<?= $this->nettoyer($produitCommande['commande_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>