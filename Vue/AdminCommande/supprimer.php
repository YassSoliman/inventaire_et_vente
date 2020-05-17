<?php $this->titre = 'Confirmer la suppression'; ?>

<table>	
    <thead>
    <th colspan="3">Supprimer?</th>
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
    <td><?= $this->nettoyer($produitCommande['quantite_produit']) ?></td>
</tr>
</tbody>
</table>
<form action="Admincommande/supprimerProduitCommande" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($produitCommande['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminaccueil/lire/<?= $this->nettoyer($produitCommande['commande_id']) ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>