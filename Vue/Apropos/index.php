<?php $this->titre = "L'inventaire de Yasser Soliman"; ?>

<table>
    <tr>
        <td colspan="2">Yasser Soliman</td>	
    </tr>
    <tr>
        <td colspan="2">420-4A4 MO Web et Bases de données</td>	
    </tr>
    <tr>
        <td colspan="2">Hiver 2020, Collège Montmorency</td>
    </tr>
    <tr>
        <td colspan="2">
            <ul>
                <li>L'application "L'inventaire de Yasser" permet de creer des commandes et d'ajouter des produits existants dans l'inventaire</li>
                <li>La page d'accueil présente la liste de commandes crée et offre la possibilité d'en creer d'autres</li>
                <ul>
                    <li>Un utilisateur doit inclure sont courriel lors de la création d'une commande</li>
                    <li>Il y a la gestion d'erreur lorsqu'un utilisateur entre un courriel</li>
                </ul>
                <li>En appuyant sur une commande il y a une liste de produit qui apparait</li>
                <li>Il y a la possibilité d'ajouté des produits dans la liste de commande</li>
                <li>Un utilisateur peut modifier, effacer ou rétablir un produit de la commande</li>
                <ul>
                    <li>Il y a la gestion d'erreur pour la quantité d'un produit. La valeur doit être un chiffre entier plus grand que 0.</li>
                </ul>
                <li>Cette version offre la possibilité de changer de contrôleur d'accueil. L'accueil présente alors la liste de tous les produits 
                    présent dans des commandes et offre la possibilité de voir la commande en question.
                    <form action="<?= $utilisateur != '' ? 'Admin' : ''; ?>Commande" method="post">
                        <input type="submit" value="Changer de controleur d'accueil">
                    </form>
                </li>

            </ul>
        </td>
    </tr>
    <tr>
        <td>
            Diagramme de ma BDD
        </td>
        <td>
            <a href="http://www.databaseanswers.org/data_models/inventory_and_sales/index.htm">
                Diagramme original
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <img width="80%" src="Contenue/images/DiagrammePHPMyAdmin.png"/>
        </td>
        <td>
            <a href="http://www.databaseanswers.org/data_models/inventory_and_sales/index.htm">
                <img width="80%" src="Contenue/images/DiagrammeSite.png"/>
            </a>
        </td>
    </tr>
</table>