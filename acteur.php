        <div class="films">
            <?php
                include 'simple_html_dom.php';

                if(isset($_REQUEST['acteur'])) {
                    $id_acteur = $_REQUEST['acteur'];
                } else {
                    $id_acteur = '4';
                }

                $url = "http://www.allocine.fr/personne/fichepersonne_gen_cpersonne=".$id_acteur;

                $html = file_get_html($url);
                
                $colleft = $html->find('.col-left');

                $infos = $colleft[0]->find('.section');
                foreach($infos as $info) {
                    if ($info->class == "section ovw") {
                        echo $info;
                    }
                }
            ?>
        </div>