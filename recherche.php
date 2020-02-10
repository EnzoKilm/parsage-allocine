<?php
$infos = $_REQUEST['infos'];

$mots = explode(" ", $infos);
$criteres = str_replace(" ", "+", $infos);
$url = "http://www.allocine.fr/recherche/1/?q=".$criteres;
echo $url;

$html = file_get_html($url);

// header("Location: index.php");