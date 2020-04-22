<?php $titre = 'Liste de produits'; ?>

<?php ob_start(); ?>

<p style="text-align: center;">
    <a href="index.php?action=apropos">À propos</a>
</p>

<h2>
    <a href="index.php?action=nouvelCommande">
        Creer une commande
    </a>
</h2>
<?php foreach ($commandes as $commande): ?>

    <a href="<?= "index.php?action=commande&id=" . $commande['id'] ?>"><h1>Commande <?= htmlspecialchars($commande['id']) ?></h1></a>
    <p><?= htmlspecialchars($commande['details_commande']) ?></p>

<?php endforeach; ?>


<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>