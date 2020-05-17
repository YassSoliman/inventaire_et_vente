<?php $this->titre = 'Modification de produit dans une commande'; ?>

<form action="Admincommande/modifyProduitCommande" method="post">
<table>	
    <thead>
    <th colspan="3">Modifier?</th>
</thead>
<tr>
    <td id="conteneurNomProduit" rowspan="5">
        <strong id="nomProduit"><?= $this->nettoyer($produitCommande['nom_produit']) ?></strong>
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
    <td><input type="text" name="quantite_produit" value="<?= $this->nettoyer($produitCommande['quantite_produit']) ?>" />
            <?= ($erreur == 'quantite') ? '<span style="color : red;">Entrez une quantité valide s.v.p.</span>' : '' ?> 
</td>
</tr>
</tbody>
</table>
    <input type="hidden" name="id" value="<?= $this->nettoyer($produitCommande['id']) ?>" /><br />
    <input type="submit" value="Appliquer" />
</form>
<form action="Adminaccueil/lire/<?= $this->nettoyer($produitCommande['commande_id']) ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>