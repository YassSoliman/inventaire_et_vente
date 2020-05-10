<?php $this->titre = 'Liste de produits'; ?>

<p style="text-align: center;">
    <a href="Apropos">À propos</a>
</p>

<h2>
    <a href="Accueil/ajouter">
        Creer une commande
    </a>
</h2>
<?php foreach ($commandes as $commande): ?>

    <a href="<?= "Accueil/lire/" . $this->nettoyer($commande['id']) ?>"><h1>Commande <?= $this->nettoyer($commande['id']) ?></h1></a>
    <p><?= $this->nettoyer($commande['details_commande']) ?></p>

<?php endforeach; ?>