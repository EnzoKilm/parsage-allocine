        <div class="accueil">
            <?php
                include 'simple_html_dom.php';

                echo '<h1 class="title">Sorties de la semaine</h1>';

                $url = "http://www.allocine.fr/film/sorties-semaine/";

                $html = file_get_html($url);

                $colleft = $html->find('.col-left');

                $ul = $colleft[0]->find('ul');
                $films = $ul[0]->find('li');
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
                            // Remplacement de l'image
                            $img_films = $film->find('img');
                            $data_src = $img_films[0]->getAttribute('data-src');
                            if ($data_src != null) {
                                $img_films[0]->src = $data_src;
                            }
                            // Remplacement du lien du href (image)
                            $a_films = $film->find('a');
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

                                $a_film->href = 'index.php?film='.$id;
                            }
                            $thumbnail = $film->find('.thumbnail-container');
                            $entitycardlist = $film->find('.entity-card-list');
                            $meta = $entitycardlist[0]->find('.meta');
                            $synopsis = $entitycardlist[0]->find('.synopsis');
                            if ($thumbnail != null) {
                                echo $thumbnail[0];
                            }
                            if ($meta != null) {
                                echo $meta[0];
                            }
                            if ($synopsis != null) {
                                echo $synopsis[0];
                            }
                            echo '</div>';
                        }
                        $position += 1;
                    }
                }
            ?>
        </div>