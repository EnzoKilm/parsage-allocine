<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice de parsage pour Datanaute</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post" action="index.php">
            <p>&#128269;</p><input type="text" name="infos" id="infos" placeholder="Titre, réalisateur, acteur..." />
            <select name="select" id="type-select">
                <option value="Films">film</option>
                <option value="Stars">réalisateur</option>
                <option value="Stars">acteur</option>
                <option value="Date">date</option>
            </select>
            <input type="submit" name="button" id="button" value="Rechercher" />
        </form>
        <?php
            if (isset($_REQUEST['film'])) {
                include 'film.php';
            } else if (isset($_REQUEST['acteur'])) {
                include 'acteur.php';
            } else {
                include 'recherche.php';
            }
        ?>
    </div>

    <footer>Exercice réalisé par Enzo BEAUCHAMP</footer>
</body>
</html>