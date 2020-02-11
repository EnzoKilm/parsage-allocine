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


                echo '<h2>Bande annonce</h2>';
                $thirdnav = $html->find('.third-nav');
                $bouton_ba = $thirdnav[0]->find('.trailer');
                $url_ba = $bouton_ba[0]->href;
                $first_pos = strpos($url_ba, '=');
                $last_pos = strpos($url_ba, '&');
                $url_ba = substr($url_ba, $first_pos+1, $last_pos-$first_pos-1);

                echo "<div id='blogvision'><iframe src='http://player.allocine.fr/".$url_ba.".html' style='width:480px; height:270px'></iframe>";

                $infos = $colleft[0]->find('.entity-card-list');
                $thumbnail = $infos[0]->find('.thumbnail');
                $meta = $infos[0]->find('.meta');
                echo $thumbnail[0].$meta[0];

                $synopsis = $colleft[0]->find('.ovw-synopsis');
                echo $synopsis[0];
            ?>
        </div>