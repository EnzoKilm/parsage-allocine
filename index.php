<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice de parsage pour Datanaute</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <p>&#128269;</p><input type="text" name="infos" id="infos" placeholder="Titre, réalisateur, acteur..." />
            <select name="select" id="type-select">
                <option value="Films">film</option>
                <option value="Stars">réalisateur</option>
                <option value="Stars">acteur</option>
            </select>
            <input type="submit" name="button" id="button" value="Rechercher" />
        </form>
        <div class="films">
            <?php
                include 'simple_html_dom.php';

                if(isset($_POST['select'])) {
                    $select = $_POST['select'];
                } else {
                    $select = '';
                }

                if(isset($_POST['infos'])) {
                    $infos = $_POST['infos'];
                } else {
                    $infos = '';
                }
                
                $mots = explode(" ", $infos);
                $criteres = str_replace(" ", "+", $infos);
                $url = "http://www.allocine.fr/recherche/?q=".$criteres;
                
                $html = file_get_html($url);
                
                $colcontent = $html->find('.colcontent');

                $titlebars = $colcontent[0]->find('.titlebar');
                foreach($titlebars as $titlebar) {
                    $h2 = $titlebar->find('h2');
                    if (strpos($h2[0], $select) !== false) {
                        echo $h2[0];
                        break;
                    }
                }

                $divs = $colcontent[0]->find('div');
                $spacer_before = false;
                $div_found = false;
                foreach($divs as $div) {
                    if ($spacer_before == true) {
                        $title_name = $div->find('h2');
                        if ($title_name[0] == $h2[0]) {
                            $div_found = true;
                            break;
                        }
                    }

                    if ($div->class == 'spacer hrbicolor vmargin20t vmargin10b') {
                        $spacer_before = true;
                    } else {
                        $spacer_before = false;
                    }
                }

                $trs = $colcontent[0]->find('tr');
                $position = 0;
                foreach($trs as $tr) {
                    if ($position % 2 == 0) {
                        echo '<div class="film';
                        if ($position % 4 == 0) {
                            echo ' white">';
                        } else {
                            echo ' gray">';
                        }
                        echo $tr.'</div></div>';
                    }
                    $position += 1;
                }
            ?>
        </div>
    </div>

    <footer>Exercice réalisé par Enzo BEAUCHAMP</footer>
</body>
</html>