<?php $this->titre = 'Liste de produits'; ?>

<?php foreach ($commandes as $commande): ?>

    <a href="<?= "Accueil/lire/" . $this->nettoyer($commande['id']) ?>"><h1>Commande <?= $this->nettoyer($commande['id']) ?></h1></a>
    <p><?= $this->nettoyer($commande['details_commande']) ?></p>

<?php endforeach; ?>