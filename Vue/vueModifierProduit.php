<?php $this->titre = 'Modification de produit dans une commande'; ?>

<form action="index.php?action=modifyProduitCommande" method="post">
<table>	
    <thead>
    <th colspan="3">Modifier?</th>
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
    <td><input type="text" name="quantite_produit" value="<?= htmlspecialchars($produitCommande['quantite_produit']) ?>" />
            <?= ($erreur == 'quantite') ? '<span style="color : red;">Entrez une quantité valide s.v.p.</span>' : '' ?> 
</td>
</tr>
</tbody>
</table>

    <input type="hidden" name="id" value="<?= $produitCommande['id'] ?>" /><br />
    <input type="submit" value="Appliquer" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="commande" />
    <input type="hidden" name="id" value="<?= $produitCommande['commande_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>