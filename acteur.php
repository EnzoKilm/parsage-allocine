        <div class="films">
            <?php
                include 'simple_html_dom.php';

                if(isset($_REQUEST['acteur'])) {
                    $id_acteur = $_REQUEST['acteur'];
                } else {
                    $id_acteur = '4';
                }

                $url = "http://www.allocine.fr/personne/fichepersonne_gen_cpersonne=".$id_acteur;
                $id_acteur = substr($id_acteur, 0, strlen($id_acteur)-5);

                $html = file_get_html($url);
                
                $colleft = $html->find('.col-left');

                $thumbnail = $colleft[0]->find('.thumbnail');
                $meta = $colleft[0]->find('.meta');
                $stats = $colleft[0]->find('.stats-numbers-row');
                echo $thumbnail[0].$meta[0].$stats[0];
                
                $url_bio = "http://www.allocine.fr/personne/fichepersonne-".$id_acteur."/biographie/";
                $html_bio = file_get_html($url_bio);
                
                $biographie = $html_bio->find('.content-txt');
                if (!empty($biographie)) {
                    $titlebar = $colleft[0]->find('.titlebar');
                    echo $titlebar[0].$biographie[0];
                }
            ?>
        </div>