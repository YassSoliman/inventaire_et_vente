<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleCommande') {
        require 'Tests/Modeles/testCommande.php';
    } else if ($_GET['test'] == 'modeleProduit') {
        require 'Tests/Modeles/testProduit.php';
    } else if ($_GET['test'] == 'modeleProduitCommande') {
        require 'Tests/Modeles/testProduitCommande.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else if ($_GET['test'] == 'vueCommande') {
        require 'Tests/Vues/testVueCommande.php';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleCommande">Commande</a>
    </li>
    <li>
        <a href="tests.php?test=modeleProduit">Produit</a>
    </li>
    <li>
        <a href="tests.php?test=modeleProduitCommande">ProduitCommande</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
    <li>
        <a href="tests.php?test=vueCommande">Commande</a>
    </li>
</ul>