<?php
$infos = $_REQUEST['infos'];

$mots = explode(" ", $infos);

$criteres = str_replace(" ", "+", $infos);

$url = "http://www.allocine.fr/recherche/1/?q=".$criteres;

echo $url;

$page = file_get_contents($url);

var_dump($page);

$first_pos = strpos($page, "vmargin10t");
echo $first_pos;
$last_pos = strrpos($page, "colcontent");
echo '<br/>'.$last_pos;

$div_films = substr($page, $first_pos, $last_pos);

var_dump($div_films);

// header("Location: index.php");