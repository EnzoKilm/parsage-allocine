        <div class="films">
            <?php
                include 'simple_html_dom.php';

                if(isset($_REQUEST['film'])) {
                    $id_film = $_REQUEST['film'];
                } else {
                    $id_film = '1';
                }

                $url = "http://www.allocine.fr/film/fichefilm_gen_cfilm=".$id_film;

                $html = file_get_html($url);
                
                $colleft = $html->find('.col-left');

                $infos = $colleft[0]->find('.entity-card-list');
                echo $infos[0];

                $synopsis = $colleft[0]->find('.ovw-synopsis');
                echo $synopsis[0];

                // INFOS : card entity-card entity-card-overview entity-card-list cf
                // SYNOPSIS : section ovw ovw-synopsis

                
            ?>
        </div>