<?php
$infos = $_REQUEST['infos'];

$mots = explode(" ", $infos);
$criteres = str_replace(" ", "+", $infos);
$url = "http://www.allocine.fr/recherche/1/?q=".$criteres;
echo $url;

$page = file_get_contents($url);
var_dump($page);

echo '<hr/>';

$doc = new DOMDocument();
@$doc->loadHTML($page);

// $doc_page = $doc->saveHTML();
$tds = $doc->getElementsByTagName('td');
foreach ($tds as $td) {
    // var_dump($td->nodeValue, PHP_EOL);
    // echo $td->nodeValue, PHP_EOL;
}

// header("Location: index.php");