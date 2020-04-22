<?php $titre = "L'inventaire de Yasser - Ajouter une commande"; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Ajouter une commande de Yasser Soliman :</h1>
</header>
<form action="index.php?action=ajouterCommande" method="post">
    <h2>Ajouter une commande</h2>
    <p>
        <label for="details_commande">Détails</label> : <input type="text" name="details_commande" id="details_commande" /> <br />
        <label for="courriel">Courriel</label> :  <input type="text" name="courriel" id="courriel" /><br />
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="submit" value="Creer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>


