<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreInventaire">L'inventaire de Yasser</h1></a>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedInvetaire">
                Inventaire réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
