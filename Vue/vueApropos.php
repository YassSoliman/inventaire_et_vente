<?php $titre = "L'inventaire de Yasser Soliman"; ?>

<?php ob_start(); ?>

<table style="text-align: center;">
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
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>