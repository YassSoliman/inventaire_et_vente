<?php $this->titre = 'Liste de produits'; ?>

<h2>
    <a href="Adminaccueil/ajouter">
        Creer une commande
    </a>
</h2>
<?php foreach ($commandes as $commande): ?>

    <a href="<?= "Adminaccueil/lire/" . $this->nettoyer($commande['id']) ?>"><h1>Commande <?= $this->nettoyer($commande['id']) ?></h1></a>
    <p><?= $this->nettoyer($commande['details_commande']) ?></p>

<?php endforeach; ?>