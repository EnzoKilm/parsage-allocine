<?php 

// Create a new DOMDocument 
// $doc = new DOMDocument(); 
  
// Load the HTML file 
// $doc->loadHTMLFile("test.html");
  
// Create an HTML document and display it 
// echo $doc->saveHTML(); 



$url = "http://www.allocine.fr/recherche/1/?q=star+wars";
$html = file_get_contents($url);

// $dom = new DOMDocument();
// @$dom->loadHTML($html);
// $page = $dom->saveHTML();
// $trs = $dom->getElementsByTagName('tr');
// foreach ($trs as $tr) {
//     echo $tr->nodeValue, PHP_EOL;
// }

// echo $page;


$dom = new DomDocument();
@ $dom->loadHTML($html);

$xpath = new DOMXpath($dom);
$divs = $xpath->query("//div[contains(@class,'colcontent')]");


foreach ($divs as $node) {
    // echo "{$node->nodeValue}";
    // var_dump($node->nodeValue);
    echo $node->nodeValue;

    foreach ($xpath->query('tr', $node) as $child) {
        echo $child->nodeValue, PHP_EOL;
    }
}


?> 