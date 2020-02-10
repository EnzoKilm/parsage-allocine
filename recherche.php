<html>
<head>
<script src="brython.js"></script>
</head>
<body onload="brython()">
<script type="text/python">
from browser import document, alert
from bs4 import BeautifulSoup
import requests
import webbrowser

def recherche(ev):
    webbrowser.open('resultat.html')
    alert(document["infos"].value)

document["rechercher"].bind("click", recherche)
</script>
<input id="infos" placeholder="Titre, réalisateur, année de sortie">
<button id="rechercher">Rechercher</button>
</body>
</html>