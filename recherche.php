        <div class="films">
            <?php
                include 'simple_html_dom.php';

                if(isset($_POST['select'])) {
                    $select = $_POST['select'];
                } else {
                    $select = 'Films';
                }

                if(isset($_POST['infos'])) {
                    $infos = $_POST['infos'];
                } else {
                    $infos = '';
                }

                if ($select == 'Date') {
                    $decennie = substr($infos, 0, -1);
                    $decennie .= '0';
                    $url = 'http://www.allocine.fr/films/decennie-'.$decennie.'/annee-'.$infos;

                    $html = file_get_html($url);

                    $colmiddle = $html->find('.col-middle');

                    $ul = $colmiddle[0]->find('ul');
                    $films = $ul[1]->find('li');
                    $position = 0;
                    foreach($films as $film) {
                        if ($film->class == 'mdl') {
                            if ($position % 2 == 0) {
                                echo '<div class="film';
                                if ($position % 4 == 0) {
                                    echo ' white">';
                                } else {
                                    echo ' gray">';
                                }
                                echo $film.'</div>';
                            }
                            $position += 1;
                        }
                    }
                } else {
                    $mots = explode(" ", $infos);
                    $criteres = str_replace(" ", "+", $infos);
                    if ($select == 'Films') {
                        $url = "http://www.allocine.fr/recherche/1/?q=".$criteres;
                    } else {
                        $url = "http://www.allocine.fr/recherche/5/?q=".$criteres;
                    }
                    
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

                    $trs = $colcontent[0]->find('tr');
                    $position = 0;
                    foreach($trs as $tr) {
                        $next_div = $tr->find('div');
                        if ($next_div != null) {
                            if ($next_div[0]->class == 'navbar') {
                                break;
                            }
                        }
                        if ($position % 2 == 0) {
                            echo '<div class="film';
                            if ($position % 4 == 0) {
                                echo ' white">';
                            } else {
                                echo ' gray">';
                            }

                            // Remplacement du lien du href (image)
                            $a_films = $tr->find('a');
                            foreach($a_films as $a_film) {
                                $href_film = 'http://www.allocine.fr'.$a_film->href;
                                $length = strlen($href_film);
                                for ($i=0; $i<$length; $i++) {
                                    if ($href_film[$i] == '=') {
                                        $position_debut = $i;
                                    }

                                    if (isset($position_debut)) {
                                        $id = substr($href_film, $position_debut+1, $length-5);
                                    }
                                }

                                if ($select == 'Films') {
                                    $a_film->href = 'index.php?film='.$id;
                                } else if ($select == 'Stars') {
                                    $a_film->href = 'index.php?acteur='.$id;
                                }
                            }

                            if ($select == 'Films') {
                                echo $tr.'</div></div>';
                            } else {
                                echo $tr.'</div>';
                            }
                        }
                        $position += 1;
                    }
                }
            ?>
        </div>