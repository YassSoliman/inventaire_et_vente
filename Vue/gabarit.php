<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenue/css/style.css" />
        <title><?= $titre ?></title>        
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreInventaire">L'inventaire de Yasser</h1></a>
                <a href="tests.php"><h1 id="titreBlog">TESTS</h1></a>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedInventaire">
                Inventaire réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
